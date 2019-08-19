<?php $title = 'Gestion des User'; ?>
<?php ob_start(); ?>
<div style="margin-top: 8%;" class="container col-md-12 mb-5">
<h1 class="text-center m-5"> Gerer les utilisateurs </h1>
<div class="mt-5 col-md-12 mx-auto" data-aos="zoom-in">
  <a class="mb-5" href="index.php?action=adminSpace"> <span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated mb-4"></i></span></a>
<?php if(isset($allUsersList) && $allUsersList != null) {
?>
<table id="manageUsers" class="table table-hover table mx-auto mb-5">
    <thead>
       <tr>
         <th>Modifier/Supprimer</th>
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
       <td class="p-5">
         <a href="index.php?action=editPageUser&amp;userId=<?= $user['id'] ?>"> <i style="color: #49beb7;" class="fas fa-user-edit fa-2x  ml-5 "></i></a>
         <a href="index.php?action=deleteUser&amp;userId=<?= $user['id'] ?>"> <i style="color: #da4302;" class="fas fa-user-minus fa-2x  ml-5"></i></a>
       </td>
       <td class="p-5"><?= $user['id']; ?></td>
       <td class="p-5"><?= $user['login']; ?></td>
       <td class="p-5"><?= strip_tags($user['name']); ?></td>
       <td class="p-5"><?= strip_tags($user['first_name']); ?></td>
       <td class="p-5"><?= strip_tags($user['email']); ?></td>
       <td class="p-5"><?= strip_tags($user['inscription_date_fr']); ?></td>
       <td class="p-5"><?= strip_tags($user['role']); ?></td>
     </tr>
    </tbody>
  <?php
  }
  $allUsersList->closeCursor();
  ?>
</table>
<?php  } else {
  echo "Pas d'utilisateurs";
} ?>
</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
