<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

$_tmpdfile = $g['dir_module'].'var/var.system.php';
$fp = fopen($_tmpdfile,'w');
fwrite($fp, "<?php\n");

fwrite($fp, "\$d['admin']['themepc'] = \"".$themepc."\";\n");
fwrite($fp, "\$d['admin']['thememobile'] = \"".$thememobile."\";\n");
fwrite($fp, "\$d['admin']['autoclose'] = \"".$autoclose."\";\n");

fwrite($fp, "?>");
fclose($fp);
@chmod($_tmpdfile,0707);


getLink('reload','parent.','','');
?>