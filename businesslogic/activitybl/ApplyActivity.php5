<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/2
 * Time: 17:28
 */
$actvtid = $_POST['actvtid'];
$userid = $_COOKIE['userid'];

include_once $_SERVER['DOCUMENT_ROOT'].'/DataManager/ActivityDataManager.php';
$mng = new ActivityDataManager();
$result = $mng->participateActivity($actvtid, $userid);
if($result){
    echo '已加入';
}