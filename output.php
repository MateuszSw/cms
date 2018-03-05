<?php


	
	function pokaz($parametr)
	
		{

		foreach($_POST as $key => $value)

	{

    	echo $key .' =>  ' . $value . '<br>';    

	}
	
		}
	

	pokaz($_POST);