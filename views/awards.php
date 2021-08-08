<main class="container">
	<section class="row">
		<article class="col">
			<h1>PREMIOS</h1>
		</article>
	</section>
	<section class="row">
			<?php
				$query_premios = "SELECT * FROM premios";
				$resultado = mysqli_query($conexion,$query_premios);
				if (mysqli_num_rows($resultado)>0){
			?>

			<?php while($award = mysqli_fetch_array($resultado)){ ?>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"><?php echo $award['nombre']; ?></h4>
							<p class="card-text"><?php echo $award['fecha']; ?></p>
							<p class="card-text"><?php echo $award['detalle']; ?></p>
							<a href="index.php?view=award&award=<?php echo $award['id']; ?>" class="card-link">Ver más</a>
						</div>
					</div>
				</div>
			<?php	} }	else { ?>
				<h2>
					no se han encontrado resultados para la busqueda';
				</h2>
			<?php	}	?>
	</section>
</main>