# Documentation pour le code PHP

## Introduction
Ce document a été créé pour fournir une documentation détaillée sur le code PHP fourni ci-dessous. Il comprend différentes sections clés comme la définition des classes, les méthodes et leurs utilisations.

## Controller/PostController

## Classes
- `Model/postModel.php`: Ce fichier contient la classe Model qui gère toutes les interactions avec l'application.
- `Model/commentModel.php`: Cette classe est liée à la classe postModel pour permettre aux commentaires de se connecter au modèle des posts. 

## Méthodes et leurs utilisations
- La méthode `__construct()` dans le fichier `PostController` crée un nouvel objet `postsManager` qui sert à gérer les requêtes sur les posts.
- La méthode `listPosts()` affiche tous les posts via la classe `homeView.php`.
- L'objet `commentManager` est utilisé pour récupérer et manipuler les commentaires associés aux posts.

## Pages de l'application
- Page homeView.php : Affiche toutes les informations sur le site.
- Page updatePostView.php: Permet d'éditer un chapitre existant. 
- Page writePostView.php : Permet d'écrire un nouveau chapitre.
- Page editPageUser.php : Permet de modifier l'utilisateur.

## Gestion des requêtes
La méthode `getPosts()` est appelée dans la classe `postController` pour récupérer tous les posts, tandis que `getAllManagePostsUpdate()` et `getPostCount()` sont utilisés pour obtenir toutes les informations sur le nombre total d'articles et le nombre de post par défaut.

## Pagination
La méthode `getPostPagination()` est appelée dans la classe `postController` pour afficher une page de pagination pour tous les posts. 

## Gestion des erreurs
Dans chaque méthode, un bloc try catch est utilisé pour gérer toutes les exceptions qui peuvent survenir lors d'une interaction avec l'application.

## Conclusion
Ce code PHP fournit une structure solide et efficace pour la gestion des requêtes de base de données en utilisant le modèle-voiture MVC. Il offre également une bonne flexibilité grâce à sa capacité à gérer les commentaires associés aux posts, permettant ainsi d'ajouter un niveau supplémentaire de complexité au système.
