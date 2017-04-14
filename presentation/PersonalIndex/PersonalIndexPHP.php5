<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title></title>


    <link href="../../bootstrap.min.css" rel="stylesheet" media="screen">
    <!--    <link href="../tool/BuilderStylesheet.css" rel="stylesheet">-->
        <link href="PersonalIndexCSS.css" rel="stylesheet">
    <link href="health/HealthCSS.css" rel="stylesheet">
</head>
<body>

<?php

include("../tool/Builder.php5");
//include("../tool/NavBar.php5");
buildNavBar('me');
if(isset($_COOKIE['userid'])){

    $id = $_COOKIE['userid'];
    echo $id;
}else{
    header("Location:../Index/LoginPage.html");

    print_r($_COOKIE);
    echo 'non-accessable';
}
?>


<div class="row">
    <div class="col-lg-2">
        <ul id="personalIndexNav" class="nav  nav-stacked" style="position: fixed;left: 0px;top: 10%; width: inherit;">
            <li role="presentation"><a role="button" id="home" onclick="selectHome()" onmouseover="hover('home')" onmouseout="out('home')">
                    <span class="glyphicon glyphicon-home"></span> Home</a> </li>
            <li role="presentation"><a role="button" id="health" onclick="selectHealth()" onmouseover="hover('health')" onmouseout="out('health')">
                    <span class="glyphicon glyphicon-heart"></span> Health</a> </li>
            <li role="presentation"><a role="button" id="activity" onclick="selectActivity()" onmouseover="hover('activity')" onmouseout="out('activity')">
                    <span class="glyphicon glyphicon-bullhorn"></span> Activity</a> </li>
            <li role="presentation"><a role="button" id="message" onclick="selectMessage()" onmouseover="hover('message')" onmouseout="out('message')">
                    <span class="glyphicon glyphicon-envelope"></span> Message</a> </li>
            <li role="presentation"><a role="button" id="myinfo" onclick="selectMyinfo()" onmouseover="hover('myinfo')" onmouseout="out('myinfo')">
                    <span class="glyphicon glyphicon-user"></span> My Info</a> </li>
            <li role="presentation"><a role="button" id="myclient" onclick="selectMyclient()" onmouseover="hover('myclient')" onmouseout="out('myclient')">
                    <span class="glyphicon glyphicon-user"></span> My Client</a> </li>
            <li role="presentation"><a role="button" id="mypro" onclick="selectMypro()" onmouseover="hover('mypro')" onmouseout="out('mypro')">
                    <span class="glyphicon glyphicon-user"></span> My Pro</a> </li>
            <!--    <li role="presentation"><button id="btn1" class="btn btn-default btn-block navbtn" onclick="selectButton()">btn1</button> </li>-->
        </ul>
    </div>

    <div class="col-lg-10">

        <div id="content">

        </div>

    </div>
</div>

<script src="../../jquery-2.1.4.min.js"></script>
<script src="health/Chart.js"></script>
<script src="message/MessageJS.js"></script>
<script src="health/HealthJS.js"></script>
<script src="calendar/WdatePicker.js"></script>
<script src="PersonalIndexJS.js"></script>
<script src="../../bootstrap.min.js"></script>
<script src="myclient/MyClientJS.js"></script>
<script src="mypro/MyProJS.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>