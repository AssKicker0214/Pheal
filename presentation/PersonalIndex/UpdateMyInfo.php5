<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/10/28 0028
 * Time: 21:52
 */
include("../../DataManager/PDO.php");
header("Content-Type:text/plain");
$name = $_POST['name'];
$sex = $_POST['sex'];
$birthday = $_POST['birthday'];
$privilege = $_POST['privilege'];
$profile = $_POST['profile'];
$email = $_POST['email'];
$location = $_POST['location'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$pdo = PDOManager::getPDO();

$sql = "Update PersonalInfo Set SEX = :sex, NAME = :name, BIRTHDAY = :birthday,
            PRIVILEGE = :privilege, PROFILE=:profile, LOCATION=:location, EMAIL=:email
             , HEIGHT = :height, WEIGHT = :weight where ID = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(":sex"=>$sex, ":name"=>$name, ":birthday"=>$birthday,
    ":privilege"=>$privilege, ":profile"=>$profile,
    ":id"=>$_COOKIE['userid'],":email"=>$email, ":height"=>$height,
    ":weight"=>$weight, ":location"=>$location));
if($stmt->rowCount()>0){
    echo 'true';
}else{
    echo 'false';
}