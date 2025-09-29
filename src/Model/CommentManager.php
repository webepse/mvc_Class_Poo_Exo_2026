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

    
}
