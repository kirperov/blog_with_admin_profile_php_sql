<?php $title = "Connexion" ?>
 <!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php
      ob_start();

?>

      <h1 class="text-center"><?php echo $title ?></h1>
      <div class="col-md-4 mx-auto">
        <form  action="index.php?action=connect" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Entrer login">
           </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
            <?php
            while ($dbAllUsersList = $allUsersList->fetch())
            {
              if(isset($_POST['password']) && isset($_POST['login'])) {
                $isPasswordCorrect = password_verify($_POST['password'], $dbAllUsersList['password']);
              if($isPasswordCorrect) {
                  $_SESSION['goodLogin'] = $_POST['login'];
                  $_SESSION['goodPassword'] = $_POST['password'];
          } else {
                echo '<div class="alert alert-danger" role="alert">
                     Mauvais login ou mot de passe!
                     </div>';

            }
        }
        }
                  $allUsersList->closeCursor();
              ?>
          <button type="submit" class="btn btn-primary">Submit</button>

        </form>
         <br>
</div>



<?php $content = ob_get_clean(); ?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php require('view/frontend/template.php'); ?>
