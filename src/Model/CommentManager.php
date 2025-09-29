<?php
namespace App\Model;

use PDO;

class CommentManager extends Manager{

    /**
     * Permet de récup les commentaires sur un post
     * @param int $idPost
     * @return array|false|null
     */
    public function getComments(int $idPost): array|false|null
    {
        $req = $this->dbConnect()->prepare("SELECT *, DATE_FORMAT(comment_date, '%d/%m/%Y %Hh%i') as mydate FROM comments WHERE post_id = :id ORDER BY comment_date DESC");
        $req->bindParam(":id", $idPost, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Permet d'ajouter un commentaire à la base de données
     * @param int $idPost
     * @param string $author
     * @param string $content
     * @return bool
     */
    public function post(int $idPost, string $author, string $content): bool
    {
        $req = $this->dbConnect()->prepare("INSERT INTO comments (post_id, author, comment, comment_date) VALUES (:idPost, :author, :content, NOW())");
        $req->bindParam(":idPost", $idPost, PDO::PARAM_INT);
        $req->bindParam(":author", $author, PDO::PARAM_STR);
        $req->bindParam(":content", $content, PDO::PARAM_STR);
        $req->execute();
        return true;
    }

}