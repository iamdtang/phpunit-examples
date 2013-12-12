<?php 

class FacebookPage {

	protected $pageUrl;
	protected $name;
	protected $remoteConnector;

	public function __construct($pageName, FileConnector $remoteConnector)
	{
		$this->pageUrl = 'https://graph.facebook.com/' . $pageName;
		$this->remoteConnector = $remoteConnector;
	}

	public function fetch()
	{
		$json = $this->remoteConnector->get($this->pageUrl);
		$obj = json_decode($json);

		$this->name = $obj->name;

		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

}