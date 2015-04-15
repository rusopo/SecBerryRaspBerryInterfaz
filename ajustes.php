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
      	});


      	

      </script>

	<script type="text/javascript">
			
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
				<div class="col s12 l6 offset-l3 z-depth-2 " >
					<ul class="collection blue " style="text-align:center">
					    <li class="collection-header  white-text"><h4>General</h4></li>
					    <li class="collection-item avatar">
		   			      <i class="mdi-file-folder circle"></i>
					      <span class="title">Nombre Usuario</span>
					      <p>Roberto Morgado Luengo<br>
					      ID:123453455345</p>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-file-folder circle"></i>
					      <span class="title">Fecha Registro</span>
					      <p>2015/04/23					      </p>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-action-assessment circle green"></i>
					      <span class="title">Cambiar Contraseña</span>
					      <p>*******do</p>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-action-assessment circle green"></i>
					      <span class="title">Foto Perfil</span>
					     <img class="materialboxed" width="40" src="images/mor.jpg">
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-action-assessment circle green"></i>
					      <span class="title">Grabación con Movimiento</span>
					      <div class="switch">
						    <label class="blue-text">
						      Off
						      <input type="checkbox">
						      <span class="lever blue"></span>
						      On
						    </label>
						  </div>
					    </li>
					    <li class="collection-header white-text" style="text-align:center" ><h4>Foto</h4></li>
					    <li class="collection-item avatar">
		   			      <i class="mdi-file-folder circle"></i>
					      <span class="title">Resolución</span>
							<select class="browser-default">
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-file-folder circle"></i>
					      <span class="title">Formato Imagen</span>
					      <select class="browser-default">
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
					    </li>
					    <li class="collection-header white-text" style="text-align:center" ><h4>Video</h4></li>
					    <li class="collection-item avatar">
		   			      <i class="mdi-file-folder circle"></i>
					      <span class="title">Resolución Vídeo</span>
					       <select class="browser-default">
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-file-folder circle"></i>
					      <span class="title">Formato Vídeo</span>
					       <select class="browser-default">
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-action-assessment circle green"></i>
					      <span class="title">Grabación con Movimiento</span>
					      <div class="switch">
						    <label class="blue-text">
						      Off
						      <input type="checkbox">
						      <span class="lever blue"></span>
						      On
						    </label>
						  </div>
					    </li>
					    <li class="collection-header white-text" style="text-align:center" ><h4>Streaming</h4></li>
					    <li class="collection-item avatar">
		   			      <i class="mdi-file-folder circle"></i>
					      <span class="title">Resolución</span>
							<select class="browser-default">
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-file-folder circle"></i>
					      <span class="title">Sensibilidad Movimiento</span>
					      <select class="browser-default">
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
					    </li>
					    <li class="collection-header white-text" style="text-align:center" ><h4>Otros</h4></li>
					    <li class="collection-item avatar modal-trigger" href="#delete_photos">
		   			      <i class="mdi-file-folder circle"></i>
					      <span class="title">Borrar Fotos</span>
					       <!-- Modal Structure -->
						  <div id="delete_photos" class="modal blue">
						    <div class="modal-content white-text">
						      <h4>¿Seguro que deseas Borrar TODAS las fotos?</h4>
						      <p>Una vez lo hagas no podras volver a recuperar los archivos.</p>
						    </div>
						    <div class="modal-footer blue" style="text-align:center">
						      <a href="#" class=" white-text modal-action waves-effect waves-light btn-flat blue lighten-2 z-depth-4" >Si</a>
						      <a href="#!" class=" white-text modal-action modal-close waves-effect waves-light btn-flat blue lighten-2 z-depth-4" style="margin-right:10px">no</a>
						    </div>
						  </div>
					    </li>
					    <li class="collection-item avatar modal-trigger" href="#delete_videos">
					      <i class="mdi-file-folder circle"></i>
					      <span class="title">Borrar Vídeo</span>
					       <div id="delete_videos" class="modal blue" >
						    <div class="modal-content white-text">
						      <h4>¿Seguro que deseas Borrar TODOS los Videos?</h4>
						      <p>Una vez lo hagas no podras volver a recuperar los archivos.</p>
						    </div>
						    <div class="modal-footer blue" style="text-align:center">
						      <a href="#" class=" white-text modal-action waves-effect waves-light btn-flat blue lighten-2 z-depth-4" >Si</a>
						      <a href="#!" class=" white-text modal-action modal-close waves-effect waves-light btn-flat blue lighten-2 z-depth-4" style="margin-right:10px">no</a>
						    </div>
						  </div>
					    </li>
					    <li class="collection-item avatar">
					      <i class="mdi-action-assessment circle green"></i>
					      <span class="title">Grabación con Movimiento</span>
					      <div class="switch">
						    <label class="blue-text">
						      Off
						      <input type="checkbox">
						      <span class="lever blue"></span>
						      On
						    </label>
						  </div>
					    </li>
					 </ul>
				</div>
			</div>
  		</div><!--container-->
    </body>
  </html>