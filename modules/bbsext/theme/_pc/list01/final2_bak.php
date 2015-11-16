<!-- 접수완료 페이지 (2011/05/03) -->
<?php

function getUTFtoKR($str)
{
	return iconv('utf-8','euc-kr',$str);
}


function getSendMail($to,$from,$subject,$content,$html) 
{
	if ($html == 'TEXT') $content = nl2br(htmlspecialchars($content));
	$to_exp   = explode('|', $to);
	$from_exp = explode('|', $from);
	$To = $to_exp[1] ? "\"".getUTFtoKR($to_exp[1])."\" <$to_exp[0]>" : $to_exp[0];
	$Frm = $from_exp[1] ? "\"".getUTFtoKR($from_exp[1])."\" <$from_exp[0]>" : $from_exp[0];
	$Header = "From:$Frm\nReply-To:$frm\nX-Mailer:PHP/".phpversion();
	$Header.= "\nContent-Type:text/html;charset=EUC-KR\r\n"; 
	return @mail($To,getUTFtoKR($subject),getUTFtoKR($content),$Header);
}
$g_arr = explode(",",$d['theme']['gubun_list']);
$g_num = count($g_arr);

?>


<?
	$content = "

<meta http-equiv='Content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='http://trevia.co.kr/mail/style.css'>

<Table border='0' cellpadding='0' cellspacing='1' width='900'>
<tr>
<td align='right'>
<table border='0' cellpadding='0' cellspacing='1' width='200' bgcolor='#545350'>
<tr>
<td bgcolor='white' width='100' height='25px' align='center'>".$_POST[val1]."</td>
<Td bgcolor='white' width='100' align='center'>".$_POST[val2]."</td>
</table>
</td>
</tr>
</table>

<Table border='0' cellpadding='0' cellspacing='1' width='900'>
<tr>
<td colspan='3'>&nbsp;
</td>
</tr>
<tr>
<td align='center' height='50'><!--트레비아 이미지-->
</td>
<td align='center' height='50'><font size='5'><u><b>해 외 여 행 계 약 서</b></u></font>
</td>
<td align='center'><!--하이몰디브 이미지-->
</td>
</tr>
<tr>
<td height='20'></td>
</tr>
<tr>
<td colspan='3'><b>당사('갑')와 당사를 이용하는 여행자('을')는 다음조건으로 여행계약을 체결합니다.</b></td>
</table>
<table width='900' border='0' cellspacing='1' cellpadding='0' bgcolor='#545350' height='90'>
  <tr>
    <td width='100' bgcolor='#f1f1f1' align='center'><b>여행상품명</b></td>
    <td colspan='3' align='center' bgcolor='#d1dae4'><b>".$_POST[val3]."</b></td>
   
    <td width='160' align='center' bgcolor='white'><b>여행기간</b></td>
    <td colspan='3' bgcolor='#d1dae4' align='center'>".$_POST[val4]."</td>
  </tr>
";
	$pcount = 0;
if ($add3[19]) {
	$pcount = 4;
}elseif ($add3[13]) {
	$pcount = 3;
}elseif ($add3[7]) {
	$pcount = 2;
}elseif ($add3[1]) {
	$pcount = '';
}

	$content .= "

  <tr>
    <td width='100' rowspan='".$pcount."' bgcolor='#f1f1f1' align='center'><b>여행자명</b></td>
    <td width='80' bgcolor='white' align='center'>".$_POST[val5]."</td>
    <td width='160' bgcolor='#d1dae4'' align='center' >".$_POST[val6]."</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' align='center' bgcolor='white'>&nbsp;</td>
  </tr>
";


if($add3[7]) {
	$content .= "
  <tr>
    <td width='80' bgcolor='white' align='center'>".$_POST[val7]."</td>
    <td width='160' bgcolor='#d1dae4'' align='center' >".$_POST[val8]."</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' align='center' bgcolor='white'>&nbsp;</td>
  </tr>
  ";
}

if($add3[13]) {
	$content .= "
  <tr>
    <td width='80' bgcolor='white' align='center'>".$_POST[val9]."</td>
    <td width='160' bgcolor='#d1dae4'' align='center' >".$_POST[val10]."</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' align='center' bgcolor='white'>&nbsp;</td>
  </tr>
  ";
}


if($add3[19]) {
	$content .= "
  <tr>
    <td width='80' bgcolor='white' align='center'>".$_POST[val11]."</td>
    <td width='160' bgcolor='#d1dae4'' align='center' >".$_POST[val12]."</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' bgcolor='white' align='center'>&nbsp;</td>
    <td width='160' bgcolor='white' align='center'>&nbsp;</td>
    <td width='80' align='center' bgcolor='white'>&nbsp;</td>
  </tr>
  ";
}


	$content .= "
