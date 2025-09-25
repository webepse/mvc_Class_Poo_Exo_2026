<?php
 namespace App\Controller;

use App\Model\PostManager;

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
 }