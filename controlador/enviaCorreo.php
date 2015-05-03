<?php

session_start();
include("/var/www/SecBerry/conexion.php");

$nombre_fichero = "/var/www/SecBerry/txt/idUsuario.txt";
$archivo = fopen($nombre_fichero, "r");
$contenido = fread($archivo, filesize($nombre_fichero));
fclose($archivo);

$query1 = "SELECT * FROM usuario WHERE id_usuario='".$contenido."'";

$resul = $mysqli->query($query1);

$fila = $resul->fetch_assoc();

$fecha = date("Y-m-d H:i:s");
$id_usuario=$contenido;

$query2 = "INSERT INTO historial(id_usuario, id_comando, fecha)VALUES ('$id_usuario',5,'$fecha')";
$mysqli->query($query2);

system("/bin/sh /var/www/SecBerry/sh/mailing.sh " .$fila['correo']);

?>
