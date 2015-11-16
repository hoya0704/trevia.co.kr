<?php 

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$today = date("Y-m-d H:i:s");
$qrys = "INSERT INTO `trevia`.`rb_s_block_ipaddress` (`name`, `ip`, `block`, `reg_date`) VALUES ('$_GET[name]','$_GET[ip]','0','$today');"; 
$m_sql = mysql_query($qrys);

exec("/sbin/iptables -A INPUT -s $ip -j DROP");
//echo $qrys;
?>

<script>
	alert('차단요청이 완료되었습니다.');
	location.href="http://www.himaldives.co.kr/?r=<?=$_GET[r]?>&m=<?=$_GET[m]?>&bid=<?=$_GET[bbsid]?>&uid=<?=$uid?>";
</script>
