<?php
if(!defined('__KIMS__')) exit;

$d_regis	= $date['totime'];
$memberuid = $my['uid'];

$QKEY = "bbsdatauid,memberuid,d_regis";
$QVAL = "'$uid','$memberuid','$d_regis'";
getDbInsert("rb_bbs_confirm",$QKEY,$QVAL);

getLink('reload','parent.','','접수 승인 처리되었습니다.');
?>