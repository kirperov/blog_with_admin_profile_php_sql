<?php $title = 'Editer les chapitres'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">

 <div class="container mt-5">
   <h3 class="text-center m-5"> Gestion des chapitres </h3>
  <?php
  while ($editAllPosts = $allPosts->fetch())
  {
  ?>
  <table class="table table-hover col-md-10 mx-auto">
      <thead>
         <tr>
           <th>Modifier</th>
           <th>id</th>
           <th>Titre</th>
           <th>Post</th>
           <th>Date de création</th>
           <th>Etat</th>
         </tr>
      </thead>
      <tbody>
       <tr>
         <td>
          <a href="index.php?action=postDelete&amp;postId=<?= $editAllPosts['id'] ?>"> <i class="fas fa-user-minus"></i> Supprimer</a> </br>
          <a href="index.php?action=postEdit&amp;postId=<?= $editAllPosts['id'] ?>">  <i class="fas fa-user-edit"></i> Modifier</a>
         </td>
         <td><?= $editAllPosts['id']; ?></td>
         <td><?= $editAllPosts['title']; ?></td>
         <td><?= $editAllPosts['content']; ?></td>
         <td><?= $editAllPosts['creation_date_fr']; ?></td>
         <td><?= $editAllPosts['status']; ?></td>
       </tr>
      </tbody>
  </table>

    <?php
    }
    $allPosts->closeCursor();
    ?>
  </div>
</div>

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
