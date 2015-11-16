<!-- 접수완료 페이지 (2011/05/03) -->

<?php
//이메일전송
$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

function getUTFtoKR($str)
{
	return iconv('euc-kr','utf-8',$str);
}

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$g_arr = explode(",",$d['theme']['gubun_list']);
$g_num = count($g_arr);
		
$m_sql = mysql_query("SELECT * FROM rb_bbsext_data where uid = '".$puid."' ");
$m_rs = mysql_fetch_array($m_sql);

//print_r($m_rs);
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
$add14 = explode("||", $m_rs[add14]);	
$add30 = explode("||", $m_rs[add30]);	
$adddata = explode("||", $m_rs[adddata]);	


foreach( $add1 as $key => $value ){$add1[$key] = getUTFtoKR( $value );}
foreach( $add2 as $key => $value ){$add2[$key] = getUTFtoKR( $value );}
foreach( $add3 as $key => $value ){$add3[$key] = getUTFtoKR( $value );}
foreach( $add4 as $key => $value ){$add4[$key] = getUTFtoKR( $value );}
foreach( $add5 as $key => $value ){$add5[$key] = getUTFtoKR( $value );}
foreach( $add6 as $key => $value ){$add6[$key] = getUTFtoKR( $value );}
foreach( $add7 as $key => $value ){$add7[$key] = getUTFtoKR( $value );}
foreach( $add8 as $key => $value ){$add8[$key] = getUTFtoKR( $value );}
foreach( $add9 as $key => $value ){$add9[$key] = getUTFtoKR( $value );}
foreach( $add10 as $key => $value ){$add10[$key] = getUTFtoKR( $value );}
foreach( $add11 as $key => $value ){$add11[$key] = getUTFtoKR( $value );}
foreach( $add13 as $key => $value ){$add13[$key] = getUTFtoKR( $value );}
foreach( $add14 as $key => $value ){$add14[$key] = getUTFtoKR( $value );}
foreach( $add30 as $key => $value ){$add30[$key] = getUTFtoKR( $value );}


/*
성인
*/
$adult_count = 0;
$children_count = 0;
$baby_count = 0;
$adult_a = 0;
$adult_r = 0;
$adult_f = 0;
$adult_e = 0;
$child_a = 0;
$child_r = 0;
$child_f = 0;
$child_e = 0;
$baby_a = 0;
$baby_r = 0;
$baby_f = 0;
$baby_e = 0;
if($add3[1]) {
	if(	$add3[3] =='성인') {
		$adult_count++;
		$adult_a = $add10[1]+$add10[2];
		$adult_r = $add10[3];
		$adult_f = $add10[4];
		$adult_e = $add10[5] + $add10[6] + $add10[7];
	} else if ( $add3[3] == '소아' ) {
		$children_count++;
		$child_a = $add10[1]+$add10[2];
		$child_r = $add10[3];
		$child_f = $add10[4];
		$child_e = $add10[5] + $add10[6] + $add10[7];
	} else {
		$baby_count++;
		$baby_a = $add10[1]+$add10[2];
		$baby_r = $add10[3];
		$baby_f = $add10[4];
		$baby_e = $add10[5] + $add10[6] + $add10[7];
	}
}

if($add3[7]) {
	if(	$add3[9] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[10]+$add10[11];
		$adult_r = $adult_r+$add10[12];
		$adult_f = $adult_f+$add10[13];
		$adult_e = $adult_e+$add10[14] + $add10[15] + $add10[16];
	} else if ( $add3[9] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[10]+$add10[11];
		$child_r = $child_r+$add10[12];
		$child_f = $child_f+$add10[13];
		$child_e = $child_e+$add10[14] + $add10[15] + $add10[16];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[10]+$add10[11];
		$baby_r = $baby_r+$add10[12];
		$baby_f = $baby_f+$add10[13];
		$baby_e = $baby_e+$add10[14] + $add10[15] + $add10[16];
	}
}

if($add3[13]) {
	if(	$add3[15] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[19]+$add10[20];
		$adult_r = $adult_r+$add10[21];
		$adult_f = $adult_f+$add10[22];
		$adult_e = $adult_e+$add10[23] + $add10[24] + $add10[25];
	} else if ( $add3[15] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[19]+$add10[20];
		$child_r = $child_r+$add10[21];
		$child_f = $child_f+$add10[22];
		$child_e = $child_e+$add10[23] + $add10[24] + $add10[25];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[19]+$add10[20];
		$baby_r = $baby_r+$add10[21];
		$baby_f = $baby_f+$add10[22];
		$baby_e = $baby_e+$add10[23] + $add10[24] + $add10[25];
	}
}
if($add3[19]) {
	if(	$add3[21] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[28]+$add10[29];
		$adult_r = $adult_r+$add10[30];
		$adult_f = $adult_f+$add10[31];
		$adult_e = $adult_e+$add10[32] + $add10[33] + $add10[34];
	} else if ( $add3[21] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[28]+$add10[29];
		$child_r = $child_r+$add10[30];
		$child_f = $child_f+$add10[31];
		$child_e = $child_e+$add10[32] + $add10[33] + $add10[34];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[28]+$add10[29];
		$baby_r = $baby_r+$add10[30];
		$baby_f = $baby_f+$add10[31];
		$baby_e = $baby_e+$add10[32] + $add10[33] + $add10[34];
	}
}
if($add3[25]) {
	if(	$add3[27] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[37]+$add10[38];
		$adult_r = $adult_r+$add10[39];
		$adult_f = $adult_f+$add10[40];
		$adult_e = $adult_e+$add10[41] + $add10[42] + $add10[43];
	} else if ( $add3[27] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[37]+$add10[38];
		$child_r = $child_r+$add10[39];
		$child_f = $child_f+$add10[40];
		$child_e = $child_e+$add10[41] + $add10[42] + $add10[43];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[37]+$add10[38];
		$baby_r = $baby_r+$add10[39];
		$baby_f = $baby_f+$add10[40];
		$baby_e = $baby_e+$add10[41] + $add10[42] + $add10[43];
	}
}
if($add3[31]) {
	if(	$add3[33] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[46]+$add10[47];
		$adult_r = $adult_r+$add10[48];
		$adult_f = $adult_f+$add10[49];
		$adult_e = $adult_e+$add10[50] + $add10[51] + $add10[52];
	} else if ( $add3[33] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[46]+$add10[47];
		$child_r = $child_r+$add10[48];
		$child_f = $child_f+$add10[49];
		$child_e = $child_e+$add10[50] + $add10[51] + $add10[52];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[46]+$add10[47];
		$baby_r = $baby_r+$add10[48];
		$baby_f = $baby_f+$add10[49];
		$baby_e = $baby_e+$add10[50] + $add10[51] + $add10[52];
	}
}
if($add3[37]) {
	if(	$add3[39] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[55]+$add10[56];
		$adult_r = $adult_r+$add10[57];
		$adult_f = $adult_f+$add10[58];
		$adult_e = $adult_e+$add10[59] + $add10[60] + $add10[61];
	} else if ( $add3[39] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[55]+$add10[56];
		$child_r = $child_r+$add10[57];
		$child_f = $child_f+$add10[58];
		$child_e = $child_e+$add10[59] + $add10[60] + $add10[61];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[55]+$add10[56];
		$baby_r = $baby_r+$add10[57];
		$baby_f = $baby_f+$add10[58];
		$baby_e = $baby_e+$add10[59] + $add10[60] + $add10[61];
	}
}
if($add3[43]) {
	if(	$add3[45] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[64]+$add10[65];
		$adult_r = $adult_r+$add10[66];
		$adult_f = $adult_f+$add10[67];
		$adult_e = $adult_e+$add10[68] + $add10[69] + $add10[70];
	} else if ( $add3[45] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[64]+$add10[65];
		$child_r = $child_r+$add10[66];
		$child_f = $child_f+$add10[67];
		$child_e = $child_e+$add10[68] + $add10[69] + $add10[70];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[64]+$add10[65];
		$baby_r = $baby_r+$add10[66];
		$baby_f = $baby_f+$add10[67];
		$baby_e = $baby_e+$add10[68] + $add10[69] + $add10[70];
	}
}
if($add3[49]) {
	if(	$add3[51] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[73]+$add10[74];
		$adult_r = $adult_r+$add10[75];
		$adult_f = $adult_f+$add10[76];
		$adult_e = $adult_e+$add10[77] + $add10[78] + $add10[79];
	} else if ( $add3[51] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[73]+$add10[74];
		$child_r = $child_r+$add10[75];
		$child_f = $child_f+$add10[76];
		$child_e = $child_e+$add10[77] + $add10[78] + $add10[79];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[73]+$add10[74];
		$baby_r = $baby_r+$add10[75];
		$baby_f = $baby_f+$add10[76];
		$baby_e = $baby_e+$add10[77] + $add10[78] + $add10[79];
	}
}
if($add3[55]) {
	if(	$add3[57] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[82]+$add10[83];
		$adult_r = $adult_r+$add10[84];
		$adult_f = $adult_f+$add10[85];
		$adult_e = $adult_e+$add10[86] + $add10[67] + $add10[88];
	} else if ( $add3[57] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[82]+$add10[83];
		$child_r = $child_r+$add10[84];
		$child_f = $child_f+$add10[85];
		$child_e = $child_e+$add10[86] + $add10[67] + $add10[88];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[82]+$add10[83];
		$baby_r = $baby_r+$add10[84];
		$baby_f = $baby_f+$add10[85];
		$baby_e = $baby_e+$add10[86] + $add10[67] + $add10[88];
	}
}

