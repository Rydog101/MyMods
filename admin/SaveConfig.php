<?php
    include("../inc/connect.php");

    $title = $_POST["title"];
    $adfly = $_POST["adfly"];
    $paypal = $_POST["paypal"];
    $footer = $_POST["footer"];

    if (!empty($title))
    {
        mysqli_query($con, "UPDATE settings SET title=\"" . $title . "\"");
    }

    if (!empty($adfly))
    {
        mysqli_query($con, "UPDATE settings SET adfly=\"" . $$adfly . "\"");
    }

    if (!empty($paypal))
    {
        mysqli_query($con, "UPDATE settings SET paypal=\"" . $paypal . "\"");
    }

    if (!empty($footer))
    {
        mysqli_query($con, "UPDATE settings SET footer=\"" . $footer . "\"");
    }