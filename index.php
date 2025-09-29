<?php
    namespace App;

use App\Controller\ErrorController;
use App\Controller\HomeController;
    use App\Controller\PostController;
use Exception;

    require "src/Autoloader.php";
    Autoloader::register();

    $tabMenu = ['accueil','posts','post','postcomment'];

    try{
        if(isset($_GET['action']))
        {
            if(in_array($_GET['action'],$tabMenu)){
                if($_GET['action']=="accueil")
                {
                    HomeController::index();
                }elseif($_GET['action']=="posts")
                {
                    PostController::index();
                }elseif($_GET['action']=="post")
                {
                    if(isset($_GET['id']) && is_numeric($_GET['id']))
                    {
                        $id = htmlspecialchars($_GET['id']);
                        PostController::show($id);
                    }else{
                        // erreur 404
                        throw new Exception("L'identifiant doit être numérique ou n'est pas présent",404);
                    }
                }elseif($_GET['action']=="postcomment")
                {
                    // Router : index.php => gèrer la route
                    // Controller (cerveau) : src/Controller/PostController.php => intéragir avec la bdd (model) et envoyer vers la bonne vue
                        // src/Model/PostManager.php pour la gestion du post (vérifier / afficher)
                        // src/Model/CommentManager.php pour la gestion du commentaire (afficher / envoyer)
                    // la vue (require) => views/frontend/postShow.php

                    if(isset($_GET['id']) && is_numeric($_GET['id']))
                    {
                        $id = htmlspecialchars($_GET['id']);
                        PostController::postComment($id);
                    }else{
                        // erreur 404
                        throw new Exception("L'identifiant doit être numérique ou n'est pas présent",404);
                    }
                }

            }else{
                // erreur 404
                  throw new Exception("Action introuvable",404);
            }
        }else{
            HomeController::index();
        }
    }catch(Exception $e){
        ErrorController::error($e);
    }


   