$mobile = preg_match("/android|iphone/i", $_SERVER['HTTP_USER_AGENT']);
?>
<!--
<meta name="viewport" content="width=800, initial-scale=0.5, maximum-scale=5.0, minimum-scale=0.5, user-scalable=no, target-densitydpi=medium-dpi" />
-->
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="http://trevia.co.kr/mail/style.css">

<script src="/lib/jquery-1.4.4.js"></script>
<form name="form" action="/modules/bbsext/theme/_pc/list02/final2.php" method="post" onsubmit="return false" />
<input type="hidden" name="to_email" value="<?=$add3[5]?>" />
<input type="hidden" name="to_name" value="<?=$add3[1]?>" />
<input type="hidden" name="from_email" value="ok@trevia.co.kr" />
<input type="hidden" name="from_name" value="트레비아" />
<input type="hidden" name="tb_name" value="<?=$table[$m.'data']?>" />
<input type="hidden" name="puid" value="<?php echo $puid?>" />
<input type="hidden" name="r" value="<?=$_GET[r]?>" />
<input type="hidden" name="m" value="<?=$_GET[m]?>" />
<input type="hidden" name="bid" value="<?=$_GET[bid]?>" />

<body>
<pre>
<? //echo "SELECT * FROM ".$table[$m.'data']." where uid = '".$puid."' ";//print_r($add8); ?>
</pre>
<script language = "JavaScript">
$(document).ready(function(){
	$("#sending").click(function() {
		if( $('#agree1').is(":checked") == true && $('#agree2').is(":checked") == true ) {
			location.href='http://trevia.co.kr/modules/bbsext/theme/_pc/list02/return.php?uid=<?=$uid?>&puid=<?=$puid?>&mobile=<?=$mobile?>';
		} else {
			alert('상기에 명시된 동의버튼을 클릭 해주시기 바랍니다.!');
		}
	});


});

</script>

<br><br>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><Table border="0" cellpadding="0" cellspacing="1" width="800">
      <tr>
        <td align="center"><img src="http://trevia.co.kr/mail/ci_trevia.jpg" width="180" height="55"><br/><br/></td>
	  </tr>
	  <tr>
        <td align="center"><font size="5"><u><b>해 외 여 행 계 약 서</b></u></font> </td>
	  </tr>
	  <tr>
        <td width="200" align="center">&nbsp;</td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td height="20"><span class="style4"><strong>당사("갑")와 당사를 이용하는 여행자("을")는 다음조건으로 여행계약을 체결합니다.</strong></span></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
	<table width="800"  border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td height="20" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행상품명</strong></span></td>
        <td colspan="2" align="center" bgcolor="white"><?=$add2[2]?> <?=$add2[4]?> <?=$add2[5]?>박 <?=$add2[10]?>일<input type="hidden" name="val3" value="<?=$add2[2]?> <?=$add2[4]?> <?=$add2[5]?>박 <?=$add2[10]?>일" style="width:150px" /></td>
        <td align="center" bgcolor="#F1F1F1"><strong>여행기간</strong></td>
        <td align="center" bgcolor="white"><?=$add2[7]?> ~ <?=$add2[8]?><input type="hidden" name="val4" value="<?=$add2[7]?> ~ <?=$add2[8]?>" style="width:150px" /></td>
        <td align="center" bgcolor="#F1F1F1"><?=$add2[5]?>박 <?=$add2[10]?>일<input type="hidden" name="new_val1" value="<?=$add2[5]?>박 <?=$add2[10]?>일" style="width:30px"/></td>
      </tr>

      <tr>
        <td height="20" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행자명</strong></span></td>
        <td align="center" bgcolor="white"><?=$add3[1]?><input type="hidden" name="val5" value="<?=$add3[1]?>" /></td>
        <td align="center" bgcolor="#FFFFFF" ><?=$add3[2]?><input type="hidden" name="val6" value="<?=$add3[2]?>"  /></td>
        <td bgcolor="white" align="center"><?=$add3[7]?><input type="hidden" name="val7" value="<?=$add3[7]?>" /></td>
        <td bgcolor="white" align="center"><?=$add3[8]?><input type="hidden" name="val8" value="<?=$add3[8]?>" /></td>
        <td bgcolor="white" align="center"><?=$add2[0]?><input type="hidden" name="val8_1" value="<?=$add2[0]?>" /></td>
      </tr>

