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
			<h1>ACTOR</h1>
		</article>
	</section>
	<!--Es necesario el container,  el row, y col sì o sì -->
	<?php if($_GET) { ?>
		<section class="row">
			<article class="col">
				<?php 
					
					$actor_id = $_GET['id'];
					$query_actor = "SELECT * FROM actores WHERE id= '$actor_id'";
					$resultado_actor = mysqli_query($conexion,$query_actor); 
					$actor =  mysqli_fetch_assoc($resultado_actor);	
				?>
				<h2>
					<?php echo $actor['nombre']; ?> 
					<?php echo $actor['apellido']; ?> 
				</h2>
				<h3>
					Nacionalidad: <?php echo $actor['nacionalidad']; ?>
				</h3>
				<h3>
					<?php echo $actor['descripcion']; ?>
				</h3>
			</article>
		</section>
		<?php 
			
			$consulta_premios = "SELECT premios.*, actores_premios.* FROM actores_premios
			INNER JOIN premios ON premios.idpremios = actores_premios.premios_idpremios
			WHERE actores_premios.actores_id = $actor_id ORDER BY actores_premios.anio ASC";

			$resultado_premios = mysqli_query($conexion,$consulta_premios);
			
			if (mysqli_num_rows($resultado_premios) > 0) {
		
				$contador = 0;
		?>
			<section class="row">
				<table class="table">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Año</th>
						<th scope="col">Premio</th>
						<th scope="col">Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($premio = mysqli_fetch_assoc($resultado_premios)){
							$contador++;
						?>
							<tr>
								<th scope="row"><?php echo $contador ?></th>
								<td><?php echo $premio['anio'] ?></td>
								<td><?php echo $premio['nombre'] ?></td>
								<td><?php echo $premio['descripcion'] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
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
