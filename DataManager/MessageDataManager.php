<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/5 0005
 * Time: 0:35
 */
include_once("PDO.php");
class MessageDataManager{
    private $pdo;
    private $sql = "Select ID From PersonalInfo Where PRIVILEGE= :privilege";

    function __construct(){
        $this->pdo = PDOManager::getPDO();
    }

    function createMessage($type,$title, $content, $recipient, $sender){
        $sql = "Insert Into Message(SENDER, RECIPIENT, TIME, CONTENT, STATUS, TITLE, TYPE, MSGID) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($sender, $recipient, date("Y-m-d H:i:s"), $content, "未读", $title, $type, $sender.date("YmdHis")));
        $rowCount = $stmt->rowCount();
        if($rowCount == 1){
            return true;
        }else{
            return false;
        }
    }

    function updateMessageStatus($msgid, $newStatus){
        $sql = "Update Message Set STATUS = :newStatus WHERE MSGID=:msgid";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":newStatus"=>$newStatus,":msgid"=>$msgid));
    }

    function getDirectedMessageList($sender, $recipient){
        $sql = "Select * From Message Where SENDER= :sender And RECIPIENT= :recipient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":sender"=>$sender,":recipient"=>$recipient));
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function getAllMessageList($userRelated){
        $sql = "Select * From Message Where SENDER= :sender OR RECIPIENT= :recipient ORDER BY TIME ASC " ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":sender"=>$userRelated,":recipient"=>$userRelated));
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function getSentMessageList($userRelated){
        $sql = "Select * From Message Where SENDER= :sender";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":sender"=>$userRelated));
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function getReceivedMessageList($userRelated){
        $sql = "Select * From Message Where RECIPIENT= :recipient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":recipient"=>$userRelated));
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function getDoctorIdList(){
        $stmt = $this->pdo->prepare($this->sql);
        $stmt->execute(array(":privilege"=>"医生"));
        $resultList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultList;
    }

    function getCoachIdList(){

        $stmt = $this->pdo->prepare($this->sql);
        $stmt->execute(array(":privilege"=>"教练"));
        $resultList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultList;
    }

    function delect($msgid){
        $sql = "delete from Message Where MSGID = :msgid";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(array(":msgid"=>$msgid));
        return $result;
    }
}
