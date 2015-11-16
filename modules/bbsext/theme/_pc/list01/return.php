<!-- 접수완료 페이지 (2011/05/03) -->
<?php
	$ndate = date('Y-m-d H:i:s');
	$qrys = "update rb_bbsext_data set add13 = '".$ndate."' where uid = '".$_GET[uid]."' ";



//메일전송 업데이트
$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";


if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}



		$m_sql = mysql_query($qrys);

	//echo $content;exit;
?>

<html>
<head>
<title>▒  trevia.co.kr  ▒</title>
<meta http-equiv="Content-Type" content="text/html; charset=euckr"/>
</head>
<body>

<script>
	alert('계약서 내용에 동의완료 하였습니다.');
	self.close();
</script>
</body>
</html>
