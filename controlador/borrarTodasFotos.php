<?php

ini_set("session.cookie_lifetime","7200");
ini_set("session.gc_maxlifetime","7200");
session_start();
include("../conexion.php");

	$files = scandir("../media/images");
	
	foreach($files as $file){

		if(substr($file, -3) == "jpg"){
			unlink("../media/images/". $file);
			unlink("../media/preview/". $file);	
		}
	}

	header("Location:../ajustes.php");

?>