<?php
    namespace App;

    use App\Controller\HomeController;

    require "src/Autoloader.php";
    Autoloader::register();

    $tabMenu = ['accueil','posts','post'];

    if(isset($_GET['action']))
    {
        if(in_array($_GET['action'],$tabMenu)){

        }else{
            // erreur 404
        }
    }else{
        HomeController::index();
    }
