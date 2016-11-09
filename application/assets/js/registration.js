$(document).ready(function ()
{
    function register()
    {
        var formData = new FormData($('#regForm')[0]);
        $.ajax(
        {
            type: 'POST',
            url: '/register/',
            data: formData,
            success: function (data)
            {
                $('#returnmessage').html(data);
            },
            error: function (xhr, str)
            {
                alert('Error: ' + xhr.responseCode);
            }
        });

        return false;
    }

    function reset_input()
    {
        $('#returnmessage').empty();
        $('#regForm').closest('form').find("input[type=text],input[type=email],input[type=password],input[type=file], textarea").val("");
    }

    $("#register").click(function (e)
    {
        register();
    });

    $("#reset").click(function (e)
    {
        reset_input();
    });

});
// JavaScript Document 
