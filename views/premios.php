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
			<h1>PREMIOS</h1>
		</article>
	</section>
	<!--Es necesario el container,  el row, y col sì o sì -->
	<section class="row">
		<div class="col">
			<form class="form-inline" action="premios.php" method="get">
				<div class="input-group">
					<input type="text" class="form-control" name='premio' placeholder="Actor">
				</div>
				<button type="submit" class="btn">buscar</button>
			</form>
		</div>
	</section>

	<section class="row">
		<section class="col">
			<?php

				if($_GET){
					$premio = $_GET['premio'];
					$query_premios = "SELECT * FROM premios WHERE nombre LIKE '%$premio%'";
				}else{

					$query_premios = "SELECT * FROM premios";
				}

				$resultado = mysqli_query($conexion,$query_premios);
					// si trajo mas de 0 filas 
				if (mysqli_num_rows($resultado)>0){
					$contador=0;
			?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Nombre</th>
								<th scope="col">Descripcion</th>

							</tr>
						</thead>
						<tbody>
							<?php 
									
								while($actor = mysqli_fetch_assoc($resultado)){
								$contador ++;
							?>
								<tr>
									<th scope="row"><?php echo $contador ?></th>
									<td><?php echo $actor['nombre'] ?></td>
									<td><?php echo $actor['descripcion'] ?></td>
								</tr> 
							<?php	}	?>
						</tbody>
					</table>
				<?php	} 	else { ?>
					<h2>
						no se han encontrado resultados para la busqueda';
					</h2>
				<?php	}	?>
		</section>
	</section>
</main>
	<?php include 'include/footer.php' ?>
	<script src="js/main.js"></script>
</body>
</html