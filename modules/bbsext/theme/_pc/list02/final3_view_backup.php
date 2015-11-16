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
?>
<html>
 <head>
  <title> New Document </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
 </head>
<style>
td{padding:5px 0px}
textarea{width:100%;height:110px;}
input[type=text]{width:200px;}
</style>

<link rel="stylesheet" href="http://trevia.co.kr/mail/style.css">


<body>
<table width="800" border="0" cellspacing="0" cellpadding="0">
<tr><td align="center">
<font size='5'><u><b>해 외 여 행 견 적 서</b></u></font>
</td></tr>
</table>
<table width="800" border="0" cellspacing="0" cellpadding="0">
<colgroup>
	<col style="width:150px" />
	<col style="width:250px" />
	<col style="width:150px" />
	<col style="width:250px" />
</colgroup>
<tr>
	<td>
		제목
	</td>
	<td colspan="3">
		<?=$m_rs[subject]?>
	</td>
</tr>
<tr>
	<td>
		메모1
	</td>
	<td colspan="3">
		<?=nl2br($m_rs[memo1])?>
	</td>
</tr>
<tr>
	<td>
		메모2
	</td>
	<td colspan="3">
		<?=nl2br($m_rs[memo2])?>
	</td>
</tr>

<tr <?if(!$m_rs[air1]):?>style="display:none"<?endif?>>
	<td>
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

<table width="100%" cellpadding="0" cellspacing="0" id="ttid"  style="border-collapse:collapse; ">
	<colgroup>
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>

	<tr>
		<td class="i_title" bgcolor="#e6e6e6" >출발지</td>
		<td class="i_title" bgcolor="#e6e6e6">도착지</td>
		<td class="i_title" bgcolor="#e6e6e6">편명</td>
		<td class="i_title" bgcolor="#e6e6e6">출발시간</td>
		<td class="i_title" bgcolor="#e6e6e6">도착시간</td>
		<td class="i_title" bgcolor="#e6e6e6">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="6" style="text-align:left;padding:20px 0px;background-color:#f0f0f0"><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?>>
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



<tr <?if(!$m_rs[air2]):?>style="display:none"<?endif?>>
	<td>
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

<table width="100%" cellpadding="0" cellspacing="0" id="ttid"  style="border-collapse:collapse; ">
	<colgroup>
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>


	<tr>
		<td class="i_title" bgcolor="#e6e6e6" >출발지</td>
		<td class="i_title" bgcolor="#e6e6e6">도착지</td>
		<td class="i_title" bgcolor="#e6e6e6">편명</td>
		<td class="i_title" bgcolor="#e6e6e6">출발시간</td>
		<td class="i_title" bgcolor="#e6e6e6">도착시간</td>
		<td class="i_title" bgcolor="#e6e6e6">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="6" style="text-align:left;padding:20px 0px;background-color:#f0f0f0"><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?>>
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




<tr <?if(!$m_rs[air3]):?>style="display:none"<?endif?>>
	<td>
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

<table width="100%" cellpadding="0" cellspacing="0" id="ttid"  style="border-collapse:collapse; ">
	<colgroup>
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>


	<tr>
		<td class="i_title" bgcolor="#e6e6e6" >출발지</td>
		<td class="i_title" bgcolor="#e6e6e6">도착지</td>
		<td class="i_title" bgcolor="#e6e6e6">편명</td>
		<td class="i_title" bgcolor="#e6e6e6">출발시간</td>
		<td class="i_title" bgcolor="#e6e6e6">도착시간</td>
		<td class="i_title" bgcolor="#e6e6e6">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="6" style="text-align:center;padding:20px 0px;background-color:#f0f0f0"><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?>>
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






<tr>
	<td>
		고객명
	</td>
	<td>
		<?=$info[0]?>
	</td>
	<td>
		인원
	</td>
	<td>
		<?=$info[1]?>
	</td>
</tr>
<tr>
	<td>
		이메일
	</td>
	<td>
		<?=$info[2]?>
	</td>
	<td>
		연락처
	</td>
	<td>
		<?=$info[3]?>
	</td>
</tr>
<tr>
	<td>
		출발일
	</td>
	<td>
		<?=$info[4]?>
	</td>
	<td>
		여정
	</td>
	<td>
		<?=$info[5]?>
	</td>
</tr>




<tr <?if(!$resort1_memo[0]):?>style="display:none"<?endif?>>
	<td>
		리조트안내상세1
	</td>
	<td colspan="3">
		<table width="100%">
			<colgroup>
				<col style="width:120px" />
				<col style="width:230px" />
				<col style="width:120px" />
				<col style="width:230px" />
			<tr>
				<td>리조트명</td>
				<td><?=$resort1_memo[0]?></td>
				<td>가격/인</td>
				<td><?=$resort1_memo[1]?></td>
			</tr>
			<tr>
				<td>룸타입</td>
				<td><?=$resort1_memo[2]?></td>
				<td>식사</td>
				<td><?=$resort1_memo[3]?></td>
			</tr>
			<tr>
				<td>이동수단</td>
				<td><?=$resort1_memo[4]?></td>
				<td>지역</td>
				<td><?=$resort1_memo[5]?></td>
			</tr>
			<tr>
				<td>허니문특전</td>
				<td colspan="3"><?=nl2br($resort1_memo[6])?></td>
			</tr>
			<tr>
				<td>포함사항</td>
				<td colspan="3"><?=nl2br($resort1_memo[7])?></td>
			</tr>
			<tr>
				<td>불포함사항</td>
				<td colspan="3"><?=nl2br($resort1_memo[8])?></td>
			</tr>
		</table>
	</td>
</tr>



