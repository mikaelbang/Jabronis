<?php
/**
 * Created by PhpStorm.
 * User: mikael
 * Date: 2015-09-01
 * Time: 15:33
 */

include_once "Database.php";

Class AjaxController{


    public function articlesAction(){
        $db = new Database();
        $query = "SELECT * FROM articles ORDER BY created DESC LIMIT 10";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function galleriAction(){
        $db = new Database();
        $query = "SELECT A.article_id, I.Image_id, I.src, A.content, A.headline, A.created FROM articles AS A LEFT JOIN articles_images AS AI ON (AI.article_id = A.article_id) LEFT JOIN images AS I ON (AI.image_id = I.image_id) ORDER BY A.created DESC";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function getPlayersAction(){
        $db = new Database();
        $query = "SELECT * FROM players AS P LEFT JOIN players_images AS PI ON(P.player_id = PI.player_id) LEFT JOIN images AS I ON(PI.image_id = I.image_id) ORDER BY players.player_id DESC";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function getScheduleAction(){
        $db = new Database();
        $query = "SELECT * FROM schedules";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function getImagesAction(){
        $db = new Database();
        $query = "SELECT * FROM images";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function allArticlesAction(){
        $db = new Database();
        $query = "SELECT * FROM articles ORDER BY created DESC";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }


}