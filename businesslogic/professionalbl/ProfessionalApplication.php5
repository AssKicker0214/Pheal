<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/5 0005
 * Time: 0:54
 */


include_once($_SERVER['DOCUMENT_ROOT']."/DataManager/MessageDataManager.php");
$senderID = $_COOKIE['userid'];
$recipientID = $_POST['recipient-id'];
$content = $_POST['content'];


class ProfessionalApplication{
    private $messageMng;
    function __construct(){
        $this->messageMng = new MessageDataManager();
    }

    //判断是否重复发送
    function isApplicationDuplicated($senderID, $recipientID){
        $duplicated = false;
        $list = $this->messageMng->getDirectedMessageList($senderID, $recipientID);
        foreach ($list as $message) {
            if($message['TYPE']==='申请服务'){
                if($message['STATUS'] != '失效'){
                    $duplicated = true;
                    break;
                }
            }
        }
        return $duplicated;
    }

    //创建申请消息
    function createApplication($content, $recipientID, $senderID){
        $result = $this->messageMng->createMessage("申请服务","向 ".$recipientID." 申请服务",$content,$recipientID,$senderID);
        return $result;
    }
}

$pa = new ProfessionalApplication();
$isDuplicated = $pa->isApplicationDuplicated($senderID, $recipientID);
if($isDuplicated == true){
    echo "申请失败，原因：上一次相同的申请还未被处理";
}else{
    $result = $pa->createApplication($content, $recipientID, $senderID);
    echo $result;
}