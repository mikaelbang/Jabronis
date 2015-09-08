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

    public function postAction(){
        $db = new Database();
        if(isset($_POST["post_article_button"]) && !empty($_POST["headline"]) && !empty($_POST["content"])){
            $query = "INSERT INTO articles(headline, content) VALUES (:headline, :content)";
            $params = [':headline' => htmlentities($_POST["headline"]), ':content' => htmlentities($_POST["content"])];
            $post = $db->insertRow($query, $params);
            $last = $db->lastId;
            $query2 = "INSERT INTO articles_images(article_id, image_id) VALUES (:article_id, :image_id)";
            $params2 = [':article_id' => ($last), ':image_id' => ($_POST["image_upload"])];
            $post2 = $db->insertRow($query2, $params2);

        }

    }

    public function getImagesAction(){
        $db = new Database();
        $query = "SELECT * FROM images";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    public function uploadAction(){
        $db = new Database();
        if(isset($_POST["upload_button"]) && !empty($_POST["imgSrc"])){
        $query = "INSERT INTO images(src) VALUES (:imgSrc)";
        $params = [':imgSrc' => htmlentities($_POST["imgSrc"])];
        $upload = $db->insertRow($query, $params);
        }
    }

    public function addPlayer(){

    }

    public function arkivAction(){


        require_once "views/arkiv.php";
    }


    public function galleryAction(){


        require_once "views/galleri.php";
    }

    public function adminAction(){

        require_once "views/admin.php";

    }



}