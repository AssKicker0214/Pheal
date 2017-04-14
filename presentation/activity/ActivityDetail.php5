<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/activitybl/ActivityFetcher.php5';
include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/userbl/UserInfoFetcherPHP.php5';
$actvtid = $_GET['actvtid'];
$details = getActivityDetail($actvtid);
$participantCount = getParticipantCount($actvtid);
$participantIDList = getParticipantList($actvtid);
$userid = $_COOKIE['userid'];
$alreadyIn = false;
foreach ($participantIDList as $p) {
    if($p['PARTICIPANTID'] == $userid){
        $alreadyIn = true;
        break;
    }
}

//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="http://localhost:63342/Pheal/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:63342/Pheal/presentation/activity/ActivityCSS.css" rel="stylesheet">
    <title><?php echo $actvtid;?></title>
</head>
<body>
<div class="container" id="head">
    <div class="row">
        <div class="col-lg-8 activity-main-part">
            <br />
            <h1><?php echo $details['TITLE'];?></h1>
            <p><?php echo $details['DESCRIPTION'];?></p>
<!--            &nbsp;&nbsp;&nbsp;&nbsp;-->
        </div>
        <div class="col-lg-4">
            <br />
            <br />
            <br />

            <label>活动开始日期：<?php echo $details['STARTTIME'];?></label>
            <br />
            <label>活动结束日期：<?php echo $details['ENDTIME'];?></label>
            <br />
            <br />
            <label>参加人数：<span id="participant-count"><?php echo $participantCount;?></span></label>
            <br />
            <br />
            <?php
            if($alreadyIn){
                echo '
                <button id="quit-btn" onclick="quitActivity(this)" value="'.$actvtid.';'.$userid.'" class="btn btn-danger btn-lg">退出活动</button>
                ';
            }else{
                echo '
                <button id="apply-now-btn" onclick="applyActivity(this)" value="'.$actvtid.';'.$userid.'" class="btn btn-success btn-lg">立刻参加</button>
                ';
            }
            ?>
        </div>
    </div>
</div>

<hr />

    <table class="table table-hover participant-list table-condensed table-responsive">
        <tr><th></th><th>用户名</th><th>姓名</th></tr>
    <?php
    foreach($participantIDList as $item){
        $userInfos = getPersonalInfo($item['PARTICIPANTID']);
        $imgPath = getPhotoPath($item['PARTICIPANTID']);
        echo '<a href="ActivityCSS.css"> <tr role="a">',
        '<td><img src="'.$imgPath.'" width="45" height="45"/> </td>',
        '<td><a target="_blank" href="http://localhost:63342/Pheal/presentation/PersonalIndex/home/HomePHP.php5/?standalone=true&userid='.$userInfos['ID'].'">
             <h4>'.$userInfos['ID'].'</h4>
            </a></td>',
        '<td><h4>'.$userInfos['NAME'].'</h4></td>',
        '</tr></a>';




    }
    ?>
    </table>


<script src="http://localhost:63342/Pheal/jquery-2.1.4.min.js"></script>
<script src="http://localhost:63342/Pheal/presentation/activity/ActivityJS.js"></script>
</body>
</html>