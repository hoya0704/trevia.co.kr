<?php
define('__KIMS__',true);
error_reporting(E_ALL ^ E_NOTICE);
session_save_path('./_tmp/session');
session_start();

session_cache_limiter('private'); 
ini_set("session.cookie_lifetime", "86400"); 
ini_set("session.cache_expire", "86400"); 
ini_set("session.gc_maxlifetime", "86400"); 

// debug 
function debug($str, $isArray = true) {

	if($_SERVER['REMOTE_ADDR'] != '175.197.206.74') return;
	
	if($isArray) $str = '<pre>' . print_r($str, true) . '</pre>';

	echo $str;
}

$g = array();
$d = array();

$g['time_split']	= explode(' ',microtime());
$g['time_start']	= $g['time_split'][0]+$g['time_split'][1];
$g['url_root']		= 'http'.($_SERVER['HTTPS']=='on'?'s':'').'://'.$_SERVER['HTTP_HOST'].str_replace('/index.php','',$_SERVER['SCRIPT_NAME']);
$g['path_root']		= './';
$g['path_core']		= $g['path_root'].'_core/';
$g['path_var']		= $g['path_root'].'_var/';
$g['path_tmp']		= $g['path_root'].'_tmp/';
$g['path_layout']	= $g['path_root'].'layouts/';
$g['path_module']	= $g['path_root'].'modules/';
$g['path_widget']	= $g['path_root'].'widgets/';
$g['path_page']		= $g['path_root'].'pages/';
$g['path_file']		= $g['path_root'].'files/';
$g['sys_lang']		= 'korean';

