<?

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$m_sql = mysql_query("DELETE FROM `trevia`.`rb_voucher_data` WHERE `rb_voucher_data`.`uid` = " . $_GET['uid']);


?>
<script>
	alert("바우처가 삭제 되었습니다. 창을 닫습니다.");
	window.close();
</script>