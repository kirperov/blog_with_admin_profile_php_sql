<?php
namespace Kirill\blog_ecrivain\Model; // La classe sera dans ce namespace

class Model
{
  protected function dbConnect()
  {
      $db = new \PDO('mysql:host=localhost;dbname=blog_ecrivain;charset=utf8', 'root', ''); // PDO est une classe qui se trouve à la racine (dans le namespace global). Pour régler le problème, il faudra écrire \PDO
      return $db;
  }
}
