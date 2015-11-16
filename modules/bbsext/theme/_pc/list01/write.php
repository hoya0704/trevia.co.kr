<link rel="stylesheet" href="/lib/jquery.ui.all.css">
<script src="/lib/jquery-1.4.4.js"></script>
<script src="/lib/jquery.ui.core.js"></script>
<script src="/lib/jquery.ui.widget.js"></script>
<script src="/lib/jquery.ui.datepicker.js"></script>

	<script>
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
		$( "#postData" ).datepicker();
	});
	</script>
<div id="bbswrite">

	<form name="writeForm" method="post" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return writeCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="a" value="write" />
	<input type="hidden" name="c" value="<?php echo $c?>" />
	<input type="hidden" name="cuid" value="<?php echo $_HM['uid']?>" />
	<input type="hidden" name="m" value="<?php echo $m?>" />
	<input type="hidden" name="bid" value="<?php echo $R['bbsid']?$R['bbsid']:$bid?>" />
	<input type="hidden" name="uid" value="<?php echo $R['uid']?>" />
	<input type="hidden" name="reply" value="<?php echo $reply?>" />
	<input type="hidden" name="nlist" value="<?php echo $g['bbs_list']?>" />
	<input type="hidden" name="pcode" value="<?php echo $date['totime']?>" />
	<input type="hidden" name="upfiles" id="upfilesValue" value="<?php echo $reply=='Y'?'':$R['upload']?>" />
	<?for ($i=1;$i<=30;$i++) :?>
	<input type="hidden" name="add<?=$i?>" />
	<?endfor?>
	
	<table>
		<tr style="display:none">
		<td class="td1">제목</td>
		<td class="td2">
			<input type="text" name="subject" value="<?php echo (htmlspecialchars($R['subject']))?(htmlspecialchars($R['subject'])):"고객관리시스템"?>" class="input subject" />
			<span class="check">
			<?php if($my['admin']):?>
			<input type="checkbox" name="notice" value="1"<?php if($R['notice']):?> checked="checked"<?php endif?> />공지글
			<?php endif?>
			<?php if($d['theme']['use_hidden']==1):?>
			<input type="checkbox" name="hidden" value="1"<?php if($R['hidden']):?> checked="checked"<?php endif?> />비밀글
			<?php elseif($d['theme']['use_hidden']==2):?>
			<input type="hidden" name="hidden" value="1" />
			<?php endif?>
			</span>
		</td>
		</tr>

		<tr>
		<td class="td2" colspan="2">
<!--작업자리-->


<?
	$add1 = explode("||", $R[add1]);
	$add2 = explode("||", $R[add2]);
	$add3 = explode("||", $R[add3]);
	$add4 = explode("||", $R[add4]);
	$add5 = explode("||", $R[add5]);
	$add6 = explode("||", $R[add6]);
	$add7 = explode("||", $R[add7]);
	$add8 = explode("||", $R[add8]);
	$add9 = explode("||", $R[add9]);
	$add10 = explode("||", $R[add10]);
	$add11 = explode("||", $R[add11]);	
?>




<style>

