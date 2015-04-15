<?php

$mysqli = new mysqli("localhost", "root", "", "secberry");
if ($mysqli->connect_errno) {
    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/*
$mysqli = new mysqli("mysql.hostinger.es", "u109200527_secbe", "S3cberry", "u109200527_secbe");
if ($mysqli->connect_errno) {
    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
*/

/*
$con = mysql_connect("mysql.hostinger.es","u109200527_secbe","S3cberry") or
die("Error en conexión al servidor MySQL: ".mysql_error()); 

	mysql_select_db("u109200527_secbe",$con)or
die ("Error: No se puede usar la base de datos. ".mysql_error());


$con = mysql_connect("localhost","root") or
die("Error en conexión al servidor MySQL: ".mysql_error()); 

	mysql_select_db("secberry",$con)or
die ("Error: No se puede usar la base de datos. ".mysql_error());
*/
?>
