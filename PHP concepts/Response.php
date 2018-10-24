<?php
namespace Main\Misc;

use \Main\Misc\Registry;
require_once 'Registry.php';

class Response
{		
	private $_output = array();
	
	public function __construct()
	{
		
	}
	
	public function IndexGetOut($key)
	{
		if(isset($this->_output[$key]))
		{
			return $this->_output[$key];
		}
		return;
	}

	public function IndexSetOut($key, $value)
	{
		$this->_output[$key] = $value;
	}

	public function GetViewName()
	{
		if(isset($this->_output['view']))		
		{
			return $this->_output['view'];
		}
		
		return false;	
	}
	
	public function SetViewName($viewName)
	{
		if(is_string($viewName))
		{
			$this->_output['view'] = $viewName;
		}
	}		
}
?>