<nav  class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="index.php">Jean Forteroche</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php?action=listAllPosts">Tous les chapitres</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <ul style="cursor: pointer;" class="navbar-nav" data-aos="fade-left">

    <li class="nav-item dropleft">
      <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-user"></i> <span> <?php if(isset($_SESSION['goodLogin'])) {
          echo $_SESSION['goodLogin'];
        } ?> </span>
      </a>
        <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="index.php?action=connexion">Se connecter</a>
        <?php
        if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword']))
        {
        ?>
        <a class="dropdown-item" href="index.php?action=logout">Se déconnecter</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="index.php?action=adminSpace">Espase administrateur</a>

        <?php
        }
        ?>
      </div>
    </li>
  </ul>
  </div>
</nav>
