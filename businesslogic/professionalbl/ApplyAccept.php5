<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 9:29
 */
include_once $_SERVER['DOCUMENT_ROOT']."/DataManager/ServiceDataManager.php";
include_once $_SERVER['DOCUMENT_ROOT']."/DataManager/MessageDataManager.php";
header("Content-Type:text/plain");
$applier = $_POST['applierid'];
$professiaonal = $_POST['proid'];
$msgid = $_POST['msgid'];

$serviceMng = new ServiceDataManager();
$serviceMng->createServiceRelation($applier, $professiaonal);

$messageMng = new MessageDataManager();
$messageMng->delect($msgid);