<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/10/21 0021
 * Time: 14:46
 */
include("../../DataManager/PDO.php");
include("../../DataManager/UserDataManager.php");
//header("Content-Type: text/plain");
//print_r($_POST);

$id = $_POST['id'];
$password = $_POST['password'];
//try{
////    $pdo = new pdo("sqlite:../test2.db3");
//    $pdo = PDOManager::getPDO();
//}catch(PDOException $e) {
//    die("pdo initialise failed");
//}
//
//$sql = "select PASSWORD from LoginInfo WHERE ID = :id";
//$stmt = $pdo->prepare($sql);
//$stmt->execute(array(":id"=>$id));
//$result = $stmt->fetch(PDO::FETCH_ASSOC);

//echo "correct password: ".$result['PASSWORD'];
$userDataManager = new UserDataManager();
$truePassword = $userDataManager->getPassword($id);
if($password == $truePassword){
    setcookie('userid', $id, time()+3600*24, "/");
    echo 'succeeded';
}else{
    echo 'login failed',$truePassword;
}