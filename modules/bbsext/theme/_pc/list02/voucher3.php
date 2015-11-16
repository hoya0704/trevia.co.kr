<meta charset="euc-kr" />
<script src="/lib/jquery-1.4.4.js"></script>
<?
//print_r($_POST);
//	echo  $_POST['email_flag'] . '|' . $_POST[admin_email].'|'.$_POST[admin_name] . '|' . $user[5].'|'.$user[1];

function getUTFtoKR($str)
{
	return iconv('utf-8','euc-kr',$str);
}


function getSendMail($to,$from,$subject,$content,$html) 
{
	if ($html == 'TEXT') $content = nl2br(htmlspecialchars($content));
	$to_exp   = explode('|', $to);
	$from_exp = explode('|', $from);
	$To = $to_exp[0]; //$to_exp[1] ? "\"".getUTFtoKR($to_exp[1])."\" <$to_exp[0]>" :
	$Frm = $from_exp[0];  //$from_exp[1] ? "\"".getUTFtoKR($from_exp[1])."\" <$from_exp[0]>" :
	$Header = "From:$Frm\nReply-To:$Frm\nX-Mailer:PHP/".phpversion();
	$Header.= "\nContent-Type:text/html;charset=EUC-KR\r\n"; 
//	echo $To.'-'.$subject.'-'.$content.'-'.$Header.'-'.'-f '.$Frm;
	return @mail($To,$subject,$content,$Header,"-f $Frm");
}

$month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

$seq = $_POST['seq'];

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$resort_uid = empty($_POST['resort_uid']) ? $_POST['resort1'] : $_POST['resort_uid'];
//echo $resort_uid;
$sql = "SELECT * FROM rb_voucher_data where bbsext_uid='". $bbsext_uid ."' and resort_uid='".$resort_uid."';";
$m_sql = mysql_query($sql);
$m_rs1 = mysql_fetch_array($m_sql);

if( empty( $m_rs1 ) )
{
	$uid = "";
}
else 
{
	$uid = $m_rs1[uid];
}

//echo $sql . '<br />' . $resort_uid . ' - ' . $bbsext_uid . ' - ' . $uid;

$sql = "SELECT * FROM rb_bbs_data where bbsid='resort' and uid='".$resort_uid."';";
$m_sql = mysql_query($sql);
$m_rs1 = mysql_fetch_array($m_sql);

//print_r($m_rs1);

$adddata = unserialize($m_rs1[adddata]);

if( !empty($_POST['sbj_address']) )
	$adddata['sbj_address'] = urlencode(iconv('euc-kr','utf-8', $_POST['sbj_address']));
if( !empty($_POST['sbj_tel']) )
	$adddata['sbj_tel'] = urlencode(iconv('euc-kr','utf-8', $_POST['sbj_tel']));
if( !empty($_POST['sbj_fax']) ) 
	$adddata['sbj_fax'] = urlencode(iconv('euc-kr','utf-8', $_POST['sbj_fax']));

if(is_array($adddata))
{
	foreach($adddata as $key => $value)
	{
		//$adddata[$key] = stripslashes(iconv('utf-8','euc-kr',urldecode($value)));
	}
}


$adddata = serialize($adddata);
//print_r($adddata);

$sql = "update rb_bbs_data set adddata='".$adddata."' where uid='".$resort_uid."';";
//echo $sql;

$m_sql = mysql_query($sql);

$sql = "select * from rb_bbs_data where uid=".$resort_uid."';";
$m_sql = mysql_query($sql);

$adddata = unserialize($adddata);

if(is_array($adddata))
{
	foreach($adddata as $key => $value)
	{
		$adddata[$key] = stripslashes(iconv('utf-8','euc-kr',urldecode($value)));
	}
}
//print_r($adddata);
if ( empty( $uid ) )
{
	$sql = "insert into rb_voucher_data (bbsext_uid, resort_uid, resort_name, remark, pickup, reg_date, reg_flag) values (";
	$sql .= $bbsext_uid . "," . $resort_uid . ", '" . $_POST['resort_name'] . "', '" . $_POST['remark'] . "', '" . $_POST['pickup'] . "', '";
	$sql .= date('Y-m-d H:i:s') . "', 'Y')";

	$m_sql = mysql_query($sql);

//	echo $sql;
}
else 
{
	$sql = "update rb_voucher_data set remark = '" . $_POST['remark'] . "', pickup = '" . $_POST['pickup'] . "', resort_name = '" . $_POST['resort_name'] . "' ";
	$sql .= "where uid = " . $uid;

	$m_sql = mysql_query($sql);

//	echo $sql;
}

