<?php
namespace Main\Command;

use Main\Command\Command;
use \Main\Misc\Registry;
use \Main\Misc\Request;
use \Main\Misc\Response;
require_once 'Command.php';
require_once 'Request.php';
require_once 'Response.php';

class TestPageCommand extends Command
{
	public function Execute(Request $request)
	{
		
		$response = Registry::Instance()->Response;		
						
		$response->SetViewName("TestPage");								
		$response->IndexSetOut('cmd', $request->IndexGetProperty('cmd'));	
		  

		return $response;
	}
}
?>