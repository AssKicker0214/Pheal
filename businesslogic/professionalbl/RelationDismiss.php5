<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 11:16
 */

include_once $_SERVER['DOCUMENT_ROOT']."/DataManager/ServiceDataManager.php";
header("Content-Type:text/plain");
$cusid = $_POST['cusid'];
$proid = $_POST['proid'];

$serviceMng = new ServiceDataManager();
$serviceMng->dissmissRelation($proid, $cusid);
