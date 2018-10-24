<?php
namespace Main\Command;

use Main\Misc\Registry;

use \ReflectionClass;
use \Main\Misc\Request;
use \Main\Misc\Response;
use \Main\Command\DefaultCommand;
require_once 'Command.php';
require_once 'Request.php';
require_once 'Response.php';
require_once 'DefaultCommand.php';


class CommandResolver
{
	static private $_baseCommandClass;
	static private $_defaultCommand;
	
	public function __construct()
	{

		if(isset(self::$_baseCommandClass) == false)
		{
			self::$_baseCommandClass = new ReflectionClass("\Main\Command\Command");
			
			self::$_defaultCommand = new DefaultCommand();
		}	
	}
	

	public function GetCommand(Request $request)
	{
		$cmd = $request->IndexGetProperty('cmd');			
		$sep = DIRECTORY_SEPARATOR;				
		if(isset($cmd) == false) 
		{
			return clone self::$_defaultCommand;
		}	
		
		
		$cmd = str_replace(array('.',$sep), "", $cmd);
		
		$filepath = ".\\{$cmd}Command.php";
		$classname = "\\Main\\Command\\{$cmd}Command";
		
		if(file_exists($filepath))
		{
			@require_once $filepath;
			if(class_exists($classname))
			{
				$reflectionClass = new ReflectionClass($classname);
				
				if($reflectionClass->isSubclassOf(self::$_baseCommandClass))
				{
				
					return $reflectionClass->newInstance();
				}
				else 
				{					
					$response = Registry::Instance()->Response; 
					$response->IndexSetOut('Error', "Command {$cmd}Command is not a command");
					return clone self::$_defaultCommand;			
				}
			}
		}
		
		$response = Registry::Instance()->Response; 
		$response->IndexSetOut('Error', "Command {$cmd}Command not found");
		return clone self::$_defaultCommand;			
	}
}


?>