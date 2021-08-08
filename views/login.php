<?php if ($_POST && isset($_POST)) { ?>

<?php
    $errors = array();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query_username = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$username'");
    $user = mysqli_fetch_assoc($query_username);
    if(empty($username)){
        $errors[] = 'El nombre de usuario no puede estar vacío.';
    }
    if (empty($user)) {
        $errors[] = 'Usuario no encontrado';
    } else {
        if(empty($password)){
            $errors[] = 'La contraseña no puede estar vacía.';
        }elseif ($user['password'] != $password) {
            $errors[] = 'La contraseña es incorrecta';
        }
    }
    if (empty($errors)) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        
    } else {
        echo '<div class="alert alert-danger">';
        foreach($errors as $error) {
         echo $error . '<br>';
        }
        echo '</div>';
    }
?>

<?php } ?>

<main class="container">
    <section class="row">
        <form action="?view=login" method="post" class="col-12">
            <fieldset class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </fieldset>
            <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>  
        </form>
    </section>
</main>