$(document).ready(function()
{
	$("#database-config").click(function()
    {
		$.ajax
        ({
			type:"POST",
			url:"database-connect.php",
			data:
            {
				host: $("#host").val(),
				username: $("#username").val(),
				password: $("#password").val(),
				database: $("#database").val()
			},
			success: function(result)
            {
				$("div#content").html(result);
			}
		});
	});
});