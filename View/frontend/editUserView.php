<!-- View -->
<!-- la vue de la page pour écrire un chapitre -->
<?php $title = 'Editer un chapitre'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Editez votre profile </h1>
  <div class="col-md-10 mx-auto m-5">
    <form method="post" action="index.php?action=editUser&amp;userId=<?= $post['id']; ?>">
      <div class="form-group">
        <label for="inputTitle"> Votre Nom</label>
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Entrez votre nom">
      </div>
      <div class="form-group">
        <label for="inputContent">Votre login</label>
         <input class="form-control"  name="inputLogin"  placeholder="Entrez votre login">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>

</div>

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
