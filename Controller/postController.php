<?php
namespace Kirill\blog_ecrivain\Controller;
// Chargement des classes
require_once('Model/postModel.php');
require_once('Model/commentModel.php');
require_once('Controller/controller.php');
// Je crée la classe PostController à partir de la classe parent Controller dans le fichier controller.php
class PostController extends Controller {
// Je crée la méthode qui sera charge d'afficher tous les posts sur une page homeView.php
  public function listPosts() {
      $postsManager = new \Kirill\blog_ecrivain\Model\PostManager(); //Je crée l'objet qui est défini dans le Model
      $posts = $postsManager->getPosts(); // Appel d'une fonction de cet objet
      require('View/frontend/homeView.php');
  }
  // Liste tous les posts
  public function listAllPosts() {
      $allPostsManager = new \Kirill\blog_ecrivain\Model\PostManager(); //Création d'un objet
      $allPosts = $allPostsManager->getAllPosts(); // Appel d'une fonction de cet objet
      require('View/frontend/allPostsView.php');
  }
  // Page qui liste les posts à éditer
  public function editPostsPage() {
      $allPostsManager = new \Kirill\blog_ecrivain\Model\PostManager(); //Création d'un objet
      $allPosts = $allPostsManager->getAllPosts(); // Appel d'une fonction de cet objet
      require('View/frontend/updatePostView.php');
  }


  public function post() {
      $postsManager = new \Kirill\blog_ecrivain\Model\PostManager();
      $commentManager = new \Kirill\blog_ecrivain\Model\CommentManager();
      $post = $postsManager->getPost($_GET['postId']);
      $comments = $commentManager->getComments($_GET['postId']);
      require('view/frontend/postView.php');
  }
  //Redirige vers la page pour écrire un chapitre
  public function getPageWritePost() {
    require('view/frontend/writePostView.php');
  }

  // Page pour écrire un chapitre
  public function writePost($postTitle, $postContent) {
    $postsManager = new \Kirill\blog_ecrivain\Model\PostManager();
    $insertPost = $postsManager->addPost($postTitle, $postContent);
    if ($insertPost === false) {
      // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
      throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=listAllPosts');
      }
  }
// redediction vers le chapitre à éditer
  public function postViewUpdate($postId) {
      $postsManager = new \Kirill\blog_ecrivain\Model\PostManager();
      $post = $postsManager->getPost($postId);
      require('view/frontend/editPostView.php');
  }
  // Page pour éditer le chapitre
  public function editPost($postTitle, $postContent, $postId) {
    $postsManager = new \Kirill\blog_ecrivain\Model\PostManager();
    $post = $postsManager->getPost($_GET['postId']);
    $updatePost = $postsManager->updatePost($postTitle, $postContent, $postId);
    if ($updatePost === false) {
      // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
      throw new Exception('Impossible d\'éditer le post !');
    }
    else {
        header('Location: index.php?action=listAllPosts');
      }
  }
}
?>
