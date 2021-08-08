	<main class="container">
	<section class="row">
		<article class="col">
			<h1>ACTOR</h1>
		</article>
	</section>
	<!--Es necesario el container,  el row, y col sì o sì -->
	<?php if($_GET) { 
		$actor_id = $_GET['actor'];
		$query_actor = "SELECT * FROM actores WHERE id= '$actor_id'";
		$resultado_actor = mysqli_query($conexion,$query_actor); 
		$actor =  mysqli_fetch_assoc($resultado_actor);	
	?>
	<section class="row">
		<article class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">
						<?php echo $actor['nombre']; ?> <?php echo $actor['apellido']; ?> 
					</h4>
					<p class="card-text"><?php echo $actor['nacionalidad']; ?></p>
					<p class="card-text"><?php echo $actor['detalle']; ?></p>
				</div>
			</div>
		</article>
	</section>

		<section class="row">
			<article class="col">
				<h1>Premios</h1>
			</article>
		</section>
		<section class="row">
	<?php 
			
		$consulta_nominaciones = "SELECT premios.nombre AS award_name, premios.fecha AS award_date, premios.id AS award_id, nominaciones.nominacion AS nombre, nominaciones.detalle AS detalle FROM actores INNER JOIN actores_premios ON actores_premios.actor_id = actores.id INNER JOIN premios_nominaciones ON premios_nominaciones.id = actores_premios.premio_nominacion_id INNER JOIN premios ON premios.id = premios_nominaciones.premio_id INNER JOIN nominaciones ON nominaciones.id = premios_nominaciones.nominacion_id WHERE actores.id = '$actor_id'";

		$resultado_nominaciones = mysqli_query($conexion,$consulta_nominaciones);
		
		if (mysqli_num_rows($resultado_nominaciones) > 0) {
			while ($nominaciones = mysqli_fetch_assoc($resultado_nominaciones)){
	?>
			<article class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $nominaciones['award_name']; ?>
						</h4>
						<p class="card-text"><?php echo $nominaciones['award_date']; ?></p>
						<p class="card-text"><?php echo $nominaciones['nombre']; ?></p>
						<p class="card-text"><?php echo $nominaciones['detalle']; ?></p>
					</div>
				</div>
			</article>
			
	<?php	} ?>			
		</section>
	<?php } else { ?>
		<section class="row">
			<article class="col">
				<h1 class="display-1 text-center text-danger"> 
					NO TIENE PREMIOS
				</h1>
			</article>
		</section>
		<?php } ?>
	<?php }?>
	</main>

		
	<?php include 'include/footer.php' ?>
	
	<script src="js/main.js"></script>
</body>
</html
