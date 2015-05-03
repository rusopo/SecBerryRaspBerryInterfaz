<?php

session_start();
include("../conexion.php");

$query1 = "DELETE FROM historial WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
$mysqli->query($query1);

?>