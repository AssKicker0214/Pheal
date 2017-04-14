<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/6 0006
 * Time: 0:09
 */
include_once($_SERVER['DOCUMENT_ROOT'] . "/DataManager/MessageDataManager.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/presentation/tool/Builder.php5");
$class = $_GET['classification'];
$userid = $_COOKIE['userid'];
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
}
$msgList = null;
if($class == '全部消息'){
    $msgList = getAllMessages($userid);
}else if($class == '接收的消息'){
    $msgList = getReceivedMessages($userid);
}else if($class == '发送的消息'){
    $msgList = getSentMessages($userid);
}

foreach ($msgList as $message1) {

    $tile = new MessageTile('all',$message1['SENDER'], $message1['RECIPIENT'], $message1['CONTENT'],
        $message1['TIME'], $message1['STATUS'], $message1['TITLE'], $message1['MSGID']);
    $tile->makeTile2();
}

function getAllMessages($currentUser){
    $data = new MessageDataManager();
    $list = $data->getAllMessageList($currentUser);
    return $list;
}

function changeStatus($msgid, $newStatus){

}

function getReceivedMessages($currentUser){
    $data = new MessageDataManager();
    $list = $data->getReceivedMessageList($currentUser);
    return $list;
}

function getSentMessages($currentUser){
    $data = new MessageDataManager();
    $list = $data->getSentMessageList($currentUser);
    return $list;
}