</table>
<table width='900' border='0' cellspacing='1' cellpadding='0' bgcolor='#545350' height='210'>
  <tr>
    <td width='100' rowspan='6' align='center' bgcolor='#f1f1f1'><b>여행경비</b></td>
	<td colspan='3' align='center' bgcolor='#f1dbda'><b>계약금</b></td>
	<td colspan='3' align='center' bgcolor='#ebf1de'><b>항공료</b></td>
	<td colspan='3' align='center' bgcolor='#e6dfec'><b>숙박시설</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>비고</b></td>
  </tr>
	<tr>
    <td width='80' bgcolor='#ffffff' align='center'><b>구분</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>인원수</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>금액</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>구분</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>인원수</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>금액</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>구분</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>인원수</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>금액</b></td>
	<td width='80' rowspan='5' align='center' bgcolor='#ffffff'>&nbsp;</td>
	</tr>
	<tr>
    <td width='80' bgcolor='#ffffff' align='center'>성인</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val13]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val14]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>성인</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val15]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val16]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>성인</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val17]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val18]."</td>
	</tr>
	<tr>
    <td width='80' bgcolor='#ffffff' align='center'>소아</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val19]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val20]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>소아</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val21]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val22]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>소아</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val23]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val24]."</td>
	</tr>
	<tr>
    <td width='80' bgcolor='#ffffff' align='center'>유아</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val25]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val26]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>유아</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val27]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val28]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>유아</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val29]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val30]."</td>
	</tr>
	<tr>
    <td colspan='2' align='center' bgcolor='#ffffff'><b>합계</b></td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val31]."</td>
	<td colspan='2' align='center' bgcolor='#ffffff'><b>합계</b></td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val32]."</td>
	<td colspan='2' align='center' bgcolor='#ffffff'><b>합계</b></td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val33]."</td>
	</tr>
	<tr>
    <td width='100' bgcolor='#f1f1f1' align='center'><b>납부일자</b></td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST[val34]."</td>
	<td width='80' bgcolor='#ffffff' align='center'><b>입금일</b></td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST[val35]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>&nbsp;</td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST[val36]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>&nbsp;</td>
	<td width='80' bgcolor='#ffffff' align='center'>&nbsp;</td>
	</tr>
</table>
<table width='900' border='0' cellspacing='1' cellpadding='0'  height='50'>
  <tr>
    <td width='900' align='center' bgcolor='#ffffff'>
		<table width='900' border='0' cellspacing='0' cellpadding='0'  height='50'>
  			<Tr>
				<Td>&nbsp;</td>
			</tr>
			<tr>
				<td><B>법인 입금 계좌안내 : 신한은행 140-009-270166 예금주 : (주)트레비아 도영춘</b></td>	
			</tr>
			<Tr>
				<Td>&nbsp;</td>
			</tr>
			<tr>
				<Td><font color='red'><B>** 현금결제시 - [ (달러금액 x 송금보낼때 환율)-계약금 ]으로 계산하여 입금해주시면 됩니다. <Br>[환율기준 :
잔금입금당일 오전 10시 외환은행 전신환(송금보낼때) 기준] < 달러입금시 계약금은
환불됩니다. ></b></font></td>
			</tr>
		</table>
	
	</td>
  </tr>
</table>
 <table width='900' border='0' cellspacing='0' cellpadding='0'  height='20'>
  <tr>
   <td width='900'  align='center'>&nbsp;</td>
   </tr>
</table>
   <table width='900' border='0' cellspacing='0' cellpadding='0'  height='50'>
  <tr>
   <td width='900' align='left'><b><font size='4'>■ 여행조건</font></b></td>
   </tr>
  </table>";
?>

<?


$pcount = 2;

if ($_POST['nadd27'] != "") {
	$pcount = 6;
}elseif ($_POST['nadd18'] != "") {
	$pcount = 5;
}elseif ($_POST['nadd9'] != "") {
	$pcount = 4;
}elseif ($_POST['nadd0'] != "") {
	$pcount = 3;
}

	$content .="

 <table width='900' border='0' cellspacing='1' cellpadding='0' bgcolor='#545350' height='210'>
  <tr>
   <td width='100' rowspan='".$_POST[cnt1]."' align='center' bgcolor='#f1f1f1'><b>항공여정</b></td>
   <td colspan='4' align='center' bgcolor='#dbe6f1'><b>출발</b></td>
	<td colspan='4' align='center' bgcolor='#f1dbda'><b>도착</b></td>
	<td width='160' rowspan='2' align='center' bgcolor='#f1f1f1'><b>비고</b></td>
   </tr>
	<tr>
	 <td width='80' bgcolor='#f1f1f1' align='center'><b>여정</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>편명</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>날짜</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>시간</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>항공사명</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>편명</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>날짜</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>시간</b></td>
	</tr>"
