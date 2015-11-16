<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

$_tmpdfile = $g['path_layout'].$nowLayout.'/_var/_var.php';
$d['layout'] = array();
include $_tmpdfile;

$d['layout']['begin'] = 1;

if ($changeType == 'front')
{
	if ($d['layout']['mainType_layout']&&$mainType_layout)
	{
		$d['layout']['bbs1'] = $bbs1;
		$d['layout']['sort1'] = $sort1;
		$d['layout']['bbs1_day'] = trim($bbs1_day);
		//$d['layout']['bbs1_num'] = trim($bbs1_num);
		$d['layout']['bbs2'] = $bbs2;
		$d['layout']['sort2'] = $sort2;
		$d['layout']['bbs2_day'] = trim($bbs2_day);
		$d['layout']['bbs2_num'] = trim($bbs2_num);
		$d['layout']['bbs3'] = $bbs3;
		$d['layout']['sort3'] = $sort3;
		$d['layout']['bbs3_day'] = trim($bbs3_day);
		$d['layout']['bbs3_num'] = trim($bbs3_num);
		$d['layout']['bbs4'] = $bbs4;
		$d['layout']['sort4'] = $sort4;
		$d['layout']['bbs4_day'] = trim($bbs4_day);
		$d['layout']['bbs4_num'] = trim($bbs4_num);
	}
	$d['layout']['mainType_layout'] = $mainType_layout;
	$d['layout']['mainType_rb'] = $mainType_rb;
}
if ($changeType == 'theme')
{
	$d['layout']['theme'] = $theme;
}
if ($changeType == 'detail')
{
	$_newupload = false;
	$tmpname	= $_FILES['upfile']['tmp_name'];
	$realname	= $_FILES['upfile']['name'];
	$fileExt	= strtolower(getExt($realname));
	$fileExt	= $fileExt == 'jpeg' ? 'jpg' : $fileExt;
	$photo		= 'logo.'.$fileExt;
	$saveFile1	= $g['path_layout'].$nowLayout.'/_var/'.$d['layout']['imglogo'];
	$saveFile2	= $g['path_layout'].$nowLayout.'/_var/'.$photo;

	if (is_uploaded_file($tmpname))
	{
		if (!strstr('[gif][jpg][png]',$fileExt))
		{
			getLink('','','gif/jpg/png 파일만 등록할 수 있습니다.','');
		}
		if (is_file($saveFile1))
		{
			unlink($saveFile1);
		}

		move_uploaded_file($tmpname,$saveFile2);
		@chmod($saveFile2,0707);
		$isize=getimagesize($saveFile2);

		$d['layout']['imglogo'] = $photo;
		$d['layout']['imglogo_w'] = $isize[0];
		$d['layout']['imglogo_h'] = $isize[1];
		$_newupload = true;
	}

	$tmpname	= $_FILES['upfile1']['tmp_name'];
	$realname	= $_FILES['upfile1']['name'];
	$fileExt	= strtolower(getExt($realname));
	$fileExt	= $fileExt == 'jpeg' ? 'jpg' : $fileExt;
	$photo		= 'bgtitle.'.$fileExt;
	$saveFile1	= $g['path_layout'].$nowLayout.'/_var/'.$d['layout']['bgtitle'];
	$saveFile2	= $g['path_layout'].$nowLayout.'/_var/'.$photo;

	if (is_uploaded_file($tmpname))
	{
		if (!strstr('[gif][jpg][png]',$fileExt))
		{
			getLink('','','gif/jpg/png 파일만 등록할 수 있습니다.','');
		}
		if (is_file($saveFile1))
		{
			unlink($saveFile1);
		}

		move_uploaded_file($tmpname,$saveFile2);
		@chmod($saveFile2,0707);

		$d['layout']['bgtitle'] = $photo;
	}


	$d['layout']['title'] = trim($title);
	$d['layout']['title_t'] = trim($title_t);
	$d['layout']['title_b'] = trim($title_b);
	$d['layout']['imglogo_use'] = is_file($g['path_layout'].$nowLayout.'/_var/'.$d['layout']['imglogo']) ? $imglogo_use : 0;
	$d['layout']['bgtitle_use'] = $bgtitle_use;
	$d['layout']['bgtitle_o'] = $bgtitle_o;
	$d['layout']['title_color'] = $title_color;
	$d['layout']['memberlink_color'] = $memberlink_color;
	$d['layout']['mainmenu_color'] = $mainmenu_color;
	$d['layout']['mainmenu_color1'] = $mainmenu_color1;
	$d['layout']['menunum'] = $menunum;
	$d['layout']['homestr'] = trim($homestr);
	$d['layout']['homestr_use'] = $homestr_use;
	if (!$_newupload)
	{
		$d['layout']['imglogo_w'] = trim($imglogo_w);
		$d['layout']['imglogo_h'] = trim($imglogo_h);
	}
}
if ($changeType == 'sns')
{
	$d['layout']['sns_use'] = $sns_use;
}

$fp = fopen($_tmpdfile,'w');
fwrite($fp, "<?php\n");
foreach ($d['layout'] as $key => $val)
{
	fwrite($fp, "\$d['layout']['".$key."'] = \"".$val."\";\n");
}
fwrite($fp, "?>");
fclose($fp);
@chmod($_tmpdfile,0707);



getLink('reload','parent.','','');
?>