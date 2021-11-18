<main class="container">
	<section class="row">
			<?php 
				if(isset($_GET['award'])){
					$award_id = $_GET['award'];
					$query_award = mysqli_query($conexion, "SELECT * FROM premios WHERE id = '$award_id'");
					$award = mysqli_fetch_assoc($query_award);
			?>
		<article class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><?php echo $award['premio']; ?></h4>
					<p class="card-text"><?php echo $award['motivo']; ?></p>
				</div>
				<?php if(isset($_SESSION['user'])){ ?>
					<?php if($_SESSION['user']['is_admin'] == 1){?>
						<div class="card-footer d-flex justify-content-between text-muted">
							<a href="index.php?view=edit&entity=award&award=<?php echo $award_id; ?>" class="btn btn-warning">Editar</a>
							<form action="index.php?view=delete" class="form-inline" method="post">
							<input type="hidden" name="entity" id="entity" value="award">
							<input type="hidden" name="element" id="element" value="<?php echo $award_id?>">
							<button type="submit" class="btn btn-danger">Borrar</button>
							</form>
						</div>
					<?php }?>
				<?php } ?>
			</div>
		</article>

		<article class="col-md-8 my-3">
			<div class="card">
				<div class="card-body">
				<h4 class="card-title">Ganadores</h4>
					<?php 
						$query_nominations = "SELECT nominaciones.fecha,actores.nombre,actores.apellido,actores.id AS actor_id FROM actores INNER JOIN nominaciones ON nominaciones.actor_id = actores.id INNER JOIN premios ON nominaciones.premio_id = premios.id WHERE premios.id = '$award_id'";
						$resultado = mysqli_query($conexion,$query_nominations);			
					?>
					<?php 	if(mysqli_num_rows($resultado) > 0){?>
					<ul class="list-group list-group-flush">


						<?php while($award = mysqli_fetch_assoc($resultado)){	 ?>
							<a href="index.php?view=actor&&actor=<?php echo $award['actor_id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-1"><?php echo $award['nombre'] ?> <?php echo $award['apellido'] ?> </h5>
									<small><?php echo $award['fecha'] ?></small>
								</div>
							</a>
						<?php } ?>
					</ul>
					<?php } else { ?>
						<p class="card-text"> No hay ganadores</p>
					<?php } ?>
			</div>
		</article>
		<?php }?>
	</section>
</main>
