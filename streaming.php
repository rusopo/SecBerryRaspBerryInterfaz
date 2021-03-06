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
			$('.collapsible').collapsible();
			 
      	});


      
      </script>

  
	<script type="text/javascript">
			$(document).ready(function(){			
				$(".boton-activar-mov").click(function(){
					$(".boton-activar-mov").addClass("disabled");
					$(".boton-activar-mov").addClass("desactivar-button");
					$(".boton-desactivar-mov").removeClass("disabled");
					$(".boton-desactivar-mov").removeClass("desactivar-button");
					$(".boton-foto").addClass("disabled");
					$(".boton-foto").addClass("desactivar-button");
					$(".boton-iniciar-video").addClass("disabled");
					$(".boton-iniciar-video").addClass("desactivar-button");
					
					$.get( "controlador/activar_mov.php", function( data ){});
					
					$(".texto-estado").text("Detección de movimiento activado");
								
				});
				
				$(".boton-desactivar-mov").click(function(){
					$(".boton-desactivar-mov").addClass("disabled");
					$(".boton-desactivar-mov").addClass("desactivar-button");
					$(".boton-activar-mov").removeClass("disabled");
					$(".boton-activar-mov").removeClass("desactivar-button");
					$(".boton-foto").removeClass("disabled");
					$(".boton-foto").removeClass("desactivar-button");
					$(".boton-iniciar-video").removeClass("disabled");
					$(".boton-iniciar-video").removeClass("desactivar-button");
										
					$.get( "controlador/desactivar_mov.php", function( data ){});
					
					$(".texto-estado").text("Streaming");
				});
			});
	</script>
	
	<script>
		$(document).ready(function(){

				if($(".boton-activar-mov").hasClass('disabled')){
				
					$(".texto-estado").text("Detección de movimiento activado");										
				}
				else{					
					$(".texto-estado").text("Streaming");
					}
				
				$(".boton-foto").click(function(){	
				
					$(".texto-estado").text("Capturando foto...");

					$(this).addClass("disabled");
					$(this).addClass("desactivar-button");
					$(".boton-iniciar-video").addClass("disabled");
					$(".boton-iniciar-video").addClass("desactivar-button");
					
					$.get( "controlador/hacerFoto.php", function( data ){});
					
					setTimeout(function() {
					    //do something special 
						if($(".boton-activar-mov").hasClass('disabled')){

							$(".boton-foto").removeClass("disabled");
							$(".boton-foto").removeClass("desactivar-button");
							$(".boton-iniciar-video").removeClass("disabled");
							$(".boton-iniciar-video").removeClass("desactivar-button");
							$(".texto-estado").text("Detección de movimiento activado");										
						}
						else{
							$(".boton-foto").removeClass("disabled");
							$(".boton-foto").removeClass("desactivar-button");
							$(".boton-iniciar-video").removeClass("disabled");
							$(".boton-iniciar-video").removeClass("desactivar-button");					
							$(".texto-estado").text("Streaming");
						}
					  }, 2000);
												
					
				});
				
				$(".boton-iniciar-video").click(function(){
					$(".boton-iniciar-video").css({ display: "none"});
					$(".boton-parar-video").css({ display: "block"});
										
					$.get( "controlador/iniciarVideo.php", function( data ){});
					
					$(".texto-estado").text("Grabando vídeo...");

					$(".boton-foto").addClass("disabled");
					$(".boton-foto").addClass("desactivar-button");
				});
				
				$(".boton-parar-video").click(function(){				
					$(".boton-parar-video").css({ display: "none"});
					$(".boton-iniciar-video").css({ display: "block"});
					
					$.get( "controlador/pararVideo.php", function( data ){});

					$(".boton-foto").removeClass("disabled");
					$(".boton-foto").removeClass("desactivar-button");
					
					if($(".boton-activar-mov").hasClass('disabled')){
					
						$(".texto-estado").text("Detección de movimiento activado");										
					}
					else{					
						$(".texto-estado").text("Streaming");
					}
								
				});
			
			});
				
	</script>
	
    </head>
    <body onload="setTimeout('init();',100);" class="cuerpo-index blue ">

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

		    <div class="nav-wrapper blue lighten-2 scrollspy">
		      
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			  
			  <ul class="left">
				<li class="li-especial"><a href="streaming.php"><img src="images/Secberry_logo.png" class="logo-principal" alt="SecBerry" ></a></li>
			  </ul>
			  <ul class="left hide-on-med-and-down">
				<?php $consul = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$res = $mysqli->query($consul);
							$reg = $res->fetch_assoc(); ?>
							
				<li class="li-especial li-especial-text"><i class="mdi-social-person left"></i> <?php echo $reg['nombre']." ".$reg['apellidos']?></a></li>
				<li class="li-especial li-especial-text"><i class="mdi-device-wifi-tethering left"></i> <?php echo $reg['ip_publica']?></a></li>
			  </ul>
		      <ul class="right hide-on-med-and-down">
			  
			    <li class="active"><a href="streaming.php"><i class="mdi-action-visibility li-nav-mio"></i> <strong>Streaming </strong></a></li>
				<li><a href="galeria.php"><i class="mdi-device-now-wallpaper li-nav-mio"></i><strong> Galería</strong></a></li>	
		        <li><a href="historial.php"><i class="mdi-action-assignment li-nav-mio"></i><strong> Historial</strong></a></li>
		        <li><a href="ajustes.php"><i class="small mdi-action-settings li-nav-mio"></i><strong> Ajustes</strong></a></li>
		        <li><a href="ayuda.php"><i class="mdi-action-help li-nav-mio"></i><strong> Ayuda</strong></a></li>
		        <li style="padding-right:12px"><a href="controlador/logout.php"><i class="mdi-action-exit-to-app li-nav-mio"></i><strong> Salir</strong></a></li>
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
							<p><strong>Nombre:</strong> <?php echo $fila['nombre']." ".$reg['apellidos']?></p>
							<p><strong>IP:</strong> <?php echo $fila['ip_publica']?></p>
			        </div>
			    </div>
		        </li>
				<li class="active" id="Streaming"><a href="streaming.php"><i class="mdi-action-visibility left"></i><strong>Streaming</strong></a></li>
				<li id="Galeria"><a href="galeria.php"><i class="mdi-device-now-wallpaper left"></i><strong>Galería</strong></a></li>
		        <li id="Registro"><a href="historial.php"><i class="mdi-action-assignment left"></i><strong>Historial</strong></a></li>
		        <li id="Ajustes"><a href="ajustes.php"><i class="small mdi-action-settings left"></i><strong>Ajustes</strong></a></li>
		        <li id="Ayuda"><a href="ayuda.php"><i class="mdi-action-help left"></i><strong>Ayuda</strong></a></li>
		        <li id="Salir"><a href="controlador/logout.php"><i class="mdi-action-exit-to-app left"></i><strong>Salir</strong></a></li>
		      </ul>
		    </div>
		  </nav>
		

		  <div><!--container-->
			<div class="row" id="no-resp">
				<div class="col m3 l3 " style="margin-top:5%">
					<div class="row">
						<h5 style="color:white;text-align:center">Parámetros</h5>
						<?php
							$query2 = "SELECT * FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$resul2 = $mysqli->query($query2);
							$registro = $resul2->fetch_assoc();
						?>
						<div class="col s12 m12 l12">
							<form action="controlador/modificar_BrConRot.php" method="POST">
							  <div class="row">
								<div class="col s3 m3 l3">
									<p class="text-BrConRot">Brillo</p>
								</div>
								<div class="col s8 ofsset-s1 m8 offset-m1 l8 offset-l1">
									<p class="range-field">
									  <input type="range" class="brillo" name="brillo" min="0" max="100" value="<?php echo $registro['brightness']?>" />
									</p>
								</div>
							  </div>
							  <div class="row">
								<div class="col s3 m3 l3">
									<p class="text-BrConRot">Contraste</p>
								</div>
								<div class="col s8 ofsset-s1 m8 offset-m1 col l8 offset-l1">
									<p class="range-field">
									  <input type="range" class="contraste" name="contraste" min="-100" max="100" value="<?php echo $registro['contrast']?>"/>
									</p>
								</div>
							  </div>
							  <div class="row">
								<div class="col s3 m3 l3">
									<p class="text-BrConRot">Rotación</p>
								</div>
								<div class="col s8 ofsset-s1 m8 offset-m1 col l8 offset-l1">
										<select class="browser-default rotacion" name="rotacion">
										  <option <?php if($registro['rotation']==0){echo("selected ");}?> value="0">0</option>
										  <option <?php if($registro['rotation']==90){echo("selected ");}?> value="90">90</option>
										  <option <?php if($registro['rotation']==180){echo("selected ");}?>value="180">180</option>
										  <option <?php if($registro['rotation']==270){echo("selected ");}?> value="270">270</option>
										</select>
								 
								</div>
							  </div>
							  <div class="row">
								<div class="col s12 m12 l12" align="center">
									<button type="submit" class="lighten-1 waves-effect waves-light btn purple" style="margin-top:5%"><i class="mdi-editor-mode-edit left"></i>Modificar</button>
								</div>
							  </div>						  
							</form>
						</div>
					</div>
				</div>
				<div class="col s6 m6 l6" style="margin-top:2%">
					<div><img id="mjpeg_dest" class="zoom-imagen" onclick="toggle_fullscreen(this);"/></div>
					<div class="col s12 m12 l12" style="font-weight:bold" align="center">
						<h5 class="texto-estado" style="color:#FFFFFF"><h5>
					</div>
					
					<div class="col s12 m12 l12" style="margin-top:1%" align="center">
						<?php if($registro['motion_detection']==0){ ?>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-foto waves-effect waves-light btn btn-large " style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-image-camera-alt"></i></a>
							</div>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-iniciar-video lighten-1 waves-effect waves-light btn btn-large red lighten-1" style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-av-videocam"></i></a>
								<a class="boton-parar-video lighten-1 waves-effect waves-light btn btn-large red lighten-1" style="width:100%;text-align:center;margin-bottom:0px;display:none"><i class="mdi-av-stop"></i></a>
							</div>
						<?php }
						else if($registro['motion_detection']==1){ ?>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-foto waves-effect waves-light btn btn-large desactivar-button disabled" style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-image-camera-alt"></i></a>
							</div>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-iniciar-video lighten-1 waves-effect waves-light btn btn-large red lighten-1 desactivar-button disabled" style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-av-videocam"></i></a>
								<a class="boton-parar-video lighten-1 waves-effect waves-light btn btn-large red lighten-1" style="width:100%;text-align:center;margin-bottom:0px;display:none"><i class="mdi-av-stop"></i></a>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="col s3 m3 l3" style="margin-top:6%">
					<div class="row">
						<div class="col s12 m12 l12" align="center">
							
							<div class="row">
								<h4 style="color:white">Detección de movimiento</h4>
							</div>
								
								<?php $query4 = "SELECT * FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
								$resul4 = $mysqli->query($query4);
								$register = $resul4->fetch_assoc(); ?>
								
								<?php if($register['motion_detection']==0){ ?>
								<div class="row">
									<a id="boton-activar-movimiento" class="waves-effect waves-light btn boton-activar-mov"><i class="mdi-navigation-check left"></i>Activar</a>
								</div>
								<div class="row">
									<a id="boton-desactivar-movimiento" class="waves-effect waves-light btn red disabled desactivar-button boton-desactivar-mov"><i class="mdi-navigation-close left"></i>Desactivar</a>
								</div>
								<?php } 
								else if($register['motion_detection']==1){ ?>
								<div class="row">
									<a id="boton-activar-movimiento" class="waves-effect waves-light btn boton-activar-mov disabled activar-button"><i class="mdi-navigation-check left"></i> Activar</a>
								</div>
								<div class="row">
								    <a id="boton-desactivar-movimiento" class="waves-effect waves-light btn red boton-desactivar-mov"><i class="mdi-navigation-close left"></i> Desactivar</a>
								</div>
								<?php } ?>
						</div>
					</div>
				</div>
			</div>


			<div class="row" id="resp" align="center">
				
				<div class="col s12 l12 m12" style="margin-top:2%;" align="center">
					<h5 style="color:white"> Detección de movimiento </h5>
				</div>				
				
				<?php $query5 = "SELECT * FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$resul5 = $mysqli->query($query5);
							$register2 = $resul5->fetch_assoc(); ?>
							
					<?php if($register['motion_detection']==0){ ?>
					<div class="col s12 l12 m12" style="margin-top:1%;" align="center">
						<div class="col s6 l6 m6" align="center">
							<a id="boton-activar-movimiento-mov" class="waves-effect waves-light btn boton-activar-mov "><i class="mdi-navigation-check"></i></a>
						</div>
						<div class="col s6 l6 m6" align="center">
							<a id="boton-desactivar-movimiento-mov" class="waves-effect waves-light btn red disabled desactivar-button boton-desactivar-mov"><i class="mdi-navigation-close"></i></a>
						</div>
					</div>
					<?php } 
							else if($register['motion_detection']==1){ ?>
					<div class="col s12 l12 m12" style="margin-top:1%;" align="center">
						<div class="col s6 l6 m6" align="center">
							<a id="boton-activar-movimiento-mov" class="waves-effect waves-light btn boton-activar-mov disabled activar-button"><i class="mdi-navigation-check"></i></a>
						</div>
						<div class="col s6 l6 m6" align="center">
							<a id="boton-desactivar-movimiento-mov" class="waves-effect waves-light btn red boton-desactivar-mov"><i class="mdi-navigation-close"></i></a>
						</div>
					</div>
					<?php } ?>
				
			
				<div class="col s12 l12 m12">
					<div><img id="mjpeg_dest2" width="100%" class="zoom-imagen" onclick="toggle_fullscreen(this);"/></div>
					
					<div class="col s12 m12 l12" style="font-weight:bold" align="center">
						<h5 class="texto-estado" style="color:#FFFFFF;font-size:18px"><h5>
					</div>
					
					<div class="col s12 m12 l12" style="margin-top:2%" align="center">
						<?php if($register['motion_detection']==0){ ?>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-foto waves-effect waves-light btn" style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-image-camera-alt"></i></a>
							</div>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-iniciar-video lighten-1 waves-effect waves-light btn red lighten-1" style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-av-videocam"></i></a>
								<a class="boton-parar-video lighten-1 waves-effect waves-light btn red lighten-1" style="width:100%;text-align:center;margin-bottom:0px;display:none"><i class="mdi-av-stop"></i></a>
							</div>
						<?php }
						else if($register['motion_detection']==1){ ?>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-foto waves-effect waves-light btn boton-desactivar-mov disabled" style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-image-camera-alt"></i></a>
							</div>
							<div class="col s6 m6 l6" align="center">
								<a class="boton-iniciar-video lighten-1 waves-effect waves-light btn red lighten-1 boton-desactivar-mov disabled" style="width:100%;text-align:center;margin-bottom:0px"><i class="mdi-av-videocam"></i></a>
								<a class="boton-parar-video lighten-1 waves-effect waves-light btn red lighten-1" style="width:100%;text-align:center;margin-bottom:0px;display:none"><i class="mdi-av-stop"></i></a>
							</div>
						<?php } ?>
					</div>
				</div>
				
				<div class="col s12 l12 m12" style="margin-top:5%">
						
						<h5 style="color:white;text-align:center">Parámetros</h5>
						<?php
							$query3 = "SELECT * FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$resul3 = $mysqli->query($query3);
							$regis = $resul3->fetch_assoc();
						?>
						<div class="col s12 m12 l12" style="margin-top:5%">
							<form action="controlador/modificar_BrConRot.php" method="POST">
							  <div class="row">
								<div class="col s3 m3 l3">
									<p class="text-BrConRot-mov">Brillo</p>
								</div>
								<div class="col s9 m9 l9">
									<p class="range-field">
									  <input type="range" class="brillo" name="brillo" min="0" max="100" value="<?php echo $regis['brightness']?>"/>
									</p>
								</div>
							  </div>
							  <div class="row">
								<div class="col s3 m3 l3">
									<p class="text-BrConRot-mov">Contraste</p>
								</div>
								<div class="col s9 m9 l9">
									<p class="range-field">
									  <input type="range" class="contraste" name="contraste" min="-100" max="100" value="<?php echo $regis['contrast']?>"/>
									</p>
								</div>
							  </div>
							  <div class="row">
								<div class="col s3 m3 l3">
									<p class="text-BrConRot-mov">Rotación</p>
								</div>
								<div class="col s9 m9 l9">
										<select class="browser-default rotacion" name="rotacion">
										  <option <?php if($registro['rotation']==0){echo("selected ");}?> value="0">0</option>
										  <option <?php if($registro['rotation']==90){echo("selected ");}?> value="90">90</option>
										  <option <?php if($registro['rotation']==180){echo("selected ");}?>value="180">180</option>
										  <option <?php if($registro['rotation']==270){echo("selected ");}?> value="270">270</option>
										</select>
								</div>
							  </div>
							  <div class="row">
								<div class="s12 m12 l12" align="center">
									<button type="submit" class="lighten-1 waves-effect waves-light btn purple"><i class="mdi-editor-mode-edit left"></i>Modificar</button>
								</div>
							  </div>						  
							</form>
						</div>
					</div>
				
			</div>
	    </div><!--container-->

	<?php } ?>
    </body>
  </html>
