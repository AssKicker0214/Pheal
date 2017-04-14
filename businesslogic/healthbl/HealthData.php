<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/16
 * Time: 16:10
 */
class HealthData
{
    public $date = "";
    public $userid = "";
    public $walks = array();
    public $jogs = array();
    public $sleep;

    public function __construct(){
        //$this->sleep = new Sleep();
}
    public function addSleepStage($stageType, $startTime){
        $this->sleep->addStage($stageType, $startTime);
    }

    public function addWalk($walk){
        array_push($this->walks, $walk);
    }

    public function addJog($jog){
        array_push($this->jogs, $jog);
    }

    public function getSleepStart(){
        return $this->sleep->startTime;
    }

    public function getSleepEnd(){
        return $this->sleep->endTime;
    }

    public function getSleepArray(){
        print_r($this->sleep);
    }

    public function toJSON(){
        $data = array();
        $data['walks'] = $this->walks;
        $data['jogs'] = $this->jogs;
        $data['sleep'] = array('startTime'=>$this->sleep->startTime, 'endTime'=>$this->sleep->endTime);
        $data['sleepStageTimes'] = $this->sleep->stageTimes;
        $data['sleepStageTypes'] = $this->sleep->stageTypes;
        return json_encode($data);
    }
}

class Walk{
    public $startTime = "";
    public $duration = 0;
    public $distance = 0;
    public function toString(){
        return "走路---开始时间：".$this->startTime." ，持续时间：".$this->duration." ，距离：".$this->distance;
    }
}

class Jog{
    public $startTime = "";
    public $duration = 0;
    public $distance = 0;
    public function toString(){
        return "慢跑---开始时间：".$this->startTime." ，持续时间：".$this->duration." ，距离：".$this->distance;
    }
}

class Sleep{
    public $stageTimes = array();
    public $stageTypes = array();
    public $startTime = "";
    public $endTime = "";

    public function addStage($stageType, $startTime){
        array_push($this->stageTimes, $startTime);
        array_push($this->stageTypes, $stageType);

    }
}

//$data = new HealthData();
//$data->addSleepStage("深度", "3:22");
//$data->getSleepArray();

