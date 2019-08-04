<!-- View -->
<!-- la vue de la page d'administration  -->
<?php $title = 'Espace Administrateur'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Espace Administrateur </h1>

<div class="container mt-5 col-md-12">
    <div class="row align-items-center">
      <div class="col-md-2 col-sm-12  text-center mx-auto">
        <img style="animation-duration: 3s;" class="img-menu-admin icons_admin_page animated infinite pulse" src="images/icons/edit.png">
        <h5 class="text-center"> <a class="text-decoration-none" href="index.php?action=pageWriteChapiter"> Ecrire un chapitre </a> </h5>
      </div>
      <div class="col-md-2 col-sm-12 text-center mx-auto">
        <img style="animation-duration: 3s;" class=" img-menu-admin icons_admin_page animated infinite pulse" src="images/icons/blog.png">
        <h5 class="text-center"> <a class="text-decoration-none" href="index.php?action=editPagePosts"> Gestion des chapitres </a> </h5>
      </div>
    <div class="col-md-2 col-sm-12 text-center mx-auto">
      <img style="animation-duration: 3s;" class="img-menu-admin icons_admin_page animated infinite pulse" src="images/icons/alerts.png">
      <h5 class="text-center"> <a class="text-decoration-none" href="index.php?action=alertedcomments"> Commentaires signalées </a> </h5>
    </div>
    <div class="col-md-2 col-sm-12 text-center mx-auto">
      <img style="animation-duration: 3s;" class="img-menu-admin icons_admin_page animated infinite pulse" src="images/icons/users.png">
      <h5 class="text-center"> <a class="text-decoration-none" href="index.php?action=pageEditUser"> Gestion des utilisateurs </a> </h5>
    </div>
     </div>
 </div>
</div>

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
