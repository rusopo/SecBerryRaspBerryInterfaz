<?php

ini_set("session.cookie_lifetime","7200");
ini_set("session.gc_maxlifetime","7200");
session_start();
include("../conexion.php");

$usuario=$_POST['usuario-inicio'];
$pass=$_POST['password-inicio'];


if(isset($_POST['boton-inicio-confirmar']) || isset($_POST['boton-inicio-confirmar-mov'])){

	$passwordCifrada=cifrarPasswordSHA1($pass);
	
	$query = "SELECT * FROM usuario WHERE alias='$usuario'"; 
	$resul = $mysqli->query($query);
	$registro = $resul->fetch_assoc();
	
	if($passwordCifrada==$registro['password']){
		
		$_SESSION['id-usuario-logueado']=$registro['id_usuario'];

		$_SESSION['mostrarPagina']=1;
		
		$file = fopen("../txt/idUsuario.txt", "w+");
		fwrite($file, $_SESSION['id-usuario-logueado']);
		fclose($file);
		
		$fecha = date("Y-m-d H:i:s");
		$id_usuario=$_SESSION['id-usuario-logueado'];
		
		$query2 = "INSERT INTO historial(id_usuario, id_comando, fecha)VALUES ('$id_usuario',1,'$fecha')";
		$mysqli->query($query2);
		
		header("Location: ../streaming.php");
		
	}	
	else{
	
		header("Location: http://morgadoluengo.com/secberry/");
	}

}


function cifrarPasswordSHA1($pass_) {

	$hashed=sha1($pass_);
	return $hashed;
}
?>
