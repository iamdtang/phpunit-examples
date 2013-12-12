<?php 

require_once 'RemoteConnectorInterface.php';

class FileConnector implements RemoteConnectorInterface {

	public function get($url)
	{
		// maybe this uses file_get_contents()
	}

}