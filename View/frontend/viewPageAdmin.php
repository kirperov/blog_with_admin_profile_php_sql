<?php $title = 'Espace Administrateur'; ?>
<?php ob_start(); ?>
<div style="background-color: #293462;">
	<h1 class="text-center m-5 text-white">  Espace Administrateur </h1>
</div>
<h2 class="text-center mx-auto mt-5">  Gérez vos chapitres, commentaires et les utilisateurs </h2>
<div class="container col-md-10 row mx-auto mb-5">
	<div style="margin-top: 10%;" class="container col-md-12">
		<div class="row ">
			<div class="col-md-2 col-sm-12 text-center mx-auto animated" data-aos="zoom-in">
				<img id="img-menu-admin-0" style="animation-duration: 3s;" class="img-menu-admin icons_admin_page mt-5 animated infinite pulse"  onclick="window.location.href='index.php?action=pageWriteChapiter'" src="images/icons/edit.png">
				<h5 class="text-center">
					<a class="text-decoration-none text-reset" href="index.php?action=pageWriteChapiter"> Ecrire un chapitre </a>
				</h5>
			</div>
			<div class="col-md-2 col-sm-12 text-center mx-auto" data-aos="zoom-in">
				<img id="img-menu-admin-1" style="animation-duration: 3s;" class=" img-menu-admin icons_admin_page mt-5 animated infinite pulse" onclick="window.location.href='index.php?action=editPagePosts'" src="images/icons/blog.png">
				<h5 class="text-center">
					<a class="text-decoration-none text-reset" href="index.php?action=editPagePosts"> Gestion des chapitres </a>
				</h5>
			</div>
			<div class="col-md-2 col-sm-12 text-center mx-auto" data-aos="zoom-in">
				<img id="img-menu-admin-2" style="animation-duration: 3s;" class="img-menu-admin icons_admin_page mt-5 animated infinite pulse" onclick="window.location.href='index.php?action=alertedcomments'" src="images/icons/alerts.png">
				<h5 class="text-center">
					<a class="text-decoration-none text-reset" href="index.php?action=alertedcomments"> Commentaires signalées </a>
				</h5>
			</div>
			<div class="col-md-2 col-sm-12 text-center mx-auto" data-aos="zoom-in">
				<img id="img-menu-admin-3" style="animation-duration: 3s;" class="img-menu-admin icons_admin_page mt-5 animated infinite pulse" onclick="window.location.href='index.php?action=pageEditUser'" src="images/icons/users.png">
				<h5 class="text-center">
					<a class="text-decoration-none text-reset" href="index.php?action=pageEditUser"> Gestion des utilisateurs </a>
				</h5>
			</div>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
<script src="./js/pageAdminMenu.js"></script>
