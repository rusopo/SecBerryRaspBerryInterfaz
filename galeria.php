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
		<style>
			.gallery-img{
				margin-top:10px;
			}


.social {
  /* position: absolute; */
  /* width: 100%; */
  /* top: 50%; */
  text-align: center;
  /* transform: translateY(-50%); */
  margin-top:15%;
}

.social .link {
  display: inline-block;
  vertical-align: middle;
  position: relative;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  border: 2px dashed white;
  background-clip: content-box;
  padding: 10px;
  transition: .5s;
  color: #D7D0BE;
  margin-left: 15px;
  margin-right: 15px;
  text-shadow:
    0 -1px 0 rgba(0, 0, 0, 0.2),
    0 1px 0 rgba(255, 255, 255, 0.2);
  font-size: 70px;
}

.social .link span {
  display: block;
  position: absolute;
  text-align: center;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.social .link:hover {
  padding: 20px;
  color: white;
  margin-left: -5px;
  transform: translateX(10px) rotate(360deg);
}

.social .link.google-plus {
  background-color: tomato;
  color: white;
}

.social .link.twitter {
  background-color: #00ACEE;
  color: white;
}

.social .link.facebook {
  background-color: #3B5998;
  color: white;
}


		</style>

		<div><!--container-->
			<div class="row">
				<div class="col l3">
					<div class="col l12 gallery-img">
						<img class="materialboxed responsive-img " data-caption="Descripcion de foto con fecha y nombre"  src="images/nax1920.png">
					</div>
					<div class="col s12 l12 center white-text">
						Tipo:Titulo+fecha
					</div>
					<div class="col offset-m5 offset-s2 offset-l2 l4">
						<!-- Modal Trigger -->
						<a class="waves-effect waves-light btn modal-trigger blue lighten-1" href="#idfoto_delete"><i class="mdi-action-delete center"></i></a>
						<!-- Modal Structure -->
						  <div id="idfoto_delete" class="modal blue">
						    <div class="modal-content white-text">
						      <h4>¿Seguro que deseas Borrar?</h4>
						      <p>Una vez lo hagas no podras volver a recuperar el archivo.</p>
						    </div>
						    <div class="modal-footer blue" style="text-align:center">
						      <a href="#" class=" white-text modal-action waves-effect waves-light btn-flat blue lighten-2 z-depth-4" >Si</a>
						      <a href="#!" class=" white-text modal-action modal-close waves-effect waves-light btn-flat blue lighten-2 z-depth-4" style="margin-right:10px">no</a>
						    </div>
						  </div>
					</div>
					<div class="col l6">
						<!-- Modal Trigger -->
						<a class="waves-effect waves-light btn modal-trigger blue lighten-1" href="#idfoto_share"><i class="mdi-social-share center"></i></a>
						<!-- Modal Structure -->
						  <div id="idfoto_share" class="modal modal-fixed-footer blue">
						    <div class="modal-content">
						    	<h4 class="white-text" style="text-align:center">Compartir</h4>
					    		<div class="social hidden-xs">
								  <a href="http://www.facebook.com/sharer.php?u=http://www.example.com/&t=Texto" class="link facebook" target="_parent"><span class="fa fa-facebook-square"></span></a>
								  <a href="http://twitter.com/share?url=http://www.example.com/&text=Texto" class="link twitter" target="_parent"><span class="fa fa-twitter"></span></a>
								  <a href="https://plus.google.com/share?url=http%3A%2F%2Fexample.com" class="link google-plus" target="_parent"><span class="fa fa-google-plus-square"></span></a>
								</div>
						    </div>
						    <div class="modal-footer blue">
						      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat white-text blue lighten-2 z-depth-4">Cerrar</a>
						    </div>
						  </div>
					</div>
				</div>

				<div class="col l3">
					<div class="col l12 gallery-img">
						<img class="materialboxed responsive-img" data-caption="Descripcion de foto con fecha y nombre"  src="images/nax1280.png">
					</div>
					<div class="col l12 center white-text">
						Tipo:Titulo+fecha
					</div>
					<div class="col offset-l2 l4">
						<a class="waves-effect waves-light btn"><i class="mdi-action-delete center"></i></a>
					</div>
					<div class="col l6">
						<a class="waves-effect waves-light btn"><i class="mdi-social-share center"></i></a>
					</div>
				</div>
				<div class="col l3">
					<div class="col l12 gallery-img">
						<img class="materialboxed responsive-img" data-caption="Descripcion de foto con fecha y nombre"  src="images/nax1067.png">
					</div>
					<div class="col l12 center white-text">
						Tipo:Titulo+fecha
					</div>
					<div class="col offset-l2 l4">
						<a class="waves-effect waves-light btn"><i class="mdi-action-delete center"></i></a>
					</div>
					<div class="col l6">
						<a class="waves-effect waves-light btn"><i class="mdi-social-share center"></i></a>
					</div>
				</div>
				<div class="col l3">
					<div class="col l12 gallery-img">
						<img class="materialboxed responsive-img" data-caption="Descripcion de foto con fecha y nombre"  src="images/nax711.png">
					</div>
					<div class="col l12 center white-text">
						Tipo:Titulo+fecha
					</div>
					<div class="col offset-l2 l4">
						<a class="waves-effect waves-light btn"><i class="mdi-action-delete center"></i></a>
					</div>
					<div class="col l6">
						<a class="waves-effect waves-light btn"><i class="mdi-social-share center"></i></a>
					</div>
				</div>
				<div class="col l3">
					<div class="col l12 gallery-img">
						<video class="responsive-video" controls>
						    <source src="images/nax1920vid.mp4" type="video/mp4">
						</video>
					</div>
					<div class="col l12 center white-text">
						Tipo:Titulo+fecha
					</div>
					<div class="col offset-l2 l4">
						<a class="waves-effect waves-light btn"><i class="mdi-action-delete center"></i></a>
					</div>
					<div class="col l6">
						<a class="waves-effect waves-light btn"><i class="mdi-social-share center"></i></a>
					</div>
				</div>
			
			</div>	



  		</div><!--container-->
    </body>
  </html>