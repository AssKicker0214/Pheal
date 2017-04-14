<?php

/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/4 0004
 * Time: 14:13
 */
class UserInfoTile{
    public $id;
    public $name = 'name';
    public $privilege = 'docter';
    public $sex = 'male';
    public $profile = 'afksdjflsakjfslkdjfalsdkjfas;dklfjas;lkdfjasl;kdfj...';
    function __construct($id, $name, $privilege, $sex, $profile){
        $this->id = $id;
        $this->name = $name;
        $this->profile = $profile;
        $this->privilege = $privilege;
        $this->sex = $sex;
    }


    function makeTile(){
        echo '
        <div class="list-group-item well-lg">
            <div class="row">
                <div class="col-sm-10">
                    <h3 class="list-group-item-heading">'.$this->name.'<span class="label label-primary">'.$this->privilege.'</span></h3>

                    <span class="badge"><span class="glyphicon glyphicon-thumbs-up"></span>999</span>
                    <p class="list-group-item-text">'.$this->profile.'</p>
                </div>
                <div class="col-sm-2">
                    <!--认同度<span class="label label-success" >+99</span>-->
                    <a class="btn btn-default" href="http://localhost:63342/Pheal/presentation/PersonalIndex/home/HomePHP.php5/?userid='.$this->id.'" target="_blank">个人主页</a>
                    <div style="height:10px"></div>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#sendApplyModal" data-receivername="'.$this->name.'" data-receiverid="'.$this->id.'">申请服务</button>

                </div>

            </div>

        </div>
               ';
    }
}