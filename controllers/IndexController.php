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

    public function testAction(){
        $db = new Database();
        $query = "SELECT * FROM articles";
        $result = $db->getRows($query);

        echo(json_encode($result));
    }

}