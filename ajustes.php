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
			$('.modal-trigger').leanModal();
			$('.li-ajustes-item').leanModal({
			  dismissible: false, // Modal can be dismissed by clicking outside of the modal
			  opacity: .5, // Opacity of modal background		
			});	
      	});
		
      </script>

	<script type="text/javascript">
			$(document).ready(function(){
				
				$("#selectResolucionFoto").change(function(){				
					var resolucionFoto = $(this).val();
					$.post( "controlador/cambiarResolucionFoto.php", { resolucionFoto: resolucionFoto} );
								
				});
				
				$("#selectResolucionVideo").change(function(){				
					var resolucionVideo = $(this).val();
					$.post( "controlador/cambiarResolucionVideo.php", { resolucionVideo: resolucionVideo} );
								
				});
										
			});
	</script>
	
	<script type="text/javascript">
			$(document).ready(function(){							
				
				$(".boton-borrar-todas-fotos").click(function () {
					var id = $(this).parent().parent().attr("id");
					$('#'+id).closeModal();
					$.get( "controlador/borrarTodasFotos.php");					
				});	
				
				$(".boton-borrar-todos-videos").click(function () {
					var id = $(this).parent().parent().attr("id");
					$('#'+id).closeModal();
					$.get( "controlador/borrarTodosVideos.php");					
				});
				
				$(".boton-borrar-todo-historial").click(function () {
					var id = $(this).parent().parent().attr("id");
					$('#'+id).closeModal();
					$.get( "controlador/borrarTodoHistorial.php");					
				});
				
				$(".boton-reiniciar-sistema").click(function () {
					var id = $(this).parent().parent().attr("id");
					$('#'+id).closeModal();
					$.get( "controlador/reiniciarSistema.php");					
				});
				
				$(".boton-apagar-sistema").click(function () {
					var id = $(this).parent().parent().attr("id");
					$('#'+id).closeModal();
					$.get( "controlador/apagarSistema.php");					
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
		        <li><a href="historial.php"><i class="mdi-action-assignment"></i> Historial</a></li>
		        <li><a href="ajustes.php"><i class="small mdi-action-settings"></i> Ajustes</a></li>
		        <li><a href="#"><i class="mdi-action-help"></i> Ayuda</a></li>
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
				<li id="Galeria"><i class="mdi-device-now-wallpaper"></i><a href="galeria.php">Galeria</a></li>
		        <li id="Registro"><i class="mdi-action-assignment"></i><a href="historial.php">Historial</a></li>
		        <li id="Ajustes"><i class="small mdi-action-settings"></i><a href="ajustes.php">Ajustes</a></li>
		        <li id="Ayuda"><i class="mdi-action-help"></i><a href="@">Ayuda</a></li>
		        <li id="Salir"><i class="mdi-action-exit-to-app"></i><a href="controlador/logout.php">Salir</a></li>
		      </ul>
		    </div>
		  </nav>

		<div><!--container-->
			<div class="row">
				<div class="col s12 l6 offset-l3 z-depth-2 " >
				
					<ul class="collection blue" style="text-align:center">
					    <li class="collection-header white-text"><h4>Información Usuario</h4></li>
					    <li class="collection-item avatar">
		   			      <i class="mdi-action-account-circle circle green"></i>
					      <span class="title" style="font-weight:bold">Nombre Usuario</span>
					      <p><?php echo $fila['nombre']." ".$fila['apellidos']?><br>
					      ID: <?php echo $fila['clave_producto']?></p>
					    </li>
						<li class="collection-item avatar">
					      <i class="mdi-action-face-unlock circle green"></i>
					      <span class="title" style="font-weight:bold">Foto Perfil</span>
					     <img class="materialboxed" width="40" src="fotosPerfil/<?php echo $fila['foto']?>">
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-action-query-builder circle green"></i>
					      <span class="title" style="font-weight:bold">Fecha Registro</span>
					      <p><?php echo $fila['fecha_registrado']?></p>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-communication-vpn-key circle green"></i>
					      <span class="title" style="font-weight:bold">Cambiar contraseña</span><br/>
							<!-- Modal Trigger -->
								<a class="waves-effect waves-light btn modal-trigger blue" href="#modalCambiarPassword"><i class="mdi-content-forward left"></i>Pulse Aquí</a>
							<!-- Modal Structure -->
							  <div id="modalCambiarPassword" class="modal blue">
								<form action="controlador/cambiarPassUsuario.php" method="POST">
									<div class="modal-content white-text" align="center">
									  <h4>¿Deseas cambiar de contraseña?</h4>
										<div class="col s12 m12 l12">
											<div class="input-field col s12 m12 l6 offset-l3" style="margin-bottom:5%">
											  <input id="password-old" type="password" name="password-old" class="validate">
											  <label for="password-old" style="color:#FFFFFF">Contraseña antigua</label>
											</div>
											<div class="input-field col s12 m12 l6 offset-l3" style="margin-bottom:5%">
											  <input id="password-new" type="password" name="password-new" class="validate">
											  <label for="password-new" style="color:#FFFFFF">Contraseña nueva</label>
											</div>
											<div class="input-field col s12 m12 l6 offset-l3" style="margin-bottom:5%">
											  <input id="password-new2" type="password" name="password-new2" class="validate">
											  <label for="password-new2" style="color:#FFFFFF">Confirmar contraseña</label>
											</div>
										</div>								  									
									</div>
									<div class="col l12 m12 s12 blue" style="text-align:center;margin-top:5%;">									
										  <button class="btn waves-effect waves-light " type="submit" name="boton-cambio-contrasenia">Confirmar<i class="mdi-content-send right"></i></button>								  									  
									</div>
								</form>
							  </div>
					    </li>
					    
						<?php $query2 = "SELECT * FROM opciones WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$resul2 = $mysqli->query($query2);
							$reg = $resul2->fetch_assoc(); ?>
					    
					    <li class="collection-header white-text" style="text-align:center" ><h4>Resolución</h4></li>
					    <li class="collection-item avatar">
		   			      <i class="mdi-image-camera-alt circle blue"></i>
					      <span class="title" style="font-weight:bold">FOTO</span>
							<select id="selectResolucionFoto" class="browser-default" name="selectResolucionFoto">
								<option <?php if($reg['image_width']==1920 && $reg['image_height']==1080){echo("selected");}?> value="1920x1080">1920x1080</option>
								<option <?php if($reg['image_width']==1280 && $reg['image_height']==720){echo("selected");}?> value="1280x0720">1280x720</option>
								<option <?php if($reg['image_width']==960 && $reg['image_height']==640){echo("selected");}?> value="0960x0640">960x640</option>
								<option <?php if($reg['image_width']==800 && $reg['image_height']==480){echo("selected");}?> value="0800x0480">800x480</option>
							</select>								
					    </li>
					    <li class="collection-item avatar">
		   			      <i class="mdi-image-switch-video circle blue"></i>
					      <span class="title" style="font-weight:bold">STREAMING/VÍDEO</span>					    
						   <select id="selectResolucionVideo" class="browser-default" name="selectResolucionVideo">
								<option <?php if($reg['video_width']==1920 && $reg['video_height']==1080){echo("selected");}?> value="1920x1080">1920x1080</option>
								<option <?php if($reg['video_width']==1280 && $reg['video_height']==720){echo("selected");}?> value="1280x0720">1280x720</option>
								<option <?php if($reg['video_width']==960 && $reg['video_height']==640){echo("selected");}?> value="0960x0640">960x640</option>
								<option <?php if($reg['video_width']==800 && $reg['video_height']==480){echo("selected");}?> value="0800x0480">800x480</option>
							</select>												 
					    </li>
					    				  
					    <li class="collection-header white-text" style="text-align:center" ><h4>Avanzados</h4></li>
					    <li class="collection-item avatar li-ajustes-item" href="#modalborrarTodasFotos">
		   			      <i class="mdi-action-delete circle red"></i>
					      <span class="title"><h5 style="font-weight:bold">Borrar fotos</h5></span><br/>
					       <!-- Modal Structure -->
						  <div id="modalborrarTodasFotos" class="modal blue">
						    <div class="modal-content white-text" style="text-align:left">
						      <h4>¿Seguro que deseas borrar TODAS las fotos?</h4>
						      <p>Una vez lo hagas no podras volver a recuperar los archivos.</p>
						    </div>
						    <div class="col l12 m12 s12 blue" style="text-align:right">									
								  <a class="white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-borrar-todas-fotos"><i class="mdi-navigation-check left"></i>Si</a>									
								  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4"><i class="mdi-navigation-close left"></i>No</a>									  									  
							</div>
						  </div>
					    </li>
					    <li class="collection-item avatar li-ajustes-item" href="#modalBorrarTodosVideos">
					      <i class="mdi-action-delete circle red"></i>
					      <span class="title"><h5 style="font-weight:bold">Borrar videos</h5></span><br/>
					       <!-- Modal Structure -->
						   <div id="modalBorrarTodosVideos" class="modal blue" >
						    <div class="modal-content white-text" style="text-align:left">
						      <h4>¿Seguro que deseas borrar TODOS los videos?</h4>
						      <p>Una vez lo hagas no podras volver a recuperar los archivos.</p>
						    </div>
						    <div class="col l12 m12 s12 blue" style="text-align:right">									
								  <a class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-borrar-todos-videos"><i class="mdi-navigation-check left"></i>Si</a>									
								  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4"><i class="mdi-navigation-close left"></i>No</a>									  									  
							</div>
						  </div>
					    </li>
						<li class="collection-item avatar li-ajustes-item" href="#modalBorrarTodoHistorial">
					      <i class="mdi-action-event circle red"></i>
					      <span class="title"><h5 style="font-weight:bold">Borrar historial</h5></span><br/>
					       <!-- Modal Structure -->
						   <div id="modalBorrarTodoHistorial" class="modal blue" >
						    <div class="modal-content white-text" style="text-align:left">
						      <h4>¿Seguro que deseas borrar TODO tu historial?</h4>
						      <p>Una vez lo hagas no podras volver a recuperarlo.</p>
						    </div>
						    <div class="col l12 m12 s12 blue" style="text-align:right">									
								  <a class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-borrar-todo-historial"><i class="mdi-navigation-check left"></i>Si</a>									
								  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4"><i class="mdi-navigation-close left"></i>No</a>									  									  
							</div>
						  </div>
					    </li>
					    <li class="collection-item avatar li-ajustes-item" href="#modalReiniciarSistema">
		   			      <i class="mdi-action-settings-power circle red"></i>
					      <span class="title"><h5 style="font-weight:bold">Reiniciar Sistema</h5></span><br/>
								<!-- Modal Structure -->
								  <div id="modalReiniciarSistema" class="modal blue">
									<div class="modal-content white-text" style="text-align:left">
									  <h4>¿Desea reiniciar el sistema?</h4>
									  <p>Una vez reiniciado, intente de nuevo la conexión pasado 1 minuto</p>
									</div>
									<div class="col l12 m12 s12 blue" style="text-align:right">									
										  <a class=" white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-reiniciar-sistema"><i class="mdi-navigation-check left"></i>Si</a>									
										  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4"><i class="mdi-navigation-close left"></i>No</a>									  									  
									</div>
								  </div>
						</li>
						<li class="collection-item avatar li-ajustes-item" href="#modalApagarSistema">
		   			      <i class="mdi-action-settings-power circle red"></i>
					      <span class="title"><h5 style="font-weight:bold">Apagar Sistema</h5></span><br/>
								<!-- Modal Structure -->
								  <div id="modalApagarSistema" class="modal blue">
									<div class="modal-content white-text" style="text-align:left">
									  <h4>¿Desea apagar el sistema por completo?</h4>
									  <p>Tenga en cuenta que si apaga el sistema solo puede volver a encenderse fisícamente desde el aparato.Desconecte y vuelva a conectar el cable</p>
									</div>
									<div class="col l12 m12 s12 blue" style="text-align:right">									
										  <a class="white-text modal-action waves-effect waves-light btn-flat z-depth-4 teal lighten-1 boton-apagar-sistema"><i class="mdi-navigation-check left"></i>Si</a>									
										  <a class="white-text modal-action modal-close waves-effect waves-light btn-flat red lighten-1 z-depth-4"><i class="mdi-navigation-close left"></i>No</a>									  									  
									</div>
								  </div>						  
						</li>
					 </ul>
				</div>
			</div>
  		</div><!--container-->
    </body>
  </html>