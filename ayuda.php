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
      <link type="text/css" rel="stylesheet" href="css/mystyle.css"  />

      <link href='images/Secberry_logo_solo.ico' rel='shortcut icon' type='image/x-icon'>
	  
      <meta charset="utf-8">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
       <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/jquery-scrollspy.js"></script>
	  <script type="text/javascript" src="js/smooth-scroll.js"></script>

      <script>
      	$(document).ready(function(){
      		$(".dropdown-button").dropdown({hover: false});
      		  $('.slider').slider({
      		  	indicators:false,
      		  	height:550,
      		  	interval:3000
      		  });

      		$(window).scroll(function() {

      			 if ($(document).scrollTop() == 300 ) {
      			 	 $('#features_all').fadeIn("6000");
      			 }
      			 if ($(document).scrollTop() == 2500 ) {
      			 	 $('#show1').fadeIn("6000");
      			 	 $('#show2').fadeIn("6000");
      			 }
      			
			});
			$('.parallax').parallax();
			$('.materialboxed').materialbox();
			$('.scrollspy').scrollSpy();
			$(".button-collapse").sideNav();
			 $('select').material_select();	
      	});

      	$('.collapsible').collapsible({
	      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
	    });
      	

      </script>

    </head>
    <body class="blue">

    	<?php
    	error_reporting(0);
    	if($_SESSION['mostrarPagina'] != 1){ ?>

    	<div class="row">
    		<div class="col l12 s12 m12" align="center">
    			<h5 style="color:white"><strong>Para poder visualizar la página necesita estar registrado.</strong></h5>
    		</div>
    	</div>
    	<?php } 

    	else{ ?>

		 <nav>
		    <div class="nav-wrapper  blue lighten-2">
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			  
			  <ul class="left">
				<li class="li-especial"><a href="streaming.php"><img src="images/Secberry_logo.png" alt="" height="58px" width="90px" ></a></li>
			  </ul>
			  <ul class="left hide-on-med-and-down">
				<?php $consul = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$res = $mysqli->query($consul);
							$reg = $res->fetch_assoc(); ?>
							
				<li class="li-especial li-especial-text"><i class="mdi-social-person left"></i> <?php echo $reg['nombre']." ".$reg['apellidos']?></a></li>
				<li class="li-especial li-especial-text"><i class="mdi-device-wifi-tethering left"></i> <?php echo $reg['ip_publica']?></a></li>
			  </ul>
		      <ul class="right hide-on-med-and-down">
			  
			    <li><a href="streaming.php"><i class="mdi-action-visibility li-nav-mio"></i> <strong>Streaming </strong></a></li>
				<li><a href="galeria.php"><i class="mdi-device-now-wallpaper li-nav-mio"></i><strong> Galería</strong></a></li>	
		        <li><a href="historial.php"><i class="mdi-action-assignment li-nav-mio"></i><strong> Historial</strong></a></li>
		        <li><a href="ajustes.php"><i class="small mdi-action-settings li-nav-mio"></i><strong> Ajustes</strong></a></li>
		        <li class="active"><a href="ayuda.php"><i class="mdi-action-help li-nav-mio"></i><strong> Ayuda</strong></a></li>
		        <li style="padding-right:12px"><a href="controlador/logout.php"><i class="mdi-action-exit-to-app li-nav-mio"></i><strong> Salir</strong></a></li>
		      </ul>
		      <ul class="side-nav " id="mobile-demo" >
		        <li id="Perfil" style="display:inline-block">
		        <div>
					<?php $query1 = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$resul = $mysqli->query($query1);
							$fila = $resul->fetch_assoc(); ?>
			        <div style="width:100%;text-align:center">
			        	<img class="circle" style="margin-top:7%" src="fotosPerfil/<?php echo $fila['foto'] ?>" alt="" width="40%" height="40%">
			        </div>
			        <div style="line-height:20px;margin-bottom:22px;text-align:center">			  						
							<p><strong>Nombre:</strong> <?php echo $fila['nombre']." ".$reg['apellidos']?></p>
							<p><strong>IP:</strong> <?php echo $fila['ip_publica']?></p>
			        </div>
			    </div>
		        </li>
				<li id="Streaming"><a href="streaming.php"><i class="mdi-action-visibility left"></i><strong>Streaming</strong></a></li>
				<li id="Galeria"><a href="galeria.php"><i class="mdi-device-now-wallpaper left"></i><strong>Galería</strong></a></li>
		        <li id="Registro"><a href="historial.php"><i class="mdi-action-assignment left"></i><strong>Historial</strong></a></li>
		        <li id="Ajustes"><a href="ajustes.php"><i class="small mdi-action-settings left"></i><strong>Ajustes</strong></a></li>
		        <li class="active" id="Ayuda"><a href="ayuda.php"><i class="mdi-action-help left"></i><strong>Ayuda</strong></a></li>
		        <li id="Salir"><a href="controlador/logout.php"><i class="mdi-action-exit-to-app left"></i><strong>Salir</strong></a></li>
		      </ul>
		    </div>
		  </nav>
			
		<div><!--container-->
			<div class="row">
				<div class="col s12 l6 offset-l3 z-depth-2 " >
					
					<ul class="collection blue ">
						<li class="collection-header white-text" style="text-align:center"  style="text-align:center"><h4><strong>
							PREGUNTAS FRECUENTES
							</strong></h4></li>
					</ul>
					<ul class="collapsible" data-collapsible="accordion">
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Cómo se realiza una foto o un vídeo?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>Dentro de la ventana "Streaming", para obtener una foto, hay que pulsar sobre el botón con el símbolo de una cámara.<br>
					      	Para comenzar la grabación de un vídeo, hay que pulsar el botón de la cámara de vídeo. En ese momento se comienza a grabar. Para pararlo, pulsamos el nuevo botón de STOP que aparece en la misma posición.
					      </p>
					      </div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda" style="background-color:#eeeeee"><i class="mdi-action-help"></i><strong>¿Qué ocurre cuando activamos la detección de movimiento?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>Una vez activada la detección de movimiento en la ventana "Streaming", entra en funcionamiento el módulo de Motion, cuyo objetivo es que, en el momento en el que se detecta movimiento, se envía un correo al usuario. En ese instante se realiza una foto y un vídeo de unos 10 segundos.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Se puede realizar una foto o un vídeo con la detección de movimiento activada?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>No, no es posible realizar una foto o un vídeo cuando la detección de movimiento se encuentra activada. Como se puede observar, los botones correspondientes se encuentran desactivados.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda" style="background-color:#eeeeee"><i class="mdi-action-help"></i><strong>¿Cómo funciona el cambio de parámetros?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>Si usted desea cambiar los parámetros de imágen disponible, como el brillo,contraste o la rotación, lo puede hacer desde la ventana "Streaming". Los cambios se pueden realizar todos a la vez o sólo el que desee modificar. Una vez escogido el/los nuevo/s parámetro/s, tiene que pulsar en modificar para que se realicen los cambios pertinentes.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Cómo funciona la galería?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En la galería usted podrá visualizar por separado los vídeos y las imágenes almacenados en el sistema. Cada imágen o vídeo tiene tres opciones que poder realizar: descargar, eliminar y compartir.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda" style="background-color:#eeeeee"><i class="mdi-action-help"></i><strong>¿Qué opciones puede realizar el usuario con una foto o un vídeo en la galería?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En cada foto o vídeo usted puede: <br>
					      	Descargar: Si acepta, el archivo se descargará en su dispositivo. <br>
					      	Eliminar: Si acepta, eliminará este archivo y no lo podrá recuperar.<br>
					      	Compartir: Podrá compartir el archivo en estas redes sociales: Facebook,Twitter o Google+.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Para qué sirve el historial?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En la ventana de historial se recogerán los movimientos de Conexión, Foto, Video, Modificación de parámetros, Correo, Activación y desactivación de movimiento y Desconexión. Se ordenarán por fecha de manera descendente.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda" style="background-color:#eeeeee"><i class="mdi-action-help"></i><strong>¿Qué podemos encontrar en la ventana de ajustes?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En ajustes podemos ver información de varios tipos: Un apartado de información personal del usuario, otro apartado para cambiar la resolución de la foto o el streaming/vídeo y otro apartado de ajustes avanzados.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Cómo puedo realizar el cambio de contraseña?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En ajustes encontraremos un apartado para realizar el cambio de contraseña. Hay que pulsar sobre el botón y rellenar el formulario, que te pide la contraseña antigua y la nueva que desea poner. Una vez rellenado, para ejecutar el cambio hay que pulsar en el botón de confirmar.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda" style="background-color:#eeeeee"><i class="mdi-action-help"></i><strong>¿Es lo mismo la resolución de foto que la de vídeo?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En ajustes podemos ver que hay dos resoluciones distintas. La resolución de la foto afecta a la calidad de la imagen al ser descargada.
					      La resolución de Streaming/vídeo afecta a la calidad, tanto del streaming, como del vídeo almacenado al ser descargado.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Se pueden borrar todas las fotos, los vídeos o el historial completo?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p> Si. Para elminar por completo una de éstas tres opciones, sólo tiene que ir a la ventana de ajustes. En el apartado "Avanzados" encontrará las tres posibilidades.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda" style="background-color:#eeeeee"><i class="mdi-action-help"></i><strong>¿Qué hacer en caso de bloqueo del sistema?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p> Si a usted se le bloquea el sistema o el streaming vaya a la ventana de ajustes y tendrá dos opciones: <br>
					       Reiniciar: el sistema se reiniciará y volvera a encenderse y todo volverá a la normalidad al cabo de 1 ó 2 minutos.<br>
					       Apagar: el sistema se apagará y para poder volver a encenderlo necesita realizarlo fisicamente, quitando el cable y volviendolo a conectar.
					      </p></div>
					    </li>
					  </ul>

				</div>
			</div>
  		</div><!--container-->

  		<?php } ?>
    </body>
  </html>