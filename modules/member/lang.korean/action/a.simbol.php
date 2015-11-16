<?php
if(!defined('__KIMS__')) exit;

if (!$my['uid'])
{
	getLink('','','정상적인 접근이 아닙니다.','');
}

$tmpname	= $_FILES['upfile']['tmp_name'];
$realname	= $_FILES['upfile']['name'];
$fileExt	= strtolower(getExt($realname));
$fileExt	= $fileExt == 'jpeg' ? 'jpg' : $fileExt;
$photo		= $my['id'].'.'.$fileExt;
$saveFile	= $g['path_var'].'simbol/'.$photo;

if (is_uploaded_file($tmpname))
{
	if (!strstr('[gif][jpg][png]',$fileExt))
	{
		getLink('','','gif/jpg/png 파일만 등록할 수 있습니다.','');
	}
	if (is_file($g['path_var'].'simbol/'.$my['photo']))
	{
		unlink($g['path_var'].'simbol/'.$my['photo']);
	}

	include_once $g['path_core'].'function/thumb.func.php';

	move_uploaded_file($tmpname,$saveFile);
	ResizeWidthHeight($saveFile,$saveFile,50,50);
	@chmod($saveFile,0707);

	getDbUpdate($table['s_mbrdata'],"photo='".$photo."'",'memberuid='.$my['uid']);
}


getLink('reload','parent.','','');
?>