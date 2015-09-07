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
        $query = "SELECT images.src, A.content, A.headline FROM images JOIN articles_images AS AI ON (AI.image_id = images.image_id) JOIN articles AS A ON (A.article_id = AI.article_id) LIMIT 4";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function getPlayersAction(){
        $db = new Database();
        $query = "SELECT * FROM players AS P LEFT JOIN players_images AS PI ON(P.player_id = PI.player_id) LEFT JOIN images AS I ON(PI.image_id = I.image_id)";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function articleAction(){
        $db = new Database();
        $query = "SELECT * FROM images JOIN articles_images AS AI ON (AI.image_id = images.image_id) JOIN articles AS A ON (A.article_id = AI.article_id) WHERE A.article_id = :article_id";
        $params = [':article_id' => $_POST["hidden_article_id"]];
        $article = $db->getRows($query, $params);

        require_once "views/nyheter.php";
    }




}