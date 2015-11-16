<!-- 접수완료 페이지 (2011/05/03) -->
<?php


function getSendSMS($frame,$form,$cpnumber,$title,$content,$xms="sms")
{
	if( $_POST['save_flag'] == "true" ) { return;}

	echo "<iframe name='".$frame."' width='0' height='0' frameborder='0' scrolling='no'></iframe>";
	echo "<form name='".$form."' method='post' action='".$g['s']."/sms/send.php' target='".$frame."'>";
	echo "	<input type='hidden' name='xms' value='".$xms."' />";
	echo "	<input type='hidden' name='title' value='".urlencode($title)."' />";
	echo "	<input type='hidden' name='cpnumber' value='".str_replace('-','',$cpnumber)."' />";
	echo "	<input type='hidden' name='content' value='".urlencode($content)."' />";	
	echo "</form>";
	echo "";
	echo "<script type='text/javascript'>";
	echo "	document.".$form.".submit();";
	//echo "	alert('".$content."');";
	echo "</script>";
}


//메일전송 업데이트
$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";
if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}
mysql_query("set names euckr");

$m_sql = mysql_query("SELECT * FROM rb_bbsext_data where uid = '".$puid."' ");
$m_rs = mysql_fetch_array($m_sql);

$add1 = explode("||", $m_rs[add1]);
$add2 = explode("||", $m_rs[add2]);
$add3 = explode("||", $m_rs[add3]);
$add4 = explode("||", $m_rs[add4]);
$add5 = explode("||", $m_rs[add5]);
$add6 = explode("||", $m_rs[add6]);
$add7 = explode("||", $m_rs[add7]);
$add8 = explode("||", $m_rs[add8]);
$add9 = explode("||", $m_rs[add9]);
$add10 = explode("||", $m_rs[add10]);
$add11 = explode("||", $m_rs[add11]);
$add13 = explode("||", $m_rs[add13]);

$admin_email = $m_rs[id];
$admin_name = $m_rs[name];

function getUTFtoKR($str)
{
	return iconv('utf-8','euc-kr',$str);
//	return $str;
}

// 2015.02.27 kim hee sung 첨부파일 기능 추가
include 'mail.lib.php';
//function getSendMail($to,$from,$subject,$content,$html) 
//{
//	if( $_POST['save_flag'] == "true" ) { return;}
//
//	if ($html == 'TEXT') $content = nl2br(htmlspecialchars($content));
//	$to_exp   = explode('|', $to);
//	$from_exp = explode('|', $from);
//	$To =  $to_exp[0]; //$to_exp[1] ? "\"".getUTFtoKR($to_exp[1])."\" <$to_exp[0]>" :
//	$Frm =  $from_exp[0]; //$from_exp[1] ? "\"".getUTFtoKR($from_exp[1])."\" <$from_exp[0]>" :
//	$Header = "From:$Frm\nReply-To:$Frm\nX-Mailer:PHP/".phpversion();
//	$Header.= "\nContent-Type:text/html;charset=EUC-KR\r\n"; 
//	return @mail($To,getUTFtoKR($subject),$content,$Header,"-f $Frm");
//}


$content = "



<TABLE border=0 cellSpacing=0 cellPadding=0 width=730 bgColor=#ffffff>
  <TBODY>
  <TR>
    <TD width=25></TD>
    <TD width=680>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=680>
        <TBODY>
        <TR>
          <TD style='background-color:#3399ff; height:45px; width:680px;text-align:center;' >
            <h3>'허니문 여행은 트레비아~입니다.'</h3>
		  </TD></TR>
        <TR>
          <TD style='font-size:12px; line-height:15px; padding:20px 0 20px 0;'>
            <P align=left>".getUTFtoKR($subject)."</P>
            <P align=left>".getUTFtoKR(nl2br($memo1))."</P>
            <P align=left>".getUTFtoKR(nl2br($memo2))."</P></TD></TR>
        <TR></TR>
        <TR>
          <TD style='background-color:#fff; height:20px;'></TD></TR>
        <TR>
          <TD style='background-color:#fff799; height:35px; font-weight:bold; font-size:12px; padding:0px 0 0 10px;'>AIRPLANE 
            Schedule (항공일정안내)</TD></TR>
        <TR>
          <TD style='background-color:#fff; height:10px;'></TD></TR>
        <TR>			
			";


