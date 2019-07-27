<!-- Router  -->
<!-- On teste les différentes valeurs passées dans l'action à partir des liens grace à GET et on redirige vers le bon contrôleur  -->
<?php
// Je initialise les fichiers des controllers
session_start();
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
          if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
            if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
              $postsObject->editPostsPage();
          }
      }else {
          echo "you can't get this page because wrong password or login";
      }
    }

        //recupère le bon Id de post à éditer pour poster
        elseif ($_GET['action'] == 'postEdit') {
                    if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                      if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
                        if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
                          $postsObject->postViewUpdate($_GET['postId']);
                      }
                  }else {
                      echo "you can't get this page because wrong password or login";
                  }
                    }
                    else {
                      // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                      throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                // Gère l'envoi du chapitre édité via formulaire
                  elseif($_GET['action'] == 'editPost') {
                    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
                      if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
                        if(!empty($_POST['inputTitleEdit']) && !empty($_POST['inputContentEdit'] && isset($_GET['postId']) && $_GET['postId'] > 0)) {
                          $postsObject->editPost($_POST['inputTitleEdit'],$_POST['inputContentEdit'], $_GET['postId']);
                        }
                        else {
                          // Autre exception
                          throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                        $postsObject->postViewUpdate($_GET['postId']);
                    }
                }else {
                    echo "forbidden action";
                }
              }
        // J'apelle la méthode du controller qui renvoie un billet en foction de son ID
        elseif ($_GET['action'] == 'post') {
          if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            $postsObject->post($_GET['postId']);
          }
          else {
            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
            throw new Exception('Aucun identifiant de billet envoyé');
          }

        }
        // Redirige vers la page pour écrire un chapitre
        elseif($_GET['action'] == 'pageWriteChapiter') {
          if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
            if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
              $postsObject->getPageWritePost();
          }
      }else {
          echo "you can't get this page because wrong password or login";
      }
        }

        // Gère l'envoie de chapitre via formulaire
          elseif($_GET['action'] == 'writePost') {
            if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
              if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
                if(!empty($_POST['inputTitle']) && !empty($_POST['inputContent'])) {
                  $postsObject->writePost($_POST['inputTitle'],$_POST['inputContent']);
                }
                else {
                  // Autre exception
                  throw new Exception('Tous les champs ne sont pas remplis !');
                }
              }
        }
        else {
            echo "you can't get this page because wrong password or login";
        }
      }

        //Renvoie vers la suppression du chapitre
        else if($_GET['action'] == "postDelete") {
          if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
            if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
              if(isset($_GET['postId']) && $_GET['postId'] > 0) {
                $postsObject->removePost($_GET['postId']);
              }
            }
      }
      else {
          echo "forbidden action";
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


    // Redirection vers la page alert commentaire
    elseif($_GET['action'] == "alertedcomments") {
      $commentsObject->getPageAlert();
    }
    // Signale le commentaire
    elseif($_GET['action'] == "alertcomment") {
      if (isset($_GET['postId']) && isset($_GET['commentId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
        if(!empty($_POST['alertTrue']) && $_POST['alertTrue']) {
                $commentsObject->getCommentsAlerted($_GET['commentId'], $_GET['postId'], $_POST['alertTrue']);
                echo  $_POST['alertTrue'];
      }
    }
  }
  // Page de modification de commentaire signalé
  else if($_GET['action'] == "commentEdit") {
    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
      if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
        if(isset($_GET['commentId']) && isset($_GET['postId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
          $commentsObject->getPageEditComment($_GET['commentId'], $_GET['postId']);
        }
    }
  } else {
          echo "you can't get this page because wrong password or login";
  }
}

  // Modification Commentaire
  elseif ($_GET['action'] == 'editComment') {
    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
      if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
        if(isset($_GET['commentId']) && isset($_GET['postId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
          if (!empty($_POST['editAuthor']) && $_POST['editCommentUpdate']) {
               $commentsObject->changeComment($_GET['commentId'], $_GET['postId'], $_POST['editAuthor'], $_POST['editCommentUpdate']);
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
}
else {
echo "forbidden action";
}
}

//Renvoie vers la suppression du commentaire signalé
else if($_GET['action'] == "commentDelete") {
  if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
  if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
    if(isset($_GET['commentId']) && isset($_GET['postId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
      $commentsObject->removeComment($_GET['commentId'], $_GET['postId']);
    }}
}else {
echo "forbidden action";
}

  }

  //Renvoie vers la page de connexion
  else if($_GET['action'] == "connexion") {
         $userObject->getPageConnexion();
     }


   //Traitement la connexion
   else if($_GET['action'] == "connect") {
     if(isset($_POST['login']) && isset($_POST['password'])) {
         if (!empty($_POST['login']) && ($_POST['password'])) {
           $_SESSION['login'] = $_POST['login'];
           $_SESSION['password'] = $_POST['password'];
           $userObject->getUser($_POST['login'], $_POST['password']);

      }
        else {
          // Autre exception
          throw new Exception('Tous les champs ne sont pas remplis !');
        }
    }
    else {
      // Autre exception
      throw new Exception('Error login or password');
    }
  }

  //Renvoie vers la page de connexion
  else if($_GET['action'] == "logout") {
         $userObject->getLogout();
         echo "you're logout";
     }


    // Gestion espace User
    else if ($_GET['action'] == 'adminSpace') {
      if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
        if(!empty($_SESSION['goodLogin']) && ($_SESSION['goodLogin'])) {
          $userObject->getPageAdmin();
        }
      }  else {
          // $postsObject->listPosts();
          echo 'erreur de connexion';
      }
    }
  } else {
    // Si pas d'actions renvoie vers la page HOME
    $postsObject->listPosts();
  }
}

  catch(Exception $e) { // S'il y a eu une erreur, alors...
      echo 'Erreur : ' . $e->getMessage();
  }
