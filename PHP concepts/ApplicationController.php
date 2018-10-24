<?php
namespace Main\Control;

use \Main\Misc\Request;
use \Main\Misc\Response;
use \Main\View\View;
require_once 'Request.php';
require_once 'Response.php';
require_once 'Views/View.php';

class ApplicationController
{
	static private $_viewMap;
	static public function LoadViewMap()
	{
		self::$_viewMap = array(
				'DefaultView' => new View(".\Views\DefaultView.php"),				
				'TestPage' => new View(".\Views\TestPageView.php"),
				'StaffPage' => new View(".\Views\StaffDBView.php"),
				'cusDBView' => new View(".\Views\customerDBView.php"),
				'DBEmailView' => new View(".\Views\EmailView.php"),
				'DBNameView' => new View(".\Views\NameView.php"),
				'Viewall' => new View(".\Views\AllDatabasesView.php")
		);
	}
	static public function GetView(Response $response)
	{
		return self::$_viewMap[$response->GetViewName()];
	}
	
}
?>