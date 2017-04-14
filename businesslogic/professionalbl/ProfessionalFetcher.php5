<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/12/1
 * Time: 8:48
 */
include_once($_SERVER['DOCUMENT_ROOT']."/businesslogic/userbl/UserInfoFetcherPHP.php5");
include_once($_SERVER['DOCUMENT_ROOT']."/DataManager/IDSearcher.php");
include_once($_SERVER['DOCUMENT_ROOT']."/DataManager/ProfessionalDataManager.php5");
include_once($_SERVER['DOCUMENT_ROOT']."/DataManager/ServiceDataManager.php");


function getMyDoctor($userid){
    $dataMng = new ProfessionalDataManager();
    $doctors = $dataMng->getDoctorIdList();
}

function getMyDoctorInfo($userid){
    $dataMng = new ServiceDataManager();
    $doctorInfos = $dataMng->getProInfo($userid, '医生');
    return $doctorInfos;
}

function getMyCoachInfo($userid){
    $dataMng = new ServiceDataManager();
    $coachInfos = $dataMng->getProInfo($userid, '教练');
    return $coachInfos;
}

function getMyClient($userid){
    $dataMng = new ProfessionalDataManager();
    $clients = $dataMng->getClient($userid);
    return $clients;
}

function getMyClientInfo($userid){
    $dataMng = new ServiceDataManager();
    $clientInfos = $dataMng->getClientInfo($userid);
    return $clientInfos;
}

function getApplication($userid){
    $proMng = new ProfessionalDataManager();
    $applications = $proMng->getApplication($userid);

    $serverMng = new ServiceDataManager();
    $customerList = $serverMng->getCustomer($userid);

    $validApplys = array();
    foreach($applications as $application){
        $valid = true;
        foreach($customerList as $customer){
            if($application['SENDER'] === $customer['CUSTOMERID']){
                $valid = false;
                break;
            }
        }

        if($valid){
            array_push($validApplys, $application);
        }
    }
    return $validApplys;
}