if(!get_magic_quotes_gpc())
{
	if (is_array($_GET))
		foreach($_GET as $_tmp['k'] => $_tmp['v'])
			if (is_array($_GET[$_tmp['k']]))
				foreach($_GET[$_tmp['k']] as $_tmp['k1'] => $_tmp['v1']) 
					$_GET[$_tmp['k']][$_tmp['k1']] = ${$_tmp['k']}[$_tmp['k1']] = addslashes($_tmp['v1']); 
			else $_GET[$_tmp['k']] = ${$_tmp['k']} = addslashes($_tmp['v']);
	if (is_array($_POST))
		foreach($_POST as $_tmp['k'] => $_tmp['v'])
			if (is_array($_POST[$_tmp['k']]))
				foreach($_POST[$_tmp['k']] as $_tmp['k1'] => $_tmp['v1']) 
					$_POST[$_tmp['k']][$_tmp['k1']] = ${$_tmp['k']}[$_tmp['k1']] = addslashes($_tmp['v1']);
			else $_POST[$_tmp['k']] = ${$_tmp['k']} = addslashes($_tmp['v']);
}
else {
	if (!ini_get('register_globals'))
	{
		extract($_GET);
		extract($_POST);
	}
}
if (is_file($g['path_var'].'db.info.php'))
{
	include_once $g['path_var'].'db.info.php';
	include_once $g['path_var'].'table.info.php';	
	include_once $g['path_core'].'function/db.mysql.func.php';
	include_once $g['path_core'].'function/sys.func.php';
	$DB_CONNECT = isConnectDb($DB);
	$d['magent']= file($g['path_var'].'mobile.agent.txt');
	$g['mobile']= isMobileConnect($_SERVER['HTTP_USER_AGENT']);
	$my = array();
	$my['level'] = 0;

	if ($_SESSION['mbr_uid'])
	{
		$my = getUidData($table['s_mbrid'],$_SESSION['mbr_uid']);
		$my = array_merge(getDbData($table['s_mbrdata'],"memberuid='".$my['uid']."'",'*'),$my);
		if($my['pw'] != $_SESSION['mbr_pw']) exit;
	}

	if ($r)
	{
		$_HS = getDbData($table['s_site'],"id='".$r."'",'*');
		$s = $_HS['uid'];
	}

	if (!$s)
	{
		if ($g['mobile'])
		{
			$_HH = getDbData($table['s_mobile'],'','*');
			if ($_HH['usemobile'] == 1) $_HS = getUidData($table['s_site'],$_HH['startsite']);
			else if($_HH['usemobile'] == 2) if($g['url_root'].'/' != $_HH['startdomain']) getLink($_HH['startdomain'],'','','');
		}
		if (!$_HS['uid'])
		{
			$_HD = getDbData($table['s_domain'],"name='".str_replace('www.','',$_SERVER['HTTP_HOST'])."'",'*');
			if ($_HD['site']) $_HS = getUidData($table['s_site'],$_HD['site']);
			else $_HS = db_fetch_array(getDbArray($table['s_site'],'','*','gid','asc',1,1));
		}
		$s = $_HS['uid'];
		$r = $_HS['id'];
	}
	else $_HS = getUidData($table['s_site'],$s);

	include_once $g['path_var'].'language/'.$_HS['lang'].'/_sys.lang.php';
	$_CA = array();
	$date = getVDate($_HS['timecal']);
	$g['s'] = str_replace('/index.php','',$_SERVER['SCRIPT_NAME']);
	$g['r'] = $_HS['rewrite'] ? $g['s'].($_HS['usescode']?'/'.$r:'') : '.';
	$g['img_core'] = $g['s'].'/_core/image';
	$g['sys_selectlang']=$_HS['lang'];
	$g['location']	 = '<a href="'.RW(0).'">HOME</a>';
	$g['browtitle']	 = $_HS['title'];
	$g['meta_sbj']	 = $_HS['title'];
	$g['meta_tit']	 = '';
	$g['meta_key']	 = '';
	$g['meta_des']	 = '';
	$g['sys_module'] = 'home';
	$g['sys_action'] = $a && !$c ? true : false;
	$m = $m ? $m : $g['sys_module'];
	$_m = $m;
	$_mod = $mod;

	if (!$g['sys_action'] && !$system)
	{
		if ($c)
		{
			$_CA = explode('/',$c);
			$_tmp['count'] = count($_CA);
			$_tmp['id'] = $_CA[$_tmp['count']-1];
			$_HM = getDbData($table['s_menu'],"id='".$_tmp['id']."' and site=".$s,'*');
			if ($_HM['reject']&&!$my['admin']) getLink('','',$lang['sys']['none_page'],'-1');
			if ($_HM['site']!=$_HS['uid']) getLink('','',$lang['sys']['none_menu'],'-1');
			$_HM['incfile'] = $g['path_page'].'menu/'.sprintf('%05d',$_HM['uid']);
			for ($_i = 0; $_i < $_tmp['count']-1; $_i++)
			{
				$_tmp['location'] = getDbData($table['s_menu'],"id='".$_CA[$_i]."'",'*');
				$_tmp['split_id'].= ($_i?'/':'').$_tmp['location']['id'];
				$g['location']   .= ' &gt; <a href="'.RW('c='.$_tmp['split_id']).'">'.$_tmp['location']['name'].'</a>';
			}
			$g['location'] .= ' &gt; <a href="'.RW('c='.$c).'">'.$_HM['name'].'</a>';
			if(!$_HS['titlefix']) $g['browtitle'] = $_HS['title'].' - '.$_HM['name'];

			if($_HM['menutype']==1)
			{
				if ($_HM['redirect']) getLink($_HM['joint'],'','','');
				$_tmpexp = explode('?',$_HM['joint']);
				if ($_tmpexp[1])
				{
					$_tmparr = explode('&',$_tmpexp[1]);
					foreach($_tmparr as $_tmpval)
					{
						if(!$_tmpval) continue;
						$_tmparr = explode('=',$_tmpval);
						${$_tmparr[0]} = $_tmparr[1];
					}
				}
			}
		}
		if (!$c && $m == $g['sys_module'])
		{
			if (!$mod) $_HP = getUidData($table['s_page'],$g['mobile']&&$_SESSION['pcmode']!='Y'?($_HS['m_startpage']?$_HS['m_startpage']:$_HS['startpage']):$_HS['startpage']);
			else $_HP = getDbData($table['s_page'],"id='".$mod."'",'*');
			if($_HP['uid']) $_HM['layout'] = $_HP['layout'];
			if($_mod)
			{
				$g['location'] .= ' &gt; <a href="'.RW('mod='.$_HP['id']).'">'.$_HP['name'].'</a>';			
				if(!$_HS['titlefix']) $g['browtitle'] = $_HS['title'].' - '.$_HP['name'];
			}
			if ($_HP['pagetype']==1)
			{
				$_HM['layout'] = $_HP['layout'];
				$_tmpexp = explode('?',$_HP['joint']);
				if ($_tmpexp[1])
				{
					$_tmparr = explode('&',$_tmpexp[1]);
					foreach($_tmparr as $_tmpval)
					{
						if(!$_tmpval) continue;
						$_tmparr = explode('=',$_tmpval);
						${$_tmparr[0]} = $_tmparr[1];
					}
					if ($_m == $g['sys_module']) $_mod = '';
					if ($m  != $g['sys_module']) $mod = $_mod;
				}
			}
		}
	}
}
else
{
	$m = 'admin';
	$mod = 'install';
}

