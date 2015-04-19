<?php

session_start();
include("../conexion.php");

	$files = scandir("../media");
	
	foreach($files as $file){

		if(substr($file, -3) == "mp4"){
			unlink("../media/$file");	
		}
	}

	header("Location:../ajustes.php");

?>