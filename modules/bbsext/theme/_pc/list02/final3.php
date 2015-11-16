<!-- 접수완료 페이지 (2011/05/03) -->

<?php
//이메일전송


$g_arr = explode(",",$d['theme']['gubun_list']);
$g_num = count($g_arr);
		
$m_sql = mysql_query("SELECT * FROM ".$table[$m.'data']." where uid = '".$puid."' ");
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
<script>
$(document).ready(function(){

	$(function() {
		$( "#datepicker1" ).datepicker();
	});
	$(function() {
		$( "#datepicker2" ).datepicker();
	});
	$(function() {
		$( "#datepicker5" ).datepicker();
	});
	$(function() {
		$( "#datepicker6" ).datepicker();
	});
	$(function() {
		$( "#datepicker7" ).datepicker();
	});
	$(function() {
		$( "#datepicker8" ).datepicker();
	});
	$(function() {
		$( "#datepicker9" ).datepicker();
	});
	$(function() {
		$( "#datepicker10" ).datepicker();
	});
	$(function() {
		$( "#datepicker11" ).datepicker();
	});
	$(function() {
		$( "#datepicker12" ).datepicker();
	});
	$(function() {
		$( "#datepicker13" ).datepicker();
	});
	$(function() {
		$( "#datepicker14" ).datepicker();
	});
	$(function() {
		$( "#datepicker15" ).datepicker();
	});
	$(function() {
		$( "#datepicker16" ).datepicker();
	});

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

   var area = ['몰디브', '칸쿤', '미주허니문', '발리', '하와이', '세이셀'];

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
		} else if($("#resort1 option:selected").val()<0) {
//			$("#resort1").find('option').each(function() {  $(this).remove(); });
//			for( var i=0; i < 6; i++ )	{	$("#resort1").get(0).options[i+1] = new Option(area[i], area[i]);	}
//			$("#resort1_area").show();

		} else {
			$('#resort1_tr').hide();
		}

		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#resort1_area').change(function(){
		if ($("#resort1_area option:selected").val() != "다른지역")
		{
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process_area.php',
				data: "area="+$("#resort1_area option:selected").val(),
				success: function(msg){
					$("#resort1").html(msg);
				}
		   });
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

	$('#resort2_area').change(function(){
		if ($("#resort2_area option:selected").val() != "다른지역")
		{
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process_area.php',
				data: "area="+$("#resort2_area option:selected").val(),
				success: function(msg){
					$("#resort2").html(msg);
				}
		   });
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

	$('#resort3_area').change(function(){
		if ($("#resort3_area option:selected").val() != "다른지역")
		{
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process_area.php',
				data: "area="+$("#resort3_area option:selected").val(),
				success: function(msg){
					$("#resort3").html(msg);
				}
		   });
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

	$('#resort4_area').change(function(){
		if ($("#resort4_area option:selected").val() != "다른지역")
		{
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process_area.php',
				data: "area="+$("#resort4_area option:selected").val(),
				success: function(msg){
					$("#resort4").html(msg);
				}
		   });
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
			$('#resort1_tr').hide();
		}
		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$('#resort5_area').change(function(){
		if ($("#resort5_area option:selected").val() != "다른지역")
		{
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process_area.php',
				data: "area="+$("#resort5_area option:selected").val(),
				success: function(msg){
					$("#resort5").html(msg);
				}
		   });
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

});

</script>

<link rel="stylesheet" href="http://trevia.co.kr/mail/style.css">
<form id="form" name="form" action="/modules/bbsext/theme/_pc/list02/final4.php" method="post" enctype="multipart/form-data" onsubmit="return false" >
<input type="hidden" name="to_email" value="<?=$add3[5]?>" />
<input type="hidden" name="to_email2" value="<?=$add3[11]?>" />
<input type="hidden" name="to_name" value="<?=$add3[1]?>" />
<input type="hidden" name="to_name2" value="<?=$add3[7]?>" />
<input type="hidden" name="from_email" value="ok@trevia.co.kr" />
<input type="hidden" name="from_name" value="트레비아" />
<input type="hidden" name="tb_name" value="<?=$table[$m.'data']?>" />
<input type="hidden" name="puid" value="<?php echo $puid?>" />
<input type="hidden" name="memuid" value="<?php echo $memuid?>" />
<input type="hidden" id="save_flag" name="save_flag" value="false" />
<input type="hidden" id="insert_flag" name="insert_flag" value="true" />
<?
$mem_sql = mysql_query("SELECT * FROM rb_s_mbrdata where memberuid = '".$memuid."' ");
$mem_rs = mysql_fetch_array($mem_sql);
?>
<input type="hidden" name="p_name" value="<?php echo $mem_rs[name]?>" />
<input type="hidden" name="p_tel" value="<?php echo $mem_rs[tel2]?>" />
<input type="hidden" name="p_email" value="<?php echo $mem_rs[email]?>" />

<script language = "JavaScript">
<!--
document.title ="<?=$add3[1]?>님의 <?=$add2[2]?> <?=$add2[4]?> <?=$add2[5]?>박 여행견적서";
-->
</script>

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
		<input type="text" name="subject" style="width:500px" value="<?=$add3[1]?>고객님, <?=$add2[2]?> <?=$add2[4]?> <?=$add2[5]?>박 여행견적서 입니다.[트레비아,하이몰디브]">
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		메모1
	</td>
	<td colspan="3" style="padding-left:10px;">
		<textarea name="memo1" style="width:680px;height:200px">트레비아[하이몰디브] 최고의 플래너 <?=$mem_rs[name]?>입니다. [<?=$mem_rs[tel2]?>]

저희 여행사를 찾아주셔서 너무나 감사드리며, 요청하신 견적서를 발송하여 드립니다.</textarea>
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		메모2
	</td>
	<td colspan="3" style="padding-left:10px;">
		<textarea name="memo2" style="width:680px;">*** 상기 여행견적금액은 현금결제 기준으로 할인된 금액입니다 ***
</textarea>
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
			$m_sql1 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");
			while($m_rs1 = mysql_fetch_array($m_sql1)):
				if( strstr($m_rs1[category], $add2[2] ) ) {
			?>	
				<option value="<?=$m_rs1[uid]?>"><?=$m_rs1[subject]?></option>
			<?
				}
			endwhile?>
		</select>
	</td>
</tr>



<tr id="air1_tr" style="display:none; text-align:center;">
	<td>
		항공일정상세1
	</td>
	<td colspan="3">
		<div id="air1_m"></div>
	</td>
</tr>

<tr id="air1_tr2" style="display:none;" >
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권1 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air1_a" value="" style="width:180px"/> <input type="checkbox" name="air1_b" value="1" />유류할증료 포함
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air1_c" value="" />
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
			$m_sql2 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");
			while($m_rs2 = mysql_fetch_array($m_sql2)):
				if( strstr($m_rs2[category], $add2[2] ) ) {
			?>	
				<option value="<?=$m_rs2[uid]?>"><?=$m_rs2[subject]?></option>
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
		<div id="air2_m"></div>
	</td>
</tr>

<tr id="air2_tr2" style="display:none;" >
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권2 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air2_a" value="" style="width:180px"/> <input type="checkbox" name="air2_b" value="1" />유류할증료 포함
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air2_c" value="" />
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
			$m_sql3 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");
			while($m_rs3 = mysql_fetch_array($m_sql3)):
				if( strstr($m_rs3[category], $add2[2] ) ) {
			?>	
				<option value="<?=$m_rs3[uid]?>"><?=$m_rs3[subject]?></option>
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
		<div id="air3_m"></div>
	</td>
</tr>

<tr id="air3_tr2" style="display:none;" >
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권3 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air3_a" value="" style="width:180px" /> <input type="checkbox" name="air3_b" value="1" />유류할증료 포함
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air3_c" value="" />
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
			$m_sql4 = mysql_query("SELECT * FROM rb_bbsext_data where site='2' and bbsid='air_schedule' and display='1'");
			while($m_rs4 = mysql_fetch_array($m_sql4)):
				if( strstr($m_rs4[category], $add2[2] ) ) {
			?>	
				<option value="<?=$m_rs4[uid]?>"><?=$m_rs4[subject]?></option>
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
		<div id="air4_m"></div>
	</td>
</tr>

<tr id="air4_tr2" style="display:none;" >
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		항공권4 가격
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air4_a" value="" style="width:180px" /> <input type="checkbox" name="air4_b" value="1" />유류할증료 포함
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		유류할증료(예상)
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="air4_c" value="" />
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		고객명
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_name" value="<?=$add3[1]?>" />
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		인원
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_people" value="<?=$adult_count+$children_count+$baby_count?>" />
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		이메일
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_email" value="<?=$add3[5]?>" />
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		연락처
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_phone" value="<?=$add3[4]?>" />
	</td>
</tr>
<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		출발일
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_go" value="<?=$add2[7]?>" />
	</td>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		여정
	</td>
	<td style="padding-left:10px;">
		<input type="text" name="f_day" value="<?=$add2[2]?> <?=$add2[4]?> <?=$add2[5]?>박" />
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
<!--			<option value="-1">다른지역</option>  -->
			<?		
			if( "몰디브" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "칸쿤" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' and category='칸쿤' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "미주허니문" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='미주허니문' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[미주허니문] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "발리" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='5' and bbsid='resort' and display='1' and category='발리' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[발리] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "하와이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='하와이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[하와이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "세이셀" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='8' and bbsid='resort' and display='1' and category='세이셀' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[세이셀] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "코사무이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='코사무이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[코사무이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "모리셔스" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='10' and bbsid='resort' and display='1' and category='모리셔스' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[모리셔스] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
		<select name="resort1_area" id="resort1_area">
					<option value="다른지역">다른지역</option>
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="미주허니문">미주허니문</option>
					<option value="발리">발리</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
					<option value="코사무이">코사무이</option>
					<option value="모리셔스">모리셔스</option>
		</select>
	</td>
</tr>


<tr id="resort1_tr" style="display:none; text-align:center; font-weight:bold;">
	<td>
		리조트안내상세1
	</td>
	<td colspan="3">
		<div id="resort1_m"></div>
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
			if( "몰디브" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "칸쿤" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' and category='칸쿤' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "미주허니문" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='미주허니문' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[미주허니문] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "발리" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='발리' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[발리] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "하와이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='하와이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[하와이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "세이셀" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='8' and bbsid='resort' and display='1' and category='세이셀' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[세이셀] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "코사무이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='코사무이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[코사무이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "모리셔스" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='10' and bbsid='resort' and display='1' and category='모리셔스' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[모리셔스] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
		<select name="resort2_area" id="resort2_area">
					<option value="다른지역">다른지역</option>
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="미주허니문">미주허니문</option>
					<option value="발리">발리</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
					<option value="코사무이">코사무이</option>
					<option value="모리셔스">모리셔스</option>
		</select>
	</td>
</tr>

<tr id="resort2_tr" style="display:none; text-align:center; font-weight:bold;">
	<td>
		리조트안내상세2
	</td>
	<td colspan="3">
		<div id="resort2_m"></div>
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
			if( "몰디브" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "칸쿤" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' and category='칸쿤' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "미주허니문" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='미주허니문' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[미주허니문] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "발리" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='발리' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[발리] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "하와이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='하와이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[하와이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "세이셀" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='8' and bbsid='resort' and display='1' and category='세이셀' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[세이셀] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "코사무이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='코사무이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[코사무이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "모리셔스" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='10' and bbsid='resort' and display='1' and category='모리셔스' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[모리셔스] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
		<select name="resort3_area" id="resort3_area">
					<option value="다른지역">다른지역</option>
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="미주허니문">미주허니문</option>
					<option value="발리">발리</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
					<option value="코사무이">코사무이</option>
					<option value="모리셔스">모리셔스</option>
		</select>
	</td>
</tr>
<tr id="resort3_tr" style="display:none; text-align:center; font-weight:bold;">
	<td>
		리조트안내상세3
	</td>
	<td colspan="3">
		<div id="resort3_m"></div>
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
			if( "몰디브" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "칸쿤" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' and category='칸쿤' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "미주허니문" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='미주허니문' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[미주허니문] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "발리" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='발리' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[발리] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "하와이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='하와이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[하와이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "세이셀" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='8' and bbsid='resort' and display='1' and category='세이셀' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[세이셀] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "코사무이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='코사무이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[코사무이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "모리셔스" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='10' and bbsid='resort' and display='1' and category='모리셔스' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[모리셔스] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
		<select name="resort4_area" id="resort4_area">
					<option value="다른지역">다른지역</option>
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="미주허니문">미주허니문</option>
					<option value="발리">발리</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
					<option value="코사무이">코사무이</option>
					<option value="모리셔스">모리셔스</option>
		</select>
	</td>
</tr>

<tr id="resort4_tr" style="display:none; text-align:center; font-weight:bold;">
	<td>
		리조트안내상세4
	</td>
	<td colspan="3">
		<div id="resort4_m"></div>
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
			if( "몰디브" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "칸쿤" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' and category='칸쿤' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "미주허니문" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='미주허니문' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[미주허니문] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "발리" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='발리' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[발리] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "하와이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='하와이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[하와이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "세이셀" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='8' and bbsid='resort' and display='1' and category='세이셀' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[세이셀] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "코사무이" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='코사무이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[코사무이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
			<?				
			if( "모리셔스" == $add2[2] ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='10' and bbsid='resort' and display='1' and category='모리셔스' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[모리셔스] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>
		</select>
		<select name="resort5_area" id="resort5_area">
					<option value="다른지역">다른지역</option>
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="미주허니문">미주허니문</option>
					<option value="발리">발리</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
					<option value="코사무이">코사무이</option>
					<option value="모리셔스">모리셔스</option>
		</select>
	</td>
</tr>

<tr id="resort5_tr" style="display:none; text-align:center; font-weight:bold;">
	<td>
		리조트안내상세5
	</td>
	<td colspan="3">
		<div id="resort5_m"></div>
	</td>
</tr>

<tr>
	<td style="padding-left:20px; font-weight:bold; background-color:#e6e6e6;">
		첨부파일
	</td>
	<td colspan="3" style="padding-left:10px;">
		<input type="file" name="upfile" size="50">
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
		<textarea name="sms" style="width:710px;">[하이몰디브]요청하신 여행견적 이메일로 발송하였으니 확인 후 연락바랍니다.</textarea>
	</td>
</tr>
</table>
<div style="float:left;width:1000px;text-align:center; margin-top:30px;">
<input type="hidden" name="admin_add_email" value="<?=$m_rs[id]?>" />
<input type="button" name="sending" value="메일전송" style="width:200px;height:40px" onclick="document.form.submit();" />
<input type="button" id="save" value="견적서 저장" style="width:200px;height:40px"/>
<input type="button" name="closing" value="닫기" style="width:60px;height:40px" onclick="window.close();" />
<input type="hidden" name="r" value="<?=$_GET[r]?>" />
<input type="hidden" name="m" value="<?=$_GET[m]?>" />
<input type="hidden" name="bid" value="<?=$_GET[bid]?>" />
<input type="hidden" name="_uid" value="<?=$_GET[uid]?>" />
</div>

</form>

