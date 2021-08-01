
<?php

header("Content-Type: application/json; charset=utf-8");

include 'conexion.php';

$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);

$apellido = mysqli_real_escape_string($conexion,$_POST['apellido']);

$nacionalidad = mysqli_real_escape_string($conexion,$_POST['nacionalidad']);

$descripcion = mysqli_real_escape_string($conexion,$_POST['descripcion']);

$salida = [];

$consulta = "INSERT INTO actores (id,nombre,apellido,nacionalidad,descripcion) VALUES (NULL,'$nombre', '$apellido', '$nacionalidad','$descripcion')";

$resultado = mysqli_query($conexion,$consulta);

if($resultado){
	$salida= [
		'success' => true,
		'consulta' => $consulta,
		'metadata' => mysqli_insert_id($conexion)
	];
}else{
	$salida= [
		'success' => false,
		'consulta' => $consulta,
		'metadata' => mysqli_error($conexion)
	];
}

echo json_encode($salida);

?>