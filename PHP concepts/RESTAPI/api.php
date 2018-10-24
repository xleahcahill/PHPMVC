<?php
header("Content-Type:application/json");
require "dressdata.php";

if(!empty($_GET['name']))
{
	$name=$_GET['name'];
	$stock = get_stock($name);
	
	if(empty($stock))
	{
		response(200,"Product Not Found",NULL);
	}
	else
	{
		response(200,"That product is available",$stock);
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status']=$status_message;
	$response['Stock']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}