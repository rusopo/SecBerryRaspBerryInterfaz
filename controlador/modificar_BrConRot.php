<?php

session_start();
include("../conexion.php");

$brillo=$_POST['brillo'];
$contraste= $_POST['contraste'];
$rotacion= $_POST['rotacion'];

$query1 = "SELECT brightness,contrast,rotation FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$linea = $mysqli->query($query1);
$registro = $linea->fetch_assoc();

$exec="/bin/sh /var/www/SecBerry/sh/options.sh ".$registro['brightness']." ".$brillo." ".$registro['contrast']." ".$contraste." ".$registro['rotation']." ".$rotacion;
system($exec);
$queryUpdate="UPDATE opciones SET brightness='$brillo', contrast='$contraste', rotation='$rotacion' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);

header("Location: ../streaming.php");
?>
