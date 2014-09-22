<?php
    include("functions.php");
    if (file_exists("./install/index.php"))
    {
	    header("Location: ./install");
	    die();
	}
    else
    include("inc/connect.php");

    $notheme = mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'] == null;

    $json = getThemeData($notheme ? "Modern" : mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'], 'json');
?>
<html>
    <title><?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `title` FROM `settings` WHERE 1"))['title'] ?></title>
    <style><?php echo getThemeData(mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'], 'css') ?></style>
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <body>
        <!--HEADER START-->
            <div id='header'>
            <br>
            <div align="center" style="height: auto;">
                <img src="images/logo.png" />
            </div>
            <?php
                include getLayoutData('iLexiconn', 'header', 'include');

                $adfly = mysqli_query($con, "SELECT `Adfly` FROM `settings` WHERE 1");
                $adlink = mysqli_fetch_array($adfly);
            ?>
            </div>
        <!--HEADER END-->

        <!--BODY START-->
        <?php
            include getLayoutData('iLexiconn', 'body', 'include');
        ?>
        <?php
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo mysqli_fetch_array(mysqli_query($con, "SELECT `footer` FROM `settings` WHERE 1"))['footer'] . " | MyMods &copy iLexiconn & TheGeekyGuy101";
                echo "<br>";
                echo "<br>";

                $donation = mysqli_fetch_array(mysqli_query($con, "SELECT `donations` FROM `settings` WHERE 1"))['donations'];
                if ($donation != null)
                    echo "<a href='$donation'><img src='https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif'/></a>"
            ?>
    </body>
</html>