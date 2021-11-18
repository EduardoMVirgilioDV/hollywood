<?php 

if(!isset($_SESSION['user'])){ 
	$newURL = 'index.php?view=home';
	header('Location: '.$newURL);
	exit();
}
if($_SESSION['user']['is_admin'] != 1){ 
	$newURL = 'index.php?view=home';
	header('Location: '.$newURL);
	exit();
}

if ($_POST && isset($_POST)) { 

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	$rol = $_POST['rol'];
    $element = $_POST['element'];

	$query_primary= "UPDATE `usuarios` SET `is_admin`='$rol' WHERE usuarios.id = '$element'";
	$resultado_premio = mysqli_query($conexion, $query_primary);

	if($resultado_premio){
		session_destroy();
		header("Location: index.php?view=users");
		exit();
	}

	exit();
}

$query_usuarios = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion,$query_usuarios);
?>

<?php if(mysqli_num_rows($resultado) > 0){ ?>

<div class="card">
<div class="card-header">
	<h5 class="card-title">Usuarios</h5>
</div>
<ul class="list-group list-group-flush">
	<?php while($usuario = mysqli_fetch_assoc($resultado)){ ?>
		<li class="list-group-item list-group-item-action flex-column align-items-start">
			<div class="d-flex w-100 justify-content-between">
				<h5 class="mb-1"><?php echo $usuario['username']?> <span class="badge badge-secondary"><?php echo $usuario['is_admin'] == 1 ? 'Administrador' : 'Usuario' ?></span></h5>
				<form action="index.php?view=users" method="post" class="form-inline">
					<input type="hidden" name="rol" id="rol" value="<?php echo $usuario['is_admin'] == 1 ? 0 : 1 ?>">
					<input type="hidden" name="element" id="element" value="<?php echo $usuario['id']?>">
					<button type="submit" class="btn btn-warning">Cambiar Roll</button>
				</form>
			</div>
		</li>
    <?php } ?>
	</ul>
</div>

<?php } else { ?>
<div class="card">
	<div class="card-body">
		<h5 class="card-title">Usuarios</h5>
		<p class="card-text"> No hay usuarios</p>
	</div>
</div>
<?php } ?>