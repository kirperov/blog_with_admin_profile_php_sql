<!-- View -->
<!-- la vue de la page d'accueil. Elle affiche les 5 dernirès billets.  -->
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1 class="text-center m-5"> Les 5 derniers chapitres </h1>
        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="card-body col-md-12">
                  <div class="card m-5">
                    <div class="card-header">
                      Post <?= htmlspecialchars($data['id']) ?>
                    </div>
                    <h3 class="card-title m-3">
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </h3>
                <p class="card-text m-3">
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                </p>
                <em><a  class="btn btn-primary m-3" href="index.php?action=post&amp;postId=<?= $data['id'] ?>">Commentaires</a></em>
            </div>
          </div>
        <?php
        }
        $posts->closeCursor();
        ?>
        <?php $content = ob_get_clean(); ?>
        <?php require('View/frontend/template.php'); ?>
