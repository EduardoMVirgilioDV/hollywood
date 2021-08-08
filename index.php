<?php include 'helpers/conexion.php' ?>
<?php include 'helpers/session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<?php include 'include/head.php' ?>

</head>
<body>
	<?php include 'include/header.php' ?>
	<?php 
		if($_GET && $_GET["view"]){
			$file = "./views/".$_GET["view"].".php";
			$file_check = file_exists($file);
			if($file_check == true){
				include($file);
			}else{
				include("./views/error.php");
			}
		}else{
			$newURL = 'index.php?view=home';
			header('Location: '.$newURL);
		}
    ?> 
	

	<?php include 'include/footer.php' ?>
	<script src="js/main.js"></script>
</body>
</html>