<?if($add3[13]) {?>
      <tr>
        <td height="20" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행자명</strong></span></td>
        <td align="center" bgcolor="white"><?=$add3[13]?><input type="hidden" name="val9" value="<?=$add3[13]?>" readonly="readonly" style="border:0"  /></td>
        <tdalign="center" bgcolor="#FFFFFF" ><?=$add3[14]?><input type="hidden" name="val10" value="<?=$add3[14]?>" readonly="readonly" style="border:0"  /></td>
        <td bgcolor="white" align="center"><?=$add3[19]?><input type="hidden" name="val11" value="<?=$add3[19]?>" readonly="readonly" style="border:0"  /></td>
        <td bgcolor="white" align="center"><?=$add3[20]?><input type="hidden" name="val12" value="<?=$add3[20]?>" readonly="readonly" style="border:0"  /></td>
        <td bgcolor="white" align="center">&nbsp;</td>
      </tr>
<? } ?>

    </table>
	</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td rowspan="5" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행경비</strong></span></td>
        <td align="center" bgcolor="#F1F1F1"><span class="style4"><strong>구분</strong></span></td>
        <td height="20" align="center" bgcolor="#F1F1F1"><span class="style4"><strong>인원수</strong></span></td>
        <td align="center" bgcolor="#f1dbda"><span class="style4"><strong>계약금</strong></span></td>
        <td align="center" bgcolor="#ebf1de"><span class="style4"><strong>잔금(항공)</strong></span></td>
        <td align="center" bgcolor="#e6dfec"><span class="style4"><strong>잔금(리조트)</strong></span></td>
        <td align="center" bgcolor="#dbe6f1"><span class="style4"><strong>기타비용</strong></span></td>
      </tr>
      <tr>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><strong>성인</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><?=$adult_count?><input type="hidden" name="val13" value="<?=$adult_count?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($adult_a > 0) echo '￦'?><?=number_format($adult_a)?><input type="hidden" name="val14" value="<? if($adult_a > 0) echo '￦'?><?=number_format($adult_a)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($adult_r > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($adult_r)?><input type="hidden" name="val15" value="<? if($adult_r > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($adult_r)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($adult_f > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($adult_f)?><input type="hidden" name="val16" value="<? if($adult_f > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($adult_f)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($adult_e > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($adult_e)?><input type="hidden" name="val32" value="<? if($adult_e > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($adult_e)?>" /></td>
      </tr>
      <tr>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><strong>소아</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><?=$children_count?><input type="hidden" name="val17" value="<?=$children_count?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($child_a > 0) echo '￦'?><?=number_format($child_a)?><input type="hidden" name="val18" value="<? if($child_a > 0) echo '￦'?><?=number_format($child_a)?>" /></td>
        <td width="166" bgcolor="#ffffff" align="center"><? if($child_r > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($child_r)?><input type="hidden" name="val19" value="<? if($child_r > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($child_r)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($child_f > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($child_f)?><input type="hidden" name="val20" value="<? if($child_f > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($child_f)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($child_e > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($child_e)?><input type="hidden" name="val33" value="<? if($child_e > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($child_e)?>" /></td>
      </tr>
      <tr>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><strong>유아</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><?=$baby_count?><input type="hidden" name="val21" value="<?=$baby_count?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($baby_a > 0) echo '￦'?><?=number_format($baby_a)?><input type="hidden" name="val22" value="<? if($baby_a > 0) echo '￦'?><?=number_format($baby_a)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($baby_r > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($baby_r)?><input type="hidden" name="val23" value="<? if($baby_r > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($baby_r)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($baby_f > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($baby_f)?><input type="hidden" name="val24" value="<? if($baby_f > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($baby_f)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($baby_e > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($baby_e)?><input type="hidden" name="val34" value="<? if($baby_e > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($baby_e)?>" /></td>
      </tr>
<?
$atotal = $adult_a+$child_a+$baby_a;
$rtotal = $adult_r+$child_r+$baby_r;
$ftotal = $adult_f+$child_f+$baby_f;
$etotal = $adult_e+$child_e+$baby_e;

?>

      <tr>
        <td align="center" bgcolor="#F1F1F1"><span class="style4"><strong>합계</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><?=$adult_count+$children_count+$baby_count?> <input type="hidden" name="val25" value="<?=$adult_count+$children_count+$baby_count?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($atotal > 0) echo '￦'?> <?=number_format($atotal)?> <input type="hidden" name="val26" value="<? if($atotal > 0) echo '￦'?><?=number_format($atotal)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($rtotal > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($rtotal)?> <input type="hidden" name="val27" value="<? if($rtotal > 0) if($add14[0] == 1) echo '$'; else echo '￦' ?><?=number_format($rtotal)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($ftotal > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($ftotal)?> <input type="hidden" name="val28" value="<? if($ftotal > 0) if($add14[1] == 1) echo '$'; else echo '￦' ?><?=number_format($ftotal)?>" /></td>
        <td bgcolor="#ffffff" align="center"><? if($etotal > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($etotal)?> <input type="hidden" name="val35" value="<? if($etotal > 0) if($add14[2] == 1) echo '$'; else echo '￦' ?><?=number_format($etotal)?>" /></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6" align="center"><span class="style4"><strong>적용환율</strong></span></td>
        <td bgcolor="#ffffff" align="center"><strong><?=number_format($add9[0])?><input type="hidden" name="new_val29" value="<?=number_format($add9[0])?>" /></strong></td>
        <td bgcolor="#E6E6E6" align="center"><span class="style4"><strong>납부일자 ( T/L )</strong></td>
        <td bgcolor="#ffffff" align="center"><?=$add11[0]?><input type="hidden" name="val29" value="<?=$add11[0]?>" /></td>
        <td bgcolor="#ffffff" align="center"><?=$add11[2]?><input type="hidden" name="val30" value="<?=$add11[2]?>" /></td>
        <td bgcolor="#ffffff" align="center"><?=$add11[3]?><input type="hidden" name="val31" value="<?=$add11[3]?>" /></td>
        <td bgcolor="#ffffff" align="center"><?=$add11[4]?><input type="hidden" name="val36" value="<?=$add11[4]?>" /></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6" align="center"><span class="style4"><strong>총 금액</strong></span></td>
        <td height="20"  align="center" bgcolor="#ffffff"><strong><input type="text" name="ext1" value="￦<?=number_format($add9[3])?>" style="width:80px; border:0; border-bottom-style:none;"/></strong></td>
        <td bgcolor="#f1f1f1" align="center"><strong>원화총액(KRW)</strong></td>
        <td bgcolor="#ffffff" align="center"><strong><input type="text" name="ext2" value="<? if($add9[2] > 0) echo '￦' ?><?=number_format($add9[2])?>" style="width:80px; border:0; border-bottom-style:none;"/></strong></td>
        <td bgcolor="#f1f1f1" align="center"><strong>외화총액(<?if($m_rs[add20]=="달러"):?>USD<?else:?>EUR<?endif?>)<input type="hidden" name="ext4" value="<?if($m_rs[add20]=="달러"):?>USD<?else:?>EUR<?endif?>" /></strong></td>
        <td bgcolor="#ffffff" align="center"><strong><? if($add9[1] > 0) echo '$'?><?=number_format($add9[1])?><input type="hidden" name="ext3" value="<? if($add9[1] > 0) echo '$'?><?=number_format($add9[1])?>" /></strong></td>
        <td bgcolor="#ffffff" align="center"></td>
      </tr>
	  <tr>
		<td bgcolor="#E6E6E6" align="center"><span class="style4"><strong>비 고</strong></span></td>
		<td colspan="6"  bgcolor="#ffffff">&nbsp;<input type="hidden" name="val_24" value="<?=$add11[24]?>" /><?=$add11[24]?></td>
	  </tr>
    </table></td>
  </tr>
<tr>
    <td height="30">
	<br />
<b>[ 잔금(리조트) 환산방법 &#8211; (USD)외화, (KRW)원화에 따른 안내]</b><br />
<font color="blue">
1. 원화로 잔금 결재시 (잔금 외화USD) = 달러잔금 X 당일전신환 &#8211; 계약금<br />
2. 원화로 잔금 결재시 (잔금 원화KRW) = (원화잔금 / 적용환율) X 당일전신환<br />
3. 외화로 잔금 결재시 (잔금 외화USD) = 계약금은 환불 처리 됩니다.<br />
</font>
[환율기준 : 잔금입금당일 오전 10시 외환은행 전신환 (송금보낼때) 기준]<br />
잔금 환산 예시) 원화로 잔금 결재시 총액 1,360,000원= $2,000 (잔금외화) X 1,080 (송금환) &#8211; 800,000 (계약금) <br />
</td>
  </tr>
  <tr>
  <td><br />
<b>[ 트레비아 법인 입금 계좌안내 &#8211; 서울 등촌서지점 ]</b><br />
원화계좌 : 신한은행 140-009-270166 주)트레비아 / 주)트레비아 임희성 <br />
외화계좌 : 신한은행 180-005-629941 TREVIA CO.,LTD / 지점명 : DEUNGCHON SEO<br /><br />
</td>
</tr>
  <tr>
    <td height="20"><span class="style4"><strong>■ 여행조건</strong></span></td>
  </tr>
  <tr>
    <td>
	
<?
	$nrowspan="2";

if($add6[81]) {
	$nrowspan="12";
} else if($add6[72]) {
	$nrowspan="11";
} else if($add6[63]) {
	$nrowspan="10";
} else if($add6[54]) {
	$nrowspan="9";
} else if($add6[45]) {
	$nrowspan="8";
} else if($add6[36]) {
	$nrowspan="7";
} else if($add6[27]) {
	$nrowspan="6";
} else if($add6[18]) {
	$nrowspan="5";
} else if($add6[9]) {
	$nrowspan="4";
} else if($add6[0]) {
	$nrowspan="3";
}

?>
	<table width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td colspan="8" rowspan="1<?//=$nrowspan?>" align="center" bgcolor="#E6E6E6"><span class="style4"><b>항공여정 예약정보</b></span></td>
	  </tr>
	  <tr>
        <td height="20" colspan="4" align="center" bgcolor="#dbe6f1"><span class="style4"><b>출발</b></span></td>
        <td colspan="4" align="center" bgcolor="#f1dbda"><span class="style4"><b>도착</b></span></td>
      </tr>
      <tr>
        <td height="20" align="center" bgcolor="#f1f1f1"><span class="style4"><b>여정</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>편명</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>날짜</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>시간</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>여정</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>편명</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>날짜</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>시간</b></span></td>
      </tr>

<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<?if(!$add6[$k]){break;}?>

	<tr>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>
	 <td bgcolor='#ffffff' align='center'><?=$add6[$k]?><input type="hidden" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" /></td>

	</tr>
	<?$k++;?>
<?endfor?>
<?

$pcount = 0;
if ($add8[18]) {
	$pcount = 5;
}elseif ($add8[12]) {
	$pcount = 4;
}elseif ($add8[6]) {
	$pcount = 3;
}elseif ($add8[0]) {
	$pcount = 2;
}
?>
</table >
<input type="hidden" name="cnt2" value="<?=$pcount?>" />
<table  width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td colspan="7" align="center" bgcolor="#E6E6E6"><span class="style4"><b>숙박시설 예약정보</b></span></td>
      </tr>
	  <tr>
        <td align="center" bgcolor="#f1f1f1" ><span class="style4"><b>호텔명</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>룸타입</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>체크인</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>박수</b></span></td>
		<td align="center" bgcolor="#f1f1f1"><span class="style4"><b>체크아웃</b></span></td>
		<td bgcolor="#f1f1f1" align="center"><span class="style4"><b>식사</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>이동수단</b></span></td>
      </tr>

<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<?if(!$add8[$k]){break;}?>

	<tr>
	 <td align='center' bgcolor='#ffffff'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>" style="width:130px" /></td>
	<td align='center' bgcolor='#ffffff'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>" style="width:130px" /></td>
	<td bgcolor='#ffffff' align='center'><?=$adddata[$i]?><input type="hidden" name="madddata<?=$i?>" value="<?=$adddata[$i]?>" /></td>
	<td bgcolor='#ffffff' align='center'><?=$add8[$k];$plus_date=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>"  /></td>
	<td bgcolor='#ffffff' align="center"><?=$adddata[$i]?date("Y-m-d", strtotime($adddata[$i]." ". $plus_date." day")):''?></td>

	<td bgcolor='#ffffff' align='center'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>" /></td>
	<td align='center' bgcolor='#ffffff'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>"  /></td>
	</tr>
<?$k++;?>
<?endfor?>



    </table></td>
  </tr>
    </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20"><span class="style4"><strong>■ 제공사항 및 여행자보험 </strong></span></td>
  </tr>
<script>
function boxCheck (obj) {
	if (obj.checked==true)
	{
		obj.value = 1;
	} else {
		obj.value = 0;

	}

}
</script>

  <tr>
    <td><table width="800" border="0" cellpadding="0" cellspacing="1" bgcolor="#545350">
		  <tr>
			<td rowspan="1" align="center" bgcolor="#E6E6E6" width="100px"><span class="style4">제공사항</span></td>
			<td colspan="6" align="left" bgcolor="#ffffff">&nbsp;&nbsp;
			<?
				$temp = "";
				for( $i=0; $i<12; $i++ )
				{
					$temp .= $add30[$i];
					if( $add30[$i+1] && $i<11 )
						$temp .= ' , ';
				}
				echo $temp;
			?>
				<input type="hidden" name="new_val30" value="<?=$temp?>" />
			</td>
		  </tr>
		  <tr>
			<td height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">기타특전</span></td>
			<td colspan="6" align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?=$add30[12]?><input type="hidden" name="new_val31" value="<?=$add30[12]?>" /></td>
		  </tr>
		  <tr>
			<td height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">비     고</span></td>
			<td colspan="6" align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?=$add30[13]?><input type="hidden" name="new_val32" value="<?=$add30[13]?>" /></td>
		  </tr>
		  </table></td>
   </tr>
   <tr>
   <td><table width="800" border="0" cellpadding="0" cellspacing="1" bgcolor="#545350" >
      <tr>
        <td rowspan="2" align="center" bgcolor="#E6E6E6"><span class="style4">항목</span></td>
        <td height="20" colspan="3" align="center" bgcolor="#F1F1F1"><span class="style4"><b>상해</b></span></td>
        <td colspan="2" align="center" bgcolor="#F1F1F1"><span class="style4"><b>질병</b></span></td>
        <td colspan="4" align="center" bgcolor="#F1F1F1"><span class="style4"><b>기타</b></span></td>
      </tr>
      <tr>
        <td height="20" align="center" bgcolor="#F1F1F1"><span class="style4"><b>사망</b></span></td>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><b>후유장애</b></span></td>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><b>해외의료비</b></span></td>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><b>사망</b></span></td>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><b>해외의료비</b></span></td>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><b>배상책임</b></span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4"><b>특별비용</b></span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4"><b>휴대품손해</b></span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4"><b>항공기납치</b></span></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6" align="center"><span class="style4">성인</span></td>
        <td height="20" align="center" bgcolor="#ffffff"><span class="style4">최고1억원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고1억원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고1천만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고2천만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고2천만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">최고1백만원</span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">최고140만원</span></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6" align="center"><span class="style4">학생(어린이)</span></td>
        <td height="20" align="center" bgcolor="#ffffff"><span class="style4">-</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">-</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고1천만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">-</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고2천만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">최고1백만원</span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">최고140만원</span></td>
      </tr>
      <tr>
        <td colspan="5" align="center" bgcolor="#ffffff"><span class="style4">학생(어린이)는 만15세 미만.<br>
          휴대품손해는 건당 20만원 최고1백만원 </span></td>
        <td rowspan="2" align="center" bgcolor="#f1f1f1"><span class="style4"><b>구분계약</b></span></td>
        <td height="20" align="center" bgcolor="#f1f1f1"><span class="style4"><b>행사비</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>항공료</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>기타경비</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>수수료</b></span></td>
      </tr>
      <tr>
        <td height="20" colspan="5" align="left" bgcolor="#ffffff"><div align="center" class="style4">영업공제보험가입 [금액 : 5천만원]<br/>
영업보증보험 [금액 : 2 억원] / 피보험자 : 주)트레비아
 </div></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val44" value="" style="width:60px; border:0; border-bottom-style:none;" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val45" value="" style="width:60px; border:0; border-bottom-style:none;" /></td>
        <td align="center" bgcolor="#ffffff"><input type="text" name="val46" value="" style="width:60px; border:0; border-bottom-style:none;" /></td>
        <td align="center" bgcolor="#ffffff"><input type="text" name="val47" value="" style="width:60px; border:0; border-bottom-style:none;" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td height="20"><span class="style4"><strong>■ 취소수수료 규정 안내 </strong></span></td>
  </tr>
  <tr>
    <td>
  <table  width="800" height="50" border="0" cellpadding="0" cellspacing="1" bgcolor="#545350" >
      <tr>
        <td align="center" bgcolor="#F1F1F1"><span class="style4">취소수수료 부과 기준 </span></td>
        <td align="center" bgcolor="#FFFFFF" ><span class="style4">특별 약관 적용</span></td>
        <td align="center" bgcolor="#F1F1F1"><span class="style4">계약시 </span></td>
        <td align="center" bgcolor="#FFFFFF" ><span class="style4">계약금액 환불 불가 </span></td>
		<td align="center" bgcolor="#F1F1F1"><span class="style4"> D-40일</span></td>
		<td align="center" bgcolor="#FFFFFF" ><span class="style4">전액환불불가</span></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="6"><span class="style4">- 취소수수료는 계약금 입금일부터 적용됩니다. 특별약관 적용의 경우, 표준약관보다 높은 취소수수료가 부과될 수 있습니다. </span></td>
      </tr>
  </table>                                                       
  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style4">▣ 갑과 을은 위 계약내용과 약관을 상호 성실히 이행 및 준수할 것을 확인하며 아래와 같이 서명 또는 날인합니다.</span></td>
  </tr>
  <tr>
    <td><span class="style4">※ 항공기 정비 등 항공사의 귀책사유로 인하거나 천재지변 등으로 인하여 발생하는 여행일정 변경은 항공사와 여행자의 부담으로 한다</span></td>
  </tr>
  <tr>
    <td><span class="style4">※ 본 계약과 관련한 다툼이 있을 경우 문화관광부고시에 의거 운영되는 관광불편신고처리위원회(전화 1588-8692) 또는 여행사 본사 소재 시.도청(시.군.구 포함) 문화관광과로 중재를 요청할 수 있다.</span></td>
  </tr>
  <tr>
    <td><span class="style4">트레비아의 허니문여행상품은 환율이 좋을때 언제든지 선결제가 가능합니다. 안내드린 상품가는 현금(원화 or 달러)결제 기준으로 할인된 금액입니다.</span></td>
  </tr>
  <tr>
    <td><span class="style4">국외여행 표준약관 제12조에 의거 환율 증감에 따른 상품가 변동이 있습니다. </span></td>
  </tr>
  <tr>
    <td><span class="style4">※ ﻿계약진행 확정 후 리조트 사정으로 해당 예약이 불가할 경우, 변경 가능한 리조트를 안내해드리며 이후 고객 요청시에는 계약금 전액을 환불 처리해 
드립니다.(예약 확정 까지는 최대 3~4일이 소요될 수 있습니다.)</span></td>
  </tr>
  <tr>
    <td><span class="style4">※ 을의 귀책사유로 취소될 경우, 취소수수료 기준은 갑의 '트레비아 <?=$add2[2]?> 특별약관'에 의한다</span></td>
  </tr>
  <tr>
    <td><span class="style4">▣ 을은 본 상품과 일반약관 및 특별약관에 관하여 충분히 이해했으며 이에 동의합니다.</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellpadding="0" cellspacing="1" bgcolor="#545350">
      <tr>
        <td height="25" align="center" bgcolor="#e6e6e6"><span class="style4"><b>상 호 </b></span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">주식회사 트레비아 </span></td>
        <td rowspan="3" align="center" bgcolor="#ffffff"><img src="http://trevia.co.kr/mail/sign.jpg" height="79"></td>
        <td align="center" bgcolor="#e6e6e6"><span class="style13">담당자</span></td>
        <td align="center" bgcolor="#ffffff"><?=$add2[9]?><input type="hidden" name="val48" value="<?=$add2[9]?>" style="border:0; border-bottom-style:none;align:center"/></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#e6e6e6"><span class="style4"><b>주 소 </b></span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">서울시 마포구 서교동 480-10 미리내빌딩 3층</span></td>
        <td align="center" bgcolor="#e6e6e6"><span class="style13">대표번호</span></td>
        <td align="center" bgcolor="#ffffff">1644-6681<input type="hidden" name="val49" value="1644-6681" /></td>
      </tr>
      <tr>
        <td height="20" align="center" bgcolor="#e6e6e6"><span class="style4"><b>대표자</b></span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">임 희 성 </span></td>
        <td align="center" bgcolor="#e6e6e6"><span class="style13">담당자직통</span></td>
<?
$sql = mysql_query("SELECT * FROM rb_s_mbrdata where name = '$add2[9]' and admin=1;");
$man = mysql_fetch_array($sql);
?>
        <td align="center" bgcolor="#ffffff"><?=$man[tel2];?></td>
      </tr>
    </table></td>
  </tr>f
  <tr>
    <td>&nbsp;<input type="hidden" name="val51" value="<?=$add3[0]?>.<?=$add3[2]?>" />
	<input type="hidden" name="val52" value="<?=$add3[1]?>" />
	<input type="hidden" name="val53" value="<?=$add3[4]?>" />
	<input type="hidden" name="val54" value="<?=$add3[6]?>.<?=$add3[8]?>"/>
	<input type="hidden" name="val53_1" value="<?=$add3[5]?>" />
	<input type="hidden" name="val55" value="<?=$add3[7]?>" />
	<input type="hidden" name="val56" value="<?=$add3[10]?>"  />
	<input type="hidden" name="val56_1" value="<?=$add3[11]?>"  />
	</td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td rowspan="2"  align="center" bgcolor="#e6e6e6"><span class="style4"><b>성 명</b></span></td>
        <td height="25" align="center" bgcolor="#ffffff"><?=$add3[0]?>.<?=$add3[2]?></td>
        <td align="center" bgcolor="#ffffff"><?=$add3[1]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#aaa">(서명)</span></td>
        <td rowspan="1"  align="center" bgcolor="#ffffff"><?=$add3[4]?></td>
        <td align="center" bgcolor="#ffffff"><?=$add3[5]?></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#ffffff"><?=$add3[6]?>.<?=$add3[8]?></td>
        <td align="center" bgcolor="#ffffff"><?=$add3[7]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#aaa">(서명)</span></td>
        <td rowspan="1"  align="center" bgcolor="#ffffff"><?=$add3[10]?></td>
        <td align="center" bgcolor="#ffffff"><?=$add3[11]?></td>
      </tr>
      <tr>
        <td height="40"  align="center" bgcolor="#e6e6e6"><span class="style4"><b>유의사항</b> </span></td>
        <td height="40" colspan="4"  align="center" bgcolor="#ffffff"><div align="left" class="style4">* 영문이름이 여권과 다를 경우 탑승이 취소될 수 있으니 꼭 확인하셔야 합니다. <br>
  * 복수여권을 소지하신 분은 허니문 출발일 기준으로 유효기간이 6개월이상 남아있어야하고, 단수여권을 소지하신 분은 한번도 사용하지 않은 여권이어야 출국이 가능합니다. <br>
  * 주)트레비아에서는 항공권에 대해서 별도의 수수료 없이 고객님들께 최저가로 구매할 수 있도록 구매대행만 도와드리고 있습니다. 따라서 마일리지 적립 및 좌석지정에 대해서는 고객님 책임 하에 사전에 꼭 준비하여 주시기 바랍니다. <br>
  * 미주 여행자 및 경유자 분들은 비자 소지여부를 꼭 확인 하시고 전자여권 발급 및 ESTA(비자면제프로그램) 신청에 차질이 없도록 신경 쓰셔야 합니다. (ESTA 및 비자 업무 개별 진행된 경우 당사에서는 별도의 개별확인 절차가 없으며 미 신청에 따른 여행불편의 책임을 지지 않습니다.) <br/>
  * 몰디브 내에서의 이동수단은 현지(기상, 리조트)사정에 따라 변동될 수 있습니다. <br/>
  * 미주항공권 대한항공 or 아시아나 + 미국 중간구간(UA, AA, DL) 발권하신 고객님의 경우 항공사의 정책에 따라 중간구간 항공권의 취소시 환불이 전혀 되지 않습니다. 스케줄변경시 변경 수수료가 부과 됩니다. 또한, 출발일 변경이 불가하오니 참고바랍니다.
  </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>


  <!--
  <tr>
    <td height="20"><div align="center"><span class="style4"><span class="style11">본 전자 계약서의 내용을 검토하신 후 아래의 &quot; 계약승인&quot; 버튼을 클릭하시면 여행계약이 성립 됩니다.</span></span></div></td>
  </tr>
  <tr>
    <td height="20" align="right">
      <div align="right"><span class="style4"></span>
          <input type="submit" name="Submit" value="계약승인">
      </div>
    </td>
  </tr>
-->


  <tr>
    <td height="20"><span class="style4"><strong>[ 일반 여행약관 ] </strong></span></td>
  </tr>
  <tr>
    <td height="20">
	<div id="policy01" style="width:800px">
<p>공정거래위원회 승인 약관 (2011.12.28) 준용</p>

<h5>제1조 목적</h5>
이 약관은 주식회사 트레비아(이하 "당사"라 한다.)와 여행자가 체결한 여행계약의 세부 이행 및 준수사항을 정함을 목적으로 합니다. 

<h5>제2조 당사와 여행자 의무</h5>
① 당사는 여행자에게 안전하고 만족스러운 여행서비스를 제공하기 위하여 여행알선 및 안내, 운송, 숙박 등 여행계획의 수립 및 실행과정에서 맡은 바 임무를 충실히 수행하여야 합니다. 
② 여행자는 안전하고 즐거운 여행을 위하여 여행자간 화합도모 및 여행업자의 여행질서 유지에 적극 협조하여야 합니다.
 
<h5>제3조 용어의 정의</h5>
여행의 종류 및 정의, 해외여행 수속대행업의 정의는 다음과 같습니다.

① 기획여행 : 당사가 미리 여행목적지 및 관광일정, 여행자에게 제공될 운송 및 숙식서비스 내용(이하 '여행서비스'라 한다), 여행 요금을 정하여 광고 또는 기타 방법으로 여행자를 모집하여 실시하는 여행. 
② 희망여행 : 여행자(개인 또는 단체)가 희망하는 여행조건에 따라 당사가 운송, 숙식, 관광 등 여행에 관한 전반적인 계획을 수립하여 실시하는 여행. 
③ 해외여행 수속대행(이하 수속대행계약이라 한다) : 당사가 여행자로부터 소정의 수속대행요금을 받기로 약정하고, 여행자의 위탁에 따라 다음에 열거하는 업무(이하 수속 대행업무라 한다)를 대행하는 것. 
   1. 여권, 사증, 재입국 허가 및 각종 증명서 취득에 관한 수속
   2. 출입국 수속서류 작성 및 기타 관련업무 

<h5>제4조 계약의 구성</h5>
① 여행계약은 여행계약서(붙임)와 여행약관, 여행일정표(또는 여행설명서)를 계약내용으로 합니다. 
② 여행일정표(또는 여행설명서)에는 여행일자별 여행지와 관광내용, 교통수단, 쇼핑횟수, 숙박장소, 식사 등 여행실시 일정 및 여행사 제공 서비스 내용과 여행자 유의사항이 포함되어야 합니다.
 
<h5>제5조 계약의 성립</h5>
여행자가 당사에 구두, 전화, 서신, 서류 등에 의한 의사표시로 국외여행을 신청하고, 당사는 소정절차에 따라 이에 대한 신청을 확인한 후 여행자가 여행요금의 10%상당의 계약금을 당사에 지급하면 여행계약이 성립한 것으로 간주합니다. 

<h5>제6조 특약</h5>
당사와 여행자는 관계법규에 위반되지 않는 범위 내에서 서면으로 특약을 맺을 수 있습니다. 이 경우 표준약관과 다름을 당사는 여행자에게 설명하여야 합니다.

<h5>제7조 계약서 및 약관 등 교부</h5>
당사는 여행자와 여행계약을 체결한 경우 여행계약서와 여행약관, 여행일정표(또는 여행설명서)를 각 1부씩 여행자에게 교부하여야 합니다.

<h5>제8조 계약서 및 약관 등 교부 간주</h5>
당사와 여행자는 다음 각 호의 경우 여행계약서와 여행약관 및 여행일정표(또는 여행설명서)가 교부된 것으로 간주합니다.

1. 여행자가 인터넷 등 전자정보망으로 제공된 여행계약서, 약관 및 여행일정표(또는 여행설명서)의 내용에 동의하고 여행계약의 체결을 신청한데 대해 당사가 전자정보망이나 기계적 장치 등을 이용하여 여행자에게 승낙의 의사를 통지한 경우 
2. 당사가 팩시밀리 등 기계적 장치를 이용하여 제공한 여행계약서, 약관 및 여행일정표(또는 여행설명서)의 내용에 대하여 여행자가 동의하고 여행계약의 체결을 신청하는 서면을 송부한데 대해 당사가 전자정보망이나 기계적 장치 등을 이용하여 여행자에게 승낙의 의사를 통지한 경우
 
<h5>제9조 최저행사인원 미 충족시 계약해제</h5>

① 당사가 여행참가자 수 미달로 인하여 여행계약을 해제하는 경우 여행출발 7일전까지 여행자에게 통지하여야 합니다. 
② 당사가 여행참가자 수 미달로 전항의 기일내 통지를 하지 아니하고 계약을 해제하는 경우 이미 지급받은 계약금 환급 외에 다음 각 목의 1의 금액을 여행자에게 배상하여야 합니다. 
1. 여행출발 1일전까지 통지시 : 여행요금의 20%
2. 여행출발 당일 통지시 : 여행요금의 50%

<h5>제10조 계약체결 거절</h5>
당사는 여행자에게 다음 각 호의 1에 해당하는 사유가 있을 경우에는 여행자와의 계약체결을 거절할 수 있습니다.

  1. 다른 여행자에게 폐를 끼치거나 여행의 원활한 실시에 지장이 있다고 인정될 때
  2. 질병 기타 사유로 여행이 어렵다고 인정될 때
  3. 명시한 최대행사인원이 초과되었을 때
  4. 일정표에 최저행사인원이 미달되었을 때

<h5>제11조 여행요금</h5>
① 여행계약서의 여행요금에는 다음 각 호가 포함됩니다. 단, 다음의 1~9호는 여행자 본인이 직접 여행지에서 지불하여야 할 금액이나 당사가 여행자 편의를 위하여 수탁받아 이를 대신 지불합니다. 
    1. 항공기, 선박, 철도 등 이용운송기관의 운임(보통운임기준)
    2. 공항, 역, 부두와 호텔사이 등 송영버스요금
    3. 숙박요금 및 식사요금
    4. 안내자경비
    5. 여행 중 필요한 각종세금
    6. 국내외 공항, 항만세
    7. 관광진흥개발기금
    8. 일정표내 관광지 입장료
    9. 기타 개별계약에 따른 비용
   10. 여행 알선 수수료
② 여행계약서의 여행요금에는 다음 각 호가 불포함됩니다. 단, 희망여행은 당사자간 합의에 따릅니다. 
1. 여행중 개인적 성질의 제비용(통신료, 관세, 일체의 팁, 세탁비, 개인적으로 추가한 식.음료)
2. 여행중 여행자나 개인의 질병, 상해 및 그 밖의 사유로 의사의 진단에 따라 지불해야 하는 일체의 비용
3. 규격이나 규정을 초과하여 발생한 비용(1인 1실 사용 추가요금, 초과 규격의 수화물 운반비 등)
4. 여행 일정표에 구체적으로 명시되지 않은 비용
5. 여행 수속 제비용(여권 인지대, 사증료 등)
③ 여행자는 계약체결시 계약금(여행요금 중 10%이하 금액)을 당사에게 지급하여야 하며, 계약금은 여행요금 또는 손해배상액의 전부 또는 일부로 취급합니다. 
④ 여행자는 제1항의 여행요금 중 계약금을 제외한 잔금을 여행출발 7일전까지 당사에게 지급하여야 합니다.
⑤ 여행자는 제1항의 여행요금을 당사가 지정한 방법(지로구좌, 무통장입금 등)으로 지급하여야 합니다.
⑥ 희망여행요금에 여행자 보험료가 포함되는 경우 당사는 보험회사명, 보상내용 등을 여행자에게 설명하여야 합니다.

<h5>제12조 여행요금의 변경</h5>
① 국외여행을 실시함에 있어서 이용운송,숙박기관에 지급하여야 할 요금이 계약체결시보다 5% 이상 증감하거나 여행요금에 적용된 외화환율이 계약체결시보다 2% 이상 증감한 경우 당사 또는 여행자는 그 증감된 금액 범위 내에서 여행요금의 증감을 상대방에게 청구할 수 있습니다. 
② 당사는 제1항의 규정에 따라 여행요금을 증액하였을 때에는 여행개시 15일전에 여행자에게 통지하여야 합니다.

<h5>제13조 여행조건의 변경요건 및 요금 등의 정산</h5>
① 위 제1조 내지 제12조의 여행조건은 다음 각 호의 1의 경우에 한하여 변경될 수 있습니다. 
    1. 여행자의 안전과 보호를 위하여 여행자의 요청 또는 현지사정에 의하여 부득이하다고 쌍방이 합의한 경우
    2. 천재지변, 전란, 정부의 명령, 운송,숙박기관 등의 파업,휴업 등으로 여행의 목적을 달성할 수 없는 경우
② 제1항의 여행조건 변경 및 제12조의 여행요금 변경으로 인하여 제11조제1항의 여행요금에 증감이 생기는 경우에는 여행출발 전 변경분은 여행출발 이전에, 여행 중 변경분은 여행종료 후 10일 이내에 각각 정산(환급)하여야 합니다. 
③ 제1항의 규정에 의하지 아니하고 여행조건이 변경되거나 제15조 또는 제16조의 규정에 의한 계약의 해제,해지로 인하여 손해배상액이 발생한 경우에는 여행출발 전 발생분은 여행출발 이전에, 여행 중 발생분은 여행종료 후 10일 이내에 각각 정산(환급)하여야 합니다. 
④ 여행자는 여행출발 후 자기의 사정으로 숙박, 식사, 관광 등 여행요금에 포함된 서비스를 제공받지 못한 경우 당사에게 그에 상응하는 요금의 환급을 청구할 수 없습니다. 단, 여행이 중도에 종료된 경우에는 제14조에 준하여 처리합니다.
 
<h5>제14조 손해배상</h5>
① 당사는 현지여행업자 등의 고의 또는 과실로 여행자에게 손해를 가한 경우 당사는 여행자에게 손해를 배상하여야 합니다. 
② 당사의 귀책사유로 여행자의 국외여행에 필요한 여권, 사증, 재입국 허가 또는 각종 증명서 등을 취득하지 못하여 여행자의 여행일정에 차질이 생긴 경우 당사는 여행자로부터 절차대행을 위하여 받은 금액 전부 및 그 금액의 100% 상당액을 여행자에게 배상하여야 합니다. 
③ 당사는 항공기, 기차, 선박 등 교통기관의 연발착 또는 교통체증 등으로 인하여 여행자가 입은 손해를 배상하여야 합니다. 단, 당사가 고의 또는 과실이 없음을 입증한 때에는 그러하지 아니합니다. 
④ 당사는 자기나 그 사용인이 여행자의 수하물 수령, 인도, 보관 등에 관하여 주의를 해태(懈怠)하지 아니하였음을 증명하지 아니하면 여행자의 수하물 멸실, 훼손 또는 연착으로 인한 손해를 배상할 책임을 면하지 못합니다. 

<h5>제15조 여행출발 전 계약해제</h5>
① 당사 또는 여행자는 여행출발전 이 여행계약을 해제할 수 있습니다. 이 경우 발생하는 손해액은 '소비자 분쟁해결 기준 '(공정거래위원회 고시)에 따라 배상합니다. 
   1. 여행자의 여행계약 해제 요청이 있는 경우(여행자의 취소요청시) 
- 여행 개시 20일전(~20)까지 통보시 : 여행요금의 10% 배상 
- 여행 개시 10일전까지(19~10) 통보시 : 여행요금의 15% 배상 
- 여행 개시 8일 전까지(9~8) 통보시 : 여행요금의 20% 배상 
- 여행 개시 1일 전까지(7~1) 통보시 : 여행요금의 30% 배상 
- 여행 당일 통보시 : 여행요금의 50% 배상 
2. 당사의 귀책사유로 취소 통보하는 경우 
      - 여행 개시 20일전(~20)까지 통보시 : 계약금 환급 
      - 여행 개시 10일전까지(19~10) 통보시 : 여행요금의 5% 배상 
      - 여행 개시 8일 전까지(9~8) 통보시 : 여행요금의 10% 배상 
      - 여행 개시 1일 전까지(7~1) 통보시 : 여행요금의 20% 배상 
      - 여행 당일 통보시 : 여행요금의 50% 배상 
   단, 최저행사인원이 충족되지 않아 불가피하게 기획여행을 실시할 수 없는 경우에는 제9조(최저행사인원 미충족시 계약해제)의 조항에 의거하여 당사가 여행자에게 배상한다. 
3. 규격이나 규정을 초과하여 발생한 비용(1인 1실 사용 추가요금, 초과 규격의 수화물 운반비 등)
   4. 여행 일정표에 구체적으로 명시되지 않은 비용
   5. 여행 수속 제비용(여권 인지대, 사증료 등)
② 당사 또는 여행자는 여행출발 전에 다음 각 호의 1에 해당하는 사유가 있는 경우 상대방에게 제1항의 손해배상액을 지급하지 아니하고 이 여행계약을 해제할 수 있습니다 
1. 당사가 해제할 수 있는 경우
      가. 제13조 제1항 제1호 및 제2호사유가 있는 경우
      나. 다른 여행자에게 폐를 끼치거나 여행의 원활한 실시에 현저한 지장이 있다고 인정될 때
      다. 질병 등 여행자의 신체에 이상이 발생하여 여행에의 참가가 불가능한 경우
      라. 여행자가 계약서에 기재된 기일까지 여행요금을 납입하지 아니한 경우 
2. 여행자가 해제할 수 있는 경우
      가. 제13조제1항제1호 및 제2호의 사유가 있는 경우
      나. 여행자의 3촌 이내 친족이 사망한 경우 (단, 여행자는 아래와 같은 입증서류를 당사에 제출하여야 한다.)
          1) 친족을 확인할 수 있는 서류(호적등본 등)
          2) 진단서 또는 사체검안서(사망진단서)
          3) 그밖에 필요한 자료
      다. 질병 등 여행자의 신체에 이상이 발생하여 여행에의 참가가 불가능한 경우 (단, 여행자는 아래와 같은 입증서류를 당사에 제출하여야 한다.)
          1) 진단서
          2) 그밖에 필요한 자료
      라. 배우자 또는 직계존비속이 신체이상으로 3일 이상 병원(의원)에 입원하여 여행 출발 전까지 퇴원이 곤란한 경우 (그 배우자 또는 보호자 1인 단, 여행자는 아래와 같은 입증서류를 당사에 제출하여야 한다.)
          1) 친족을 확인할 수 있는 서류(호적등본등)
          2) 진단서
          3) 그밖에 필요한 자료