$address = $adddata[sbj_address] == "주소를 입력해주세요" ? "" : $adddata[sbj_address];
$tel = $adddata[sbj_tel] == "전화번호를 입력해주세요" ? "" : $adddata[sbj_tel];
$fax = $adddata[sbj_fax] == "FAX번호를 입력해주세요" ? "" : ', '.$adddata[sbj_fax];

$exm_sql = mysql_query("SELECT * FROM rb_bbsext_data where uid = '".$_POST['bbsext_uid']."' ");
$exm_rs = mysql_fetch_array($exm_sql);

//	print_r($exm_rs);

$user = explode("||", $exm_rs['add3']);

$resort = explode("||", $exm_rs['add8']);

$check = explode("||", $exm_rs['adddata']);

$days = explode("-", $check[$seq/6]);

$afterdays = explode("-", date("Y-m-d", strtotime($check[$seq/6]." ". $resort[$seq+2]." day")));


$content = '<center>
<div id="idPrint">
<table width="800" style="margin:0;padding:0;" cellspacing="0" border="0">
	<tr>
		<td colspan="4"><img src="http://trevia.co.kr/layouts/newtrevia/image/logo.gif" /> </td>
	</tr>
	<tr>
		<td height="80" colspan="4"><center><h1><b>HOTEL VOUCHER</b></h1></center></td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Hotel Reservation Summary</b></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><b>'.$adddata[sbj_eng].'</b></td>
		<td>Confirmation No</td>
		<td><b>'.$resort[$seq+5].'</b></td>
	</tr>
	<tr>
		<td height="30" colspan="2">'.$address.'</td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td height="30" colspan="2" style="border-bottom-style:solid; border-width:1">Phone : '.$tel.$fax.' </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1" align="right"></td>
	</tr>
	<tr>
		<td height="30" colspan="4"> </td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Service Description</b> </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1">Check-IN </td>
		<td style="border-bottom-style:solid; border-width:1">Check-OUT </td>
		<td colspan="2" style="border-bottom-style:solid; border-width:1">Room Type </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:4">'.$days[2] . "-" . $month[intval($days[1]) -1] . "-" . $days[0].' </td>
		<td style="border-bottom-style:solid; border-width:4">'.$afterdays[2] . "-" . $month[intval($afterdays[1]) -1] . "-" . $afterdays[0].' </td>
		<td width="400" colspan="2" style="border-bottom-style:solid; border-width:4">'.$resort[$seq+1].' </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1">Guests </td>
		<td style="border-bottom-style:solid; border-width:1">Rooms </td>
		<td style="border-bottom-style:solid; border-width:1">Nights </td>
		<td style="border-bottom-style:solid; border-width:1">Board Base </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1" id="guest"> </td>
		<td style="border-bottom-style:solid; border-width:1">1 </td>
		<td style="border-bottom-style:solid; border-width:1">'.$resort[$seq+2].' </td>
		<td style="border-bottom-style:solid; border-width:1">'.$resort[$seq+3].' </td>
	</tr>
	<tr>
		<td height="30" colspan="4"> </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:4"><b>Guests Info</b> </td>
		<td style="border-bottom-style:solid; border-width:4"> </td>
		<td style="border-bottom-style:solid; border-width:4"> </td>
		<td style="border-bottom-style:solid; border-width:4"> </td>
	</tr>
'; 

$guestCount = 0;
$i = 0;
while ( !empty($user[$i+1]) ) { 
	$content .= '<tr>
			<td height="30"><b>'.$user[$i].'</b> </td>
			<td>'.$user[$i+2].' </td>
			<td> </td>
			<td> </td>
		</tr>';
	$guestCount++;
	$i += 6;
}

$content .= '<script>
	$("#guest").html('.$guestCount.');
