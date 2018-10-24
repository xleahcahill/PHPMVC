<?php

function get_stock($name)
{
		$dsn = 'mysql:host=localhost;dbname=assignmenttwo';
        $dbUName = "root";
        $dbPassword = "";

        $dbh = new PDO($dsn, $dbUName, $dbPassword);
		
        $stmt = $dbh->prepare('SELECT style, stock FROM dresses');		
				

        if($stmt->execute())
        {
            while($record = $stmt->fetch())
            {
                $dresses[] = $record;  
            }                         
        }
		
		foreach($dresses as $dress=>$stock)
	{
		if($dress==$name)
		{
			return $stock;
			break;
		}
	}
		
	}
	
	

