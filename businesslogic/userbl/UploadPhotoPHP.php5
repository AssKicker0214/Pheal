<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/29
 * Time: 21:58
 */
print_r($_FILES);
$file = $_FILES['photo'];
$type = gettype($file);
echo $type;
$storagePath = $_SERVER['DOCUMENT_ROOT'].'./photo/'.$_COOKIE['userid'].'.jpeg';
if(is_uploaded_file($file['tmp_name'])){
    if( move_uploaded_file($file['tmp_name'], $storagePath)){
        echo "<br/>上传成功";
    }
}
//echo 'photo php';