<?php include "header.php"	 ?>

<div class="container">
	<div class="row">

		<div class="col">
			<?php 
		//el $_GET['id'] de aca es el que recibe de premios id o caca o perro


		$id_premio = $_GET['id'];

		$resultado_del_premio = mysqli_query($conexion,"SELECT nombre, descripcion FROM premios WHERE idpremios=$id_premio");

		if(mysqli_num_rows($resultado_del_premio) > 0){
			$premio = mysqli_fetch_assoc($resultado_del_premio);
			
			echo '<h1>'.$premio['nombre'].' '. $premio['descripcion']. '<br></h1>'; 

			$consulta_actores = "SELECT actores.id, actores.nombre, actores.apellido, actores_premios.anio FROM actores_premios
			INNER JOIN actores ON actores_premios.actores_id = actores.id
			WHERE actores_premios.premios_idpremios = $id_premio
			ORDER BY anio ASC";

			$resultado_actores = mysqli_query($conexion,$consulta_actores);

			if(mysqli_num_rows($resultado_actores) > 0){
				$contador = 0;
				?>
				<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Anio</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Apellido</th>
					      <th scope="col">Ver ficha</th>
					    </tr>
					  </thead>
					  <tbody>
				<?php
			 while ($actor = mysqli_fetch_assoc($resultado_actores)){
					$contador++
				?>
					<tr>
				      <th scope="row"><?php echo $contador ?></th>
				      <td><?php echo $actor['anio'] ?></td>
				      <td><?php echo $actor['nombre'] ?></td>
				      <td><?php echo $actor['apellido'] ?></td>
				      <td><a href="actor.php?id=<?php echo $actor['id'] ?>">Ver Actor</a></td>
				    </tr>
				<?php
				}
				?>
					</tbody>
				</table>
				<?php
			}
		}

?>

		</div>
	</div>
</div>


<?php include "footer.php" ?>