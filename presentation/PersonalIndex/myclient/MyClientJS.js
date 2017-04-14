/**
 * Created by Ian on 2015/12/1.
 */
function accept($btn){
    var msgid = $btn.value.split('-')[0];
    var applierid = $btn.value.split('-')[1];
    var proid = $btn.value.split('-')[2];
    var xhr = $.ajax({url:"http://localhost:63342/Pheal/businesslogic/professionalbl/ApplyAccept.php5", async: true,
        data:'applierid='+applierid+'&proid='+proid+'&msgid='+msgid, success: (function(respond){
            $btn.parentNode.innerHTML = "<h3>已同意</h3>";
            alert(respond);
        }), type:'post'});

}

function deny($btn){
    var msgid = $btn.value.split('-')[0];
    var applierid = $btn.value.split('-')[1];
    var proid = $btn.value.split('-')[2];
    var xhr = $.ajax({url:"http://localhost:63342/Pheal/businesslogic/professionalbl/ApplyDeny.php5", async: true,
        data:'msgid='+msgid+'&applierid='+applierid+'&proid='+proid, success: (function(respond){
            $btn.parentNode.innerHTML = "<h3>已拒绝</h3>";
            alert(respond);
        }), type:'post'});

}

function dismiss($btn){
    var cusid = $btn.value.split('-')[1];
    var proid = $btn.value.split('-')[0];
    var xhr = $.ajax({url:"http://localhost:63342/Pheal/businesslogic/professionalbl/RelationDismiss.php5", async: true,
        data:'proid='+proid+'&cusid='+cusid, success: (function(respond){
            $btn.outerHTML = "<pan><h4>已解除</h4></pan>";
            alert(respond);
        }), type:'post'});

}