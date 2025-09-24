<?php
    namespace App\Model;

    use PDO;
    use Exception;

    class Manager{
        /**
         * nom de la base de données
         * @var string
         */
        private string $dbName = "blog2";

        /**
         * utilisateur de la bdd
         * @var string
         */
        private string $dbUser = "root";

        /**
         * Mot de passe de la bdd
         * @var string
         */
        private string $dbPass = "";

        /**
         * Adresse d'hébergement de la bdd
         * @var string
         */
        private string $dbHost = "localhost";

        /**
         * instance de la base de données
         * @var
         */
        private $bdd;

        /**
         * Permet de se connecter à la bdd
         * @return PDO
         */
        protected function dbConnect(): PDO
        {
            if($this->bdd == null){
                try{
                    $this->bdd = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUser, $this->dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                }catch(Exception $e)
                {
                    die('ERREUR: '.$e->getMessage());
                }
            }
            return $this->bdd;
        }
    }