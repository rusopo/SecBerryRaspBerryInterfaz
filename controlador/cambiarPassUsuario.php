<?php

ini_set("session.cookie_lifetime","7200");
ini_set("session.gc_maxlifetime","7200");
session_start();
include("../conexion.php");

$passOld=htmlspecialchars(trim(strip_tags($_POST['password-old'])));
$passNew=htmlspecialchars(trim(strip_tags($_POST['password-new'])));
$passNew2=htmlspecialchars(trim(strip_tags($_POST['password-new2'])));

if(isset($_POST['boton-cambio-contrasenia'])){

	$passOldCifrada=cifrarPasswordSHA1($passOld);
	
	$query1 = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."' AND password='".$passOldCifrada."'";
	$linea = $mysqli->query($query1);
	$registro = $linea->fetch_assoc();
	
	if($passNew==$passNew2){
	
		$passNewCifrada=cifrarPasswordSHA1($passNew);
		
		$queryUpdate="UPDATE usuario SET password='$passNewCifrada' WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'";
		$mysqli->query($queryUpdate);
	
	}
	
	header("Location: ../ajustes.php");
}

function cifrarPasswordSHA1($pass_) {

	$hashed=sha1($pass_);
	return $hashed;
}

?>