<!DOCTYPE html>

<html>
<title>
    demo php
</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset="utf-8">
</head>

<body>
<?php
header("Content-Type: text/plain");
try{
    $pdo = new PDO("sqlite:test2.db3");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch(PDOException $e){
    die("失败".$e->getMessage());
}

$id = $_POST['id'];
$password = $_POST['password'];

$sql = "select PASSWORD from LoginInfo Where ID='".$id."'";
//echo $sql;
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$row = $result[0];
if($password != $row['PASSWORD']){
    echo "login failed<br><a href='LoginPage.html'>return</a> ";
}else{

}

//$sql = "select * from logininfo where PASSWORD=".$password;
//echo $sql;
//$stmt =$pdo->prepare($sql);
//$stmt->execute();
//foreach($stmt as $row){
//    echo $row['ID']."          ".$row['PASSWORD'];
//}


?>


</body>
</html>