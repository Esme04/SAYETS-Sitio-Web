<?php
session_start();

if(!isset($_SESSION['nombre']))
{
header('Location:error.php');
}

?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Sayets</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

  <!-- favicon -->
  <link href="images/pageds_icono.png" rel="shortcut icon">

  <!-- 
  Essential stylesheets
  =====================================-->
  <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="plugins/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick/slick-theme.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">


<header style="background-color: #D5DDFF;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="index.php">
            <img src="images/sayets.png" alt="" width="110">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <li class="nav-item active" >
                <a class="nav-link" href="index.php" style="font-size: 20px;">Inicio</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link dropdown-toggle" href="#!" style="font-size: 20px;">Consulta los costos</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link dropdown-toggle" href="#" style="font-size: 20px;">
                  Contáctanos</a>
              </li>
              
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              <li class="nav-item">
                <a class="nav-link text-white add-button" style="font-size: 17px;">
									<?php 
                   if(isset($_SESSION['nombre']))
                   {
                    echo " ".$_SESSION['nombre'];
                    $cliente= $_SESSION['nombre'];
                    }?>

								</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-8">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>
						<?php
              $id_modificar=$_REQUEST["id"];

              include 'conexion.php';
              $query="SELECT nombreContacto FROM contacto where pkIdContacto='$id_modificar'";
              $resultado = $mysqli->query($query);
              if ($resultado->num_rows > 0) {
              while($row = $resultado->fetch_assoc()) {
              $nombres=$row["nombreContacto"];
             
              echo "$nombres";
           		}
             	} else {}
             	?>
						
					</h2>

				</div>
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Información personal</h3>
							<form action="#">
								<!-- First Name -->
								<div class="form-group">
									<label for="first-name">Nombre (s): </label>
									<div  class="caja">
									<?php
                   $id_modificar=$_REQUEST["id"];

                   include 'conexion.php';
                   $query="SELECT nombreContacto FROM contacto where pkIdContacto='$id_modificar'";
                   $resultado = $mysqli->query($query);
                   if ($resultado->num_rows > 0) {
                   while($row = $resultado->fetch_assoc()) {
                   $nombres=$row["nombreContacto"];
             
                   echo "$nombres";
           		    }
                 	} else {}
                	?>
									</div>
									
								</div>
								<!-- Last Name -->
								<div class="form-group">
									<label for="last-name">Apellido paterno:</label>
									<div  class="caja">
									<?php
                   $id_modificar=$_REQUEST["id"];

                   include 'conexion.php';
                   $query="SELECT apellidoPatContacto FROM contacto where pkIdContacto='$id_modificar'";
                   $resultado = $mysqli->query($query);
                   if ($resultado->num_rows > 0) {
                   while($row = $resultado->fetch_assoc()) {
                   $apellidoPat=$row["apellidoPatContacto"];
             
                   echo "$apellidoPat";
           		    }
                 	} else {}
                	?>
                </div>
								</div>
		
								<!-- Comunity Name -->
								<div class="form-group">
									<label for="comunity-name">Apellido materno:</label>
									<div  class="caja">
									<?php
                   $id_modificar=$_REQUEST["id"];

                   include 'conexion.php';
                   $query="SELECT apellidoMatContacto FROM contacto where pkIdContacto='$id_modificar'";
                   $resultado = $mysqli->query($query);
                   if ($resultado->num_rows > 0) {
                   while($row = $resultado->fetch_assoc()) {
                   $apellidoMat=$row["apellidoMatContacto"];
             
                   echo "$apellidoMat";
           		    }
                 	} else {}
                	?>
                </div>
								</div>

								<!-- Comunity Name -->
								<div class="form-group">
									<label for="comunity-name">Edad:</label>
									<div  class="caja">
									<?php
                   $id_modificar=$_REQUEST["id"];

                   include 'conexion.php';
                   $query="SELECT edadContacto FROM contacto where pkIdContacto='$id_modificar'";
                   $resultado = $mysqli->query($query);
                   if ($resultado->num_rows > 0) {
                   while($row = $resultado->fetch_assoc()) {
                   $edad=$row["edadContacto"];
             
                   echo "$edad";
           		    }
                 	} else {}
                	?>
                </div>
								</div>

							</form>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<form action="#">	
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Telefono fijo:</label>
								<div  class="caja">
									<?php
                   $id_modificar=$_REQUEST["id"];

                   include 'conexion.php';
                   $query="SELECT telFijoContacto FROM contacto where pkIdContacto='$id_modificar'";
                   $resultado = $mysqli->query($query);
                   if ($resultado->num_rows > 0) {
                   while($row = $resultado->fetch_assoc()) {
                   $telFijo=$row["telFijoContacto"];
             
                   echo "$telFijo";
           		    }
                 	} else {}
                	?>
                </div>
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">Telefono movil: </label>
								<div  class="caja">
									<?php
                   $id_modificar=$_REQUEST["id"];

                   include 'conexion.php';
                   $query="SELECT telMovilContacto FROM contacto where pkIdContacto='$id_modificar'";
                   $resultado = $mysqli->query($query);
                   if ($resultado->num_rows > 0) {
                   while($row = $resultado->fetch_assoc()) {
                   $telMovil=$row["telMovilContacto"];
             
                   echo "$telMovil";
           		    }
                 	} else {}
                	?>
                </div>
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Parentesco: </label>
								<div  class="caja">
									<?php
                   $id_modificar=$_REQUEST["id"];

                   include 'conexion.php';
                   $query="SELECT pkIdContacto, parentescoContacto FROM contacto where pkIdContacto='$id_modificar'";
                   $resultado = $mysqli->query($query);
                   if ($resultado->num_rows > 0) {
                   while($row = $resultado->fetch_assoc()) {
                   $id=$row["pkIdContacto"];
                   $parentesco=$row["parentescoContacto"];
             
                   echo "$parentesco";
                   echo "<div class='form-group'><input type='hidden' class='form-control input-lg' value='$id' id='id'></div>";
           		    }
                 	} else {}
                	?>
                </div>
							</div>

							<div class="form-group">
								<label for="confirm-password"></label>
								<input type="hidden" class="form-control" id="confirm-password">
							</div>


							<!-- Submit Button -->
							<button class="btn btn-transparent" id="btnE">Editar datos</button>

              <br>

							
						</form>
            <button class="btn btn-transparent" id="btnR">Regresar</button>
					</div>
					</div>

				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">

						<!-- User Image -->
						<div class="profile-thumb">


							<?php
              include 'conexion.php';
              $query="SELECT fotoContacto FROM contacto WHERE pkIdContacto='$id_modificar'";
              $resultado = $mysqli->query($query);
              if ($resultado->num_rows > 0) {
              while($row = $resultado->fetch_assoc()) {
              $info=$row["fotoContacto"];
              echo "<img src='images/$info' alt='' class='rounded-circle'>";
              }
              }
              ?>
							
						</div>
						<br>
							<button type="submit" class="btn btn-main-sm" id="btnFoto3">Agregar/Editar fotografía</button>

					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->
