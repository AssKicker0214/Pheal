<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/11
 * Time: 11:21
 */
class UserDataManager{
    public function getPassword($id){
        $pdo = PDOManager::getPDO();
        $sql = "select PASSWORD from LoginInfo WHERE ID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id"=>$id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $password = $result['PASSWORD'];
        return $password;
    }

}