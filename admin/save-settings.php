<?php
    $title = $_POST["title"];
    $theme = $_POST["theme"];
    $adfly = $_POST["adfly"];
    $paypal = $_POST["paypal"];
    $footer = $_POST["footer"];
?>

<html>
    <body>
    <?php
    echo $title;
    echo $theme;
    echo $adfly;
    echo $paypal;
    echo $footer;
    ?>
    </body>
</html>