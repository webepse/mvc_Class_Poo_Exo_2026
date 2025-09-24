<?php
    namespace App\Model;

    use App\Model\Manager;
    use PDO;

    class PostManager extends Manager{

        /**
         * Permet de récup les posts avec une limite (par défaut à 6)
         * @param int $limit
         * @return array|false|null
         */
        public function getPosts(int $limit = 6): array|false|null
        {
            $req = $this->dbConnect()->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 0,:limit");
            $req->bindValue(":limit", $limit, PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            $req->closeCursor();
            return $data;
        }

        public function getPost(int $id): array|false|null
        {
            $req = $this->dbConnect()->prepare("SELECT * FROM posts WHERE id = :id");
            $req->bindValue(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_OBJ);

            return $data;
        }

    }
