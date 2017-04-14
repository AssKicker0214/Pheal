<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="../../bootstrap.min.css" rel="stylesheet">
    <link href="../tool/BuilderStylesheet.css" rel="stylesheet">
    <link href="ProfessionalCSS.css" rel="stylesheet">

    <script src="../../jquery-2.1.4.min.js"></script>
    <script src="../../bootstrap.min.js"></script>
    <script src="ProfessionalJS.js"></script>
    <title></title>
</head>
<body>
personal index<br>
userid:
<?php
require("../../tool/Builder.php5");
//$id = $_POST['userid'];
//echo $id;
if(isset($_COOKIE['userid'])){

    $id = $_COOKIE['userid'];
    echo $id;
}else{
    echo 'id missing';
    //header("Location:../LoginPage.html");
}

buildNavBar('');
?>

<div class="list-group" style="width: 50%">
    <?php
    include("../../DataManager/ProfessionalDataManager.php5");
    include("../../DataManager/IDSearcher.php");
    include("../tool/UserInfoTile.php");
    $mng = new ProfessionalDataManager();
    $list = $mng->getDoctorIdList();
    foreach ($list as $row) {
        $user = new IDSearcher($row['ID']);
        $attrs = $user->getPersonalInfo();
        $tile = new UserInfoTile($row['ID'],$attrs['NAME'],$attrs['PRIVILEGE'],$attrs['SEX'],$attrs['PROFILE']);
        $tile->makeTile();
    }


    ?>
</div>





<!-- Modal -->
<!--<div class="modal fade" id="sendApplyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--                <h4 class="modal-title" id="myModalLabel">Modal title</h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!---->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="modal fade" id="sendApplyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">申请服务</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">接受者(id):</label>
                        <input type="text" class="form-control" id="recipient-id" placeholder="接受者用户名">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">留言:</label>
                        <textarea class="form-control" id="message-text" placeholder="说点什么..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="apply()">申请</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>