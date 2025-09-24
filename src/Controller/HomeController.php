<?php
    namespace App\Controller;

    use App\Model\PostManager;

    class HomeController{
        public static function index(): void
        {
            $postManager = new PostManager();
            $posts = $postManager->getPosts();
            require "views/frontend/home.php";
        }

    }
