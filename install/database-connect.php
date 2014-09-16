<?php
	$host = $_POST["host"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$database = $_POST["database"];

	$db_error=false;
	$con = mysqli_connect($host, $username, $password);

	if(!$con) {
		$db_error=true;
		$error_msg="Sorry, these details are not correct. Here is the exact error: "  . mysql_error();
	}
 
	if(!$db_error and !mysqli_select_db($con, $database)) {
		$createdb = "CREATE DATABASE " . $database;
		mysqli_query($con, $createdb);
		if (!$db_error and !mysqli_select_db($con, $database)) {
			$db_error=true;
			$error_msg="The host, username and password are correct. But something is wrong with the given database. Here is the MySQL error: " . mysql_error();
		}
	}

	if($db_error==true) {
		echo $error_msg;
	}

	if (!$db_error) {
		$promotions_table = "CREATE TABLE IF NOT EXISTS `promotions` ( `Promotion` longtext NOT NULL, `Version` text NOT NULL, `Minecraft` text NOT NULL, `changelog` longtext NOT NULL, `javadoc` longtext NOT NULL, `src` longtext NOT NULL, `universal` longtext NOT NULL, `mcf` longtext NOT NULL, `pmc` longtext NOT NULL, `dev` longtext NOT NULL )";
		mysqli_query($con, $promotions_table);
		$settings_table = "CREATE TABLE IF NOT EXISTS `settings` ( `title` text NOT NULL )";
		mysqli_query($con, $settings_table);
	}

	function Delete($path)
	{
	if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            Delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
	}

	Delete("../install");
?>
<div class="database-connect">
	<br>
	<h2>Connected to database</h2>
</div>