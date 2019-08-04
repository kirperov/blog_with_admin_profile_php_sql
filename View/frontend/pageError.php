<?php $title = 'Erreur 404'; ?>

<?php ob_start(); ?>
    <h1 class="text-center m-5"> Erreur #404 </h1>

              <h2 class="text-center">Désole, la page demandé n'existe pas :( </h2>

        <?php $content = ob_get_clean(); ?>
        <?php require('View/frontend/template.php'); ?>
