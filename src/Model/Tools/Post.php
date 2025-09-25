<?php

namespace App\Model\Tools;

use DateTime;
use DateTimeZone;

class Post{

    public $id;
    public $title;
    public $content;
    public $creation_date;

    /**
     * Permet d'afficher l'url permettant d'accèder à la page du post
     *
     * @return string
     */
    public function getURL(): string
    {
        return "index.php?action=post&id=".$this->id;
    }

    /**
     * Permet d'afficher un extrait si mon texte est trop long
     *
     * @return string
     */
    public function getExtrait(): string
    {
        $texte = strip_tags($this->content);
        if(preg_match('#(\w+\W+){19}\w+#s', $texte,$out))
        {
            $html = "<div>".$out[0]."... </div><a href='".$this->getURL()."' class='btn btn-primary my-3'>Voir la suite</a>";
        }else{
            $html = "<div>".$texte."</div><a href='".$this->getURL()."' class='btn btn-success my-3'>Voir l'article</a>";
        }
        return $html;
    }

    /**
     * Permet d'afficher la creation_date dans le format européen
     *
     * @return string
     */
    public function getDateFormat(): string
    {
        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->creation_date);

        // si on n'a pas le bon format 
        if(!$dateTime)
        {
            $dateTime = DateTime::createFromFormat('Y-m-d', $this->creation_date);
        }
        $dateTime->setTimezone(new \DateTimeZone('Europe/Brussels'));

        if($dateTime){
            return $dateTime->format('d/m/Y H:i');
            //return $dateTime->getTimestamp();
        }

        return $this->creation_date;

    }

    public function timeAgo(): string
    {
        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->creation_date);
        // si on n'a pas le bon format 
        if(!$dateTime)
        {
            $dateTime = DateTime::createFromFormat('Y-m-d', $this->creation_date);
        }
        $dateTime->setTimezone(new \DateTimeZone('Europe/Brussels'));
        $now = new DateTime('now',  new \DateTimeZone('Europe/Brussels'));
       


        $diff = $now->diff($dateTime);

        // on choisit l'unité la plus appropriée
        if($diff->y > 0)
        {
            return 'il y a '.$diff->y." an" . ($diff->y > 1 ? "s" : "");
        }

        if($diff->m > 0)
        {
            return "il y a ". $diff->m . " mois";
        }

        if($diff->d > 0)
        {
            return "il y a ". $diff->d . " jour" . ($diff->d > 1 ? "s" : "");
        }

         if($diff->h > 0)
        {
            return "il y a ". $diff->h . " heure" . ($diff->h > 1 ? "s" : "");
        }

         if($diff->i > 0)
        {
            return "il y a ". $diff->i . " minute" . ($diff->i > 1 ? "s" : "");
        }
        return "à l'instant";
    }


}