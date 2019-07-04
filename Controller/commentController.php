<?php
namespace Kirill\blog_ecrivain\Controller;

// Chargement des classes
require_once('Model/postModel.php');
require_once('Model/commentModel.php');
require_once('Controller/controller.php');

// je crée une classe efant à partir de Classe parent dans le Controleur
class CommentsController extends Controller {

public function addComment($postId, $author, $comment) {
    $commentManager = new \Kirill\blog_ecrivain\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
      // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
      throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&postId=' . $postId);
      }
    }

public function changeComment($commentId, $postId, $comment) {
      $commentManagerUpdate = new \Kirill\blog_ecrivain\Model\CommentManager();
      $affectedLinesUpdate = $commentManagerUpdate->updateComment($commentId, $comment);

      if ($affectedLinesUpdate === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible de modifier le commentaire !');
      }
      else {
        header('Location: index.php?action=post&postId=' . $postId);
        }
      }
    }

?>
