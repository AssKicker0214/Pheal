<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/10/23 0023
 * Time: 14:19
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/businesslogic/tool.php5';
function build(){
    echo "i'm builder";
}


function buildNavBar($active){
    $meActive = '';
    $friendsActive = '';
    $professionalActive = '';
    $activityActive = '';
    $activeStmt = 'class="active"';
    if($active == 'me'){
        $meActive = $activeStmt;
    }
    switch($active){
        case 'me': $meActive=$activeStmt;break;
        case 'friends': $friendsActive = $activeStmt;break;
        case 'activity': $activityActive = $activeStmt;break;
        case 'professional':$professionalActive=$activeStmt;break;
    }
    echo '
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pheal</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li ',$meActive, '><a href="http://localhost:63342/Pheal/presentation/PersonalIndex/PersonalIndexPHP.php5">我<span class="sr-only">(current)</span></a></li>
                <li ',$friendsActive,'><a href="#">朋友</a></li>
                <li ',$activityActive, '><a href="http://localhost:63342/Pheal/presentation/activity/ActivityIndexPHP.php5">活动</a> </li>
                <li ',$professionalActive, 'class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">健康顾问 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://localhost:63342/Pheal/presentation/ProfessionalIndex/Doctor.php5">医生</a></li>
                        <li><a href="http://localhost:63342/Pheal/presentation/ProfessionalIndex/Coach.php5">教练</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">',$_COOKIE["userid"], '<span class="caret"></span></a>
                    <ul class= "dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="http://localhost:63342/Pheal/presentation/Index/LoginPage.html" class="btn btn-block btn-danger">注销</a> </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>';

}

class MessageTile
{
    protected $sender;
    protected $recipient;
    protected $content;
    protected $time;
    protected $status;
    protected $title;
    protected $msgid;
    protected $flag;

    public function __construct($flag,$sender, $recipient, $content, $time, $status, $title, $msgid)
    {   $this->flag = $flag;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->content = $content;
        $this->time = $time;
        $this->status = $status;
        $this->title = $title;
        $this->msgid = $msgid;
    }

    public function count(){
        echo $this->msgid,'<br />';
    }

    public function makeTile2(){
        $replyBtn = '<button class="btn btn-primary" data-toggle="modal" data-target="#quickReplyModal">回复</button>';
        if($this->sender == $_COOKIE['userid']){
            $replyBtn = '';
        }

        $color = '';
        if($this->sender == 'system'){
            $color = ' list-group-item-danger';
            $replyBtn = '';
        }
        echo '

            <div class="list-group-item'.$color.'">
            <div class="row">
                <div class="col-sm-10">
                    <h4><a href="#'.$this->msgid.$this->flag.'-collapse" data-toggle="collapse">'.$this->title.'</a></h4>
                    <label>发信人：</label><span>'.$this->sender.'</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>时间：</label><span>'.$this->time.'</span>
                </div>
                <div class="col-sm-2">
                    '.$replyBtn.'
                </div>
            </div>

                <div class="collapse" id="'.$this->msgid.$this->flag.'-collapse">
                    <div class="well">
                    '.$this->content.'
                    </div>
                </div>
            </div>

        ';
    }

    public function makeTile()
    {
        $linkID = $this->msgid;
        $flag_ = $this->flag.'-';
        $visibility = "visible";
        if($this->status == '已读'){
            $visibility = "hidden";
        }

        $btnVisibility = "visible";
        if($this->sender == $_COOKIE['userid'] || $this->sender == 'system'){//发送的消息、系统消息,不能回复
            $btnVisibility = "hidden";
            $visibility="hidden";
        }

        $color = '';
        if($this->sender == 'system'){
            $color = ' list-group-item-danger';
        }

        echo '
        <div id="'.$flag_.$this->msgid.'_tile'.'" class="list-group-item'.$color.' well-sm">
            <div class="row">
                <div class="col-sm-10">
                    <a href="#'.$flag_.$linkID.'" class="message-title" id="'.$flag_.$this->msgid.'_title'.'" data-toggle="collapse" onClick="changeStatusToRead(this.id)" >
                        <h3 class="list-group-item-heading">
                            ' . $this->title .
                            '<span style="font-size: 12px;visibility: '.$visibility.'" id="'.$flag_.$this->msgid.'_status'.'" class="label label-primary">' .$this->status, '</span>
                        </h3>
                    </a>
                    <label>发信人：</label><span>'.$this->sender.'</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>时间：</label><span>'.$this->time.'</span>
                </div>
                <div class="col-sm-2">
                    <button style="visibility:'.$btnVisibility.'" onclick="updateModal(this.value)" value="'.$this->sender.';'.$this->title.'" class="btn btn-primary" data-toggle="modal" data-target="#quickReplyModal" data-recipient="'.$this->sender.'">回复</button>
                </div>

            </div>
            <div class="collapse" id="'.$flag_.$linkID.'">
                <div class="well">
                '.$this->content.'
                </div>
            </div>

        </div>
               ';
    }
}

