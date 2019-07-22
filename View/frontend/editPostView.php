<!-- View -->
<!-- la vue de la page pour écrire un chapitre -->
<?php $title = 'Editer un chapitre'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Editez un chapitre </h1>
  <div class="col-md-10 mx-auto m-5">
    <form method="post" action="index.php?action=editPost&amp;postId=<?= $post['id'] ?>">
      <div class="form-group">
        <label for="inputTitle"></label>
        <input type="text" class="form-control" id="inputTitleEdit" name="inputTitleEdit" placeholder="Entrez le tire" value="<?php echo $post['title'] ?>">
      </div>
      <div class="form-group">
        <label for="inputContent"></label>
         <textarea class="editPost"  name="inputContentEdit" cols="50" rows="15"><?php echo $post['content']?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>

</div>
<!-- Init  Tiny Drive -->
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script> -->

 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
<script type="text/javascript">
  tinymce.init({
    mode : "textareas",
    plugins : "fullpage",
    selector: ".editPost",
   });
</script>