if ($keyword)
{
	$keyword = trim($keyword);
	$_keyword= stripslashes(htmlspecialchars($keyword));
}
if (!$p) $p = 1;
if (!is_dir($g['path_module'].$m)) $m = $g['sys_module'];
if (!is_dir($g['path_module'].$m.'/lang.'.$_HS['lang'])) $_HS['lang']=$g['sys_lang'];
$g['dir_module'] = $g['path_module'].$m.'/';
$g['url_module'] = $g['s'].'/modules/'.$m;
$g['img_module'] = $g['url_module'].'/image';
$g['add_module'] = $g['dir_module'].'_main.php';

if (is_file($g['add_module'])) include_once $g['add_module'];

if ($a)
{
	$g['act_module1'] = $g['dir_module'].'lang.'.$_HS['lang'].'/action/'.(strpos($a,'/')?str_replace('/','/a.',$a):'a.'.$a).'.php';
	$g['act_module2'] = $g['dir_module'].'action/a.'.$a.'.php';
	if (is_file($g['act_module1'])) include_once $g['act_module1'];
	if (is_file($g['act_module2'])) include_once $g['act_module2'];
}

if ($_HS['open'] > 1)
{
	if ($m != 'admin' && (($_HS['open']==2&&!$my['admin'])||$_HS['open']==3)) $iframe = 'Y';
	if ($_HS['open'] == 2) if (!$my['admin'] && $m != 'admin' && $system != 'guide.stopsite') getLink($g['s'].'/?r='.$r.'&system=guide.stopsite','','','');
	if ($_HS['open'] == 3) if ($m != 'admin' && $system != 'guide.stopsite') getLink($g['s'].'/?r='.$r.'&system=guide.stopsite','','','');
}

if ($_SERVER['PATH_INFO']) include_once $g['path_module'].'trackback/action/a.rcv_trackback.php';
if (!$s && $m != 'admin') getLink($g['s'].'/?r='.$r.'&m=admin&module='.$g['sys_module'].'&nosite=Y','','','');

include_once $g['dir_module'].'main.php';

if ($m=='admin' || $iframe=='Y')
{
	$_HM['layout'] = '_blank/main.php';
	$d['layout']['php'] = $_HM['layout'];
}
else {
	if (!$g['mobile']||$_SESSION['pcmode']=='Y') $d['layout']['php'] = $prelayout ? $prelayout.'.php' : ($_HM['layout'] ? $_HM['layout'] : $_HS['layout']);
	else $d['layout']['php'] = $prelayout ? $prelayout.'.php' : ($_HS['m_layout'] ? $_HS['m_layout'] : $_HS['layout']);
}

$d['layout']['dir'] = dirname($d['layout']['php']);
$d['layout']['str'] = str_replace('.php','',$d['layout']['php']);
$d['layout']['pwd'] = $g['path_layout'].$d['layout']['str'];
$d['layout']['var'] = $g['path_layout'].$d['layout']['dir'].'/_main.php';

$g['url_layout'] = $g['s'].'/layouts/'.$d['layout']['dir'];
$g['img_layout'] = $g['url_layout'].'/image';

