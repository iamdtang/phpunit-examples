<?php 

require_once '../lib/FacebookPage.php';

class FacebookPageTest extends PHPUnit_Framework_TestCase {

	public function testGetName()
	{
		$partialMock = $this
      ->getMockBuilder('FacebookPage')
      
      // any page could be passed in since test wont make network call
      ->setConstructorArgs(array('pepsi'))
      
      // The request method will be replaced with a configurable test double below
      // The behavior of the other methods is not changed.
      ->setMethods(array('request'))
      ->getMock();

    $partialMock
      ->expects($this->once())
      ->method('request')
      ->will($this->returnValue('{"name": "Coca-Cola", "likes": 77098229}'));

		$this->assertEquals($partialMock->fetch()->getName(), 'Coca-Cola');
	}


}