<?php
use \Main\Misc\Registry;
use \Main\Control\Controller;
use \Main\Misc\Request;

require_once 'Registry.php';
require_once 'Request.php';
require_once 'Controller.php';

$controller = Controller::Instance();


$request = Registry::Instance()->Request;
$controller->HandleRequest($request);
?>

