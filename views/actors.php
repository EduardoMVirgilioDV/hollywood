<main class="container">
	<section class="row">
		<article class="col">
			<h1>ACTORES</h1>
		</article>
	</section>

	<section class="row">
			<?php

				$query_actors = "SELECT * FROM actores";
				$resultado = mysqli_query($conexion,$query_actors);
				if(mysqli_num_rows($resultado) > 0){
					while($actor = mysqli_fetch_assoc($resultado)){
			?>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">
								<?php echo $actor['nombre']; ?>
								<?php echo $actor['apellido']; ?>
							</h4>
							<p class="card-text">
								<?php echo $actor['nacionalidad']; ?>
							</p>
							<a href="index.php?view=actor&actor=<?php echo $actor['id']; ?>" class="card-link">Ver más</a>
						</div>
					</div>
				</div>

			<?php	} 	
				} 	else { 
			?>
				<h2>
					no se han encontrado resultados
				</h2>
			<?php	}	?>
	</section>
</main>