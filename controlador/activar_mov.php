<?php

session_start();
include("../conexion.php");

$fecha = date("Y-m-d H:i:s");
$id_usuario=$_SESSION['id-usuario-logueado'];

$query2 = "INSERT INTO historial(id_usuario, id_comando, fecha)VALUES ('$id_usuario',6,'$fecha')";
$mysqli->query($query2);

system("/bin/sh /var/www/SecBerry/sh/mdstart.sh");

$queryUpdate="UPDATE opciones SET motion_detection='1' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);

?>
