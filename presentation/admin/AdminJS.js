/**
 * Created by Ian on 2015/12/2.
 */
function editActivity(btn){
    id = btn.value;
    var title = document.getElementById('activity-'+id+'-title').innerHTML;
    var endTime = document.getElementById('activity-'+id+'-endTime').innerHTML;
    var startTime = document.getElementById('activity-'+id+'-startTime').innerHTML;
    var description = document.getElementById('activity-'+id+'-description').innerHTML;

    document.getElementById('activity-title').value = title;
    document.getElementById('activity-end-time').value = endTime;
    document.getElementById('activity-start-time').value = startTime;
    document.getElementById('activity-description').value = description;
    document.getElementById('activity-option').innerHTML = '编辑活动 ID='+id;

    if(document.getElementById('activity-publish-btn') != undefined){
        document.getElementById('activity-publish-btn').outerHTML
            = '<button type="button" onclick="updateActivity()" id="activity-edit-btn" class="btn btn-primary">确定修改</button>';
    }
}

function updateActivity(){
    var title = document.getElementById('activity-title').value;
    var endTime = document.getElementById('activity-end-time').value;
    var startTime = document.getElementById('activity-start-time').value;
    var description = document.getElementById('activity-description').value ;
    var xhr = $.ajax({url:"http://localhost:63342/Pheal/businesslogic/activitybl/ActivityEditor.php5", async: true,
        data:'id='+id+'&title='+title+'&end-time='+endTime+'&start-time='+startTime+'&description='+description, success: (function(respond){
            alert(respond);
            location.reload(true);
        }), type:'post'});
}