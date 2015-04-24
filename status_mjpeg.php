<?php

  // send content
  $contenido = "";
  for($i=0; $i<30; $i++) {
    $nombre_fichero = "/var/www/SecBerry/status_mjpeg.txt";
	$archivo = fopen($nombre_fichero, "w+");
	$contenido = fread($archivo, filesize($nombre_fichero));
	
    if($contenido != $_GET["last"]) break;
    usleep(100000);
  }
  
  fwrite($file, $contenido);
  
  fclose($archivo);
?>
