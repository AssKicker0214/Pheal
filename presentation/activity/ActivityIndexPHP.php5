<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/3
 * Time: 16:33
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/presentation/tool/Builder.php5';
include_once "../tool/Builder.php5";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../bootstrap.min.css" rel="stylesheet">
    <link href="ActivityCSS.css" rel="stylesheet">
    <title></title>
</head>
<body>
<?php
buildNavBar('activity')
?>

<div class="row">
    <ul class="nav nav-tabs nav-stacked col-lg-2" role="tablist">
        <li role="presentation"><a role="button" onclick="getActivityList(this.text)">全部活动</a></li>
        <li role="presentation"><a role="button" onclick="getActivityList(this.text)">即将开始</a></li>
        <li role="presentation"><a role="button" onclick="getActivityList(this.text)">正在进行</a></li>
        <li role="presentation"><a role="button" onclick="getActivityList(this.text)">已经结束</a></li>
    </ul>

    <div class="col-sm-10">
        <h1 id="activity-type"></h1>
        <hr />
        <div id="activity-list" class="list-group">

        </div>
    </div>
</div>

<script src="http://localhost:63342/Pheal/jquery-2.1.4.min.js"></script>
<script src="ActivityJS.js"></script>
</body>
</html>