마. 당사의 귀책사유로 계약서 또는 여행일정표(여행설명서)에 기재된 여행일정대로의 여행실시가 불가능해진 경우
바. 제12조 제1항의 규정에 의한 여행요금의 증액으로 인하여 여행 계속이 어렵다고 인정될 경우 

<h5>제16조 여행출발 후 계약해지</h5>
① 당사 또는 여행자는 여행출발 후 부득이한 사유가 있는 경우 이 여행계약을 해지할 수 있습니다. 단, 이로 인하여 상대방이 입은 손해를 배상하여야 합니다. 
② 제1항의 규정에 의하여 계약이 해지된 경우 당사는 여행자가 귀국하는데 필요한 사항을 협조하여야 하며, 이에 필요한 비용으로써 당사의 귀책사유에 의하지 아니한 것은 여행자가 부담합니다. 

<h5>제17조 당사의 책임</h5>
당사는 여행 출발시부터 도착시까지 당사 본인 또는 그 고용인, 현지여행업자 또는 그 고용인 등(이하 '사용인'이라 함)이 제2조 제1항에서 규정한 당사 임무와 관련하여 여행자에게 고의 또는 과실로 손해를 가한 경우 책임을 집니다.

<h5>제18조 여행자의 책임</h5>
① 여행자는 여행의 원활한 진행을 위하여 당사에서 주최하는 사전 여행 설명회에 참가하여 제11조 1항의 각호를 확인할 책임이 있습니다. 
② 여행자는 여행의 원활한 진행을 위하여 여행 안내원의 업무수행에 성실히 협조하여야 합니다.
③ 여행자의 고의 또는 과실로 당사에 끼친 손해에 대하여 여행자는 당사에 배상 및 보상의 책임을 집니다.
④ 여행자의 귀중품 및 소지품은 여행자 자신의 책임 하에 각자 보관하여야 합니다. 
   여행 도중 여행자의 귀중품 및 소지품이 도난사실이 발생한 경우 여행자 또는 보험수익자는 사고가 생긴 것을 알았을 때에는 지체 없이 그 사실을 해당 보험회사에 알리고 아래의 서류를 빠른 시간 내에 제출하여야 합니다. 
   1. 도난 확인서
   2. 경위서
   3. 그 밖에 필요한 서류
