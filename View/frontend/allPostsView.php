<?php $title = 'Tous les Chapitres'; ?>

<?php ob_start(); ?>
    <h1 class="text-center m-5"> Tous les Chapitres </h1>
        <?php
        while ($dbAllPosts = $allPosts->fetch())
        {
        ?>
            <div class="card-body col-md-12">
                  <div class="card m-5">
                    <div class="card-header">
                      Post <?= $dbAllPosts['id']; ?>
                    </div>
                    <h3 class="card-title m-3">
                    <?= $dbAllPosts['title']; ?>
                    <em>le <?= $dbAllPosts['creation_date_fr'] ?></em>
                </h3>
                <p class="card-text m-3">
                    <?= $dbAllPosts['content']; ?>
                    <br />
                </p>
                <em><a class="btn btn-primary m-3" href="index.php?action=post&amp;postId=<?= $dbAllPosts['id'] ?>">Commentaires</a></em>
            </div>
          </div>
        <?php
        }
        $allPosts->closeCursor();
        ?>
        <?php $content = ob_get_clean(); ?>
        <?php require('View/frontend/template.php'); ?>
