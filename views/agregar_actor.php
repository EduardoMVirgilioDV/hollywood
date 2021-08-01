<?php include 'conexion.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<?php include 'include/head.php' ?>

</head>
<body>

	<?php include 'include/header.php' ?>
<main class="container">
	<section class="row">
		<article class="col">
			<h1>Nuevo Actor</h1>
		</article>
	</section>
	<!--Es necesario el container,  el row, y col sì o sì -->
	<section class="row">
		<div class="col">
			<form id='form-alta-actor' action="abm_actor.php" method="POST">
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

	<?php include 'include/footer.php' ?>
	<script src="js/main.js"></script>
</body>
</html