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
		$id= $_POST['element'];
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
		if(empty($id)){
			$errors[] = 'No se encontro al actor';
		}
		if(!empty($errors)){
			echo '<div class="alert alert-danger">';
			foreach($errors as $error) {
			 echo $error . '<br>';
			}
			echo '</div>';
		}else{
			
			$query_primary= "UPDATE `actores` SET `nombre`='$nombre',`apellido`='$apellido',`nacionalidad`='$nacionalidad',`descripcion`='$descripcion' WHERE actores.id =  '$id'";
			$resultado_actor = mysqli_query($conexion, $query_primary);
		
			if($resultado_actor){
				header("Location: index.php?view=actor&&actor=$id");
				
			exit();
			}

		}
		
	}
	if($_GET['entity'] == 'award'){
		$premio = $_POST['premio'];
		$web = $_POST['web'];
		$motivo = $_POST['motivo'];
		$id= $_POST['element'];

		if(empty($premio)){
			$errors[] = 'El campo Premio es requerido';
		}

		if(empty($web)){
			$errors[] = 'El campo Web es requerido';
		}

		if(empty($motivo)){
			$errors[] = 'El campo Motivo es requerido';
		}

		if(empty($id)){
			$errors[] = 'No se encontro al premio';
		}

		if(!empty($errors)){
			echo '<div class="alert alert-danger">';
			foreach($errors as $error) {
			 echo $error . '<br>';
			}
			echo '</div>';
		}else{
			
			$query_primary= "UPDATE `premios` SET `premio`='$premio',`web`='$web',`motivo`='$motivo' WHERE premios.id = '$id'";
			
			$resultado_premio = mysqli_query($conexion, $query_primary);

			header("Location: index.php?view=award&award=$id");
			
			exit();

		}
		
	}
	exit();
}

	
	
?>
<main class="container">
<?php if($_GET['entity'] == 'actor'){ ?>

	<?php
		$actor_id = $_GET['actor'];
		$query_actor = "SELECT * FROM actores WHERE id= '$actor_id'";
		$resultado_actor = mysqli_query($conexion,$query_actor); 
		$actor =  mysqli_fetch_assoc($resultado_actor);
	?>

	<section class="row">
		<article class="col">
			<h1>Editar Actor</h1>
		</article>
	</section>
	<!--Es necesario el container,  el row, y col sì o sì -->
	<section class="row">
		<div class="col">
			<form action="index.php?view=edit&&entity=actor" method="POST">
				<input type="hidden" name="element" value="<?php echo $actor_id ?>">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre del actor" name='nombre' value="<?php echo $actor['nombre']; ?>">
				</div>
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" class="form-control"  id="apellido" placeholder="Ingresa el apellido del actor"  name='apellido' value="<?php echo $actor['apellido']; ?>">
				</div>
				<div class="form-group">
					<label for="nacionalidad">Nacionalidad</label>
					<input type="text" class="form-control" id="nacionalidad" placeholder="Ingresa la nacionalidad del actor"  name='nacionalidad'  value="<?php echo $actor['nacionalidad']; ?>">
				</div>
				<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"><?php echo $actor['descripcion']; ?></textarea>
				</div>
				<button type="submit" class="btn btn-warning">Modificar</button>
			</form>
		</div>
	</section>
<?php } ?>

<?php if($_GET['entity'] == 'award'){ ?>

	<?php
		$premio_id = $_GET['award'];
		$query_premio = "SELECT * FROM premios WHERE id= '$premio_id'";
		$resultado_premio = mysqli_query($conexion,$query_premio); 
		$premio =  mysqli_fetch_assoc($resultado_premio);

		
	?>

<section class="row">
	<article class="col">
		<h1>Editar Premio</h1>
	</article>
</section>
<!--Es necesario el container,  el row, y col sì o sì -->
<section class="row">
	<div class="col">
		<form action="index.php?view=edit&&entity=award" method="POST">
		<input type="hidden" name="element" value="<?php echo $premio_id ?>">
			<div class="form-group">
				<label for="premio">Premio</label>
				<input type="text" class="form-control" id="premio" placeholder="Ingresa el nombre del premio" name='premio' value="<?php echo $premio['premio']; ?>">
			</div>
			<div class="form-group">
				<label for="web">Sitio Web</label>
				<input type="text" class="form-control"  id="web" placeholder="Ingresa el sitio web del premio"  name='web' value="<?php echo $premio['web']; ?>">
			</div>
			<div class="form-group">
				<label for="motivo">Motivo</label>
				<input type="text" class="form-control" id="motivo" placeholder="Ingresa el motivo de la premiacion"  name='motivo' value="<?php echo $premio['motivo']; ?>">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
</section>
<?php } ?>

</main>