if (is_file($d['layout']['var'])) include_once $d['layout']['var'];
define('__KIMS_CONTENT__',$g['path_core'].'engine/content.engine.php');
define('__KIMS_CONTAINER_HEAD__',$g['path_core'].'engine/container_head.engine.php');
define('__KIMS_CONTAINER_FOOT__',$g['path_core'].'engine/container_foot.engine.php');
if ($m!='admin'){include_once $g['path_var'].'sitephp/'.$_HS['uid'].'.php';if($_HS['buffer']){$g['buffer']=true;ob_start('ob_gzhandler');}}
?>
<?php
/*********** LOG 3차스크립트 ***********/
if($logcorp_xml_send != true){
	$ptc = strstr($_SERVER['SERVER_PROTOCOL'],"HTTPS") ? "https://" : "http://";
	if(!isset($_SESSION)) @session_start();
	$logsrid = $_COOKIE['logsrid'];
	if($logsrid == ""){
		$microtime = split("\.", microtime(true));
		$logsrid = substr(md5(session_id()),0,26)."-".date("Ymd") . substr($microtime[0], -5). substr($microtime[1], 0, 2);
	}
	if(session_id()){
		$_SESSION['logsid']=md5(session_id());
		$_SESSION['logref']=urlencode($_SERVER['HTTP_REFERER']);
		/**** 사이트 분할 특성상 추가 ****/
		$cd_key = ($r=="maldives" ? "1_himaldives" : "1_trevia");
		/**** 사이트 분할 특성상 추가 ****/
		$logcorp_pV = "logra=".$_SERVER['REMOTE_ADDR']."&logsid=".md5(session_id())."&logsrid=".$logsrid."&logua=".urlencode($_SERVER['HTTP_USER_AGENT'])."&logha=".urlencode($_SERVER['HTTP_ACCEPT'])."&logref=".urlencode($_SERVER['HTTP_REFERER'])."&logurl=".urlencode($ptc.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])."&cdkey=".$cd_key."&asp=namuloga1";
		$logcorp_headers = "GET /jserver.php?".$logcorp_pV." HTTP/1.0\r\nHost: j1.http.or.kr\r\nConnection: Close\r\n\r\n";
		$logcorp_fp = @fsockopen("j1.http.or.kr", 80, $errno, $errstr,0.2);
		if($logcorp_fp) {
			fwrite($logcorp_fp, $logcorp_headers);
			fclose($logcorp_fp);
		}
		$logcorp_xml_send = True;
		setcookie("logsrid", $logsrid, time()+259200000, "/",str_replace("www.","",$_SERVER['SERVER_NAME']));
	}
}
/*
* 특허번호 : 10-1029990
* 특허명 : 접속 정보 제공 시스템 및 방법
* 특허권자 : 주식회사 로그
* 본 프로그램 소스는 (주)로그에서 개발.배포한 것으로 등록특허 제 10-1029990호(접속 정보 제공 시스템 및 방법)의 특허 기술이 적용되었습니다.
* 특허권자의 허락없이 사용,배포,판매 등의 행위를 할 경우 특허법 제128조 및 제225조에 따라 민.형사상 책임을 질 수 있습니다.
*/
/*********** LOG 3차스크립트 ***********/
?>
<?php if($_HS['dtd']=='xhtml_1'):?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?php echo $lang['sys']['lang']?>" xml:lang="<?php echo $lang['sys']['lang']?>" xmlns="http://www.w3.org/1999/xhtml">
<?php else:?>
<!DOCTYPE html>
<html lang="<?php echo $lang['sys']['lang']?>">
<?php endif?>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="generator" content="kimsQ-RB" /> 
<?php if(!$_HS['headercode']):?>
<meta name="author" content="<?php echo $_SERVER['HTTP_HOST']?>" /> 
<meta name="subject" content="<?php echo strip_tags($g['meta_sbj'])?>" /> 
<meta name="title" content="<?php echo strip_tags($g['meta_tit'])?>" /> 
<meta name="keywords" content="<?php echo strip_tags($g['meta_key'])?>" /> 
<meta name="description" content="<?php echo strip_tags($g['meta_des'])?>" />
<meta name="copyright" content="Copyrights © <?php echo $date['year']?> <?php echo $_SERVER['HTTP_HOST']?> All Rights Reserved" />
<?php endif?>
<?php if($g['mobile']&&$_SESSION['pcmode']!='Y'&&$_HS['m_layout']):?>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" /> 
<?php endif?>
<title><?php echo $g['browtitle']?></title>
<?php if($m=='admin'):?>
<link rel="shortcut icon" href="<?php echo $g['img_core']?>/_public/favicon.ico" type="image/x-icon" />
<?php endif?>
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['s']?>/_core/css/sys.css" />
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['s']?>/_core/css/jquery.tooltip.css" />
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['url_layout']?>/_main.css" />
<?php if(is_file($d['layout']['pwd'].'.css')):?>
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['s']?>/layouts/<?php echo $d['layout']['str']?>.css" />
<?php endif?>
<?php if(is_file($g['dir_module'].'_main.css')):?>
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['url_module']?>/_main.css" />
<?php endif?>
<?php if(is_file($g['dir_module_skin'].'_main.css')):?>
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['url_module_skin']?>/_main.css" />
<?php endif?>
<?php if(is_file($g['dir_module_mode'].'.css')):?>
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['url_module_mode']?>.css" />
<?php endif?>
<?php if(is_file($g['dir_module_admin'].'.css')):?>
<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['url_module_admin']?>.css" />
<?php endif?>
<script type="text/javascript">
//<![CDATA[
var mbrclick= false;
var rooturl = '<?php echo $g['url_root']?>';
var raccount= '<?php echo $r?>';
var moduleid= '<?php echo $m?>';
var memberid= '<?php echo $my['id']?>';
var is_admin= '<?php echo $my['admin']?>';
var needlog = '<?php echo $lang['sys']['need_login']?>';
var neednum = '<?php echo $lang['sys']['need_num']?>';
var myagent	= navigator.appName.indexOf('Explorer') != -1 ? 'ie' : 'ns';
//]]>
</script>
<script type='text/javascript' charset="utf-8" src="<?php echo $g['s']?>/_core/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/_core/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/_core/js/jquery.Popup.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/_core/js/jquery.tooltip.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/_core/js/sys.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['url_layout']?>/_main.js"></script>
<?php if(is_file($d['layout']['pwd'].'.js')):?>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/layouts/<?php echo $d['layout']['str']?>.js"></script>
<?php endif?>
<?php if(is_file($g['dir_module'].'_main.js')):?>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['url_module']?>/_main.js"></script>
<?php endif?>
<?php if(is_file($g['dir_module_skin'].'_main.js')):?>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['url_module_skin']?>/_main.js"></script>
<?php endif?>
<?php if(is_file($g['dir_module_mode'].'.js')):?>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['url_module_mode']?>.js"></script>
<?php endif?>
<?php if(is_file($g['dir_module_admin'].'.js')):?>
<script type="text/javascript" charset="utf-8" src="<?php echo $g['url_module_admin']?>.js"></script>
<?php endif?>
<?php echo $_HS['headercode']?>
</head>
<body>
<script type="text/javascript">
<!--
	try{
	document.execCommand('BackgroundImageCache',false,true);
}
catch(e){}

