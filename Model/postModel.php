<?php
namespace Kirill\blog_ecrivain\Model;

// Je récupère le fichier pour accéder à la classe Model pour pouvoir créer une classe PostMAnager
require_once("Model/model.php");

// La classe model PostManager qui gère les posts que j'ai crée à partir de la classe Model
class PostManager extends Model  {

// Méthode qui récupère les 5 dérnières posts
  public function getPosts()
  {
      $db = $this->dbConnect();
      $req = $db->query('SELECT id, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY date_post DESC LIMIT 0, 5');

      return $req;
  }

// Méthode qui récupère tous les posts
  public function getAllPosts()
  {
      $db = $this->dbConnect();
      $req = $db->query('SELECT id, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, status FROM posts ORDER BY date_post');

      return $req;
  }

// Méthode qui récupère un poste précis grâce au l'id passée en paramètre à partir du controleur(qui réqupère l'id avec GET dans l'url)
  public function getPost($postId)
  {
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
      $req->execute(array($postId));
      $post = $req->fetch();

      return $post;
  }

// Poste le chapitre dans la table posts
  public function addPost($postTitle, $postContent) {
    $db = $this->dbConnect();
    $req =$db->prepare('INSERT INTO posts(title, content, date_post) VALUES (?,?, NOW())');
    $insertPost = $req->execute(array($postTitle, $postContent));

    return $insertPost;
  }

// Request pour mettre à jour le chaptire
  public function updatePost($postTitle, $postContent, $postId) {
    $db = $this->dbConnect();
    $req =$db->prepare("UPDATE posts SET title= ?, content= ? WHERE id= ? ");
    $updatePost = $req->execute(array($postTitle, $postContent, $postId));

    return $updatePost;
  }

  // Supprimer le Chapitre
  public function deletePost($postId) {
    $db = $this->dbConnect();
    $req = $db->prepare("DELETE FROM posts WHERE id = '$postId'");
    $req->execute(array($postId));
  }
}
