<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 11:21
 */

include_once $_SERVER['DOCUMENT_ROOT']."/DataManager/MessageDataManager.php";
header("Content-Type:text/plain");
print_r($_POST);
$msgid = $_POST['msgid'];
$applier = $_POST['applierid'];
$pro = $_POST['proid'];

$messageMng = new MessageDataManager();
$result = $messageMng->delect($msgid);
if($result){
    $messageMng->createMessage("系统", "申请被拒绝", "向".$pro."的服务申请被拒绝", $applier, 'system');
}