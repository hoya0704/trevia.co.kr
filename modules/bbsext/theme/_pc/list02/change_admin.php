<?php extract($_POST);

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}


$qrys = "UPDATE `trevia`.`rb_bbsext_data` SET `name` = '". trim(iconv('utf-8','euc-kr',$_POST[selected_admin])) ."' WHERE `rb_bbsext_data`.`uid` = " . $_POST[uid] . " ;"; 

$m_sql = mysql_query($qrys);

$addparam = "&p=".$p;
if( !empty( $admin_email ) )
	$addparam .= "&admin_email=".$admin_email;
if( !empty( $sort_kind ) )
	$addparam .= "&sort_kind=".$sort_kind;
if( !empty( $start_duration ) )
	$addparam .= "&start_duration=".$start_duration;
if( !empty( $end_duration ) )
	$addparam .= "&end_duration=".$end_duration;

?>
<script>
	
	location.href="http://www.himaldives.co.kr/?r=maldives&m=bbsext&bid=cus_manager2<?=$addparam?>";
</script>








