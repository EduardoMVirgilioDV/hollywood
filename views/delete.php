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
    $entity = $_POST['entity'];
    $element = $_POST['element'];
    if($entity == 'nomination'){
        $actor = $_POST['actor'];
        $query_entity= "DELETE FROM nominaciones WHERE id = '$element'";
        $result = mysqli_query($conexion, $query_entity);
        if($result){
            header("Location: index.php?view=actor&&actor=$actor");
            exit();
        }
    }
    if($entity == 'award'){
        $query_entity= "DELETE FROM premios WHERE id = '$element'";
        $query_secondary= "DELETE FROM nominaciones WHERE premio_id = '$element'";
        $result_secondary = mysqli_query($conexion, $query_secondary);
        if($result_secondary){
            $result_entity = mysqli_query($conexion, $query_entity);
            if($result_entity){
                header("Location: index.php?view=awards");
                exit();
            }
        }
    }
    if($entity == 'actor'){
        $query_entity= "DELETE FROM actores WHERE id = '$element'";
        $query_secondary= "DELETE FROM nominaciones WHERE actor_id = '$element'";
        $result_secondary = mysqli_query($conexion, $query_secondary);
        if($result_secondary){
            $result_entity = mysqli_query($conexion, $query_entity);
            if($result_entity){
                header("Location: index.php?view=actors");
                exit();
            }
        }
    }
}
else{
    $newURL = 'index.php?view=home';
	header('Location: '.$newURL);
	exit();
}


?>