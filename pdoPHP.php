<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/9/27 0027
 * Time: 13:18
 */


//try{
//    $pdo = new PDO("mysql:host=localhost;dbname=hyerp", "root", "");
//}catch(PDOException $e){
//
//}
//
//print_r($pdo);

try{
    $pdo = new PDO("sqlite:test2.db3");

}catch (PDOException $e){

}

//$sql = "insert into logininfo(ID, PASSWORD) VALUES (?,?)";
//$stmt = $pdo->prepare($sql);
//
//$stmt->bindValue(1, 555);
//$stmt->bindValue(2, 'passwordlalal');
//
//$stmt->execute();
//echo $stmt->rowCount();


//$sql = "select * from logininfo";
//$stmt =$pdo->prepare($sql);
//$stmt->execute();
//foreach($stmt as $row){
//    echo $row['ID']."          ".$row['PASSWORD'];
//}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{
    //开启事务
    $pdo->beginTransaction();
    $sql = "insert into LoginInfo(ID, PASSWORD) values (?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(11112, 'aaaa'));
    $stmt->execute(array(2222,'bbbb'));
    $pdo->commit();
}catch (PDOException $e){
    die("failed".$e->getMessage());
}