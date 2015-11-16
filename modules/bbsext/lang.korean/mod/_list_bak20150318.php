<?php
if(!defined('__KIMS__')) exit;

$bbsque0 = 'site='.$s;
$bbsque1 = 'site='.$s.' and notice=1';
$bbsque2 = 'site='.$s.' and notice=0';

if ($B['uid'])
{
	$bbsque0 .= ' and bbs='.$B['uid'];
	$bbsque1 .= ' and bbs='.$B['uid'];
	$bbsque2 .= ' and bbs='.$B['uid'];
}

$RCD = array();
$RCD2 = array();
$NCD = array();



if( empty($admin_email) ) {
	$admin_email = $selected_admin = $my[name];

}

if ( $admin_email == "all" )
	$select_admin_sql = "";
else
	$select_admin_sql = " and name LIKE '%". $admin_email ."%'";

if( empty($reception) )
	$reception_sql = "";
else
	$reception_sql = " and add2 like '%" . $reception . "%' ";

$start_date = "SubString_Index( SubString_Index(add2, '||', 8), '||', -1)";
$resort = "SubString_Index( SubString_Index(add11, '||', 4), '||', -1)";
$air = "SubString_Index( SubString_Index(add11, '||', 3), '||', -1)";
$request = "SubString_Index( SubString_Index(add2, '||', 2), '||', -1)";
$travel = "SubString_Index(SubString_Index(add2, '||', 3), '||',-1)";
//$orderby = "";
$where3 = "";

if( $sort_kind == "resort" )
{
	$sort = $resort;
	$orderby = "desc";
	if( !empty($start_duration) && !empty($end_duration) )
		$where3 = " and ".$resort.">='".$start_duration."' and ".$resort."<='".$end_duration."' ";
}
else if( $sort_kind == "air" )
{
	$sort = $air;
	$orderby = "desc";
	if( !empty($start_duration) && !empty($end_duration) )
		$where3 = " and ".$air.">='".$start_duration."' and ".$air."<='".$end_duration."' ";
}
else if( $sort_kind == "start_date" )
{
	$sort = $start_date;
	$orderby = "desc";
	if( !empty($start_duration) && !empty($end_duration) )
		$where3 = " and ".$start_date.">='".$start_duration."' and ".$start_date."<='".$end_duration."' ";
}
else if( $sort_kind == "request" )
{
	$sort = $request;
	$orderby = "desc";
	if( !empty($start_duration) && !empty($end_duration) )
		$where3 = " and ".$request.">='".$start_duration."' and ".$request."<='".$end_duration."' ";
}
else if( $sort_kind == "reservation_date" )
{
	$sort = "reservation_date";
	$orderby = "desc";
	if( !empty($start_duration) && !empty($end_duration) )
		$where3 = " and reservation_date>='".$start_duration."' and reservation_date<='".$end_duration."' ";
}
else if( $sort_kind == "gid" )
{
	$sort = "reservation_date desc, gid";
	$orderby = "asc";
	if( !empty($start_duration) && !empty($end_duration) )
		$where3 = " and ".$resort.">='".$start_duration."' and ".$resort."<='".$end_duration."' ";
}
else if( $sort_kind == 'travel' )
{
	$sort = "reservation_date desc, gid";
	$orderby = "asc";
	if($search_travel) $where3 = " and {$travel} = '{$search_travel}' ";

	if( !empty($start_duration) && !empty($end_duration) )
		$where3 = " and ".$request.">='".$start_duration."' and ".$request."<='".$end_duration."' ";

} else {
	$sort = "reservation_date desc, gid";
	$orderby = "asc";
}



$where2 = $reception_sql . " and display='1'" . $select_admin_sql . $where3;

$NTC = getDbArray($table[$m.'idx'],$bbsque1,'gid','gid',$orderby,0,0);
while($_R = db_fetch_array($NTC)) $NCD[] = getDbData($table[$m.'data'],'gid='.$_R['gid'],'*');

if( $bid == "cus_manager2" )
	$bbsque2 .= $where2;

if ($sort == 'gid' && !$where2 && !$cat)
{
	$NUM = getDbCnt($table[$m.'month'],'sum(num)',$bbsque0)-count($NCD);
	$recnum = 15;
	$TCD = getDbArray($table[$m.'idx'],$bbsque2,'gid',$sort,$orderby,$recnum,$p);
	while($_R = db_fetch_array($TCD)) $RCD[] = getDbData($table[$m.'data'],'gid='.$_R['gid'],'*');

}
else {

	if ($cat) $bbsque2 .= " and category='".$cat."'";
	if ($where && $keyword)
	{
		if (strpos('[name][nic][id][ip]',$where)) $bbsque2 .= " and ".$where."='".$keyword."'";
		else if ($where == 'term') $bbsque2 .= " and d_regis like '".$keyword."%'";
		else $bbsque2 .= getSearchSql($where,$keyword,$ikeyword,'or');
	}


	$NUM = getDbRows($table[$m.'data'],$bbsque2);
	$recnum = 15;

	$TCD = getDbArray($table[$m.'data'],$bbsque2,'*',$sort,$orderby,$recnum,$p);

//	echo $table[$m.'data'] . '-' . $bbsque2;

	$today = date('Y-m-d');
	$todayArray = explode("-", $today);

	$bbsque2 .= "and reservation_date >= ". date("Y-m-d", mktime(0,0,0,$todayArray[1],$todayArray[2]-1,$todayArray[0])); 
	$TCD2 = getDbArray($table[$m.'data'],$bbsque2,'*',$sort,$orderby,1000,1);
	
//	echo $table[$m.'data'] . '-' . $bbsque2;

	while($_R = db_fetch_array($TCD)) $RCD[] = $_R;
	while($_R2 = db_fetch_array($TCD2)) $RCD2[] = $_R2;
// echo $bbsque2;
}

$TPG = getTotalPage($NUM,$recnum);

?>
