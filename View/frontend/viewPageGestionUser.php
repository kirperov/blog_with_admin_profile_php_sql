<?php $title = 'Gestion des User'; ?>
<?php ob_start(); ?>
<h1 class="text-center m-5"> Gerer les utilisateurs </h1>

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
        <a href="index.php?action=editPageUser&amp;userId=<?= $dbAllUsersList['id'] ?>">  <i class="fas fa-user-edit"></i> Modifier</a>
       </td>
       <td><?= $dbAllUsersList['id']; ?></td>
       <td><?= $dbAllUsersList['login']; ?></td>
       <td><?= strip_tags($dbAllUsersList['name']); ?></td>
       <td><?= strip_tags($dbAllUsersList['first_name']); ?></td>
       <td><?= strip_tags($dbAllUsersList['email']); ?></td>
       <td><?= strip_tags($dbAllUsersList['inscription_date_fr']); ?></td>
       <td><?= strip_tags($dbAllUsersList['role']); ?></td>
     </tr>
    </tbody>
</table>

  <?php
  }
  $allUsersList->closeCursor();
  ?>

  <?php $content = ob_get_clean(); ?>
 <?php require('View/frontend/template.php'); ?>
