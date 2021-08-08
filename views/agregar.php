<?php 
if ($_POST && isset($_POST)) { 
	$errors = [];
	if($_GET['entity'] == 'actor'){
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nacionalidad = $_POST['nacionalidad'];
		$descripcion = $_POST['descripcion'];
		if(empty($apellido)){
			$errors[] = 'El campo Apellido es requerido';
		}
		if(empty($nombre)){
			$errors[] = 'El campo Nombre es requerido';
		}
		if(empty($nacionalidad)){
			$errors[] = 'El campo Nacionalidad es requerido';
		}
		if(empty($descripcion)){
			$errors[] = 'El campo Descripción es requerido';
		}
		if(!empty($errors)){
			echo '<div class="alert alert-danger">';
			foreach($errors as $error) {
			 echo $error . '<br>';
			}
			echo '</div>';
		}else{
			
			$query_actor= "INSERT INTO `actores` (`id`, `nombre`, `apellido`, `detalle`, `nacionalidad`) VALUES (NULL, '$nombre', '$apellido', '$descripcion', '$nacionalidad')";
			$resultado_actor = mysqli_query($conexion, $query_actor);
		
			if($resultado_actor){
				header("Location:index.php?view=actors")
			}

		}
		
	}
}

	
	
?>
<main class="container">
	<section class="row">
		<article class="col">
			<h1>Nuevo Actor</h1>
		</article>
	</section>
	<!--Es necesario el container,  el row, y col sì o sì -->
	<section class="row">
		<div class="col">
			<form id='form-alta-actor' action="index.php?view=agregar&&entity=actor" method="POST">
				<div class="form-group">
					<label for="nombre_actor">Nombre</label>
					<input type="text" class="form-control" id="nombre_actor" placeholder="Ingresa el nombre del actor" name='nombre'>
				</div>
				<div class="form-group">
					<label for="apellido_actor">Apellido</label>
					<input type="text" class="form-control"  id="apellido_actor" placeholder="Ingresa el apellido del actor"  name='apellido'>
				</div>
				<div class="form-group">
					<label for="nacionalidad_actor">Nacionalidad</label>
					<input type="text" class="form-control" id="nacionalidad_actor" placeholder="Ingresa la nacionalidad del actor"  name='nacionalidad'>
				</div>
				<div class="form-group">
					<label for="descripcion_actor">Descripcion</label>
					<textarea name="descripcion" id="descripcion_actor" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
	</section>
</main>