</script>
	<tr>
		<td height="1" style="border-bottom-style:solid; border-width:1"></td>
		<td style="border-bottom-style:solid; border-width:1"></td>
		<td style="border-bottom-style:solid; border-width:1"></td>
		<td style="border-bottom-style:solid; border-width:1"></td>
	</tr>
	<tr>
		<td height="30" colspan="4"> </td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Remarks</b> </td>
	</tr>
	<tr>
		<td height="30" colspan="4">
		<pre>'.$_POST['remark'].'</pre>
		</td>
	</tr>
	<tr>
		<td height="100" style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
	</tr>
	<tr>
		<td height="30" colspan="4"></td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Pick Up & Sending</b> </td>
	</tr>
	<tr>
		<td height="150" colspan="4" style="border-bottom-style:solid; border-width:4">
		<pre>'.$_POST['pickup'].'</pre>
		</td>
	</tr>
	<tr>
		<td height="80" colspan="4" style="border-bottom-style:solid; border-width:1">
			&nbsp; TREVIA CO.LTD (주식회사트레비아) <br/> 
			&nbsp; 3rd Floor. Mirinae B/D, 480-10, Seokyo-dong, Mapo-gu, Seoul, Korea <br/> 
			&nbsp; Phone : (82)-1644-6681, (82)-70-4324-4400, (82)-70-4324-4442 <br/> 
			&nbsp; Email : usa@trevia.co.kr, Kakao ID : wiseways
		</td>
	</tr>
	<tr>
		<td height="30" colspan="4" align="right"><b>Thank you for booking with TREVIA CO.LTD</b> </td>
	</tr>
</table>
</div>
</center>';


if( $_POST['print_flag'] == "" && $_POST['email_flag'] == "" )
{
?>
<script>
	alert("저장이 완료되었습니다.");
    location.href="voucher.php?uid=<?=$bbsext_uid?>&seq=<?=$seq?>&admin_email=<?=$_POST[admin_email]?>&admin_name=<?=$_POST[admin_name]?>";
</script>
<?
} else if ( $_POST['print_flag'] == "true" ) {

?>
<script language="JavaScript">
   var initBody
   function beforePrint(){
   initBody = document.body.innerHTML;
   document.body.innerHTML = idPrint.innerHTML;
       }
   function afterPrint(){
       document.body.innerHTML = initBody;
      }
   function printArea() {
       window.print();
      }
      window.onbeforeprint = beforePrint;
      window.onafterprint = afterPrint;

 function printWindow()
 {
  factory.printing.header       = ""
  factory.printing.footer       = ""
  factory.printing.portrait     = true // true 세로출력 , false 가로출력
  factory.printing.leftMargin   = 10
  factory.printing.topMargin    = 10
  factory.printing.rightMargin  = 10
  factory.printing.bottomMargin = 10

  factory.printing.Print( false, window ) // 대화상자 표시여부 / 출력될 프레임명

	alert("프린트가 완료 되었습니다.");
    location.href="voucher.php?uid=<?=$bbsext_uid?>&seq=<?=$seq?>&admin_email=<?=$_POST[admin_email]?>&admin_name=<?=$_POST[admin_name]?>";
 }
  
</script>
<body onload="printWindow();">
<object id="factory" style="display:none"
classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814"
  codebase="/smsx.cab#Version=7.4.0.8">
</object>

<?=$content?>

</body>
<?
} else if ( $_POST['email_flag'] == "true" ) {
	getSendMail('ok@trevia.co.kr|'.$user[1] , $_POST[admin_email].'|'.$_POST[admin_name], $user[1]."님의 ".$adddata[sbj_eng]." 바우처 입니다. [주식회사 트레비아, 하이몰디브]", $content, 'HTML');
	getSendMail('jacos15@lycos.co.kr|'.$user[1] , $_POST[admin_email].'|'.$_POST[admin_name], $user[1]."님의 ".$adddata[sbj_eng]." 바우처 입니다. [주식회사 트레비아, 하이몰디브]", $content, 'HTML');
	getSendMail($_POST[admin_email].'|'.$_POST[admin_name] , $_POST[admin_email].'|'.$_POST[admin_name], $user[1]."님의 ".$adddata[sbj_eng]." 바우처 입니다. [주식회사 트레비아, 하이몰디브]", $content, 'HTML');
/*
	getSendMail($user[5].'|'.$user[1] , $_POST[admin_email].'|'.$_POST[admin_name], $user[1]."님의 ".$adddata[sbj_eng]." 바우처 입니다. [주식회사 트레비아, 하이몰디브]", $content, 'HTML');
	if( !empty($user[11]) ) {
		getSendMail($user[11].'|'.$user[1] , $_POST[admin_email].'|'.$_POST[admin_name], $user[1]."님의 ".$adddata[sbj_eng]." 바우처 입니다. [주식회사 트레비아, 하이몰디브]", $content, 'HTML');
	}
*/
?>

<script>
	alert("메일보내기가 완료되었습니다.");
    location.href="voucher.php?uid=<?=$bbsext_uid?>&seq=<?=$seq?>&admin_email=<?=$_POST[admin_email]?>&admin_name=<?=$_POST[admin_name]?>";
</script>
<?
}
?>