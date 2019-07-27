<!-- View -->
<!-- la vue de la page d'administration  -->
<?php $title = 'Espace Administrateur'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Espace Administrateur </h1>
<?php echo $_SESSION['goodLogin'] . " and " . $_SESSION['goodPassword'];
 ?> 
<div class="container mt-5 col-md-12">
    <div class="row">
      <div class="col-md-4 col-sm-12  text-center">
        <img class="icons_admin_page" src="images/icons/edit.png">
        <h3 class="text-center"> <a href="index.php?action=pageWriteChapiter"> Ecrire un chapitre </a> </h2>
      </div>
      <div class="col-md-4 col-sm-12 text-center">
        <img class="icons_admin_page" src="images/icons/blog.png">
        <h3 class="text-center"> <a href="index.php?action=editPagePosts"> Gestion des chapitres </a> </h2>
      </div>
    <div class="col-md-4 col-sm-12 text-center">
      <img class="icons_admin_page" src="images/icons/alerts.png">
      <h3 class="text-center"> <a href="index.php?action=alertedcomments"> Commentaires signalées </a> </h2>
    </div>
     </div>
</div>

 <div class="container mt-5">
   <h3 class="text-center m-5"> Gestion des utilisateurs </h3>
  <?php
  while ($dbAllUsersList = $allUsersList->fetch())
  {
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
    }
        $allUsersList->closeCursor();
    ?>
  </div>
</div>

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
