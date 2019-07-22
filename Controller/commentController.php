<?php
namespace Kirill\blog_ecrivain\Controller;
// Chargement des classes
require_once('Model/postModel.php');
require_once('Model/commentModel.php');
require_once('Controller/controller.php');
// je crée une classe enfant à partir de Classe parent dans le Controleur
class CommentsController extends Controller {
  // Ajout le commentaire
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
    // Page qui liste les comments à éditer
    public function getPageAlert() {
        $commentsAlertedManager = new \Kirill\blog_ecrivain\Model\CommentManager();
        $allAlertedComents = $commentsAlertedManager->getAlertedComments(); // Appel d'une fonction de cet objet
        require('view/frontend/viewAlertedComments.php');
    }

    // Signale le commentaire en passant la valeur true dans la table comments
    public function getCommentsAlerted($commentId, $postId, $alertTrue) {
      $commentManager = new \Kirill\blog_ecrivain\Model\CommentManager();
      $getCommentsAlerted = $commentManager->alertComment($commentId, $postId, $alertTrue);
    }

    // Redirige vers le commentaire à éditer
    public function getPageEditComment($commentId, $postId) {
      $commentManager = new \Kirill\blog_ecrivain\Model\CommentManager();
      $commentAlerted = $commentManager->getAlertedComment($commentId, $postId);
      require('view/frontend/viewEditComment.php');
    }

    //Modification de commentaire
public function changeComment($commentId, $postId, $comment) {
      $commentManager = new \Kirill\blog_ecrivain\Model\CommentManager();
      $commentUpdate = $commentManager->updateComment($commentId, $postId, $comment);
      if ($commentUpdate === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible de modifier le commentaire !');
      }
      else {
        header('Location: index.php?action=post&postId=' . $postId);
        }
      }
}
?>
