<?php
$dbconnect = mysql_connect("localhost", "trevia", "trevia6681") or die(mysql_error()); 
$mysql = mysql_select_db("trevia") or die(mysql_error());
mysql_query("set names utf8");

$resort = $_POST['resort'];
$air = $_POST['air'];
$type = $_POST['type'];


if($resort) {
	$m_sql = mysql_query("SELECT * FROM rb_bbs_data where uid='$resort'");
	$m_rs = mysql_fetch_array($m_sql);


	$adddata = unserialize($m_rs['adddata']);
	if(is_array($adddata))
	{
		foreach($adddata as $key => $value)
		{
			$adddata[$key] = stripslashes(urldecode($value));

		}
	}
//	echo "<pre>";
	//print_r($adddata);
//	echo "</pre>";
}


if($air) {
$m_sqla = mysql_query("SELECT * FROM rb_bbsext_data where uid='$air' ");
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
	$add29 = explode("||", $air1[add29]);	
}
?>

<?if($resort):?>

<style type="text/css">



</style>

<table width="97%" border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; margin-left:10px;">
	<colgroup>
		<col style="width:120px" />
		<col />
		<col style="width:120px" />
		<col  />
	<tr>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">리조트명<input type="hidden" name="radd<?=$types?>_uid" value="<?=$resort?>" /></td>
		<td><input type="text" name="radd<?=$types?>_1" value="<?=$m_rs[subject]?>" /></td>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">
			<select name="cost_type<?=($types)?>" id="cost_type">
				<option value="가격/인">가격/인</option>
				<option value="가격/박">가격/박</option>
			</select>
		</td>
		<td>
		<select name="radd<?=$types?>_2_1" id="radd<?=$types?>_2_1">
			<option value="KRW">KRW</option>
			<option value="USD">USD</option>
			<option value="EURO">EURO</option>
		</select>
		<input type="text" name="radd<?=$types?>_2" value="" /></td>
	</tr>
	<tr>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">룸타입</td>
		<?
			$room_type_array = explode(",", $adddata['room_type']);
		?>
		<td><select name="radd<?=$types?>_3" id="radd<?=$types?>_3">
		<? foreach ( $room_type_array as $element )  { ?>
			<option value="<?=trim($element)?>"><?=trim($element)?></option>
		<? } ?>
		</select>
		</td>

		<td style=" font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">식사</td>
		<?
			$eat_array = explode(",", $adddata['eat']);
		?>
		<td><select name="radd<?=$types?>_4" id="radd<?=$types?>_4">
		<? foreach ( $eat_array as $element )  { ?>
			<option value="<?=trim($element)?>"><?=trim($element)?></option>
		<? } ?>
		</select>
		</td>
	</tr>
	<tr>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">이동수단</td>
		<td>
		<?
			$transportation_array = explode(",", $adddata['transportation']);
		?>
		<select name="radd<?=$types?>_5" id="radd<?=$types?>_5">
		<? foreach ( $transportation_array as $element )  { ?>
			<option value="<?=trim($element)?>"><?=trim($element)?></option>
		<? } ?>
		</select>
		</td>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">지역</td>
		<td><input type="text" name="radd<?=$types?>_6" value="<?php echo $m_rs['category']; ?>" />
		<input type="hidden" name="radd<?=$types?>_url" value="<?php if($m_rs['site']=='2'):?>himaldives.co.kr/?r=maldives&m=bbs&uid=<?else:?>trevia.co.kr/?r=mexico&c=cancun&uid=<?endif?>" /></td>
	</tr>
	<tr>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">허니문특전</td>
		<td colspan="3"><textarea name="radd<?=$types?>_7" style="width:574px;"><?php echo htmlspecialchars($adddata['honeymoon'])?></textarea></td>
	</tr>
	<tr>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">포함사항</td>
		<td colspan="3"><textarea name="radd<?=$types?>_8" style="width:574px;"><?php echo htmlspecialchars($adddata['inctext'])?></textarea></td>
	</tr>
	<tr>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">불포함사항</td>
		<td colspan="3"><textarea name="radd<?=$types?>_9" style="width:574px;"><?php echo htmlspecialchars($adddata['no_include'])?></textarea></td>
	</tr>
	<tr>
		<td style="font-weight:bold; color:#6e6e6e;" bgcolor="#f7f7f7">비고</td>
		<td colspan="3"><textarea name="radd<?=$types?>_10" style="width:574px;"></textarea></td>
	</tr>
