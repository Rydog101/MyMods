<?php
    include_once "functions.php";
    if (file_exists("./install/index.php"))
    {
		header("Location: ./install");
		die();
	}
    else
        include("inc/connect.php");

    $notheme = mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'] == null;

    $json = getThemeData($notheme ? "Modern" : mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'], 'json');
    $imgDir = 'images/' . $json['id'] . '/';
?>
<html>
    <title><?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `title` FROM `settings` WHERE 1"))['title'] ?></title>
    <style><?php echo getThemeData(mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'], 'css') ?></style>

    <body>
        <div align="center">
            <img src=<?php echo $imgDir . "logo.png"?> />
        </div>

        <?php
            $tables = mysqli_query($con, "SELECT table_name FROM information_schema.tables WHERE table_type = 'BASE TABLE' AND table_schema='$db_name' ORDER BY table_name DESC");
            $adfly = mysqli_query($con, "SELECT `Adfly` FROM `settings` WHERE 1");
            $adlink = mysqli_fetch_array($adfly);

            while($row = mysqli_fetch_array($tables))
            {
                if($row[0] != "settings")
                {
                    echo "<div>";
                    echo "<h2>" . ucfirst($row[0]) ."</h2>";
                    echo "<table border=\"0\">";
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<th>Mod</th>";
                    if(!strpos($row[0],'.')) echo "<th>Minecraft</th>";
                    echo "<th>Version</th>";
                    echo "<th>Downloads</th>";
                    echo "<th>Forum</th>";
                    echo "</tr>";

                    $Mod = mysqli_query($con, "SELECT * FROM `" . $row[0] ."`");

                    while ($row1 = mysqli_fetch_array($Mod))
                    {
                        echo "<div>";
                        echo "<td>" . $row1['mod'] . "</td>";
                        if(!strpos($row[0],'.')) echo "<td>" . $row1['minecraft'] . "</td>";
                        echo "<td>" . $row1['version'] . "</td>";
                        echo "<td>";
                        if (!empty($row1['dev'])) echo "(<a href=\"" . $adlink['Adfly'] . $row1['dev'] . "\">dev</a>) ";
                        if (!empty($row1['src'])) echo "(<a href=\"" . $adlink['Adfly'] . $row1['src'] . "\">src</a>) ";
                        if (!empty($row1['universal'])) echo "(<a href=\"" . $adlink['Adfly'] . $row1['universal'] . "\">universal</a>) ";
                        echo "</td>";
                        echo "<td>";
                        if (!empty($row1['mcf'])) echo "(<a href=\"" . $row1['mcf'] . "\">MCF</a>) ";
                        if (!empty($row1['pmc'])) echo "(<a href=\"" . $row1['pmc'] . "\">PMC</a>) ";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                }
            }
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