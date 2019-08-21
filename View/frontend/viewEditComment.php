<?php $title = "Editer le commentaire" ?>
<!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php ob_start(); ?>
<div class="container col-md-12 mb-5" style="margin-top:8%;">
	<h1 class="text-center m-5"><?= $title ?></h1>
	<div style="background-color: #e3e3e3;" class="row col-md-10 mx-auto p-3 rounded">
		<!-- Formulaire pour editer un commentaire -->
		<form class="col-md-12" action="index.php?action=editComment&amp;commentId=<?= $commentAlerted['id'] ?>&amp;postId=<?= $commentAlerted['id_post'] ?>" method="post" data-aos="zoom-in">
			<a href="index.php?action=alertedcomments">
				<span class="return-icon" title="Rtourner à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated"></i></span>
			</a>
			<h2 class="mt-4">Commentaire</h2>
			<div class="form-group">
				<label for="author">Auteur</label>
				<input type="text" class="form-control col-4" id="author" name="editAuthor" placeholder="John Doe" value="<?= strip_tags($commentAlerted['author']); ?>">
			</div>
			<div class="form-group">
				<label for="comment">Commentaire</label>
				<textarea class="form-control col-10" id="comment" name="editCommentUpdate"><?= strip_tags($commentAlerted['comment']); ?></textarea>
			</div>
			<div>
				<input class="btn btn-info" type="submit" value="Modifier" />
			</div>
		</form>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php require('view/frontend/template.php'); ?>
