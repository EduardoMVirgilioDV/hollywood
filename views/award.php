<main class="container">
	<section class="row">
			<?php 
				if(isset($_GET['award'])){
					$award_id = $_GET['award'];
					$query_award = mysqli_query($conexion, "SELECT * FROM premios WHERE id = '$award_id'");
					$award = mysqli_fetch_assoc($query_award);
					$query_nominacions = mysqli_query($conexion, "SELECT nominaciones.* FROM premios 
					INNER JOIN premios_nominaciones 
					ON premios_nominaciones.premio_id = premios.id 
					INNER JOIN nominaciones 
					ON nominaciones.id = premios_nominaciones.nominacion_id 
					WHERE premios.id = '$award_id'");
			?>
		<article class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><?php echo $award['nombre']; ?></h4>
					<p class="card-text"><?php echo $award['fecha']; ?></p>
					<p class="card-text"><?php echo $award['detalle']; ?></p>
				</div>
			</div>
		</article>

		<article class="col-md-8 my-3">
			<div class="card">
				<div class="card-body">
				<h4 class="card-title">Nominaciones</h4>
					<ul class="list-group list-group-flush">
						<?php
							while($nomina = mysqli_fetch_assoc($query_nominacions)){
						?>	
							<li class="list-group-item">
								<?php echo $nomina['nominacion']; ?>
							</li>
						<?php } } ?>
					</ul>
			</div>
		</article>
	</section>
</main>
