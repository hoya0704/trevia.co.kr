<?php
$dbconnect = mysql_connect("localhost", "trevia", "trevia6681") or die(mysql_error()); 
$mysql = mysql_select_db("trevia") or die(mysql_error());
mysql_query("set names utf8;");
		
$m_sql = mysql_query("SELECT * FROM rb_extra where uid = '".$uid."' ");
$m_rs = mysql_fetch_array($m_sql);


$info = explode("||", $m_rs[info]);
$resort1_memo = explode("||", $m_rs[resort1_memo]);
$resort2_memo = explode("||", $m_rs[resort2_memo]);
$resort3_memo = explode("||", $m_rs[resort3_memo]);
$resort4_memo = explode("||", $m_rs[resort4_memo]);
$resort5_memo = explode("||", $m_rs[resort5_memo]);

$resort1_memo[11] = empty($resort1_memo[11]) ? "가격/인" : $resort1_memo[11];
$resort2_memo[11] = empty($resort2_memo[11]) ? "가격/인" : $resort2_memo[11];
$resort3_memo[11] = empty($resort3_memo[11]) ? "가격/인" : $resort3_memo[11];
$resort4_memo[11] = empty($resort4_memo[11]) ? "가격/인" : $resort4_memo[11];
$resort5_memo[11] = empty($resort5_memo[11]) ? "가격/인" : $resort5_memo[11];

$air1_a = explode("||", $m_rs[air1_price]);
$air2_a = explode("||", $m_rs[air2_price]);
$air3_a = explode("||", $m_rs[air3_price]);
$air4_a = explode("||", $m_rs[air4_price]);

$air1_date = explode("||", $m_rs[air1_date]);
$air2_date = explode("||", $m_rs[air2_date]);
$air3_date = explode("||", $m_rs[air3_date]);
$air4_date = explode("||", $m_rs[air4_date]);

?>
<html>
 <head>
  <title> <?=$m_rs[subject]?> </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
 </head>
<style>
td{padding:5px 0px}
textarea{width:100%;height:110px;}
input[type=text]{width:200px;}
</style>
<script>
	window.resizeTo(850, screen.height);
</script>
<link rel="stylesheet" href="http://trevia.co.kr/mail/style.css">


<body>

<table width="900" border="0" cellspacing="0" cellpadding="0">
<tr><td align="center">
<font size='5'><u><b>해 외 여 행 견 적 서</b></u></font>
</td></tr>
</table>
<table width="900" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse; border-color:#f0f0f0; margin-top:50px;">
<colgroup>
	<col style="width:130px" />
	<col style="width:240px" />
	<col style="width:130px" />
	<col style="width:240px" />
</colgroup>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		제목
	</td>
	<td colspan="3" style="width:100%;padding-left:10px;">
		<?=$m_rs[subject]?>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		메모1
	</td>
	<td colspan="3" style="padding-left:10px;">
		<?=nl2br($m_rs[memo1])?>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		메모2
	</td>
	<td colspan="3" style="padding-left:10px;">
		<?=nl2br($m_rs[memo2])?>
	</td>
</tr>

