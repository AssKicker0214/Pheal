<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/29
 * Time: 21:29
 */
include_once($_SERVER['DOCUMENT_ROOT']."/DataManager/IDSearcher.php");

function getPersonalInfo($userid){
    $searcher = new IDSearcher($userid);
    $result = $searcher->getPersonalInfo();
    return $result;
}

function getLoginInfo($userid){
    $searcher = new IDSearcher($userid);
    $result = $searcher->getLoginInfo();
    return $result;
}

function getPhotoPath($userid){
    $src = "http://localhost:63342/Pheal/photo/".$userid.".jpeg";
    if(file_exists($src)){

    }else{
        //$src = "http://localhost:63342/Pheal/photo/default.png";
    }
    return $src;
}