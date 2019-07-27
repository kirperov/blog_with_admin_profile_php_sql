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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

         <br>
</div>
<?php
while ($dbAllUsersList = $allUsersList->fetch())
{
  if(!empty(isset($_POST['login'])) && !empty(isset($_POST['password']))) {
  if($_POST['login'] == $dbAllUsersList['login'] && $_POST['password'] == $dbAllUsersList['password']) {
echo 'ok';
?>



<table class="table table-hover col-md-10 mx-auto">
    <thead>
       <tr>
         <th>Modifier</th>
         <th>id</th>
         <th>Login</th>
         <th>Nom</th>
         <th>Prenom</th>
         <th>Email</th>
         <th>Date d'inscription</th>
         <th>Rôle</th>
       </tr>
    </thead>
    <tbody>
     <tr>
       <td>
        <a href="#"> <i class="fas fa-user-minus"></i> Supprimer</a> </br>
        <a href="#">  <i class="fas fa-user-edit"></i> Modifier</a>
       </td>
       <td><?php echo $dbAllUsersList['id']; ?></td>
       <td><?php echo $dbAllUsersList['login']; ?></td>
       <td><?php echo $dbAllUsersList['name']; ?></td>
       <td><?php echo $dbAllUsersList['first_name']; ?></td>
       <td><?php echo $dbAllUsersList['email']; ?></td>
       <td><?php echo $dbAllUsersList['inscription_date_fr']; ?></td>
       <td><?php echo $dbAllUsersList['role']; ?></td>
     </tr>

    </tbody>
</table>



  <?php
} else {
  echo "not ok";



  }
}
}
      $allUsersList->closeCursor();
  ?>


<?php $content = ob_get_clean(); ?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php require('view/frontend/template.php'); ?>
