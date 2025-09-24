<?php
    namespace App\Model;

    use PDO;

    class Manager{
        private string $dbName = "blog2";
        private string $dbUser = "root";
        private string $dbPass = "";
        private string $dbHost = "localhost";
        private $bdd;

        /**
         * Permet de se connecter à la bdd
         * @return PDO
         */
        protected function dbConnect(): PDO
        {
            if($this->bdd == null){
                try{
                    $this->bdd = new \PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUser, $this->dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                }catch(\Exception $e)
                {
                    die('ERREUR: '.$e->getMessage());
                }
            }
            return $this->bdd;
        }
    }