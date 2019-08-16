<?php
$title = 'Editer les chapitres';
?>
<?php
ob_start();
?>
<div style="margin-top: 8%;" class="container col-md-12">
    <h1 class="text-center m-5"> Gestion des chapitres </h1>
    <div class="mt-5 col-md-10 mx-auto" data-aos="zoom-in">
        <a class="mb-5" href="index.php?action=adminSpace">
            <span class="return-icon" title="Rtourer à la page de tous les chapitres"><i id="btn-return" class="fas fa-undo animated mb-4"></i></span>
        </a>
        <?php
if (isset($allPosts) && $allPosts != null) {
?>
       <table id="tableEditPost" class="table table-hover table mx-auto">
            <thead>
                <tr>
                    <th>Modifier/Supprimer</th>
                    <th>id</th>
                    <th>Titre</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
<?php
    foreach ($allPosts as $post) {
?>
               <tr>
                    <td class="p-5">
                        <a href="index.php?action=postEdit&amp;postId=<?= $post['id'] ?>"><i style="color: #49beb7;"  class="fas fa-user-edit fa-2x"></i></a>
                        <a href="index.php?action=postDelete&amp;postId=<?= $post['id'] ?>"><i style="color: #da4302;" class="fas fa-user-minus fa-2x ml-5"></i></a>
                    </td>
                    <td class="p-5"><?= $post['id']; ?></td>
                    <td class="p-5"><?= $post['title']; ?></td>
                    <td class="p-5"><?= $post['creation_date_fr']; ?></td>
                </tr>
            </tbody>
<?php
    }
    $allPosts->closeCursor();
?>
       </table>
<?php
} else {
    echo "Pas de chapitres à éditer";
}
?>
   </div>
</div>
<?php
$content = ob_get_clean();
?>
<?php
require('View/frontend/template.php');
?>
