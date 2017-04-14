<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/29
 * Time: 21:26
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/userbl/UserInfoFetcherPHP.php5';
$userid = '';
$standalone = false;
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
}else if(isset($_COOKIE['userid'])){
    $userid = $_COOKIE['userid'];
}

if(isset($_GET['standalone'])){
    $standalone = $_GET['standalone'];
}

//$imgPath = "http://localhost:63342/Pheal/photo/".$userid.'.jpeg';
$imgPath = getPhotoPath($userid);
if($userid != ''){
    include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/userbl/UserInfoFetcherPHP.php5';
    $userinfo = getPersonalInfo($userid);

    $privilegeDes = '';
    if($userinfo['PRIVILEGE'] == '医生'){
        $privilegeDes = '&nbsp;&nbsp;<span class="label label-success">医生</span>';
    }else if($userinfo['PRIVILEGE'] == '教练'){
        $privilegeDes = '&nbsp;&nbsp;<span class="label label-primary">教练</span>';
    }else{
        $privilegeDes = '&nbsp;&nbsp;<span class="label label-default">普通用户</span>';
    }

    $birthday = $userinfo['BIRTHDAY'];
    $age = '';
    if(count(explode('-', $birthday))==3){
        $by = explode('-',$birthday)[0];
        $bm = explode('-',$birthday)[1];
        $bd = explode('-',$birthday)[2];
        $age = date('Y') - $by;
        if(date('m')<$bm){
            $age--;
        }else if(date('m')==$bm && date('d')<$bd){
            $age--;
        }
    }else{

    }

}


function makeForm(){
    echo '
    <form action="http://localhost:63342/Pheal/businesslogic/userbl/UploadPhotoPHP.php5" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="photo" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-primary" type="submit">上传</button>
                </div>
            </div>
            <br />
        </form>
    ';
}

function makeSocial(){
    echo '

        <button class="btn btn-default btn-block social-btn">加朋友</button>
        <button class="btn btn-default btn-block social-btn" data-toggle="modal" data-target="#messageModal">打招呼</button>
    ';
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">

    <link href="http://localhost:63342/Pheal/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:63342/Pheal/presentation/PersonalIndex/home/HomeCSS.css" rel="stylesheet">
    <title><?php echo $userid?></title>
</head>

<body>
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="modal-title">Hi!&nbsp;<?php echo $userinfo['NAME'];?></h2>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="message-recipient" placeholder="接受者用户名" contenteditable="false" value="<?php echo $userid;?>">
                    </div>
                    <div class="form-group">
                        <label for="message-title" class="control-label">标题</label>
                        <input type="text" class="form-control" id="message-title" placeholder="主题" value="来自 <?php echo $_COOKIE['userid'];?> 的问候">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">留言</label>
                        <textarea class="form-control" id="message-content" placeholder="说点什么..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="sendMessage()">发送</button>
            </div>
        </div>
    </div>
</div>
<!--<div class="container">-->

<div class="row" >
    <div class="col-lg-6">
        <img src="<?php echo $imgPath;?>" class="img-block" width="250" height="250" alt="还没有头像">
        <?php
        if($standalone){
            makeSocial();
        }else{
            makeForm();
        }
        ?>
    </div>
    <div class="col-lg-6">
        <h1><?php echo $userinfo['NAME'], $privilegeDes;?></h1>
        <label><?php echo $userid;?></label>
        <br />
        <h3>城市：<?php echo $userinfo['LOCATION'];?></h3>
        <h3>性别：<?php echo $userinfo['SEX'];?></h3>
        <h3>年龄：<?php echo $age;?>&nbsp;岁</h3>
        <h3>邮箱：<?php echo $userinfo['EMAIL'];?></h3>
        <p><?php echo $userinfo['PROFILE']?></p>

    </div>

</div>

<!--</div>-->

<script src="http://localhost:63342/Pheal/jquery-2.1.4.min.js"></script>
<script src="http://localhost:63342/Pheal/bootstrap.min.js"></script>
<script src="http://localhost:63342/Pheal/presentation/PersonalIndex/home/HomeJS.js"></script>
</body>

</html>
