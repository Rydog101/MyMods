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