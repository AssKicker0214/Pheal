<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/4 0004
 * Time: 15:13
 */
include_once("PDO.php");
class IDSearcher{
    private $id;
    public function __construct($id){
        $this->id = $id;
    }

    public function getPersonalInfo(){
        $pdo = PDOManager::getPDO();
        $sql = "Select * From PersonalInfo WHERE ID=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id"=>$this->id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLoginInfo(){
        $pdo = PDOManager::getPDO();
        $sql = "Select * From LoginInfo WHERE ID=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id"=>$this->id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
