<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../bootstrap.min.css" rel="stylesheet">
    <link href="AdminCSS.css" rel="stylesheet">
    <title></title>
</head>
<body>

<div class="row">
    <div class="col-lg-6">
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/activitybl/ActivityFetcher.php5';
        include_once $_SERVER['DOCUMENT_ROOT'].'/presentation/tool/Builder.php5';
        $activities = getActivityList();
        foreach($activities as $a){
            $participantList = getParticipantList($a['ACTVTID']);
            $tile = new ActivityTile($a['ACTVTID'], $a['TITLE'], $a['DESCRIPTION'], $participantList, $a['STARTTIME'], $a['ENDTIME']);
            $tile->makeTile(null);
        }
        ?>
    </div>
    <div class="col-lg-6">
        <form method="post" id="activity-publish-form" action="http://localhost:63342/Pheal/businesslogic/activitybl/ActivityPublisher.php5">
            <h2 id="activity-option">发布新活动</h2>
            <div class="form-group">
                <label for="activity-title">活动标题</label>
                <input type="text" id="activity-title" name="activity-title" class="form-control">
            </div>

            <div class="form-group-sm">
                <label for="activity-start-time">活动开始时间</label>
                <input type="date" id="activity-start-time" onclick="WdatePicker()" name="activity-start-time" class="form-control">
            </div>

            <div class="form-group-sm">
                <label for="activity-end-time">活动结束时间</label>
                <input type="date" id="activity-end-time" onclick="WdatePicker()" name="activity-end-time" class="form-control">
            </div>

            <div class="form-group">
                <label for="activity-description">活动描述</label>
                <textarea id="activity-description" name="activity-description" class="form-control"></textarea>
            </div>

            <button type="submit" id="activity-publish-btn" class="btn btn-primary">发布</button>
            <button type="reset" class="btn btn-default">清空</button>
        </form>
    </div>
</div>

<script src="http://localhost:63342/Pheal/jquery-2.1.4.min.js"></script>
<script src="http://localhost:63342/Pheal/bootstrap.min.js"></script>
<script src="AdminJS.js"></script>
<script src="../PersonalIndex/calendar/WdatePicker.js"></script>
</body>
</html>