<main class="container">
	<section class="row">
		<article class="d-flex w-100 justify-content-between">
			<h1>PREMIOS</h1>
			<?php
				$query_premios = "SELECT DISTINCT premio FROM premios";
				$resultado = mysqli_query($conexion,$query_premios);
				if (mysqli_num_rows($resultado)>0){
			?>
			<form action="index.php" method="get" class="form-inline">
				<input type="hidden" name="view" value="awards">
				<div class="form-group">
					<select class="form-control" name="filter" id="filter">
					<?php while($award = mysqli_fetch_array($resultado)){ ?>
						<option value="<?php echo $award['premio']?>"><?php echo $award['premio']; ?></option>
					<?php	};	?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Filtrar</button>
			</form>
			<?php	};	?>
		</article>
	</section>
	<section class="row">
			<?php
				$query_premios = (isset($_GET['filter'])) ? "SELECT * FROM premios WHERE premios.premio LIKE '%".$_GET['filter']."%'" : "SELECT * FROM premios" ;
				$resultado = mysqli_query($conexion,$query_premios);
				if (mysqli_num_rows($resultado)>0){
			?>

			<?php while($award = mysqli_fetch_array($resultado)){ ?>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"><?php echo $award['premio']; ?></h4>
							<p class="card-text"><?php echo $award['motivo']; ?></p>
							<a href="index.php?view=award&award=<?php echo $award['id']; ?>" class="card-link">Ver más</a>
						</div>
					</div>
				</div>
			<?php	} }	else { ?>
				<h2>
					No existen premios
				</h2>
			<?php	}	?>
	</section>
</main>