?>


<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<?if(!$_POST['nadd'.$k]){break;}?>

<?
	$content .="
	<tr>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td width='80' bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	 <td bgcolor='#ffffff' align='center'>".$_POST['nadd'.$k++]."</td>
	</tr>";
?>
<?endfor?>


<?


$pcount = 0;
if ($_POST['madd18'] ) {
	$pcount = 5;
}elseif ($_POST['madd12']) {
	$pcount = 4;
}elseif ($_POST['madd6']) {
	$pcount = 3;
}elseif ($_POST['madd0']) {
	$pcount = 2;
}


	$content .= "

	<tr>
	 <td width='100' rowspan='".$_POST[cnt2]."' align='center' bgcolor='#f1f1f1'><b>숙박시설</b></td>
    <td colspan='2' align='center' bgcolor='#f1f1f1'><b>호텔명</b></td>
	<td colspan='2' align='center' bgcolor='#f1f1f1'><b>룸타입</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>박수</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>식사</b></td>
	<td colspan='2' align='center' bgcolor='#f1f1f1'><b>리조트 이동수단 </b></td>
	<td align='center' bgcolor='#f1f1f1'><b>비고</b></td>
	</tr>";
?>


<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<4;$i++):?>
	<?if(!$_POST['madd'.$k]){break;}?>

<?
	$content .= "
	<tr>
	 <td colspan='2' align='center' bgcolor='#ffffff'>".$_POST['madd'.$k++]."</td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST['madd'.$k++]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST['madd'.$k++]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST['madd'.$k++]."</td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST['madd'.$k++]."</td>
	<td align='center' bgcolor='#ffffff'>".$_POST['madd'.$k++]."</td>
	</tr>
	";
?>
<?endfor?>


<?
	$content .= "

 </table>
 <table width='900' border='0' cellspacing='1' cellpadding='0' bgcolor='#545350' height='240'>
  <tr>
    <td width='100' bgcolor='#f1f1f1' align='center'><b>특전사항</b></td>
	<td colspan='2' align='center' bgcolor='#ffffff'><b>".$_POST[val37]."</b></td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST[val38]."</td>
	<td colspan='2' align='center' bgcolor='#f1f1f1'><b>할인구분</b></td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST[val39]."</td>
	<td colspan='2' align='center' bgcolor='#ffffff'>".$_POST[val40]."</td>
   </tr>
	<tr>
    <td width='100' bgcolor='#f1f1f1' align='center'><b>포함내역 </b></td>
	<td colspan='2' align='left' bgcolor='#ffffff'>항공권<br>여행인솔자</td>
	<td colspan='2' align='left' bgcolor='#ffffff'>항공 유류세 및 택스<br>현지안내원</td>
	<td colspan='2' align='left' bgcolor='#ffffff'>리조트<br>현지여행사</td>
	<td colspan='2' align='left' bgcolor='#ffffff'>여행안내서<br>가이드 팁</td>
	<td colspan='2' align='left' bgcolor='#ffffff'>여행자보험<br>여권발급비</td>
	</tr>
	<tr>
    <td width='100' rowspan='4' align='center' bgcolor='#f1f1f1'><b>여행자보험<br>제공내역</b></td>
	<td width='80' rowspan='2' align='center' bgcolor='#ffffff'><b>항목</b></td>
	<td colspan='3' align='center' bgcolor='#ffffff'><b>상해</b></td>
	<td colspan='2' align='center' bgcolor='#ffffff'><b>질병</b></td>
	<td colspan='4' align='center' bgcolor='#ffffff'><b>기타</b></td>
	</tr>
	<tr>
    <td width='80' bgcolor='#ffffff' align='center'><b>사망</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>후유장애</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>해외의료비</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>사망</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>해외의료비</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>배상책임</b></td>
	<td width='80' bgcolor='#ffffff' align='center'><b>특별비요</b></td>
	<td width='80' align='center' bgcolor='#ffffff'><b>휴대폼손해</b></td>
	<td width='80' align='center' bgcolor='#ffffff'><b>항공기납치</b></td>
	</tr>
	<tr>
    <td width='80' bgcolor='#ffffff' align='center'>성인</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고1억원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고1억원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고1천만원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고2천만원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고5백만원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고2천만원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고5백만원</td>
	<td width='80' align='center' bgcolor='#ffffff'>최고1백만원</td>
	<td width='80' align='center' bgcolor='#ffffff'>최고140만원</td>
	</tr>
	<tr>
    <td width='80' bgcolor='#ffffff' align='center'>학생(어린이)</td>
	<td width='80' bgcolor='#ffffff' align='center'>-</td>
	<td width='80' bgcolor='#ffffff' align='center'>-</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고1천만원</td>
	<td width='80' bgcolor='#ffffff' align='center'>-</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고5백만원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고2천만원</td>
	<td width='80' bgcolor='#ffffff' align='center'>최고5백만원</td>
	<td width='80' align='center' bgcolor='#ffffff'>최고1백만원</td>
	<td width='80' align='center' bgcolor='#ffffff'>최고140만원</td>
	</tr>
	<tr>
    <td width='100' bgcolor='#f1f1f1' align='center'><b>비고</b></td>
	<td colspan='5' align='center' bgcolor='#ffffff'>학생(어린이)는 만15세 미만, 휴대품손해는 건당 20만원 최고1백만원 </td>
	<td width='80' rowspan='2' align='center' bgcolor='#f1f1f1'><b>구분계약</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>행사비</b></td>
	<td width='80' bgcolor='#f1f1f1' align='center'><b>항공료</b></td>
	<td width='80' align='center' bgcolor='#f1f1f1'><b>기타경비</b></td>
	<td width='80' align='center' bgcolor='#f1f1f1'><b>수수료</b></td>
	</tr>
	<tr>
    <td width='100' bgcolor='#ffffff' align='center'><b>보험가입 등 </b></td>
	<td colspan='5' align='left' bgcolor='#ffffff'>■ 공제보험[금액:5천만원, 피보험자 : (주)트레비아 ] </td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val41]."</td>
	<td width='80' bgcolor='#ffffff' align='center'>".$_POST[val42]."</td>
	<td width='80' align='center' bgcolor='#ffffff'>".$_POST[val43]."</td>
	<td width='80' align='center' bgcolor='#ffffff'>".$_POST[val44]."</td>
	</tr>
