<html>
	<head>
		<title>Installer</title>
		<link rel="stylesheet" href="style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#sys-config").click(function(){
					$.ajax({url:"database-config.php",success:function(result){
						$("div#content").html(result);
					}});
				});
			});
		</script>
	</head>
	<body>
		<center>
			<br>
				<div class="content" id="content">
					<?php
						include("sys-config.php");
					?>
				</div>
