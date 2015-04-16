<?php
	
	/*
	if(substr($_GET["file"], -3) == "jpg"){
		header("Content-Type: image/jpeg");
	}
	else{
		header("Content-Type: video/mp4");
	}
  
	header('Content-Description: File Transfer');
	header("Content-Disposition: attachment; filename=\"" . $_GET["file"] . "\"");
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . filesize("../media/".$_GET["file"]));
	
	ob_clean();
	flush();
	readfile("../media/" . $_GET["file"]);
	
	//header("Location: ../galeria.php");
	*/
	
	if (!isset($_GET['file']) || empty($_GET['file'])) {
	 exit();
	}
		$root = "../media/";
		$file = basename($_GET['file']);
		$path = $root.$file;
		$type = '';
	 
	if (is_file($path)) {
	
		$size = filesize($path);
		 if (function_exists('mime_content_type')) {
			$type = mime_content_type($path);
		 } else if (function_exists('finfo_file')) {
			 $info = finfo_open(FILEINFO_MIME);
			 $type = finfo_file($info, $path);
			 finfo_close($info);
		 }
		 if ($type == '') {
			$type = "application/force-download";
		 }
		 // Definir headers
		 header("Content-Type: $type");
		 header("Content-Disposition: attachment; filename=$file");
		 header("Content-Transfer-Encoding: binary");
		 header("Content-Length: " . $size);		 		 
		 // Descargar archivo
		 readfile($path);
		 
		
		 		 
	} 
	else {
		die("El archivo no existe.");
	}
		 		
?>
