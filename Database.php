<?php
/**
 * Created by PhpStorm.
 * User: mikael
 * Date: 2015-09-01
 * Time: 15:49
 */

Class Database{

    public $isConnected;
    protected $datab;
    public  $lastId;

    public function __construct($username = "root", $password = "", $host = "localhost", $dbname = "jabronis", $options = []){
        $this->isConnected = true;

        try{
            $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            $this->isConnected = false;
            throw new Exception( $e->getMessage());

        }
    }

    public function Disconnect(){
        $this->datab = null;
        $this->isConnected = false;
    }

    public function getRow($query, $params = []){
        try{
            $stm = $this->datab->prepare($query);
            $stm->execute($params);
            return $stm->fetch();
        } catch(PDOException $e){
            throw new Exception( $e->getMessage());
        }

    }

    public function getRows($query, $params = []){
        try{
            $stm = $this->datab->prepare($query);
            $stm->execute($params);
            return $stm->fetchAll();
        } catch(PDOException $e){
            throw new Exception( $e->getMessage());
        }
    }

    public function insertRow($query, $params = []){
        try{
            $stm = $this->datab->prepare($query);
            $stm->execute($params);
            $this->lastId = $this->datab->lastInsertId();
            return true;
        } catch(PDOException $e){
            throw new Exception( $e->getMessage());
        }
    }

    public function updateRow($query, $params = []){
        $this->insertRow($query, $params);
    }

    public function deleteRow($query, $params = []){
        $this->insertRow($query, $params);
    }
}