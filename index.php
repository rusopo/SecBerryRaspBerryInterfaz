<?php
	
	ini_set("session.cookie_lifetime","7200");
	ini_set("session.gc_maxlifetime","7200");
	session_start(); 
	include("conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
	  
	  <title>SecBerry</title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/mystyle.css"/>

      <link href='images/Secberry_logo_solo.ico' rel='shortcut icon' type='image/x-icon'>
	  
      <meta charset="utf-8">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
       
	  <script src="js/script.js"></script>
	  
	   <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/jquery-scrollspy.js"></script>
	  <script type="text/javascript" src="js/smooth-scroll.js"></script>
	
	
	 <script>
		 $(document).ready(function(){
			$('#modal-inicial').openModal({
			  dismissible: false, // Modal can be dismissed by clicking outside of the modal
			  opacity: .5, // Opacity of modal background			  
			  out_duration: 200, // Transition out duration			  
			});
			
			$('#modal-inicial2').openModal({
			  dismissible: false, // Modal can be dismissed by clicking outside of the modal
			  opacity: .5, // Opacity of modal background			  
			  out_duration: 200, // Transition out duration			  
			});
		 });
	 </script>
     
  </head>
  
  <body class="cuerpo-index blue">
  
	<div class="row" id="no-resp">
		<!-- Modal Structure -->
		  <div id="modal-inicial" class="modal">
			<div class="modal-content">
				<div class="row">
					<div class="col s12 m12 l12">				
					  <div class="col s4 m4 l4">
						<img id="logo-inicio" src="images/Secberry_logo.png" alt="" >
					  </div>
					  <div class="col s8 m8 l8">
					    <div class="row text-inicio1">
							<h5>Por razones de seguridad, es necesario verificar su cuenta</h5>
						</div>
						<div class="row text-inicio2">
							<form action="controlador/verificar-login.php" method="POST">
								<div class="input-field col s10 m10 l10">
								  <input id="usuario-inicio" type="text" name="usuario-inicio" class="validate">
								  <label for="usuario-inicio">Usuario</label>
								</div>
								<div class="input-field col s10 m10 l10">
								  <input id="password-inicio" type="password" name="password-inicio" class="validate">
								  <label for="password-inicio">Contraseña</label>
								</div>
								<div class="col s10 m10 l10" align="center">
									<button id="boton-inicio-confirmar" class="btn waves-effect waves-light " type="submit" name="boton-inicio-confirmar">Confirmar<i class="mdi-content-send right"></i></button>
								</div>
							</form>
						</div>
					  </div>
					</div>
				</div>
			</div>
		  </div>
		
		</div>
		<div class="row" id="resp">
			<!-- Modal Structure -->
		  <div id="modal-inicial2" class="modal">
			<div class="modal-content">
				<div class="row">
					<div class="col s12 ">				
					  <div class="col s12" align="center">
						<img id="logo-inicio-movil" src="images/Secberry_logo.png" alt="" >
					  </div>
					  <div class="col s12">
					    <div class="row">
							<p>Por razones de seguridad, es necesario verificar su cuenta</p>
						</div>
						<div class="row div-inicio-mov">
							<form action="controlador/verificar-login.php" method="POST">
								<div class="input-field col s12">
								  <input id="usuario-inicio" type="text" name="usuario-inicio" class="validate">
								  <label for="usuario-inicio">Usuario</label>
								</div>
								<div class="input-field col s12">
								  <input id="password-inicio" type="password" name="password-inicio" class="validate">
								  <label for="password-inicio">Contraseña</label>
								</div>
								<div class="col s12" align="center">
									<button id="boton-inicio-confirmar-mov" class="btn waves-effect waves-light" type="submit" name="boton-inicio-confirmar"><i class="mdi-content-send right"></i>Confirmar</button>
								</div>
							</form>
						</div>
					  </div>
					</div>
				</div>
			</div>	
		</div>
    </body>
  </html>
