<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 9:48
 */
include_once("PDO.php");
class ServiceDataManager
{

    private $pdo;
    function __construct(){
        $this->pdo = PDOManager::getPDO();
    }

    function createServiceRelation($applier, $pro){
        $sql = "Insert Into Service(SERVERID, CUSTOMERID, HEALTHACCESS) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(array($pro, $applier,'able'));
        if($result == true){
            echo 'succeeded';
        }else{
            echo $result;
        }
    }

    function getCustomer($pro){
        $sql = "Select CUSTOMERID From Service WHERE SERVERID=:pro";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":pro"=>$pro));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getClientInfo($pro){
        $sql = "Select * From PersonalInfo Where ID in (Select CUSTOMERID From Service WHERE SERVERID=:pro) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":pro"=>$pro));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getProInfo($client, $privilege){
        $sql = "Select * From PersonalInfo Where PRIVILEGE = :privilege AND ID in (Select SERVERID From Service WHERE CUSTOMERID=:client) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":client"=>$client, ":privilege"=>$privilege));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function dissmissRelation($proid, $cusid){
        $sql = "Delete From Service Where SERVERID=:proid AND CUSTOMERID=:cusid";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(array($proid, $cusid));
        if($result == true){
            echo '已解除';
        }else{
            echo $result;
        }
    }
}
