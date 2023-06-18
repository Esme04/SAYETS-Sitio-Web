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


<?php
$id_modificar=$_REQUEST["id"];
  include 'conexion.php';
  $query="SELECT pkIdContacto FROM contacto WHERE pkIdContacto='$id_modificar'";
  $resultado = $mysqli->query($query);
  if ($resultado->num_rows > 0) {
  while($row = $resultado->fetch_assoc()) {
  $id=$row["pkIdContacto"];
  echo "<div class='form-group'><input type='hidden' class='form-control input-lg' value='$id' id='id'></div>";
          
  }
  }
  ?>

<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-6">       
      </div>
      <div class="col-lg-8 col-md-6">
        <div class="package-content bg-light border text-center my-2 my-lg-0 p-5">
          <div class="package-content-heading border-bottom">
            <h2>Editar fotografía</h2>


            <form action="" method="POST" enctype="multipart/form-data"/>
            <div class="form-group">
            <br>
            <input type="file"  name="archivo" id="1"> 
            <button type="submit" class="btn btn-main-sm-success" name="subir">Cargar</button>
            </div>

            

             <?php
              if (isset($_POST['subir'])) {
                 $archivo = $_FILES['archivo']['name'];
    
                  if (isset($archivo) && $archivo != "") {
                      $tipo = $_FILES['archivo']['type'];
                      $tamano = $_FILES['archivo']['size'];
                      $temp = $_FILES['archivo']['tmp_name'];
                        
                      if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error: La extensión o el tamaño de los archivos no es correcta.<br/>
                                              - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                      }
                      else {
                                    
                      if (move_uploaded_file($temp, 'images/'.$archivo)) {
                      chmod('images/'.$archivo, 0777);
                      echo "<br>";
                      echo " <div class='form-group'><input type='text' class='form-control input-lg' value='$archivo' id='img'></div>";
                      echo '<p><img src="images/'.$archivo.'"width="316" heigh="316"></p>';
                                        
                      }
                      else {
                      echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                      }
                  }
                }
              }
            ?>        
              <br>

              <button type="button" class="btn btn-primary" id="btnFoto4">Guardar</button>

            </form>
      <div class="col-lg-4 col-md-6 mx-sm-auto">
      </div>
    </div>
  </div>
</section>


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