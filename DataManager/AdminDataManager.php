<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/2
 * Time: 14:58
 */
include_once "PDO.php";
class AdminDataManager
{
    private $pdo = null;
    function __construct(){
        $this->pdo = PDOManager::getPDO();
    }

    function checkIn($aid, $password){
        $sql = 'select * from Admin WHERE AID = :aid AND PASSWORD = :password';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':aid'=>$aid, ':password'=>$password));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result)<= 0){
            return false;
        }else{
            return true;
        }
    }
}