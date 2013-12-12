<?php 

class FacebookPage {

	protected $pageUrl;
	protected $name;

	public function __construct($pageName)
	{
		$this->pageUrl = 'https://graph.facebook.com/' . $pageName;
	}


	protected function request()
	{

	}

	public function fetch()
	{
		$json = $this->request($this->pageUrl);
		$obj = json_decode($json);

		$this->name = $obj->name;

		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

}