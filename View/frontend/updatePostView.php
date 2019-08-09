<?php $title = 'Editer les chapitres'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Gestion des chapitres </h1>
  <div class="container mt-5" data-aos="zoom-in">
   <a class="mb-5" href="index.php?action=adminSpace"> <span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated mb-4"></i></span></a>
   <?php
   if(isset($allPosts) && $allPosts != null) {
   ?>
   <table class="display table table-bordered table-hover table-sm col-md-12 mx-auto">
       <thead>
          <tr>
            <th>Modifier</th>
            <th>id</th>
            <th>Titre</th>
            <th>Date de création</th>
           </tr>
       </thead>
       <tbody>
   <?php
   foreach ($allPosts as $post)
   {
   ?>
       <tr>
         <td>
          <a href="index.php?action=postEdit&amp;postId=<?= $post['id'] ?>">  <i style="color: #49beb7;"  class="fas fa-user-edit"></i> Modifier</a><br>
          <a href="index.php?action=postDelete&amp;postId=<?= $post['id'] ?>"> <i style="color: #da4302;" class="fas fa-user-minus"></i> Supprimer</a> </br>

         </td>
         <td><?= $post['id']; ?></td>
         <td><?= $post['title']; ?></td>
         <td><?= $post['creation_date_fr']; ?></td>
        </tr>
      </tbody>
    <?php
    }
    $allPosts->closeCursor();
    ?>

  </table>
  <?php
  } else {
    echo "Pas de chapitres à éditer";
  }
  ?>
  </div>
</div>

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