<tr <?if(!$m_rs[air1]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내1
	</td>
	<td colspan="3">
<?
$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$m_rs[air1]' ");
$air1 = mysql_fetch_array($m_sqla);

	$add11 = explode("||", $air1[add11]);	
	$add12 = explode("||", $air1[add12]);	
	$add13 = explode("||", $air1[add13]);	
	$add14 = explode("||", $air1[add14]);	
	$add15 = explode("||", $air1[add15]);	
	$add16 = explode("||", $air1[add16]);	
	$add17 = explode("||", $air1[add17]);	
	$add18 = explode("||", $air1[add18]);	
	$add21 = explode("||", $air1[add21]);	
	$add22 = explode("||", $air1[add22]);	
	$add23 = explode("||", $air1[add23]);	
	$add24 = explode("||", $air1[add24]);	
	$add25 = explode("||", $air1[add25]);	
	$add26 = explode("||", $air1[add26]);	
	$add27 = explode("||", $air1[add27]);	
	$add28 = explode("||", $air1[add28]);	
?>

<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px; text-align:center;">
	<colgroup>
		<col width="1" >
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>

	<tr>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;" >일정</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;" >출발지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">편명</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착시간</td>
		<td class="i_title" width="10%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[0]?></td>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[1]?></td>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[2]?></td>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[3]?></td>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[4]?></td>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[5]?></td>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[6]?></td>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[7]?></td>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="7" style="padding:20px 0px;background-color:#f7f7f7"><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[8]?></td>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[9]?></td>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[10]?></td>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[11]?></td>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[12]?></td>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[13]?></td>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[14]?></td>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air1_date[15]?></td>
		<td  ><?=$add28[0]?></td>
		<td  ><?=$add28[1]?></td>
		<td  ><?=$add28[2]?></td>
		<td  ><?=$add28[3]?></td>
		<td  ><?=$add28[4]?></td>
		<td  ><?=$add28[5]?></td>
	</tr>
</table>
<? //print_r($air1_a);?>
	</td>
</tr>
<tr <?if(!$air1_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권1가격
	</td>
	<?if($air1_a[1]=='1'):?>
		<td style="padding-left:10px;">
			<span style="float:left"><?=number_format($air1_a[0] + $air1_a[2])?></span> <span style="float:right">[유류할증료포함]&nbsp;</span>
		</td>
		<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		</td>
		<td style="padding-left:10px;">
		</td>
	<?else:?>
		<td style="padding-left:10px;">
			<span style="float:left"><?=number_format($air1_a[0])?></span> 
		</td>
		<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
			유류할증료
		</td>
		<td style="padding-left:10px;">
			<?=number_format($air1_a[2])?>
		</td>
	<?endif?>
</tr>


<tr <?if(!$m_rs[air2]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내2
	</td>
	<td colspan="3">
<?
$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$m_rs[air2]' ");
$air1 = mysql_fetch_array($m_sqla);

	$add11 = explode("||", $air1[add11]);	
	$add12 = explode("||", $air1[add12]);	
	$add13 = explode("||", $air1[add13]);	
	$add14 = explode("||", $air1[add14]);	
	$add15 = explode("||", $air1[add15]);	
	$add16 = explode("||", $air1[add16]);	
	$add17 = explode("||", $air1[add17]);	
	$add18 = explode("||", $air1[add18]);	
	$add21 = explode("||", $air1[add21]);	
	$add22 = explode("||", $air1[add22]);	
	$add23 = explode("||", $air1[add23]);	
	$add24 = explode("||", $air1[add24]);	
	$add25 = explode("||", $air1[add25]);	
	$add26 = explode("||", $air1[add26]);	
	$add27 = explode("||", $air1[add27]);	
	$add28 = explode("||", $air1[add28]);	
?>

<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px; text-align:center;">
	<colgroup>
		<col width="1" >
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>


	<tr>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">일정</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">편명</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착시간</td>
		<td class="i_title" width="10%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[0]?></td>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[1]?></td>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[2]?></td>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[3]?></td>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[4]?></td>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[5]?></td>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[6]?></td>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[7]?></td>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="7" style="padding:20px 0px;background-color:#f7f7f7"><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[8]?></td>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[9]?></td>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[10]?></td>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[11]?></td>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[12]?></td>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[13]?></td>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[14]?></td>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air2_date[15]?></td>
		<td  ><?=$add28[0]?></td>
		<td  ><?=$add28[1]?></td>
		<td  ><?=$add28[2]?></td>
		<td  ><?=$add28[3]?></td>
		<td  ><?=$add28[4]?></td>
		<td  ><?=$add28[5]?></td>
	</tr>
</table>

	</td>
</tr>
<tr <?if(!$air2_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권2가격
	</td>
	<td style="padding-left:10px;">
		<span style="float:left"><?=number_format($air2_a[0])?></span> <span style="float:right"><input type="checkbox" <?if($air2_a[1]=='1'):?>checked="checked"<?endif?> />유류할증료포함&nbsp;</span>
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<?=number_format($air2_a[2])?>
	</td>
</tr>



<tr <?if(!$m_rs[air3]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내3
	</td>
	<td colspan="3">
<?
$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$m_rs[air3]' ");
$air1 = mysql_fetch_array($m_sqla);

	$add11 = explode("||", $air1[add11]);	
	$add12 = explode("||", $air1[add12]);	
	$add13 = explode("||", $air1[add13]);	
	$add14 = explode("||", $air1[add14]);	
	$add15 = explode("||", $air1[add15]);	
	$add16 = explode("||", $air1[add16]);	
	$add17 = explode("||", $air1[add17]);	
	$add18 = explode("||", $air1[add18]);	
	$add21 = explode("||", $air1[add21]);	
	$add22 = explode("||", $air1[add22]);	
	$add23 = explode("||", $air1[add23]);	
	$add24 = explode("||", $air1[add24]);	
	$add25 = explode("||", $air1[add25]);	
	$add26 = explode("||", $air1[add26]);	
	$add27 = explode("||", $air1[add27]);	
	$add28 = explode("||", $air1[add28]);	
?>

<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px; text-align:center;">
	<colgroup>
		<col width="1" >
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>


	<tr>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">일정</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">편명</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착시간</td>
		<td class="i_title" width="10%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[0]?></td>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[1]?></td>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[2]?></td>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[3]?></td>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[4]?></td>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[5]?></td>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[6]?></td>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[7]?></td>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="7" style="padding:20px 0px;background-color:#f7f7f7"><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[8]?></td>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[9]?></td>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[10]?></td>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[11]?></td>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[12]?></td>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[13]?></td>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[14]?></td>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air3_date[15]?></td>
		<td  ><?=$add28[0]?></td>
		<td  ><?=$add28[1]?></td>
		<td  ><?=$add28[2]?></td>
		<td  ><?=$add28[3]?></td>
		<td  ><?=$add28[4]?></td>
		<td  ><?=$add28[5]?></td>
	</tr>
</table>

	</td>
</tr>
<tr <?if(!$air3_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권3가격
	</td>
	<td style="padding-left:10px;">
		<span style="float:left"><?=number_format($air3_a[0])?></span> <span style="float:right"><input type="checkbox" <?if($air3_a[1]=='1'):?>checked="checked"<?endif?> />유류할증료포함&nbsp;</span>
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<?=number_format($air3_a[2])?>
	</td>
</tr>


<tr <?if(!$m_rs[air4]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내4
	</td>
	<td colspan="3">
<?
$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$m_rs[air4]' ");
$air4 = mysql_fetch_array($m_sqla);

	$add11 = explode("||", $air4[add11]);	
	$add12 = explode("||", $air4[add12]);	
	$add13 = explode("||", $air4[add13]);	
	$add14 = explode("||", $air4[add14]);	
	$add15 = explode("||", $air4[add15]);	
	$add16 = explode("||", $air4[add16]);	
	$add17 = explode("||", $air4[add17]);	
	$add18 = explode("||", $air4[add18]);	
	$add21 = explode("||", $air4[add21]);	
	$add22 = explode("||", $air4[add22]);	
	$add23 = explode("||", $air4[add23]);	
	$add24 = explode("||", $air4[add24]);	
	$add25 = explode("||", $air4[add25]);	
	$add26 = explode("||", $air4[add26]);	
	$add27 = explode("||", $air4[add27]);	
	$add28 = explode("||", $air4[add28]);	
?>

<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px; text-align:center;">
	<colgroup>
		<col width="1" >
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>


	<tr>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">일정</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">편명</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착시간</td>
		<td class="i_title" width="10%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[0]?></td>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[1]?></td>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[2]?></td>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[3]?></td>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[4]?></td>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[5]?></td>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[6]?></td>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[7]?></td>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="7" style="padding:20px 0px;background-color:#f7f7f7"><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[8]?></td>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[9]?></td>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[10]?></td>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[11]?></td>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[12]?></td>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[13]?></td>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[14]?></td>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?>>
		<td  ><?=$air4_date[15]?></td>
		<td  ><?=$add28[0]?></td>
		<td  ><?=$add28[1]?></td>
		<td  ><?=$add28[2]?></td>
		<td  ><?=$add28[3]?></td>
		<td  ><?=$add28[4]?></td>
		<td  ><?=$add28[5]?></td>
	</tr>
</table>

	</td>
</tr>
<tr <?if(!$air4_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권4가격
	</td>
	<td style="padding-left:10px;">
		<span style="float:left"><?=number_format($air4_a[0])?></span> <span style="float:right"><input type="checkbox" <?if($air4_a[1]=='1'):?>checked="checked"<?endif?> />유류할증료포함&nbsp;</span>
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<?=number_format($air4_a[2])?>
	</td>
</tr>


<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;border-top:solid #999 2px">
		고객명
	</td>
	<td style="padding-left:10px;border-top:solid #999 2px">
		<?=$info[0]?>
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;border-top:solid #999 2px">
		인원
	</td>
	<td style="padding-left:10px;border-top:solid #999 2px">
		<?=$info[1]?>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		이메일
	</td>
	<td style="padding-left:10px;">
		<?=$info[2]?>
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		연락처
	</td>
	<td style="padding-left:10px;">
		<?=$info[3]?>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		출발일
	</td>
	<td style="padding-left:10px;">
		<?=$info[4]?>
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		여정
	</td>
	<td style="padding-left:10px;">
		<?=$info[5]?>
	</td>
</tr>




<tr <?if(!$resort1_memo[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		리조트안내상세1
	</td>
	<td colspan="3">
		<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
			<colgroup>
				<col style="width:100px" />
				<col style="width:220px" />
				<col style="width:100px" />
				<col style="width:220px" />
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7" >리조트명</td>
				<td style="padding-left:10px;"><?=$resort1_memo[0]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><?=$resort1_memo[11]?></td>
				<td style="padding-left:10px;"><?=$resort1_memo[10] . " " . number_format($resort1_memo[1])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
				<td style="padding-left:10px;"><?=$resort1_memo[2]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
				<td style="padding-left:10px;"><?=$resort1_memo[3]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
				<td style="padding-left:10px;"><?=$resort1_memo[4]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
				<td style="padding-left:10px;"><?=$resort1_memo[5]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort1_memo[6])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort1_memo[7])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort1_memo[8])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort1_memo[9])?></td>
			</tr>
		</table>
	</td>
</tr>



<tr <?if(!$resort2_memo[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6; ">
		리조트안내상세2
	</td>
	<td colspan="3">
		<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
			<colgroup>
				<col style="width:100px" />
				<col style="width:220px" />
				<col style="width:100px" />
				<col style="width:220px" />
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
				<td style="padding-left:10px;"><?=$resort2_memo[0]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><?=$resort2_memo[11]?></td>
				<td style="padding-left:10px;"><?=$resort2_memo[10] . " " . number_format($resort2_memo[1])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
				<td style="padding-left:10px;"><?=$resort2_memo[2]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
				<td style="padding-left:10px;"><?=$resort2_memo[3]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
				<td style="padding-left:10px;"><?=$resort2_memo[4]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
				<td style="padding-left:10px;"><?=$resort2_memo[5]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort2_memo[6])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort2_memo[7])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort2_memo[8])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort2_memo[9])?></td>
			</tr>
		</table>
	</td>
</tr>


<tr <?if(!$resort3_memo[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6; ">
		리조트안내상세3
	</td>
	<td colspan="3">
		<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
			<colgroup>
				<col style="width:100px" />
				<col style="width:220px" />
				<col style="width:100px" />
				<col style="width:220px" />
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
				<td style="padding-left:10px;"><?=$resort3_memo[0]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><?=$resort3_memo[11]?></td>
				<td style="padding-left:10px;"><?=$resort3_memo[10] . " " . number_format($resort3_memo[1])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
				<td style="padding-left:10px;"><?=$resort3_memo[2]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
				<td style="padding-left:10px;"><?=$resort3_memo[3]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
				<td style="padding-left:10px;"><?=$resort3_memo[4]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
				<td style="padding-left:10px;"><?=$resort3_memo[5]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort3_memo[6])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort3_memo[7])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort3_memo[8])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort3_memo[9])?></td>
			</tr>
		</table>
	</td>
</tr>


<tr <?if(!$resort4_memo[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6; ">
		리조트안내상세4
	</td>
	<td colspan="3">
		<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
			<colgroup>
				<col style="width:120px" />
				<col style="width:230px" />
				<col style="width:120px" />
				<col style="width:230px" />
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
				<td style="padding-left:10px;"><?=$resort4_memo[0]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><?=$resort4_memo[11]?></td>
				<td style="padding-left:10px;"><?=$resort4_memo[10] . " " . number_format($resort4_memo[1])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
				<td style="padding-left:10px;"><?=$resort4_memo[2]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
				<td style="padding-left:10px;"><?=$resort4_memo[3]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
				<td style="padding-left:10px;"><?=$resort4_memo[4]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
				<td style="padding-left:10px;"><?=$resort4_memo[5]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort4_memo[6])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort4_memo[7])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort4_memo[8])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort4_memo[9])?></td>
			</tr>
		</table>
	</td>
