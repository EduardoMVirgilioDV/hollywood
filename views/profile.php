<?php 
    if(!isset($_SESSION['user'])){ 
        $newURL = 'index.php?view=home';
        header('Location: '.$newURL);
        exit();
    }

    if($_POST && isset($_POST)){
        $errors = array();
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username)){
            $errors[] = 'El nombre de usuario no puede estar vacío.';
        }

        if(empty($password)){
            $errors[] = 'La contraseña no puede estar vacía.';
        }elseif(strlen($password) < 7){
            $errors[] = 'La contraseña no puede tener menos de 7 caracteres.';
        }

        if(!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
        else {

            $query_user = "UPDATE usuarios SET usuarios.password ='$password' WHERE usuarios.username = '$username'";
            $query_user_result = mysqli_query($conexion, $query_user);
            if($query_user_result){
                session_destroy();
                header("Location: index.php");
            }
        }

        exit();
    }
?> 

<div class="jumbotron">
  <h1 class="display-4">Hola, <?php echo $_SESSION['user']['username'] ; ?>!</h1>
  <div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quieres cambiar tu contraseña!</h5>
                <p class="card-text">Al dar click en actualizar, tendras que volver a iniciar sesión </p>
                <form class="form-inline" method="post" action="index.php?view=profile">
                    <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['user']['username'] ; ?>">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Change Password">
                    </div>
                <button type="submit" class="btn btn-warning mb-2">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    <?php if(isset($_SESSION['user']) && $_SESSION['user']["is_admin"] == 1){ ?>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Eres Administrator!</h5>
                    <p class="card-text">Por lo que puedes acceder a estos enlaces</p>
                    <a href="index.php?view=create&&entity=actor" class="btn btn-primary">Crear un nuevo actor</a>
                    <a href="index.php?view=create&&entity=award" class="btn btn-primary">Crear un nuevo premio</a>
                </div>
            </div>
        </div>


    <?php } ?>
  </div>
</div>