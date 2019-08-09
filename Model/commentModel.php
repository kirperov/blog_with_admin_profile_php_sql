<?php
namespace Kirill\blog_ecrivain\Model;

require_once("Model/model.php");

class CommentManager extends Model {
  public function getComments($postId)
  {
      $db = $this->dbConnect();
      $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE id_post  = ? ORDER BY date_comment');
      $comments->execute(array($postId));

      return $comments;
  }

  public function getAlertedComments()
  {
      $db = $this->dbConnect();
      $alertedComments = $db->query('SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, alerted FROM comments WHERE  alerted = true ORDER BY date_comment DESC');

      return $alertedComments;
  }

  // Ajout des commentaires
  public function postComment($postId, $author, $comment)
  {
      $db = $this->dbConnect();

      $comments = $db->prepare("INSERT INTO comments(id_post, author, comment, date_comment) VALUES(:id, :author, :comment, NOW())");
      $comments->bindParam(':id', $postId, PDO::PARAM_INT);
      $comments->bindParam(':author', $author, PDO::PARAM_STR);
      $comments->bindParam(':comment', $comment, PDO::PARAM_STR);

      $affectedLines = $comments->execute();

      return $affectedLines;
  }


// Renvoie une valeur true dans la table comments pour signaler le commentaire à modifier
  public function alertComment($commentId, $postId, $alertTrue) {
    $db = $this->dbConnect();
    $alertCommentUpdate = $db->prepare("UPDATE comments SET alerted = $alertTrue  WHERE id='$commentId' AND id_post='$postId'");
    $affectedCommentAlertUpdate = $alertCommentUpdate->execute(array($commentId, $postId, $alertTrue));

    return $affectedCommentAlertUpdate;
  }

// Recupere le commentaire à modifier
  public function getAlertedComment($commentId, $postId) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ? AND id_post = ?');
    $req->execute(array($commentId, $postId));
    $commentAlerted = $req->fetch();

    return $commentAlerted;
  }

  // Mettre à jour les commentaires
  public function updateComment($commentId, $postId, $author, $comment) {
    $db = $this->dbConnect();
    $req = $db->prepare("UPDATE comments SET author = '$author', comment = '$comment', alerted = 'false' WHERE id='$commentId' AND id_post = '$postId'");
    $updatedComment = $req->execute(array($commentId , $postId, $author, $comment));

    return $updatedComment;
  }

  // Supprimer le commentaire
  public function deleteComment($commentId, $postId) {
    $db = $this->dbConnect();
    $req = $db->prepare("DELETE FROM comments WHERE id='$commentId' AND id_post = '$postId'");
    $req->execute(array($commentId , $postId));
  }
}
