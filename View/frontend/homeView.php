<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
<div style="background-color: #293462; height: 200px;">
	<h1 class="text-center m-5 text-white"> "Billet simple pour l'Alaska" </h1>
</div>
<h2 class="text-center m-5"> Les 5 derniers chapitres </h2>
<?php while ($data = $posts->fetch())
{?>
<div class="card-body col-md-12 col-xs-12 col-sm-12" data-aos="fade-up">
	<div class="card m-5 border-0 bg-light">
		<div style="background-color: #042f4b;" class="card-header">
			<span class="font-weight-bold text-white"><?= $data['title'] . ", "; ?></span>
			<span class="font-weight-lighter font-italic text-white">
				publié le
				<?= $data['creation_date_fr']; ?>
			</span>
			<a style="text-decoration: none; color:#ff8a5c;" class="m-3 btn-read animated" href="index.php?action=post&amp;postId=<?= $data['id'] ?>"><i id="iconRead" style="animation-duration: 3s;" class="fab fa-readme fa-2x animated infinite rubberBand" title="Lire ce chapitre"></i></a>
		</div>
		<div class="m-5">
			<article  class="card-text content-post">
				<?= $data['extractContent'] . '<strong> [...] </strong>'; ?><br /></article>
			</div>
		</div>
	</div>
	<?php
}
$posts->closeCursor();?>
	<?php $content = ob_get_clean(); ?>
	<?php require('View/frontend/template.php'); ?>
