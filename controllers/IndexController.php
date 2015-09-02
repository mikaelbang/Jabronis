<?php
/**
 * Created by PhpStorm.
 * User: mikael
 * Date: 2015-09-01
 * Time: 15:33
 */

include_once "Database.php";

Class Test{

     public function indexAction(){
         $db = new Database();
         $query = "SELECT * FROM players";
         $result = $db->getRows($query);

         var_dump($result);
     }

}