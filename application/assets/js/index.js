$(document).ready(function ()
{
    $('#addNoteBtn').click(function ()
    {
        addNote();
    });

    function addNote()
    {   
        var formData = $('#addNoteForm').serialize();
        $.ajax(
        {
            url: '/',
            type: 'post',
            data: formData,
            success: function (data)
            {
                // $('#returnmessage').html(JSON.stringify(data));
                // $('#returnmessage').append(data);

                $('#addNoteForm').closest('form').find("input[type=text],input[type=email],input[type=password],input[type=file], textarea").val("");

                var parsed = JSON.parse(data);

                // parsed.sort(function(a,b){
                //     return a.date - b.date;
                // })
                
                var listItemStart = '<a href="#" class="list-group-item">';
                var listItemEnd = '</a>';
                // console.log(parsed.length);
                $('.list-group').empty();
                for (var i = 0; i < parsed.length; i++) {
                    $('.list-group').append(listItemStart + parsed[i]['note_text'] + listItemEnd);
                }
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