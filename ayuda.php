<?php
	session_start(); 
	include("conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/mystyle.css"  />
	  
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

		 <nav>
		    <div class="nav-wrapper  blue lighten-1 ">
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			  
			  <ul class="left">
				<li class="li-especial"><a href="streaming.php"><img src="images/Secberry_logo.png" alt="" height="58px" width="90px" ></a></li>
			  </ul>
			  <ul class="left hide-on-med-and-down">
				<?php $consul = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$res = $mysqli->query($consul);
							$reg = $res->fetch_assoc(); ?>
							
				<li class="li-especial li-especial-text"><i class="mdi-social-person"></i> <?php echo $reg['nombre']?></a></li>
				<li class="li-especial li-especial-text"><i class="mdi-action-info-outline"></i> <?php echo $reg['clave_producto']?></a></li>
			  </ul>
		      <ul class="right hide-on-med-and-down">
			  
			    <li><a href="streaming.php"><i class="mdi-action-visibility"></i> Streaming</a></li>
				<li><a href="galeria.php"><i class="mdi-device-now-wallpaper"></i> Galería</a></li>	
		        <li><a href="historial.php"><i class="mdi-action-assignment"></i> Historial</a></li>
		        <li><a href="ajustes.php"><i class="small mdi-action-settings"></i> Ajustes</a></li>
		        <li><a href="ayuda.php"><i class="mdi-action-help"></i> Ayuda</a></li>
		        <li><a href="controlador/logout.php"><i class="mdi-action-exit-to-app"></i> Salir</a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo" >
		        <li id="Perfil" style="display:inline-block">
		        <div>
					<?php $query1 = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$resul = $mysqli->query($query1);
							$fila = $resul->fetch_assoc(); ?>
			        <div style="width:100%;text-align:center">
			        	<img class="circle" style="margin-top:7%" src="fotosPerfil/<?php echo $fila['foto'] ?>" alt="" width="40%" height="40%">
			        </div>
			        <div style="line-height:20px;margin-bottom:22px;text-align:center">			  						
							<p>Nombre: <?php echo $fila['nombre']?></p>
							<p>ID: <?php echo $fila['clave_producto']?></p>
			        </div>
			    </div>
		        </li>
		        <li id="Streaming"><i class="mdi-action-visibility"></i><a href="streaming.php">Streaming</a></li>
				<li id="Galeria"><i class="mdi-device-now-wallpaper"></i><a href="galeria.php">Galería</a></li>
		        <li id="Registro"><i class="mdi-action-assignment"></i><a href="historial.php">Historial</a></li>
		        <li id="Ajustes"><i class="small mdi-action-settings"></i><a href="ajustes.php">Ajustes</a></li>
		        <li id="Ayuda"><i class="mdi-action-help"></i><a href="ayuda.php">Ayuda</a></li>
		        <li id="Salir"><i class="mdi-action-exit-to-app"></i><a href="controlador/logout.php">Salir</a></li>
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
					      <div class="collapsible-body cuerpo-li-ayuda"><p>Para poder realizar una foto: Ventana Streaming -> pulsamos sobre el botón con el símbolo de una cámara.<br>
					      	Para realizar un vídeo se sigue los mismos pasos pero pulsamos el botón de una cámara de vídeo, en ese momento se comienza a grabar y para pararlo pulsamos el nuevo botón de STOP que aparece.
					      </p>
					      </div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Qué pasa cuando activamos la detección de movimiento?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>Una vez activado en la ventana Streaming la detección de movimiento, entra en funcionamiento el módulo de Motion cuyo objetivo es en el momento que se detecta un movimiento se envía un correo al usuario indicando que se ha producido un movimiento, en ese instante se realiza una foto y un vídeo de unos 10 segundos.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Se puede realizar una foto o un vídeo con la detección de movimiento activada?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>No, no es posible realizar una foto o un vídeo en el momento que la detección de movimiento se encuentra activada. Como se puede observar los botones correspondientes se encuentran desactivados.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Cómo funciona el cambio de parámetros?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>Si usted desea cambiar los parámetros disponibles como el brillo,contraste o la rotación del streaming lo puede hacer desde la ventana de streaming. Los cambios se pueden realizar todos a la vez o solo el que desee modificar, una vez escogido el nuevo parámetro tiene que pulsar en modificar para que se realicen los cambios pertinentes.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Cómo funciona la galería?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En la galería usted podrá visualizar por separado los vídeos y las imágenes. Como se puede observar en cada una por separado tiene tres opciones que poder realizar: descargar, eliminar y compartir.</p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Qué opciones puede realizar el usuario con una foto o un vídeo en la galería?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En cada foto o vídeo usted puede: <br>
					      	Descargar: Si pulsa a que sí el archivo se descargará en su dispositivo. <br>
					      	Eliminar: Si pulsa a que sí eliminará este archivo y no lo podrá recuperar.<br>
					      	Compartir: Podrá elegir a compartir este archivo en estas redes sociales: Facebook,Twitter, Google+.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Para qué sirve el historial?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En la ventana de historial se recogerán los movimientos de Conexión,Foto,Video,Modificación de parámetros,Correo, Activación y desactivación de movimiento,Desconexión. Se ordenarán por fecha de manera descendente.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Qué podemos encontrar en la ventana de ajustes?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En ajustes podemos ver información de varios tipos, un apartado de información personal del usuario. Otro apartado para cambiar la resolución de la foto o el streaming/vídeo y otro apartado de ajustes avanzados.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Cómo puedo realizar el cambio de contraseña?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En ajustes encontraremos un apartado para realizar el cambio de contraseña, pulsamos sobre el botón y rellenamos el formulario, que te pide la contraseña antigua y la nueva que desea poner. Una vez rellenado para ejecutar el cambio pulsamos en el botón de confirmar.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Es lo mismo la resolución de foto que la de vídeo?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p>En ajustes podemos ver que hay dos resoluciones distintas, eso es porque la resolución de la foto significa la resolución que tendrá la imagen al ser descargada.
					      La resolución de Streaming/vídeo significa la resolución aparte la que tendra al ser descargado también es la que tendrá el streaming en vivo.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Se pueden borrar todas las fotos, los vídeos o el historial completo?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p> Si, si usted desea eliminar uno de éstas tres opciones solo tiene que ir a la ventana de ajustes en el apartado de avanzados en la que encontrará las tres posibilidades, según la que realice tendrá una confirmación previa.
					      </p></div>
					    </li>
					    <li>
					      <div class="collapsible-header cabecera-li-ayuda"><i class="mdi-action-help"></i><strong>¿Qué hacer en caso de bloqueo del sistema?</strong></div>
					      <div class="collapsible-body cuerpo-li-ayuda"><p> Si a usted se le bloquea el sistema o el streaming vaya a la ventana de ajustes y tendrá dos opciones: <br>
					       Reiniciar: el sistema se reiniciará y volvera a encenderse y todo volverá al cabo de 1 ó 2 minutos.<br>
					       Apagar: el sistema se apagará y para poder volver a encenderlo necesita realizarlo fisicamente, quitando el cable y volviendolo a conectar.
					      </p></div>
					    </li>
					  </ul>

				</div>
			</div>
  		</div><!--container-->
    </body>
  </html>