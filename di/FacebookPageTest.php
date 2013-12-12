<?php 

require_once 'FacebookPage.php';
require_once 'FileConnector.php';

class FacebookPageTest extends PHPUnit_Framework_TestCase {

	public function testGetName()
	{
    $mockRemoteConn = $this->getMockBuilder('FileConnector')
      ->getMock();

    // OR the shorthand,

    $mockRemoteConn = $this->getMock('FileConnector');

    // expect get method to be called once and return the following json
    $mockRemoteConn->expects($this->once())
      ->method('get')
      ->will($this->returnValue('{"name": "Coca-Cola", "likes": 77098229}'));

    $page = new FacebookPage('pepsi', $mockRemoteConn);
		$this->assertEquals($page->fetch()->getName(), 'Coca-Cola');
	}


}