<main class="container">
		<!--Es necesario el container,  el row, y col sì o sì, abuelo, padre, nieto -->
		<section class="row">
			<article class="col-12">
				<h2> BUSCADOR HOLLYWOOD ! </h2>
				<p>
					Web en construcción que nos ayuda a encontrar datos de artistas del cine, primeramente de Hollywood para prontamente ir extendiendola a industrias del cine de otras culturas, esta hecha con html, css, boostrap, php, Mysql, javascript, jquery.; para responder a las demandas de la materia de 
					<b>Programación Visual III </b>
				</p>
			</article>
		</section>
		
		<section class="row">		
			<article class="col-12 col-md-6">
				<img id="img-1" class="img-fluid" src="img/cine.jpg"  alt="imagen de sala de un cine">
				<!-- mi imagen es un atributo en este caso de p que lo invente yo -->
				<button type="button" class="btn btn-block btn-warning" data-image='img-1'>Ocultar Imagen</button>
			</article>
			<article class="col-12 col-md-6">
				<img id='img-2' class="img-fluid" src="img/premios_oscar.jpg" alt="imagen de los premios oscar">
				<button type="button" class="btn btn-block btn-warning" data-image='img-2' >Ocultar Imagen</button>
			</article>
		</section>

		<section class="row">
			<section class="col-12">
				<?php
					$query_actors = "SELECT * FROM actores";
					$resultado = mysqli_query($conexion,$query_actors);
					// si trajo mas de 0 filas 
				if (mysqli_num_rows($resultado)>0){
					$contador=0;
				?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Ver ficha</th>
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
									<td><?php echo $actor['apellido'] ?></td>
									<td><a href="actor.php?id=<?php echo $actor['id'] ?>">Ver ficha </a></td>
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
