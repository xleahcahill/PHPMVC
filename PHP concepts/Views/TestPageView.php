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
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>My Second View Page</title>
<link rel="stylesheet" href="stylesheetpages1.css"/>
<article>
    <h1> Test Page </h1>
    </article>
</head>
    <body>
   <a href="Index.php">Home</a>

    </body>
</html>