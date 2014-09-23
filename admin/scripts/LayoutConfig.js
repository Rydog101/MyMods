$(document).ready(function() {
    $("#saveLayout").click(function () {
        $.ajax
        ({
            type: "POST",
            url: "SaveLayout.php",
            data: {
                layout: $("#layout").val(),
                theme: $("#theme").val()
            },
            success: function (result) {
                alert("Settings updated");
                $("body").load("index.php");
            }
        });
    });
});