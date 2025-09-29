<?php
    namespace App\Controller;
    use Exception;

    class ErrorController{

        public static function error(Exception $exception): void
        {
            //var_dump($exception);
            if($exception->getCode() == 404)
            {
                require "views/error/404.php";
            }

        }

    }