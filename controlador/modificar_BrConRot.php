<?php

session_start();
include("../conexion.php");

$query1 = "SELECT brightness,contrast,rotation FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$linea = $mysqli->query($query1);
$registro = $linea->fetch_assoc();

if(empty($_POST['brillo'])){
	$brillo=$registro['brightness'];
}
else{
	$brillo=$_POST['brillo'];
}

if(empty($_POST['contraste'])){
	$contraste=$registro['contrast'];
}
else{
	$contraste= $_POST['contraste'];
}

$rotacion= $_POST['rotacion'];

$fecha = date("Y-m-d H:i:s");
$id_usuario=$_SESSION['id-usuario-logueado'];

$query2 = "INSERT INTO historial(id_usuario, id_comando, fecha)VALUES ('$id_usuario',4,'$fecha')";
$mysqli->query($query2);

$exec="/bin/sh /var/www/SecBerry/sh/options.sh ".$registro['brightness']." ".$brillo." ".$registro['contrast']." ".$contraste." ".$registro['rotation']." ".$rotacion;
system($exec);
$queryUpdate="UPDATE opciones SET brightness='$brillo', contrast='$contraste', rotation='$rotacion' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);

header("Location: ../streaming.php");
?>
