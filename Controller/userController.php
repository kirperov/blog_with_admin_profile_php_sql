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
}