</table>
<?endif?>


<?if($air):?>

<link rel="stylesheet" href="/lib/jquery.ui.all.css">
<script src="/lib/jquery-1.4.4.js"></script>
<script src="/lib/jquery.ui.core.js"></script>
<script src="/lib/jquery.ui.widget.js"></script>
<script src="/lib/jquery.ui.datepicker.js"></script>
<script>
	$(function() {
		$( "#datepicker49" ).datepicker();
	});
	$(function() {
		$( "#datepicker50" ).datepicker();
	});
	$(function() {
		$( "#datepicker51" ).datepicker();
	});
	$(function() {
		$( "#datepicker52" ).datepicker();
	});
	$(function() {
		$( "#datepicker53" ).datepicker();
	});
	$(function() {
		$( "#datepicker54" ).datepicker();
	});
	$(function() {
		$( "#datepicker55" ).datepicker();
	});
	$(function() {
		$( "#datepicker56" ).datepicker();
	});
	$(function() {
		$( "#datepicker57" ).datepicker();
	});
	$(function() {
		$( "#datepicker58" ).datepicker();
	});
	$(function() {
		$( "#datepicker59" ).datepicker();
	});
	$(function() {
		$( "#datepicker60" ).datepicker();
	});
	$(function() {
		$( "#datepicker61" ).datepicker();
	});
	$(function() {
		$( "#datepicker62" ).datepicker();
	});
	$(function() {
		$( "#datepicker63" ).datepicker();
	});
	$(function() {
		$( "#datepicker64" ).datepicker();
	});

	$(function() {
		$( "#datepicker1" ).datepicker();
	});
	$(function() {
		$( "#datepicker2" ).datepicker();
	});
	$(function() {
		$( "#datepicker3" ).datepicker();
	});
	$(function() {
		$( "#datepicker4" ).datepicker();
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

	$(function() {
		$( "#datepicker17" ).datepicker();
	});
	$(function() {
		$( "#datepicker18" ).datepicker();
	});
	$(function() {
		$( "#datepicker19" ).datepicker();
	});
	$(function() {
		$( "#datepicker20" ).datepicker();
	});
	$(function() {
		$( "#datepicker21" ).datepicker();
	});
	$(function() {
		$( "#datepicker22" ).datepicker();
	});
	$(function() {
		$( "#datepicker23" ).datepicker();
	});
	$(function() {
		$( "#datepicker24" ).datepicker();
	});
	$(function() {
		$( "#datepicker25" ).datepicker();
	});
	$(function() {
		$( "#datepicker26" ).datepicker();
	});
	$(function() {
		$( "#datepicker27" ).datepicker();
	});
	$(function() {
		$( "#datepicker28" ).datepicker();
	});
	$(function() {
		$( "#datepicker29" ).datepicker();
	});
	$(function() {
		$( "#datepicker30" ).datepicker();
	});
	$(function() {
		$( "#datepicker31" ).datepicker();
	});
	$(function() {
		$( "#datepicker32" ).datepicker();
	});

	$(function() {
		$( "#datepicker33" ).datepicker();
	});
	$(function() {
		$( "#datepicker34" ).datepicker();
	});
	$(function() {
		$( "#datepicker35" ).datepicker();
	});
	$(function() {
		$( "#datepicker36" ).datepicker();
	});
	$(function() {
		$( "#datepicker37" ).datepicker();
	});
	$(function() {
		$( "#datepicker38" ).datepicker();
	});
	$(function() {
		$( "#datepicker39" ).datepicker();
	});
	$(function() {
		$( "#datepicker40" ).datepicker();
	});
	$(function() {
		$( "#datepicker41" ).datepicker();
	});
	$(function() {
		$( "#datepicker42" ).datepicker();
	});
	$(function() {
		$( "#datepicker43" ).datepicker();
	});
	$(function() {
		$( "#datepicker44" ).datepicker();
	});
	$(function() {
		$( "#datepicker45" ).datepicker();
	});
	$(function() {
		$( "#datepicker46" ).datepicker();
	});
	$(function() {
		$( "#datepicker47" ).datepicker();
	});
	$(function() {
		$( "#datepicker48" ).datepicker();
	});
</script>


<table width="97%" cellpadding="0" cellspacing="0" id="ttid"  border="1px" bordercolor="#d2d2d2" style="border-collapse:collapse; text-align:center; margin-left:10px;">
	<colgroup>
		<col width="1" >
		<col width="1" >
		<col width="1">
		<col width="1" >
		<col width="1">
		<col width="1"  >
		<col width="1" >
	</colgroup>


	<tr align="center">
		<td class="i_title" width="10%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">일정</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착지</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">편명</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">출발시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">도착시간</td>
		<td class="i_title" width="15%" bgcolor="#f7f7f7" style="color:#6e6e6e; font-weight:bold;">항공시간</td>
	</tr>
	<tr <?if(!$add11[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+1?>" name="datepicker<?=($types-1)*16+1?>" style="width:100px;" /></td>
		<td  ><?=$add11[0]?></td>
		<td  ><?=$add11[1]?></td>
		<td  ><?=$add11[2]?></td>
		<td  ><?=$add11[3]?></td>
		<td  ><?=$add11[4]?></td>
		<td  ><?=$add11[5]?></td>
	</tr>
	<tr <?if(!$add12[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+2?>" name="datepicker<?=($types-1)*16+2?>" style="width:100px;" /></td>
		<td  ><?=$add12[0]?></td>
		<td  ><?=$add12[1]?></td>
		<td  ><?=$add12[2]?></td>
		<td  ><?=$add12[3]?></td>
		<td  ><?=$add12[4]?></td>
		<td  ><?=$add12[5]?></td>
	</tr>
	<tr <?if(!$add13[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+3?>" name="datepicker<?=($types-1)*16+3?>" style="width:100px;" /></td>
		<td  ><?=$add13[0]?></td>
		<td  ><?=$add13[1]?></td>
		<td  ><?=$add13[2]?></td>
		<td  ><?=$add13[3]?></td>
		<td  ><?=$add13[4]?></td>
		<td  ><?=$add13[5]?></td>
	</tr>
	<tr <?if(!$add14[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+4?>" name="datepicker<?=($types-1)*16+4?>" style="width:100px;" /></td>
		<td  ><?=$add14[0]?></td>
		<td  ><?=$add14[1]?></td>
		<td  ><?=$add14[2]?></td>
		<td  ><?=$add14[3]?></td>
		<td  ><?=$add14[4]?></td>
		<td  ><?=$add14[5]?></td>
	</tr>
	<tr <?if(!$add15[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+5?>" name="datepicker<?=($types-1)*16+5?>" style="width:100px;" /></td>
		<td  ><?=$add15[0]?></td>
		<td  ><?=$add15[1]?></td>
		<td  ><?=$add15[2]?></td>
		<td  ><?=$add15[3]?></td>
		<td  ><?=$add15[4]?></td>
		<td  ><?=$add15[5]?></td>
	</tr>
	<tr <?if(!$add16[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+6?>" name="datepicker<?=($types-1)*16+6?>" style="width:100px;" /></td>
		<td  ><?=$add16[0]?></td>
		<td  ><?=$add16[1]?></td>
		<td  ><?=$add16[2]?></td>
		<td  ><?=$add16[3]?></td>
		<td  ><?=$add16[4]?></td>
		<td  ><?=$add16[5]?></td>
	</tr>
	<tr <?if(!$add17[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+7?>" name="datepicker<?=($types-1)*16+7?>" style="width:100px;" /></td>
		<td  ><?=$add17[0]?></td>
		<td  ><?=$add17[1]?></td>
		<td  ><?=$add17[2]?></td>
		<td  ><?=$add17[3]?></td>
		<td  ><?=$add17[4]?></td>
		<td  ><?=$add17[5]?></td>
	</tr>
	<tr <?if(!$add18[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+8?>" name="datepicker<?=($types-1)*16+8?>" style="width:100px;" /></td>
		<td  ><?=$add18[0]?></td>
		<td  ><?=$add18[1]?></td>
		<td  ><?=$add18[2]?></td>
		<td  ><?=$add18[3]?></td>
		<td  ><?=$add18[4]?></td>
		<td  ><?=$add18[5]?></td>
	</tr>
	<tr>
		<td colspan="7" style="text-align:center;padding:20px 0px;background-color:#f7f7f7" ><?=$air1[content]?></td>
	</tr>

	<tr <?if(!$add21[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+9?>" name="datepicker<?=($types-1)*16+9?>" style="width:100px;" /></td>
		<td  ><?=$add21[0]?></td>
		<td  ><?=$add21[1]?></td>
		<td  ><?=$add21[2]?></td>
		<td  ><?=$add21[3]?></td>
		<td  ><?=$add21[4]?></td>
		<td  ><?=$add21[5]?></td>
	</tr>
	<tr <?if(!$add22[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+10?>" name="datepicker<?=($types-1)*16+10?>" style="width:100px;" /></td>
		<td  ><?=$add22[0]?></td>
		<td  ><?=$add22[1]?></td>
		<td  ><?=$add22[2]?></td>
		<td  ><?=$add22[3]?></td>
		<td  ><?=$add22[4]?></td>
		<td  ><?=$add22[5]?></td>
	</tr>
	<tr <?if(!$add23[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+11?>" name="datepicker<?=($types-1)*16+11?>" style="width:100px;" /></td>
		<td  ><?=$add23[0]?></td>
		<td  ><?=$add23[1]?></td>
		<td  ><?=$add23[2]?></td>
		<td  ><?=$add23[3]?></td>
		<td  ><?=$add23[4]?></td>
		<td  ><?=$add23[5]?></td>
	</tr>
	<tr <?if(!$add24[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+12?>" name="datepicker<?=($types-1)*16+12?>" style="width:100px;" /></td>
		<td  ><?=$add24[0]?></td>
		<td  ><?=$add24[1]?></td>
		<td  ><?=$add24[2]?></td>
		<td  ><?=$add24[3]?></td>
		<td  ><?=$add24[4]?></td>
		<td  ><?=$add24[5]?></td>
	</tr>
	<tr <?if(!$add25[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+13?>" name="datepicker<?=($types-1)*16+13?>" style="width:100px;" /></td>
		<td  ><?=$add25[0]?></td>
		<td  ><?=$add25[1]?></td>
		<td  ><?=$add25[2]?></td>
		<td  ><?=$add25[3]?></td>
		<td  ><?=$add25[4]?></td>
		<td  ><?=$add25[5]?></td>
	</tr>
	<tr <?if(!$add26[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+14?>" name="datepicker<?=($types-1)*16+14?>" style="width:100px;" /></td>
		<td  ><?=$add26[0]?></td>
		<td  ><?=$add26[1]?></td>
		<td  ><?=$add26[2]?></td>
		<td  ><?=$add26[3]?></td>
		<td  ><?=$add26[4]?></td>
		<td  ><?=$add26[5]?></td>
	</tr>
	<tr <?if(!$add27[0]):?>style="display:none"<?endif?>>
		<td  ><input type="text" id="datepicker<?=($types-1)*16+15?>" name="datepicker<?=($types-1)*16+15?>" style="width:100px;" /></td>
		<td  ><?=$add27[0]?></td>
		<td  ><?=$add27[1]?></td>
		<td  ><?=$add27[2]?></td>
		<td  ><?=$add27[3]?></td>
		<td  ><?=$add27[4]?></td>
		<td  ><?=$add27[5]?></td>
	</tr>
	<tr <?if(!$add28[0]):?>style="display:none"<?endif?> >
		<td  ><input type="text" id="datepicker<?=($types-1)*16+16?>" name="datepicker<?=($types-1)*16+16?>" style="width:100px;" /></td>
		<td  ><?=$add28[0]?></td>
		<td  ><?=$add28[1]?></td>
		<td  ><?=$add28[2]?></td>
		<td  ><?=$add28[3]?></td>
		<td  ><?=$add28[4]?></td>
		<td  ><?=$add28[5]?></td>
	</tr>
<!--
	<tr style="background:#dddddd">
		<td>항공권가격</td>
		<td><input type="text" name="air_add1" value="<?=$add29[0]?>" style="width:100px" /></td>
		<td>유류할증료 포함여부</td>
		<td><select name="air_add2">
				<option value="<?=$add29[1]?>" <?if($add29[1]=='0'):?>selected="selected"<?endif?>>미포함</option>
				<option value="<?=$add29[1]?>" <?if($add29[1]=='1'):?>selected="selected"<?endif?>>포함</option>
			</select>
		</td>
		<td>유류할증료(예상)</td>
		<td><input type="text" name="air_add3" value="<?=$add29[2]?>" style="width:100px" /></td>
	</tr>-->
</table>
<?endif?>