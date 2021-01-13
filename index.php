<?php

require 'config/config.php';
require 'libs/Autoload.php';
 

try{ 
	$app = new Bootstrap(); 
}catch (Exception $e){
	if(DEVELOPMENT==true)
	{
		echo $e->getMessage();
	}
	exit();
} 
