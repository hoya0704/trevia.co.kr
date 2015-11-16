<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

for($i=0; $i<10; $i++)
{
	
	// 이미지
	$tmpname	= $_FILES['imgsrc']['tmp_name'][$i];
	$realname	= $_FILES['imgsrc']['name'][$i];
	$fileExt	= strtolower(getExt($realname));
	$fileExt	= $fileExt == 'jpeg' ? 'jpg' : $fileExt;
	$userimg	= $sitecode."_".$i.'.'.$fileExt;
	$saveFile	= $g['dir_module'].'var/files/'.$userimg;
	
	if (is_uploaded_file($tmpname))
	{		
		move_uploaded_file($tmpname,$saveFile);
		@chmod($saveFile,0707);
	}
	
	// DB에 등록	
	if(!empty($tmpname) && !empty($url[$i]) && !empty($sitecode))
	{
		$QSET = "imgsrc='$userimg',url='$url[$i]'";
		$QWHERE = "seq='$i' AND sitecode='$sitecode'";
		getDbUpdate($table['sliderdata'],$QSET,$QWHERE);
	}

	if(!empty($title[$i]) && !empty($content[$i]) )
	{
		$QSET = "title='$title[$i]',content='$content[$i]'";
		$QWHERE = "seq='$i' AND sitecode='$sitecode'";
		getDbUpdate($table['sliderdata'],$QSET,$QWHERE);
	}
	
	$temp = $view[$i] == "on" ? 1 : 0;
	$QSET = "view=$temp";
	$QWHERE = "seq='$i' AND sitecode='$sitecode'";
	getDbUpdate($table['sliderdata'],$QSET,$QWHERE);
}

getLink('reload','parent.','','');
?>
