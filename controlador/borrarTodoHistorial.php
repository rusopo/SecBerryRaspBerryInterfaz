<?php

ini_set("session.cookie_lifetime","7200");
ini_set("session.gc_maxlifetime","7200");
session_start();
include("../conexion.php");

$query1 = "DELETE FROM historial WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($query1);

?>