<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="images/sayetsSin.png" alt="logo" width="140px">
          <!-- description -->
          <p class="alt-color" style="font-size:25PX">S    A    Y    E    T    S</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
        <div class="block">
          <h4>Sitos disponibles:</h4>
          <ul>
            <li><a href="dashboard-my-ads.html">Inicio</a></li>
            <li><a href="dashboard-favourite-ads.html">Consulta de precios</a></li>
            <li><a href="dashboard-archived-ads.html">Contáctanos</a></li>
            <li><a href="dashboard-archived-ads.html">Inicia sesión</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
        <div class="block">
        </div>
      </div>
      <!-- Promotion -->
      <div class="col-lg-4 col-md-7">
        <!-- App promotion -->
        <div class="block-2 app-promotion">
          <div class="mobile d-flex  align-items-center">
            <p class="mb-0" style="text-align: center; font-size:18px">Pulsera para la gestión de datos</p>
          </div>
          <div class="download-btn d-flex my-3">
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="fa fa-angle-up"></i>
  </div>
</footer>
<!-- 
Essential Scripts
=====================================-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/bootstrap/bootstrap-slider.js"></script>
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/map.js" defer></script>

<script src="js/script.js"></script>
<script  type="text/javascript" src="js/conecta.js"></script>  

</body>

</html>