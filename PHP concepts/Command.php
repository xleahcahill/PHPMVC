<?php
namespace Main\Command;

use \Main\Misc\Request;
use \Main\Misc\Response;
require_once 'Request.php';
require_once 'Response.php';

abstract class Command
{
	public final function __construct()	
	{
		
	}
	
	public abstract function Execute(Request $request);
}
?>