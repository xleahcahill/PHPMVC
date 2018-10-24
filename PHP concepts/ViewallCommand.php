<?php
namespace Main\Command;

use \PDO;
use Main\Command\Command;
use \Main\Misc\Registry;
use \Main\Misc\Request;
use \Main\Misc\Response;
require_once 'Command.php';
require_once 'Request.php';
require_once 'Response.php';

class ViewallCommand extends Command
{
	public function Execute(Request $request)
	{


    $response = Registry::Instance()->Response;	
		$dsn = 'mysql:host=localhost;dbname=assignmenttwo';
        $dbUName = "root";
        $dbPassword = "";

        $dbh = new PDO($dsn, $dbUName, $dbPassword);
		
        $stmt = $dbh->prepare("SELECT * FROM staff");		

        if($stmt->execute())
        {
            while($record = $stmt->fetch())
            {
                $data[] = $record;  
            }                         
        }
		  $stmt2 = $dbh->prepare("SELECT * FROM customer");		

        if($stmt2->execute())
        {
            while($record2 = $stmt2->fetch())
            {
                $data2[] = $record2;  
            }                         
        }


		$response->SetViewName("Viewall");								
	 	$response->IndexSetOut('data', $data);
         $response->IndexSetOut('data2', $data2);
		return $response;
        
	}
}
?>