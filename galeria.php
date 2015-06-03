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
	  
	  <script src="js/script.js"></script>
	  
       <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/jquery-scrollspy.js"></script>
	  <script type="text/javascript" src="js/smooth-scroll.js"></script>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
			//$('.materialboxed').materialbox();
			$('.scrollspy').scrollSpy();
			$(".button-collapse").sideNav();
			$('select').material_select();
			//$('.modal-trigger').leanModal();
			$('ul.tabs').tabs();
      	});

      </script>
	  
	  <script type="text/javascript">
				$(document).ready(function(){
				
					$('.materialboxed').materialbox();
				
					$('.modal-trigger').leanModal({
					  dismissible: false, // Modal can be dismissed by clicking outside of the modal
					  opacity: .5, // Opacity of modal background			  
					  out_duration: 200, // Transition out duration			  
					});	
					
					$(".boton-descarga").click(function () {
						var id = $(this).parent().parent().attr("id");
						$('#'+id).closeModal();
					});
					
					$(".boton-cerrar-modal").click(function () {
						var id = $(this).parent().parent().attr("id");
						$('#'+id).closeModal();
					});					
				 });
		</script>
	  
	  <script type="text/javascript">
		$(document).ready(function() {
			   
		   $("#lista-galeria").on("click", "#galeria-imagenes", function(event){
				$("#galeria-videos").removeClass("active");
				$("#galeria-imagenes").addClass("active");
				$("#galeria-general-videos").css("display", "none");
				$("#galeria-general-imagenes").css("display", "block");
		   });

			$("#lista-galeria").on("click", "#galeria-videos", function(event){
				$("#galeria-imagenes").removeClass("active");
			    $("#galeria-videos").addClass("active");
				$("#galeria-general-imagenes").css("display", "none");
				$("#galeria-general-videos").css("display", "block");
		   });		   
		});
		
	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			   
		   $(".tabs").on("click", ".galeria-imagenes-mov", function(event){
			  $("#galeria-general-videos-mov").css("display", "none");
			  $("#galeria-general-imagenes-mov").css("display", "block");
		   });

			$(".tabs").on("click", ".galeria-videos-mov", function(event){
			  $("#galeria-general-imagenes-mov").css("display", "none");
			  $("#galeria-general-videos-mov").css("display", "block");
		   });
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
				<li class="active"><a href="galeria.php"><i class="mdi-device-now-wallpaper li-nav-mio"></i><strong> Galería</strong></a></li>	
		        <li><a href="historial.php"><i class="mdi-action-assignment li-nav-mio"></i><strong> Historial</strong></a></li>
		        <li><a href="ajustes.php"><i class="small mdi-action-settings li-nav-mio"></i><strong> Ajustes</strong></a></li>
		        <li><a href="ayuda.php"><i class="mdi-action-help li-nav-mio"></i><strong> Ayuda</strong></a></li>
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
				<li class="active" id="Galeria"><a href="galeria.php"><i class="mdi-device-now-wallpaper left"></i><strong>Galería</strong></a></li>
		        <li id="Registro"><a href="historial.php"><i class="mdi-action-assignment left"></i><strong>Historial</strong></a></li>
		        <li id="Ajustes"><a href="ajustes.php"><i class="small mdi-action-settings left"></i><strong>Ajustes</strong></a></li>
		        <li id="Ayuda"><a href="ayuda.php"><i class="mdi-action-help left"></i><strong>Ayuda</strong></a></li>
		        <li id="Salir"><a href="controlador/logout.php"><i class="mdi-action-exit-to-app left"></i><strong>Salir</strong></a></li>
		      </ul>
		    </div>
		</nav>
				
			<div class="row divNoResponsivo" id="no-resp">
						
					<div class="col m3 l3 blue darken-2 izq-galeria">
						
						<ul id="lista-galeria" class="white-text">
						
							<li id="galeria-imagenes" class="item-galeria active"><h5><i class="mdi-image-photo left"></i><strong>Imágenes</strong></h5></li>							
							<li id="galeria-videos" class="item-galeria"><h5><i class="mdi-av-movie left"></i><strong>Vídeos</strong><h5></li>
						
						</ul>
					
					</div>
					
					<div class="col m9 l9 cuerpo-galeria">
					
						<div id="galeria-general-imagenes">

							<?php

								setlocale(LC_ALL, "esp");
								$directorio='media/images'; 
								$fotos = scandir($directorio);
								$arrlength=count($fotos); 

								if(count($fotos) == 2) echo "<h5 class='white-text'>No tienes imágenes.</h5>";
								else {													 								        
								    for($x=0;$x<$arrlength;$x++){ 
								        $nombre_archivo = $fotos[$x];
								        if(($nombre_archivo != '.') && ($nombre_archivo != '..')){
									        $fecha = strftime("%d de %B de %Y", filemtime("$directorio/$nombre_archivo")); 
									        $todo[filemtime("$directorio/$nombre_archivo")]=array($directorio,$fotos[$x],$fecha);
									    } 
							        } 
							    } 								 
								krsort($todo); //Ordenar array

								$contModalIm=0;
								for($i=0; $i<count($todo); $i++){ 
								    $actual=current($todo);
								    $nombre_foto=$actual[1];
								    $fsz = round ((filesize("media/images/" . $nombre_foto)) / (1024 * 1024));	
																	 										
								?>
									<div class="col l4 m12 s12 item-general">					
										<div class="col l12 m12 s12 center gallery-img item-galeria-foto">
											<div><img class="zoom-imagen responsive-img" onclick="toggle_fullscreen(this);" src="media/preview/<?php echo $nombre_foto?>"></div>
										</div>
										<div class="col m12 s12 l12 center item-galeria-texto">
											<?php echo $nombre_foto?>
										</div>
										<div class="col m12 s12 l12 center item-galeria-botones">
											<div class="col s4 m4 l4">
												<!-- Modal Trigger -->
												<a class="waves-effect waves-light btn modal-trigger boton-galeria" href="#modalDescargarImagen<?php echo $contModalIm?>"><i class="mdi-file-file-download center"></i></a>
												<!-- Modal Structure -->
												  <div id="modalDescargarImagen<?php echo $contModalIm?>" class="modal blue">
													<div class="modal-content white-text" style="text-align:left">
													  <h4>¿Deseas descargarte este archivo?</h4>
													  <p>Tamaño del archivo: (<?php echo $fsz?> MB)</p>
													</div>
													<div class="col l12 m12 s12 blue" style="text-align:right">									
														  <a href ="controlador/descargaFoto.php?file=<?php echo $nombre_foto?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-descarga"><i class="mdi-navigation-check left"></i>Si</a>									
														  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									  									  
													</div>
												  </div>						
											</div>					
											<div class="col s4 m4 l4">
												<!-- Modal Trigger -->
												<a class="waves-effect waves-light btn modal-trigger red lighten-1 boton-galeria" href="#modalBorrarImagen<?php echo $contModalIm?>"><i class="mdi-action-delete center"></i></a>
												<!-- Modal Structure -->
												  <div id="modalBorrarImagen<?php echo $contModalIm?>" class="modal blue">
													<div class="modal-content white-text" style="text-align:left">
													  <h4>¿Seguro que deseas Borrar?</h4>
													  <p>Una vez lo hagas no podras volver a recuperar el archivo.</p>
													</div>
													<div class="col l12 m12 s12 blue" style="text-align:right">									
													  <a href="controlador/borrarArchivo.php?delete=<?php echo $nombre_foto?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal" ><i class="mdi-navigation-check left"></i>Si</a>
													  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									
													</div>
												  </div>
											</div>
											<div class="col s4 m4 l4">
												<!-- Modal Trigger -->
												<a class="waves-effect waves-light btn modal-trigger indigo lighten-1 boton-galeria" href="#modalCompartirImagen<?php echo $contModalIm?>"><i class="mdi-social-share center"></i></a>
												<!-- Modal Structure -->
												  <div id="modalCompartirImagen<?php echo $contModalIm?>" class="modal modal-fixed-footer blue ">
													<div class="modal-content">
														<h4 class="white-text" style="text-align:center">Compartir</h4>
														<div class="social hidden-xs">
														  <a href="http://www.facebook.com/sharer.php?u=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_foto?>&t=Esta imagen es compartida por SecBerry." class="link facebook" target="_parent"><span class="fa fa-facebook-square"></span></a>
														  <a href="http://twitter.com/share?url=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_foto?>&text=Esta imagen es compartida por SecBerry." class="link twitter" target="_parent"><span class="fa fa-twitter"></span></a>
														  <a href="https://plus.google.com/share?url=http%3A%2F%2F<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_foto?>" class="link google-plus" target="_parent"><span class="fa fa-google-plus-square"></span></a>
														</div>
													</div>
													<div class="modal-footer blue">
													  <a class="modal-action modal-close waves-effect waves-green btn-flat white-text red lighten-1 z-depth-4 boton-cerrar-modal"><i class="mdi-navigation-close left"></i>Cerrar</a>
													</div>
												  </div>
											</div>
										</div>
									</div> 
								
								<?php 
									$contModalIm++;
									next($todo);
								}

								?>					
						</div>
						
						<div id="galeria-general-videos" style="display:none">
							
							<?php

								setlocale(LC_ALL, "esp");
								$directorio2='media/videos'; 
								$videos = scandir($directorio2);
								$arrlength2=count($videos); 

								if(count($videos) == 2) echo "<h5 class='white-text'>No tienes imágenes.</h5>";
								else {													 								        
								    for($a=0;$a<$arrlength2;$a++){ 
								        $nombre_archivo2 = $videos[$a];
								        if(($nombre_archivo2 != '.') && ($nombre_archivo2 != '..') && (substr($nombre_archivo2, -3) == "mp4")){
									        $fecha2 = strftime("%d de %B de %Y", filemtime("$directorio2/$nombre_archivo2")); 
									        $todo2[filemtime("$directorio2/$nombre_archivo2")]=array($directorio2,$videos[$a],$fecha2);
									    } 
							        } 
							    } 								 
								krsort($todo2); //Ordenar array

								$contModalVid=0;
								for($j=0; $j<count($todo2); $j++){ 
								    $actual2=current($todo2);
								    $nombre_video=$actual2[1];
								    $fsz = round ((filesize("media/videos/" . $nombre_video)) / (1024 * 1024));			
								?>
								
								<div class="col l4 m12 s12 item-general">
									<div class="col l12 m12 s12 center gallery-img item-video">
										<video width="100%" controls>
											<source src="media/videos/<?php echo $nombre_video ?>" type="video/mp4">
										</video>
									</div>
									<div class="col l12 m12 s12 center item-galeria-texto-video">
										<?php echo $nombre_video?>
									</div>
									<div class="col l12 s12 m12 center item-galeria-botones">
										<div class="col s4 m4 l4">
											<!-- Modal Trigger -->
											<a class="waves-effect waves-light btn modal-trigger boton-galeria" href="#modalDescargarVideo<?php echo $contModalVid?>"><i class="mdi-file-file-download center"></i></a>
											<!-- Modal Structure -->
											  <div id="modalDescargarVideo<?php echo $contModalVid?>" class="modal blue">
												<div class="modal-content white-text" style="text-align:left">
												  <h4>¿Deseas descargarte este archivo?</h4>
												  <p>Tamaño del archivo: (<?php echo $fsz?> MB)</p>
												</div>
												<div class="col l12 m12 s12 blue right" style="text-align:right">
												  <a href ="controlador/descargaVideo.php?file=<?php echo $nombre_video?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal boton-descarga"><i class="mdi-navigation-check left"></i>Si</a>									
												  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									
												</div>
											  </div>						
										</div>					
										<div class="col s4 m4 l4">
											<!-- Modal Trigger -->
											<a class="waves-effect waves-light btn modal-trigger red lighten-1 boton-galeria" href="#modalBorrarVideo<?php echo $contModalVid?>"><i class="mdi-action-delete center"></i></a>
											<!-- Modal Structure -->
											  <div id="modalBorrarVideo<?php echo $contModalVid?>" class="modal blue">
												<div class="modal-content white-text" style="text-align:left">
												  <h4>¿Seguro que deseas Borrar?</h4>
												  <p>Una vez lo hagas no podras volver a recuperar el archivo.</p>
												</div>
												<div class="col l12 m12 s12 blue" style="text-align:right">									
												  <a href="controlador/borrarArchivo.php?delete=<?php echo $nombre_video?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal" ><i class="mdi-navigation-check left"></i>Si</a>
												  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									
												</div>
											  </div>
										</div>
										<div class="col s4 m4 l4">
											<!-- Modal Trigger -->
											<a class="waves-effect waves-light btn modal-trigger indigo lighten-1 boton-galeria" href="#modalCompartirVideo<?php echo $contModalVid?>"><i class="mdi-social-share center"></i></a>
											<!-- Modal Structure -->
											  <div id="modalCompartirVideo<?php echo $contModalVid?>" class="modal modal-fixed-footer blue ">
												<div class="modal-content">
													<h4 class="white-text" style="text-align:center">Compartir</h4>
													<div class="social hidden-xs">
													  <a href="http://www.facebook.com/sharer.php?u=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_video?>&t=Este video es compartido por SecBerry." class="link facebook" target="_parent"><span class="fa fa-facebook-square"></span></a>
													  <a href="http://twitter.com/share?url=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_video?>&text=Este video es compartido por SecBerry." class="link twitter" target="_parent"><span class="fa fa-twitter"></span></a>
													  <a href="https://plus.google.com/share?url=http%3A%2F%2F<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_video?>" class="link google-plus" target="_parent"><span class="fa fa-google-plus-square"></span></a>
													</div>
												</div>
												<div class="modal-footer blue">
												  <a class="modal-action modal-close waves-effect waves-green btn-flat white-text red lighten-1 z-depth-4 boton-cerrar-modal"><i class="mdi-navigation-close left"></i>Cerrar</a>
												</div>
											  </div>
										</div>
									</div>
								</div>
								
								<?php 
									$contModalVid++;
									next($todo2);
								}
								?>
						
						</div>
									
					</div>
									
			</div>


			<div class="row" id="resp">
			
				  <ul class="tabs">
					<li class="tab col s6"><a class="galeria-imagenes-mov active"><i class="mdi-image-photo center"></i><strong>Imágenes</a></li>
					<li class="tab col s6"><a class="galeria-videos-mov"><i class="mdi-av-movie center"></i><strong>Vídeos</a></li>
				  </ul>
				
				<div class="col s12">
				
					<div id="galeria-general-imagenes-mov"> 
					
						<?php
								setlocale(LC_ALL, "esp");
								$directorio3='media/images'; 
								$fotosMov = scandir($directorio3);
								$arrlength3=count($fotosMov); 

								if(count($fotosMov) == 2) echo "<h5 class='white-text'>No tienes imágenes.</h5>";
								else {													 								        
								    for($c=0;$c<$arrlength3;$c++){ 
								        $nombre_archivo3 = $fotosMov[$c];
								        if(($nombre_archivo3 != '.') && ($nombre_archivo3 != '..')){
									        $fecha3 = strftime("%d de %B de %Y", filemtime("$directorio3/$nombre_archivo3")); 
									        $todo3[filemtime("$directorio3/$nombre_archivo3")]=array($directorio3,$fotosMov[$c],$fecha3);
									    } 
							        } 
							    } 								 
								krsort($todo3); //Ordenar array

								$contModalImMov=0;
								for($k=0; $k<count($todo3); $k++){ 
								    $actual3=current($todo3);
								    $nombre_foto_mov=$actual3[1];
								    $fsz = round ((filesize("media/images/" . $nombre_foto_mov)) / (1024 * 1024));			
								?>
									<div class="col l4 m12 s12 item-general">					
										<div class="col l12 m12 s12 center gallery-img item-galeria-foto">
											<div><img class="responsive-img" src="media/preview/<?php echo $nombre_foto_mov?>"></div>
										</div>
										<div class="col m12 s12 l12 center item-galeria-texto">
											<?php echo $nombre_foto_mov?>
										</div>
										<div class="col m12 s12 l12 center item-galeria-botones">
											<div class="col s4 m4 l4">
												<!-- Modal Trigger -->
												<a class="waves-effect waves-light btn modal-trigger boton-galeria" href="#modalDescargarImagenMov<?php echo $contModalImMov?>"><i class="mdi-file-file-download center"></i></a>
												<!-- Modal Structure -->
												  <div id="modalDescargarImagenMov<?php echo $contModalImMov?>" class="modal blue">
													<div class="modal-content white-text" style="text-align:left">
													  <h4>¿Deseas descargarte este archivo?</h4>
													  <p>Tamaño del archivo: (<?php echo $fsz?> MB)</p>
													</div>
													<div class="col l12 m12 s12 blue" style="text-align:right">									
														  <a href ="controlador/descargaFoto.php?file=<?php echo $nombre_foto_mov?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-descarga"><i class="mdi-navigation-check left"></i>Si</a>									
														  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									  									  
													</div>
												  </div>						
											</div>					
											<div class="col s4 m4 l4">
												<!-- Modal Trigger -->
												<a class="waves-effect waves-light btn modal-trigger red lighten-1 boton-galeria" href="#modalBorrarImagenMov<?php echo $contModalImMov?>"><i class="mdi-action-delete center"></i></a>
												<!-- Modal Structure -->
												  <div id="modalBorrarImagenMov<?php echo $contModalImMov?>" class="modal blue">
													<div class="modal-content white-text" style="text-align:left">
													  <h4>¿Seguro que deseas Borrar?</h4>
													  <p>Una vez lo hagas no podras volver a recuperar el archivo.</p>
													</div>
													<div class="col l12 m12 s12 blue" style="text-align:right">									
													  <a href="controlador/borrarArchivo.php?delete=<?php echo $nombre_foto_mov?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal" ><i class="mdi-navigation-check left"></i>Si</a>
													  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									
													</div>
												  </div>
											</div>
											<div class="col s4 m4 l4">
												<!-- Modal Trigger -->
												<a class="waves-effect waves-light btn modal-trigger indigo lighten-1 boton-galeria" href="#modalCompartirImagenMov<?php echo $contModalImMov?>"><i class="mdi-social-share center"></i></a>
												<!-- Modal Structure -->
												  <div id="modalCompartirImagenMov<?php echo $contModalImMov?>" class="modal modal-fixed-footer blue ">
													<div class="modal-content">
														<h4 class="white-text" style="text-align:center">Compartir</h4>
														<div class="social hidden-xs">
														  <a href="http://www.facebook.com/sharer.php?u=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_foto_mov?>&t=Esta imagen es compartida por SecBerry." class="link facebook" target="_parent"><span class="fa fa-facebook-square"></span></a>
														  <a href="http://twitter.com/share?url=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_foto_mov?>&text=Esta imagen es compartida por SecBerry." class="link twitter" target="_parent"><span class="fa fa-twitter"></span></a>
														  <a href="https://plus.google.com/share?url=http%3A%2F%2F<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_foto_mov?>" class="link google-plus" target="_parent"><span class="fa fa-google-plus-square"></span></a>
														</div>
													</div>
													<div class="modal-footer blue">
													  <a class="modal-action modal-close waves-effect waves-green btn-flat white-text red lighten-1 z-depth-4 boton-cerrar-modal"><i class="mdi-navigation-close left"></i>Cerrar</a>
													</div>
												  </div>
											</div>
										</div>
									</div>
								
								<?php 
									$contModalImMov++;
									next($todo3);
								}
								?>
					
					</div>
					
					<div id="galeria-general-videos-mov" style="display:none"> 
						
						<?php
								setlocale(LC_ALL, "esp");
								$directorio4='media/videos'; 
								$videosMov = scandir($directorio4);
								$arrlength4=count($videosMov); 

								if(count($videosMov) == 2) echo "<h5 class='white-text'>No tienes imágenes.</h5>";
								else {													 								        
								    for($d=0;$d<$arrlength4;$d++){ 
								        $nombre_archivo4 = $videosMov[$d];
								        if(($nombre_archivo4 != '.') && ($nombre_archivo4 != '..') && (substr($nombre_archivo4, -3) == "mp4")){
									        $fecha4 = strftime("%d de %B de %Y", filemtime("$directorio4/$nombre_archivo4")); 
									        $todo4[filemtime("$directorio4/$nombre_archivo4")]=array($directorio4,$videosMov[$d],$fecha4);
									    } 
							        } 
							    } 								 
								krsort($todo4); //Ordenar array

								$contModalVidMov=0;
								for($l=0; $l<count($todo4); $l++){ 
								    $actual4=current($todo4);
								    $nombre_video_mov=$actual4[1];
								    $fsz = round ((filesize("media/videos/" . $nombre_video_mov)) / (1024 * 1024));				
								?>
								
								<div class="col l4 m12 s12 item-general">
									<div class="col l12 m12 s12 center gallery-img item-video">
										<video width="100%" controls>
											<source src="media/videos/<?php echo $nombre_video_mov ?>" type="video/mp4">
										</video>
									</div>
									<div class="col l12 m12 s12 center item-galeria-texto-video">
										<?php echo $nombre_video_mov?>
									</div>
									<div class="col l12 s12 m12 center item-galeria-botones">
										<div class="col s4 m4 l4">
											<!-- Modal Trigger -->
											<a class="waves-effect waves-light btn modal-trigger boton-galeria" href="#modalDescargarVideoMov<?php echo $contModalVidMov?>"><i class="mdi-file-file-download center"></i></a>
											<!-- Modal Structure -->
											  <div id="modalDescargarVideoMov<?php echo $contModalVidMov?>" class="modal blue">
												<div class="modal-content white-text" style="text-align:left">
												  <h4>¿Deseas descargarte este archivo?</h4>
												  <p>Tamaño del archivo: (<?php echo $fsz?> MB)</p>
												</div>
												<div class="col l12 m12 s12 blue right" style="text-align:right">
												  <a href ="controlador/descargaVideo.php?file=<?php echo $nombre_video_mov?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal boton-descarga"><i class="mdi-navigation-check left"></i>Si</a>									
												  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									
												</div>
											  </div>						
										</div>					
										<div class="col s4 m4 l4">
											<!-- Modal Trigger -->
											<a class="waves-effect waves-light btn modal-trigger red lighten-1 boton-galeria" href="#modalBorrarVideoMov<?php echo $contModalVidMov?>"><i class="mdi-action-delete center"></i></a>
											<!-- Modal Structure -->
											  <div id="modalBorrarVideoMov<?php echo $contModalVidMov?>" class="modal blue">
												<div class="modal-content white-text" style="text-align:left">
												  <h4>¿Seguro que deseas Borrar?</h4>
												  <p>Una vez lo hagas no podras volver a recuperar el archivo.</p>
												</div>
												<div class="col l12 m12 s12 blue" style="text-align:right">									
												  <a href="controlador/borrarArchivo.php?delete=<?php echo $nombre_video_mov?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal" ><i class="mdi-navigation-check left"></i>Si</a>
												  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal boton-cerrar-modal"><i class="mdi-navigation-close left"></i>No</a>									
												</div>
											  </div>
										</div>
										<div class="col s4 m4 l4">
											<!-- Modal Trigger -->
											<a class="waves-effect waves-light btn modal-trigger indigo lighten-1 boton-galeria" href="#modalCompartirVideoMov<?php echo $contModalVidMov?>"><i class="mdi-social-share center"></i></a>
											<!-- Modal Structure -->
											  <div id="modalCompartirVideoMov<?php echo $contModalVidMov?>" class="modal modal-fixed-footer blue ">
												<div class="modal-content">
													<h4 class="white-text" style="text-align:center">Compartir</h4>
													<div class="social hidden-xs">
													  <a href="http://www.facebook.com/sharer.php?u=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_video_mov?>&t=Este video es compartido por SecBerry." class="link facebook" target="_parent"><span class="fa fa-facebook-square"></span></a>
													  <a href="http://twitter.com/share?url=http://<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_video_mov?>&text=Este video es compartido por SecBerry." class="link twitter" target="_parent"><span class="fa fa-twitter"></span></a>
													  <a href="https://plus.google.com/share?url=http%3A%2F%2F<?php echo $fila['ip_publica']?>/SecBerry/media/preview/<?php echo $nombre_video_mov?>" class="link google-plus" target="_parent"><span class="fa fa-google-plus-square"></span></a>
													</div>
												</div>
												<div class="modal-footer blue">
												  <a class="modal-action modal-close waves-effect waves-green btn-flat white-text red lighten-1 z-depth-4 boton-cerrar-modal"><i class="mdi-navigation-close left"></i>Cerrar</a>
												</div>
											  </div>
										</div>
									</div>
								</div>
								
								<?php 
									$contModalVidMov++;
									next($todo4);
								}
								?>
					
					</div>
										
				</div>
			</div>
		
		<?php } ?>		
    </body>
  </html>