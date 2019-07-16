<!-- Router  -->
<!-- On teste les différentes valeurs passées dans l'action à partir des liens grace à GET et on redirige vers le bon contrôleur  -->
<?php
// Je initialise les fichiers des controllers
require('Controller/postController.php');
require('Controller/commentController.php');
require('Controller/userController.php');


// Initialisation des objets à partir des classes dans les controllers
$postsObject = new \Kirill\blog_ecrivain\Controller\PostController();
$commentsObject = new \Kirill\blog_ecrivain\Controller\CommentsController();
$userObject = new \Kirill\blog_ecrivain\Controller\UserController();

// je teste si les variables passées dans les liens avec GET correspondent si elles correspondent j'applelle les bonnes méthodes
try {
    if (isset($_GET['action'])) {
      // J'apelle la méthode du controller qui renvoie les 5 dérnièrs billets
        if ($_GET['action'] == 'listPosts') {
          $postsObject->listPosts();

          // J'apelle la méthode du controller qui renvoie tous les billets
        } elseif($_GET['action'] == 'listAllPosts') {
            $postsObject->listAllPosts();
            // La page qui liste les chapitres à éditer
        } else if($_GET['action'] == 'editPagePosts') {
          $postsObject->editPostsPage();
        }
        //recupère le bon Id de post à éditer
        elseif ($_GET['action'] == 'postEdit') {
                    if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                      $postsObject->postViewUpdate();
                    }
                    else {
                      // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                      throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                // Gère l'envoie de chapitre édité via formulaire
                  elseif($_GET['action'] == 'editPost') {
                  if(!empty($_POST['inputTitleEdit']) && !empty($_POST['inputContentEdit'] && isset($_GET['postId']) && $_GET['postId'] > 0)) {
                    $postsObject->editPost($_POST['inputTitleEdit'],$_POST['inputContentEdit'], $_GET['postId']);
                  }
                  else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                  }
                }
        // J'apelle la méthode du controller qui renvoie un billet en foction de son ID
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
              $postsObject->post();
            }
            else {
              // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
              throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        // Redirige vers la paga pour écrire un chapitre
        elseif($_GET['action'] == 'pageWriteChapiter') {
          $postsObject->getPageWritePost();
        }
        // Gère l'envoie de chapitre via formulaire
          elseif($_GET['action'] == 'writePost') {
          if(!empty($_POST['inputTitle']) && !empty($_POST['inputContent'])) {
            $postsObject->writePost($_POST['inputTitle'],$_POST['inputContent']);
          }
          else {
            // Autre exception
            throw new Exception('Tous les champs ne sont pas remplis !');
          }
        }
        // Gère l'envoie de commentraire via formulaire
        elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
              $commentsObject->addComment($_GET['postId'], $_POST['author'], $_POST['comment']);
            }
            else {
              // Autre exception
              throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
          // Autre exception
          throw new Exception('Aucun identifiant de billet envoyé');
        }
      }

      // Modification Commentaire
      elseif ($_GET['action'] == 'changeComment') {
        if (isset($_GET['postId']) && isset($_GET['commentId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
            if (!empty($_POST['commentUpdate'])) {
                 $commentsObject->changeComment( $_GET['commentId'], $_GET['postId'], $_POST['commentUpdate']);
            }
          else {
            // Autre exception
            throw new Exception('Tous les champs ne sont pas remplis !');
          }
      }
      else {
        // Autre exception
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    }
    // Gestion espace User
    elseif ($_GET['action'] == 'adminSpace') {
      $userObject->listAllUsers();
    }
  }
  else {
    $postsObject->listPosts();

     }
  }

  catch(Exception $e) { // S'il y a eu une erreur, alors...
      echo 'Erreur : ' . $e->getMessage();
  }
