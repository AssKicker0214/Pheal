<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 8:57
 */
$userid = $_COOKIE['userid'];
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
}
?>

<ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="#my-client" role="tab" data-toggle="tab">我的客户</a></li>
    <li role="presentation"><a href="#application-message" role="tab" data-toggle="tab">申请</a></li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane" id="my-client">
        我的客户
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . "/businesslogic/professionalbl/ProfessionalFetcher.php5");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/businesslogic/userbl/UserInfoFetcherPHP.php5");
        require_once($_SERVER['DOCUMENT_ROOT'] ."/presentation/tool/Builder.php5");
        $clients = getMyClientInfo($userid);
        echo '<ol class="list-group client-list">';
        foreach ($clients as $client) {
            $id = $client['ID'];
            $imgPath = getPhotoPath($id);
            echo '
            <li class="list-group-item">
            <img width="30" height="30" src="'.$imgPath.'">
            <a  target="_blank"
                    href="http://localhost:63342/Pheal/presentation/PersonalIndex/home/HomePHP.php5/?standalone=true&userid='.$id.'">
                '.$client["ID"].'
            </a>
            <button class="btn btn-danger at-right" onclick="dismiss(this)" value="'.$userid.'-'.$id.'">解除</button>
            </li>';
        }
        echo '</ol>'
        ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="application-message">
        申请者
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . "/businesslogic/professionalbl/ProfessionalFetcher.php5");
        require_once($_SERVER['DOCUMENT_ROOT'] ."/presentation/tool/Builder.php5");
        $applications = getApplication($userid);
        foreach ($applications as $apply) {
            $tile = new ApplyTile('apply',$apply['SENDER'], $apply['RECIPIENT'], $apply['CONTENT'],
                $apply['TIME'], $apply['STATUS'], $apply['TITLE'], $apply['MSGID']);
            $tile->makeTile();
        }
        ?>


    </div>
</div>