</table>
<table width='900' border='0' cellspacing='0' cellpadding='0'  height='300'>
  <tr>
    <td width='900' align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td width='900' align='left'><b>▣ 갑과 을은 위 계약내용과 약관을 상호 성실히 이행 및 준수할 것을 확인하며 아래와 같이 서명 또는 날인합니다.</b></td>
  </tr>
     <tr>
    <td width='900' align='left'><b>※ 항공기 정비 등 항공사의 귀책사유로 인하거나 천재지변 등으로 인하여 발생하는 여행일정 변경은 항공사와 여행자의 부담으로 한다</b></td>
   </tr>
     <tr>
    <td width='900' align='left'><b>※ 본 계약과 관련한 다툼이 있을 경우 문화관광부고시에 의거 운영되는 관광불편신고처리위원회(전화 1588-8692) 또는 여행사 본사 소재 시.도청(시.군.구 포함) 문화관광과로 중재를 요청할 수 있다.</b></td>
   </tr>
     <tr>
    <td width='900' align='left'><b>트레비아의 허니문여행상품은 환율이 좋을때 언제든지 선결제가 가능합니다. 안내드린 상품가는 현금(원화 or 달러)결제 기준으로 할인된 금액입니다.</b></td>
   </tr>
     <tr>
    <td width='900' align='left'><b><font color='#FF0000'>국외여행 표준약관 제12조에 의거 </font>환율 증감에 따른 상품가 변동이 있습니다. </b></td>
   </tr>
     <tr>
    <td width='900' align='left'><b><font color='#0000FF'>※ 계약시 리조트 상태는 예약가능하나, 부킹시 예약이 불가할 경우, 리조트 변경을 도와드리고, 요청시에는 계약금은 100% 환불해 드립니다. ※</font></b></td>
   </tr>
     <tr>
    <td width='900' align='left'>&nbsp;</td>
   </tr>
     <tr>
    <td width='900' align='left'><b>※ 을의 귀책사유로 취소될 경우, 취소수수료 기준은 갑의 '트레비아 몰디브 특별약관'에 의한다</b></td>
   </tr>
     <tr>
    <td width='900' align='left'><b>▣ 을은 본 상품과 일반약관 및 특별약관에 관하여 충분히 이해했으며 이에 동의합니다.</b></td>
   </tr>
     <tr>
    <td width='900' align='left'></td>
   </tr>
