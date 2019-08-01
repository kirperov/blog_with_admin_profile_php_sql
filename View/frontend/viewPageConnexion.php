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
            $passwordOk = false;
            $passworNotOk = false;

            while ($dbAllUsersList = $allUsersList->fetch())
            {
              if(isset($_POST['password']) && isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['login'])) {
                $isPasswordCorrect = password_verify($_POST['password'], $dbAllUsersList['password']);
                $passwordOk = true;
                $_SESSION['goodLogin'] = htmlspecialchars($_POST['login']);
                $_SESSION['goodPassword'] = htmlspecialchars($dbAllUsersList['password']);
              }

              if(!isset($isPasswordCorrect)) {
                  $passworNotOk = true;
          }
        }
        if(!$passworNotOk) {
          echo "t'est un bon!";
        } elseif(!$passwordOk) {
          echo "ah non mon gars désolé!";
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
