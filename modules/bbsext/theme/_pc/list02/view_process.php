<?php 
extract($_POST);
extract($_GET);


$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}
$category = urldecode($_GET['category']);
$uid = $_GET['uid'];
$reservation_date = $_GET['reservation_date'];
$reservation_data = iconv('utf-8','euc-kr',$_GET['reservation_data']);

if( $category == "상담종료" )
{
	$sql = mysql_query("SELECT * FROM rb_bbsext_data where uid = $uid;");
	$rs = mysql_fetch_array($sql);
	
	if( $rs[category] == "계약완료" )
	{
		$qrys = "UPDATE `trevia`.`rb_bbsext_data` SET `category` = '계약취소' WHERE `rb_bbsext_data`.`uid` = $uid;"; 
		$m_sql = mysql_query($qrys);
	} else if ( $category != "" )
	{
		$qrys = "UPDATE `trevia`.`rb_bbsext_data` SET `category` = '$category' WHERE `rb_bbsext_data`.`uid` = $uid;"; 
		$m_sql = mysql_query($qrys);
	}
}
else if( $category != "" )
{
	$qrys = "UPDATE `trevia`.`rb_bbsext_data` SET `category` = '$category' WHERE `rb_bbsext_data`.`uid` = $uid;"; 
	$m_sql = mysql_query($qrys);
} else {
	$qrys = "UPDATE `trevia`.`rb_bbsext_data` SET `reservation_date` = '$reservation_date', `reservation_data` = '$reservation_data'  WHERE `rb_bbsext_data`.`uid` = $uid;"; 
	$m_sql = mysql_query($qrys);
}

//echo $qrys;
?>

<script>
	location.href="http://www.himaldives.co.kr/?r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>";
</script>