⑤ 여행자가 여행계약 체결 전에 고지하지 않은 신체의 장해 또는 질병 등으로 발생하는 문제는 여행자가 책임을 집니다. 단, 여행 도중 발생한 신체의 장해 또는 질병 등이 발생한 경우 여행자 또는 보험수익자는 지체없이 그 사실을 해당 보험회사에 알리고 아래의 서류를 즉시 제출하여야 합니다. 
   1. 사고 증명서
   2. 진단서
   3. 경위서
   4. 영수증
   5. 그 밖에 필요한 서류
⑥ 항공으로 이동 전에 해당 공사에 위탁한 수하물은 여행자가 확인할 책임이 있습니다. 국제선으로 운송되는 수하물에 손상이 발생하였을 경우 여행자는 당해 손상 발견 즉시 또는 늦어도 수하물을 수취한 날로부터 7일 이내에 운송인에게 서면으로 이의를 제기하여야 하며, 지연의 경우에는 수하물을 수취한 날로부터 21일 이내에 운송인에게 이의를 제기하여야 합니다. 

<h5>제19조 여행의 시작과 종료</h5>
여행의 시작은 탑승수속(선박인 경우 승선수속)을 마친 시점으로 하며, 여행의 종료는 여행자가 입국장 보세구역을 벗어나는 시점으로 합니다. 단, 계약내용상 국내이동이 있을 경우에는 최초 출발지에서 이용하는 운송수단의 출발시각과 도착시각으로 합니다.

