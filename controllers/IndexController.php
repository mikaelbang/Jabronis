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
    public function testAction(){
        $db = new Database();
        $query = "SELECT * FROM players";
        $result = $db->getRows($query);

        var_dump($result);
    }

    public function galleriAction(){
        require_once "views/galleri.php";

    }

    public function spelareAction(){
        require_once "views/spelare.php";

    }

    public function spelschemaAction(){
        require_once "views/spelschema.php";

    }


    public function kontaktAction(){
        require_once "views/kontakt.php";

    }

    public function failAction(){
        require_once "views/404.php";

    }

}