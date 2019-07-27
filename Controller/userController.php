<?php
namespace Kirill\blog_ecrivain\Controller;
 // Chargement des classes
require_once('Model/userModel.php');
require_once('Model/commentModel.php');
require_once('Controller/controller.php');

class UserController extends Controller {
  private $userManager;

  public function __construct() {
    $this->userManager =  new \Kirill\blog_ecrivain\Model\UserManager(); //Je crée l'objet qui est défini dans le Model
 }
  //Liste les utilisateurs
  public function listAllUsers() {
    $allUsersList = $this->userManager->listUsers();
    require('View/frontend/viewPageAdmin.php');
  }

  /*GESTION DE CONNEXION*/

  //Redirige vers la page de connexion
  public function getPageConnexion() {
    $allUsersList = $this->userManager->listUsers();
     require('view/frontend/viewPageConnexion.php');
  }

  public function getUser($login, $password) {
    $allUsersList = $this->userManager->listUsers();
    $user = $this->userManager->user($login, $password);

    //require('View/frontend/viewPageAdmin.php');
    require('view/frontend/viewPageConnexion.php');
  }

  //Redirige vers la deconnexion
  public function getLogout() {
    session_destroy();
   }

}
