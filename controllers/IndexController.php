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
        $query = "SELECT A.article_id, I.Image_id, I.src, A.content, A.headline, A.created FROM articles AS A LEFT JOIN articles_images AS AI ON (AI.article_id = A.article_id) LEFT JOIN images AS I ON (AI.image_id = I.image_id) ORDER BY A.created DESC";
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

            $this->adminAction();

        }
    }

    public function addPlayerAction(){
        $db = new Database();
        if(isset($_POST["add_player_button"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["age"]) && !empty($_POST["number"]) && !empty($_POST["player_info"])){
            $query = "INSERT INTO players(first_name, last_name, players.number, info, age, players.position ) VALUES (:firstName, :lastName, :nr, :info, :age, :playerPosition)";
            $params = [':firstName' => htmlentities($_POST["first_name"]), ':lastName' => htmlentities($_POST["last_name"]), ':nr' => htmlentities($_POST["number"]), ':info' => htmlentities($_POST["player_info"]), ':age' => htmlentities($_POST["age"]), ':playerPosition' => htmlentities($_POST["position"])];
            $post = $db->insertRow($query, $params);
            $last = $db->lastId;
            $query2 = "INSERT INTO players_images(player_id, image_id) VALUES (:player_id, :image_id)";
            $params2 = [':player_id' => ($last), ':image_id' => ($_POST["player_upload"])];
            $post2 = $db->insertRow($query2, $params2);
        }
    }

    public function arkivAction(){


        require_once "views/arkiv.php";
    }


    public function galleryAction(){


        require_once "views/galleri.php";
    }

    public function showAdminAction(){
        require_once "views/admin.php";

    }

    public function adminAction(){

        if(isset($_POST["login_button"])){
            if($this->verification()){

                $this->showAdminAction();
            }
            else{

                var_dump('du är inte admin');

            }
        }

    }

    public function allArticlesAction(){
        $db = new Database();
        $query = "SELECT * FROM articles ORDER BY created DESC";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

    protected function verification(){



        $db = new Database();
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $params = [':username' => htmlentities($_POST["username"]), ':password' => htmlentities($_POST["password"])];
        $result = $db->getRow($query, $params);



        if(!empty($result)){
            return true;
        }
        else{
            return false;
        }
    }

    public function loginAction(){

        require_once "views/login.php";

    }
}