<tr <?if(!$resort2_memo[0]):?>style="display:none"<?endif?>>
	<td>
		리조트안내상세2
	</td>
	<td colspan="3">
		<table>
			<colgroup>
				<col style="width:120px" />
				<col style="width:230px" />
				<col style="width:120px" />
				<col style="width:230px" />
			<tr>
				<td>리조트명</td>
				<td><?=$resort2_memo[0]?></td>
				<td>가격/인</td>
				<td><?=$resort2_memo[1]?></td>
			</tr>
			<tr>
				<td>룸타입</td>
				<td><?=$resort2_memo[2]?></td>
				<td>식사</td>
				<td><?=$resort2_memo[3]?></td>
			</tr>
			<tr>
				<td>이동수단</td>
				<td><?=$resort2_memo[4]?></td>
				<td>지역</td>
				<td><?=$resort2_memo[5]?></td>
			</tr>
			<tr>
				<td>허니문특전</td>
				<td colspan="3"><?=nl2br($resort2_memo[6])?></td>
			</tr>
			<tr>
				<td>포함사항</td>
				<td colspan="3"><?=nl2br($resort2_memo[7])?></td>
			</tr>
			<tr>
				<td>불포함사항</td>
				<td colspan="3"><?=nl2br($resort2_memo[8])?></td>
			</tr>
		</table>
	</td>
</tr>


<tr <?if(!$resort3_memo[0]):?>style="display:none"<?endif?>>
	<td>
		리조트안내상세3
	</td>
	<td colspan="3">
		<table>
			<colgroup>
				<col style="width:120px" />
				<col style="width:230px" />
				<col style="width:120px" />
				<col style="width:230px" />
			<tr>
				<td>리조트명</td>
				<td><?=$resort3_memo[0]?></td>
				<td>가격/인</td>
				<td><?=$resort3_memo[1]?></td>
			</tr>
			<tr>
				<td>룸타입</td>
				<td><?=$resort3_memo[2]?></td>
				<td>식사</td>
				<td><?=$resort3_memo[3]?></td>
			</tr>
			<tr>
				<td>이동수단</td>
				<td><?=$resort3_memo[4]?></td>
				<td>지역</td>
				<td><?=$resort3_memo[5]?></td>
			</tr>
			<tr>
				<td>허니문특전</td>
				<td colspan="3"><?=nl2br($resort3_memo[6])?></td>
			</tr>
			<tr>
				<td>포함사항</td>
				<td colspan="3"><?=nl2br($resort3_memo[7])?></td>
			</tr>
			<tr>
				<td>불포함사항</td>
				<td colspan="3"><?=nl2br($resort3_memo[8])?></td>
			</tr>
		</table>
	</td>
</tr>


<tr <?if(!$resort4_memo[0]):?>style="display:none"<?endif?>>
	<td>
		리조트안내상세4
	</td>
	<td colspan="3">
		<table>
			<colgroup>
				<col style="width:120px" />
				<col style="width:230px" />
				<col style="width:120px" />
				<col style="width:230px" />
			<tr>
				<td>리조트명</td>
				<td><?=$resort4_memo[0]?></td>
				<td>가격/인</td>
				<td><?=$resort4_memo[1]?></td>
			</tr>
			<tr>
				<td>룸타입</td>
				<td><?=$resort4_memo[2]?></td>
				<td>식사</td>
				<td><?=$resort4_memo[3]?></td>
			</tr>
			<tr>
				<td>이동수단</td>
				<td><?=$resort4_memo[4]?></td>
				<td>지역</td>
				<td><?=$resort4_memo[5]?></td>
			</tr>
			<tr>
				<td>허니문특전</td>
				<td colspan="3"><?=nl2br($resort4_memo[6])?></td>
			</tr>
			<tr>
				<td>포함사항</td>
				<td colspan="3"><?=nl2br($resort4_memo[7])?></td>
			</tr>
			<tr>
				<td>불포함사항</td>
				<td colspan="3"><?=nl2br($resort4_memo[8])?></td>
			</tr>
		</table>
	</td>
</tr>



<tr <?if(!$resort5_memo[0]):?>style="display:none"<?endif?>>
	<td>
		리조트안내상세5
	</td>
	<td colspan="3">
		<table>
			<colgroup>
				<col style="width:120px" />
				<col style="width:230px" />
				<col style="width:120px" />
				<col style="width:230px" />
			<tr>
				<td>리조트명</td>
				<td><?=$resort5_memo[0]?></td>
				<td>가격/인</td>
				<td><?=$resort5_memo[1]?></td>
			</tr>
			<tr>
				<td>룸타입</td>
				<td><?=$resort5_memo[2]?></td>
				<td>식사</td>
				<td><?=$resort5_memo[3]?></td>
			</tr>
			<tr>
				<td>이동수단</td>
				<td><?=$resort5_memo[4]?></td>
				<td>지역</td>
				<td><?=$resort5_memo[5]?></td>
			</tr>
			<tr>
				<td>허니문특전</td>
				<td colspan="3"><?=nl2br($resort5_memo[6])?></td>
			</tr>
			<tr>
				<td>포함사항</td>
				<td colspan="3"><?=nl2br($resort5_memo[7])?></td>
			</tr>
			<tr>
				<td>불포함사항</td>
				<td colspan="3"><?=nl2br($resort5_memo[8])?></td>
			</tr>
		</table>
	</td>
</tr>

<tr>
	<td>
		RESERVATION<br>예약과정
	</td>
	<td colspan="3">
		<?=nl2br($m_rs[memo3])?>
	</td>
</tr>
<tr>
	<td>
		SMS
	</td>
	<td colspan="3">
		<?=nl2br($m_rs[sms])?>
	</td>
</tr>
</table>
<div style="float:left;width:800px;text-align:center;">
<input type="button" name="closing" value="닫기" style="width:60px;height:40px" onclick="window.close();" />
</div>

</html>