#ttid td {border:solid 1px #999;height:25px;padding:0px 5px;}
.b_title {font-weight:bold;font-size:14px;color:#114411;}
.i_normal {border:solid 1px #ccc;width:110px;}
.i_normal_2 {border:solid 1px #ccc;width:80px;}

.i_normal2 {border:solid 1px #ccc;width:250px;}
.i_normal2_2 {border:solid 1px #ccc;width:208px;}
.i_normal3 {border:solid 1px #ccc;width:527px;}
.i_title {text-align:center;font-weight:bold;}
</style>

<table width="" cellpadding="0" cellspacing="0" id="ttid"  style="border-collapse:collapse; ">
	<colgroup>
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
	</colgroup>
	<tr>  
		<td colspan="9" style="border:0" class="b_title">■ 예약처리상태표시</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">처리상태</td>
		<td class="i_title" bgcolor="#e6e6e6">계약금입금</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금입금</td>
		<td class="i_title" bgcolor="#e6e6e6">여권사본</td>
		<td class="i_title" bgcolor="#e6e6e6">계약서</td>
		<td class="i_title" bgcolor="#e6e6e6">우편물발송</td>
		<td class="i_title" bgcolor="#e6e6e6">계약금지출</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금지출</td>
		<td class="i_title" bgcolor="#e6e6e6">현금영수증</td>
	</tr>
	<tr>
		<td>
			<?php if($B['category']):$_catexp = explode(',',$B['category']);$_catnum=count($_catexp)?>
	
		<select name="category" >
			<?php for($i = 1; $i < $_catnum; $i++):if(!$_catexp[$i])continue;?>
			<option value="<?php echo $_catexp[$i]?>"<?php if($_catexp[$i]==$R['category']||$_catexp[$i]==$cat):?> selected="selected"<?php endif?>>ㆍ<?php echo $_catexp[$i]?><?php if($d['theme']['show_catnum']):?>(<?php echo getDbRows($table[$m.'data'],'site='.$s.' and notice=0 and bbs='.$B['uid']." and category='".$_catexp[$i]."'")?>)<?php endif?></option>
			<?php endfor?>
			</select>
			<?php endif?></td>
		<td><input type="text" name="add1_1" class="i_normal" id="cost_top1" value="<?=$add1[0]?>" /></td>
		<td><input type="text" name="add1_2" class="i_normal" id="cost_top2" value="<?=$add1[1]?>" /></td>
		<td><input type="text" name="add1_3" class="i_normal" value="<?=$add1[2]?>" /></td>
		<td><input type="text" name="add1_4" class="i_normal" value="<?=$add1[3]?>" /></td>
		<td><input type="text" name="add1_5" id="postData" class="i_normal" value="<?=$add1[4]?>" /></td>
		<td><input type="text" name="add1_6" class="i_normal" value="<?=$add1[5]?>" /></td>
		<td><input type="text" name="add1_7" class="i_normal" value="<?=$add1[6]?>" /></td>
		<td><input type="text" name="add1_8" class="i_normal" value="<?=$add1[7]?>" /></td>
	</tr>
	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">담당자</td>
		<td colspan="2"><input type="text" name="add2_10" value="<?if(!$add2[9]):?><?php echo $my[name]?><?else:?><?php echo $add2[9]?><?endif?>"  class="i_normal" /></td>									 
		<td class="i_title" bgcolor="#e6e6e6">접수방법</td>
		<td colspan="2"><input type="radio" name="add2_1" value="인터넷" <?if($add2[0]=="인터넷" || !$add2[0]):?>checked<?endif?> />인터넷 <input type="radio" name="add2_1" value="전화" <?if($add2[0]=="전화"):?>checked<?endif?>  />전화 <input type="radio" name="add2_1" value="방문" <?if($add2[0]=="방문"):?>checked<?endif?>  />방문 <input type="radio" name="add2_1" value="지인" <?if($add2[0]=="지인"):?>checked<?endif?>  />지인</td>									 
		<td class="i_title" bgcolor="#e6e6e6">견적요청일</td>
		<td colspan="2"><input type="text" id="datepicker5" name="add2_2" class="i_normal" value="<?=($add2[1])?$add2[1]:date('Y-m-d')?>" /></td>									 
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">여행지역</td>
		<td><select name="add2_3">
				<option value="몰디브" <?if($add2[2]=="몰디브"):?>selected<?endif?> >몰디브</option>
				<option value="세이셸" <?if($add2[2]=="세이셸"):?>selected<?endif?> >세이셸</option>
				<option value="두바이" <?if($add2[2]=="두바이"):?>selected<?endif?> >두바이</option>
				<option value="칸쿤" <?if($add2[2]=="칸쿤"):?>selected<?endif?> >칸쿤</option>
				<option value="코사무이" <?if($add2[2]=="코사무이"):?>selected<?endif?> >코사무이</option>
				<option value="유럽" <?if($add2[2]=="유럽"):?>selected<?endif?> >유럽</option>
				<option value="미주" <?if($add2[2]=="미주"):?>selected<?endif?> >미주</option>
				<option value="기타" <?if($add2[2]=="기타"):?>selected<?endif?> >기타</option>
			</select></td>	
		<td><input type="text" name="add2_4" class="i_normal" value="<?=$add2[3]?>" /></td>				 
		<td class="i_title" bgcolor="#e6e6e6">여행종류</td>
		<td colspan="2"><input type="radio" name="add2_5" value="허니문" <?if($add2[4]=="허니문" || !$add2[4]):?>checked<?endif?> />허니문 <input type="radio" name="add2_5" value="가족여행" <?if($add2[4]=="가족여행"):?>checked<?endif?> />가족여행 <input type="radio" name="add2_5" value="기타" <?if($add2[4]=="기타"):?>checked<?endif?> />기타 </td>									 
		<td class="i_title" bgcolor="#e6e6e6">여행기간</td>
		<td colspan="2">
			<select name="add2_6" id="periodate" onchange="dateCal2()";>
				<?for($i=1;$i<=20;$i++):?>
					<option value="<?=$i?>" <?if($add2[5]==$i):?>selected="selected"<?endif?> ><?=$i?>박</option>
				<?endfor?>
		</td>									 
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">예식일</td>
		<td colspan="2"><input type="text" id="datepicker1" name="add2_7" class="i_normal" value="<?=$add2[6]?>"  onChange="dateCal( this.value )" /></td>									 
		<td class="i_title" bgcolor="#e6e6e6">출발일</td>
		<td colspan="2"><input type="text" id="datepicker2" onchange="dateCal2()" name="add2_8" class="i_normal" value="<?=$add2[7]?>" /></td>	  
		<td class="i_title" bgcolor="#e6e6e6">도착일</td>
		<td colspan="2"><input type="text" id="datepicker3" name="add2_9" class="i_normal" value="<?=$add2[8]?>" /></td>									 
	</tr>
	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="9" style="border:0" class="b_title">■ 고객정보</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">구분</td>
		<td class="i_title" bgcolor="#e6e6e6">한글</td>
		<td  class="i_title" colspan="2" bgcolor="#e6e6e6">영문</td>             
		<td class="i_title" bgcolor="#e6e6e6">구분</td>
		<td  class="i_title" colspan="2" bgcolor="#e6e6e6">전화번호</td>
		<td  class="i_title" colspan="2" bgcolor="#e6e6e6">이메일</td>
	</tr>	

<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="cus<?=$i?>" <?if($i>0&&!$add3[$k+1]):?>style="display:none"<?endif?> >
		<td class="i_title"><select name="add3_<?=$j++;?>" class="i_normal">
				<option value="MR" <?if($add3[$k]=='MR'):?>selected<?endif?>>MR</option>
				<option value="MS" <?if($add3[$k++]=='MS'):?>selected<?endif?>>MS</option>
			</select></td>
		<td><input type="text" name="add3_<?=$j++;?>" id="oriName<?=$i;?>" onblur="cpyName('<?=$i;?>')" class="i_normal" value="<?=$add3[$k++]?>" /></td>
		<td colspan="2"><input type="text" name="add3_<?=$j++;?>" class="i_normal2" value="<?=$add3[$k++]?>" /></td>             
		<td><select name="add3_<?=$j++;?>" class="i_normal">
				<option value="성인" <?if($add3[$k]=='성인'):?>selected<?endif?>>성인</option>
				<option value="소아" <?if($add3[$k]=='소아'):?>selected<?endif?>>소아</option>
				<option value="유아" <?if($add3[$k++]=='유아'):?>selected<?endif?>>유아</option>
			</select>				
</td>
		<td colspan="2"><input type="text" name="add3_<?=$j++;?>" class="i_normal2" value="<?=$add3[$k++]?>" /></td>
		<td colspan="2"><input type="text" name="add3_<?=$j++;?>" class="i_normal2_2" value="<?=$add3[$k++]?>" /><?if($i!=9):?><input type="button" value="+" onclick="showType('cus<?=$i+1?>','btnCus<?=$i?>');" id="btnCus<?=$i?>" <?if($add3[$k+1]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>		
<?endfor?>		
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">주소</td>
		<td colspan="4"><input type="text" name="add4_1" class="i_normal3"  value="<?=$add4[0]?>" /></td>
		<td colspan="3"><input type="checkbox" name="add4_2" value="견적발송" <?if($add4[1]=="견적발송"):?>checked<?endif?> />견적발송 <input type="checkbox" name="add4_3" value="APIS접수" <?if($add4[2]=="APIS접수"):?>checked<?endif?> />APIS접수 <input type="checkbox" name="add4_4" id="postsend" value="우편물발송" <?if($add4[3]=="우편물발송"):?>checked<?endif?> onclick="postsendCheck();" />우편물발송</td>
		<td>SMS발송(준비중)</td>
	</tr>
	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>  
		<td colspan="9" style="border:0" class="b_title">■ 요청 견적내용</td>
	</tr>
	<tr>
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">호텔명</td>
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">룸타입</td>
		<td class="i_title" bgcolor="#e6e6e6">박수</td>
		<td class="i_title" bgcolor="#e6e6e6">식사</td>
		<td class="i_title" bgcolor="#e6e6e6">판매가(인)</td>
		<td class="i_title" bgcolor="#e6e6e6">예상수익</td>
		<td class="i_title" bgcolor="#e6e6e6">항공</td>
	</tr>

<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="room<?=$i?>" <?if($i>0&&!$add5[$k]):?>style="display:none"<?endif?> >
		<td colspan="2"><input type="text" name="add5_<?=$j++;?>" class="i_normal2" value="<?=$add5[$k++]?>" /></td>
		<td colspan="2"><input type="text" name="add5_<?=$j++;?>" class="i_normal2" value="<?=$add5[$k++]?>" /></td>
		<td>
		
			<select name="add5_<?=$j++;?>" class="i_normal">
				<option value="1" <?if($add5[$k]=='1'):?>selected<?endif?>>1박</option>
				<option value="2" <?if($add5[$k]=='2'):?>selected<?endif?>>2박</option>
				<option value="3" <?if($add5[$k]=='3'):?>selected<?endif?>>3박</option>
				<option value="4" <?if($add5[$k]=='4'):?>selected<?endif?>>4박</option>
				<option value="5" <?if($add5[$k]=='5'):?>selected<?endif?>>5박</option>
				<option value="6" <?if($add5[$k]=='6'):?>selected<?endif?>>6박</option>
				<option value="7" <?if($add5[$k]=='7'):?>selected<?endif?>>7박</option>
				<option value="8" <?if($add5[$k]=='8'):?>selected<?endif?>>8박</option>
				<option value="9" <?if($add5[$k]=='9'):?>selected<?endif?>>9박</option>
				<option value="10" <?if($add5[$k]=='10'):?>selected<?endif?>>10박</option>
				<option value="11" <?if($add5[$k]=='11'):?>selected<?endif?>>11박</option>
				<option value="12" <?if($add5[$k]=='12'):?>selected<?endif?>>12박</option>
				<option value="13" <?if($add5[$k]=='13'):?>selected<?endif?>>13박</option>
				<option value="14" <?if($add5[$k]=='14'):?>selected<?endif?>>14박</option>
				<option value="15" <?if($add5[$k]=='15'):?>selected<?endif?>>15박</option>
				<option value="16" <?if($add5[$k]=='16'):?>selected<?endif?>>16박</option>
				<option value="17" <?if($add5[$k]=='17'):?>selected<?endif?>>17박</option>
				<option value="18" <?if($add5[$k]=='18'):?>selected<?endif?>>18박</option>
				<option value="19" <?if($add5[$k]=='19'):?>selected<?endif?>>19박</option>
				<option value="20" <?if($add5[$k++]=='20'):?>selected<?endif?>>20박</option>
			</select>
			
		
		</td>
		<td>
			<select name="add5_<?=$j++;?>" class="i_normal">
				<option value="NONE" <?if($add8[$k]=='NONE'):?>selected<?endif?>>NONE</option>
				<option value="BB" <?if($add5[$k]=='BB'):?>selected<?endif?>>BB</option>
				<option value="HB" <?if($add5[$k]=='HB'):?>selected<?endif?>>HB</option>
				<option value="FB" <?if($add5[$k]=='FB'):?>selected<?endif?>>FB</option>
				<option value="AI" <?if($add5[$k++]=='AI'):?>selected<?endif?>>AI</option>
			</select>
		</td>
		<td><input type="text" name="add5_<?=$j++;?>" class="i_normal" value="<?=$add5[$k++]?>" /></td>
		<td><input type="text" name="add5_<?=$j++;?>" class="i_normal" value="<?=$add5[$k++]?>" /></td>
		<td><input type="text" name="add5_<?=$j++;?>" class="i_normal_2" value="<?=$add5[$k++]?>" /><?if($i!=9):?><input type="button" value="+" onclick="showType('room<?=$i+1?>','btnRoom<?=$i?>');" id="btnRoom<?=$i?>" <?if($add5[$k]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>
<?endfor?>





<!--작업자리-->


	<tr>
		<td colspan="9" style="border:0;height:50px">&nbsp;</td>
	</tr>

	<tr class="sec2_start">
		<td colspan="9" style="border:solid 1px #888;height:30px;background:#ddd;text-align:center;">추 가 정 보 ▼</td>
	</tr>



	<tr>
		<td colspan="9" style="border:1;height:50px">


	<div class="editbox" >
		<?php if(!$g['mobile']&&$d['theme']['edit_html']<=$my['level']):?>
		<div class="iconbox">
			<?php if($d['theme']['perm_photo'] <= $my['level'] && false):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=photo&gparam=upfilesValue|upfilesFrame|editFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_photo.gif" alt="" />사진</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<?php if($d['theme']['perm_upload'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=file&gparam=upfilesValue|upfilesFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_xfile.gif" alt="" />파일</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?><!--
			<a href="#." onclick="ToolCheck('layout');">레이아웃</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('table');">테이블</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('box');">박스</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('char');">특수문자</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('link');">링크</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />

			<a href="#." onclick="ToolCheck('icon');">아이콘</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('flash');">플래쉬</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('movie');">동영상</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('html');">HTML</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />-->
			<a href="#." onclick="frames.editFrame.ToolboxShowHide(0);" /><img src="<?php echo $g['img_core']?>/_public/ico_edit.gif" alt="" />편집</a>
		</div>
		<?php endif?>

		<div>
		<input type="hidden" name="html" id="editFrameHtml" value="<?php echo $d['theme']['edit_html']>$my['level']?'TEXT':($R['html']?$R['html']:'HTML')?>" />
		<input type="hidden" name="content" id="editFrameContent" value="<?php echo htmlspecialchars($R['content'])?>" />
		<iframe name="editFrame" id="editFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="100px" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
		
		<?php if($d['theme']['perm_upload']<=$my['level']||$d['theme']['perm_photo']<=$my['level']):?>
		<div>
		<iframe name="upfilesFrame" id="upfilesFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;mod=list&amp;gparam=upfilesValue|editFrame&amp;code=<?php echo $reply=='Y'?'':$R['upload']?>" width="100%" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
		<?php endif?>
	</div>
	
		</td>
	</tr>


<!--작업자리 2222222222222222222222222-->


	<tr >  
		<td colspan="8" style="border:0" class="b_title" >■ 항공 예약 정보</td>
		<td colspan="1" class="i_title" style="text-align:right">AirTicket Only<input type="checkbox" name="add7_1" value="Air Ticket Only" <?if($add7[0]=="Air Ticket Only"):?>checked<?endif?> /></td>
	</tr>
	<tr >
		<td colspan="4" class="i_title" bgcolor="#e6e6e6">출 발</td>
		<td colspan="4" class="i_title" bgcolor="#e6e6e6">도 착</td>
		<td rowspan="2" class="i_title" bgcolor="#e6e6e6">Confirm No.</td>
	</tr>
	<tr >
		<td class="i_title">여정</td>
		<td class="i_title">편명</td>
		<td class="i_title">날짜</td>
		<td class="i_title">시간</td>
		<td class="i_title">항공사명</td>
		<td class="i_title">편명</td>
		<td class="i_title">날짜</td>
		<td class="i_title">시간</td>
	</tr>

<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="air<?=$i?>" <?if($i>0&&!$add6[$k]):?>style="display:none"<?endif?>  >
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" name="add6_<?=$j++;?>" class="i_normal_2" value="<?=$add6[$k++]?>" /><?if($i!=9):?><input type="button" value="+" onclick="showType('air<?=$i+1?>','btnAir<?=$i?>');" id="btnAir<?=$i?>" <?if($add6[$k]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>
<?endfor?>


	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >  
		<td colspan="8" style="border:0" class="b_title">■ 리조트정보</td>
		<td class="i_title">Resort Only<input type="checkbox" name="add7_2" value="Resort Only" <?if($add7[1]=="Resort Only"):?>checked<?endif?> /></td>
	</tr>
	<tr >
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">호텔명</td>
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">룸타입</td>
		<td class="i_title" bgcolor="#e6e6e6">박수</td>
		<td class="i_title" bgcolor="#e6e6e6">식사</td>
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">리조트이동수단</td>
		<td class="i_title" bgcolor="#e6e6e6">Confim No.</td>
	</tr>
	
<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="resort<?=$i?>" <?if($i>0&&!$add8[$k]):?>style="display:none"<?endif?>  >
		<td colspan="2"><input type="text" name="add8_<?=$j++;?>" class="i_normal2" value="<?=$add8[$k++]?>" /></td>
		<td colspan="2"><input type="text" name="add8_<?=$j++;?>" class="i_normal2" value="<?=$add8[$k++]?>" /></td>
		<td>
			<select name="add8_<?=$j++;?>" class="i_normal">
				<option value="1" <?if($add8[$k]=='1'):?>selected<?endif?>>1박</option>
				<option value="2" <?if($add8[$k]=='2'):?>selected<?endif?>>2박</option>
				<option value="3" <?if($add8[$k]=='3'):?>selected<?endif?>>3박</option>
				<option value="4" <?if($add8[$k]=='4'):?>selected<?endif?>>4박</option>
				<option value="5" <?if($add8[$k]=='5'):?>selected<?endif?>>5박</option>
				<option value="6" <?if($add8[$k]=='6'):?>selected<?endif?>>6박</option>
				<option value="7" <?if($add8[$k]=='7'):?>selected<?endif?>>7박</option>
				<option value="8" <?if($add8[$k]=='8'):?>selected<?endif?>>8박</option>
				<option value="9" <?if($add8[$k]=='9'):?>selected<?endif?>>9박</option>
				<option value="10" <?if($add8[$k]=='10'):?>selected<?endif?>>10박</option>
				<option value="11" <?if($add8[$k]=='11'):?>selected<?endif?>>11박</option>
				<option value="12" <?if($add8[$k]=='12'):?>selected<?endif?>>12박</option>
				<option value="13" <?if($add8[$k]=='13'):?>selected<?endif?>>13박</option>
				<option value="14" <?if($add8[$k]=='14'):?>selected<?endif?>>14박</option>
				<option value="15" <?if($add8[$k]=='15'):?>selected<?endif?>>15박</option>
				<option value="16" <?if($add8[$k]=='16'):?>selected<?endif?>>16박</option>
				<option value="17" <?if($add8[$k]=='17'):?>selected<?endif?>>17박</option>
				<option value="18" <?if($add8[$k]=='18'):?>selected<?endif?>>18박</option>
				<option value="19" <?if($add8[$k]=='19'):?>selected<?endif?>>19박</option>
				<option value="20" <?if($add8[$k++]=='20'):?>selected<?endif?>>20박</option>
			</select>
		</td>
		<td>
			<select name="add8_<?=$j++;?>" class="i_normal">
				<option value="NONE" <?if($add8[$k]=='NONE'):?>selected<?endif?>>NONE</option>
				<option value="BB" <?if($add8[$k]=='BB'):?>selected<?endif?>>BB</option>
				<option value="HB" <?if($add8[$k]=='HB'):?>selected<?endif?>>HB</option>
				<option value="FB" <?if($add8[$k]=='FB'):?>selected<?endif?>>FB</option>
				<option value="AI" <?if($add8[$k++]=='AI'):?>selected<?endif?>>AI</option>
			</select>
		</td>	
		<td colspan="2">
		
		
			<select name="add8_<?=$j++;?>" class="i_normal2">
				<option value="스피드보트" <?if($add8[$k]=='스피드보트'):?>selected<?endif?>>스피드보트</option>
				<option value="수상비행기" <?if($add8[$k]=='수상비행기'):?>selected<?endif?>>수상비행기</option>
				<option value="국내선" <?if($add8[$k]=='국내선'):?>selected<?endif?>>국내선</option>
				<option value="국내선+스피드보트" <?if($add8[$k]=='국내선+스피드보트'):?>selected<?endif?>>국내선+스피드보트</option>
				<option value="전용차량" <?if($add8[$k]=='전용차량'):?>selected<?endif?>>전용차량</option>
				<option value="개별이동" <?if($add8[$k]=='개별이동'):?>selected<?endif?>>개별이동</option>
				<option value="기타" <?if($add8[$k++]=='기타'):?>selected<?endif?>>기타</option>
			</select>
			

		</td>
		<td><input type="text" name="add8_<?=$j++;?>" class="i_normal_2" value="<?=$add8[$k++]?>" /><?if($i!=9):?><input type="button" value="+" onclick="showType('resort<?=$i+1?>','btnResort<?=$i?>');" id="btnResort<?=$i?>" <?if($add8[$k]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>
<?endfor?>

	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >
		<td colspan="3" style="border:0" class="b_title">■ 여행경비내역</td>
		<td class="i_title">최종환율Rate</td>
		<td><input type="text" name="add9_1" class="i_normal" value="1100<?//=$add9[0]?>" onblur="totalPrice();" ></td>
		<td class="i_title">달러적용<input type="checkbox" name="add7_3" value="달러적용" <?if($add7[2]=="달러적용"):?>checked<?endif?> onclick="dollorcheck(this);totalPrice();" /></td>
		<td><input type="text" name="add9_2" class="i_normal" value="<?=$add9[1]?>" style="display:none"></td>
		<td class="i_title">총 비용(원)</td>
		<td><input type="text" name="add9_3" class="i_normal" value="<?=$add9[2]?>" readonly="readonly"></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">고객명</td>
		<td class="i_title" bgcolor="#e6e6e6">항공 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">리조트 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금(항공)</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금(리조트)<span id="add9_2"></span></td>
		<td class="i_title" bgcolor="#e6e6e6">경유지비용</td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용1</td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용2</td>
		<td class="i_title" bgcolor="#e6e6e6">비 고</td>
	</tr>

<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="cost<?=$i?>" <?if($i>0&&!$add10[$k]):?>style="display:none"<?endif?>  >
		<td><input type="text" name="add10_<?=$j++;?>" id="cpyName<?=$i?>" class="i_normal" value="<?=$add10[$k++]?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" id="acost<?=$i?>" <?if($i==0):?>onblur="costCheck();totalPrice(this);"<?else:?> onblur="totalPrice(this);" <?endif?> class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" id="rcost<?=$i?>" <?if($i==0):?>onblur="costCheck();totalPrice(this);"<?else:?> onblur="totalPrice(this);" <?endif?> class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" id="a2cost<?=$i?>" <?if($i==0):?>onblur="costCheck2();totalPrice(this);"<?else:?> onblur="totalPrice(this);" <?endif?> class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" id="r2cost<?=$i?>" <?if($i==0):?>onblur="costCheck2();totalPrice(this);"<?else:?> onblur="totalPrice(this);" <?endif?> class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" onblur="totalPrice(this);" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" onblur="totalPrice(this);"  /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" onblur="totalPrice(this);"  /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal_2" value="<?=($add10[$k++])?>" onblur="totalPrice(this);"  /><?if($i!=9):?><input type="button" value="+" onclick="showType('cost<?=$i+1?>','btnCost<?=$i?>');" id="btnCost<?=$i?>" <?if($add10[$k]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>
<?endfor?>

	<tr >
		<td class="i_title" bgcolor="#e6e6e6">T/L</td>
		<td><input type="text" name="add11_1" class="i_normal" id="datepicker6"value="<?=$add11[0]?>" ></td>
		<td><input type="text" name="add11_2" class="i_normal" id="datepicker7" value="<?=$add11[1]?>"></td>
		<td><input type="text" name="add11_3" class="i_normal" id="datepicker8" value="<?=$add11[2]?>"></td>
		<td><input type="text" name="add11_4" class="i_normal" id="datepicker9" value="<?=$add11[3]?>"></td>
		<td><input type="text" name="add11_5" class="i_normal" id="datepicker10" value="<?=$add11[4]?>"></td>
		<td><input type="text" name="add11_6" class="i_normal" value="<?=$add11[5]?>"></td>
		<td><input type="text" name="add11_7" class="i_normal" value="<?=$add11[6]?>"></td>
		<td><input type="text" name="add11_8" class="i_normal" value="<?=$add11[7]?>"></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">입금일</td>
		<td><input type="text" name="add11_9" class="i_normal" id="datepicker11" value="<?=$add11[8]?>"></td>
		<td><input type="text" name="add11_10" class="i_normal" id="datepicker12" value="<?=$add11[9]?>"></td>
		<td><input type="text" name="add11_11" class="i_normal" id="datepicker13" value="<?=$add11[10]?>"></td>
		<td><input type="text" name="add11_12" class="i_normal" id="datepicker14" value="<?=$add11[11]?>"></td>
		<td><input type="text" name="add11_13" class="i_normal" id="datepicker15" value="<?=$add11[12]?>"></td>
		<td><input type="text" name="add11_14" class="i_normal" value="<?=$add11[13]?>"></td>
		<td><input type="text" name="add11_15" class="i_normal" value="<?=$add11[14]?>"></td>
		<td><input type="text" name="add11_16" class="i_normal" value="<?=$add11[15]?>"></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">결제수단</td>
		<td><select name="add11_17">
				<option value="현금" <?if($add11[16]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[16]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[16]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[16]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_18">
				<option value="현금" <?if($add11[17]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[17]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[17]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[17]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_19">
				<option value="현금" <?if($add11[18]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[18]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[18]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[18]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_20">
				<option value="현금" <?if($add11[19]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[19]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[19]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[19]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_21">
				<option value="현금" <?if($add11[20]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[20]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[20]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[20]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_22">
				<option value="현금" <?if($add11[21]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[21]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[21]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[21]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_23">
				<option value="현금" <?if($add11[22]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[22]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[22]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[22]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_24">
				<option value="현금" <?if($add11[23]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[23]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[23]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[23]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
	</tr>

</table>


<!--작업자리 2222222222222222222222222-->






		</td>
		<?php if(!$my['id']):?>
		<tr>
		<td class="td1">작성자명</td>
		<td class="td2">
			<input size="20" type="text" name="name" value="<?php echo $R['name']?>" class="input subject" />
		</td>
		</tr>
		<?php if(!$R['uid']||$reply=='Y'):?>
		<tr>
		<td class="td1">비밀번호</td>
		<td class="td2">
			<input size="20" type="password" name="pw" value="<?php echo $R['pw']?>" class="input subject" />
			<?php if($R['hidden']&&$reply=='Y'):?>
			<div class="guide">
			<img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" />
			비밀답변은 비번을 수정하지 않아야 원게시자가 열람할 수 있습니다.
			</div>
			<?php endif?>
		</td>
		</tr>
		<?php endif?>
		<?php endif?>



	</table>


	<table style="display:none">
		<?php if($d['theme']['show_wtag']):?>
		<tr>
		<td class="td1">검색태그</td>
		<td class="td2">
			<input size="80" type="text" name="tag" value="<?php echo $R['tag']?>" class="input subject" />
			<img src="<?php echo $g['img_core']?>/_public/ico_q.gif" alt="도움말" title="도움말" class="hand" onclick="layerShowHide('bbsTag','block','none');" />
			<div id="bbsTag" class="guide hide">
			<img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" />
			이 게시물을 가장 잘 표현할 수 있는 단어를 콤마(,)로 구분해서 입력해 주세요.
			</div>			
		</td>
		</tr>
		<?php endif?>

		<?php if($d['theme']['show_trackback']):?>
		<tr>
		<td class="td1">엮을주소</td>
		<td class="td2">
			<input size="80" type="text" name="trackback" value="" class="input subject" />
			<img src="<?php echo $g['img_core']?>/_public/ico_q.gif" alt="도움말" title="도움말" class="hand" onclick="layerShowHide('bbsTrackback','block','none');" />
			<div id="bbsTrackback" class="guide hide">
			<img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" />
			이 게시물을 보낼 트랙백주소를 입력해 주세요.
			</div>				
		</td>
		</tr>
		<?php endif?>


		<?php if((!$R['uid']||$reply=='Y')&&is_file($g['path_module'].$d['bbs']['snsconnect'])):?>
		<tr>
		<td class="td1" style="padding-top:18px;">소셜연동</td>
		<td class="td2 shift">
			<br />
			<?php include_once $g['path_module'].$d['bbs']['snsconnect']?> 에도 게시물을 등록합니다.
		</td>
		</tr>
		<?php endif?>

		<tr>
		<td class="td1"></td>
		<td class="td2">
			<div class="after">
			게시물 등록(수정/답변)후
			<input type="radio" name="backtype" id="backtype1" value="list"<?php if(!$_SESSION['bbsback'] || $_SESSION['bbsback']=='list'):?> checked="checked"<?php endif?> /><label for="backtype1">목록으로 이동</label>
			<input type="radio" name="backtype" id="backtype2" value="view"<?php if($_SESSION['bbsback']=='view'):?> checked="checked"<?php endif?> /><label for="backtype2">본문으로 이동</label>
			<input type="radio" name="backtype" id="backtype3" value="now"<?php if($_SESSION['bbsback']=='now'):?> checked="checked"<?php endif?> /><label for="backtype3">이 화면 유지</label>
			</div>
		</td>
		</tr>
	</table>

	<div class="bottombox">
		<input type="button" value="취소" class="btngray" onclick="cancelCheck();" />
		<input type="submit" value="확인" class="btnblue" />
	</div>

	</form>


</div>
