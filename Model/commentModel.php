<?php
namespace Kirill\blog_ecrivain\Model;

require_once("Model/model.php");

class CommentManager extends Model {
  public function getComments($postId)
  {
      $db = $this->dbConnect();
      $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post  = ? ORDER BY date_comment DESC');
      $comments->execute(array($postId));

      return $comments;
  }

  // Ajout des commentaires
  public function postComment($postId, $author, $comment)
  {
      $db = $this->dbConnect();
      $comments = $db->prepare('INSERT INTO comments(id_post, author, comment, date_comment) VALUES(?, ?, ?, NOW())');
      $affectedLines = $comments->execute(array($postId, $author, $comment));

      return $affectedLines;
  }

  // Mettre à jour les commentaires
  public function updateComment($commentId, $comment) {
    $db = $this->dbConnect();
    $commentsUpdate = $db->prepare("UPDATE comments SET  comment = '$comment' WHERE id='$commentId,'");
    $affectedLinesUpdate = $commentsUpdate->execute(array($commentId, $comment));

    return $affectedLinesUpdate;
  }
}
