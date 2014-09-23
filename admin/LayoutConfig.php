<?php
    include("../inc/connect.php");
?>
<script src="scripts/LayoutConfig.js"></script>
<h2>Layout Configuration</h2>
<h3>Layout Style</h3>
<select name="layout" id="layout">
<?php
    $handle = opendir("../layouts");
    while (false !== $entry = readdir($handle))
    {
        if (strpos($entry, "."))
        {
            $minuszip = str_replace(".zip", "", $entry);
            if ($minuszip == (string)mysqli_fetch_array(mysqli_query($con, "SELECT `layout` FROM `settings` WHERE 1"))['layout']) echo "<option value=\"" . $minuszip  . "\" selected>" . $minuszip . "</option>";
            else echo "<option value=\"" . $minuszip  . "\">" . $minuszip . "</option>";

        }
    }
?>
</select>
<br>
<br>
<h3>Theme</h3>
<select name="theme" id="theme">
    <?php
        $handle = opendir("../themes");
        while (false !== $entry = readdir($handle))
        {
            if (strpos($entry, "."))
            {
                $minuszip = str_replace(".zip", "", $entry);
                if ($minuszip == (string)mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme']) echo "<option value=\"" . $minuszip  . "\" selected>" . $minuszip . "</option>";
                else echo "<option value=\"" . $minuszip  . "\">" . $minuszip . "</option>";
            }
        }
    ?>
</select>
<br>
<br>
<br>
<br>
<button class="button" name="saveLayout" id="saveLayout">Save</button>
<br>
<br>