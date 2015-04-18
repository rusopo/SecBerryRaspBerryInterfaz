<?php

session_start();
include("../conexion.php");


$resolucion=$_POST['resolucionVideo'];

$tamanios = explode("x", $resolucion);
$width=$tamanios[0];
$height=$tamanios[1];

$query1 = "SELECT * FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$linea = $mysqli->query($query1);
$registro = $linea->fetch_assoc();

$exec1="/bin/sh /var/www/SecBerry/sh/resolution.sh ".$width." ".$height." 25 25 ".$registro['image_width']." ".$registro['image_height'];
system($exec1);

$exec2="/bin/sh /var/www/SecBerry/sh/resolutionLineasVideo.sh ".$registro['video_width']." ".$width." ".$registro['video_height']." ".$height;
system($exec2);

$queryUpdate="UPDATE opciones SET video_width='$width', video_height='$height' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);


?>