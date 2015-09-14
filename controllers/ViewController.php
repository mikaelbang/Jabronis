<?php


Class ViewController{
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

    public function arkivAction(){
        require_once "views/arkiv.php";
    }

    public function galleryAction(){
        require_once "views/galleri.php";
    }

    public function articleAction(){
        $id1 = $_GET['id'];
        $db = new Database();
        $query = "SELECT * FROM images JOIN articles_images AS AI ON (AI.image_id = images.image_id) JOIN articles AS A ON (A.article_id = AI.article_id) WHERE A.article_id = :article_id";
        $params = [':article_id' => htmlentities($id1)];
        $article = $db->getRows($query, $params);

        require_once "views/nyheter.php";
    }

    public function gamesAction(){
        require_once "views/inget.php";
    }

    public function practiceAction(){
        require_once "views/inget.php";
    }

    public function playAction(){
        require_once "views/inget.php";
    }

    public function mailAction(){

        if(isset($_POST['send_email_button']) && !empty($_POST["form_name"]) && !empty($_POST["form_mail"]) && !empty($_POST["form_nr"]) && !empty($_POST["form_message"])){
            $email_to = "jabronishc@gmail.com"; // this is your Email address
            $from = htmlentities($_POST['form_mail']); // this is the sender's Email address
            $name = htmlentities($_POST['form_name']);
            $email_subject = "Form submission";
            $email_message = $name . " " .  " wrote the following:" . "\n\n" . htmlentities($_POST['form_message']);

            $headers = "From:" . $from;
            mail($email_to,$email_subject,$email_message,$headers);
            $this->contactAction();

            echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
        }

    }
}