</table>
<table width='900' border='0' cellspacing='1' cellpadding='0'  height='30'>
  <tr>
    <td width='655' align='center' bgcolor='#ffffff'>
		<table width='655' border='0' cellspacing='0' cellpadding='0'  height='30'>
  			<tr>
				<td></td>	
			</tr>
		</table>
	</td>
	<td width='243' align='center' bgcolor='#ffffff'>
			<table width='243' border='0' cellspacing='1' cellpadding='0'  height='30' bgcolor='#545350'>
  			<tr>
			  <td width='82' bgcolor='#ffffff' align='center'>작성일</td>
			  <td width='163' bgcolor='#ffffff' align='center'>".date('Y-m-d')."</td>		
			</tr>
		</table>
	</td>
  </tr>
</table>
<table width='900' border='0' cellspacing='1' cellpadding='0' bgcolor='#545350' height='90'>
  <tr>
    <td width='175' rowspan='3' align='center' bgcolor='#f1f1f1'><b>여 행 업 자 (갑) </b></td>
	<td colspan='2' align='center' bgcolor='#ffffff'><b>상 호 </b></td>
	<td width='240' align='center' bgcolor='#ffffff'>주식회사 트레비아</td>
	<td width='80' rowspan='3' align='center' bgcolor='#ffffff'>직 인 </td>
	<td width='80' align='center' bgcolor='#ffffff'>담당자</td>
	<td width='160' align='center' bgcolor='#ffffff'>".$_POST[val45]."</td>
  </tr>
   <tr>
    <td colspan='2' align='center' bgcolor='#ffffff'><b>주 소 </b></td>
	<td width='240' align='center' bgcolor='#ffffff'>서울시 강서구 등촌동 678-13 진성빌딩602호</td>
	<td width='80' align='center' bgcolor='#ffffff'>전화</td>
	<td width='160' align='center' bgcolor='#ffffff'>".$_POST[val46]."</td>	
   </tr>
   <tr>
    <td colspan='2' align='center' bgcolor='#ffffff'><b>대표자</b></td>
	<td width='240' align='center' bgcolor='#ffffff'>도영춘</td>
	<td width='80' align='center' bgcolor='#ffffff'>비고</td>
	<td width='160' align='center' bgcolor='#ffffff'>&nbsp;</td>
   </tr>
</table>
 
  <table width='900' border='0' cellspacing='1' cellpadding='0' bgcolor='#545350' height='110'>
   <tr>
    <td width='180' rowspan='3' align='center' bgcolor='#f1f1f1' height='30'><b>여 행 자 (을)</b></td>
	<td width='80' rowspan='2'  align='center' bgcolor='#ffffff' height='30'><b>성 명</b></td>
	<td colspan='2' align='center' bgcolor='#ffffff' width='240' height='30'>".$_POST[val47]."</td>
	<td width='160' align='center' bgcolor='#ffffff' height='30'>(서명)</td>
	<td width='80' rowspan='2'  align='center' bgcolor='#ffffff' height='30'>전화</td>
	<td width='160' align='center' bgcolor='#ffffff' height='30'>".$_POST[val48]."</td>
	</tr>
   <tr>
	<td colspan='2' align='center' bgcolor='#ffffff' width='240' height='30'>".$_POST[val49]."</td>
	<td width='160' align='center' bgcolor='#ffffff'>(서명)</td>
	<td width='160' align='center' bgcolor='#ffffff'>".$_POST[val50]."</td>
	</tr>
   <tr>
	<td colspan='6'  align='center' bgcolor='#ffffff' width='720'>
		<table width='715' border='0' cellspacing='0' cellpadding='0'  height='50'>
  			<tr>
				<td width='160' align='center'><b>유의사항</b></td>
				<td width='560' align='left'>* 영문이름이 여권과 다를 경우 탑승이 취소될 수 있으니 꼭 확인하셔야 합니다. <br>
				  * 복수여권을 소지하신 분은 허니문 출발일 기준으로 유효기간이 6개월이상 남아있어야하고,<br>
			    단수여권을 소지하신 분은 한번도 사용하지 않은 여권이어야 출국이 가능합니다. </td>	
			</tr>
</table>
	</td>
	</tr>
  </table>
";


		getSendMail($_POST[to_email].'|'.$_POST[to_name] , $_POST[from_email].'|'.$_POST[from_name], $_POST[to_name]."님의 여행계약서 입니다.", $content, 'HTML');



		
		$ndate = date('Y-m-d H:i:s');
		$m_sql = mysql_query("update ".$_POST[tb_name]." set add12 = '".$ndate."' where uid = '".$puid."' ");


	//echo $content;exit;
?>
<script>
	alert('SEND OK');
	self.close();
</script>