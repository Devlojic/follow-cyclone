<?php
//Récupère le contenu du fichier distan
$file = file_get_contents('http://www.nrlmry.navy.mil/');
//On vérifie la présence des données
preg_match_all('#\b([0-9]{1,2})S\s+(\w+)\s([0-9]{1,2})([0-9]{1,2})([0-9]{1,2})\s([0-9]{1,2})([0-9]{1,2})\s+(([0-9]{1,2}).([0-9]{1,2}))S\s+(([0-9]{1,2}).([0-9]{1,2}))E\sSHEM\s+([0-9]{1,3})\s+(([0-9]{1,4})|(NA))\b#',$file,$out);
$result = count($out[0]);
// Si les données existe et qu'il n'y a pas de tempête en cours
if ($result == 0)
{
$txt = 'document.write("0 Cyclone");';
}
// Si les données existe et qu'il y a une tempête en cours
else if ($result == 1)
{
$txt = 'document.write("'.$result.' Cyclone");';
}s
// Si les données existe et qu'il y a des tempêtes en cours
else
{
$txt = 'document.write("'.$result.' Cyclones");';
} 
//On exporte tout dans un fichier javascript, pour lecture sur le site
$myfile = fopen("nb.js", "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
?>
