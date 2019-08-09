<?php $title = "Connexion" ?>
 <!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php
      ob_start();

?>
  <div class="col-md-12 align-items-center">
      <div class="col-md-4 mx-auto mt-5">
        <h1 class="text-center"><?php echo $title ?></h1>
        <form  action="index.php?action=connect" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Entrer login" required>
           </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <?php

            $passwordOk = false;
            $passwordNotOk = false;
            while ($dbAllUsersList = $allUsersList->fetch())
            {
              if(isset($_POST['password']) && isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['login'])) {
                $isPasswordCorrect = password_verify($_POST['password'], $dbAllUsersList['password']);
                if($isPasswordCorrect && $_POST['login'] == $dbAllUsersList['login']) {
                    $passwordOk = true;
                    $_SESSION['goodLogin'] = htmlspecialchars($_POST['login']);
                    $_SESSION['goodPassword'] = htmlspecialchars($dbAllUsersList['password']);
                    header("Location: index.php?action=adminSpace");
                }
                if(!$isPasswordCorrect && $_POST['login'] != $dbAllUsersList['login']) {
                  $passwordNotOk = true;
                 }
              }
            }
            if(!$passwordNotOk) {
              ?>
                   <div class="alert alert-primary alert-dismissible fade show" role="alert"  data-aos="zoom-in"> <span> Veillez rentrer votre login et mot de passe </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
            <?php
            }
          elseif(!$passwordOk) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert"  data-aos="zoom-in"> <span>Mauvaus login ou mot de passe! </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
          <?php }
                  $allUsersList->closeCursor();
              ?>
          <button type="submit" class="btn btn-primary">Se connecter</button>

        </form>
         <br>
    </div>
</div>



<?php $content = ob_get_clean(); ?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php require('view/frontend/template.php'); ?>
