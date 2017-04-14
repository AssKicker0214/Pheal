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
include("../../DataManager/PDO.php");
try{
    $pdo = new PDO("sqlite:../../test2.db3");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch(PDOException $e){
    die("失败".$e->getMessage());
}

$id = $_POST['id'];
$password = $_POST['password'];

$pdo->beginTransaction();
$sql = 'Insert Into LoginInfo VALUES (?,?,?)';
$stmt = $pdo->prepare($sql);
$stmt->execute(array($id, $password, ''));

$sql2 = "Insert Into PersonalInfo(ID, REGISTERDATE) VALUES (?,?)";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute(array($id, date("Y-m-d")));
$pdo->commit();

echo "成功<br><a href='../../presentation/Index/LoginPage.html'>return</a> "
?>


</body>
</html>