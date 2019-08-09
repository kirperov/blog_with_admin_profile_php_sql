<?php $title = 'Les commentaires signalées'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Gestion des commentaires signalées </h1>
  <div class="container mt-5" data-aos="zoom-in">
   <a href="index.php?action=adminSpace"> <span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated mb-3"></i></span></a>
   <?php
   if(!empty($allAlertedComents) && $allAlertedComents != null) {
    ?>
   <table class="display table table-bordered table-hover table-sm col-md-12 mx-auto">
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
  <?php
  foreach ($allAlertedComents as $alertedComment)
  {
  ?>

      <tbody>
          <tr>
             <td>
               <a href="index.php?action=commentEdit&amp;commentId=<?= $alertedComment['id'] ?>&amp;postId=<?= $alertedComment['id_post'] ?>">  <i style="color: #49beb7;" class="fas fa-user-edit"></i> Modifier</a><br>
              <a href="index.php?action=commentDelete&amp;commentId=<?= $alertedComment['id'] ?>&amp;postId=<?= $alertedComment['id_post'] ?>"> <i style="color: #da4302;" class="fas fa-user-minus"></i> Supprimer</a>
             </td>
             <td><?= $alertedComment['id']; ?></td>
             <td><?= $alertedComment['id_post']; ?></td>
             <td><?= strip_tags($alertedComment['author']); ?></td>
             <td><?= strip_tags($alertedComment['comment']); ?></td>
             <td><?= strip_tags($alertedComment['comment_date_fr']); ?></td>
        </tr>
      </tbody>
    <?php
    }
    $allAlertedComents->closeCursor();
    ?>
    <?php
  } else {
      echo '<h4 class="text-center m-5"> Pas de commentaires signalés </h4>';
    }
    ?>
      </table>

  </div>
</div>

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
