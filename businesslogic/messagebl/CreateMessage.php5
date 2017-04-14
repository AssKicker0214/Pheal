<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/12
 * Time: 20:22
 */
header("Content-Type: application/x-www-form-urlencoded");
include_once($_SERVER['DOCUMENT_ROOT'] . "/DataManager/MessageDataManager.php");
$recipient = $_POST['recipient'];
$content = $_POST['content'];
$title = $_POST['title'];
$sender = $_COOKIE['userid'];
$messageManager = new MessageDataManager();
$messageManager->createMessage("普通",$title,$content,$recipient,$sender);
echo 'sent';

