$(document).ready(function(){

    $('#team_name').keyup(function(e){
        e.preventDefault();
        var name = $('#team_name').val();
        var url = '/checkName';
        var token = $('#token').val();
        var data = {
            parameter : {
                _token : token,
                name   : name
            }
        };

        $.ajax({
            url : url,
            type: 'POST',
            data: data.parameter,

            success : function(response) {
                if (response == 200) {
                    $('#error').html('Username Already exist!');
                    $("#createTeam").prop('disabled', true);
                } else {
                    $('#error').html('');
                    $("#createTeam").prop('disabled', false);
                }
            }
        });
    });
});