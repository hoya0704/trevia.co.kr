<?php
function getLayoutLogo($layout)
{
	if ($layout['imglogo_use'])
	{
		return '<a href="'.RW(0).'" style="margin:'.$layout['title_t'].'px 0 '.$layout['title_b'].'px 0;"><img src="'.$GLOBALS['g']['s'].'/layouts/'.$layout['dir'].'/_var/'.$layout['imglogo'].'" width="'.$layout['imglogo_w'].'" height="'.$layout['imglogo_h'].'" alt="" /></a>';
	}
	else {
		return '<h1><a href="'.RW(0).'" style="margin:'.$layout['title_t'].'px 0 '.$layout['title_b'].'px 0;color:'.$layout['title_color'].';" id="_layout_title_">'.$layout['title'].'</a></h1>';
	}
}

include  $g['path_layout'].$d['layout']['dir'].'/_var/_var.php';

if (isset($_layoutAction))
{
	include $g['path_layout'].$d['layout']['dir'].'/_action/a.'.$_layoutAction.'.php';
	exit;
}

if ($d['layout']['memberlink_color']) $d['layout']['_memberlink_color'] = ' style="color:'.$d['layout']['memberlink_color'].';"';
if ($d['layout']['mainmenu_color']) $d['layout']['_mainmenu_color'] = ' style="color:'.$d['layout']['mainmenu_color'].';"';
if ($d['layout']['mainmenu_color1']) $d['layout']['_mainmenu_color1'] = ' style="color:'.$d['layout']['mainmenu_color1'].';"';
if ($d['layout']['bgtitle_use']) $d['layout']['_bgtitle'] = ' style="background:url(\''.$g['s'].'/layouts/'.$d['layout']['dir'].'/_var/'.$d['layout']['bgtitle'].'\') '.$d['layout']['bgtitle_o'].';"';

$d['layout']['_is_ownmain'] = $d['layout']['mainType_layout']&&!$system&&!$_themePage&&$_HP['id']=='main';
$d['layout']['_is_content'] = $d['layout']['mainType_rb']||$system||$_themePage||$_HP['id']!='main';

if (isset($_themeConfig))
{
	if (!$my['admin']) getLink(RW(0),'','권한이 없습니다.','');
	$g['main'] = $g['path_layout'].$d['layout']['dir'].'/_admin/main.php';

	$g['dir_module_mode'] = $g['path_layout'].$d['layout']['dir'].'/_admin/main';
	$g['url_module_mode'] = $g['s'].'/layouts/'.$d['layout']['dir'].'/_admin/main';
	$d['layout']['_twhite'] = false;
}
if (isset($_themePage))
{
	$g['main'] = $g['path_layout'].$d['layout']['dir'].'/_pages/'.$_themePage.'.php';
	if (strpos($_themePage,'jax/'))
	{
		include $g['main'];
		exit;
	}
	else {
		$g['dir_module_mode'] = $g['path_layout'].$d['layout']['dir'].'/_pages/'.$_themePage;
		$g['url_module_mode'] = $g['s'].'/layouts/'.$d['layout']['dir'].'/_pages/'.$_themePage;
	}
}
?>