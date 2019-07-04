<?php
namespace Kirill\blog_ecrivain\Model;

// Je récupère le fichier pour accéder à la classe Model pour pouvoir créer une classe PostMAnager
require_once("Model/model.php");

// La classe model UserManager qui gère les users que j'ai crée à partir de la classe Model
class UserManager extends Model {

  public function listUsers() {
      $db = $this->dbConnect();
      $req = $db->query('SELECT id, name, first_name, email, DATE_FORMAT(inscription_date, \'%d/%m/%Y à %Hh%imin%ss\') AS inscription_date_fr, role FROM user ORDER BY inscription_date DESC');

      return $req;
    }
}
