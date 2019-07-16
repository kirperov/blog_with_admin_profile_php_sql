<!-- View -->
<!-- la vue de la page d'administration  -->
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
          <a href="#"> <i class="fas fa-user-minus"></i> Supprimer</a> </br>
          <a href="index.php?action=postEdit&amp;postId=<?= $editAllPosts['id'] ?>">  <i class="fas fa-user-edit"></i> Modifier</a>
         </td>
         <td><?php echo $editAllPosts['id']; ?></td>
         <td><?php echo $editAllPosts['title']; ?></td>
         <td><?php echo $editAllPosts['content']; ?></td>
         <td><?php echo $editAllPosts['creation_date_fr']; ?></td>
         <td><?php echo $editAllPosts['status']; ?></td>
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
