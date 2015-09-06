<?php
/**
 * Created by PhpStorm.
 * User: mikael
 * Date: 2015-09-01
 * Time: 15:33
 */

include_once "Database.php";

Class Testcontroller{
    public function indexAction(){
        require_once "views/index.php";

     }

    public function playersAction(){
        require_once "views/spelare.php";
    }

    public function scheduleAction(){
        require_once "views/spelschema.php";
    }

    public function contactAction(){
        require_once "views/kontakt.php";
    }

    public function articlesAction(){
        $db = new Database();
        $query = "SELECT * FROM articles ORDER BY created DESC LIMIT 10";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function galleriAction(){
        $db = new Database();
        $query = "SELECT images.src FROM images JOIN articles_images AS AI ON (AI.image_id = images.image_id) JOIN articles AS A ON (A.article_id = AI.article_id) LIMIT 4";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function getPlayersAction(){
        $db = new Database();
        $query = "SELECT * FROM players";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function articleAction(){
        $db = new Database();
        $query = "SELECT * FROM articles WHERE article_id = :article_id";
        $params = [':article_id' => $_POST["hidden_article_id"]];
        $article = $db->getRows($query, $params);

        //die(var_dump($article));

        require_once "views/nyheter.php";
    }




}