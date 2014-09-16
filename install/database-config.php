<script>
	$(document).ready(function(){
		$("#database-config").click(function(){
			$.ajax({ type:"POST", url:"database-connect.php", data: { host: $("#host").val(), username: $("#username").val(), password: $("#password").val() }, success: function(result) {
				$("div#content").html(result);
			}});
		});
	});
</script>
<div class="database-config">
	<br>
	<h2>Database Settings</h2>
	<input type="text" placeholder="Host" name="host" id="host"></input>
	<input type="text" placeholder="Username" name="username" id="username"></input>
	<input type="password" placeholder="Password" name="password" id="password"></input>
	<br>
	<br>
	<input type="submit" value="Connect" name="database-config" id="database-config"></input>
	<br>
	<br>
	<br>
</div>