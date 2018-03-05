<?php


require_once('function.php');
include('db/pdo.php');

$file = isset($_GET['file']);



if(!($file))

	{

		$_GET['file'] = 'add';

	}



$path = $_GET['file'].'.php';



if(file_exists($path) AND (!($_GET['file'] == 'index')))

    {

        require_once($path);    

    }

else 

    {

	   echo "404 File not found!";

    }




