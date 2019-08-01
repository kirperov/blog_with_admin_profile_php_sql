<?php $title = 'Editer un chapitre'; ?>

<?php ob_start(); ?>
<div class="container col-md-12">
  <h1 class="text-center m-5"> Editez votre profile </h1>
  <div class="col-md-10 mx-auto m-5">
    <form method="post" action="index.php?action=editUser&amp;userId=<?= $_GET['userId']; ?>">
      <div class="form-group">
        <label for="inputTitle"> Votre Nom </label>
        <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="Entrez votre nom" required>
      </div>
      <div class="form-group">
        <label for="inputTitle"> Votre Prenom</label>
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Entrez votre Prenom" required>
      </div>
      <div class="form-group">
        <label for="inputContent">Votre login</label>
         <input class="form-control"  name="inputLogin"  placeholder="Entrez votre login" required>
      </div>
      <div class="form-group">
        <label for="inputContent">Votre email</label>
         <input class="form-control" type="email"  name="inputEmail"  placeholder="Entrez votre email" required>
      </div>
      <div class="form-group">
        <label for="inputContent">Votre nouveau mot de passe</label>
         <input class="form-control" type="password"  name="inputPassword"  placeholder="Entrez votre mot de passe" required>
      </div>
      <div>
          <input class="btn btn-success" type="submit" />
      </div>
    </div>
      </form>
   </div>
</div>
 <?php $content = ob_get_clean(); ?>
<?php require('View/frontend/template.php'); ?>
