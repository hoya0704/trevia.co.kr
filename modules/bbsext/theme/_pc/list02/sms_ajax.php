<?php session_start();

//		if($_SESSION['SMS_DATE']):
//			$temp = time() - $_SESSION['SMS_DATE'];
//			if($temp <= 60 && $_SESSION['SMS_TEL'] == $_POST['send_tel_0']):
//				echo "<script type='text/javascript'>";
//				echo	"alert('" . iconv('utf-8','euc-kr',(60-$temp) . "초 후, 문자발송 가능합니다.") . "');";
//				echo	"history.back(-1);";
//				echo "</script>";
//				exit;
//			endif;
//			unset($_SESSION['SMS_DATE']);
//		endif;
//		$_SESSION['SMS_DATE'] = time();
//		$_SESSION['SMS_TEL'] = $_POST['send_tel_0'];
//		extract($_POST);

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

function getSendSMS($frame,$form,$cpnumber,$title,$content,$xms="sms")
{
//	$cpnumber = "01089997157";
	echo "<iframe name='".$frame."' width='0' height='0' frameborder='0' scrolling='no'></iframe>";
	echo "<form name='".$form."' method='post' action='".$g['s']."/sms/send.php' target='".$frame."'>";
	echo "	<input type='hidden' name='xms' value='".$xms."' />";
	echo "	<input type='hidden' name='title' value='".iconv('utf-8','euc-kr',$title)."' />";
	echo "	<input type='hidden' name='cpnumber' value='".str_replace('-','',$cpnumber)."' />";
	echo "	<input type='hidden' name='content' value='".$content."' />";	
	echo "</form>";
	echo "";
	echo "<script type='text/javascript'>";
	echo "	document.".$form.".submit();";
	echo "</script>";
}

$tels = "";

for($i = 0; $i <= 1; $i++)
{
	if( !empty($_POST['send_tel_'.$i]) && $_POST['check_tel_'.$i] == "on" )
	{
		if( $i != 0 )
			$tels = $tels . ",";

		$tel = "";
		$tel = str_replace('-','',$_POST['send_tel_'.$i]);

//		$tel = "01089997157";

		$key = "cp,writer,receiver,content,send_date,from_type";

if( $flag == "true" )
		$val = "'".$tel."','".$myuid."','".$receiver."','".urldecode($smsText)."','".date("YmdHis")."','batch'";
else
		$val = "'".$tel."','".$myuid."','".$receiver."','".trim(iconv('utf-8','euc-kr',$smsText))."','".date("YmdHis")."','batch'";

		$qrys = "insert into rb_sms_history ( " . $key . " ) values ( " . $val . " );"; 
		
	    $m_sql = mysql_query($qrys);

		$tels = $tels . $tel;
	}
}


if( $flag == "true" )
	getSendSMS("_sms","sms",$tels,"대량전송(관리자)", $smsText, $xms);
else 
	getSendSMS("_sms","sms",$tels,"대량전송(관리자)", urlencode(iconv('utf-8','euc-kr',$smsText)), $xms);





?>
<script>
//	alert(<?=iconv('utf-8','euc-kr',"문자전송이 완료되었습니다")?>);
//	if( <?=$r?> )
		location.href="http://www.himaldives.co.kr/?r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>";
//	 window.history.back(-1);	
</script>