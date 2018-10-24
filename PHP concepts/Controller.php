<?php
namespace Main\Control;

use \Main\Misc\Request;
use Main\Misc\Response;
use \Main\Command\CommandResolver;
use \Main\Control\ApplicationController;
use \Main\View\View;
require_once 'CommandResolver.php';
require_once 'Request.php';
require_once 'Response.php';
require_once 'ApplicationController.php';
require_once 'Views/View.php';

class Controller
{
	static private $_instance;		
	
	private $_commandResolver;	
	
	private function __construct()	{	}
	
	static public function Instance()		
	{
		if(!isset(self::$_instance))
		{
			self::$_instance = new self();	
			self::$_instance->_commandResolver = new CommandResolver();
			
			ApplicationController::LoadViewMap();
		}
		return self::$_instance;
	}
	public function HandleRequest(Request $request)
	{
		$command = $this->_commandResolver->GetCommand($request);	
		$response = $command->Execute($request);					
		$view = ApplicationController::GetView($response);			
		$view->Render();											
	}
	
}

?>