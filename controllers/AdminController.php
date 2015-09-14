<?php

Class AdminController{

    public function loginAction(){
        require_once "views/login.php";
    }

    public function showAdminAction(){
        require_once "views/admin.php";
    }

    public function uploadAction(){
        $db = new Database();
        if(isset($_POST["upload_button"]) && !empty($_POST["imgSrc"])){
            $query = "INSERT INTO images(src) VALUES (:imgSrc)";
            $params = [':imgSrc' => htmlentities($_POST["imgSrc"])];
            $upload = $db->insertRow($query, $params);

            $this->indexAction();

        }
    }

    public function addScheduleAction(){
        $timeField = ($_POST["schedule_time_from"]) . " - " . ($_POST["schedule_time_to"]);

        $db = new Database();
        if(isset($_POST["add_schedule_button"]) && !empty($_POST["schedule_date"]) && !empty($_POST["schedule_time_from"])  && !empty($_POST["schedule_time_to"]) && !empty($_POST["schedule_arena"])){
            $query = "INSERT INTO schedules(schedules.date, schedules.time, arena, article_id) VALUES (:schedule_date, :schedule_time, :arena, :article_id)";
            $params = [':schedule_date' => htmlentities($_POST["schedule_date"]), ':schedule_time' => htmlentities($timeField), ':arena' => htmlentities($_POST["schedule_arena"]), ':article_id' => htmlentities($_POST["schedule_article"]) ];
            $upload = $db->insertRow($query, $params);
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

    public function indexAction(){
        if(isset($_POST["login_button"])){
            if($this->verification()){

                $this->showAdminAction();
            }
            else{
                var_dump('du är inte admin');
            }
        }
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
}