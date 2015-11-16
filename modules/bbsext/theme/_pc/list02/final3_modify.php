<!-- 접수완료 페이지 (2011/05/03) -->

<?php
//이메일전송

$dbconnect = mysql_connect("localhost", "trevia", "trevia6681") or die(mysql_error()); 
$mysql = mysql_select_db("trevia") or die(mysql_error());
mysql_query("set names utf8;");


$g_arr = explode(",",$d['theme']['gubun_list']);
$g_num = count($g_arr);

		
$m_sql = mysql_query("SELECT * FROM rb_bbsext_data where uid = '".$uid."' ");
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
/*
성인
*/
$adult_count = 0;
$children_count = 0;
$baby_count = 0;
$adult_a = 0;
$adult_r = 0;
$adult_f = 0;
$child_a = 0;
$child_r = 0;
$child_f = 0;
$baby_a = 0;
$baby_r = 0;
$baby_f = 0;
if($add3[1]) {
	if(	$add3[3] =='성인') {
		$adult_count++;
		$adult_a = $add10[1]+$add10[2];
		$adult_r = $add10[3];
		$adult_f = $add10[4];
	} else if ( $add3[3] == '소아' ) {
		$children_count++;
		$child_a = $add10[1]+$add10[2];
		$child_r = $add10[3];
		$child_f = $add10[4];
	} else {
		$baby_count++;
		$baby_a = $add10[1]+$add10[2];
		$baby_r = $add10[3];
		$baby_f = $add10[4];
	}
}

if($add3[7]) {
	if(	$add3[9] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[10]+$add10[11];
		$adult_r = $adult_r+$add10[12];
		$adult_f = $adult_f+$add10[13];
	} else if ( $add3[9] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[10]+$add10[11];
		$child_r = $child_r+$add10[12];
		$child_f = $child_f+$add10[13];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[10]+$add10[11];
		$baby_r = $baby_r+$add10[12];
		$baby_f = $baby_f+$add10[13];
	}
}

if($add3[13]) {
	if(	$add3[15] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[19]+$add10[20];
		$adult_r = $adult_r+$add10[21];
		$adult_f = $adult_f+$add10[22];
	} else if ( $add3[15] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[19]+$add10[20];
		$child_r = $child_r+$add10[21];
		$child_f = $child_f+$add10[22];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[19]+$add10[20];
		$baby_r = $baby_r+$add10[21];
		$baby_f = $baby_f+$add10[22];
	}
}
if($add3[19]) {
	if(	$add3[21] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[28]+$add10[29];
		$adult_r = $adult_r+$add10[30];
		$adult_f = $adult_f+$add10[31];
	} else if ( $add3[21] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[28]+$add10[29];
		$child_r = $child_r+$add10[30];
		$child_f = $child_f+$add10[31];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[28]+$add10[29];
		$baby_r = $baby_r+$add10[30];
		$baby_f = $baby_f+$add10[31];
	}
}
if($add3[25]) {
	if(	$add3[27] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[37]+$add10[38];
		$adult_r = $adult_r+$add10[39];
		$adult_f = $adult_f+$add10[40];
	} else if ( $add3[27] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[37]+$add10[38];
		$child_r = $child_r+$add10[39];
		$child_f = $child_f+$add10[40];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[37]+$add10[38];
		$baby_r = $baby_r+$add10[39];
		$baby_f = $baby_f+$add10[40];
	}
}
if($add3[31]) {
	if(	$add3[33] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[46]+$add10[47];
		$adult_r = $adult_r+$add10[48];
		$adult_f = $adult_f+$add10[49];
	} else if ( $add3[33] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[46]+$add10[47];
		$child_r = $child_r+$add10[48];
		$child_f = $child_f+$add10[49];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[46]+$add10[47];
		$baby_r = $baby_r+$add10[48];
		$baby_f = $baby_f+$add10[49];
	}
}
if($add3[37]) {
	if(	$add3[39] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[55]+$add10[56];
		$adult_r = $adult_r+$add10[57];
		$adult_f = $adult_f+$add10[58];
	} else if ( $add3[39] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[55]+$add10[56];
		$child_r = $child_r+$add10[57];
		$child_f = $child_f+$add10[58];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[55]+$add10[56];
		$baby_r = $baby_r+$add10[57];
		$baby_f = $baby_f+$add10[58];
	}
}
if($add3[43]) {
	if(	$add3[45] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[64]+$add10[65];
		$adult_r = $adult_r+$add10[66];
		$adult_f = $adult_f+$add10[67];
	} else if ( $add3[45] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[64]+$add10[65];
		$child_r = $child_r+$add10[66];
		$child_f = $child_f+$add10[67];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[64]+$add10[65];
		$baby_r = $baby_r+$add10[66];
		$baby_f = $baby_f+$add10[67];
	}
}
if($add3[49]) {
	if(	$add3[51] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[73]+$add10[74];
		$adult_r = $adult_r+$add10[75];
		$adult_f = $adult_f+$add10[76];
	} else if ( $add3[51] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[73]+$add10[74];
		$child_r = $child_r+$add10[75];
		$child_f = $child_f+$add10[76];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[73]+$add10[74];
		$baby_r = $baby_r+$add10[75];
		$baby_f = $baby_f+$add10[76];
	}
}
if($add3[55]) {
	if(	$add3[57] =='성인') {
		$adult_count++;
		$adult_a = $adult_a+$add10[82]+$add10[83];
		$adult_r = $adult_r+$add10[84];
		$adult_f = $adult_f+$add10[85];
	} else if ( $add3[57] == '소아' ) {
		$children_count++;
		$child_a = $child_a+$add10[82]+$add10[83];
		$child_r = $child_r+$add10[84];
		$child_f = $child_f+$add10[85];
	} else {
		$baby_count++;
		$baby_a = $baby_a+$add10[82]+$add10[83];
		$baby_r = $baby_r+$add10[84];
		$baby_f = $baby_f+$add10[85];
	}
}
?>

