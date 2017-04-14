<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 19:43
 */
include_once $_SERVER['DOCUMENT_ROOT']."/businesslogic/professionalbl/ProfessionalFetcher.php5";
include_once $_SERVER['DOCUMENT_ROOT']."/businesslogic/userbl/UserInfoFetcherPHP.php5";
$userid = $_COOKIE['userid'];
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
}

$type = '我的医生';
if(isset($_GET['type'])){
    $type = $_GET['type'];
}
$list = array();
if($type == '我的医生'){
    $list = getMyDoctorInfo($userid);
}else if($type == '我的教练'){
    $list = getMyCoachInfo($userid);
}else{
    echo 'error, not doctor or coach', $type;
}

echo '<ol class="list-group client-list">';
foreach ($list as $pro) {
    $id = $pro['ID'];
    $imgPath = getPhotoPath($id);
    echo '
            <li class="list-group-item">
            <img width="30" height="30" src="'.$imgPath.'">
            <a  target="_blank"
                    href="http://localhost:63342/Pheal/presentation/PersonalIndex/home/HomePHP.php5/?standalone=true&userid='.$id.'">
                '.$pro["ID"].'
            </a>
            <button class="btn btn-danger at-right" onclick="dismiss(this)" value="'.$id.'-'.$userid.'">解除</button>
            </li>';
}
echo '</ol>';