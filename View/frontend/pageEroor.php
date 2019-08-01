<?php $title = 'Erreur 404'; ?>

<?php ob_start(); ?>
    <h1 class="text-center m-5"> Erreur #404 </h1>
        <?php
        while ($dbAllPosts = $allPosts->fetch())
        {
        ?>
            <div class="card-body col-md-12">
              <p>Désole, la page demandé n'existe pas :( </p>
          </div>
        <?php
        }
        $allPosts->closeCursor();
        ?>
        <?php $content = ob_get_clean(); ?>
        <?php require('View/frontend/template.php'); ?>
