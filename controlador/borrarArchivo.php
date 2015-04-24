<?php

	if(isset($_GET["delete"])) {
	
		if(substr($_GET["delete"], -3) == "jpg"){
			unlink("../media/images/" . $_GET["delete"]);
			unlink("../media/preview/" . $_GET["delete"]);
		}
		else if(substr($_GET["delete"], -3) == "mp4"){
			unlink("../media/videos/" . $_GET["delete"]);
		
		}
		
	  header("Location: ../galeria.php");
	}
		
?>