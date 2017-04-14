<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/4 0004
 * Time: 15:09
 */
include("../../DataManager/ProfessionalDataManager.php5");
include("../../DataManager/PDO.php");
class ProfessionalList{
    private $datamng;
    private $pdo;
    function __construct(){
        $this->datamng = new ProfessionalDataManager();
        $this->pdo = PDOManager::getPDO();
    }
    function getDoctorList(){

    }

}