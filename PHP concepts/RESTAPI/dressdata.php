<?php

function get_stock($name)
{
	$dresses = [
		"Skater"=>23,
		"Bodycon"=>50,
		"Midi"=>9,
		"Maxi"=>10
	];
	
	foreach($dresses as $dress=>$stock)
	{
		if($dress==$name)
		{
			return $stock;
			break;
		}
	}
}