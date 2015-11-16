<?php
if(!defined('__KIMS__')) exit;

if (!$my['uid'])
{
	getLink('','','정상적인 접근이 아닙니다.','');
}

foreach($members as $val)
{
	$R = getUidData($table['s_friend'],$val);

	if (!$R['rel'])
	{
		getDbInsert($table['s_friend'],'rel,my_mbruid,by_mbruid,category,d_regis',"'1','".$my['uid']."','".$R['my_mbruid']."','','".$date['totime']."'");
		getDbUpdate($table['s_friend'],'rel=1','uid='.$R['uid']);
	}
}

getLink('reload','parent.','','');
?>