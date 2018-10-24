<?php 
namespace Main\View;

use \Main\Misc\Registry;
use \Main\Misc\Response;

require_once 'Registry.php';
require_once 'Response.php';

$response = Registry::Instance()->Response;

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link rel="stylesheet" href="stylesheetpages1.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Homepage</title>
</head>
   <article>
    <h1>Welcome to CoffeeHut.com</h1></article>
 <body>
  
    <a href="Index.php?cmd=TestPage">Page Two</a>
    <a href="Index.php?cmd=staff">View staff Database</a>
    <a href="Index.php?cmd=customerDB">View Customer database</a>
    <a href="Index.php?cmd=Viewall">View All </a>
    </body>
</html>