<style>
td{padding:5px 0px}
textarea{width:100%;height:110px;}
input[type=text]{width:200px;}
</style>
<link type="text/css" rel="stylesheet" charset="utf-8" href="/_core/css/sys.css" />
<link type="text/css" rel="stylesheet" charset="utf-8" href="/_core/css/jquery.tooltip.css" />
<link type="text/css" rel="stylesheet" charset="utf-8" href="/layouts/classic2/_main.css" />
<link type="text/css" rel="stylesheet" charset="utf-8" href="/layouts/classic2/main.css" />
<link type="text/css" rel="stylesheet" charset="utf-8" href="/modules/bbsext/_main.css" />
<link type="text/css" rel="stylesheet" charset="utf-8" href="/modules/bbsext/theme/_pc/list02/_main.css" />
<script type='text/javascript' charset="utf-8" src="/_core/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/_core/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/_core/js/jquery.Popup.js"></script>
<script type="text/javascript" charset="utf-8" src="/_core/js/jquery.tooltip.js"></script>

<script type="text/javascript" charset="utf-8" src="/_core/js/sys.js"></script>
<script type="text/javascript" charset="utf-8" src="/layouts/classic2/_main.js"></script>
<script type="text/javascript" charset="utf-8" src="/modules/bbsext/_main.js"></script>
<script type="text/javascript" charset="utf-8" src="/modules/bbsext/theme/_pc/list02/_main.js"></script>
<script>
$(document).ready(function(){



	$('#air1').change(function(){

		if($("#air1 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=1&air="+$("#air1 option:selected").val(),
				success: function(msg){
					$('#air1_tr').show();
					$('#air1_tr2').show();
					$( "#air1_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#air1_tr').hide();
			$('#air1_tr2').hide();
		}

		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});


	$('#air2').change(function(){

		if($("#air2 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=2&air="+$("#air2 option:selected").val(),
				success: function(msg){
					$('#air2_tr').show();
					$('#air2_tr2').show();
					$( "#air2_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#air2_tr').hide();
			$('#air2_tr2').hide();
		}

		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#air3').change(function(){

		if($("#air3 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=3&air="+$("#air3 option:selected").val(),
				success: function(msg){
					$('#air3_tr').show();
					$('#air3_tr2').show();
					$( "#air3_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#air3_tr').hide();
			$('#air3_tr2').hide();
		}

		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});


	$('#air4').change(function(){

		if($("#air4 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=4&air="+$("#air4 option:selected").val(),
				success: function(msg){
					$('#air4_tr').show();
					$('#air4_tr2').show();
					$( "#air4_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#air4_tr').hide();
			$('#air4_tr2').hide();
		}

		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});


	$('#resort1').change(function(){

		if($("#resort1 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=1&resort="+$("#resort1 option:selected").val(),
				success: function(msg){
					$('#resort1_tr').show();
					$( "#resort1_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#resort1_tr').hide();
		}

		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#resort2').change(function(){
		if($("#resort2 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=2&resort="+$("#resort2 option:selected").val(),
				success: function(msg){
					$('#resort2_tr').show();
					$( "#resort2_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#resort2_tr').hide();
		}
		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#resort3').change(function(){
		if($("#resort3 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=3&resort="+$("#resort3 option:selected").val(),
				success: function(msg){
					$('#resort3_tr').show();
					$( "#resort3_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#resort3_tr').hide();
		}
		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#resort4').change(function(){
		if($("#resort4 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=4&resort="+$("#resort4 option:selected").val(),
				success: function(msg){
					$('#resort4_tr').show();
					$( "#resort4_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#resort4_tr').hide();
		}
		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#resort5').change(function(){
		if($("#resort5 option:selected").val()>0) {
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process.php',
				data: "types=5&resort="+$("#resort5 option:selected").val(),
				success: function(msg){
					$('#resort5_tr').show();
					$( "#resort5_m" ).empty().append( msg ); 
				}
		   });
		} else {
			$('#resort5_tr').hide();
		}
		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#save').click(function() {
		<? $save = 'false'; if ($_GET[ins] == 'true') $save = 'true'; ?>
		$('#insert_flag').val(<?=$save?>);

		$('#save_flag').val(true);

//		alert($('#save_flag').val());
		document.form.submit();
	});

<?
	if( $_POST['auto_sending'] == "true" )
	{
?>

		setTimeout("autoSending()", 500);
<?
	}
?>
});
		function autoSending()
		{
			document.form.submit();

		}
</script>

<link rel="stylesheet" href="http://trevia.co.kr/mail/style.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

<form id="form" name="form" action="/modules/bbsext/theme/_pc/list02/final4.php" method="post" onsubmit="return false" >
<input type="hidden" name="admin_add_email" value="<?=$_REQUEST[admin_add_email]?>" />
<input type="hidden" name="to_email" value="<?=$add3[5]?>" />
<input type="hidden" name="to_email2" value="<?=$add3[11]?>" />
<input type="hidden" name="to_name" value="<?=$add3[1]?>" />
<input type="hidden" name="to_name2" value="<?=$add3[7]?>" />
<input type="hidden" name="addemail" value="<?=$_POST['addemail']?>" />
<input type="hidden" name="from_email" value="ok@trevia.co.kr" />
<input type="hidden" name="from_name" value="트레비아" />
<input type="hidden" name="tb_name" value="<?=$table[$m.'data']?>" />
<input type="hidden" name="puid" value="<?php echo $m_rs[puid]?>" />
<input type="hidden" name="uid" value="<?php echo $uid?>" />
<input type="hidden" name="memuid" value="<?php echo $memuid?>" />
<input type="hidden" id="save_flag" name="save_flag" value="false" />
<input type="hidden" id="insert_flag" name="insert_flag" value="<?=$_GET['ins']?>" />
<?
$mem_sql = mysql_query("SELECT * FROM rb_s_mbrdata where memberuid = '".$memuid."' ");
$mem_rs = mysql_fetch_array($mem_sql);
?>
<input type="hidden" name="p_name" value="<?php echo $mem_rs[name]?>" />
<input type="hidden" name="p_tel" value="<?php echo $mem_rs[tel2]?>" />
<input type="hidden" name="p_email" value="<?php echo $mem_rs[email]?>" />

<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0" >
<tr><td align="center">
<font size='5'><u><b>해 외 여 행 견 적 서</b></u></font>
</td></tr>
</table>
<table width="1000" border="1" cellspacing="0" cellpadding="0"  style="border-collapse:collapse; margin-top:50px;">
<colgroup>
	<col style="width:130px" />
	<col style="width:270px" />
	<col style="width:130px" />
	<col style="width:270px" />
</colgroup>
<tr>
	<td class="title_c" style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		제목
	</td>
	<td colspan="3" style="padding-left:10px;">
		<input type="text" name="subject" style="width:500px" value="<?=$m_rs[subject]?>">
		<? $area = strstr($m_rs[subject], "칸쿤") ? "칸쿤" : "몰디브"; ?>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		메모1
	</td>
	<td colspan="3" style="padding-left:10px;">
		<textarea name="memo1" style="width:680px;height:200px"><?=$m_rs[memo1]?></textarea>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		메모2
	</td>
	<td colspan="3" style="padding-left:10px;">
		<textarea name="memo2" style="width:680px;"><?=$m_rs[memo2]?></textarea>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내1
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="air1" id="air1">
			<option value="0">일정없음</option>
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
			<?				
			$m_sql1 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");

			while($m_rs1 = mysql_fetch_array($m_sql1)):
				if( strstr($m_rs1[subject], $area ) ) {
			?>	
				<option value="<?=$m_rs1[uid]?>" <? if (strstr($m_rs1[subject], $air1[subject]) ) echo "selected"; ?> ><?=$m_rs1[subject]?></option>
			<?
				}
			endwhile?>
		</select>
	</td>
</tr>



<tr id="air1_tr" style=" text-align:center;">
	<td>
		항공일정상세1
	</td>
	<td colspan="3">
		<div id="air1_m">


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
		<td class="i_title" width="10%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;" >일정</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;" >출발지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">편명</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">항공시간</td>
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

</div>
<? //print_r($air1_a);?>
	</td>
</tr>

<tr id="air1_tr2" <?if(!$air1_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권1 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air1_a" value="<?=($air1_a[0])?>" style="width:180px;"/> <input name="air1_b" type="checkbox" <?if($air1_a[1]=='1'):?>checked="checked"<?endif?> value="1" />유류할증료포함&nbsp;
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air1_c" value="<?=($air1_a[2])?>" />
	</td>
</tr>


<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내2
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="air2" id="air2">
			<option value="0">일정없음</option>
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
			<?				
			$m_sql2 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");
			while($m_rs2 = mysql_fetch_array($m_sql2)):
				if( strstr($m_rs2[subject], $area ) ) {
			?>	
				<option value="<?=$m_rs2[uid]?>" <? if (strstr($m_rs2[subject], $air1[subject]) ) echo "selected"; ?> ><?=$m_rs2[subject]?></option>
			<?
			}
			endwhile?>
		</select>
	</td>
</tr>


<tr id="air2_tr" style="display:none; text-align:center;">
	<td>
		항공일정상세2
	</td>
	<td colspan="3">
		<div id="air2_m">

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
</div>
	</td>
</tr>
<tr id="air2_tr2" <?if(!$air2_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권2 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air2_a" value="<?=($air2_a[0])?>" style="width:180px;"/> <input name="air2_b" type="checkbox" <?if($air2_a[1]=='1'):?>checked="checked"<?endif?> value="1"  />유류할증료포함&nbsp;
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air2_c" value="<?=($air2_a[2])?>" />
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내3
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="air3" id="air3">
			<option value="0">일정없음</option>
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
			<?				
			$m_sql3 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");
			while($m_rs3 = mysql_fetch_array($m_sql3)):
				if( strstr($m_rs3[subject], $area ) ) {
			?>	
				<option value="<?=$m_rs3[uid]?>" <? if (strstr($m_rs3[subject], $air1[subject]) ) echo "selected"; ?> ><?=$m_rs3[subject]?></option>
			<? 
			}
			endwhile?>
		</select>
	</td>
</tr>

<tr id="air3_tr" style="display:none">
	<td style="text-align:center;">
		항공일정상세3
	</td>
	<td colspan="3">
		<div id="air3_m">
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
</div>
	</td>
</tr>

<tr id="air3_tr2" <?if(!$air3_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권3 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air3_a" value="<?=($air3_a[0])?>" style="width:180px;"/> <input name="air3_b" type="checkbox" <?if($air3_a[1]=='1'):?>checked="checked"<?endif?>  value="1" />유류할증료포함&nbsp;
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air3_c" value="<?=($air3_a[2])?>" />
	</td>
</tr>


<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공일정안내4
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="air4" id="air4">
			<option value="0">일정없음</option>
			<?
			$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$m_rs[air4]' ");
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
			<?				
			$m_sql4 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");
			while($m_rs4 = mysql_fetch_array($m_sql4)):
				if( strstr($m_rs4[subject], $area ) ) {
			?>	
				<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $air1[subject]) ) echo "selected"; ?> ><?=$m_rs4[subject]?></option>
			<? 
			}
			endwhile?>
		</select>
	</td>
</tr>

<tr id="air4_tr" style="display:none">
	<td style="text-align:center;">
		항공일정상세4
	</td>
	<td colspan="3">
		<div id="air4_m">
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
</div>
	</td>
</tr>

<tr id="air3_tr2" <?if(!$air3_a[0]):?>style="display:none"<?endif?>>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권3 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air3_a" value="<?=($air3_a[0])?>" style="width:180px;"/> <input name="air3_b" type="checkbox" <?if($air3_a[1]=='1'):?>checked="checked"<?endif?>  value="1" />유류할증료포함&nbsp;
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air3_c" value="<?=($air3_a[2])?>" />
	</td>
</tr>


<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		고객명
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_name" value="<?=$info[0]?>" />
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		인원
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_people" value="<?=$info[1]?>" />
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		이메일
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_email" value="<?=$info[2]?>" />
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		연락처
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_phone" value="<?=$info[3]?>" />
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		출발일
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_go" value="<?=$info[4]?>" />
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		여정
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_day" value="<?=$info[5]?>" />
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		리조트안내1
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="resort1" id="resort1">
			<option value="0">없음</option>
			<option value="999999999">신규</option>
			<?		
			if( empty($resort1_memo[0]) ) $resort1_memo[0] = "없음";
			if( "몰디브" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort1_memo[0]) ) echo "selected"; ?> >[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "칸쿤" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort1_memo[0]) ) echo "selected"; ?> >[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
	</td>
</tr>

<tr id="resort1_tr" style="<?if($resort1_memo[0] == "없음"):?>display:none;<?endif?> text-align:center; font-weight:bold;">
	<td>
		리조트안내상세1
	</td>
	<td colspan="3">
		<div id="resort1_m">
			<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
				<colgroup>
					<col style="width:100px" />
					<col style="width:220px" />
					<col style="width:100px" />
					<col style="width:220px" />
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7" >리조트명</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd1_1" value="<?=$resort1_memo[0]?>" /><?=$resort1_memo[0]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><input type="hidden" name="cost_type1" id="cost_type1" value="<?=$resort1_memo[11]?>" /><?=$resort1_memo[11]?></td>
					<td style="padding-left:10px;"><input type="hidden" name="radd1_2_1" value="<?=$resort1_memo[10]?>"/><input type="hidden" name="radd1_2" value="<?=$resort1_memo[1]?>"/><?=$resort1_memo[10] . " " . number_format($resort1_memo[1])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd1_3" value="<?=$resort1_memo[2]?>" /><?=$resort1_memo[2]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd1_4" value="<?=$resort1_memo[3]?>" /><?=$resort1_memo[3]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd1_5" value="<?=$resort1_memo[4]?>" /><?=$resort1_memo[4]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd1_6" value="<?=$resort1_memo[5]?>" /><?=$resort1_memo[5]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd1_7" value="<?=$resort1_memo[6]?>" /><?=nl2br($resort1_memo[6])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd1_8" value="<?=$resort1_memo[7]?>" /><?=nl2br($resort1_memo[7])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd1_9" value="<?=$resort1_memo[8]?>" /><?=nl2br($resort1_memo[8])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd1_10" value="<?=$resort1_memo[9]?>" /><?=nl2br($resort1_memo[9])?></td>
				</tr>
			</table>
		</div>
	</td>
</tr>


<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		리조트안내2
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="resort2" id="resort2">
			<option value="0">없음</option>
			<option value="999999999">신규</option>
			<?		
			if( empty($resort2_memo[0]) ) $resort2_memo[0] = "없음";
			if( "몰디브" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort2_memo[0]) ) echo "selected"; ?> >[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "칸쿤" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort2_memo[0]) ) echo "selected"; ?> >[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
	</td>
</tr>

<tr id="resort2_tr" style="<?if($resort2_memo[0] == "없음"):?>display:none;<?endif?> text-align:center; font-weight:bold;">
	<td>
		리조트안내상세2
	</td>
	<td colspan="3">
		<div id="resort2_m">
			<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
				<colgroup>
					<col style="width:100px" />
					<col style="width:220px" />
					<col style="width:100px" />
					<col style="width:220px" />
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd2_1" value="<?=$resort2_memo[0]?>" /><?=$resort2_memo[0]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><input type="hidden" name="cost_type2" id="cost_type2" value="<?=$resort2_memo[11]?>" /><?=$resort2_memo[11]?></td>
					<td style="padding-left:10px;"><input type="hidden" name="radd2_2_1" value="<?=$resort2_memo[10]?>" /><input type="hidden" name="radd2_2" value="<?=$resort2_memo[1]?>" /><?=$resort2_memo[10] . " " . number_format($resort2_memo[1])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd2_3" value="<?=$resort2_memo[2]?>" /><?=$resort2_memo[2]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd2_4" value="<?=$resort2_memo[3]?>" /><?=$resort2_memo[3]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd2_5" value="<?=$resort2_memo[4]?>" /><?=$resort2_memo[4]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd2_6" value="<?=$resort2_memo[5]?>" /><?=$resort2_memo[5]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd2_7" value="<?=$resort2_memo[6]?>" /><?=nl2br($resort2_memo[6])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd2_8" value="<?=$resort2_memo[7]?>" /><?=nl2br($resort2_memo[7])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd2_9" value="<?=$resort2_memo[8]?>" /><?=nl2br($resort2_memo[8])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd2_10" value="<?=$resort2_memo[9]?>" /><?=nl2br($resort2_memo[9])?></td>
				</tr>
			</table>
		</div>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		리조트안내3
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="resort3" id="resort3">
			<option value="0">없음</option>
			<option value="999999999">신규</option>
			<?		
			if( empty($resort3_memo[0]) ) $resort3_memo[0] = "없음";
			if( "몰디브" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort3_memo[0]) ) echo "selected"; ?> >[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "칸쿤" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort3_memo[0]) ) echo "selected"; ?> >[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
	</td>
</tr>

<tr id="resort3_tr" style="<?if($resort3_memo[0] == "없음"):?>display:none;<?endif?> text-align:center; font-weight:bold;">
	<td>
		리조트안내상세3
	</td>
	<td colspan="3">
		<div id="resort3_m">
			<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
				<colgroup>
					<col style="width:100px" />
					<col style="width:220px" />
					<col style="width:100px" />
					<col style="width:220px" />
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd3_1" value="<?=$resort3_memo[0]?>" /><?=$resort3_memo[0]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><input type="hidden" name="cost_type3" id="cost_type3" value="<?=$resort3_memo[11]?>" /><?=$resort3_memo[11]?></td>
					<td style="padding-left:10px;"><input type="hidden" name="radd3_2_1" value="<?=$resort3_memo[10]?>" /><input type="hidden" name="radd3_2" value="<?=$resort3_memo[1]?>" /><?=$resort3_memo[10] . " " . number_format($resort3_memo[1])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd3_3" value="<?=$resort3_memo[2]?>" /><?=$resort3_memo[2]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd3_4" value="<?=$resort3_memo[3]?>" /><?=$resort3_memo[3]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd3_5" value="<?=$resort3_memo[4]?>" /><?=$resort3_memo[4]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd3_6" value="<?=$resort3_memo[5]?>" /><?=$resort3_memo[5]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd3_7" value="<?=$resort3_memo[6]?>" /><?=nl2br($resort3_memo[6])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd3_8" value="<?=$resort3_memo[7]?>" /><?=nl2br($resort3_memo[7])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd3_9" value="<?=$resort3_memo[8]?>" /><?=nl2br($resort3_memo[8])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd3_10" value="<?=$resort3_memo[9]?>" /><?=nl2br($resort3_memo[9])?></td>
				</tr>
			</table>
		</div>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		리조트안내4
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="resort4" id="resort4">
			<option value="0">없음</option>
			<option value="999999999">신규</option>
			<?		
			if( empty($resort4_memo[0]) ) $resort4_memo[0] = "없음";
			if( "몰디브" == $area ) {			

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort4_memo[0]) ) echo "selected"; ?> >[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?		
			if( "칸쿤" == $area ) {			

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort4_memo[0]) ) echo "selected"; ?> >[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
	</td>
</tr>

<tr id="resort4_tr" style="<?if($resort4_memo[0] == "없음"):?>display:none;<?endif?> text-align:center; font-weight:bold;">
	<td>
		리조트안내상세4
	</td>
	<td colspan="3">
		<div id="resort4_m">
			<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
				<colgroup>
					<col style="width:120px" />
					<col style="width:230px" />
					<col style="width:120px" />
					<col style="width:230px" />
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd4_1" value="<?=$resort4_memo[0]?>" /><?=$resort4_memo[0]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><input type="hidden" name="cost_type4" id="cost_type4" value="<?=$resort4_memo[11]?>" /><?=$resort4_memo[11]?></td>
					<td style="padding-left:10px;"><input type="hidden" name="radd4_2_1" value="<?=$resort4_memo[10]?>" /><input type="hidden" name="radd4_2" value="<?=$resort4_memo[1]?>" /><?=$resort4_memo[10] . " " . number_format($resort4_memo[1])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd4_3" value="<?=$resort4_memo[2]?>" /><?=$resort4_memo[2]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd4_4" value="<?=$resort4_memo[3]?>" /><?=$resort4_memo[3]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd4_5" value="<?=$resort4_memo[4]?>" /><?=$resort4_memo[4]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd4_6" value="<?=$resort4_memo[5]?>" /><?=$resort4_memo[5]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd4_7" value="<?=$resort4_memo[6]?>" /><?=nl2br($resort4_memo[6])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd4_8" value="<?=$resort4_memo[7]?>" /><?=nl2br($resort4_memo[7])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd4_9" value="<?=$resort4_memo[8]?>" /><?=nl2br($resort4_memo[8])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd4_10" value="<?=$resort4_memo[9]?>" /><?=nl2br($resort4_memo[9])?></td>
				</tr>
			</table>
		</div>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		리조트안내5
	</td>
	<td colspan="3" style="padding-left:10px;">
		<select name="resort5" id="resort5">
			<option value="0">없음</option>
			<option value="999999999">신규</option>
			<?
			if( empty($resort5_memo[0]) ) $resort5_memo[0] = "없음";
			if( "몰디브" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort5_memo[0]) ) echo "selected"; ?> >[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "칸쿤" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>" <? if (strstr($m_rs4[subject], $resort5_memo[0]) ) echo "selected"; ?> >[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
	</td>
</tr>

<tr id="resort5_tr" style="<?if($resort5_memo[0] == "없음"):?>display:none;<?endif?> text-align:center; font-weight:bold;">
	<td>
		리조트안내상세5
	</td>
	<td colspan="3">
		<div id="resort5_m">
			<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin:10px 0 10px 10px;">
				<colgroup>
					<col style="width:120px" />
					<col style="width:230px" />
					<col style="width:120px" />
					<col style="width:230px" />
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">리조트명</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd5_1" value="<?=$resort5_memo[0]?>" /><?=$resort5_memo[0]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7"><input type="hidden" name="cost_type5" id="cost_type5" value="<?=$resort5_memo[11]?>" /><?=$resort5_memo[11]?></td>
					<td style="padding-left:10px;"><input type="hidden" name="radd5_2_1" value="<?=$resort5_memo[10]?>" /><input type="hidden" name="radd5_2" value="<?=$resort5_memo[1]?>" /><?=$resort5_memo[10] . " " . number_format($resort5_memo[1])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">룸타입</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd5_3" value="<?=$resort5_memo[2]?>" /><?=$resort5_memo[2]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">식사</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd5_4" value="<?=$resort5_memo[3]?>" /><?=$resort5_memo[3]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">이동수단</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd5_5" value="<?=$resort5_memo[4]?>" /><?=$resort5_memo[4]?></td>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">지역</td>
					<td style="padding-left:10px;"><input type="hidden" name="radd5_6" value="<?=$resort5_memo[5]?>" /><?=$resort5_memo[5]?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">허니문특전</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd5_7" value="<?=$resort5_memo[6]?>" /><?=nl2br($resort5_memo[6])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd5_8" value="<?=$resort5_memo[7]?>" /><?=nl2br($resort5_memo[7])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">불포함사항</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd5_9" value="<?=$resort5_memo[8]?>" /><?=nl2br($resort5_memo[8])?></td>
				</tr>
				<tr>
					<td style="font-weight:bold; color:#6e6e6e; padding-left:20px;" bgcolor="#f7f7f7">비고</td>
					<td colspan="3" style="padding-left:10px;"><input type="hidden" name="radd5_10" value="<?=$resort5_memo[9]?>" /><?=nl2br($resort5_memo[9])?></td>
				</tr>
			</table>		
		</div>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		RESERVATION<br>예약과정
	</td>
	<td colspan="3" style="padding-left:10px;">
		<textarea name="memo3" style="width:710px;">01. 자세한 상담 후 고객님께 꼭 맞는 리조트와 항공편 일정을 선택합니다.  
02. 항공과 리조트 예약을 요청합니다. 예약요청시에는 여행자의 여권상 영문스펠링 확인이 필요합니다. 
03. 예약 요청 후 여행계약서가 메일로 발송되며 계약금을 입금합니다. (40만원 / 1인)  
* 예약 요청 후 항공 및 리조트가 컨펌이 안될 경우 100% 환불 가능합니다. 
입금계좌 : 주식회사 트레비아 140-009-270166 / 신한은행 등촌서지점 
04. 항공료와 관련한 요금에 한하여 카드결제가 가능하며 그 외 요금은 현금결제 기준.[현금영수증 발행가능] 
05. 잔액입금(출발 약46일전) / 리조트에 따라 조건이 달라질 수 있습니다.(외화 : 결재당일 전신환 기준 재계산 적용)  
06. 여행안내서 발송 (이티켓, 바우처, 여행안내서 등) - 출발 20일 전  
07. 출발일 07일전 담당자에 의한 최종 확인.  
</textarea>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		SMS
	</td>
	<td colspan="3" style="padding-left:10px;">
		<textarea name="sms" style="width:710px;">[트레비아]요청하신 여행견적 이메일로 발송하였으니 확인 후 연락바랍니다.</textarea>
	</td>
</tr>
</table>
<div style="float:left;width:1000px;text-align:center; margin-top:30px;">
<input type="button" name="sending" value="메일전송" style="width:200px;height:40px" onclick="document.form.submit();" />
<input type="button" id="save" value="견적서 저장" style="width:200px;height:40px"/>
<input type="button" name="closing" value="닫기" style="width:60px;height:40px" onclick="window.close();" />
<input type="hidden" name="r" value="<?=$_GET[r]?>" />
<input type="hidden" name="m" value="<?=$_GET[m]?>" />
<input type="hidden" name="bid" value="<?=$_GET[bid]?>" />
<input type="hidden" name="_uid" value="<?=$_GET[_uid]?>" />
</div>
</form>
</html>