class ApplyTile extends MessageTile{
    public function makeTile()
    {
        $linkID = $this->msgid;
        $flag_ = $this->flag.'-';
        $visibility = "visible";
        if($this->status == '已处理'){
            $visibility = "hidden";
        }

        echo '
        <div id="'.$flag_.$this->msgid.'_tile'.'" class="list-group-item well-sm">
            <div class="row">
                <div class="col-sm-10">
                    <a href="#'.$flag_.$linkID.'" class="message-title" id="'.$flag_.$this->msgid.'_title'.'" data-toggle="collapse" onClick="changeStatusToRead(this.id)" >
                        <h3 class="list-group-item-heading">
                            ' . $this->title .
            '<span style="font-size: 12px;visibility: '.$visibility.'" id="'.$flag_.$this->msgid.'_status'.'" class="label label-primary">' .$this->status, '</span>
                        </h3>
                    </a>
                    <label>申请者：</label><span>'.$this->sender.'</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>时间：</label><span>'.$this->time.'</span>
                </div>
                <div class="col-sm-2">
                    <button onclick="accept(this)" value="'.$this->msgid.'-'.$this->sender.'-'.$this->recipient.'" class="btn btn-success">同意</button>
                    <button onclick="deny(this)" value="'.$this->msgid.'-'.$this->sender.'-'.$this->recipient.'" class="btn btn-danger">拒绝</button>
                </div>

            </div>
            <div class="collapse" id="'.$flag_.$linkID.'">
                <div class="well">
                '.$this->content.'
                </div>
            </div>

        </div>
               ';
    }
}

class ActivityTile{
    private $id;
    private $title;
    private $description;
    private $participantIDList;
    private $startTime;
    private $endTime;

    function __construct($id, $title, $description, $pidList, $startTime, $endTime){
        $this->endTime = $endTime;
        $this->description = $description;
        $this->participantIDList = $pidList;
        $this->id = $id;
        $this->title = $title;
        $this->startTime = $startTime;
    }

    function makeTile($userid){

        $participantCount = count($this->participantIDList);
        $userIn = false;
        $btn = '';

        $isEnd = false;
        $onGoing = false;
        if(compareDate(date('Y-m-d'), $this->endTime) > 0){
            $isEnd = true;
        }else if(compareDate(date('Y-m-d'), $this->startTime) > 0){
            $onGoing = true;
        }else{

        }

        $listItemStyle = '';
        $btnAvailable = '';
        if($isEnd){
            $btnAvailable = ' disabled = "disabled"';
            $listItemStyle = 'list-group-item-danger';
        }else if($onGoing){
            $listItemStyle = 'list-group-item-success';
        }

        if($userid == null){
            //管理员视角
            $btn = '<button'.$btnAvailable.' onClick="editActivity(this)" class="btn btn-sm btn-block btn-primary" value="'.$this->id.'">修改</button>';
        }else{
            foreach($this->participantIDList as $participant){
                if($userid == $participant['PARTICIPANTID']){
                    $userIn =true;
                    break;
                }
            }
            if($userIn){
                $btn = '<button'.$btnAvailable.' onClick="quitActivity(this)" value="'.$this->id.';'.$_COOKIE['userid'].'" class="btn btn-sm btn-block btn-danger">退出</button>';
            }else{
                $btn = '<button'.$btnAvailable.' onClick="applyActivity(this)" value="'.$this->id.';'.$_COOKIE['userid'].'" class="btn btn-sm btn-block btn-success">参加</button>';
            }
        }
        echo '
        <div class="list-group-item '.$listItemStyle.'">
            <div class="row">
                <div class="col-sm-10">
                    <h4><a href="#activity-'.$this->id.'-collapse" id="activity-'.$this->id.'-title" data-toggle="collapse">'.$this->title.'</a></h4>
                    <label>活动开始日期：</label><span id="activity-'.$this->id.'-startTime">'.$this->startTime.'</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>活动结束日期：</label><span id="activity-'.$this->id.'-endTime">'.$this->endTime.'</span>
                </div>
                <div class="col-sm-2">
                    '.$btn.'
                    <a class="btn btn-sm btn-block btn-default" target="_blank" href="http://localhost:63342/Pheal/presentation/activity/ActivityDetail.php5/?actvtid='.$this->id.'">详细</a>
                </div>
            </div>

                <div class="collapse" id="activity-'.$this->id.'-collapse">
                    <div class="" id="activity-'.$this->id.'-description">
        '.$this->description.'
                    </div>
                </div>
            </div>
        ';
    }
}

?>