<?php
    namespace App;

    use App\Controller\HomeController;
    use App\Controller\PostController;

    require "src/Autoloader.php";
    Autoloader::register();

    $tabMenu = ['accueil','posts','post'];

    if(isset($_GET['action']))
    {
        if(in_array($_GET['action'],$tabMenu)){
            if($_GET['action']=="accueil")
            {
                HomeController::index();
            }elseif($_GET['action']=="posts")
            {
                PostController::index();
            }

        }else{
            // erreur 404
        }
    }else{
        HomeController::index();
    }
