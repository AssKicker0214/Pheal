<?php

include($_SERVER['DOCUMENT_ROOT'].'/DataManager/HealthDataManager.php5');
$date = date('Y-m-d');
if(isset($_POST['date'])){
    $date = $_POST['date'];
}
$dataObj = getDataObj($_COOKIE['userid'], $_POST['date']);
$avgSleepTime = getAvgSleepTime();
$dataJso = wrapData($dataObj, $avgSleepTime);
echo $dataJso;

//echo getAvgSleepTime();

function getDataObj($userid, $date){

    $dataMng = new HealthDataManager();
    $dataObj = $dataMng->getData($_COOKIE['userid'], $_POST['date']);
    return $dataObj;
}
function wrapData($obj, $avgSleepTime){
    $data = array();
    $data['walks'] = $obj->walks;
    $data['jogs'] = $obj->jogs;
    $data['sleep'] = array('startTime'=>$obj->sleep->startTime, 'endTime'=>$obj->sleep->endTime, 'avgTime'=>$avgSleepTime);
    $data['sleepStageTimes'] = $obj->sleep->stageTimes;
    $data['sleepStageTypes'] = $obj->sleep->stageTypes;
    return json_encode($data);
}

function getAvgSleepTime(){
    $dataMng = new HealthDataManager();
    $result = $dataMng->getAllSleepTimes($_COOKIE['userid']);
    $total = 0.0;
    $amount = 0;
    foreach($result as $pair){
        $total += countLast($pair['SLEEPSTART'], $pair['SLEEPEND']);
        $amount++;
    }
    return ($total)/($amount);
}

function countLast($start, $end){
    $startH = floatval(explode(':', $start)[0]);
    $startM = floatval(explode(':', $start)[1]);
    $endH = floatval(explode(':', $end)[0]);
    $endM = floatval(explode(':', $end)[1]);
    $last = 0.0;
    if($startH > $endH){//隔天了
        $last = 60*(24-$startH)-$startM + 60*($endH)+$endM;
    }else if($startH < $endH){
        $last = ($endH - $startH) *60-$startM+$endM;
    }else if($startH == $endH){
        $last = $endM - $startM;
    }

    return ($last)/60;
}