/**
 * Created by Ian on 2015/10/30 0030.
 */
function applyClick(){
    prompt("留言","没有留言");
}

$(function(){
    $('#sendApplyModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) ;// Button that triggered the modal
        var recipientID = button.data('receiverid'); // Extract info from data-* attributes
        var recipientName = button.data('receivername');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('申请服务: ' + recipientName);
        modal.find('.modal-body input').val(recipientID);
        //modal.find('.modal-body').text(recipient);
    })
});

function apply(){
    var recipientID = document.getElementById('recipient-id').value;
    var content = document.getElementById('message-text').value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost:63342/Pheal/businesslogic/professionalbl/ProfessionalApplication.php5", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("recipient-id="+recipientID+"&content="+content+"&type=服务申请");
    xhr.onreadystatechange = function(e){
        if(xhr.readyState === 4 && xhr.status === 200){
            var result = xhr.responseText;
            if(result == true){
                alert("已发送");
            }else{
                alert(result);
            }
        }
    }
}

