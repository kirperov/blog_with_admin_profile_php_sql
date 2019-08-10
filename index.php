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

// Tableau avec les actions existantes
$actions = array("listPosts", "listAllPosts", "editPagePosts","postEdit", "editPost", "post", "pageWriteChapiter", "writePost", "postDelete","addComment", "alertedcomments", "alertcomment", "commentEdit", "editComment", "commentDelete", "editPageUser", "editUser", "connexion", "connect", "logout", "adminSpace", "pageEditUser");

$cookie_name  = "tiket_secure";
//Génetation aléatoire et hash
$tiket_secure = session_id().microtime().rand(0,9999999999);
$tiket_secure = hash('sha512', $tiket_secure);
// On enregistre des deux cotés
setcookie($cookie_name, $tiket_secure, time() + (60 * 20)); // Expire au bout de 20 min
$_SESSION['tiket_secure'] = $tiket_secure;

// je teste si les variables passées dans les liens avec GET correspondent si elles correspondent j'applelle les bonnes méthodes
try {
    if (isset($_GET['action']) && in_array($_GET['action'], $actions) && isset($_COOKIE['tiket_secure']) == isset($_SESSION['tiket_secure'])) {
      // C'est reparti pour un tour
      $tiket_secure = session_id().microtime().rand(0,9999999999);
      $tiket_secure = hash('sha512', $tiket_secure);
      $_COOKIE['tiket_secure'] = $tiket_secure;
      $_SESSION['tiket_secure'] = $tiket_secure;
      // J'apelle la méthode du controller qui renvoie les 5 dérnièrs billets
        if ($_GET['action'] == 'listPosts') {
          $postsObject->listPosts();

          // J'apelle la méthode du controller qui renvoie tous les billets
        } elseif($_GET['action'] == 'listAllPosts') {
            $postsObject->listAllPosts();
            // La page qui liste les chapitres à éditer
        } else if($_GET['action'] == 'editPagePosts') {
          if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
            if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
              $postsObject->editPostsPage();
          }
      }else {
        $userObject->getPageError();
      }
    }

        //recupère le bon Id de post à éditer pour poster
        elseif ($_GET['action'] == 'postEdit') {
                    if (isset($_GET['postId']) && isset($_GET['postId']) > 0) {
                      if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
                        if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
                          $postsObject->postViewUpdate($_GET['postId']);
                      }
                  }else {
                    $userObject->getPageError();
                  }
                }
                    else {
                      // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                      $userObject->getPageError();
                    }
                }
                // Gère l'envoi du chapitre édité via formulaire
                  elseif($_GET['action'] == 'editPost') {
                    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
                      if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
                        if(!empty($_POST['inputTitleEdit']) && !empty($_POST['inputContentEdit'] && isset($_GET['postId']) && isset($_GET['postId']) > 0)) {
                          $postsObject->editPost($_POST['inputTitleEdit'],$_POST['inputContentEdit'], $_GET['postId']);
                        }
                        else {
                          // Autre exception
                          $urlRedirect = "Location:index.php?action=postEdit&postId=";
                          header($urlRedirect . $_GET['postId']);
                          throw new Exception('Typing error!');
                        }
                        $postsObject->postViewUpdate($_GET['postId']);
                    }
                }else {
                  $userObject->getPageError();
                }
              }
        // J'apelle la méthode du controller qui renvoie un billet en foction de son ID
        elseif ($_GET['action'] == 'post') {
          if (!empty($_GET['postId']) && !empty($_GET['postId']) > 0) {
            $postsObject->post($_GET['postId']);
          }
          else {
            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
            throw new Exception('No post ID sent');
          }

        }
        // Redirige vers la page pour écrire un chapitre
        elseif($_GET['action'] == 'pageWriteChapiter') {
          if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
            if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
              $postsObject->getPageWritePost();
          }
      }else {
        $userObject->getPageError();
      }
        }

        // Gère l'envoie de chapitre via formulaire
          elseif($_GET['action'] == 'writePost') {
            if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
              if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
                if(isset($_POST['inputTitle']) && isset($_POST['inputContent']) && !empty($_POST['inputTitle']) && !empty($_POST['inputContent'])) {
                  $postsObject->writePost($_POST['inputTitle'],$_POST['inputContent']);
                }
                else {
                  // Autre exception
                  $urlRedirect = "Location:index.php?action=pageWriteChapiter&postId=";
                  header($urlRedirect . $_GET['postId']);
                  }
              }
        }
        else {
          $userObject->getPageError();
        }
      }

        //Renvoie vers la suppression du chapitre
        else if($_GET['action'] == "postDelete") {
          if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
            if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
              if(isset($_GET['postId']) && isset($_GET['postId']) > 0) {
                $postsObject->removePost($_GET['postId']);
              }
            }
      }
      else {
        $userObject->getPageError();
      }
    }
        // Gère l'envoie de commentraire via formulaire
        elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['postId']) && isset($_GET['postId']) > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
              $commentsObject->addComment($_GET['postId'], $_POST['author'], $_POST['comment']);
            }
            else {
              // Autre exception
              $urlRedirect = "Location:index.php?action=post&postId=";
              header($urlRedirect . $_GET['postId']);

            }
        }
        else {
          // Autre exception
           $userObject->getPageError();

        }
      }


    // Redirection vers la page alert commentaire
    elseif($_GET['action'] == "alertedcomments") {
      if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
        if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
          $commentsObject->getPageAlert();
        }
  }
  else {
    $userObject->getPageError();
  }
}

    // Signale le commentaire
    elseif($_GET['action'] == "alertcomment") {
      if (isset($_GET['postId']) && isset($_GET['commentId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
        if(!empty($_POST['alertTrue']) && !empty($_POST['alertTrue'])) {
                $commentsObject->getCommentsAlerted($_GET['commentId'], $_GET['postId'], $_POST['alertTrue']);
                $urlRedirect = "Location:index.php?action=post&postId=";
                header($urlRedirect . $_GET['postId']);
       }
    }
  }
  // Page de modification de commentaire signalé
  else if($_GET['action'] == "commentEdit") {
    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
      if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
        if(isset($_GET['commentId']) && isset($_GET['postId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
          $commentsObject->getPageEditComment($_GET['commentId'], $_GET['postId']);
        }
    }
  } else {
    $userObject->getPageError();
  }
}

  // Modification Commentaire
  elseif ($_GET['action'] == 'editComment') {
    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
      if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
        if(isset($_GET['commentId']) && isset($_GET['postId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
          if (!empty($_POST['editAuthor']) && !empty($_POST['editCommentUpdate'])) {
               $commentsObject->changeComment($_GET['commentId'], $_GET['postId'], $_POST['editAuthor'], $_POST['editCommentUpdate']);
          }
        else {
          // Autre exception
          $urlRedirect = "Location:index.php?action=commentEdit&commentId=";
          header($urlRedirect . $_GET['commentId'] . '&' . 'postId=' . $_GET['postId']);
        }
    }
    else {
      // Autre exception
      $userObject->getPageError();
    }
  }
}
else {
  $userObject->getPageError();
}
}

//Renvoie vers la suppression du commentaire signalé
  else if($_GET['action'] == "commentDelete") {
  if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
  if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
    if(isset($_GET['commentId']) && isset($_GET['postId']) && $_GET['commentId'] > 0 && $_GET['postId'] > 0) {
      $commentsObject->removeComment($_GET['commentId'], $_GET['postId']);
    }
  }
}else {
  $userObject->getPageError();
}

  }
  else if($_GET['action'] == "editPageUser") {
    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
    if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
      $userObject->editPageUser();
    }
  }else {
    $userObject->getPageError();
  }
  }

  else if($_GET['action'] == "editUser") {
    if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
      if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
          if (!empty($_POST['inputLogin']) && !empty($_POST['inputName']) && !empty($_POST['inputFirstName']) && !empty($_POST['inputEmail']) && !empty($_POST['inputPassword']) && isset($_GET['userId']) && $_GET['userId'] > 0) {
            $pass_hache = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
               $userObject->editUser($_POST['inputLogin'], $_POST['inputName'], $_POST['inputFirstName'], $_POST['inputEmail'], $pass_hache, $_GET['userId']);
          }
        else {
          // Autre exception
           $urlRedirect = "Location:index.php?action=editPageUser&userId=";
          header($urlRedirect . $_GET['userId']);
        }
    }
    else {
      // Autre exception
      throw new Exception('No ID sent');
    }
}
else {
  $userObject->getPageError();
}
}

  //Renvoie vers la page de connexion
  else if($_GET['action'] == "connexion") {
         $userObject->getPageConnexion();
     }


   //Traitement la connexion
   else if($_GET['action'] == "connect") {
     if(isset($_POST['login']) && isset($_POST['password'])) {
         if (!empty($_POST['login']) && !empty($_POST['password'])) {
           // $_SESSION['login'] = $_POST['login'];
           // $_SESSION['password'] = $_POST['password'];
           $userObject->getUser($_POST['login'], $_POST['password']);

      }
        else {
          // Autre exception
          header("Location: index.php?action=connexion");
         }
    }
    else {
      // Autre exception
      header("Location: index.php?action=connexion");
    }
  }

  //Renvoie vers la page de connexion
  else if($_GET['action'] == "logout") {
         $userObject->getLogout();
      }


    // Gestion espace User
    else if ($_GET['action'] == 'adminSpace') {
      if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
        if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
          $userObject->getPageAdmin();
        }
      }  else {
        $userObject->getPageConnexion();

      }
    } elseif($_GET['action'] == "pageEditUser") {
      if(isset($_SESSION['goodLogin']) && isset($_SESSION['goodPassword'])) {
        if(!empty($_SESSION['goodLogin']) && !empty($_SESSION['goodLogin'])) {
          $userObject->getPageGestionUserEdit();
        }
      } else {
        $userObject->getPageConnexion();
      }
    }
  }  else {
    // Si pas d'actions renvoie vers la page HOME
    $postsObject->listPosts();
    // On détruit la session
  	$_SESSION = array();
  	session_destroy();
    echo "error";
   }
}

  catch(Exception $e) { // S'il y a eu une erreur, alors...
      echo 'Erreur : ' . $e->getMessage();
  }
