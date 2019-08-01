<?php $title = strip_tags($post['title']); ?>

<!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php ob_start(); ?>

<section class="showOnePost">
  <h1 class="text-center"><?= $title; ?></h1>
      <div class="col-md-12 mx-auto">
        <p><a href="index.php?action=listAllPosts">Retour à la liste des billets</a></p>
          <div class="news card m-12">
              <div class="card-body">
                <h3 class="card-title">
                    <em>Date de publication <?= $post['creation_date_fr']; ?></em>
                </h3>

                <p class="card-text col-md-12">
                <?= $post['content']; ?>
                <br/>
                </p>
              </div>
          </div>
</section>

<!-- Formulaire pour ajouter un commentaire -->
<form class="col-md-6" action="index.php?action=addComment&amp;postId=<?= $post['id'] ?>" method="post">
  <h2 class="mt-4">Commentaires</h2>
  <div class="form-group">
      <label for="author">Auteur</label>
      <input type="text" class="form-control" id="author" name="author" placeholder="John Doe" required>
    </div>
    <div class="form-group">
      <label for="comment">Commentaire</label>
      <textarea class="form-control" id="comment" name="comment" required></textarea>
    </div>
    <div>
        <input class="btn btn-success" type="submit" />
    </div>
</form>
</div>
<?php
// Boucle pour les commentaires
while ($comment = $comments->fetch())
{
?>
<!-- Affiche les commentaires -->
<div class="containerComment col-md-12 m-2">
  <strong><?= strip_tags($comment['author']); ?></strong> le <?= $comment['comment_date_fr']; ?>
     <form method="post" action="index.php?action=alertcomment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">
     <button type="submit" class="btn btn-danger" name="alertTrue"  value="true"> Signaler </button>
   </form>
  <p><?php echo strip_tags($comment['comment']);?></p>
</div>

<?php
}
// Fin de la boucle des commentaires
?>

<?php $content = ob_get_clean(); ?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php require('view/frontend/template.php'); ?>
