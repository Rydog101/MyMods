$(document).ready(function()
{
    $("#save-settings").click(function()
    {
        $.ajax
        ({
            type:"POST",
            url:"save-settings.php",
            data:
            {
                title: $("#title").val(),
                theme: $("#theme").val(),
                adfly: $("#adfly").val(),
                paypal: $("#paypal").val(),
                footer: $("#footer").val()
            },
            success:function(result)
            {

            }
        });
    });
});