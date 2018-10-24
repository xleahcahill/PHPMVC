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
<title></title>
</head><article>
 <h1>All Email addresses in the customer database:</h1>
 <a href="Index.php">Home</a>
 <a href="Index.php?cmd=ShowDB">Back</a><br><br></article>
<?php 
   
    	$data = $response->IndexGetOut('data'); 

    	echo "<table border='1'>";
        echo "<thead><tr><th>Email:</th></tr></thead></br>";
    	foreach($data as $record)    
    	{                              
    	    echo "<tr>";
            echo "<td>" . $record["email"] . "</td>";
    	    echo "</tr>";		    	
    	}
    	echo "</table>";
        ?>

   
    </body>


</html>
