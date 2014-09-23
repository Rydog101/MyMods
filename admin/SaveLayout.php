<?php
include("../inc/connect.php");

$layout = $_POST["layout"];
$theme = $_POST["theme"];

if (!empty($theme))
{
    mysqli_query($con, "UPDATE settings SET theme=\"" . $theme . "\"");
}

if (!empty($layout))
{
    mysqli_query($con, "UPDATE settings SET layout=\"" . $layout . "\"");
}