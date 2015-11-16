<?
$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";
if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}
mysql_query("set names euckr");
$uid = 200;

$m_sql = mysql_query("SELECT * FROM rb_extra where uid = '".$uid."' ");
$m_rs = mysql_fetch_array($m_sql);


$info = explode("||", $m_rs[info]);
$resort1_memo = explode("||", $m_rs[resort1_memo]);
$resort2_memo = explode("||", $m_rs[resort2_memo]);
$resort3_memo = explode("||", $m_rs[resort3_memo]);
$resort4_memo = explode("||", $m_rs[resort4_memo]);
$resort5_memo = explode("||", $m_rs[resort5_memo]);

$air1_a = explode("||", $m_rs[air1_price]);
$air2_a = explode("||", $m_rs[air2_price]);
$air3_a = explode("||", $m_rs[air3_price]);

print_r($info);

$sql = mysql_query("SELECT * FROM rb_s_mbrdata where name = '"."Àåµ¿°Ç"."' and admin=1;");
$man = mysql_fetch_array($sql);

echo "<pre>";
print_r($man);
echo "</pre>";
echo $man[tel2];
?>