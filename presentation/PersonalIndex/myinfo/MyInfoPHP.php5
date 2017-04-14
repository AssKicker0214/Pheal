<!--<!DOCTYPE html>-->
<!---->
<!--<html lang="zh-CN">-->
<!---->
<!---->
<!--</html>-->
<?php
include($_SERVER['DOCUMENT_ROOT']."/DataManager/PDO.php");
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/10/26 0026
 * Time: 15:35
 */
header('Content-Type: text/html');
$userid = $_COOKIE['userid'];
$pdo = PDOManager::getPDO();
$sql = "select * from PersonalInfo WHERE ID = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(":id"=>$userid));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$name = $result['NAME'];
$sex = $result['SEX'];
$birthdaty = $result['BIRTHDAY'];
$privilege = $result['PRIVILEGE'];
$profile = $result['PROFILE'];
$location = $result['LOCATION'];
$email = $result['EMAIL'];
$weight = $result['WEIGHT'];
$height = $result['HEIGHT'];

?>

<div id="myinfodiv" class="container content">
    <div class="page-header">
        <h1 style="font-family: '微软雅黑'">个人信息</h1>
    </div>

    <div class="content">
        <form class="form-horizontal" method="post" action="" id="my-info-form">
<!--            name-->
            <

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name ?>">
                </div>
            </div>

<!--            sex-->
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-1 container">
                    <input id="male" style="width: 30px; height: 30px; margin-right: 1px" type="radio" name="sex_radio"<?php if($sex === '男'){echo "checked";}?> class="form-control form-group-sm" value="男">

                </div>
                <label style="position: relative; left: -50px;; padding-top: 5px; font-size: 16px; height: 30px;" for="male" class="col-sm-1 container">
                    男
                </label>
                <div class="col-sm-1">
                    <input id="female" style="width: 30px; height: 30px; margin-right: 1px" <?php if($sex === '女'){echo "checked";}?> type="radio" name="sex_radio" class="form-control" value="女">

                </div>
                <label style="position: relative; left: -50px;; padding-top: 5px; font-size: 16px; height: 30px;" for="female" class="col-sm-1 container">
                    女
                </label>
            </div>

<!--            birthday-->
            <div class="form-group">
                <label for="birthday" class="col-sm-2 control-label">生日</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" value="<?php echo $birthdaty ?>" id="birthday">
                </div>
            </div>

            <div class="form-group">
                <label for="height" class="col-sm-2 control-label">身高</label>
                <div class="col-sm-4 input-group">
                    <input type="number" class="form-control" value="<?php echo $height ?>" id="height">
                    <span class="input-group-addon">cm</span>
                </div>
            </div>

<!--            weight-->
            <div class="form-group">
                <label for="weight" class="col-sm-2 control-label">体重</label>
                <div class="col-sm-4 input-group">
                    <input type="number" class="form-control" value="<?php echo $weight ?>" id="weight">
                    <span class="input-group-addon">kg</span>
                </div>
            </div>

<!--            city-->
            <div class="form-group">
                <label for="location" class="col-sm-2 control-label">城市</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $location ?>" id="location">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">e-mail</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" value="<?php echo $email ?>" id="email">
                </div>
            </div>

<!--            privilege-->
            <div class="form-group">
                <label class="col-sm-2 control-label">身份</label>

                <div class="col-sm-1">
                    <input id="doctor" style="width: 30px; height: 30px; margin-right: 1px" <?php if($privilege=='医生')echo 'checked';?> type="radio" name="privilege_radio" class="form-control" value="医生">
                </div>
                <label style="position: relative; left: -50px;; padding-top: 5px; font-size: 16px; height: 30px;" for="doctor" class="col-sm-1 container">
                    医生
                </label>

                <div class="col-sm-1">
                    <input id="coach" style="width: 30px; height: 30px; margin-right: 1px" <?php if($privilege=='教练')echo 'checked';?> type="radio" name="privilege_radio" class="form-control" value="教练">
                </div>
                <label style="position: relative; left: -50px;; padding-top: 5px; font-size: 16px; height: 30px;" for="coach" class="col-sm-1 container">
                    教练
                </label>

                <div class="col-sm-1 container">
                    <input id="regular" style="width: 30px; height: 30px; margin-right: 1px" <?php if($privilege=='普通用户')echo 'checked';?> type="radio" name="privilege_radio" class="form-control form-group-sm" value="普通用户">
                </div>
                <label style="position: relative; left: -50px;; padding-top: 5px; font-size: 16px; height: 30px;" for="regular" class="col-sm-2 container">
                    普通用户
                </label>
            </div>

<!--                profile-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="profile">个人说明</label>
                <div class="col-sm-4">
                    <textarea form="my-info-form" id="profile" name="profile" class="form-control" style="min-width: 450px;"><?php echo $profile?></textarea>
                </div>
            </div>


                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="button" onclick="save()">保存</button>
                </div>

        </form>
    </div>

</div>


<script src="../../../jquery-2.1.4.min.js"></script>