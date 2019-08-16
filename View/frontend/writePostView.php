<?php $title = 'Ecrire un chapitre'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
	<h1 class="text-center m-5"> Ecrire un chapitre </h1>
	<div class="col-md-10 mx-auto m-5">
		<form method="post" action="index.php?action=writePost" data-aos="zoom-in">
			<a href="index.php?action=adminSpace">
				<span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated"></i></span>
			</a>
			<div class="form-group">
				<label for="inputTitle"></label>
				<input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Entrez le tire">
			</div>
			<div class="form-group">
				<label for="inputContent"></label>
				<textarea class="tinymce"  name="inputContent" cols="50" rows="15">Ercivez votre chapitre ...</textarea>
			</div>
			<button type="submit" class="btn btn-info">Valider</button>
		</form>
	</div>
</div>
<script src="./js/writeChapiter.js"></script>
<?php $content = ob_get_clean(); ?>
<!-- Init  Tiny Drive -->
<?php require('View/frontend/template.php'); ?>
<script type="text/javascript">
	  tinymce.init({
		mode : "textareas",plugins : "fullpage",selector: "textarea",
	});
</script>
