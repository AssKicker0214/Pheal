<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/businesslogic/healthbl/HealthData.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/DataManager/HealthDataManager.php5";
$file = $_FILES['file'];
$type = gettype($file);

$storagePath = $_SERVER['DOCUMENT_ROOT'].'/xml/'.$_COOKIE['userid'].'_'.date("Y-m-d h-i-s").'_health.xml';
if(is_uploaded_file($file['tmp_name'])){
    if( move_uploaded_file($file['tmp_name'], $storagePath)){
        echo "上传成功";
    }
}

//$storagePath = "C:/Users/Ian/PhpstormProjects/bootstrap/xml/test2_2015-11-13 06-08-45_health.xml";
//$storagePath = "C:/Users/Ian/PhpstormProjects/bootstrap/xml/healtDemo.xml";
$reader = new XMLReader();
$reader->open($storagePath);

$dailyData = null;
while($reader->read()){
    if($reader->name == 'daily' && $reader->nodeType!=XMLReader::END_ELEMENT){
        $dailyData = new HealthData();
        $date = $reader->getAttribute('date');
        $dailyData->date = $date;
        $dailyData->userid = 'test';//$_COOKIE['userid'];
    }

    if($reader->name == 'walk'){//walk节点
        if($reader->nodeType!=XMLReader::END_ELEMENT){
            continue;
        }
        $walk = new Walk();
        $walk->startTime = $reader->getAttribute('start-time');
        $walk->distance = $reader->getAttribute('distance');
        $walk->duration = $reader->getAttribute('duration');
        $dailyData->addWalk($walk);
    }

    if($reader->name == 'jog'){//jog节点
        if($reader->nodeType!=XMLReader::END_ELEMENT){
            continue;
        }
        $jog = new Jog();
        $jog->startTime = $reader->getAttribute('start-time');
        $jog->distance = $reader->getAttribute('distance');
        $jog->duration = $reader->getAttribute('duration');
        $dailyData->addJog($jog);
    }

    if($reader->name == 'sleep'&& $reader->nodeType!=XMLReader::END_ELEMENT){
        $sleep = new Sleep();
        $sleep->startTime = $reader->getAttribute('start-time');
        $sleep->endTime = $reader->getAttribute('end-time');
        while($reader->read() && ($reader->name!='sleep')){
            if($reader->nodeType == XMLReader::END_ELEMENT || $reader->nodeType == XMLReader::TEXT){
                continue;
            }
            if($reader->name == 'first'){
                $sleep->addStage('first', $reader->readInnerXml());
                //echo "deep";
            }else if($reader->name == 'second'){
                $sleep->addStage('second', $reader->readInnerXml());
                //echo "light";
            }else if($reader->name == 'third'){
                $sleep->addStage('third', $reader->readInnerXml());
                //echo "light";
            }else if($reader->name == 'forth'){
                $sleep->addStage('forth', $reader->readInnerXml());
                //echo "light";
            }else if($reader->name == 'rem'){
                $sleep->addStage('rem', $reader->readInnerXml());
                //echo "light";
            }else{
            }
        }
        $dailyData->sleep = $sleep;
    }

}
$dataMng = new HealthDataManager();
$dataMng->insert($dailyData);
//$dataMng->rollBack();