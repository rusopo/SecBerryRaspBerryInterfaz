<?php

session_start();
include("../conexion.php");

$resolucion=$_POST['resolucionFoto'];

$tamanios = explode("x", $resolucion);
$width=$tamanios[0];
$height=$tamanios[1];

$query1 = "SELECT * FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$linea = $mysqli->query($query1);
$registro = $linea->fetch_assoc();

$exec1="/bin/sh /var/www/SecBerry/sh/resolution.sh ".$registro['video_width']." ".$registro['video_height']." 25 25 ".$width." ".$height;
system($exec1);

$exec2="/bin/sh /var/www/SecBerry/sh/resolutionLineasFoto.sh ".$registro['image_width']." ".$width." ".$registro['image_height']." ".$height;
system($exec2);

$queryUpdate="UPDATE opciones SET image_width='$width', image_height='$height' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);

?>