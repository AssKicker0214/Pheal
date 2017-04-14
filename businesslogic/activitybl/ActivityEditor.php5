<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/3
 * Time: 15:25
 */
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$endTime = $_POST['end-time'];
$startTime = $_POST['start-time'];

include_once $_SERVER['DOCUMENT_ROOT'].'/DataManager/ActivityDataManager.php';
$mng = new ActivityDataManager();
$succeeded = $mng->updateActivityList($id, $title, $endTime, $startTime, $description);
if($succeeded){
    echo $succeeded;
}else{
    echo $succeeded;
}