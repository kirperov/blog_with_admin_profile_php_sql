<?php $title = "Editer le commentaire" ?>
 <!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php ob_start(); ?>

      <h1 class="text-center"><?= $title ?></h1>
        <div class="col-md-12 mx-auto">
          <p><a href="index.php?action=alertedcomments">Retour vers gestion de commentaires</a></p>

          <!-- Formulaire pour editer un commentaire -->
          <form class="col-md-6" action="index.php?action=editComment&amp;commentId=<?= $commentAlerted['id'] ?>&amp;postId=<?= $commentAlerted['id_post'] ?>" method="post">
            <h2 class="mt-4">Commentaire</h2>
            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" class="form-control" id="author" name="editAuthor" placeholder="John Doe" value="<?= strip_tags($commentAlerted['author']); ?>">
              </div>
              <div class="form-group">
                <label for="comment">Commentaire</label>
                <textarea class="form-control" id="comment" name="editCommentUpdate"><?= strip_tags($commentAlerted['comment']); ?></textarea>
              </div>
              <div>
                  <input class="btn btn-success" type="submit" />
              </div>
          </form>
        </div>


<?php $content = ob_get_clean(); ?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php require('view/frontend/template.php'); ?>
