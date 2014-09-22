<?php
function getThemeData($theme, $type, $install = false)
{
    $output = "";
    $zip = zip_open(($install == false ? 'themes/' : '../themes/') . $theme . '.zip');
    if ($zip)
    {
        while ($zip_entry = zip_read($zip))
        {
            if (zip_entry_open($zip, $zip_entry, 'r'))
            {
                $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                if ($type == 'css' && strpos($buf, 'css')) $output = $buf;
                else if ($type == 'json' && strpos($buf, 'id')) $output = json_decode($buf, true);
                zip_entry_close($zip_entry);
            }
        }
        zip_close($zip);
    }
    return $output;
}

function getLayoutData($layout, $fileName, $usage, $install = false)
{
    $output = "";
    $zip = zip_open(($install == false ? 'layouts/' : '../layouts/') . $layout . '.zip');
    if ($zip)
    {
        while ($zip_entry = zip_read($zip))
        {
            $file = basename(zip_entry_name($zip_entry));
            if (zip_entry_open($zip, $zip_entry, 'r'))
            {
                if ($usage == "include" && strpos($file, $fileName) !== FALSE)
                {
                    $output = 'phar://layouts/' . $layout . '.zip/' . zip_entry_name($zip_entry);
                }
                if ($usage == "echo")
                {
                    $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                    if (strpos(strval($file), strval($fileName)) !== FALSE)
                    {
                        if (strpos($file, 'settings') !== FALSE) $output = json_decode($buf, true);
                        else $output = $buf;
                    }
                }
            }
        }
        zip_close($zip);
    }
    return $output;
}