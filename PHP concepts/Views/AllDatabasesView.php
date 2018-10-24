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
<title>View All</title>
</form>
<article>
<h1>View all</h1>
 
<a href="Index.php">Home</a><br></article>
 <h3>Staff database:</h3>
<?php 
   
    	$data = $response->IndexGetOut('data'); 

    	echo "<table border='1'>";
		echo "<thead><tr><th>ID:</th><th>Firstname:</th><th>Lastname:</th><th>Date of employment:</th></tr></thead></br>";
    	foreach($data as $record)    
    	{                              
    	    echo "<tr>";
			 echo "<td>" . $record["staffID"] . "</td>";
    	    echo "<td>" . $record["firstname"] . "</td>";
    	    echo "<td>" . $record["lastname"] . "</td>";
            echo "<td>" . $record["dateofemployment"] . "</td>";
    	    echo "</tr>";		    	
    	}
    	echo "</table>";
	?><Br>
	 <h3>Customer database:</h3>
	<?php 
   
    	$data2 = $response->IndexGetOut('data2'); 

    	echo "<table border='1'>";
		echo "<thead><tr><th>ID:</th><th>Firstname:</th><th>Lastname:</th><th>Email:</th></tr></thead></br>";
    	foreach($data2 as $record2)    
    	{                              
    	    echo "<tr>";
			 echo "<td>" . $record2["cusId"] . "</td>";
    	    echo "<td>" . $record2["firstname"] . "</td>";
    	    echo "<td>" . $record2["lastname"] . "</td>";
            echo "<td>" . $record2["Email"] . "</td>";
    	    echo "</tr>";		    	
    	}
    	echo "</table>";
	?><Br>
    </body>
</html>