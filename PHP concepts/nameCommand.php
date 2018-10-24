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

class nameCommand extends Command
{
	public function Execute(Request $request)
	{
		
	 $response = Registry::Instance()->Response;	
		$dsn = 'mysql:host=localhost;dbname=assignmenttwo';
        $dbUName = "root";
        $dbPassword = "";

        $dbh = new PDO($dsn, $dbUName, $dbPassword);
		
        $stmt = $dbh->prepare("SELECT firstname, lastname FROM customer");		

        if($stmt->execute())
        {
            while($record = $stmt->fetch())
            {
                $data[] = $record;  
            }                         
        }

		$response = Registry::Instance()->Response;							
		$response->SetViewName("DBNameView");								
		 $response->IndexSetOut('data', $data);
		return $response;
	}
}
?>