<?php
namespace Kirill\blog_ecrivain\Controller;

// Chargement des classes
require_once('Model/userModel.php');
require_once('Model/commentModel.php');
require_once('Controller/controller.php');



class UserController extends Controller {
  public function listAllUsers() {
    $userManager = new \Kirill\blog_ecrivain\Model\UserManager();
    $allUsersList = $userManager->listUsers();

    require('View/frontend/viewPageAdmin.php');
  }
}
