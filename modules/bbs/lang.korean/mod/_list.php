<?php
if(!defined('__KIMS__')) exit;

$bbsque0 = 'site='.$s;
$bbsque1 = 'site='.$s.' and notice=1';
$bbsque2 = 'site='.$s;

// 2015.04.05 kim hee sung 여행후기 통합(멕시코,두바이,태국,세이쉘)
if(in_array($s, array(7,6,4,8))):
	$bbsque0 = 'site in (7,6,4,8)';
	$bbsque1 = 'site in (7,6,4,8) and notice=1';
	$bbsque2 = 'site in (7,6,4,8)';
//	$cat = '';
endif;

// 리조트 게시판 메인 출력 문제로 아래와 같이 처리
if($bid!="resort") $bbsque2 .= ' and notice=0';

if ($B['uid'])
{
	$bbsque0 .= ' and bbs='.$B['uid'];
	$bbsque1 .= ' and bbs='.$B['uid'];
	$bbsque2 .= ' and bbs='.$B['uid'];
}

// 이벤트 게시판 기간나누기 특화작업

$resAdd = getDbArray($table[$m.'data'], "site='" . $s . "' AND bbsid='event'", "uid, gid, adddata, subject", "gid", "desc", 0, 0);
// echo $GLOBALS['sql'];

while($infoAdd = db_fetch_array($resAdd))
{
	$today = date("Y-m-d");
	$adddata = unserialize($infoAdd['adddata']);


	$_date1 = explode("-", $adddata['dateEnd']);
	$_date2 = explode("-", $today);
	$tm1 = mktime(0,0,0,$_date1[1],$_date1[2],$_date1[0]);
	$tm2 = mktime(0,0,0,$_date2[1],$_date2[2],$_date2[0]);

	if($tm1 < $tm2)
	{
		getDbUpdate($table[$m.'data'],"notice = 0","uid = " . $infoAdd['uid']);
		getDbUpdate($table[$m.'idx'],"notice = 0","gid = " . $infoAdd['gid']);
	}
}

// Original
$RCD = array();
$NCD = array();

//	echo $table[$m.'data'] .'-' . $bbsque2;

$NTC = getDbArray($table[$m.'idx'],$bbsque1,'gid','gid',$orderby,0,0);
while($_R = db_fetch_array($NTC)) $NCD[] = getDbData($table[$m.'data'],'gid='.$_R['gid'],'*');

if ($sort == 'gid' && !$keyword && !$cat)
{
	$NUM = getDbCnt($table[$m.'month'],'sum(num)',$bbsque0)-count($NCD);
	$TCD = getDbArray($table[$m.'idx'],$bbsque2,'gid',$sort,$orderby,$recnum,$p);
	while($_R = db_fetch_array($TCD)) $RCD[] = getDbData($table[$m.'data'],'gid='.$_R['gid'],'*');


}
else {
	// ==== 수상비행기, 국선지역 혼합 임시처리
	// [원본소스] if ($cat) $bbsque2 .= " and category='".$cat."'";
	/* <!-- */
	if ($cat)
	{
		if($cat == "수상비행기") $bbsque2 .= " and (category='수상비행기' or category='국내선지역')";
		else $bbsque2 .= " and category='".$cat."'";

	}
	/* --> */

	if ($where && $keyword)
	{
		if (strpos('[name][nic][id][ip]',$where)) $bbsque2 .= " and ".$where."='".$keyword."'";
		else if ($where == 'term') $bbsque2 .= " and d_regis like '".$keyword."%'";
		else $bbsque2 .= getSearchSql($where,$keyword,$ikeyword,'or');
	}
	$NUM = getDbRows($table[$m.'data'],$bbsque2);
	$TCD = getDbArray($table[$m.'data'],$bbsque2,'*',$sort,$orderby,$recnum,$p);
	while($_R = db_fetch_array($TCD)) $RCD[] = $_R;
}
$TPG = getTotalPage($NUM,$recnum);
?>