if($air1){
	$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$air1' ");
	$air_r1 = mysql_fetch_array($m_sqla);

		$add11 = explode("||", $air_r1[add11]);	
		$add12 = explode("||", $air_r1[add12]);	
		$add13 = explode("||", $air_r1[add13]);	
		$add14 = explode("||", $air_r1[add14]);	
		$add15 = explode("||", $air_r1[add15]);	
		$add16 = explode("||", $air_r1[add16]);	
		$add17 = explode("||", $air_r1[add17]);	
		$add18 = explode("||", $air_r1[add18]);	
		$add21 = explode("||", $air_r1[add21]);	
		$add22 = explode("||", $air_r1[add22]);	
		$add23 = explode("||", $air_r1[add23]);	
		$add24 = explode("||", $air_r1[add24]);	
		$add25 = explode("||", $air_r1[add25]);	
		$add26 = explode("||", $air_r1[add26]);	
		$add27 = explode("||", $air_r1[add27]);	
		$add28 = explode("||", $air_r1[add28]);	
	
	$content.="
		 <TR>
          <TD>

            <TABLE cellSpacing=1 cellPadding=0 style='width:680px; background-color:#e6e6e6; border:1px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR bgColor=#ffff99>
                <TD height=30 colSpan=7 ><b>".$air_r1[subject]."</b></TD></TR>
              <TR>
                <TD height=20 width=110>일정</TD>
                <TD height=20 width=110>출발지</TD>
                <TD width=110>도착지</TD>
                <TD width=118>편명</TD>
                <TD width=110>출발시간</TD>
                <TD width=110>도착시간</TD>
                <TD width=115>항공시간</TD></TR>";
	if($add11[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker1."</TD>
					<TD height=20>".$add11[0]."</TD>
					<TD>".$add11[1]."</TD>
					<TD>".$add11[2]."</TD>
					<TD>".$add11[3]."</TD>
					<TD>".$add11[4]."</TD>
					<TD>".$add11[5]."</TD></TR>";
	}
	if($add12[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker2."</TD>
					<TD height=20>".$add12[0]."</TD>
					<TD>".$add12[1]."</TD>
					<TD>".$add12[2]."</TD>
					<TD>".$add12[3]."</TD>
					<TD>".$add12[4]."</TD>
					<TD>".$add12[5]."</TD></TR>";
	}
	if($add13[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker3."</TD>
					<TD height=20>".$add13[0]."</TD>
					<TD>".$add13[1]."</TD>
					<TD>".$add13[2]."</TD>
					<TD>".$add13[3]."</TD>
					<TD>".$add13[4]."</TD>
					<TD>".$add13[5]."</TD></TR>";
	}
	if($add14[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker4."</TD>
					<TD height=20>".$add14[0]."</TD>
					<TD>".$add14[1]."</TD>
					<TD>".$add14[2]."</TD>
					<TD>".$add14[3]."</TD>
					<TD>".$add14[4]."</TD>
					<TD>".$add14[5]."</TD></TR>";
	}
	if($add15[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker5."</TD>
					<TD height=20>".$add15[0]."</TD>
					<TD>".$add15[1]."</TD>
					<TD>".$add15[2]."</TD>
					<TD>".$add15[3]."</TD>
					<TD>".$add15[4]."</TD>
					<TD>".$add15[5]."</TD></TR>";
	}
	if($add16[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker6."</TD>
					<TD height=20>".$add16[0]."</TD>
					<TD>".$add16[1]."</TD>
					<TD>".$add16[2]."</TD>
					<TD>".$add16[3]."</TD>
					<TD>".$add16[4]."</TD>
					<TD>".$add16[5]."</TD></TR>";
	}
	if($add17[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker7."</TD>
					<TD height=20>".$add17[0]."</TD>
					<TD>".$add17[1]."</TD>
					<TD>".$add17[2]."</TD>
					<TD>".$add17[3]."</TD>
					<TD>".$add17[4]."</TD>
					<TD>".$add17[5]."</TD></TR>";
	}
	if($add18[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker8."</TD>
					<TD height=20>".$add18[0]."</TD>
					<TD>".$add18[1]."</TD>
					<TD>".$add18[2]."</TD>
					<TD>".$add18[3]."</TD>
					<TD>".$add18[4]."</TD>
					<TD>".$add18[5]."</TD></TR>";
	}
	$content.="
				  <TR>
					<TD height=30 colSpan=7>".$air_r1[content]."</TD></TR>";

	if($add21[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker9."</TD>
					<TD height=20>".$add21[0]."</TD>
					<TD>".$add21[1]."</TD>
					<TD>".$add21[2]."</TD>
					<TD>".$add21[3]."</TD>
					<TD>".$add21[4]."</TD>
					<TD>".$add21[5]."</TD></TR>";
	}
	if($add22[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker10."</TD>
					<TD height=20>".$add22[0]."</TD>
					<TD>".$add22[1]."</TD>
					<TD>".$add22[2]."</TD>
					<TD>".$add22[3]."</TD>
					<TD>".$add22[4]."</TD>
					<TD>".$add22[5]."</TD></TR>";
	}
	if($add23[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker11."</TD>
					<TD height=20>".$add23[0]."</TD>
					<TD>".$add23[1]."</TD>
					<TD>".$add23[2]."</TD>
					<TD>".$add23[3]."</TD>
					<TD>".$add23[4]."</TD>
					<TD>".$add23[5]."</TD></TR>";
	}
	if($add24[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker12."</TD>
					<TD height=20>".$add24[0]."</TD>
					<TD>".$add24[1]."</TD>
					<TD>".$add24[2]."</TD>
					<TD>".$add24[3]."</TD>
					<TD>".$add24[4]."</TD>
					<TD>".$add24[5]."</TD></TR>";
	}
	if($add25[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker13."</TD>
					<TD height=20>".$add25[0]."</TD>
					<TD>".$add25[1]."</TD>
					<TD>".$add25[2]."</TD>
					<TD>".$add25[3]."</TD>
					<TD>".$add25[4]."</TD>
					<TD>".$add25[5]."</TD></TR>";
	}
	if($add26[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker14."</TD>
					<TD height=20>".$add26[0]."</TD>
					<TD>".$add26[1]."</TD>
					<TD>".$add26[2]."</TD>
					<TD>".$add26[3]."</TD>
					<TD>".$add26[4]."</TD>
					<TD>".$add26[5]."</TD></TR>";
	}
	if($add27[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker15."</TD>
					<TD height=20>".$add27[0]."</TD>
					<TD>".$add27[1]."</TD>
					<TD>".$add27[2]."</TD>
					<TD>".$add27[3]."</TD>
					<TD>".$add27[4]."</TD>
					<TD>".$add27[5]."</TD></TR>";
	}
	if($add28[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker16."</TD>
					<TD height=20>".$add28[0]."</TD>
					<TD>".$add28[1]."</TD>
					<TD>".$add28[2]."</TD>
					<TD>".$add28[3]."</TD>
					<TD>".$add28[4]."</TD>
					<TD>".$add28[5]."</TD></TR>";
	}
	$content.="
				</TBODY></TABLE>
			  </TD>
			</TR>

		<!----------------------------항공일정1 end-------------------->
		";
$content.="
				<TR>
				  <TD>

				<TABLE style='WIDTH: 680px; border:0px; background-color:#e6e6e6; text-align:center; font-size:12px;' cellSpacing=1 cellPadding=0>
				  <TBODY>
				  <TR>
					<TD height=30 width=130>항공권 가격/인</TD>";
if($air1_b=='1') 
{
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air1_a + $air1_c)."[유류할증료포함]&nbsp;</TD><TD></TD><TD></TD>";
} else {
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air1_a)."</TD>
		<TD>
			유류할증료(예상)
		</TD>
		<TD>
			".number_format($air1_c)."
		</TD>";
}
	$content.="				  </TR>

				  </TBODY>
				</TABLE>
			  
			  </TD>
			</TR>";
}
	
if($air2){
	$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$air2' ");
	$air_r2 = mysql_fetch_array($m_sqla);

		$add11 = explode("||", $air_r2[add11]);	
		$add12 = explode("||", $air_r2[add12]);	
		$add13 = explode("||", $air_r2[add13]);	
		$add14 = explode("||", $air_r2[add14]);	
		$add15 = explode("||", $air_r2[add15]);	
		$add16 = explode("||", $air_r2[add16]);	
		$add17 = explode("||", $air_r2[add17]);	
		$add18 = explode("||", $air_r2[add18]);	
		$add21 = explode("||", $air_r2[add21]);	
		$add22 = explode("||", $air_r2[add22]);	
		$add23 = explode("||", $air_r2[add23]);	
		$add24 = explode("||", $air_r2[add24]);	
		$add25 = explode("||", $air_r2[add25]);	
		$add26 = explode("||", $air_r2[add26]);	
		$add27 = explode("||", $air_r2[add27]);	
		$add28 = explode("||", $air_r2[add28]);	
	
	$content.="
		  <!---------------항공일정2 -------------->
		 <TR>
          <TD>

            <TABLE cellSpacing=1 cellPadding=0 style='width:680px; background-color:#e6e6e6; border:1px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR bgColor=#ffff99>
                <TD height=30 colSpan=6 ><b>".$air_r2[subject]."</b></TD></TR>
              <TR>
                <TD height=20 width=110>일정</TD>
                <TD height=20 width=110>출발지</TD>
                <TD width=110>도착지</TD>
                <TD width=118>편명</TD>
                <TD width=110>출발시간</TD>
                <TD width=110>도착시간</TD>
                <TD width=115>항공시간</TD></TR>";
	if($add11[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker17."</TD>
					<TD height=20>".$add11[0]."</TD>
					<TD>".$add11[1]."</TD>
					<TD>".$add11[2]."</TD>
					<TD>".$add11[3]."</TD>
					<TD>".$add11[4]."</TD>
					<TD>".$add11[5]."</TD></TR>";
	}
	if($add12[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker18."</TD>
					<TD height=20>".$add12[0]."</TD>
					<TD>".$add12[1]."</TD>
					<TD>".$add12[2]."</TD>
					<TD>".$add12[3]."</TD>
					<TD>".$add12[4]."</TD>
					<TD>".$add12[5]."</TD></TR>";
	}
	if($add13[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker19."</TD>
					<TD height=20>".$add13[0]."</TD>
					<TD>".$add13[1]."</TD>
					<TD>".$add13[2]."</TD>
					<TD>".$add13[3]."</TD>
					<TD>".$add13[4]."</TD>
					<TD>".$add13[5]."</TD></TR>";
	}
	if($add14[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker20."</TD>
					<TD height=20>".$add14[0]."</TD>
					<TD>".$add14[1]."</TD>
					<TD>".$add14[2]."</TD>
					<TD>".$add14[3]."</TD>
					<TD>".$add14[4]."</TD>
					<TD>".$add14[5]."</TD></TR>";
	}
	if($add15[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker21."</TD>
					<TD height=20>".$add15[0]."</TD>
					<TD>".$add15[1]."</TD>
					<TD>".$add15[2]."</TD>
					<TD>".$add15[3]."</TD>
					<TD>".$add15[4]."</TD>
					<TD>".$add15[5]."</TD></TR>";
	}
	if($add16[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker22."</TD>
					<TD height=20>".$add16[0]."</TD>
					<TD>".$add16[1]."</TD>
					<TD>".$add16[2]."</TD>
					<TD>".$add16[3]."</TD>
					<TD>".$add16[4]."</TD>
					<TD>".$add16[5]."</TD></TR>";
	}
	if($add17[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker23."</TD>
					<TD height=20>".$add17[0]."</TD>
					<TD>".$add17[1]."</TD>
					<TD>".$add17[2]."</TD>
					<TD>".$add17[3]."</TD>
					<TD>".$add17[4]."</TD>
					<TD>".$add17[5]."</TD></TR>";
	}
	if($add18[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$add18[0]."</TD>
					<TD height=20>".$datepicker24."</TD>
					<TD>".$add18[1]."</TD>
					<TD>".$add18[2]."</TD>
					<TD>".$add18[3]."</TD>
					<TD>".$add18[4]."</TD>
					<TD>".$add18[5]."</TD></TR>";
	}
	$content.="
				  <TR >
					<TD height=30 colSpan=6>".$air_r2[content]."</TD></TR>";

	if($add21[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker25."</TD>
					<TD height=20>".$add21[0]."</TD>
					<TD>".$add21[1]."</TD>
					<TD>".$add21[2]."</TD>
					<TD>".$add21[3]."</TD>
					<TD>".$add21[4]."</TD>
					<TD>".$add21[5]."</TD></TR>";
	}
	if($add22[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker26."</TD>
					<TD height=20>".$add22[0]."</TD>
					<TD>".$add22[1]."</TD>
					<TD>".$add22[2]."</TD>
					<TD>".$add22[3]."</TD>
					<TD>".$add22[4]."</TD>
					<TD>".$add22[5]."</TD></TR>";
	}
	if($add23[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker27."</TD>
					<TD height=20>".$add23[0]."</TD>
					<TD>".$add23[1]."</TD>
					<TD>".$add23[2]."</TD>
					<TD>".$add23[3]."</TD>
					<TD>".$add23[4]."</TD>
					<TD>".$add23[5]."</TD></TR>";
	}
	if($add24[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker28."</TD>
					<TD height=20>".$add24[0]."</TD>
					<TD>".$add24[1]."</TD>
					<TD>".$add24[2]."</TD>
					<TD>".$add24[3]."</TD>
					<TD>".$add24[4]."</TD>
					<TD>".$add24[5]."</TD></TR>";
	}
	if($add25[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker29."</TD>
					<TD height=20>".$add25[0]."</TD>
					<TD>".$add25[1]."</TD>
					<TD>".$add25[2]."</TD>
					<TD>".$add25[3]."</TD>
					<TD>".$add25[4]."</TD>
					<TD>".$add25[5]."</TD></TR>";
	}
	if($add26[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker30."</TD>
					<TD height=20>".$add26[0]."</TD>
					<TD>".$add26[1]."</TD>
					<TD>".$add26[2]."</TD>
					<TD>".$add26[3]."</TD>
					<TD>".$add26[4]."</TD>
					<TD>".$add26[5]."</TD></TR>";
	}
	if($add27[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker31."</TD>
					<TD height=20>".$add27[0]."</TD>
					<TD>".$add27[1]."</TD>
					<TD>".$add27[2]."</TD>
					<TD>".$add27[3]."</TD>
					<TD>".$add27[4]."</TD>
					<TD>".$add27[5]."</TD></TR>";
	}
	if($add28[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker32."</TD>
					<TD height=20>".$add28[0]."</TD>
					<TD>".$add28[1]."</TD>
					<TD>".$add28[2]."</TD>
					<TD>".$add28[3]."</TD>
					<TD>".$add28[4]."</TD>
					<TD>".$add28[5]."</TD></TR>";
	}
	$content.="
				</TBODY></TABLE>
			  </TD>
			</TR>

		<!----------------------------항공일정2 end-------------------->
		";

$content.="
				<TR>
				  <TD>

				<TABLE style='WIDTH: 680px; border:0px; background-color:#e6e6e6; text-align:center; font-size:12px;' cellSpacing=1 cellPadding=0>
				  <TBODY>
				  <TR>
					<TD height=30 width=130>항공권 가격/인</TD>";
if($air2_b=='1') 
{
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air2_a + $air2_c)."[유류할증료포함]&nbsp;</TD><TD></TD><TD></TD>";
} else {
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air2_a)."</TD>
		<TD>
			유류할증료(예상)
		</TD>
		<TD>
			".number_format($air2_c)."
		</TD>";
}
	$content.="				  </TR>

				  </TBODY>
				</TABLE>
			  
			  </TD>
			</TR>";
}


if($air3){
	$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$air3' ");
	$air_r3 = mysql_fetch_array($m_sqla);

		$add11 = explode("||", $air_r3[add11]);	
		$add12 = explode("||", $air_r3[add12]);	
		$add13 = explode("||", $air_r3[add13]);	
		$add14 = explode("||", $air_r3[add14]);	
		$add15 = explode("||", $air_r3[add15]);	
		$add16 = explode("||", $air_r3[add16]);	
		$add17 = explode("||", $air_r3[add17]);	
		$add18 = explode("||", $air_r3[add18]);	
		$add21 = explode("||", $air_r3[add21]);	
		$add22 = explode("||", $air_r3[add22]);	
		$add23 = explode("||", $air_r3[add23]);	
		$add24 = explode("||", $air_r3[add24]);	
		$add25 = explode("||", $air_r3[add25]);	
		$add26 = explode("||", $air_r3[add26]);	
		$add27 = explode("||", $air_r3[add27]);	
		$add28 = explode("||", $air_r3[add28]);	
	
	$content.="
		  <!---------------항공일정3 -------------->
		 <TR>
          <TD>

            <TABLE cellSpacing=1 cellPadding=0 style='width:680px; background-color:#e6e6e6; border:1px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR bgColor=#ffff99>
                <TD height=30 colSpan=6 ><b>".$air_r3[subject]."</b></TD></TR>
              <TR>
                <TD height=20 width=110>일정</TD>
                <TD height=20 width=110>출발지</TD>
                <TD width=110>도착지</TD>
                <TD width=118>편명</TD>
                <TD width=110>출발시간</TD>
                <TD width=110>도착시간</TD>
                <TD width=115>항공시간</TD></TR>";
	if($add11[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker33."</TD>
					<TD height=20>".$add11[0]."</TD>
					<TD>".$add11[1]."</TD>
					<TD>".$add11[2]."</TD>
					<TD>".$add11[3]."</TD>
					<TD>".$add11[4]."</TD>
					<TD>".$add11[5]."</TD></TR>";
	}
	if($add12[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker34."</TD>
					<TD height=20>".$add12[0]."</TD>
					<TD>".$add12[1]."</TD>
					<TD>".$add12[2]."</TD>
					<TD>".$add12[3]."</TD>
					<TD>".$add12[4]."</TD>
					<TD>".$add12[5]."</TD></TR>";
	}
	if($add13[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker35."</TD>
					<TD height=20>".$add13[0]."</TD>
					<TD>".$add13[1]."</TD>
					<TD>".$add13[2]."</TD>
					<TD>".$add13[3]."</TD>
					<TD>".$add13[4]."</TD>
					<TD>".$add13[5]."</TD></TR>";
	}
	if($add14[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker36."</TD>
					<TD height=20>".$add14[0]."</TD>
					<TD>".$add14[1]."</TD>
					<TD>".$add14[2]."</TD>
					<TD>".$add14[3]."</TD>
					<TD>".$add14[4]."</TD>
					<TD>".$add14[5]."</TD></TR>";
	}
	if($add15[0]) {
	$content.="
				  <TR bgColor=#ffffff>

					<TD height=20>".$add15[0]."</TD>
					<TD height=20>".$datepicker37."</TD>
					<TD>".$add15[1]."</TD>
					<TD>".$add15[2]."</TD>
					<TD>".$add15[3]."</TD>
					<TD>".$add15[4]."</TD>
					<TD>".$add15[5]."</TD></TR>";
	}
	if($add16[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker38."</TD>
					<TD height=20>".$add16[0]."</TD>
					<TD>".$add16[1]."</TD>
					<TD>".$add16[2]."</TD>
					<TD>".$add16[3]."</TD>
					<TD>".$add16[4]."</TD>
					<TD>".$add16[5]."</TD></TR>";
	}
	if($add17[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker39."</TD>
					<TD height=20>".$add17[0]."</TD>
					<TD>".$add17[1]."</TD>
					<TD>".$add17[2]."</TD>
					<TD>".$add17[3]."</TD>
					<TD>".$add17[4]."</TD>
					<TD>".$add17[5]."</TD></TR>";
	}
	if($add18[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker40."</TD>
					<TD height=20>".$add18[0]."</TD>
					<TD>".$add18[1]."</TD>
					<TD>".$add18[2]."</TD>
					<TD>".$add18[3]."</TD>
					<TD>".$add18[4]."</TD>
					<TD>".$add18[5]."</TD></TR>";
	}
	$content.="
				  <TR >
					<TD height=30 colSpan=6>".$air_r3[content]."</TD></TR>";

	if($add21[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker41."</TD>
					<TD height=20>".$add21[0]."</TD>
					<TD>".$add21[1]."</TD>
					<TD>".$add21[2]."</TD>
					<TD>".$add21[3]."</TD>
					<TD>".$add21[4]."</TD>
					<TD>".$add21[5]."</TD></TR>";
	}
	if($add22[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker42."</TD>
					<TD height=20>".$add22[0]."</TD>
					<TD>".$add22[1]."</TD>
					<TD>".$add22[2]."</TD>
					<TD>".$add22[3]."</TD>
					<TD>".$add22[4]."</TD>
					<TD>".$add22[5]."</TD></TR>";
	}
	if($add23[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker43."</TD>
					<TD height=20>".$add23[0]."</TD>
					<TD>".$add23[1]."</TD>
					<TD>".$add23[2]."</TD>
					<TD>".$add23[3]."</TD>
					<TD>".$add23[4]."</TD>
					<TD>".$add23[5]."</TD></TR>";
	}
	if($add24[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker44."</TD>
					<TD height=20>".$add24[0]."</TD>
					<TD>".$add24[1]."</TD>
					<TD>".$add24[2]."</TD>
					<TD>".$add24[3]."</TD>
					<TD>".$add24[4]."</TD>
					<TD>".$add24[5]."</TD></TR>";
	}
	if($add25[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker45."</TD>
					<TD height=20>".$add25[0]."</TD>
					<TD>".$add25[1]."</TD>
					<TD>".$add25[2]."</TD>
					<TD>".$add25[3]."</TD>
					<TD>".$add25[4]."</TD>
					<TD>".$add25[5]."</TD></TR>";
	}
	if($add26[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker46."</TD>
					<TD height=20>".$add26[0]."</TD>
					<TD>".$add26[1]."</TD>
					<TD>".$add26[2]."</TD>
					<TD>".$add26[3]."</TD>
					<TD>".$add26[4]."</TD>
					<TD>".$add26[5]."</TD></TR>";
	}
	if($add27[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker47."</TD>
					<TD height=20>".$add27[0]."</TD>
					<TD>".$add27[1]."</TD>
					<TD>".$add27[2]."</TD>
					<TD>".$add27[3]."</TD>
					<TD>".$add27[4]."</TD>
					<TD>".$add27[5]."</TD></TR>";
	}
	if($add28[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker48."</TD>
					<TD height=20>".$add28[0]."</TD>
					<TD>".$add28[1]."</TD>
					<TD>".$add28[2]."</TD>
					<TD>".$add28[3]."</TD>
					<TD>".$add28[4]."</TD>
					<TD>".$add28[5]."</TD></TR>";
	}
	$content.="
				</TBODY></TABLE>
			  </TD>
			</TR>

		<!----------------------------항공일정3 end-------------------->
		";

	$content.="
				<TR>
				  <TD>

				<TABLE style='WIDTH: 680px; border:0px; background-color:#e6e6e6; text-align:center; font-size:12px;' cellSpacing=1 cellPadding=0>
				  <TBODY>
				  <TR>
					<TD height=30 width=130>항공권 가격/인</TD>";
if($air3_b=='1') 
{
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air3_a + $air3_c)."[유류할증료포함]&nbsp;</TD><TD></TD><TD></TD>";
} else {
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air3_a)."</TD>
		<TD>
			유류할증료(예상)
		</TD>
		<TD>
			".number_format($air3_c)."
		</TD>";
}

	$content.="				  </TR>

				  </TBODY>
				</TABLE>
			  
			  </TD>
			</TR>";
}


if($air4){
	$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$air4' ");
	$air_r4 = mysql_fetch_array($m_sqla);

		$add11 = explode("||", $air_r4[add11]);	
		$add12 = explode("||", $air_r4[add12]);	
		$add13 = explode("||", $air_r4[add13]);	
		$add14 = explode("||", $air_r4[add14]);	
		$add15 = explode("||", $air_r4[add15]);	
		$add16 = explode("||", $air_r4[add16]);	
		$add17 = explode("||", $air_r4[add17]);	
		$add18 = explode("||", $air_r4[add18]);	
		$add21 = explode("||", $air_r4[add21]);	
		$add22 = explode("||", $air_r4[add22]);	
		$add23 = explode("||", $air_r4[add23]);	
		$add24 = explode("||", $air_r4[add24]);	
		$add25 = explode("||", $air_r4[add25]);	
		$add26 = explode("||", $air_r4[add26]);	
		$add27 = explode("||", $air_r4[add27]);	
		$add28 = explode("||", $air_r4[add28]);	
	
	$content.="
		 <TR>
          <TD>

            <TABLE cellSpacing=1 cellPadding=0 style='width:680px; background-color:#e6e6e6; border:1px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR bgColor=#ffff99>
                <TD height=30 colSpan=6 ><b>".$air_r4[subject]."</b></TD></TR>
              <TR>
                <TD height=20 width=110>출발지</TD>
                <TD width=110>도착지</TD>
                <TD width=118>편명</TD>
                <TD width=110>출발시간</TD>
                <TD width=110>도착시간</TD>
                <TD width=115>항공시간</TD></TR>";
	if($add11[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker49."</TD>
					<TD height=20>".$add11[0]."</TD>
					<TD>".$add11[1]."</TD>
					<TD>".$add11[2]."</TD>
					<TD>".$add11[3]."</TD>
					<TD>".$add11[4]."</TD>
					<TD>".$add11[5]."</TD></TR>";
	}
	if($add12[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker50."</TD>
					<TD height=20>".$add12[0]."</TD>
					<TD>".$add12[1]."</TD>
					<TD>".$add12[2]."</TD>
					<TD>".$add12[3]."</TD>
					<TD>".$add12[4]."</TD>
					<TD>".$add12[5]."</TD></TR>";
	}
	if($add13[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker51."</TD>
					<TD height=20>".$add13[0]."</TD>
					<TD>".$add13[1]."</TD>
					<TD>".$add13[2]."</TD>
					<TD>".$add13[3]."</TD>
					<TD>".$add13[4]."</TD>
					<TD>".$add13[5]."</TD></TR>";
	}
	if($add14[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker52."</TD>
					<TD height=20>".$add14[0]."</TD>
					<TD>".$add14[1]."</TD>
					<TD>".$add14[2]."</TD>
					<TD>".$add14[3]."</TD>
					<TD>".$add14[4]."</TD>
					<TD>".$add14[5]."</TD></TR>";
	}
	if($add15[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker53."</TD>
					<TD height=20>".$add15[0]."</TD>
					<TD>".$add15[1]."</TD>
					<TD>".$add15[2]."</TD>
					<TD>".$add15[3]."</TD>
					<TD>".$add15[4]."</TD>
					<TD>".$add15[5]."</TD></TR>";
	}
	if($add16[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker54."</TD>
					<TD height=20>".$add16[0]."</TD>
					<TD>".$add16[1]."</TD>
					<TD>".$add16[2]."</TD>
					<TD>".$add16[3]."</TD>
					<TD>".$add16[4]."</TD>
					<TD>".$add16[5]."</TD></TR>";
	}
	if($add17[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker55."</TD>
					<TD height=20>".$add17[0]."</TD>
					<TD>".$add17[1]."</TD>
					<TD>".$add17[2]."</TD>
					<TD>".$add17[3]."</TD>
					<TD>".$add17[4]."</TD>
					<TD>".$add17[5]."</TD></TR>";
	}
	if($add18[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker56."</TD>
					<TD height=20>".$add18[0]."</TD>
					<TD>".$add18[1]."</TD>
					<TD>".$add18[2]."</TD>
					<TD>".$add18[3]."</TD>
					<TD>".$add18[4]."</TD>
					<TD>".$add18[5]."</TD></TR>";
	}
	$content.="
				  <TR>
					<TD height=30 colSpan=6>".$air_r4[content]."</TD></TR>";

	if($add21[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker57."</TD>
					<TD height=20>".$add21[0]."</TD>
					<TD>".$add21[1]."</TD>
					<TD>".$add21[2]."</TD>
					<TD>".$add21[3]."</TD>
					<TD>".$add21[4]."</TD>
					<TD>".$add21[5]."</TD></TR>";
	}
	if($add22[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker58."</TD>
					<TD height=20>".$add22[0]."</TD>
					<TD>".$add22[1]."</TD>
					<TD>".$add22[2]."</TD>
					<TD>".$add22[3]."</TD>
					<TD>".$add22[4]."</TD>
					<TD>".$add22[5]."</TD></TR>";
	}
	if($add23[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker59."</TD>
					<TD height=20>".$add23[0]."</TD>
					<TD>".$add23[1]."</TD>
					<TD>".$add23[2]."</TD>
					<TD>".$add23[3]."</TD>
					<TD>".$add23[4]."</TD>
					<TD>".$add23[5]."</TD></TR>";
	}
	if($add24[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker60."</TD>
					<TD height=20>".$add24[0]."</TD>
					<TD>".$add24[1]."</TD>
					<TD>".$add24[2]."</TD>
					<TD>".$add24[3]."</TD>
					<TD>".$add24[4]."</TD>
					<TD>".$add24[5]."</TD></TR>";
	}
	if($add25[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker61."</TD>
					<TD height=20>".$add25[0]."</TD>
					<TD>".$add25[1]."</TD>
					<TD>".$add25[2]."</TD>
					<TD>".$add25[3]."</TD>
					<TD>".$add25[4]."</TD>
					<TD>".$add25[5]."</TD></TR>";
	}
	if($add26[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker62."</TD>
					<TD height=20>".$add26[0]."</TD>
					<TD>".$add26[1]."</TD>
					<TD>".$add26[2]."</TD>
					<TD>".$add26[3]."</TD>
					<TD>".$add26[4]."</TD>
					<TD>".$add26[5]."</TD></TR>";
	}
	if($add27[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker63."</TD>
					<TD height=20>".$add27[0]."</TD>
					<TD>".$add27[1]."</TD>
					<TD>".$add27[2]."</TD>
					<TD>".$add27[3]."</TD>
					<TD>".$add27[4]."</TD>
					<TD>".$add27[5]."</TD></TR>";
	}
	if($add28[0]) {
	$content.="
				  <TR bgColor=#ffffff>
					<TD height=20>".$datepicker64."</TD>
					<TD height=20>".$add28[0]."</TD>
					<TD>".$add28[1]."</TD>
					<TD>".$add28[2]."</TD>
					<TD>".$add28[3]."</TD>
					<TD>".$add28[4]."</TD>
					<TD>".$add28[5]."</TD></TR>";
	}
	$content.="
				</TBODY></TABLE>
			  </TD>
			</TR>

		<!----------------------------항공일정4 end-------------------->
		";
$content.="
				<TR>
				  <TD>

				<TABLE style='WIDTH: 680px; border:0px; background-color:#e6e6e6; text-align:center; font-size:12px;' cellSpacing=1 cellPadding=0>
				  <TBODY>
				  <TR>
					<TD height=30 width=130>항공권 가격/인</TD>";
if($air1_b=='1') 
{
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air4_a + $air4_c)."[유류할증료포함]&nbsp;</TD><TD></TD><TD></TD>";
} else {
	$content.="<TD style='background-color:#fff; font-weight:bold; width:260px;'>".number_format($air4_a)."</TD>
		<TD>
			유류할증료(예상)
		</TD>
		<TD>
			".number_format($air4_c)."
		</TD>";
}

	$content.="				  </TR>

				  </TBODY>
				</TABLE>
			  
			  </TD>
			</TR>";
}




	$content.="

			<TR>
			  <TD style='border-top:solid 2px #ffff00'>
<!-------------------------------고객명--------------------------------->
            <TABLE style='WIDTH: 680px; HEIGHT: 94px; margin-top:27px; border:0px; background-color:#e6e6e6; text-align:center; font-size:12px;' cellSpacing=1 cellPadding=0>
              <TBODY>
              <TR>
                <TD height=30 width=130>고객명</TD>
                <TD style='background-color:#fff; font-weight:bold; width:260px;'>".getUTFtoKR($f_name)."</TD>
                <TD width=110>인원</TD>
                <TD style='background-color:#fff; font-weight:bold; width:175px;'>".getUTFtoKR($f_people)."명</TD>
			  </TR>
              <TR>
                <TD style='font-weight:bold; height:30;'>이메일</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($f_email)."</TD>
                <TD style='font-weight:bold;'>연락처</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($f_phone)."</TD></TR>
              <TR>
                <TD height=30>출발일</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($f_go)."</TD>
                <TD>여정</TD>
                <TD style='background-color:#fff;'>".getUTFtoKR($f_day)."</TD>
			  </TR>
			  </TBODY>
			</TABLE>
		  
		  </TD>
		</TR>
        <TR>
          <TD height=20></TD></TR>
";

$temp = explode("/", $cost_type1);
//리조트1
if($resort1){
	$content.="
        <TR>
          <TD height=28>
            <TABLE cellSpacing=1 cellPadding=0 style='height:269px; background-color:#e6e6e6; width:680px; border:0px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR>
                <TD bgColor=#ffff99 height=30 colSpan=4><b>RESORT (리조트) - ".getUTFtoKR($radd1_1)."</b></TD>
			  </TR>
              <TR>
                <TD height=30 width=130>리조트명</TD>
                <TD bgColor=#ffffff width=260>".getUTFtoKR($radd1_1)."</TD>
                <TD width=110>". getUTFtoKR($cost_type1) ."</TD>
                <TD style='background-color:#fff; width:175px; font-weight:bold;'>".$radd1_2_1 . " " . number_format($radd1_2). "/" . getUTFtoKR($temp[1])."</TD>
			  </TR>
              <TR>
                <TD height=30>룸타입</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd1_3)."</TD>
                <TD>식사</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd1_4)."</TD>
			  </TR>
              <TR>
                <TD height=30>이동수단</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd1_5)."</TD>
                <TD>지역</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd1_6)."</TD>
			  </TR>
              <TR>
                <TD height=50>허니문특전</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd1_7))."</TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>포함사항</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>
                  <P>".getUTFtoKR(nl2br($radd1_8))."</P></TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>불포함사항</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd1_9))."</TD>
			  </TR>
              <TR>
                <TD height=30>비고</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd1_10))."</TD>
			  </TR>
			</TBODY>
			</TABLE>
		  </TD>
		</TR>
        <TR>
          <TD height=20></TD></TR>
		  ";		  
}

$temp = explode("/", $cost_type2);
//리조트2
if($resort2){
	$content.="
        <TR>
          <TD height=28>
            <TABLE cellSpacing=1 cellPadding=0 style='height:269px; background-color:#e6e6e6; width:680px; border:0px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR>
                <TD bgColor=#ffff99 height=30 colSpan=4><b>RESORT (리조트) - ".getUTFtoKR($radd2_1)."</b></TD>
			  </TR>
              <TR>
                <TD height=30 width=130>리조트명</TD>
                <TD bgColor=#ffffff width=260>".getUTFtoKR($radd2_1)."</TD>
                <TD width=110>". getUTFtoKR($cost_type2) ."</TD>
                <TD style='background-color:#fff; width:175px; font-weight:bold;'>".$radd2_2_1 . " " . number_format($radd2_2). "/" . getUTFtoKR($temp[1])."</TD>
			  </TR>
              <TR>
                <TD height=30>룸타입</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd2_3)."</TD>
                <TD>식사</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd2_4)."</TD>
			  </TR>
              <TR>
                <TD height=30>이동수단</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd2_5)."</TD>
                <TD>지역</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd2_6)."</TD>
			  </TR>
              <TR>
                <TD height=50>허니문특전</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd2_7))."</TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>포함사항</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>
                  <P>".getUTFtoKR(nl2br($radd2_8))."</P></TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>불포함사항</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd2_9))."</TD>
			  </TR>
              <TR>
                <TD height=30>비고</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd2_10))."</TD>
			  </TR>
			</TBODY>
			</TABLE>
		  </TD>
		</TR>        <TR>
          <TD height=20></TD></TR>";		  
}		
$temp = explode("/", $cost_type3);
//리조트3
if($resort3){
	$content.="
        <TR>
          <TD height=28>
            <TABLE cellSpacing=1 cellPadding=0 style='height:269px; background-color:#e6e6e6; width:680px; border:0px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR>
                <TD bgColor=#ffff99 height=30 colSpan=4><b>RESORT (리조트) - ".getUTFtoKR($radd3_1)."</b></TD>
			  </TR>
              <TR>
                <TD height=30 width=130>리조트명</TD>
                <TD bgColor=#ffffff width=260>".getUTFtoKR($radd3_1)."</TD>
                <TD width=110>". getUTFtoKR($cost_type3) ."</TD>
                <TD style='background-color:#fff; width:175px; font-weight:bold;'>".$radd3_2_1 . " " . number_format($radd3_2). "/" . getUTFtoKR($temp[1])."</TD>
			  </TR>
              <TR>
                <TD height=30>룸타입</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd3_3)."</TD>
                <TD>식사</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd3_4)."</TD>
			  </TR>
              <TR>
                <TD height=30>이동수단</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd3_5)."</TD>
                <TD>지역</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd3_6)."</TD>
			  </TR>
              <TR>
                <TD height=50>허니문특전</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd3_7))."</TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>포함사항</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>
                  <P>".getUTFtoKR(nl2br($radd3_8))."</P></TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>불포함사항</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd3_9))."</TD>
			  </TR>
              <TR>
                <TD height=30>비고</TD>
                <TD bgColor=#ffffff colSpan=3  align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd3_10))."</TD>
			  </TR>
			</TBODY>
			</TABLE>
		  </TD>
		</TR>        <TR>
          <TD height=20></TD></TR>";		  
}
$temp = explode("/", $cost_type4);
//리조트4
if($resort4){
	$content.="
        <TR>
          <TD height=28>
            <TABLE cellSpacing=1 cellPadding=0 style='height:269px; background-color:#e6e6e6; width:680px; border:0px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR>
                <TD bgColor=#ffff99 height=30 colSpan=4><b>RESORT (리조트) - ".getUTFtoKR($radd4_1)."</b></TD>
			  </TR>
              <TR>
                <TD height=30 width=130>리조트명</TD>
                <TD bgColor=#ffffff width=260>".getUTFtoKR($radd4_1)."</TD>
                <TD width=110>". getUTFtoKR($cost_type4) ."</TD>
                <TD style='background-color:#fff; width:175px; font-weight:bold;'>".$radd4_2_1 . " " .number_format($radd4_2). "/" . getUTFtoKR($temp[1])."</TD>
			  </TR>
              <TR>
                <TD height=30>룸타입</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd4_3)."</TD>
                <TD>식사</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd4_4)."</TD>
			  </TR>
              <TR>
                <TD height=30>이동수단</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd4_5)."</TD>
                <TD>지역</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd4_6)."</TD>
			  </TR>
              <TR>
                <TD height=50>허니문특전</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd4_7))."</TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>포함사항</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>
                  <P>".getUTFtoKR(nl2br($radd4_8))."</P></TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>불포함사항</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd4_9))."</TD>
			  </TR>
              <TR>
                <TD height=30>비고</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd4_10))."</TD>
			  </TR>
			</TBODY>
			</TABLE>
		  </TD>
		</TR>        <TR>
          <TD height=20></TD></TR>";		  
}
$temp = explode("/", $cost_type5);
//리조트5
if($resort5){
	$content.="
        <TR>
          <TD height=28>
            <TABLE cellSpacing=1 cellPadding=0 style='height:269px; background-color:#e6e6e6; width:680px; border:0px; font-size:12px; text-align:center;'>
              <TBODY>
              <TR>
                <TD bgColor=#ffff99 height=30 colSpan=4><b>RESORT (리조트) - ".getUTFtoKR($radd5_1)."</b></TD>
			  </TR>
              <TR>
                <TD height=30 width=130>리조트명</TD>
                <TD bgColor=#ffffff width=260>".getUTFtoKR($radd5_1)."</TD>
                <TD width=110>". getUTFtoKR($cost_type5) ."</TD>
                <TD style='background-color:#fff; width:175px; font-weight:bold;'>".$radd5_2_1 . " " .number_format($radd5_2). "/" .getUTFtoKR( $temp[1])."</TD>
			  </TR>
              <TR>
                <TD height=30>룸타입</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd5_3)."</TD>
                <TD>식사</TD>
                <TD style='background-color:#fff; font-weight:bold;'>".getUTFtoKR($radd5_4)."</TD>
			  </TR>
              <TR>
                <TD height=30>이동수단</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd5_5)."</TD>
                <TD>지역</TD>
                <TD bgColor=#ffffff>".getUTFtoKR($radd5_6)."</TD>
			  </TR>
              <TR>
                <TD height=50>허니문특전</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd5_7))."</TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>포함사항</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>
                  <P>".getUTFtoKR(nl2br($radd5_8))."</P></TD>
			  </TR>
              <TR>
                <TD style='height:30px;'>불포함사항</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd5_9))."</TD>
			  </TR>
              <TR>
                <TD height=30>비고</TD>
                <TD bgColor=#ffffff colSpan=3 align=left style='padding-left:10px;padding-top:10px;padding-bottom:10px;padding-right:10px;'>".getUTFtoKR(nl2br($radd5_10))."</TD>
			  </TR>
			</TBODY>
			</TABLE>
		  </TD>
		</TR>";		  
}





	$content.="

        <TR>
          <TD height=30></TD></TR>
        <TR>
          <TD style='background-color:#fff799; height:35px; font-weight:bold; font-size:12px; padding:0px 0 0 10px;'>
            RESERVATION(예약과정)
		  </TD>
		</TR>
        <TR>
          <TD style='font-size:12px; padding:5px 0 5px 5px; line-height:20px;'>".getUTFtoKR(nl2br($memo3))."</TD>
		</TR>
        <TR>
          <TD style='height:20px; font-size:12px; padding:10px 0 20px 20px; line-height:16px;'>
            <P>* 예약 후 취소할 경우 항공권의 특약과 리조트의 환불 패널티에 따라 소정의 패널티가 
            적용되며, <br>&nbsp;&nbsp;계약금은 환불되지 않습니다.<BR>* 일부항공사의 경우 항공사의 정책상 카드결제가 불가한 경우가 있으며, 
            낮은클래스의 특가상품은 항공사별도 <br>&nbsp;&nbsp;환불할 수 있습니다.<BR></P></TD></TR>
        <TR>
          <TD style='background-color:#fff799; text-align:center; height:35px; font-weight:bold; font-size:12px; padding:0px 0 0 10px;'>
            용어설명 : BB - 조식 / HB - 조석식 / FB - 전식 / AI - 올인클루시브(무제한이용가능)</TD></TR>
        <TR>
          <TD style='height:80px; text-align:center; font-size:12px;'>
            <P>Himaldives With Your Inspiration~<BR>
			<BR>[157-930] 서울시 마포구 서교동 480-10 미리내빌딩 3층 <BR>대표전화. 
            1644-6681 / 팩스. 02-3662-6681 / www.himaldives.co.kr / 
            www.trevia.co.kr 
			</P>
		  </TD>
		</TR>
        <TR>
          <TD height=60>
            <TABLE cellSpacing=1 cellPadding=0 style='width:680px; border:0px; font-size:12px; height:60px;'>
              <TBODY>
              <TR bgColor=#999999>
                <TD height=30 width=441>
                  &nbsp;담당자 : <STRONG>".getUTFtoKR($p_name)." 플래너 | 직통 : ".$p_tel."</STRONG></TD>
                <TD style='width:115px; text-align:center;'>작성일</TD>
                <TD style='width:115px; text-align:center;'>".date('Y-m-d')."</TD>
			  </TR>
              <TR bgColor=#999999>
                <TD height=30>&nbsp;이메일 : <span style='font-weight:bold; color:#0066cc'>".getUTFtoKR($p_email)."</SPAN>
				</TD>
                <TD style='border-color:#efebde; font-weight:bold; color:#0066cc; text-align:center;'>
                  <A href='http://www.trevia.co.kr/' target=_blank>트레비아가기</A>
				</TD>
                <TD style='font-weight:bold; color:#0066cc; text-align:center;'>
                  <A href='http://www.himaldives.co.kr/' target=_blank>하이몰디브가기</A>
				</TD>
			  </TR>
			  </TBODY>
			</TABLE>
		  </TD>
		</TR>
		</TBODY>
		</TABLE></TD>
    <TD width=25></TD></TR></TBODY></TABLE>
";

$subject = getUTFtoKR($subject);
$memo1 = getUTFtoKR($memo1);
$memo2 = getUTFtoKR($memo2);
$memo3 = getUTFtoKR($memo3);
$air1;
$air2;
$air3;
$air4;
$info = $f_name."||".$f_people."||".$f_email."||".$f_phone."||".$f_go."||".$f_day;
$info = getUTFtoKR($info);
$resort1;
if($resort1 != 0)
$resort1_memo = $radd1_1."||".$radd1_2."||".$radd1_3."||".$radd1_4."||".$radd1_5."||".$radd1_6."||".$radd1_7."||".$radd1_8."||".$radd1_9."||".$radd1_10."||".$radd1_2_1."||".$cost_type;
$resort1_memo = getUTFtoKR($resort1_memo);
$resort2;
if($resort2 != 0)
$resort2_memo = $radd2_1."||".$radd2_2."||".$radd2_3."||".$radd2_4."||".$radd2_5."||".$radd2_6."||".$radd2_7."||".$radd2_8."||".$radd2_9."||".$radd2_10."||".$radd2_2_1."||".$cost_type;
$resort2_memo = getUTFtoKR($resort2_memo);
$resort3;
if($resort3 != 0)
$resort3_memo = $radd3_1."||".$radd3_2."||".$radd3_3."||".$radd3_4."||".$radd3_5."||".$radd3_6."||".$radd3_7."||".$radd3_8."||".$radd3_9."||".$radd3_10."||".$radd3_2_1."||".$cost_type;
$resort3_memo = getUTFtoKR($resort3_memo);
$resort4;
if($resort4 != 0)
$resort4_memo = $radd4_1."||".$radd4_2."||".$radd4_3."||".$radd4_4."||".$radd4_5."||".$radd4_6."||".$radd4_7."||".$radd4_8."||".$radd4_9."||".$radd4_10."||".$radd4_2_1."||".$cost_type;
$resort4_memo = getUTFtoKR($resort4_memo);
$resort5;
if($resort5 != 0)
$resort5_memo = $radd5_1."||".$radd5_2."||".$radd5_3."||".$radd5_4."||".$radd5_5."||".$radd5_6."||".$radd5_7."||".$radd5_8."||".$radd5_9."||".$radd5_10."||".$radd5_2_1."||".$cost_type;
$resort5_memo = getUTFtoKR($resort5_memo);
$writer = $memuid;
$sms = getUTFtoKR($sms);
$date = date('Y-m-d H:i:s');



$debug = false;


// getSendMail('thav@naver.com|'.$add3[1] , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');


if( !$debug )
{
//getSendMail('jacos15@hanmail.net|'.$add3[1] , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');
getSendMail('jacos15@hanmail.net|'.$add3[1] , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');

//고객용
if($add3[5])
	getSendMail($add3[5].'|'.$add3[1] , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');
else if($add3[11])
	getSendMail($add3[11].'|'.$add3[7] , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');
else if( $_POST[addemail] )
	getSendMail($_POST[addemail].'|'.$add3[1] , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');
else if($_POST['f_email'])
	getSendMail($_POST['f_email'].'|'.$_POST['f_name'] , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');

//관리자용
getSendMail($admin_email.'|'.$admin_name , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');

getSendMail('ok@trevia.co.kr'.'|'.$admin_name , $admin_email.'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');

//getSendMail('namsm05@hotmail.com'.'|'.$admin_name , $_POST[from_email].'|'.$admin_name, $_POST[subject], $content, $_FILES['upfile'], 'HTML');
}

 $air1_price = $air1_a."||".$air1_b."||".$air1_c;
 $air2_price = $air2_a."||".$air2_b."||".$air2_c;
 $air3_price = $air3_a."||".$air3_b."||".$air3_c;
 $air4_price = $air4_a."||".$air4_b."||".$air4_c;

 $air1_date = $datepicker1."||".$datepicker2."||".$datepicker3."||".$datepicker4."||".$datepicker5."||".$datepicker6."||".$datepicker7."||".$datepicker8."||".$datepicker9."||".$datepicker10."||".$datepicker11."||".$datepicker12."||".$datepicker13."||".$datepicker14."||".$datepicker15."||".$datepicker16;
 $air2_date = $datepicker17."||".$datepicker18."||".$datepicker19."||".$datepicker20."||".$datepicker21."||".$datepicker22."||".$datepicker23."||".$datepicker24."||".$datepicker25."||".$datepicker26."||".$datepicker27."||".$datepicker28."||".$datepicker29."||".$datepicker30."||".$datepicker31."||".$datepicker32;
 $air3_date = $datepicker33."||".$datepicker34."||".$datepicker35."||".$datepicker36."||".$datepicker37."||".$datepicker38."||".$datepicker39."||".$datepicker40."||".$datepicker41."||".$datepicker42."||".$datepicker43."||".$datepicker44."||".$datepicker45."||".$datepicker46."||".$datepicker47."||".$datepicker48;
 $air4_date = $datepicker49."||".$datepicker50."||".$datepicker51."||".$datepicker52."||".$datepicker53."||".$datepicker54."||".$datepicker55."||".$datepicker56."||".$datepicker57."||".$datepicker58."||".$datepicker59."||".$datepicker60."||".$datepicker61."||".$datepicker62."||".$datepicker63."||".$datepicker64;

$memo1 = addslashes($memo1);
$memo2 = addslashes($memo2);


 if( $_POST['save_flag'] == "true"  )
	 $status = '작성중';
 else
	 $status = '발송완료';

	$ndate = date('Y-m-d H:i:s');

if( $_POST['insert_flag'] == "true" )
	$qrys = "insert into rb_extra set puid = '$puid', subject = '$subject', memo1 = '$memo1', memo2 = '$memo2', air1 = '$air1', air2 = '$air2', air3 = '$air3', air4 = '$air4', air1_price = '$air1_price', air2_price = '$air2_price', air3_price = '$air3_price', air4_price = '$air4_price', air1_date = '$air1_date', air2_date = '$air2_date', air3_date = '$air3_date', air4_date = '$air4_date', info = '$info', resort1 = '$resort1', resort1_memo = '$resort1_memo', resort2 = '$resort2', resort2_memo = '$resort2_memo', resort3 = '$resort3', resort3_memo = '$resort3_memo', resort4 = '$resort4', resort4_memo = '$resort4_memo', resort5 = '$resort5', resort5_memo = '$resort5_memo', memo3 = '$memo3', writer='$writer', sms='$sms', date = '$date', status = '$status' ";
else
	$qrys = "update rb_extra set puid = '$puid', subject = '$subject', memo1 = '$memo1', memo2 = '$memo2', air1 = '$air1', air2 = '$air2', air3 = '$air3', air4 = '$air4', air1_price = '$air1_price', air2_price = '$air2_price', air3_price = '$air3_price', air4_price = '$air4_price',  air1_date = '$air1_date', air2_date = '$air2_date', air3_date = '$air3_date', air4_date = '$air4_date', info = '$info', resort1 = '$resort1', resort1_memo = '$resort1_memo', resort2 = '$resort2', resort2_memo = '$resort2_memo', resort3 = '$resort3', resort3_memo = '$resort3_memo', resort4 = '$resort4', resort4_memo = '$resort4_memo', resort5 = '$resort5', resort5_memo = '$resort5_memo', memo3 = '$memo3', writer='$writer', sms='$sms', date = '$date', status = '$status' where uid = '".$_POST[uid]."'";

if( !$debug )
{	
	$m_sql = mysql_query($qrys);
}

if( $_POST['insert_flag'] == "true" )
	$idx = mysql_insert_id();
else
	$idx = $_POST[uid];


// SMS
$smsText = "[트레비아]요청하신 여행견적 이메일로 발송하였으니 확인 후 연락 바랍니다.
[견적서주소]아래링크클릭시 견적서를 볼수 있습니다.
http://trevia.co.kr/modules/bbsext/theme/_pc/list02/mobile2.php?uid=".$idx."
[리조트주소]아래링크클릭시 사진을 볼수 있습니다.
";


$url['칸쿤'] = "http://trevia.co.kr/?r=mexico&c=cancun&uid=";
$url['미주허니문'] = "http://trevia.co.kr/?r=thailand&c=miju&uid=";
$url['발리'] = "http://trevia.co.kr/?r=indonesia&c=bali&uid=";
$url['하와이'] = "http://trevia.co.kr/?r=thailand&c=hawaii&uid=";
$url['세이셀'] = "http://trevia.co.kr/?r=seychelles&c=seychelles&uid=";
$url['스피드보트'] = "http://himaldives.co.kr/?r=maldives&c=boat&uid=";
$url['수상비행기'] = "http://himaldives.co.kr/?r=maldives&c=float&uid=";
$url['국내선'] = "http://himaldives.co.kr/?r=maldives&c=ship&uid=";
$url['가족여행'] = "http://himaldives.co.kr/?r=maldives&c=family&uid=";

$sql = "SELECT * FROM rb_bbs_data where uid = '".$resort1."' ";
$m_sql = mysql_query($sql);
$m_rs = mysql_fetch_array($m_sql);
$radd1_url = $url[$m_rs[category]] . $resort1;

$sql = "SELECT * FROM rb_bbs_data where uid = '".$resort2."' ";
$m_sql = mysql_query($sql);
$m_rs = mysql_fetch_array($m_sql);
$radd2_url = $url[$m_rs[category]] . $resort2;

$sql = "SELECT * FROM rb_bbs_data where uid = '".$resort3."' ";
$m_sql = mysql_query($sql);
$m_rs = mysql_fetch_array($m_sql);
$radd3_url = $url[$m_rs[category]] . $resort3;

$sql = "SELECT * FROM rb_bbs_data where uid = '".$resort4."' ";
$m_sql = mysql_query($sql);
$m_rs = mysql_fetch_array($m_sql);
$radd4_url = $url[$m_rs[category]] . $resort4;

$sql = "SELECT * FROM rb_bbs_data where uid = '".$resort5."' ";
$m_sql = mysql_query($sql);
$m_rs = mysql_fetch_array($m_sql);
$radd5_url = $url[$m_rs[category]] . $resort5;


if( !empty($resort1) )
	$smsText .= getUTFtoKR($radd1_1) . " : ".$radd1_url."
";
if( !empty($resort2) )
	$smsText .= getUTFtoKR($radd2_1) . " : ".$radd2_url."
";
if( !empty($resort3) )
	$smsText .= getUTFtoKR($radd3_1) . " : ".$radd3_url."
";
if( !empty($resort4) )
	$smsText .= getUTFtoKR($radd4_1) . " : ".$radd4_url."
";
if( !empty($resort5) )
	$smsText .= getUTFtoKR($radd5_1) . " : ".$radd5_url."
";

// history에 저장 SMS
$f_phone_r = str_replace("-","",$f_phone);
$qry ="insert into rb_sms_history set cp='".$f_phone_r."', writer='".$memuid."', content='".$smsText."', send_date='".date("YmdHis")."', from_type='batch'";
mysql_query ( $qry );	
	getSendSMS("_sms","sms",$f_phone,"대량전송(관리자)",$smsText,"mms");
//	getSendSMS("_sms","sms","01089997157","대량전송(관리자)",$smsText,"sms");
// 발송완료끝

//	getSendSMS("_sms","sms",$f_phone,"대량전송(관리자)",$smsText,"mms");

if( $debug )
{
	echo $qrys . "<br />";
	echo $uid . " = " . $puid . " : " . $_uid . "<br />";
	echo $smsText . "<br />";
	echo $_POST['save_flag'] . " - " . $_POST['insert_flag'] . "<br>";
	echo "To_Email : ". $add3[5] . ", Add_Email : " . $_POST[addemail] . ", Admin_Email : " . $admin_email . ", From_Email : " . $_POST[from_email];
	echo $content;
}
?>
<script>
<? if( $_POST['save_flag'] == "true" ) { ?>
	alert('SAVE OK');
	history.go(-1);
<? } else { ?>
	alert('SEND OK');
	parent.opener.location.href="/modules/bbsext/theme/_pc/list02/view_process.php?category=<?=urlencode('견적발송')?>&r=<?=$_POST[r]?>&m=<?=$_POST[m]?>&bid=<?=$_POST[bid]?>&uid=<?=$_POST[_uid]?>";
	self.close();
<? } ?>
</script>
