<?php 

if(!isset($_SESSION['user'])){ 
	$newURL = 'index.php?view=home';
	header('Location: '.$newURL);
	exit();
}
if($_SESSION['user']['is_admin'] != 1){ 
	$newURL = 'index.php?view=home';
	header('Location: '.$newURL);
	exit();
}

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
			
			$query_actor= "INSERT INTO actores (nombre, apellido,nacionalidad,descripcion) VALUES ('$nombre', '$apellido', '$nacionalidad', '$descripcion')";
			$resultado_actor = mysqli_query($conexion, $query_actor);
		
			if($resultado_actor){
				header("Location: index.php?view=actors");
				
			exit();
			}

		}
		
	}
	if($_GET['entity'] == 'award'){
		$premio = $_POST['premio'];
		$web = $_POST['web'];
		$motivo = $_POST['motivo'];

		if(empty($premio)){
			$errors[] = 'El campo Premio es requerido';
		}

		if(empty($web)){
			$errors[] = 'El campo Web es requerido';
		}

		if(empty($motivo)){
			$errors[] = 'El campo Motivo es requerido';
		}

		if(!empty($errors)){
			echo '<div class="alert alert-danger">';
			foreach($errors as $error) {
			 echo $error . '<br>';
			}
			echo '</div>';
		}else{
			
			$query_premio= "INSERT INTO premios (premio, web,motivo) VALUES ('$premio', '$web', '$motivo')";
			$resultado_premio = mysqli_query($conexion, $query_premio);
		
			if($resultado_premio){
				header("Location: index.php?view=awards");
				exit();
			}

		}
		
	}
	if($_GET['entity'] == 'nom'){
		$premio = $_POST['premio'];
		$actor = $_POST['actor'];
		$fecha = $_POST['fecha'];

		if(empty($premio)){
			$errors[] = 'El campo Premio es requerido';
		}

		if(empty($actor)){
			$errors[] = 'El campo actor no es valido';
		}

		if(empty($fecha)){
			$errors[] = 'El campo fecha es requerido';
		}

		if(!empty($errors)){
			echo '<div class="alert alert-danger">';
			foreach($errors as $error) {
			 echo $error . '<br>';
			}
			echo '</div>';
			exit();
		}else{
			
			$query_premio= "INSERT INTO nominaciones (actor_id, premio_id,fecha) VALUES ( '$actor', '$premio', '$fecha');";
			$resultado_premio = mysqli_query($conexion, $query_premio);
		
			if($resultado_premio){
				header("Location: index.php?view=actor&&actor=$actor");
				exit();
			}

		}
		
	}
}

	
	
?>
<main class="container">
<?php if($_GET['entity'] == 'actor'){ ?>

	<section class="row">
		<article class="col">
			<h1>Nuevo Actor</h1>
		</article>
	</section>
	<!--Es necesario el container,  el row, y col sì o sì -->
	<section class="row">
		<div class="col">
			<form action="index.php?view=create&&entity=actor" method="POST">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre del actor" name='nombre'>
				</div>
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" class="form-control"  id="apellido" placeholder="Ingresa el apellido del actor"  name='apellido'>
				</div>
				<div class="form-group">
					<label for="nacionalidad">Nacionalidad</label>
					<input type="text" class="form-control" id="nacionalidad" placeholder="Ingresa la nacionalidad del actor"  name='nacionalidad'>
				</div>
				<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
	</section>
<?php } ?>

<?php if($_GET['entity'] == 'award'){ ?>

<section class="row">
	<article class="col">
		<h1>Nuevo Premio</h1>
	</article>
</section>
<!--Es necesario el container,  el row, y col sì o sì -->
<section class="row">
	<div class="col">
		<form action="index.php?view=create&&entity=award" method="POST">
			<div class="form-group">
				<label for="premio">Premio</label>
				<input type="text" class="form-control" id="premio" placeholder="Ingresa el nombre del premio" name='premio'>
			</div>
			<div class="form-group">
				<label for="web">Sitio Web</label>
				<input type="text" class="form-control"  id="web" placeholder="Ingresa el sitio web del premio"  name='web'>
			</div>
			<div class="form-group">
				<label for="motivo">Motivo</label>
				<input type="text" class="form-control" id="motivo" placeholder="Ingresa el motivo de la premiacion"  name='motivo'>
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
</section>
<?php } ?>

</main>