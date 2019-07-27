<?php
namespace Kirill\blog_ecrivain\Model;

// Je récupère le fichier pour accéder à la classe Model pour pouvoir créer une classe PostMAnager
require_once("Model/model.php");

// La classe model UserManager qui gère les users que j'ai crée à partir de la classe Model
class UserManager extends Model {

  public function listUsers() {
      $db = $this->dbConnect();
      $req = $db->query('SELECT id, name, login, first_name, email, DATE_FORMAT(inscription_date, \'%d/%m/%Y à %Hh%imin%ss\') AS inscription_date_fr, password, role FROM user ORDER BY inscription_date DESC');

      return $req;
    }

    // Méthode qui récupère un user précis grâce au l'id passée en paramètre à partir du controleur(qui réqupère l'id avec GET dans l'url)
      public function user($login, $password)
      {
          $db = $this->dbConnect();
          $req = $db->prepare('SELECT id, name, login, first_name, email, DATE_FORMAT(inscription_date, \'%d/%m/%Y à %Hh%imin%ss\') AS inscription_date_fr, role FROM user WHERE login = ? AND pasword = ?');
          $req->execute(array($login, $password));
          $user = $req->fetch();

          return $user;
      }
}
