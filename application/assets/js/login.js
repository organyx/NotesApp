$(document).ready(function ()
{
    $('#loginBtn').click(function ()
    {
        login();
    });

    function login()
    {   
        var formData = $('#loginForm').serialize();
        $.ajax(
        {
            url: '/login/index/',
            type: 'post',
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
});
// JavaScript Document 