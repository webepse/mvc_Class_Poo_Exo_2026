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

 }