</tr>



<tr <?if(!$resort5_memo[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6; ">
		리조트안내상세5
	</td>
	<td colspan="3">
		<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
			<colgroup>
				<col style="width:120px" />
				<col style="width:230px" />
				<col style="width:120px" />
				<col style="width:230px" />
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
				<td style="padding-left:10px;"><?=$resort5_memo[0]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><?=$resort5_memo[11]?></td>
				<td style="padding-left:10px;"><?=$resort5_memo[10] . " " . number_format($resort5_memo[1])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
				<td style="padding-left:10px;"><?=$resort5_memo[2]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
				<td style="padding-left:10px;"><?=$resort5_memo[3]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
				<td style="padding-left:10px;"><?=$resort5_memo[4]?></td>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
				<td style="padding-left:10px;"><?=$resort5_memo[5]?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort5_memo[6])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort5_memo[7])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort5_memo[8])?></td>
			</tr>
			<tr>
				<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
				<td colspan="3" style="padding-left:10px;"><?=nl2br($resort5_memo[9])?></td>
			</tr>
		</table>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		RESERVATION<br>예약과정 
	</td>
	<td colspan="3" style="padding-left:10px;">
		<?=nl2br($m_rs[memo3])?>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		SMS
	</td>
	<td colspan="3" style="padding-left:10px;">
		<?=nl2br($m_rs[sms])?>
	</td>
</tr>
</table>


</html>
