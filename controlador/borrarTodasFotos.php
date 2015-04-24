<?php

session_start();
include("../conexion.php");

	$files = scandir("../media");
	
	foreach($files as $file){

		if(substr($file, -3) == "jpg"){
			unlink("../media/images/$file");
			unlink("../media/preview/$file");	
		}
	}

	header("Location:../ajustes.php");

?>