<!DOCTYPE html>
<html>
	<head>
		<title>Sayets</title>		
		<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<meta charset="UTF-8">
	</head>
	<body align="center">

<?php

session_start();
//Validar que exista la variable de sesión del usuario
if(!isset($_SESSION['nombre']))
{
header('Location:error.php');
}
else
{

$fkId=$_REQUEST['fkId'];
$nombres=$_REQUEST['nombres'];
$apellidoPat=$_REQUEST['apellidoPat'];
$apellidoMat=$_REQUEST['apellidoMat'];
$edad=$_REQUEST['edad'];
$telFijo=$_REQUEST['telFijo'];
$telMovil=$_REQUEST['telMovil'];
$parentesco=$_REQUEST['parentesco'];
$img=$_REQUEST['img'];

if(empty($fkId)) {
}
else{
include 'conexion.php';
$query="INSERT INTO contacto (nombreContacto, apellidoPatContacto, apellidoMatContacto, edadContacto, parentescoContacto, telFijoContacto, telMovilContacto, fotoContacto, fkIdAdulto) VALUES ('$nombres','$apellidoPat','$apellidoMat','$edad','$parentesco', '$telFijo', '$telMovil', '$img', '$fkId' )";
$resultado = $mysqli->query($query);
echo '<script type="text/javascript"> window.location="contactos.php"</script>';
}

}
?>
</body>
</html>