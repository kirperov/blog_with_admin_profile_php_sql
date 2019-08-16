<?php $title = 'Editer un chapitre';?>
<?php ob_start();?>
<div class="container col-md-12">
	<h1 class="text-center m-5"> Editez un chapitre </h1>
	<div class="col-md-10 mx-auto m-5">
		<form method="post" action="index.php?action=editPost&amp;postId=<?= $post['id']; ?>" data-aos="zoom-in">
			<a href="index.php?action=editPagePosts">
				<span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated"></i></span>
			</a>
			<div class="form-group">
				<label for="inputTitle"></label>
				<input type="text" class="form-control" id="inputTitleEdit" name="inputTitleEdit" placeholder="Entrez le tire" value="<?= $post['title']; ?>">
			</div>
			<div class="form-group">
				<label for="inputContent"></label>
				<textarea class="editPost"  name="inputContentEdit" cols="50" rows="15"><?= $post['content']; ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Modifier</button>
		</form>
	</div>
</div>
<!-- Init  Tiny Drive -->
<?php $content = ob_get_clean();?>
<?php require('View/frontend/template.php');?>
<script type="text/javascript">
	  tinymce.init({
		mode : "textareas",plugins : "fullpage",selector: ".editPost",
	});
</script>