//-->
</script>
<?php if($bid!='cus_manager2' && $my['admin']&&!$iframe&&(!$g['mobile']||$_SESSION['pcmode']=='Y')):?>
<?php include_once $g['path_var'].'language/'.$g['sys_selectlang'].'/_top.lang.php'?>
<div id="adminControl">
<div class="aleft">
<ul>
<li><a href="http://www.kimsq.com/" target="_blank"><img src="<?php echo $g['img_core']?>/_public/ico_rb.gif" class="rb" alt="RB" title="kimsQ-RB" /></a></li>
<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>" class="b" title="<?php echo $_HS['name']?>">HOME</a></li>
<li><a href="<?php echo RW('m=admin')?>" class="b">ADMIN</a> <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;type=editmode"><img src="<?php echo $g['img_core']?>/_public/btn_add_01.gif" alt="" title="<?php echo $lang['top']['desk']?>" class="deskedit" /></a></li>
<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&amp;type=site"><?php echo $lang['top']['site']?></a> <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=home&amp;type=makesite" title="<?php echo $lang['top']['newsite']?>"><img src="<?php echo $g['img_core']?>/_public/btn_add_01.gif" alt="" /></a></li>
<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&amp;type=menu"><?php echo $lang['top']['menu']?></a> <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&amp;type=menu&amp;makemenu=Y" title="<?php echo $lang['top']['newmenu']?>"><img src="<?php echo $g['img_core']?>/_public/btn_add_01.gif" alt="" /></a></li>
<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&amp;type=page"><?php echo $lang['top']['page']?></a> <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&amp;type=pageadd" title="<?php echo $lang['top']['newpage']?>"><img src="<?php echo $g['img_core']?>/_public/btn_add_01.gif" alt="" /></a></li>
<?php if(!$system):?>
<?php if($_HM['uid']):?>
<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.menu&amp;_menu=<?php echo $_HM['uid']?>" class="editpage" title="MENUKEY:<?php echo $_HM['uid']?>"><?php echo $lang['top']['edit']?></a> <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&amp;type=menu&amp;cat=<?php echo $_HM['uid']?>" title="<?php echo $lang['top']['property']?>"><img src="<?php echo $g['img_core']?>/_public/btn_add_01.gif" alt="" /></a></li>
<?php elseif($_HP['uid']):?>
<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.page&amp;_page=<?php echo $_HP['uid']?>" class="editpage"><?php echo $lang['top']['edit']?></a> <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&amp;type=pageadd&amp;uid=<?php echo $_HP['uid']?>" title="<?php echo $lang['top']['property']?>"><img src="<?php echo $g['img_core']?>/_public/btn_add_01.gif" alt="" /></a></li>
<?php endif?>
<?php else:?>
<li><?php echo $lang['top']['edit']?></li>
<?php endif?>
<li>
<a title="Editor" class="hand b" onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&system=edit.editor&iframe=Y');" />E</a>ㆍ<a title="Widget" class="hand b" onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&system=popup.widget&iframe=Y&isWcode=Y');" />W</a>
</li>
<li>
	<a href="<?php echo RW("m=admin&module=bbs&front=post&account=2&bid=10&year1=2009&month1=01&day1=01&year2=2011&month2=11&day2=28&sort=gid&orderby=asc&recnum=20&where=subject%7Ctag&keyw=")?>">1:1 상담 요청</a>
