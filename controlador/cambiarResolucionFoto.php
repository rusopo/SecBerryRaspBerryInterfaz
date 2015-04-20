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

if(strlen($registro['video_width'])==3){

	$video_width_bbdd="0".$registro['video_width'];
}
else if(strlen($registro['video_width'])==4){

	$video_width_bbdd=$registro['video_width'];
}

if(strlen($registro['video_height'])==3){

	$video_height_bbdd="0".$registro['video_height'];
}
else if(strlen($registro['video_height'])==4){

	$video_height_bbdd=$registro['video_height'];
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

$exec1="/bin/sh /var/www/SecBerry/sh/resolutionFotoMod.sh ".$video_width_bbdd." ".$video_height_bbdd." ".$width." ".$height." ".$registro['image_width']." ".$width2." ".$registro['image_height']." ".$height2;
system($exec1);

$queryUpdate="UPDATE opciones SET image_width='$width2', image_height='$height2' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);


?>