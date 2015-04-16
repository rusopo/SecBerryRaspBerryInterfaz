<?php

	if(isset($_GET["delete"])) {
	
	  unlink("../media/" . $_GET["delete"]);
	  header("Location: ../galeria.php");
	}
		
?>