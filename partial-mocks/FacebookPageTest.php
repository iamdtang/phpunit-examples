<?php 

require_once 'FacebookPage.php';

class FacebookPageTest extends PHPUnit_Framework_TestCase {

	public function testGetName()
	{
		$partialMock = $this
      ->getMockBuilder('FacebookPage')
      
      // any page could be passed in since the test wont make network call
      ->setConstructorArgs(array('cocacola'))
      
      // The request method will be replaced with a configurable test double below
      // The behavior of the other methods is not changed.
      // If this is not called, all methods will return NULL
      // Only the methods specified here will be replaced
      ->setMethods(array('request'))
      ->getMock();

    // the request method must be called with the right facebook graph endpoint
    // the request method will return a static json value
    $partialMock
      ->expects($this->once())
      ->method('request')
      ->with('https://graph.facebook.com/cocacola')
      ->will($this->returnValue('{"name": "Coca-Cola", "likes": 77098229}'));

		$this->assertEquals($partialMock->fetch()->getName(), 'Coca-Cola');
	}


}