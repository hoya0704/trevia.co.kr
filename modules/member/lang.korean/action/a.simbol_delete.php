<?php
if(!defined('__KIMS__')) exit;

if (!$my['uid'])
{
	getLink('','','정상적인 접근이 아닙니다.','');
}

if (is_file($g['path_var'].'simbol/'.$my['photo']))
{
	unlink($g['path_var'].'simbol/'.$my['photo']);
}
getDbUpdate($table['s_mbrdata'],"photo=''",'memberuid='.$my['uid']);

getLink('reload','parent.','','');
?>