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

		<div class="navbar-fixed">
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
							
				<li class="li-especial li-especial-text"><i class="mdi-social-person"></i> <?php echo $reg['nombre']?></a></li>
				<li class="li-especial li-especial-text"><i class="mdi-action-info-outline"></i> <?php echo $reg['clave_producto']?></a></li>
			  </ul>
		      <ul class="right hide-on-med-and-down">
			  
			    <li><a href="streaming.php"><i class="mdi-action-visibility li-nav-mio"></i> <strong>Streaming </strong></a></li>
				<li><a href="galeria.php"><i class="mdi-device-now-wallpaper li-nav-mio"></i><strong> Galería</strong></a></li>	
		        <li class="active"><a href="historial.php"><i class="mdi-action-assignment li-nav-mio"></i><strong> Historial</strong></a></li>
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
							<p>Nombre: <?php echo $fila['nombre']?></p>
							<p>ID: <?php echo $fila['clave_producto']?></p>
			        </div>
			    </div>
		        </li>
				<li id="Streaming"><a href="streaming.php"><i class="mdi-action-visibility left"></i><strong>Streaming</strong></a></li>
				<li id="Galeria"><a href="galeria.php"><i class="mdi-device-now-wallpaper left"></i><strong>Galería</strong></a></li>
		        <li class="active" id="Registro"><a href="historial.php"><i class="mdi-action-assignment left"></i><strong>Historial</strong></a></li>
		        <li id="Ajustes"><a href="ajustes.php"><i class="small mdi-action-settings left"></i><strong>Ajustes</strong></a></li>
		        <li id="Ayuda"><a href="ayuda.php"><i class="mdi-action-help left"></i><strong>Ayuda</strong></a></li>
		        <li id="Salir"><a href="controlador/logout.php"><i class="mdi-action-exit-to-app left"></i><strong>Salir</strong></a></li>
		      </ul>
		    </div>
		  </nav>
		</div>
			<?php
				$query_fecha_numCada="SELECT DATE_FORMAT(fecha, '%Y-%m-%d')AS fecha_col,COUNT(*) num_reg FROM historial WHERE id_usuario='".$_SESSION['id-usuario-logueado']."' GROUP BY DATE_FORMAT(fecha, '%Y-%m-%d') DESC";
				$resultado=$mysqli->query($query_fecha_numCada); 
				$numero_fechas = $resultado->num_rows;
			?>

		<div><!--container-->
			<div class="row">
				<div class="col s12 l6 offset-l3 z-depth-2 " >
					<ul class="collection blue ">
						<?php
						if($numero_fechas==0){ ?>
							<li class="collection-item avatar li-historial">
								<h5 style="color:red"><strong>El historial está vacío.</strong></h5>
							</li>
						<?php 
						}
						else{
										
							while($cont_fila = $resultado->fetch_assoc()) {						
								$num_reg_dia=$cont_fila['fecha_col'];

								$mes=date("F",strtotime($cont_fila['fecha_col']));

								if ($mes=="January") $mes="Enero";
								if ($mes=="February") $mes="Febrero";
								if ($mes=="March") $mes="Marzo";
								if ($mes=="April") $mes="Abril";
								if ($mes=="May") $mes="Mayo";
								if ($mes=="June") $mes="Junio";
								if ($mes=="July") $mes="Julio";
								if ($mes=="August") $mes="Agosto";
								if ($mes=="September") $mes="Septiembre";
								if ($mes=="October") $mes="Octubre";
								if ($mes=="November") $mes="Noviembre";
								if ($mes=="December") $mes="Diciembre";
							?>
							<li class="collection-header white-text" style="text-align:center"  style="text-align:center"><h4><strong>
							<?php echo date("j ",strtotime($cont_fila['fecha_col'])) .$mes.' de '
							.date("Y",strtotime($cont_fila['fecha_col']));?>
							</strong></h4></li>
							<?php
								$resultado2=$mysqli->query("SELECT * FROM historial NATURAL JOIN comando_historial WHERE id_usuario='".$_SESSION['id-usuario-logueado']."' AND  DATE_FORMAT(fecha, '%Y-%m-%d')= '$num_reg_dia' ORDER BY fecha DESC");
								while($cont_cada_dia =$resultado2->fetch_assoc()) { 
							?>
							<li class="collection-item avatar li-historial">
								
							  <?php if(utf8_encode($cont_cada_dia['id_comando'])==1){?>						  
								<i class="mdi-action-settings-power circle green"></i>						  
							  <?php }
							  else if(utf8_encode($cont_cada_dia['id_comando'])==2){ ?>
								<i class="mdi-image-photo-camera circle indigo"></i>
							  <?php } 
							  else if(utf8_encode($cont_cada_dia['id_comando'])==3){ ?>
								<i class="mdi-av-videocam circle teal"></i>
							  <?php } 
							  else if(utf8_encode($cont_cada_dia['id_comando'])==4){ ?>
								<i class="mdi-editor-mode-edit circle purple"></i>
							  <?php } 
							  else if(utf8_encode($cont_cada_dia['id_comando'])==5){ ?>
								<i class="mdi-communication-email circle light-blue"></i>
							  <?php } 
							  else if(utf8_encode($cont_cada_dia['id_comando'])==6){ ?>
								<i class="mdi-device-gps-not-fixed circle orange"></i>
							  <?php } 
							  else if(utf8_encode($cont_cada_dia['id_comando'])==7){ ?>
								<i class="mdi-device-gps-off circle deep-orange"></i>
							  <?php } 
							  else if(utf8_encode($cont_cada_dia['id_comando'])==8){ ?>
								<i class="mdi-action-settings-power circle red"></i>
							  <?php } ?>
							  
							  <span class="title"><strong><?php echo utf8_encode($cont_cada_dia['comando'])?></strong></span>
							  <p><?php echo date("G:i:s",strtotime($cont_cada_dia['fecha'])).'<br>'.date("d/m/Y",strtotime($cont_cada_dia['fecha']))?>
							  </p>
							  
							</li>
							<?php
										
								} 
							}
						}
						?>
				    
					 </ul>
				</div>
			</div>
  		</div><!--container-->

  		<?php } ?>
    </body>
  </html>