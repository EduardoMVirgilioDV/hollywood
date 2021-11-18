<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php?view=home">HOLLYWOOD</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=actors">Actores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=awards">Premios</a>
      </li>
      <?php if(!isset($_SESSION['user'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=login">Acceder</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=register">Registrarse</a>
      </li>
      <?php } else { ?>
        <?php if($_SESSION['user']['is_admin'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view=users">Usuarios</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?view=profile">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?view=logout">Salir</a>
        </li>
      <?php } ?>
    </ul>    
  </div>
</nav>
