<?php $title = 'Les commentaires signalées'; ?>

<?php ob_start(); ?>
<div style="margin-top: 8%;" class="container col-md-12">
  <h1 class="text-center m-5"> Gestion des commentaires signalées </h1>
  <div class="mt-5 col-md-10 mx-auto" data-aos="zoom-in">
   <a href="index.php?action=adminSpace"> <span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated mb-3"></i></span></a>
   <?php
   if(!empty($allAlertedComents) && $allAlertedComents != null) {
    ?>
    <div class="table-responsive">
   <table id="tableComemntsAlert" class="table table-hover mx-auto">
       <thead>
          <tr>
            <th>Modifier/Supprimer</th>
            <th>Id de commentaire</th>
            <th>Id de post</th>
            <th>Auteur</th>
            <th>Commentaire</th>
            <th>Date de post</th>

          </tr>
       </thead>
  <?php
  $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
  $_SESSION['token'] = $token;
  foreach ($allAlertedComents as $alertedComment)
  {
  ?>
      <tbody>
          <tr>
            <td class="p-5">
                <form method="post" action="index.php?action=commentDelete&amp;commentId=<?= $alertedComment['id'] ?>&amp;postId=<?= $alertedComment['id_post'] ?>">
                     <button class="btn"><a href="index.php?action=commentEdit&amp;commentId=<?= $alertedComment['id'] ?>&amp;postId=<?= $alertedComment['id_post'] ?>">  <i style="color: #49beb7;" class="fas fa-user-edit fa-2x  "></i> </a> </button>
                     <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
                     <button class="btn" type="submit"> <span> <i style="color: #da4302;" class="fas fa-user-minus fa-2x  "></i> </span> </button>
                </form>
             </td>
             <td class="p-5"><?= $alertedComment['id']; ?></td>
             <td class="p-5"><?= $alertedComment['id_post']; ?></td>
             <td class="p-5"><?= strip_tags($alertedComment['author']); ?></td>
             <td class="p-5"><?= strip_tags($alertedComment['comment']); ?></td>
             <td class="p-5"><?= strip_tags($alertedComment['comment_date_fr']); ?></td>
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
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
