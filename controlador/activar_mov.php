<?php

session_start();
include("../conexion.php");

system("/bin/sh /var/www/SecBerry/sh/mdstart.sh");

$queryUpdate="UPDATE opciones SET motion_detection='1' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);

?>
