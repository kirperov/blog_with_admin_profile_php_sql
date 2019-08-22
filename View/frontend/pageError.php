<?php $title = 'Erreur 404'; ?>
<?php ob_start(); ?>
<div class="col-md-12 align-items-center mx-auto">
	<h1 class="text-center m-5"> Erreur #404 </h1>
	<h2 class="text-center">Désolée, la page demandée n'existe pas :( </h2>
	<section class="page_404">
		<div class="container mx-auto">
			<div class="row">
				<div class="col-sm-12 mx-auto">
					<div class="col-sm-10 col-sm-offset-1 mx-auto  text-center">
						<div class="four_zero_four_bg"></div>
						<div class="contant_box_404"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
