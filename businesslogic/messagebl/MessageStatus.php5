<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/12
 * Time: 14:18
 */

$status = $_POST['newStatus'];
$msgid = $_POST['msgid'];

include_once("MessageBL.php5");
$messageDataManager = new MessageDataManager();
$messageDataManager->updateMessageStatus($msgid, $status);