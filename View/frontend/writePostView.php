<!-- View -->
<!-- la vue de la page pour écrire un chapitre -->
<?php $title = 'Ecrire un chapitre'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Ecrivez un chapitre </h1>
  <div class="col-md-10 mx-auto m-5">
    <form method="post" action="index.php?action=writePost">
      <div class="form-group">
        <label for="inputTitle"></label>
        <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Entrez le tire">
      </div>
      <div class="form-group">
        <label for="inputContent"></label>
        <textarea id="inputContent" name="inputContent"> </textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>

</div>
<!-- Init  Tiny Drive -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
