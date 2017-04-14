/**
 * Created by Ian on 2015/11/11.
 */

function changeStatusToRead(msgid){
    msgid = msgid.split('_')[0];
    document.getElementById(msgid+"_status").style.visibility = "hidden";
    var xhr = $.ajax({url:"../../businesslogic/messagebl/MessageStatus.php5", async: true, data:'msgid='+msgid+'&newStatus=已读',type:'post'});

}

function sendMessage(){
    var recipient = document.getElementById('message-recipient').value;
    var content = document.getElementById('message-content').value;
    var title = document.getElementById('message-title').value;
    alert(recipient+" "+content+" "+title);
    if(recipient=='' || content=='' || title==''){
        alert('error');
    }
    var xhr = $.ajax({url:"../../businesslogic/messagebl/CreateMessage.php5", async: true,
        data:'recipient='+recipient+'&content='+content+'&title='+title, success: (function(respond){
            alert(respond);
        }), type:'post'});

}

function composeMessage(){
    var recipient = document.getElementById('message-composer-recipient').value;
    var content = document.getElementById('message-composer-content').value;
    var title = document.getElementById('message-composer-title').value;
    alert(recipient+" "+content+" "+title);
    if(recipient=='' || content=='' || title==''){
        alert('error');
    }
    var xhr = $.ajax({url:"../../businesslogic/messagebl/CreateMessage.php5", async: true,
        data:'recipient='+recipient+'&content='+content+'&title='+title, success: (function(respond){
            alert(respond);
        }), type:'post'});

}

function updateModal(recipient_title){
    var recipient = recipient_title.split(';')[0];
    var title = recipient_title.split(';')[1];
    document.getElementById('message-recipient-head').innerHTML=recipient;
    document.getElementById('message-recipient').value=recipient;
    document.getElementById('message-title').value='RE:'+title;
}

var composeHTML = '';
var isLastCompose = true;
function getClassifiedMessage(flag){
    if(flag == '写消息'){
        if(isLastCompose){
            composeHTML = document.getElementById('message-container').innerHTML;
        }else{
            isLastCompose = true;
            document.getElementById('message-container').innerHTML = composeHTML;
        }
    }else{
        if(isLastCompose){
            composeHTML = document.getElementById('message-container').innerHTML;
        }
        isLastCompose = false;
        var xhr = $.ajax({url:"http://localhost:63342/Pheal/businesslogic/messagebl/MessageBL.php5", async: true,
            data:'classification='+flag, success: (function(respond){
                document.getElementById('message-container').innerHTML = respond;
            }), type:'get'});
    }


}