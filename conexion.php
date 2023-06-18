<?php
$hostname="129.153.164.211";
$usuario="admin_sayets";
$password="sayets";
$basededatos="admin_sayets";

$mysqli = new mysqli($hostname, $usuario, $password,$basededatos);
if ( mysqli_connect_errno() ) {
	echo "Error de conexión a la BD: ".mysqli_connect_error();
	exit();
}
else
{}
?>
