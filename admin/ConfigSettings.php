<?php
include("../inc/connect.php");
?>
<h3>Site Title</h3>
<input class = 'textbox' type = "text" name = "title" id = "title" placeholder=<?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `title` FROM `settings` WHERE 1"))['title'] ?>>

<br>
<br>

<h3>Theme</h3>
<input class = 'textbox' type = "text" name = "theme" id = "theme" placeholder=<?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'] ?>>

<br>
<br>

<h3>Adfly API link</h3>
<input class = 'textbox' type = "text" name = "adfly" id = "adfly" placeholder=<?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `adfly` FROM `settings` WHERE 1"))['adfly'] ?>>

<br>
<br>

<h3>Donation Link</h3>
<input class = 'textbox' type = "text" name = "paypal" id = "paypal" placeholder=<?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `donations` FROM `settings` WHERE 1"))['donations'] ?>>

<br>
<br>

<h3>Footer</h3>
<input class = 'textbox' type = "text" name = "footer" id = "footer" placeholder=<?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `footer` FROM `settings` WHERE 1"))['footer'] ?>>

<br>
<br>
<br>
<br>
<button class="button" name="save-settings" id="save-settings">Save</button>
<br>
<br>