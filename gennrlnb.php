<?php
$file1 = file_get_contents('http://www.nrlmry.navy.mil/tcdat/sectors/ftp_sector_file');
preg_match_all('#\b([0-9]{1,2})S\s+(\w+)\s([0-9]{1,2})([0-9]{1,2})([0-9]{1,2})\s([0-9]{1,2})([0-9]{1,2})\s+(([0-9]{1,2}).([0-9]{1,2}))S\s+(([0-9]{1,2}).([0-9]{1,2}))E\sSHEM\s+([0-9]{1,3})\s+(([0-9]{1,4})|(NA))\b#',$file1,$out);
$result = count($out[0]);
if ($result == 0)
{
$txt = 'document.write("0 Cyclone");';
}
else if ($result == 1)
{
$txt = 'document.write("'.$result.' Cyclone");';
}
else
{
$txt = 'document.write("'.$result.' Cyclones");';
} 
$myfile = fopen("nb.js", "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
?>
