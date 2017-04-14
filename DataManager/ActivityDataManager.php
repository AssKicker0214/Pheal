<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/2
 * Time: 15:48
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/DataManager/PDO.php';
class ActivityDataManager
{
    private $pdo = null;

    function __construct(){
        $this->pdo = PDOManager::getPDO();
    }

    function createActivity($title, $endTime, $startTime, $description, $publisher){
        $this->pdo->beginTransaction();
        $sql = 'Insert into Activity(TITLE, DESCRIPTION, ENDTIME, STARTTIME, PUBLISHTIME, PUBLISHER) VALUES (?,?,?,?,?,?)';
        $stmt = $this->pdo->prepare($sql);
        $publishTime = date('Y-m-d h:i:s');
        $stmt->execute(array($title,$description,$endTime,$startTime,$publishTime,$publisher));

        $sql2 = 'Select ACTVTID FROM Activity Where (TITLE=? AND DESCRIPTION=? AND PUBLISHTIME=? AND PUBLISHER=?)';
//
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2->execute(array($title,$description,$publishTime,$publisher));
//        $stmt2->execute(array(":title"=>$title, ":description" => $description, ":publishTime" => $publishTime, ":publisher:" => $publisher));
        $actvtid = $stmt2->fetch(PDO::FETCH_ASSOC)['ACTVTID'];
        $this->pdo->commit();
        return $actvtid;

    }

    function getActivityDetail($actvtid){
        $sql = 'Select * From Activity WHERE ACTVTID=?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($actvtid));
        $act = $stmt->fetch(PDO::FETCH_ASSOC);
        return $act;
    }

    function participateActivity($actvtid, $userid){
        $sql = 'Insert into ActivityParticipant VALUES (?,?)';
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(array($actvtid, $userid));
        return $result;
    }

    function quitActivity($actvtid, $userid){
        $sql = 'DELETE from ActivityParticipant WHERE ACTVTID=? AND PARTICIPANTID=?';
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(array($actvtid, $userid));
        return $result;
    }

    function getParticipant($actvtid){
        $sql = 'select PARTICIPANTID from ActivityParticipant WHERE ACTVTID = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($actvtid));
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function getActivityList(){
        $sql = 'SELECT * FROM Activity';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array());
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function updateActivityList($id, $title, $endTime, $startTime, $description){
        $sql = 'Update Activity SET TITLE = ?, DESCRIPTION = ?, ENDTIME= ?, STARTTIME=? WHERE ACTVTID = ? ';
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(array($title, $description, $endTime, $startTime, $id));
        return $result;
//        return $id.$title.$ddl.$startTime.$description;
    }
}