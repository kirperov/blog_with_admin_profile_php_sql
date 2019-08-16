<?php
$title = strip_tags($post['title']);
?>
<!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php
ob_start();
?>
<div class="mb-5" style="background-color: #407088; height: 200px;">
    <h1 class="text-center m-5 text-white"><?= $title; ?></h1>
</div>
<div class="col-md-12 mx-auto" data-aos="fade-up">
    <a href="index.php?action=pagination&amp;page=1">
        <span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated"></i></span>
    </a>
    <div class="news card m-12">
        <div class="card-body">
            <span class="font-weight-lighter font-italic">
                Publié le
                <?= $post['creation_date_fr']; ?>
           </span>
            <p class="card-text col-md-12 m-5">
                <?= $post['content']; ?>
               <br/>
            </p>
        </div>
    </div>
    <h2 class="mt-5">Commentaires</h2>
    <hr>
    <section class="p-3 rounded" style="background-color: #e3e3e3;">
<?php // Boucle pour les commentaires
while ($comment = $comments->fetch()) {
?>
       <!-- Affiche les commentaires -->
        <div class="containerComment col-md-6 m-2">
            <form class="clearfix" method="post" action="index.php?action=alertcomment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">
                <span class="font-weight-bold"><?= strip_tags($comment['author']); ?></span>
                <span class="font-weight-lighter font-italic">
                     le
                    <?= $comment['comment_date_fr']; ?>
               </span>
                <button type="submit" class="btn float-right" name="alertTrue"  value="true">
                    <span class="alert-comment" title="Signaler le commentaire">
                        <i class="far fa-bell animated infinite tada"></i>
                        <span></button>
                    </form>
                    <p class="p-3"> <?php echo strip_tags($comment['comment']); ?> </p>
                    <hr>
                </div>
<?php
}
// Fin de la boucle des commentaires
?>
               <!-- Formulaire pour ajouter un commentaire -->
                <form class="col-md-6" action="index.php?action=addComment&amp;postId=<?= $post['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="author">Nom</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Votre pseudo" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <textarea class="form-control" id="comment" name="comment"placeholder="Laisser un commentaire" required></textarea>
                    </div>
                    <div>
                        <input class="btn btn-info" type="submit" value="Envoyer le commentaire"/>
                    </div>
                </form>
            </section>
            <br>
        </div>
        <?php
$content = ob_get_clean();
?>
       <!-- Je fini et je mets le code HTML dans une variable $content -->
        <?php
require('view/frontend/template.php');
?>
