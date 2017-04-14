<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/3
 * Time: 19:14
 */
$type = $_GET['type'];//全部，未开始，进行中，已结束

include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/activitybl/ActivityFetcher.php5';
include_once $_SERVER['DOCUMENT_ROOT']."/presentation/tool/Builder.php5";
$list = getClassifiedList($type);
foreach($list as $item){
    $plist = getParticipantList($item['ACTVTID']);
    $tile = new ActivityTile($item['ACTVTID'], $item['TITLE'], $item['DESCRIPTION'], $plist, $item['STARTTIME'], $item['ENDTIME']);
    $tile->makeTile($_COOKIE['userid']);
}