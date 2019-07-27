<!-- View -->
<!-- la vue de la page d'administration  -->
<?php $title = 'Les commentaires signalées'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">

 <div class="container mt-5">
   <h3 class="text-center m-5"> Gestion des commentaires signalées </h3>
  <?php
  while ($alertedComment = $allAlertedComents->fetch())
  {
  ?>
  <table class="table table-hover col-md-10 mx-auto">
      <thead>
         <tr>
           <th>Modifier</th>
           <th>Id de commentaire</th>
           <th>Id de post</th>
           <th>Auteur</th>
           <th>Commentaire</th>
           <th>Date de post</th>

         </tr>
      </thead>
      <tbody>
       <tr>
         <td>
          <a href="index.php?action=commentDelete&amp;commentId=<?= $alertedComment['id'] ?>&amp;postId=<?= $alertedComment['id_post'] ?>"> <i class="fas fa-user-minus"></i> Supprimer</a> </br>
          <a href="index.php?action=commentEdit&amp;commentId=<?= $alertedComment['id'] ?>&amp;postId=<?= $alertedComment['id_post'] ?>">  <i class="fas fa-user-edit"></i> Modifier</a>
         </td>
         <td><?php echo $alertedComment['id']; ?></td>
         <td><?php echo $alertedComment['id_post']; ?></td>
         <td><?php echo $alertedComment['author']; ?></td>
         <td><?php echo $alertedComment['comment']; ?></td>
         <td><?php echo $alertedComment['comment_date_fr']; ?></td>
         <!-- <td><?php //echo $alertedComment['alerted']; ?></td> -->
       </tr>

      </tbody>
  </table>

    <?php
    }
    $allAlertedComents->closeCursor();
    ?>
  </div>
</div>

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
