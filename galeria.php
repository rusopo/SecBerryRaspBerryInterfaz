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
			$('.materialboxed').materialbox();
			$('.scrollspy').scrollSpy();
			$(".button-collapse").sideNav();
			$('select').material_select();
			//$('.modal-trigger').leanModal();	
      	});

      </script>

	<script type="text/javascript">
		$(document).ready(function(){
		
			$('.modal-trigger').leanModal({
			  dismissible: false, // Modal can be dismissed by clicking outside of the modal
			  opacity: .5, // Opacity of modal background			  
			  out_duration: 200, // Transition out duration			  
			});	
			
			$(".boton-descarga").click(function () {
				var id = $(this).parent().parent().attr("id");
				$('#'+id).closeModal();
			});
			
		 });
	</script>
	
    </head>
    <body class="blue">

		 <nav>
		    <div class="nav-wrapper  blue lighten-1">
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			  <ul class="left">
				<li class="li-especial"><a href="streaming.php"><img src="images/Secberry_logo.png" alt="" height="56px" width="85px" ></a></li>
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
				<li><a href="galeria.php"><i class="mdi-device-now-wallpaper"></i> Galeria</a></li>	
		        <li><a href="registro.php"><i class="mdi-action-alarm"></i> Registro</a></li>
		        <li><a href="estado.php"><i class="mdi-action-assignment"></i> Estado</a></li>
		        <li><a href="ajustes.php"><i class="small mdi-action-settings"></i> Ajustes</a></li>
		        <li><a href="#"><i class="mdi-action-help"></i> Ayuda</a></li>
		        <li><a href="logout.php"><i class="mdi-action-exit-to-app"></i> Salir</a></li>
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
				<li id="Galeria"><i class="mdi-device-now-wallpaper"></i><a href="galeria.php">Galeria</a></li>
		        <li id="Registro"><i class="mdi-action-alarm"></i><a href="registro.php">Registro</a></li>
		        <li id="Estado"><i class="mdi-action-assignment"></i><a href="estado.php">Estado</a></li>
		        <li id="Ajustes"><i class="small mdi-action-settings"></i><a href="ajustes.php">Ajustes</a></li>
		        <li id="Ayuda"><i class="mdi-action-help"></i><a href="@">Ayuda</a></li>
		        <li id="Salir"><i class="mdi-action-exit-to-app"></i><a href="logout.php">Salir</a></li>
		      </ul>
		    </div>
		</nav>
	
		<div><!--container-->
			<div class="row">
			
			<?php
				$files = scandir("media");
				if(count($files) == 2) echo "<p>No tienes imágenes ni videos guardados</p>";
				else {
					$contModal=0;
					foreach($files as $file) {
						if(($file != '.') && ($file != '..')) {
							$fsz = round ((filesize("media/" . $file)) / (1024 * 1024));
									  
				if(substr($file, -3) == "jpg"){				
			?>
				<div class="col l3">				
					  <div class="card">
						<div class="card-image">
						  <img class="materialboxed" src="media/<?php echo $file?>" data-caption="<?php echo $file?>">
						  
						</div>
						<div class="card-content">
						  <p><?php echo $file?></p>
						</div>
						<div class="card-action">
							<div class="col l4">
								<!-- Modal Trigger -->
								<a class="waves-effect waves-light btn modal-trigger" href="#modalDescargar<?php echo $contModal?>"><i class="mdi-file-file-download center"></i></a>
								<!-- Modal Structure -->
								  <div id="modalDescargar<?php echo $contModal?>" class="modal blue">
									<div class="modal-content white-text">
									  <h4>¿Deseas descargarte este archivo?</h4>
									  <p>Tamaño del archivo: (<?php echo $fsz?> MB)</p>
									</div>
									<div class="modal-footer blue right" style="text-align:center">
									  <a href="galeria.php" class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal"><i class="mdi-navigation-close left"></i>No</a>
									  <a href ="controlador/descargaArchivo.php?file=<?php echo $file?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal boton-descarga"><i class="mdi-navigation-check left"></i>Si</a>									
									</div>
								  </div>						
							</div>					
							<div class="col l4">
								<!-- Modal Trigger -->
								<a class="waves-effect waves-light btn modal-trigger red lighten-1" href="#modalBorrar<?php echo $contModal?>"><i class="mdi-action-delete center"></i></a>
								<!-- Modal Structure -->
								  <div id="modalBorrar<?php echo $contModal?>" class="modal blue">
									<div class="modal-content white-text">
									  <h4>¿Seguro que deseas Borrar?</h4>
									  <p>Una vez lo hagas no podras volver a recuperar el archivo.</p>
									</div>
									<div class="modal-footer blue" style="text-align:center">									
									  <a href="galeria.php" class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal"><i class="mdi-navigation-close left"></i>No</a>
									  <a href="controlador/borrarArchivo.php?delete=<?php echo $file?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal" ><i class="mdi-navigation-check left"></i>Si</a>
									</div>
								  </div>
							</div>
							<div class="col l4">
								<!-- Modal Trigger -->
								<a class="waves-effect waves-light btn modal-trigger indigo lighten-1" href="#modalCompartir<?php echo $contModal?>"><i class="mdi-social-share center"></i></a>
								<!-- Modal Structure -->
								  <div id="modalCompartir<?php echo $contModal?>" class="modal modal-fixed-footer blue ">
									<div class="modal-content">
										<h4 class="white-text" style="text-align:center">Compartir</h4>
										<div class="social hidden-xs">
										  <a href="http://www.facebook.com/sharer.php?u=http://www.example.com/&t=Texto" class="link facebook" target="_parent"><span class="fa fa-facebook-square"></span></a>
										  <a href="http://twitter.com/share?url=http://www.example.com/&text=Texto" class="link twitter" target="_parent"><span class="fa fa-twitter"></span></a>
										  <a href="https://plus.google.com/share?url=http%3A%2F%2Fexample.com" class="link google-plus" target="_parent"><span class="fa fa-google-plus-square"></span></a>
										</div>
									</div>
									<div class="modal-footer blue">
									  <a href="galeria.php" class="modal-action modal-close waves-effect waves-green btn-flat white-text red lighten-1 z-depth-4"><i class="mdi-navigation-close left"></i>Cerrar</a>
									</div>
								  </div>
							</div>
						</div>
					  </div>									
				</div>
				
				<?php
				
				}
				else if(substr($file, -3) == "mp4"){ ?>
				
					<div class="col l3">				
					  <div class="card">
						<div class="card-image">
						  <video class="responsive-video" controls>
								<source src="media/<?php echo $file ?>" type="video/mp4">
							</video>						  
						</div>
						<div class="card-content">
						  <p><?php echo $file?></p>
						</div>
						<div class="card-action">
							<div class="col l4">
								<!-- Modal Trigger -->
								<a class="waves-effect waves-light btn modal-trigger" href="#modalDescargar<?php echo $contModal?>"><i class="mdi-file-file-download center"></i></a>
								<!-- Modal Structure -->
								  <div id="modalDescargar<?php echo $contModal?>" class="modal blue">
									<div class="modal-content white-text">
									  <h4>¿Deseas descargarte este archivo?</h4>
									  <p>Tamaño del archivo: (<?php echo $fsz?> MB)</p>
									</div>
									<div class="modal-footer blue right" style="text-align:center">
									  <a href="galeria.php" class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal"><i class="mdi-navigation-close left"></i>No</a>
									  <a href ="controlador/descargaArchivo.php?file=<?php echo $file?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal boton-descarga"><i class="mdi-navigation-check left"></i>Si</a>									
									</div>
								  </div>						
							</div>					
							<div class="col l4">
								<!-- Modal Trigger -->
								<a class="waves-effect waves-light btn modal-trigger red lighten-1" href="#modalBorrar<?php echo $contModal?>"><i class="mdi-action-delete center"></i></a>
								<!-- Modal Structure -->
								  <div id="modalBorrar<?php echo $contModal?>" class="modal blue">
									<div class="modal-content white-text">
									  <h4>¿Seguro que deseas Borrar?</h4>
									  <p>Una vez lo hagas no podras volver a recuperar el archivo.</p>
									</div>
									<div class="modal-footer blue" style="text-align:center">									
									  <a href="galeria.php" class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4 boton-modal"><i class="mdi-navigation-close left"></i>No</a>
									  <a href="controlador/borrarArchivo.php?delete=<?php echo $file?>" class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-modal" ><i class="mdi-navigation-check left"></i>Si</a>
									</div>
								  </div>
							</div>
							<div class="col l4">
								<!-- Modal Trigger -->
								<a class="waves-effect waves-light btn modal-trigger indigo lighten-1" href="#modalCompartir<?php echo $contModal?>"><i class="mdi-social-share center"></i></a>
								<!-- Modal Structure -->
								  <div id="modalCompartir<?php echo $contModal?>" class="modal modal-fixed-footer blue ">
									<div class="modal-content">
										<h4 class="white-text" style="text-align:center">Compartir</h4>
										<div class="social hidden-xs">
										  <a href="http://www.facebook.com/sharer.php?u=http://www.example.com/&t=Texto" class="link facebook" target="_parent"><span class="fa fa-facebook-square"></span></a>
										  <a href="http://twitter.com/share?url=http://www.example.com/&text=Texto" class="link twitter" target="_parent"><span class="fa fa-twitter"></span></a>
										  <a href="https://plus.google.com/share?url=http%3A%2F%2Fexample.com" class="link google-plus" target="_parent"><span class="fa fa-google-plus-square"></span></a>
										</div>
									</div>
									<div class="modal-footer blue">
									  <a href="galeria.php" class="modal-action modal-close waves-effect waves-green btn-flat white-text red lighten-1 z-depth-4"><i class="mdi-navigation-close left"></i>Cerrar</a>
									</div>
								  </div>
							</div>
						</div>
					  </div>									
				</div>
												
			<?php	
				}
				$contModal++;
						}
					}		
				}
			  ?>
			
			</div><!--row -->

  		</div><!--container-->
    </body>
  </html>