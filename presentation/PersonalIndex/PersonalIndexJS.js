/**
 * Created by Ian on 2015/10/24 0024.
 */
var selectedColor = "#4D61B3";
var unselectedColor = "#ffffff";
var currentSelected = '';

function selectHome(){
    unselectAll();
    hideAll();
    select("home");
    //show("homePanel");
    getContent("home/HomePHP.php5");
}

function selectHealth(){
    unselectAll();
    hideAll();
    select("health");
    //show("healthPanel");
    //document.getElementById('content').innerHTML = "<h1>health</h1><p>have a good health</p>";
    //getHealthContent();
    //getContent("../../datetest.php5");
    getContent("health/HealthContentPHP.php5");
}

function selectActivity(){
    unselectAll();
    hideAll();
    select("activity");
    //show("activityPanel");
}

function selectMessage(){
    unselectAll();
    hideAll();
    select("message");
    getContent("message/MessagePHP.php5");
    //show("caresPanel");
}

function selectMyinfo(){
    unselectAll();
    hideAll();
    select("myinfo");
    getContent("myinfo/MyInfoPHP.php5");
}

function selectMyclient(){
    unselectAll();
    hideAll();
    select("myclient");
    getContent("myclient/MyClient.php5");
}

function selectMypro(){
    unselectAll();
    hideAll();
    select("mypro");
    getContent("mypro/MyProPHP.php5");
}

function unselectAll(){
    unselect("home");
    unselect("health");
    unselect("activity");
    unselect("message");
    unselect("myinfo");
    unselect("myclient");
    unselect("mypro");
}

function hideAll(){
    //hide("homePanel");
    //hide("healthPanel");
    //hide("caresPanel");
    //hide("activityPanel");
    //hide("myinfoPanel");
}

function hover(s){
    if(s != currentSelected){
        document.getElementById(s).style.backgroundColor = "gray";
    }
}

function out(s){
    if(s != currentSelected){
        unselect(s);
    }
}

function select(s){
    currentSelected = s;
    document.getElementById(s).style.backgroundColor = selectedColor;
    document.getElementById(s).style.color = unselectedColor;
}

function unselect(s){
    document.getElementById(s).style.backgroundColor = unselectedColor;
    document.getElementById(s).style.color = selectedColor;
}

function hide(s){
    document.getElementById(s).style.visibility = "hidden";
}

function show(s){
    document.getElementById(s).style.visibility = "visible";
}
function getContent(target){
    var xhr = new XMLHttpRequest();
    //xhr.open("POST", target, true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.open("GET",target+"?userid="+getCookie('userid'),true);
    xhr.setRequestHeader("Content-Type", "text/html");
    xhr.send();
    xhr.onreadystatechange = function(e){
        if(xhr.status == 200 && xhr.readyState==4){
            var respondText = xhr.responseText;
            //alert(respondText);
            document.getElementById('content').innerHTML = respondText;
        }
    }
}
//ajax
function getHealthContent(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "HealthContentPHP.php5", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send();
    xhr.onreadystatechange = function(e){
        if(xhr.status == 200 && xhr.readyState==4){
            var respondText = xhr.responseText;
            document.getElementById('content').innerHTML = respondText;
        }
    }
}

function btnClick(){
    alert("click");
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
}

function getMyinfoContent(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "MyInfoPHP.php5", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send();
    xhr.onreadystatechange = function(e){
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('content').innerHTML = xhr.responseText;
        }
    }
}

function getMessageContent(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "MessagePHP.php5", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send();
    xhr.onreadystatechange = function(e){
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('content').innerHTML = xhr.responseText;
        }
    }
}

function save(){
    var name = document.getElementById('name').value;
    var sexArray = document.getElementsByName('sex_radio');
    var sex = "";
    for(var i=0;i<sexArray.length;i++){
        if(sexArray[i].checked){
            sex = sexArray[i].value;
            break;
        }
    }
    var privilegeArray = document.getElementsByName('privilege_radio');
    var privilege = "";
    for(var i=0;i<privilegeArray.length;i++){
        if(privilegeArray[i].checked){
            privilege = privilegeArray[i].value;
            break;
        }
    }
    var birthday = document.getElementById('birthday').value;
    var profile = document.getElementById('profile').value;
    var location = document.getElementById('location').value;
    var email = document.getElementById('email').value;
    var height = document.getElementById('height').value;
    var weight = document.getElementById('weight').value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "UpdateMyInfo.php5", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send('name='+name+'&sex='+sex+'&birthday='+birthday+'&privilege='+privilege+
            '&profile='+profile+'&location='+location+'&email='+email
        +'&height='+height+'&weight='+weight);
        xhr.onreadystatechange = function(e){
            if(xhr.status === 200 && xhr.readyState===4){
                var result = xhr.responseText;
                alert(result);
            }
        }
}


function changeMessageStatus(msgid){
    alert(msgid);
    document.getElementById(msgid+"_status").value = "已读";

}

$('.form_datetime').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
});
$('.form_date').datetimepicker({
    language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
});
$('.form_time').datetimepicker({
    language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
});
//$(document).ready(function(){
//    $('a').on('click',function(){
//        alert("wow");
//    })
//});
function getCookie(c_name)
{
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1)
        {
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

