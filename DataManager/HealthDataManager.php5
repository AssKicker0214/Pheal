<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/17
 * Time: 9:09
 */
include_once "PDO.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/healthbl/HealthData.php';
class HealthDataManager{
    private $pdo = null;
    public function __construct(){
        $this->pdo = PDOManager::getPDO();
    }

    //先删除原来的记录（用户，日期）
    public function insert($data){
        $this->pdo->beginTransaction();
        $stageTypes = $data->sleep->stageTypes;
        $stageTimes = $data->sleep->stageTimes;
        $walks = $data->walks;
        $jogs = $data->jogs;

        $tables = array("HealthData", "Walk", "Jog", "SleepStage");
        foreach($tables as $table){
            $sql = "delete from ".$table." where UID=:uid AND DAY=:date";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(":uid"=>$data->userid, ":date"=>$data->date));
        }

        $sql1 = "Insert into HealthData (UID, DAY, SLEEPSTART, SLEEPEND) VALUES (?, ?, ?, ?)";
        $stmt1 = $this->pdo->prepare($sql1);
        $stmt1->execute(array($data->userid, $data->date, $data->getSleepStart(), $data->getSleepEnd()));

        foreach($walks as $walk){
            $sql3 = "Insert into Walk (UID, DAY, STARTTIME, DURATION, DISTANCE) VALUES (?,?,?,?,?)";
            $stmt3 = $this->pdo->prepare($sql3);
            $stmt3->execute(array($data->userid, $data->date, $walk->startTime, $walk->duration, $walk->distance));
        }

        foreach($jogs as $jog){
            $sql4 = "Insert into Jog (UID, DAY, STARTTIME, DURATION, DISTANCE) VALUES (?,?,?,?,?)";
            $stmt4 = $this->pdo->prepare($sql4);
            $stmt4->execute(array($data->userid, $data->date, $jog->startTime, $jog->duration, $jog->distance));
        }

        for($i=0;$i<count($stageTypes);$i++){
            $stageType = $stageTypes[$i];
            $stageTime = $stageTimes[$i];
            $sql2 = "Insert into SleepStage (UID, DAY, STAGE, STARTTIME) VALUES(?,?,?,?)";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute(array($data->userid, $data->date, $stageType, $stageTime));
        }

        $this->pdo->commit();
    }

    public function getData($userid, $date){
        //$this->pdo->beginTransaction();

        $condition = " where UID='".$userid."' AND DAY='".$date."'";

        $sql1 = "select SLEEPSTART, SLEEPEND from HealthData".$condition;
        //echo "<br/>",$sql1;
        $stmt1 = $this->pdo->prepare($sql1);
        $stmt1->execute();
        $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
        $sleep = new Sleep();
        $sleepStartTime = $result1['SLEEPSTART'];
        $sleepEndTime = $result1['SLEEPEND'];
        $sleep->startTime = $sleepStartTime;
        $sleep->endTime = $sleepEndTime;

        $sql2 = "select STARTTIME, DURATION, DISTANCE from Walk".$condition;
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $walks = array();
        foreach($result2 as $line){
            $walk = new Walk();
            $walk->distance = $line['DISTANCE'];
            $walk->duration = $line['DURATION'];
            $walk->startTime = $line['STARTTIME'];
            array_push($walks, $walk);
        }

        $sql3 = "select STARTTIME, DURATION, DISTANCE from Jog".$condition;
        $stmt3 = $this->pdo->prepare($sql3);
        $stmt3->execute();
        $result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $jogs = array();
        foreach($result3 as $line){
            $jog = new Jog();
            $jog->distance = $line['DISTANCE'];
            $jog->duration = $line['DURATION'];
            $jog->startTime = $line['STARTTIME'];
            array_push($jogs, $jog);
        }

        $sql4 = "select STAGE, STARTTIME from SleepStage".$condition;
        $stmt4 = $this->pdo->prepare($sql4);
        $stmt4->execute();
        $result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        $stageTypes = array();
        $stageTimes = array();
        foreach ($result4 as $line) {
            array_push($stageTimes, $line['STARTTIME']);
            array_push($stageTypes, $line['STAGE']);
        }
        $sleep->stageTypes = $stageTypes;
        $sleep->stageTimes = $stageTimes;

        $data = new HealthData();
        $data->sleep = $sleep;
        $data->jogs = $jogs;
        $data->walks = $walks;
        $data->userid = $userid;
        $data->date = $date;


        //$this->pdo->commit();

        return $data;
    }

    public function getAllSleepTimes($userid){
        $sql = 'select SLEEPSTART, SLEEPEND from HealthData where UID=:userid ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":userid"=>$userid));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function rollBack(){
        $this->pdo->rollBack();
    }
}
