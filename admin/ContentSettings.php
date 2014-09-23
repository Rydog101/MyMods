<?php
    include("../inc/connect.php");
?>
<h2>Content Settings</h2>
<h3>Layout Style</h3>
<select name="layout" id="layout">
<?php
    $handle = opendir("../layouts");
    while (false !== $entry = readdir($handle))
    {
        if (strpos($entry, "."))
        {
            $minuszip = str_replace(".zip", "", $entry);
            echo "<option value=\"" . $minuszip . "\">" . $minuszip . "</option>";
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
                echo "<option value=\"" . $minuszip  . "\">" . $minuszip . "</option>";
            }
        }
    ?>
</select>
<br>
<br>
<br>
<br>
<button class="button" name="save-content" id="save-content">Save</button>
<br>
<br>