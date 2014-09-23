$(document).ready(function()
{
    $("#Config").click(function()
    {
        $("div#content").load("Config.php");
    });

    $("#LayoutConfig").click(function()
    {
        $("div#content").load("LayoutConfig.php");
    });

    $("#ContentConfig").click(function()
    {
        $("div#content").load("ContentConfig.php");
    });
});