<?php
 namespace App\Controller;

use App\Model\CommentManager;
use App\Model\PostManager;
use Exception;

 class PostController{

    /**
     * Permet d'afficher une page avec tous les posts
     *
     * @return void
     */
    public static function index(): void
    {
        $postManager = new PostManager();
        $posts = $postManager->getAllPost();
        require "views/frontend/posts.php";
    }

    /**
     * Permet d'afficher la page d'un post en particulier avec son id
     *
     * @param integer $id
     * @return void
     */
    public static function show(int $id): void
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($id);
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($id);
        if($post)
        {
            require "views/frontend/postShow.php";
        }else{
            throw new Exception("L'id ne correspond à un objet de la bdd",404);
        }
    }

     /**
      * Permet d'ajouter un commentaire à un post
      * @param int $postId
      * @return void
      */
    public static function postComment(int $postId): void
    {
        // instance des model dont nous avons besoin
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        // req au model pour savoir si le post existe
        $post = $postManager->getPost($postId);
        if($post)
        {
            // vérification du formulaire
            if((isset($_POST['author']) && isset($_POST['comment'])) && (!empty($_POST['author']) && !empty($_POST['comment'])))
            {
                // protection des données
                $author = htmlspecialchars($_POST['author']);
                $comment = htmlspecialchars($_POST['comment']);
                // req d'insertion au model pour ajouter le commentaire à la BDD
                $commentManager->post($postId, $author, $comment);
                // redirection pour éviter bug au rechargement de la page (ref formulaire)
                header("LOCATION:index.php?action=post&id=".$postId);
                exit();
            }else{
                // le formulaire n'est pas bon
                // besoin des commentaires pour l'affichage de la page (au nom de l'ergonomie)
                $comments = $commentManager->getComments($postId);
                $error = "Veuillez remplir tous les champs correctement";
                // on ajoute l'erreur à la vue postShow
                require "views/frontend/postShow.php";
            }

        }else{
            // le post n'existe pas
            throw new Exception("Le post n'existe pas");
        }
    }

 }