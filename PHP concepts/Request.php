<?php
namespace Main\Misc;

use \Main\Misc\Registry;
use \Main\Misc\Response;
require_once 'Registry.php';
require_once 'Response.php';

class Request
{
	private $_properties;
	
	public function __construct()
	{
		$this->Init();
	}
	
	private function Init()
	{

		if(  isset($_SERVER['REQUEST_METHOD'])
		&& ($_SERVER['REQUEST_METHOD'] == "POST"
		|| $_SERVER['REQUEST_METHOD'] == "GET")  )
		{
			$this->_properties = $_REQUEST;		
		}
		else
		{
			$this->_properties = array();		
		}
	}
	
	
	public function IndexGetProperty($key)
	{
		if(isset($this->_properties[$key]))
		{
			return $this->_properties[$key];
		}
		return;	
	}
	
	public function IndexSetProperty($key, $value)
	{
		$this->_properties[$key] = $value;
	}
	
	public function Copy(Response $response)
	{
		foreach($this->_properties as $key => $value)
		{
			$response->IndexSetOut($key, $value);			
		}
	}
	
}
?>