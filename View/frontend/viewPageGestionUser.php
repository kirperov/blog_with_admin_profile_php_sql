<?php $title = 'Gestion des User'; ?>
<?php ob_start(); ?>
<div class="container col-md-12">
<h1 class="text-center m-5"> Gerer les utilisateurs </h1>
<div class="container mt-5" data-aos="zoom-in">
<a class="mb-5" href="index.php?action=adminSpace"> <span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated mb-4"></i></span></a>
<table class="display table table-bordered table-hover table-sm col-md-12 mx-auto">
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
<?php
foreach ($allUsersList as $user)
{
?>

     <tr>
       <td>
        <a href="index.php?action=editPageUser&amp;userId=<?= $user['id'] ?>">  <i style="color: #49beb7;" class="fas fa-user-edit"></i> Modifier</a><br>
        <a href="#"> <i style="color: #da4302;" class="fas fa-user-minus"></i> Supprimer</a> </br>
       </td>
       <td><?= $user['id']; ?></td>
       <td><?= $user['login']; ?></td>
       <td><?= strip_tags($user['name']); ?></td>
       <td><?= strip_tags($user['first_name']); ?></td>
       <td><?= strip_tags($user['email']); ?></td>
       <td><?= strip_tags($user['inscription_date_fr']); ?></td>
       <td><?= strip_tags($user['role']); ?></td>
     </tr>
    </tbody>
  <?php
  }
  $allUsersList->closeCursor();
  ?>
</table>
</div>
</div>
  <?php $content = ob_get_clean(); ?>
 <?php require('View/frontend/template.php'); ?>
