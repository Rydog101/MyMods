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
                $("div#content").load("ConfigSettings.php");
            }
        });
    });

    $("#ConfigSettings").click(function()
    {
        $("div#content").load("ConfigSettings.php");
    });

    $("#ContentSettings").click(function()
    {
        $("div#content").load("ContentSettings.php");
    });

    $("#LayoutSettings").click(function()
    {
        $("div#content").load("LayoutSettings.php");
    });

    $("#save-content").click(function()
    {

    })
});