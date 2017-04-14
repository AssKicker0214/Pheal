/**
 * Created by Ian on 2015/12/1.
 */
function getMyAdviser(type){
    var url = 'http://localhost:63342/Pheal/businesslogic/userbl/MyAdviserFetcher.php5';

    var xhr = $.ajax({url:url, async: true,
        data:'type='+type, success: (function(respond){
            document.getElementById('adviser-container').innerHTML = respond;
        }), type:'get'});
}