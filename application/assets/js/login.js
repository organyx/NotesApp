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
            url: '/login/',
            type: 'post',
            data: formData,
            success: function (data)
            {
                substring = "Username / Password is incorrect";
                console.log(data.indexOf(substring) !== -1);
                // console.log(typeof(data));
                if(data.indexOf(substring) === -1)
                   window.location.replace("/main/");
                else
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