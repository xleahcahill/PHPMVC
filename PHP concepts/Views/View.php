<?php
namespace Main\View;

class View
{
	private $_filepath;		
	
	public function __construct($filepath)
	{
		$this->_filepath = $filepath;
	}
	

	public function Render()
	{
		include($this->_filepath);		
		exit();								
	}
		
}

?>