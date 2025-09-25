<?php
    namespace App\Model;

    use App\Model\Manager;
    use App\Model\Tools\Post;
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
            $req->bindParam(":limit", $limit, PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            $req->closeCursor();
            return $data;
        }

        /**
         * Permet d'obtenir un post en particulier avec l'id de son identifiant
         * @param int $id
         * @return object|false|null
         */
        public function getPost(int $id): object|false|null
        {
            $req = $this->dbConnect()->prepare("SELECT * FROM posts WHERE id = :id");
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_OBJ);

            return $data;
        }

        /**
         * Permet de récup tous les posts
         *
         * @return array|null|false
         */
        public function getAllPost(): array|false|null
        {
            $req = $this->dbConnect()->query("SELECT * FROM posts ORDER BY id DESC");
            // Post::class retourne le nom de la classe avec son namespace => 'App\Model\Tools\Post => ne pas oublier le use pour Post!'
            return $req->fetchAll(PDO::FETCH_CLASS, Post::class);
        }

    }