<h5>제20조 설명의무</h5>
당사는 계약서에 정하여져 있는 중요한 내용 및 그 변경사항을 여행자가 이해할 수 있도록 설명하여야 합니다.

<h5>제21조 보험가입 등</h5>
당사는 이 여행과 관련하여 여행자에게 손해가 발생한 경우 여행자에게 보험금을 지급하기 위한 보험 또는 공제에 가입하거나 영업보증금을 예치하여야 합니다.

<h5>제22조 기타사항</h5>
① 이 계약에 명시되지 아니한 사항 또는 이 계약의 해석에 관하여 다툼이 있는 경우에는 당사 또는 여행자가 합의하여 결정하되, 합의가 이루어지지 아니한 경우에는 관계법령 및 일반관례에 따릅니다. 
② 특수지역에의 여행으로서 정당한 사유가 있는 경우에는 당사의 여행약관의 내용과 달리 정할 수 있습니다.

</div>
	
	</td>
  </tr>
  <tr>
    <td height="20"><span class="style4"><strong>[ 특별 여행약관 : <?=$add2[2]?> ] <input type="hidden" name="add2_2" value="<?=$add2[2]?>" /> </strong></span></td>
  </tr>
  <tr>
    <td>
	</td>
  </tr>
  <tr>
    <td>
