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
<title></title>

<link rel="stylesheet" href="stylesheetpages1.css"/>
  </head>
    <body>
<article>
<h1>Current Customer Database:</h1>
<a href="Index.php">Home</a><br> </article>
<?php 
   
    	$data = $response->IndexGetOut('data'); 

    	echo "<table border='1'>";
		echo "<thead><tr><th>ID:</th><th>Firstname:</th><th>Lastname:</th><th>Email:</th></tr></thead></br>";
    	foreach($data as $record)    
    	{                              
    	    echo "<tr>";
			 echo "<td>" . $record["cusId"] . "</td>";
    	    echo "<td>" . $record["firstname"] . "</td>";
    	    echo "<td>" . $record["lastname"] . "</td>";
            echo "<td>" . $record["Email"] . "</td>";
    	    echo "</tr>";		    	
    	}
    	echo "</table>";
	?><Br><br><br><br>
<form action="Index.php?cmd=email" method="POST">
<input type="submit" value="View Customer Emails only" /></form>
<br><Br>
<form action="Index.php?cmd=name" method="POST">
<input type="submit" value="View Customer names only" /></form>
    </body>
</html>