</li>
<li>
	<a href="http://www.himaldives.co.kr/?r=maldives&m=bbsext&bid=cus_manager2" target="_blank">고객관리</a>
</li>
</ul>
</div>
<div class="aright">
<img src="<?php echo $g['img_core']?>/_public/ico_user.gif" alt="" />
<a href="<?php echo RW('mod=mypage')?>" class="admlink"><?php echo sprintf($lang['top']['admin'],$my[$_HS['nametype']])?></a>
<span class="mbox">
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=member">Member</a> <span class="asplit">|</span> 
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=bbs">Board</a> <span class="asplit">|</span> 
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=layout">Layout</a>  <span class="asplit">|</span> 
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=market">Market</a>
</span>
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout"><img src="<?php echo $g['img_core']?>/_public/btn_logout.gif" alt="logout" class="logout" /></a>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
//<![CDATA[
document.body.style.backgroundPosition = 'left 23px';
//]]>
</script>
<?php endif?>
<?php include_once $g['path_layout'].$d['layout']['php']?>
<?php if($g['mobile']&&$_SESSION['pcmode']=='Y'&&$iframe!='Y'):?>
<div id="pctomobile"> 
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=mobilemode"><?php echo sprintf($lang['sys']['viewpcmode'],$m=='admin'?'관리자모드':'홈페이지')?></a>
</div>
<?php endif?>
<div id="_action_layer_"></div>
<div id="_action_layer_popup"></div>
<iframe name="_action_frame_<?php echo $m?>" width="0" height="0" frameborder="0" scrolling="no"></iframe>
<script type="text/javascript">
//<![CDATA[
<?php if($m!='admin'&&$iframe!='Y'&&!$g['mobile']):?>
<?php $POPUPS = getDbSelect($table['s_popup'],'hidden=0','*')?>
<?php while($POP=db_fetch_array($POPUPS)):?>
<?php if (!$POP['term0'] && ($POP['term1'] > $date['totime'] || $POP['term2'] < $date['totime'])):?>
<?php getDbUpdate($table['s_popup'],'hidden=1','uid='.$POP['uid']);continue?>
<?php endif?>
<?php $POP['xdispage']='_'.$POP['dispage']?>
<?php if(strpos($POP['xdispage'],'[c['.$_HS['uid'].']]')) continue?>
<?php if(!strpos($POP['xdispage'],'[s['.$_HS['uid'].']]') && !strpos($POP['xdispage'],'[m['.$_HS['uid'].']'.$_HM['id'].']') && !strpos($POP['xdispage'],'[m['.$_HS['uid'].']'.$_HP['id'].']')) continue?>
//alert(getCookie('popview'));
if (getCookie('popview').indexOf('[<?php echo $POP['uid']?>]') == -1)
{
	<?php if($POP['type']):?>
	frames._action_frame_<?php echo $m?>.location.href='<?php echo $g['s']?>/?r=<?php echo $r?>&system=popup.layer&uid=<?php echo $POP['uid']?>&iframe=Y';
	<?php else:?>
	window.open('<?php echo $g['s']?>/?r=<?php echo $r?>&system=popup.window&uid=<?php echo $POP['uid']?>&iframe=Y','popview_<?php echo $POP['uid']?>','left=<?php echo $POP['pleft']?>,top=<?php echo $POP['ptop']?>,width=<?php echo $POP['width']?>,height=<?php echo $POP['height']?>,scrollbars=<?php echo $POP['scroll']?'yes':'no'?>,status=yes');
	<?php endif?> 
}
<?php endwhile?>
<?php if($my['is_paper']):?>
OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&system=popup.paper&iframe=Y');
<?php endif?>
<?php endif?>
document.body.onclick = closeMemberLayer;
//]]>
</script>
<?php echo $_HS['footercode']?>

</body>
</html>
<?php if ($m!='admin'&&$iframe!='Y'&&!$system) include_once $g['path_core'].'engine/counter.engine.php'?>
<?php if ($g['buffer']) ob_end_flush()?>