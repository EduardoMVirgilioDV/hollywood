<?php if ($_POST && isset($_POST)) { ?>

    <?php
        $errors = array();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $email = $_POST['email'];
        $admin = str_contains($email, '@davinci') ? 1 : 0;
        $query_username = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$username'");
        $quantity = mysqli_fetch_array($query_username);

        /* echo "<pre>";
        print_r($_POST);
        echo "</pre>"; */

        if(empty($username) ){
            $errors[] = 'El nombre de usuario no puede estar vacío.';
        }elseif ($quantity > 0) {
            $errors[] = 'El nombre de usuario ya esta en uso';
        }
        
        if(empty($email)) {
            $errors[] = 'El correo no puede estar vacio';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'El correo no valido';
        }

        if(empty($password)) {
            $errors[] = 'La contraseña no puede estar vacia';
        }elseif (empty($password_confirm)) {
            $errors[] = 'Necesitas confimar la contraseña';
        }
        elseif($password != $password_confirm) {
            $errors[] = 'Las contraseñas no coinciden';
        }
        if(!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
        else {

            $query_user = "INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `administrador`) VALUES (NULL, '$username','$email','$password',$admin)";
            $query_user_result = mysqli_query($conexion, $query_user);
            if($query_user_result){
                echo '<div class="alert alert-success">';
                echo '<strong>Success!</strong> You have successfully registered.';
                echo '</div>';
            }
        }
    
    ?>

<?php } ?>
<main class="container">
		<!--Es necesario el container,  el row, y col sì o sì, abuelo, padre, nieto -->
		<section class="row">

<form action="?view=register" method="post" class="col-12">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>  
</form>
</section>
</main>