<div id="policy01" style="width:800px">
<h5>제1조 (목적)</h5>
이 약관은 주식회사 트레비아(이하 '회사'라고 한다)와 여행사가 체결한 국외여행계약의 표준약관 제6조에 준해 표준약관 내용외의 세부이행 및 준수사항 정함을 목적으로 하며 본 계약 상품에 명시함으로써 일반약관보다 우선적으로 효력을 발생합니다.

<h5>제2조 (당사와 여행자 의무)</h5>
1. 당사는 여행자에게 안전하고 만족스로운 여행서비스를 제공하기 위하여 여행알선 및 안내, 운송, 숙박 등 여행계획의 수립 및 실행과정에서 맡은 바 임무를 충실히 수행하여야 한다.
2. 여행자는 안전하고 즐거운 여행을 위하여 여행자간 화합도모 및 여행업자의 여행질서 유지에 적극협조하여야 한다.
3. 본 특별약관은 여행계약서 및 여행안내서와 함께 을에게 교부하여야 하며 일반약관과 다른 점을 설명하여야 한다. 

<h5>제3조 (여행계약 및 여행비용의 납입)</h5>
1. 본 상품은 <?=$add2[2]?> 여행 상품으로 리조트와 항공권 등이 포함된 상품입니다.
2. 여행자는 직접방문, 전화, 인터넷, 이메일, 팩스 등으로 당사의 소정양식 및 절차에 따라 여행 신청을 할 경우 계약이 성립되며, 1 인당  최소 40만원의 계약금을 지급하여야 한다.   
3. 본 상품은 회사가 정한 계약금이 입금됨과 동시에 계약이 성립하며 여행출발일 46일전까지 잔금을 완납해야 계약의 효력이 유지됩니다.
4. 을 은 본 특별약관을 충분히 이해하고 동의한다는 의사표시로 여행자계약서 상의 을의 성명 옆에 서명하고 사본을 이메일, 팩스 등의 방법으로 회사로 송부하여야 한다.
   - 여행계약서 교부후 3일 이내에 서명본이 회사로 도달되지 않을 경우 서명한 것으로 간주한다.

