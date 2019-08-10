<?php
namespace Kirill\blog_ecrivain\Controller;
// Chargement des classes
require_once('Model/postModel.php');
require_once('Model/commentModel.php');
require_once('Controller/controller.php');
// je crée une classe enfant à partir de Classe parent dans le Controleur
class CommentsController extends Controller {
  private $commentManager;

  public function __construct() {
    $this->commentManager = new \Kirill\blog_ecrivain\Model\CommentManager();
}
  // Ajout le commentaire
    public function addComment($postId, $author, $comment) {
         $affectedLines = $this->commentManager->postComment($postId, $author, $comment);
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
         $allAlertedComents = $this->commentManager->getAlertedComments(); // Appel d'une fonction de cet objet
        require('view/frontend/viewAlertedComments.php');
    }

    // Signale le commentaire en passant la valeur true dans la table comments
    public function getCommentsAlerted($commentId, $postId, $alertTrue) {
       $getCommentsAlerted = $this->commentManager->alertComment($commentId, $postId, $alertTrue);
    }

    // Redirige vers le commentaire à éditer
    public function getPageEditComment($commentId, $postId) {
       $commentAlerted = $this->commentManager->getAlertedComment($commentId, $postId);
      require('view/frontend/viewEditComment.php');
    }

    //Modification de commentaire
public function changeComment($commentId, $postId, $author, $comment) {
       $commentUpdate = $this->commentManager->updateComment($commentId, $postId, $author, $comment);
      if ($commentUpdate === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible de modifier le commentaire !');
      }
      else {
        header('Location: index.php?action=post&postId=' . $postId);
        }
      }
      //Supprimer le commentaire
      public function removeComment($commentId, $postId) {
        if(isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
          // On vérifie que les deux correspondent
          if ($_SESSION['token'] == $_POST['token']) {
              $commentDelete = $this->commentManager->deleteComment($commentId, $postId);
            }

        if ($commentDelete === false) {
              // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
              throw new Exception('Impossible de supprimer le commentaire !');
            }
            else {
              header('Location: index.php?action=post&postId=' . $postId);
              }
          }

            }
}
?>
