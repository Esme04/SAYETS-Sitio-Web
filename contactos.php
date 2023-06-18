<?php
session_start();

if(!isset($_SESSION['nombre']))
{
header('Location:login3.php');
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
                <a class="nav-link text-white add-button"style="font-size: 17px;">
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
<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-lg-3">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">

							<?php
              include 'conexion.php';
              $query="SELECT fotoAdulto FROM adultos WHERE nombreAdulto='$cliente' and estatusAdulto='1'";
              $resultado = $mysqli->query($query);
              if ($resultado->num_rows > 0) {
              while($row = $resultado->fetch_assoc()) {
              $info=$row["fotoAdulto"];
              echo "<img src='images/$info' alt='' class='rounded-circle'>";
              }
              }
              ?>

						</div>
						<!-- User Name -->
						<h5 class="text-center">
							<?php 
                  if(isset($_SESSION['nombre']))
                  {
                  echo " ".$_SESSION['nombre'];
                  
                  }
              ?>
						</h5>



						<button type="submit" class="btn btn-main-sm" id="btnFoto">Editar fotografía</button>

					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li><a href="contactos.php"><i class="fa fa-user"></i> Ver contactos de emergencia</a></li>
							<li>
								<a href="agregarContacto.php"><i class="fa fa-user"></i> Agregar contacto de emergencia</a>
							</li>
							<li>
								<a href="cerrarsesion.php"><i class="fa fa-cog"></i>Cerrar sesion</a>
							</li>
						</ul>
					</div>

					<!-- delete-account modal -->
					<!-- delete account popup modal start-->
<!-- Modal -->
<div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
        <h6 class="py-2">Are you sure you want to delete your account?</h6>
        <p>Do you really want to delete these records? This process cannot be undone.</p>
        <textarea class="form-control" name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
      </div>
      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- delete account popup modal end-->
					<!-- delete-account modal -->

				</div>
			</div>

			<div class="col-lg-9">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Contactos de emergencia</h3>
					<table class="table table-bordered table-hover"  id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr  style="color: #FFFFFF; background-color: #4A6FD6;">
								<th class="text-center">Nombre(s)</th>
								<th class="text-center">Apellido paterno</th>
								<th class="text-center">Apellido materno</th>
								<th class="text-center">Parentesco</th>
								<th class="text-center"></th>
							</tr>
						</thead>
						<tbody>
							<?php
              include 'conexion.php';
              $query="SELECT pkIdAdulto FROM adultos WHERE nombreAdulto='$cliente'";
              $resultado = $mysqli->query($query);
              if ($resultado->num_rows > 0) {
              while($row = $resultado->fetch_assoc()) {
              $id_adulto=$row["pkIdAdulto"];
              }
              }
              ?>

								<?php
								  
                  include 'conexion.php';
                  $query="SELECT pkIdContacto, nombreContacto, apellidoPatContacto, apellidoMatContacto, parentescoContacto FROM contacto where fkIdAdulto='$id_adulto' and estatusContacto='1'";
                  $resultado = $mysqli->query($query);
                  if ($resultado->num_rows > 0) {
                  while($row = $resultado->fetch_assoc()) {
                  $id=$row["pkIdContacto"];
                  $nombres=$row["nombreContacto"];
                  $apellidoPat=$row["apellidoPatContacto"];
                  $apellidoMat=$row["apellidoMatContacto"];
                  $parentesco=$row["parentescoContacto"];

                  echo "<tr> ";
                  echo "<td class='product-thumb'>$nombres</td>";
                  echo "<td class='product-thumb'>$apellidoPat</td>";
                  echo "<td class='product-thumb'>$apellidoMat</td>";
                  echo "<td class='product-thumb'>$parentesco</td>";

                  echo "<td class='action' data-title='Action'>
                  <div class=''>
                    <ul class='list-inline justify-content-center'>
                      <li class='list-inline-item'>
                      <button type='button' data-toggle='tooltip' data-placement='top' title='Ver datos completos' class='btn btn-warning btn-circle btn-sm' id='v$id'><i class='fa fa-eye'></i></button></li>";
                  echo "<br>";
                  echo "<br>";
                  echo "<input value='$id' type='hidden' id='tv$id'>";

                  echo "<input value='$id' type='hidden' id='te$id'>";  

                                
                   echo"<li class='list-inline-item'>
                        <button type='button' class='btn btn-danger btn-circle btn-sm' data-toggle='tooltip' data-placement='top' title='Eliminar' id='e$id'>
                          <i class='fa fa-trash'></i></button>
                      </li>
                    </ul>
                  </div>
                </td>
                </tr>";

                  }
                  } else {}
                  ?> 

							
						</tbody>
					</table>
				</div>

			


			
				

			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
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
  <!-- Container End -->
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