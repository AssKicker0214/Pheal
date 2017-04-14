<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/2
 * Time: 17:06
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/DataManager/ActivityDataManager.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/tool.php5';

function getActivityDetail($actvtid){
    $mng = new ActivityDataManager();
    $detailList = $mng->getActivityDetail($actvtid);
    return $detailList;
}

function getParticipantList($actvtid){
    $mng = new ActivityDataManager();
    $list = $mng->getParticipant($actvtid);
    return $list;
}

function getParticipantCount($actvtid){
    $mng = new ActivityDataManager();
    $list = $mng->getParticipant($actvtid);
    return count($list);
}

function getActivityList(){
    $mng = new ActivityDataManager();
    $list = $mng->getActivityList();
    return $list;
}

function getClassifiedList($type){
    $list = getActivityList();
    $planned = array();
    $onGoing = array();
    $end = array();
    foreach($list as $item){
        $startDate = $item['STARTTIME'];
        $endDate = $item['ENDTIME'];
        $currentDate = date('Y-m-d');
        if(compareDate($currentDate, $startDate)<0){
            array_push($planned, $item);
            continue;
        }

        if(compareDate($currentDate, $endDate)<=0){
            array_push($onGoing, $item);
            continue;
        }

        array_push($end, $item);
    }

    switch($type){
        case '全部' : return $list;
        case '未开始': return $planned;
        case '进行中': return $onGoing;
        case '已结束': return $end;
        default: return 'error';
    }
}
