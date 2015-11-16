<?
$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$m_sql = mysql_query("SELECT * FROM rb_bbsext_data where uid = '".$_GET['uid']."' ");
$m_rs = mysql_fetch_array($m_sql);


if(is_array($m_rs))
{
	foreach($m_rs as $key => $value)
	{
		$m_rs[$key] = stripslashes(iconv('euc-kr','utf-8',urldecode($value)));
	}
}

$add2 = explode("||", $m_rs['add2']);
$add3 = explode("||", $m_rs['add3']);
$add8 = explode("||", $m_rs['add8']);
$add15 = explode("||", $m_rs['add15']);
$add16 = explode("||", $m_rs['add16']);
$adddata = explode("||", $m_rs['adddata']);

//print_r($m_rs);

$m_sql = mysql_query("SELECT * FROM rb_s_mbrdata where memberuid = '".$m_rs[mbruid]."' ");
$mbr_rs = mysql_fetch_array($m_sql);

if(is_array($mbr_rs))
{
	foreach($mbr_rs as $key => $value)
	{
		$mbr_rs[$key] = stripslashes(iconv('euc-kr','utf-8',urldecode($value)));
	}
}

//print_r($mbr_rs);


?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.sm, p {font-size:12px;}
.sm td {padding:9px; border-right:solid 1px #e5e5e5; border-bottom:solid 1px #e5e5e5; text-align:center; color:#333;}
.sm .gray1 {background:#e5e5e5; border-bottom:1px solid #cecece; font-weight:bold;}
.sm .gray2 {background:#e5e5e5; border-bottom:1px solid #cecece; font-weight:bold;}
.sm th {background:#e5e5e5; color:#333; padding:9px; border-top:2px solid #666; border-right:solid 1px #cecece; border-bottom:solid 1px #cecece; text-align:center;}
.sm .th2 {border-top:1px solid #666;}
.sm .th3 {border-top:1px solid #e5e5e5;}
.sm .text1 {color:#3f52ab; font-weight:bold;}
.sm .smtitle {font-size:25px;font-weight:bold; border:2px solid #666; border-top:2px solid #666;}
.sm .alignright {text-align:right;}
.sm .bottomline {border-bottom:1px solid #666;}
.sm .bottomnone {border-bottom:none;}
</style>
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

  window.close();
 }
  
</script>
</head>

<body onload="printWindow();">
<object id="factory" style="display:none"
classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814"
  codebase="/smsx.cab#Version=7.4.0.8">
</object>
<div id="idPrint">
<table width="820" border="0" cellspacing="0" cellpadding="0" class="sm" style="margin-bottom:10px;">
  <tr>
    <td width="363" rowspan="2" class="smtitle">여행 정산서</td>
    <th width="198">담당</th>
    <th width="128">검토</th>
    <th width="131" style="border-right:2px solid #666;">대표</th>
  </tr>
  <tr>
    <td height="57" style="border-bottom:2px solid #666;">&nbsp;</td>
    <td class="bottomline" style="border-bottom:2px solid #666;">&nbsp;</td>
    <td class="bottomline" style="border-right:2px solid #666;border-bottom:2px solid #666;">&nbsp;</td>
  </tr>
</table>
<table width="820" border="0" cellspacing="0" cellpadding="0" class="sm" style="margin-bottom:10px;">
  <tr>
    <th rowspan="2" class="bottomnone" style="border-left:1px solid #cecece;">여행<br/>정보</th>
    <th>여행지역</th>
    <th>구분</th>
    <th>총여정</th>
    <th>출발일</th>
    <th>도착일</th>
    <th>항공편</th>
  </tr>
  <tr>
    <td><?=$add2[2]?></td>
    <td><?=$add2[4]?></td>
    <td><?=$add2[5]?>박 <?=$add2[10]?>일</td>
    <td><?=$add2[7]?></td>
    <td><?=$add2[8]?></td>
    <td>KE</td>
  </tr>
<?  
	$count = 0;
	for( $i = 0; $i < 8; $i++ ) { 
		if( empty($add3[$i*7]) ) break;
		$count++;
	}
	$user = $count;
?>
<? 
	for( $i = 0; $i < 8; $i+=2 ) { 
		if( empty($add3[$i*7]) ) break;
?>
  <tr>
  <? if ($i == 0 ) { ?>
    <th rowspan="<?=$count/2?>" class="th2 bottomnone" style="border-left:1px solid #cecece;">고객<br/>정보</th>
  <? } ?>
    <td <? if( empty($add3[($i+2)*7])) {?> class="bottomnone"<?}?>><?=$add3[$i*6+1]?></td>
    <td <? if( empty($add3[($i+2)*7])) {?> class="bottomnone"<?}?>><?=$add3[$i*6+2]?></td>
    <td <? if( empty($add3[($i+2)*7])) {?> class="bottomnone"<?}?>><?=$add3[$i*6+0]?></td>
    <td <? if( empty($add3[($i+2)*7])) {?> class="bottomnone"<?}?>><?=$add3[$i*6+7]?></td>
    <td <? if( empty($add3[($i+2)*7])) {?> class="bottomnone"<?}?>><?=$add3[$i*6+8]?></td>
    <td <? if( empty($add3[($i+2)*7])) {?> class="bottomnone"<?}?>><?=$add3[$i*6+6]?></td>
  </tr>
  <? } ?>
<!--
	<td>정종수</td>
    <td>JONG, JONG SU</td>
    <td>MR</td>
    <td>김나래</td>
    <td>KIM, NA RAE</td>
    <td>MS</td>
  </tr>
  <tr>
    <td class="bottomnone">김나래</td>
    <td class="bottomnone">KIM, NA RAE</td>
    <td class="bottomnone">MS</td>
    <td class="bottomnone">김나래</td>
    <td class="bottomnone">KIM, NA RAE</td>
    <td class="bottomnone">MS</td>
  </tr>
-->
  <tr>
    <th colspan="3" class="th2" style="border-left:1px solid #cecece;">리조트명</th>
    <th colspan="2" class="th2">룸타입</th>
    <th class="th2">Check-in</th>
    <th class="th2">Night</th>
  </tr>
<? 
	for( $i = 0; $i < 8; $i++ ) { 
		if( empty($add8[$i*6]) ) break;
?>
  <tr>
    <td colspan="3" style="border-left:1px solid #cecece;"><?=$add8[$i*6]?></td>
    <td colspan="2"><?=$add8[$i*6+1]?></td>
    <td><?=$adddata[$i]?></td>
    <td><?=$add8[$i*6+2]?></td>
  </tr>
<? } ?>

</table>
<table width="820" border="0" cellspacing="0" cellpadding="0" class="sm">
<?
	$count = 1;
	for( $i = 0; $i < 8; $i++ ) { 
		if( empty($add15[$i*5]) ) break;
		$count++;
	}
?>
  <tr>
    <th rowspan="<?=$count?>"  class="bottomnone" style="border-left:1px solid #cecece;">입 금</th>
    <th>입금일</th>
    <th>입금처</th>
    <th>입금 내역</th>
    <th>USD 금액</th>
    <th>KRW 금액</th>
  </tr>
<? 
	for( $i = 0; $i < 8; $i++ ) { 
		if( empty($add15[$i*5]) ) break;
?>
  <tr>
    <td><?=$add15[$i*5]?></td>
    <td><?=$add15[$i*5+4]?></td>
    <td><?=$add15[$i*5+1]?></td>
    <td class="alignright"><? if ( $add16[$i] == "$" ) echo number_format($add15[$i*5+2]) ?></td>
    <td class="alignright"><? if ( $add16[$i] == "￦" ) echo number_format($add15[$i*5+2]) ?></td>
  </tr>
<? } 
	$count = 1;
	for( $i = 8; $i < 20; $i++ ) { 
		if( empty($add15[$i*5]) ) break;
		$count++;
	}
?>
  <tr>
    <th rowspan="<?=$count?>" class="th2 bottomnone" style="border-left:1px solid #cecece; border-bottom:none;">지 출</th>
    <th class="th2">지출일</th>
    <th class="th2">지출처</th>
    <th class="th2">지출 내역</th>
    <th class="th2">USD 금액</th>
    <th class="th2">KRW 금액</th>
  </tr>
<? for( $i = 8; $i < 20; $i++ ) { 
		if( empty($add15[$i*5]) ) break;
?>
  <tr>
    <td><?=$add15[$i*5]?></td>
    <td><?=$add15[$i*5+4]?></td>
    <td><?=$add15[$i*5+1]?></td>
    <td class="alignright"><? if ( $add16[$i] == "$" ) echo number_format($add15[$i*5+2]) ?></td>
    <td class="alignright"><? if ( $add16[$i] == "￦" ) echo number_format($add15[$i*5+2]) ?></td>
  </tr>
<? } ?>
  <tr>
    <th rowspan="3" class="th2 bottomline" style="border-left:1px solid #cecece;">수 익</th>
    <th class="th2">담당자</th>
    <td class="th2"><?=$m_rs[name]?></td>
    <th class="th2">입금총액</th>
    <td class="th2 alignright"><?=$add15[103]?></td>
    <td class="th2 alignright"><?=$add15[100]?></td>
  </tr>
  <tr>
    <th class="th3">연락처</th>
    <td><?=$mbr_rs[tel2]?></td>
    <th class="th3">출금총액</th>
    <td class="alignright"><?=$add15[104]?></td>
    <td class="alignright"><?=$add15[101]?></td>
  </tr>
  <tr>
    <th class="th3 bottomline">정산번호</th>
    <td class="bottomline"><?="RC".date("Ymd").$m_rs[mbruid]?></td>
    <th class="th3 bottomline">총 정산 수익</th>
    <td class="bottomline alignright"><?=$add15[105]?></td>
    <td class="bottomline alignright"><?=$add15[102]?></td>
  </tr>
</table>
<p>Powered By Trevia Co.,ltd.</p>
</div>
</body>
</html>
