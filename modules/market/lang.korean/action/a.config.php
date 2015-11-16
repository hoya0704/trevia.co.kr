<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

$_tmpdfile = $g['dir_module'].'var/var.php';
$fp = fopen($_tmpdfile,'w');
fwrite($fp, "<?php\n");
fwrite($fp, "\$d['market']['url'] = \"".$url."\";\n");
fwrite($fp, "\$d['market']['ftpuse'] = \"".$ftpuse."\";\n");
fwrite($fp, "\$d['market']['ftphost'] = \"".$ftphost."\";\n");
fwrite($fp, "\$d['market']['ftpport'] = \"".$ftpport."\";\n");
fwrite($fp, "\$d['market']['ftppm'] = \"".$ftppm."\";\n");
fwrite($fp, "\$d['market']['ftpid'] = \"".$ftpid."\";\n");
fwrite($fp, "\$d['market']['ftppw'] = \"".$ftppw."\";\n");
fwrite($fp, "\$d['market']['rbpath'] = \"".$rbpath."\";\n");
fwrite($fp, "?>");
fclose($fp);
@chmod($_tmpdfile,0707);


getLink('reload','parent.','갱신되었습니다.','');
?>