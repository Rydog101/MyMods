$(document).ready(function() {
    $("#saveContent").click(function () {
        $.ajax
        ({
            type: "POST",
            url: "SaveContent.php",
            data: {
                title: $("#title").val(),
                adfly: $("#adfly").val(),
                paypal: $("#paypal").val(),
                footer: $("#footer").val()
            },
            success: function (result) {
                alert("Settings updated");
                $("div#content").load("ContentConfig.php");
            }
        });
    });
});