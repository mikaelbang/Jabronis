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

    public function postMailAction(){

        $name = $_POST["form_name"];
        $sender_email = $_POST["form_mail"];
        $number = $_POST["form_nr"];
        $message = $_POST["form_message"];

        $email_subject = "Jabronis Intresse";
        $email_body = 'Du har fått mail från $name'."\n". 'Email adress: $sender_email'."\n". 'Meddelandet: $message'."\n";
        $to = 'richard.bang@live.se';
        $headers = 'From: richard.bang@live.se'."\r\n";

        if(isset($_POST["send_email_button"]) && !empty($name) && !empty($sender_email) && !empty($number) && !empty($message)){
            mail($to,$email_subject,$email_body,$headers);
        }
    }
}