<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/3
 * Time: 20:02
 */

function compareDate($date1, $date2){
    $y1 = explode('-',$date1)[0];
    $m1 = explode('-',$date1)[1];
    $d1 = explode('-',$date1)[2];
    $y2 = explode('-',$date2)[0];
    $m2 = explode('-',$date2)[1];
    $d2 = explode('-',$date2)[2];
    $result = 0;
    if($d1<$d2){
        $result=-1;
    }else if($d1>$d2){
        $result=1;
    }

    if($m1<$m2){
        $result=-1;
    }else if($m1>$m2){
        $result=1;
    }

    if($y1<$y2){
        $result=-1;
    }else if($y1>$y2){
        $result=1;
    }

    return $result;
}