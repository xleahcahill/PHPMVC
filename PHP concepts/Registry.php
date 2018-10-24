<?php
namespace Main\Misc;

use \Main\ObjectProperties;
require_once 'ObjectProperties.php';
require_once 'Request.php';
require_once 'Response.php';

class Registry extends ObjectProperties
{
	private static $_instance;		
	
	private $_request;				
	private $_response;				
	
	private $_factories = array();	
	
	private function __construct()	
	{							
		// Do nothing
	}
	
	static public function Instance()		// Static so we use classname itself to create object i.e. Registry::Instance()
	{

		if(!isset(self::$_instance))
		{
			self::$_instance = new self();
			self::$_instance->_request = new Request();
			self::$_instance->_response = new Response();			
		}
		return self::$_instance;
	}
	
	// Get method
	// Return the Request object
	public function GetRequest()
	{
		return $this->_request;
	}

	public function SetRequest(Request $value)	
	{
		$this->_request = $value;
	}

	public function GetResponse()
	{
		return $this->_response;
	}
	public function SetResponse(Response $value)	
	{
		$this->_response = $value;
	}
	
	public function IndexGetFactory($key)
	{
		if(isset($this->_factories[$key]))
		{
			return $this->_factories[$key];
		}
		return;	
	}
	
	public function IndexSetFactory($key, $value)
	{
		$this->_factories[$key] = $value;
	}
}
?>