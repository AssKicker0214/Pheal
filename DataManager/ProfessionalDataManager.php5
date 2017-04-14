<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/4 0004
 * Time: 14:41
 */
include_once("PDO.php");
include_once($_SERVER['DOCUMENT_ROOT']."/DataManager/MessageDataManager.php");

class ProfessionalDataManager{
    private $pdo;
    private $sql = "Select ID From PersonalInfo Where PRIVILEGE= :privilege";

    function __construct(){
        $this->pdo = PDOManager::getPDO();
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

    function getClient($proid){

    }

    function getApplication($proid){
        $msgMng = new MessageDataManager();
        $msgList = $msgMng->getReceivedMessageList($proid);
        $applicationList = array();
        foreach ($msgList as $msg) {
            if($msg['TYPE'] == '申请服务'){
                array_push($applicationList, $msg);
            }
        }
        return $applicationList;

    }
}

//$mng = new ProfessionalDataManager();
//$list = $mng->getDoctorIdList();
//foreach ($list as $row) {
//    echo $row['ID'];
//}
