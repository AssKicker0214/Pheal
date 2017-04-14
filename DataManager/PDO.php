<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/10/28 0028
 * Time: 14:24
 */

//并不是单例模式
class PDOManager{
    private static $pdo;

    private function makePDO(){
        try{
            $RootDir = $_SERVER['DOCUMENT_ROOT'];
            $pdo = new PDO("sqlite:".$RootDir."/test2.db3");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){

        }

        return $pdo;
    }

    public static function getPDO(){
        if(!isset(PDOManager::$pdo)){
            PDOManager::$pdo = PDOManager::makePDO();
        }
        return PDOManager::$pdo;
    }
}