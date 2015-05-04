<?php

ini_set("session.cookie_lifetime","7200");
ini_set("session.gc_maxlifetime","7200");
session_start();
include("../conexion.php");

	$files = scandir("../media/videos");
	
	foreach($files as $file){

		if(substr($file, -3) == "mp4"){
			unlink("../media/videos/". $file);	
		}
	}

	header("Location:../ajustes.php");

?>