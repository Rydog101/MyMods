<?php
include_once "../functions.php";
?>

<html>
	<title>MyMods Installation</title>

	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="scripts/system-check.js"></script>

    <style><?php echo getThemeData("Modern", "css", true) ?></style>
    <style>
        #content {
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            background-color: #fbfbfc;
            width: 75%;
            border-radius: 15px 15px 15px 15px;
        }
    </style>
    <img src=<?php echo "../images/modern/logo.png"?>>
    <div class="content" id="content"> <?php include("system-check.php") ?> </div>
</html>