$(document).ready(function () {
    $.ajax({
        url: 'queryInvitations.php',
        type: 'POST',
        data: {
            getInvitations:true
        },
        success: function (data) {
            $('#div-invitations').html(data);
        },error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    })

});