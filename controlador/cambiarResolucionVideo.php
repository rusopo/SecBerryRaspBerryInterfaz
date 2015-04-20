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

if(strlen($registro['image_width'])==3){

	$image_width_bbdd="0".$registro['image_width'];
}
else if(strlen($registro['image_width'])==4){

	$image_width_bbdd=$registro['image_width'];
}

if(strlen($registro['image_height'])==3){

	$image_height_bbdd="0".$registro['image_height'];
}
else if(strlen($registro['image_height'])==4){

	$image_height_bbdd=$registro['image_height'];
}


if(mb_substr($width,0,1)=='0'){
	$width2=substr($width,1);
}
else{
	$width2=$width;
}

if(mb_substr($height,0,1)=='0'){
	$height2=substr($height,1);
}
else{
	$height2=$height;
}

$exec1="/bin/sh /var/www/SecBerry/sh/resolutionVideoMod.sh ".$width." ".$height." ".$image_width_bbdd." ".$image_height_bbdd." ".$registro['video_width']." ".$width2." ".$registro['video_height']." ".$height2;
system($exec1);

$queryUpdate="UPDATE opciones SET video_width='$width2', video_height='$height2' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);

?>