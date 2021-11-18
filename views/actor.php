	<main class="container">
	<!--Es necesario el container,  el row, y col sì o sì -->
	<?php if(isset($_GET['actor'])) { 
		$actor_id = $_GET['actor'];
		$query_actor = "SELECT * FROM actores WHERE id= '$actor_id'";
		$resultado_actor = mysqli_query($conexion,$query_actor); 
		$actor =  mysqli_fetch_assoc($resultado_actor);	
	?>
	<section class="row my-2">
		<article class="col-md-8">
			<div class="card">
				<div class="card-header">
					Actor/Actriz
				</div>
				<div class="card-body">
					<h4 class="card-title">
						<?php echo $actor['nombre']; ?> <?php echo $actor['apellido']; ?> 
					</h4>
					<p class="card-text"><?php echo $actor['nacionalidad']; ?></p>
					<p class="card-text"><?php echo $actor['descripcion']; ?></p>
				</div>
				<?php if(isset($_SESSION['user'])){ ?>
					<?php if($_SESSION['user']['is_admin'] == 1){?>
						<div class="card-footer d-flex justify-content-between text-muted">
							<a href="index.php?view=edit&entity=actor&actor=<?php echo $actor_id; ?>" class="btn btn-warning">Editar</a>
							<form action="index.php?view=delete" class="form-inline" method="post">
							<input type="hidden" name="entity" id="entity" value="actor">
							<input type="hidden" name="element" id="element" value="<?php echo $actor_id?>">
							<button type="submit" class="btn btn-danger">Borrar</button>
							</form>
						</div>
					<?php }?>
				<?php } ?>
			</div>
		</article>
	</section>

	<section class="jumbotron">
		<h2 class="display-4"> Premios </h2>
		<?php if(isset($_SESSION['user'])){ ?>
		<?php if($_SESSION['user']['is_admin'] == 1){?>
		<form action="index.php?view=create&&entity=nom" method="POST" class="form-inline my-2 p-2 bg-light">
			<input type="hidden" name="actor" id="actor" value="<?php echo $actor_id ?>">
		
			<div class="form-group">
				<select class="form-control" id="premio" name="premio">
				<?php 

				$query_awards = "SELECT * FROM premios";
				$resultado = mysqli_query($conexion,$query_awards);
				if(mysqli_num_rows($resultado) > 0){
				while($award = mysqli_fetch_assoc($resultado)){		
				?>
					<option value="<?php echo $award['id'] ?>">
					<?php echo $award['premio'] ?> -
					<?php echo $award['motivo'] ?>
					</option>
				<?php } ?>
				<?php } ?>
				</select>
			</div>
			<div class="form-group mx-2">
				<input type="text" class="form-control" id="fecha" placeholder="Año del premio"  name='fecha'>
			</div>
			<button type="submit" class="btn btn-primary">Agregar</button>
		</form>
		<?php }?>
				<?php } ?>
		<section class="row">
		<?php 
		
		$query_nominations = "SELECT nominaciones.id,nominaciones.actor_id,nominaciones.fecha,premios.premio,premios.motivo FROM actores INNER JOIN nominaciones ON nominaciones.actor_id = actores.id INNER JOIN premios ON nominaciones.premio_id = premios.id WHERE actores.id = '$actor_id'";
		$resultado = mysqli_query($conexion,$query_nominations);
			if(mysqli_num_rows($resultado) > 0){
				while($award = mysqli_fetch_assoc($resultado)){		
		?>
			<article class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $award['premio']; ?>
						</h4>
						<p class="card-text"><?php echo $award['fecha']; ?></p>
						<p class="card-text"><?php echo $award['motivo']; ?></p>
					</div>
					<?php if(isset($_SESSION['user'])){ ?>
						<?php if($_SESSION['user']['is_admin'] == 1){?>
							<div class="card-footer text-muted">
								<form action="index.php?view=delete" method="post">
									<input type="hidden" name="entity" id="entity" value="nomination">
									<input type="hidden" name="actor" id="actor" value="<?php echo $award['actor_id']?>">
									<input type="hidden" name="element" id="element" value="<?php echo $award['id']?>">
									<button type="submit" class="btn btn-danger">Borrar</button>
								</form>
							</div>
						<?php }?>
					<?php }?>
				</div>
			</article>
		<?php } ?>			
			</section>
		<?php } else { ?>
			<section class="row">
				<article class="col">
					<h1 class="display-1 text-center text-danger"> 
						NO TIENE PREMIOS
					</h1>
				</article>
			</section>
		<?php }}; ?>
	</section>
	</main>
