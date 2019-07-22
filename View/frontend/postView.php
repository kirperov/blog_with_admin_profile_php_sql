<!-- View -->
<!-- la vue d'un billet et ses commentaires. -->

<?php $title = htmlspecialchars($post['title']); ?>

<!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php ob_start(); ?>

      <h1 class="text-center"><?php echo $title ?></h1>
      <div class="col-md-12 mx-auto">
        <p><a href="index.php?action=listAllPosts">Retour à la liste des billets</a></p>
<div class="news card m-12">
    <div class="card-body">
    <h3 class="card-title">
        <?php echo htmlspecialchars($post['title']); ?>
        <em>le <?php echo $post['creation_date_fr']; ?></em>
    </h3>

    <p class="card-text col-md-12">
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($post['content']));
    ?>
    <br />
    </p>
  </div>
</div>


<!-- Formulaire pour ajouter un commentaire -->
<form class="col-md-6" action="index.php?action=addComment&amp;postId=<?= $post['id'] ?>" method="post">
  <h2 class="mt-4">Commentaires</h2>
  <div class="form-group">
      <label for="author">Auteur</label>
      <input type="text" class="form-control" id="author" name="author" placeholder="John Doe">
    </div>
    <div class="form-group">
      <label for="comment">Commentaire</label>
      <textarea class="form-control" id="comment" name="comment"></textarea>
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
  <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['comment_date_fr']; ?>
     <a href="#" data-toggle="modal" data-target="#updateFormComment_<?php echo $comment['id'];?>"> Modifier le commentraire </a> </p>
     <form method="post" action="index.php?action=alertcomment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">
     <button type="submit" class="btn btn-danger" name="alertTrue"  value="true"> Signaler </button>
   </form>
   <!-- <a href="index.php?action=alertcomment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>&amp;alertTrue=1"> signaler le commentraire </a> </p> -->

  <p><?php echo nl2br(htmlspecialchars($comment['comment']));?></p>
</div>

<!-- Modifier le commentaire -->
<div class="modal fade" id="updateFormComment_<?php echo $comment['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateCommentTitle">Modifier le commentaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="col-md-12" action="index.php?action=changeComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>" method="post">
            <div class="form-group">
              <label for="commentUpdate">Nouveau commentaire</label>
              <textarea class="form-control" id="commentUpdate" name="commentUpdate"></textarea>
            </div>
            <div  class="modal-footer">
                <input class="btn btn-success" type="submit" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
}
// Fin de la boucle des commentaires
?>

<?php $content = ob_get_clean(); ?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php require('view/frontend/template.php'); ?>
