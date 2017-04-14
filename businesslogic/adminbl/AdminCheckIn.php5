<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/2
 * Time: 14:38
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/DataManager/AdminDataManager.php';
$aid = $_POST['aid'];
$password = $_POST['password'];

$mng = new AdminDataManager();
$result = $mng->checkIn($aid, $password);

if($result == true){
    setcookie('adminid', $aid, time()+3600*24, "/");
    setcookie('userid');
    header("Location:http://localhost:63342/Pheal/presentation/admin/ActivityPublish.php5");
}else{
    echo '<script>alert("id或密码错误")</script>';
    header("Location:http://localhost:63342/Pheal/presentation/admin/AdminLogin.html");
}