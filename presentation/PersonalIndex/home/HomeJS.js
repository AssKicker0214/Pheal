/**
 * Created by Ian on 2015/11/30.
 */
function sendMessage(){
    var recipient = document.getElementById('message-recipient').value;
    var content = document.getElementById('message-content').value;
    var title = document.getElementById('message-title').value;
    var xhr = $.ajax({url:"http://localhost:63342/Pheal/businesslogic/messagebl/CreateMessage.php5", async: true,
        data:'recipient='+recipient+'&content='+content+'&title='+title,type:'post', success: function(respond){
            alert(respond);
        }});

}
