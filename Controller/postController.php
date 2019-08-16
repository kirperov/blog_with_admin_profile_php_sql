<?php
namespace Kirill\blog_ecrivain\Controller;
// Chargement des classes
require_once('Model/postModel.php');
require_once('Model/commentModel.php');
require_once('Controller/controller.php');
// Je crée la classe PostController à partir de la classe parent Controller dans le fichier controller.php
class PostController extends Controller
{
    private $postsManager;
    private $commentManager;
    public function __construct()
    {
        $this->postsManager   = new \Kirill\blog_ecrivain\Model\PostManager(); //Je crée l'objet qui est défini dans le Model
        $this->commentManager = new \Kirill\blog_ecrivain\Model\CommentManager();
    }
    // Je crée la méthode qui sera charge d'afficher tous les posts sur une page homeView.php
    public function listPosts()
    {
        $posts = $this->postsManager->getPosts(); // Appel d'une fonction de cet objet
        require('View/frontend/homeView.php');
    }
    // Page qui liste les posts à éditer
    public function editPostsPage()
    {
        $allPosts = $this->postsManager->getAllPosts(); // Appel d'une fonction de cet objet
        require('View/frontend/updatePostView.php');
    }
    //recuprère l'id de post et commentaire associé
    public function post($postId)
    {
        $post     = $this->postsManager->getPost($postId);
        $comments = $this->commentManager->getComments($postId);
        require('view/frontend/postView.php');
    }
    //Redirige vers la page pour écrire un chapitre
    public function getPageWritePost()
    {
        require('view/frontend/writePostView.php');
    }
    public function getPostPagination()
    {
        $allPosts  = $this->postsManager->getAllManagePosts();
        // $allPosts = $this->postsManager->getAllPosts(); // Appel d'une fonction de cet objet
        $countPost = $this->postsManager->getPostCount();
        require('view/frontend/viewPagination.php');
    }
    // Page pour écrire un chapitre
    public function writePost($postTitle, $postContent)
    {
        $insertPost = $this->postsManager->addPost($postTitle, $postContent);
        if ($insertPost === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php?action=listAllPosts');
        }
    }
    // redediction vers le chapitre à éditer
    public function postViewUpdate($postId)
    {
        $post = $this->postsManager->getPost($postId);
        require('view/frontend/editPostView.php');
    }
    //éditer le chapitre
    public function editPost($postTitle, $postContent, $postId)
    {
        $post       = $this->postsManager->getPost($postId);
        $updatePost = $this->postsManager->updatePost($postTitle, $postContent, $postId);
        if ($updatePost === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'éditer le post !');
        } else {
            header('Location: index.php?action=listAllPosts');
        }
    }
    //Supprimer le chapitre
    public function removePost($postId)
    {
        $post       = $this->postsManager->getPost($postId);
        $deletePost = $this->postsManager->deletePost($postId);
        if ($deletePost === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'éditer le post !');
        } else {
            header('Location: index.php?action=listAllPosts');
        }
    }
}
?>
