<?php 
class View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }
	
    
 public function template1(){
        $intro = "<p>" . $this->model->tempstring ."</p>";
        require_once($this->model->mytemplate);
    }
		
		 public function template2(){
       $page2 = "<p>" . $this->model->tempstring2 ."</p>";
        require_once($this->model->mytemplate2);
    }
	
	

	public function DisplayTable()
{
	$dsn = 'mysql:host=localhost;dbname=assignmenttwo';
	$dbUName = "root";
	$dbPassword = "";


	$dbh = new PDO($dsn, $dbUName, $dbPassword);
	
	
	foreach($dbh->query('SELECT * FROM customer') as $record)
	{
		echo "<tr>" . 
		"<td>" . $record["firstname"] . "</td>" .
		"<td>" . $record["lastname"] . "</td>" .
		"<td>" . $record["Email"] . "</td>" .		
		"</tr>";
	}
	
	    
}
 public function output(){
        return "<p>" . $this->model->string . "</p>";
    }
	
}