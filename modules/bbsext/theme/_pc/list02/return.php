<!-- �����Ϸ� ������ (2011/05/03) -->
<?php
	$ndate = date('Y-m-d H:i:s');
	if( $_GET[mobile] == 1 )
		$mobile = "(M)";
	else
		$mobile = "-";

	$qrys = "update rb_contract_data set reply_date = '".$ndate."', ip = '".$_SERVER['REMOTE_ADDR'].$mobile."' where uid = '".$_GET[uid]."' ";

//echo $qrys . "<br/>";

$puid = $_GET[puid];

//�������� ������Ʈ
$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";


if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}



		$m_sql = mysql_query($qrys);


	$category = "���Ϸ�";
	$qrys = "UPDATE `trevia`.`rb_bbsext_data` SET `category` = '".$category."' WHERE `rb_bbsext_data`.`uid` = ".$puid.";"; 
	$m_sql = mysql_query($qrys);

//	echo $qrys;
?>

<html>
<head>
<title>��  trevia.co.kr  ��</title>
<meta http-equiv="Content-Type" content="text/html; charset=euckr"/>
</head>
<body>

<script>
	alert('��༭ ���뿡 ���ǿϷ� �Ͽ����ϴ�.');
	location.href="http://trevia.co.kr";

</script>
</body>
</html>
