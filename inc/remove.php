<?php
function Delete($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file))  Delete($file);
        else unlink($file);
    }
    rmdir($directory);
}

	Delete("../install/");

	header("Location: ../index.php");
	die();