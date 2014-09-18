<?php
	$host = $_POST["host"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$database = $_POST["database"];

	$db_error = false;
	$con = mysqli_connect($host, $username, $password);

	if(!$con)
    {
		$db_error = true;
		$error_msg="Sorry, these details are not correct. Here is the exact error: "  . mysql_error();
	}
 
	if(!$db_error and !mysqli_select_db($con, $database))
    {
		$createdb = "CREATE DATABASE " . $database;
		mysqli_query($con, $createdb);
		if (!$db_error and !mysqli_select_db($con, $database))
        {
			$db_error = true;
			$error_msg = "The host, username and password are correct. But something is wrong with the given database. Here is the MySQL error: " . mysql_error();
		}
	}

	if($db_error == true) echo $error_msg;

	$connect_code = "<?php
	\$host = \"" . $host . "\";
	\$username = \"" . $username . "\";
	\$password =  \"" . $password . "\";
	\$db_name = \"" . $database . "\";";

	if(!is_writable("../inc/settings.php"))
    {
		$error_msg="<p>Sorry, I can't write to <b>inc/connect.php</b>.
		You will have to edit the file yourself. Here is what you need to insert in that file:<br /><br />
		<textarea rows='5' cols='50' onclick='this.select();'>$connect_code</textarea></p>";
	}
    else
    {
		$fp = fopen('../inc/settings.php', 'wb');
		fwrite($fp,$connect_code);
		fclose($fp);
		chmod('../inc/settings.php', 0666);
	}

	if (!$db_error)
    {
		$settings_table = "CREATE TABLE IF NOT EXISTS `settings` ( `title` text NOT NULL, `theme` text NOT NULL, `adfly` text NOT NULL, `donations` text NOT NULL, `footer` text NOT NULL )";
		mysqli_query($con, $settings_table);

        $recommended_table = "CREATE TABLE IF NOT EXISTS `recommended` ( `mod` longtext NOT NULL, `version` text NOT NULL, `minecraft` text NOT NULL, `universal` longtext NOT NULL, `dev` longtext NOT NULL, `src` longtext NOT NULL, `mcf` longtext NOT NULL, `pmc` longtext NOT NULL )";
        mysqli_query($con, $recommended_table);
	}

    echo "<script> window.location.replace('../inc/remove.php') </script>";