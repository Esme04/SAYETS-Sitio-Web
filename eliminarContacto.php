<?php

session_start();
//Validar que exista la variable de sesión del usuario
if(!isset($_SESSION['nombre']))
{
header('Location:error.php');
}
else
{

$id_eliminar=$_REQUEST['id'];



include 'conexion.php';
$query="DELETE FROM contacto where pkIdContacto=$id_eliminar";
$resultado = $mysqli->query($query);
echo '<script type="text/javascript"> window.location="contactos.php"</script>';

}

?>