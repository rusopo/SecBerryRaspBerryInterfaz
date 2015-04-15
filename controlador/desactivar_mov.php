<?php

session_start();
include("../conexion.php");

system("/bin/sh /var/www/SecBerry/sh/mdstop.sh");

$queryUpdate="UPDATE opciones SET motion_detection='0' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($queryUpdate);

?>
