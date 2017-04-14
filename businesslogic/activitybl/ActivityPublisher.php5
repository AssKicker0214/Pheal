<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/2
 * Time: 15:45
 */
$title = $_POST['activity-title'];
$endTime = $_POST['activity-end-time'];
$startTime = $_POST['activity-start-time'];
$description = $_POST['activity-description'];

include_once $_SERVER['DOCUMENT_ROOT']."/DataManager/ActivityDataManager.php";
$mng = new ActivityDataManager();
$actvtid = $mng->createActivity($title,$endTime,$startTime,$description,$_COOKIE['adminid']);
echo $actvtid;