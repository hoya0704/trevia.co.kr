<?php
if(!defined('__KIMS__')) exit;

$id = trim($id);
$msg = trim($msg);
$html = $html ? $html : 'text';

if (!$my['uid']) getLink('','','권한이 없습니다.','close');
if (!$id||!$msg) getLink('','','','close');

include_once $g['dir_module'].'var/var.join.php';

$idexp = explode(',',$id);
$idlen = count($idexp);

for ($i = 0; $i < $idlen; $i++)
{
	$xid = trim($idexp[$i]);
	if (!$xid) continue;

	if ($d['member']['login_emailid'])
	{
		$M = getDbData($table['s_mbrdata'],"email='".$xid."'",'*');
		if (!$M['memberuid']) continue;
		$M1 = getUidData($table['s_mbrid'],$M['memberuid']);
		if (!$M1['uid']) continue;
	}
	else {
		$M1 = getDbData($table['s_mbrid'],"id='".$xid."'",'*');
		if (!$M1['uid']) continue;
		$M = getDbData($table['s_mbrdata'],'memberuid='.$M1['uid'],'*');
		if (!$M['memberuid']) continue;
	}


	$QKEY = 'parent,my_mbruid,by_mbruid,inbox,content,html,upload,d_regis,d_read';
	$QVAL = "'$parent','".$M['memberuid']."','".$my['uid']."','1','".$msg."','$html','$upload','".$date['totime']."','0'";
	getDbInsert($table['s_paper'],$QKEY,$QVAL);
	getDbUpdate($table['s_mbrdata'],'is_paper=1','memberuid='.$M['memberuid']);
}


getLink('','','','close');
?>