<h5>제4조 (계약해제 및 취소규정)</h5>
1. 여행자는 여행출발전 여행계약을 해제할 수 있지만, 이에 따라 발생하는 손해액은 일반적인 상품이나 리조트의경우 국외여행표준약관 제15조에 따라 배상합니다. 하지만 국외여행표준약관 제22조 2항에 근거해 일부 특수지역이나 상품, 리조트에 대해서는 여행자의 여행계약 해제 취소요청이 있는경우(여행자의 취소요청시)소비자 피해보상규정과는 상관없이 각 상품별로 특별약관에 따른 별도의 취소요금이 부과됩니다. 특별약관의 피해보상 규정은 일반적인 약관인 소비자 피해보상규정보다 우선시 적용됩니다. 
2. 따라서 상기의 경우, 취소 수수료는 회사의 일반약관에 우선하여 부득이 본 특별약관을 적용하여 다음과 같이 취소 수수료가 적용됨을 양해해 주시기 바랍니다.
   - 여행출발일 46일전까지 취소시 : 계약금을 제외한 나머지 금액 환불
   - 여행출발일 45일전부터 출발일당일까지 취소시 : 환불 불가
3. 특정리조트는 리조트 자체 취소정책에 준하여 상기 취소일정과 상이 할수 있음을 알려드립니다.

4. 고객님의 사정으로 인해 항공권을 취소할 경우 해당 항공사의 취소환불 규정에 의해 환불됩니다. 일부 발권된 항공권의 경우 해당 항공사의 판매정책에 의해 환불이 불가할 수 있습니다.


<h5>제5조 (현금영수증)</h5>
1. 현금영수증 발급은 예약일로 부터 여행도착일 +7일 이내 신청할 수 있습니다.
2. 현금 영수증 발급시기는 현금영수증 가맹점이 재화 또는 용역을 공급하고 그 대금을 현금으로 받는 때에 재화 또는 용역을 공급받는 자에게 발급하는 것으로 기지급 받은 현금에 대하여 소급하여 발급할 수는 없음을 알려 드립니다. (사건번호 서일-1059 2007. 7. 27 참조)

<h5>제6조 (기타사항)</h5>
1. 항공좌석은 사전 배정이 불가하며 여행출발일 탑승수속시 배정합니다.
2. 주식회사 트레비아에서는 최대 보험금 1억원의 여행자 보험을 가입해 드립니다. 여행 도중에 우연하게 현지에서 발생하는 불의의 사고 및 질병이 발생할 경우에는 반드시 현지 가이드 및 회사 긴급 연락처에 연락하여 도움을 받으시길 바랍니다. 보험 약관상 현지 병원 진단서 및 영수증, 경찰의 사건 확인서를 받아 오셔야 보험 혜택이 있으므로 가이드와 상의 바랍니다. 보험 약관에 관한 자세한 혜택 내용은 홈페이지(www.samsungfire.co.kr)를 통하여 확인하여 주시기 바랍니다.
</div>
	</td>
	<!-- 특별 여행약관 정책테이블 까지. -->
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40" bgcolor="#e6e6e6"><div align="center" class="style4"><strong>계약서 승인 회신 </strong></div></td>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40"><p class="style4"><strong>본인 <?=$add3[1]?><?if($add3[7]):?>과 <?=$add3[7]?><?endif?>는 상기 첨부된 여행계약서 내용을 충분히 검토하여 이의 없음을 확인하고 전원이 동의한다는 의사표시로써 본인 및 동행자의 서명, 날인에 갈음하여 e-mail로 회신합니다. 회신자 <?=$add3[1]?> <?=$add3[7]?> [<?=date('Y년m월d일 H시i분s초')?>] <br>
    </strong></p>    </td>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
    <tr>
	<td align='right'>
		<span style='color:brown'>계약자 본인은 계약서 상의 항공여정 예약정보, 숙박시설 예약정보, 출발일, 전체 여정 등의 날짜를 확인 하였고 동의 합니다.</span>&nbsp;&nbsp;<input id='agree1' name='agree2' type='checkbox' /> 동의합니다.
	</td>
  </tr> 
  <tr>
	<td align='right'>
		<span  style='color:brown'>계약자 본인은 본 계약서상에 적용되는 취소 규정 및 특별약관 을 확인 하였고 동의 합니다.</span>&nbsp;&nbsp;<input id='agree2' name='agree2' type='checkbox' /> 동의합니다.
	</td>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td>
	상기 동의함을 전부 클릭하신 후 “여행 계약 승인” 버튼을 클릭하시면 전체 계약내용과 날짜가 주식회사 트레비아로 전송되어 계약 쳬결됩니다.
고객님의 PC 환경 및 네트웍 보안 설정 등으로 인해 일부PC에서는 계약 승인 요청시 당사로 회신이 되지 않을 수 있습니다. 
본 계약서 프린트 하셔서 한글성명에 서명날인 후 팩스(02-3662-6681) 전송하셔도 가능합니다. 아웃룩등의 별도의 이메일 프로그램 사용시에는 승인회신이 되지 않을수 있어, 웹 메일상에서 승인 해주셔야 합니다. 여타의 통신 방법으로 승인 회신 불가시  수신 후 3 영업일 
이내에 별도의 이의를 제기하지 않으시고 담당 플래너에게 구두 계약으로 승인 진행 할 수 있습니다.
	</td>
  </tr>
  <tr>
    <td height="20">
      <div align='center'>
          <b><font size='3' color='red'><br/><br />
				<input type='button' id="sending" name='sending' value=' 여행 계약 승인 ' style='width:200px;height:40px' onclick="_agree()" />
			</font></b>
		  </div>
	</td>
  </tr>
</table>
</body>

</form>
<br><br>
</html>
