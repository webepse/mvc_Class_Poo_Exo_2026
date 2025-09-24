<?php
    namespace App;

    class Autoloader{

        /**
         * Enregistre notre autoloader
         * @return void
         */
        static function register(){
            spl_autoload_register([__CLASS__, 'autoload']);
        }

        //__CLASS__ => Autoloader
        // __NAMESPACE__ => App
        static function autoload($class){
            /* \\ c'est pour avoir \ pcq on doit l'échapper */
            // recherche la position de 'App\'
            // je demande si la position de App\ est à la position 0
           /* if(strpos($class, 'App\\') === 0){}*/
            /* pour rendre plus "réexploitable" mon autoloader j'utilise __NAMESPACE__ qui retourne le namespace en cours, ici c'est App */
            // si namespace Jordan
            // __NAMESPACE__ retourne Jordan
            if(strpos($class, __NAMESPACE__.'\\') === 0){

                // remplace __NAMESPACE__(ici App)+\ (\\ echape le \) et remplace le par '' (vide)
                // src/App/Controller/HomeController.php
                // src/App/Controller\HomeController.php
                $class = str_replace(__NAMESPACE__.'\\','',$class);
                // $class peut être Controller\HomeController.php
                // require_once => src/Controller\HomeController.php (pas bon)
                // \ en linux c'est pas bon pour le chemin
                // il faut remplacer les \ en /
                // si tu veux \ il faut faire \\
                //  $class = str_replace('\','/',$class);
                // '\' va retourner '
                $class = str_replace('\\','/',$class);
                // exemple require_once => src/Controller/HomeController.php (bon)
                require_once "src/".$class.".php";
            }
        }
    }
    // App\Controller\Autoloader
    // Controller\Autoloader
    // linux veut Controller/Autoloader

