<?php
include_once "../functions.php";
?>

<html>
	<title>MyMods Installation</title>

	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="scripts/system-check.js"></script>

    <style><?php echo getThemeData("Modern", "css") ?></style>
    <img src=<?php echo "../images/modern/logo.png"?>>
    <div align = "center" class="content" id="content"> <?php include("system-check.php") ?> </div>
</html>