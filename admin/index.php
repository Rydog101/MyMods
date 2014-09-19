<?php
    include_once "../functions.php";
    include("../inc/connect.php");

    $notheme = mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'] == null;
    $json = getThemeData($notheme ? "Modern" : mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'], 'json', true);
    $imgDir = '../images/' . $json['id'] . '/';
?>

<html>
	<title>MyMods Control Panel</title>
    <style><?php echo getThemeData('Modern', 'css', true) ?></style>
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="scripts/save-settings.js"></script>
	<body>
        <div align="center">
            <img src=<?php echo $imgDir . "logo.png"?> />
        </div>
        <h2>MyMods Control Panel</h2>
        <br>

        <div class="save-settings" id="content" name="content">
            <?php
                include("edit.php");
            ?>
        </div>
	</body>
</html>