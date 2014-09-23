$(document).ready(function() {
    $("#saveConfig").click(function () {
        $.ajax
        ({
            type: "POST",
            url: "SaveConfig.php",
            data: {
                title: $("#title").val(),
                adfly: $("#adfly").val(),
                paypal: $("#paypal").val(),
                footer: $("#footer").val()
            },
            success: function (result) {
                alert("Settings updated");
                $("div#content").load("Config.php");
            }
        });
    });
});