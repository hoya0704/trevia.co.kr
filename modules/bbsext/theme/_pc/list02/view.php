<?php
	## 리스트 URL
	$strListUrl = $_SESSION['LIST_URL'];
	$strListUrl = base64_decode($strListUrl);
	$g['bbs_list'] = $strListUrl;

	## 예약일 설정
	$reservation_date = $R['reservation_date'];
	if(!$reservation_date) $reservation_date = date('Y-n-d');
	
?>
<link rel="stylesheet" href="/lib/jquery.ui.all.css">
<script src="/lib/jquery-1.4.4.js"></script>
<script src="/lib/jquery.ui.core.js"></script>
<script src="/lib/jquery.ui.widget.js"></script>
<script src="/lib/jquery.ui.datepicker.js"></script>
<?
function googl_short_url($long_url) {
	$googl_url = "https://www.googleapis.com/urlshortener/v1/url";
	$post_data = array('longUrl' => $long_url);
	$headers = array('Content-Type:application/json');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $googl_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($post_data));
	$result = curl_exec($ch);
	curl_close($ch);
	//print_r2($result);
	$obj = json_decode($result);
	$short_url = $obj->{'id'};
	return $short_url;
}

?>
<script>
$(function() {
	$( "#datepicker1" ).datepicker();

	// Expand Panel
	$("#open").click(function(){
		$("div#stats").slideDown("slow");
	
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#stats").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});		
		
	// html 페이지에서 'rel=tooltip'이 사용된 곳에 마우스를 가져가면
	$('tr[rel=tooltip]').mouseover(function(e)
		{ 
			var tip = $(this).attr('title');
			// 브라우져에서 제공하는 기본 툴 팁을 끈다        
			// css와 연동하기 위해 html 태그를 추가해줌        
			$('#bbslist').append('<div id="tooltip"><div class="tipBody">' + tip + '</div></div>');
		}).mousemove(function(e)   
		{ 
			//마우스가 움직일 때 툴 팁이 따라 다니도록 위치값 업데이트 
			$('#tooltip').css('top', e.pageY + 10 );
			$('#tooltip').css('left', e.pageX + 10 ); 
		}).mouseout(function()
		{ 
			//위에서 껐던 브라우져에서 제공하는 기본 툴 팁을 복원 
			$('#bbslist').children('div#tooltip').remove(); 
		});

});
</script>
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
	$add14 = explode("||", $R[add14]);	
	$add15 = explode("||", $R[add15]);	
	$add16 = explode("||", $R[add16]);	
	$add29 = explode("||", $R[add29]);	
	$add30 = explode("||", $R[add30]);	
	$adddata = explode("||", $R[adddata]);	
	$reservation_data = $R[reservation_data];

$qry1 = "select * from rb_bbsext_data where (site = '2' and add3 like '%".$add3[4]."%' or add3 like '%".$add3[5]."%') and uid != '$R[uid]' and display='1' ";
$rlt1 = mysql_query($qry1);
$cnt1 = mysql_num_rows($rlt1);
$sameCheck = false;
if($cnt1>0) {
	$sameCheck = true;
}
?>

<div id="bbsview" >

	<div class="viewbox">


		<div class="info">
			<div class="xleft">
				<span class="han"><?php echo $R['name']?></span> <span class="split">|</span> 
				<?php echo getDateFormat($R['d_regis'],$d['theme']['date_viewf'])?> <span class="split">|</span> 
				<span class="han">조회</span> <span class="num"><?php echo $R['hit']?></span> 
				<?php if($d['theme']['show_score1']):?><span class="split">|</span> <span class="han">공감</span> <span class="num"><?php echo $R['score1']?></span> <?php endif?>
				<?php if($d['theme']['show_score2']):?><span class="split">|</span> <span class="han">비공감</span> <span class="num"><?php echo $R['score2']?></span> <?php endif?>
			</div>
			<div class="xright">
				<ul>
				<?php if($d['theme']['use_singo']):?>
				<li class="g"><a href="<?php echo $g['bbs_action']?>singo&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 신고하시겠습니까?');"><img src="<?php echo $g['img_core']?>/_public/b_cop.gif" alt="신고" title="신고" />신고</a></li>
				<?php endif?>
				<?php if($d['theme']['use_print']):?>
				<li class="g"><a href="javascript:printWindow('<?php echo $g['bbs_print'].$R['uid']?>');"><img src="<?php echo $g['img_core']?>/_public/b_print.gif" alt="인쇄" title="인쇄" />인쇄</a></li>
				<?php endif?>
				<?php if($d['theme']['use_scrap']):?>
				<li class="g"><a href="<?php echo $g['bbs_action']?>scrap&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return isLogin();"><img src="<?php echo $g['img_core']?>/_public/b_scrap.gif" alt="스크랩" title="스크랩" />스크랩</a></li>
				<?php endif?>
				<?php if($d['theme']['use_font']):?>
				<li><div id="fontface"></div><img src="<?php echo $g['img_core']?>/_public/b_font.gif" alt="글꼴" title="글꼴" class="hand" onclick="fontFace('vContent','fontface');" /></li>
				<li><img src="<?php echo $g['img_core']?>/_public/b_plus.gif" alt="확대" title="확대" class="hand" onclick="fontResize('vContent','+');"/></li>
				<li><img src="<?php echo $g['img_core']?>/_public/b_minus.gif" alt="축소" title="축소" class="hand" onclick="fontResize('vContent','-');" /></li>
				<?php endif?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>


		<div id="vContent" class="content">
<!--작업자리-->







<style>
#ttid td {border:solid 1px #999;height:25px;padding:0px 5px;}
#ttid_1 td {border:solid 1px #999;height:25px;}
.b_title {font-weight:bold;font-size:14px;color:#114411;}
.txt1 {color:#555;text-align:center;}
.txt2 {color:#555;}

.i_normal {border:solid 1px #ccc;width:120px;}
.i_normal_2 {border:solid 1px #ccc;width:90px;}

.i_normal2 {border:solid 1px #ccc;width:250px;}
.i_normal2_2 {border:solid 1px #ccc;width:220px;}
.i_normal3 {border:solid 1px #ccc;width:527px;}
.i_title {text-align:center;font-weight:bold;}
</style>

	<div class="bottom">
		<span class="btn00"><a href="<?php echo $g['bbs_modify'].$R['uid']?>">수정</a></span>
<!--	<?php if($d['theme']['use_reply']):?><span class="btn00"><a href="<?php echo $g['bbs_reply'].$R['uid']?>">답변</a></span><?php endif?>-->
		<?php if($my['admin']):?>
		<span class="btn00"><a href="<?php echo $g['bbs_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 삭제하시겠습니까?');">삭제</a></span>
		<?php if($my['admin']):?>
		<span class="btn00"><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=admin&module=<?php echo $m?>&front=movecopy&type=multi_move&postuid=<?php echo $R['uid']?>');">이동</a></span>
		<span class="btn00"><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=admin&module=<?php echo $m?>&front=movecopy&type=multi_copy&postuid=<?php echo $R['uid']?>');">복사</a></span>
		<?php endif?>
		<?php endif?>
		<span class="btn00"><a href="<?php echo $g['bbs_list']?>">목록으로</a></span>
	</div>
<table width="1200" cellpadding="0" cellspacing="0" id="ttid"  style="border-collapse:collapse;word-break:break-all; ">
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
		<td class="txt1"><?=$R['category']?>
		<? 
			$m_sql1 = mysql_query("SELECT * FROM rb_extra where puid = '$R[uid]' ");
			$row_count = mysql_num_rows($m_sql1);
			if( $R['category'] == "견적발송" ) { ?>
			(<?=$row_count?>)
		<? } ?>
		<?
			$m_sql1 = mysql_query("SELECT * FROM rb_contract_data where puid = '$R[uid]' ");
			$row_count = mysql_num_rows($m_sql1);
			if( $R['category'] == "계약서발송" ) { ?>
			(<?=$row_count?>)
		<? } ?>
		<?
			$m_sql1 = mysql_query("SELECT * FROM rb_contract_data where puid = '$R[uid]' ");
			$row_count = mysql_num_rows($m_sql1);
			if( $R['category'] == "계약서재발송" ) { ?>
			(<?=$row_count?>)
		<? } ?>
		</td>
		<td class="txt1"><?=$add1[0]?></td>
		<td class="txt1"><?=$add1[1]?></td>
		<td class="txt1"><?=$add1[2]?></td>
		<td class="txt1"><?=$add1[3]?></td>
		<td class="txt1"><?=$add1[4]?></td>
		<td class="txt1"><?=$add1[5]?></td>
		<td class="txt1"><?=$add1[6]?></td>
		<td class="txt1"><?=$add1[7]?></td>
	</tr>
	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">담당자</td>
		<td colspan="2" class="txt2">
		<?if(!$add2[9]):?><?php echo $my[nic]?><?else:?><?php echo $add2[9]?><?endif?>
		</td>									 
		<td class="i_title" bgcolor="#e6e6e6">접수방법</td>
		<td colspan="2" class="txt2"><?=$add2[0]?></td>									 
		<td class="i_title" bgcolor="#e6e6e6">견적요청일</td>
		<td colspan="2" class="txt2"><?=$add2[1]?></td>									 
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">여행지역</td>
		<td class="txt2"><?=$add2[2]?></td>	
		<td class="txt2"><?=$add2[3]?></td>				 
		<td class="i_title" bgcolor="#e6e6e6">여행종류</td>
		<td colspan="2" class="txt2"><?=$add2[4]?></td>									 
		<td class="i_title" bgcolor="#e6e6e6">여행기간</td>
		<td colspan="2" class="txt2"><?=$add2[5]?>박 <?=$add2[10]?>일</td>									 
	</tr>
	<tr>
		<?
			$day = array("일", "월", "화", "수", "목", "금", "토");
		?>
		<td class="i_title" bgcolor="#e6e6e6">예식일</td>
		<td colspan="2" class="txt2"><?=$add2[6]." (".$day[date("w",strtotime($add2[6]))].")"?></td>									 
		<td class="i_title" bgcolor="#e6e6e6">출발일</td>
		<td colspan="2" class="txt2"><?=$add2[7]." (".$day[date("w",strtotime($add2[7]))].")"?></td>	  
		<td class="i_title" bgcolor="#e6e6e6">도착일</td>
		<td colspan="2" class="txt2"><?=$add2[8]." (".$day[date("w",strtotime($add2[8]))].")"?></td>									 
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
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">전화번호</td>
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">이메일</td>
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">주민번호</td>
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">비자유무</td>
	</tr>	
<?$j=1;?>
<?$k=0;?>
<?$l=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="cus<?=$i?>" <?if($i>0&&!$add3[$k+1]):?>style="display:none"<?endif?> >
		<td class="i_title"><?=$add3[$k++]?></td>
		<td class="txt2"><?=$add3[$k++]?></td>
		<td class="txt2" colspan="2"><?=$add3[$k++]?></td>             
		<td class="txt2"><?=$add3[$k++]?></td>
		<td class="txt2" colspan="1"><?=$add3[$k++]?></td>
		<td class="txt2" colspan="1"><?=$add3[$k++]?></td>
		<td class="txt2" colspan="1"><?=$add29[$l++]?></td>
		<td class="txt2" colspan="1"><?=$add29[$l++]?></td>
	</tr>		
<?endfor?>		

	<tr>
		<td class="i_title" bgcolor="#e6e6e6">주소</td>
		<td colspan="8"><?=$add4[0]?></td>
		<!--
		<td colspan="3"><input type="checkbox" name="add4_2" value="견적발송" <?if($add4[1]=="견적발송"):?>checked<?endif?> disabled />견적발송 <input type="checkbox" name="add4_3" value="APIS접수" <?if($add4[2]=="APIS접수"):?>checked<?endif?> disabled />APIS접수 <input type="checkbox" name="add4_4" value="우편물발송" <?if($add4[3]=="우편물발송"):?>checked<?endif?> disabled />우편물발송</td>
		<td class="txt2">SMS발송(준비중)</td>
		-->
	</tr>
	<?php
		$infoSite = getDbData($table['s_site'],"id='".$r."'","title");
		$siteTitle = $infoSite[0];

		if($siteTitle != "하이몰디브") $siteTitle = "트레비아";

		$qry2 = "select * from rb_s_mbrid where id = '" . $add3[5] . "'";
//		$rlt2 = mysql_query($qry2);
		$R2 = mysql_fetch_array($qry2);


	?>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">SMS 발송기록</td>
		<td colspan="6" rowspan="1">
			<iframe id="smshistory" name="smshistory" src="/modules/bbsext/theme/_pc/list02/sms_history.php?receiver=<?=$add3[4]?>" width="100%" height="170" ></iframe>
		
		
		
		</td>
<form name="smsForm" action="/modules/bbsext/theme/_pc/list02/sms_ajax.php" method="post" onsubmit="return preSubmit()" >
<input type="hidden" name="xms" id="xms" value="sms" />
<input type="hidden" name="myuid" id="myuid" value="<?=$my['uid']?>" />
<input type="hidden" name="memberuid" id="memberuid" value="<?=$my['uid']?>" />
<input type="hidden" name="uid" id="uid" value="<?=$uid?>" />
<input type="hidden" name="r" id="uid" value="<?=$r?>" />
<input type="hidden" name="m" id="uid" value="<?=$m?>" />
<input type="hidden" name="bid" id="uid" value="<?=$bid?>" />
<input type="hidden" name="receiver" id="receiver" value="<?=$add3[4]?>" />

		<td colspan="1" rowspan="1" style="border-right-style:none">
			<div id="smsBody">
				<select name="textPreset" onchange="presetChange(this)">
					<option value="" selected="selected">=== 선택하세요 ===</option>
					<option value="[<?php echo $siteTitle?>]고객님의 여행견적서 요청이 접수되었으며 24시간 이내 견적서 발송예정 입니다." >문자최초발송</option>
					<option value="[<?php echo $siteTitle?>]요청하신 여행견적서 이메일로 발송하였으니 확인 후 연락바랍니다." >견적서발송</option>
					<option value="[<?php echo $siteTitle?>]고객님의 여행계약서가 이메일로 발송되었으니 확인 후 회신 부탁드립니다." >계약서발송</option>
					<option value="[<?php echo $siteTitle?>]요청하신 해당항공편의 예약이 확정되었음을 알려드립니다." >항공예약완료</option>
					<option value="[<?php echo $siteTitle?>]요청하신 해당리조트의 예약이 확정되었음을 알려드립니다." >리조트예약완료 </option>
					<option value="[<?php echo $siteTitle?>]고객님의 항공권이티켓 및 여행자보험서류를 발송하였으니 일정, 성함을 확인하시고 보험회신 및 좌석지정을 확인바랍니다. 미주칸쿤 070-4324-4400" >항공권발권완료 </option>
					<option value="[<?php echo $siteTitle?>]잘 지내셨나요? 고객님의 여행잔금 안내드립니다. 9월10일까지 입금하실 총 잔금 \3,000,000원 / 신한은행 140-009-270166 주)트레비아 입니다." >여행잔금안내 </option>
					<option value="[<?php echo $siteTitle?>]고객님의 여행관련 우편물이 택배 발송되었으며, 관련서류 중 일부를 등록된 메일로 발송하였으니 확인 바랍니다." >우편물발송 </option>
					<option value="[<?php echo $siteTitle?>]칸쿤웨딩 컴펌 되었습니다. 날짜: 2015년 00월 00일, 시간: 00시, 컨펌: 00000000  현지 도착후 해당 플래너와 스케줄 체크하세요. 미주칸쿤 070-4324-4400">비치웨딩컨펌</option>
					<option value="[<?php echo $siteTitle?>][포토북 사은쿠폰안내] 
쿠폰번호 : xxx-xx-xxx-xxxx 
기간 : 2014년 12월31일 까지
[포토북 쿠폰 등록방법] 
- 포토몬 사이트 접속 > 회원가입 > 내정보> 포토몬상품권등록 
[포토몬 웹사이트] www.photomon.com (네이버 포토몬검색) 
** 본 포토북 쿠폰은 트레비아에서 제공하는 사은품 입니다.**">포토북 사은쿠폰안내</option>
					<option value="[<?php echo $siteTitle?>]안녕하세요~ 아이웨딩 통하여 연락드리는 허니문여행사입니다^^ 통화가능 하실 때 연락주시면 상담 후 견적 발송해드리겠습니다.^^ 감사합니다.
					
					전수정플래너
					070-4324-4517">아이웨딩SMS</option>
					<option value="[<?php echo $siteTitle?>]고객님 안녕하세요? 트레비아입니다.받으실 사은품 선택하셔서 메일로 남겨주시면 출발 한달전 배송해드립니다. 감사합니다.">사은품배송관련</option>
					<option value="[<?php echo $siteTitle?>]
고객님~ 안녕하세요?
몰디브여행사입니다.
메일로 여행자보험관련서류 넣어드렸습니다.^^
확인 후 팩스 또는 이메일로 부탁드립니다.

감사합니다.">여행자보험관련서류안내</option>
					<option value="[<?php echo $siteTitle?>]요청하신 해당리조트의 예약이 확정되었음을 알려드립니다.
					컨펌번호:">컨펌번호:</option>
					<option value="[<?php echo $siteTitle?>]고객님안녕하세요?
메일로 바우처 및 여행안내서
보내드렸습니다.
메일확인부탁드리구요^^
준비하시다가 궁금한 사항은
언제든지연락주십시오~">바우처발송</option>
				</select>
				<textarea name="smsText" style="height:140px;width:100%" onkeydown="return OntextCheck(this)" onchange="return OntextCheck(this)"></textarea>
				<span id="totalBytes">0 / 80 bytes</span>
				<span id="issms">SMS</span>
			</div>		
		</td>
		<td colspan="1" rowspan="1">
			<div id="smsBody">
				문자 수신 번호<br />
				<table height="100px" width="100%">
					<tr><td valign="top">
					<? $k=0; ?>
					<? for($i=0;$i<10;$i++):?>
						<?if($i>0&&!$add3[$k+4]):?>
						<?else:?>
							<input type="text" value="<?=$add3[$k+4]?>" name="send_tel_<?=$i?>" style="width:90px;border:0; border-bottom-style:none;" />
							<input type="checkbox" name="check_tel_<?=$i?>" <? if( $i == 0 ) { ?>checked<? } ?> />
						<?endif?>
						<? $k = $k + 6; ?>
					<?endfor?>
					</td></tr>
				</table>
				문자 발신 번호<br />
				<input type="text" name="custom_number" value="02-1644-6681" class="addInput" />
				<input type="submit" value="전송" class="submit" />
			</div>		
		</td>
</form>
	</tr>
<?if($sameCheck):?>
	<tr>
		<td colspan="9" style="border:0;color:red;">&nbsp;※ 동일 전화번호 혹은 이메일로 기존 상담일지가 존재합니다. (검색창에서 검색바람)</td>
	</tr>
<?endif?>
	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="8" style="height:60px;border:0">
		<input type="button" value="상담종료" onclick="javascript:location.href='/modules/bbsext/theme/_pc/list02/view_process.php?category=<?=urlencode(iconv('utf-8','euc-kr','상담종료'))?>&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>'" />
		<input type="button" value="가망고객" onclick="javascript:location.href='/modules/bbsext/theme/_pc/list02/view_process.php?category=<?=urlencode(iconv('utf-8','euc-kr','가망고객'))?>&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>'" />
		<!-- input type="button" value="상담보류" onclick="javascript:location.href='/modules/bbsext/theme/_pc/list02/view_process.php?category=<?=urlencode(iconv('utf-8','euc-kr','상담보류'))?>&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>'" / //-->
		<input type="button" value="견적보류" onclick="javascript:location.href='/modules/bbsext/theme/_pc/list02/view_process.php?category=<?=urlencode(iconv('utf-8','euc-kr','견적보류'))?>&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>'" />
		<span class="btn00">예약일 : <input type="text" id="datepicker1" name="reservation_date" class="i_normal" value="<?php echo $reservation_date;?>"  onChange="dateCal( this.value )" /></span>
		예약사유 : <input type="text" id="reservation_data" name="reservation_data" value="<?=$reservation_data ?>" class="i_normal" /> <input type="button" value="예약작업" onclick="javascript:location.href='/modules/bbsext/theme/_pc/list02/view_process.php?mode=reservationModify&category=&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>&reservation_date='+document.getElementById('datepicker1').value+'&reservation_data='+document.getElementById('reservation_data').value" />
		<input type="button" value="작업완료" onclick="javascript:location.href='/modules/bbsext/theme/_pc/list02/view_process.php?category=&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>&reservation_date=&reservation_data='" style="color:black;background-color:skyblue;border-color:blue;border-width:1px;height:20px" />
		</td>
		<td style="height:60px;border:0;" align="right">

		<span class="btn00" ><a href="<?php echo $g['bbs_list']?>&mod=final3&puid=<?php echo $R['uid']?>&memuid=<?php echo $my['uid']?>&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&uid=<?=$uid?>&ins=true" id="bbsext_new" target="_blank" onclick="document.getelementById('bbsext_new').target = contract + kkk++">견적서 발송</a></span>
		</td>
	</tr>
	<tr>  
		<td colspan="9" style="border:0" class="b_title">■ 요청 견적 내역</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">상태</td>
		<td class="i_title" bgcolor="#e6e6e6">견적일</td>
		<td colspan="3" class="i_title" bgcolor="#e6e6e6">견적서 제목</td>
		<td colspan="1" class="i_title" bgcolor="#e6e6e6">리조트명(총갯수)</td>
		<td class="i_title" bgcolor="#e6e6e6">박수</td>
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">항공</td>
	</tr>
<?

$m_sql1 = mysql_query("SELECT * FROM rb_extra where puid = '$R[uid]' ");

$list_count = 0;
$row_count = mysql_num_rows($m_sql1);

while($m_rs1 = mysql_fetch_array($m_sql1)):
$list_count++;
$f1 = explode("||", $m_rs1[info]);
$m1 = explode("||", $m_rs1[resort1_memo]);
$m2 = explode("||", $m_rs1[resort2_memo]);
$m3 = explode("||", $m_rs1[resort3_memo]);
$m4 = explode("||", $m_rs1[resort4_memo]);
$m5 = explode("||", $m_rs1[resort5_memo]);

$total = 0;
for($i=1;$i<=5;$i++) {
	if(	$m_rs1['resort'.$i] >0 ) {
		$total++; 
	}

}

/*항공*/
$m_sqla = mysql_query("SELECT subject FROM rb_bbsext_data where uid='$m_rs1[air1]' ");
$air = @mysql_result ($m_sqla, 0);


?>
	<tr>
		<td class="txt2" align="center" ><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$m_rs1['status']?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td class="txt2" ><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$m_rs1[date]?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td colspan="3" class="txt2" >
		<? if( $m_rs1['status'] == "작성중" ) { ?>
			<a href="/modules/bbsext/theme/_pc/list02/final3_modify.php?uid=<?php echo $m_rs1['uid']?>&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&_uid=<?=$uid?>&ins=false&admin_add_email=<?=$R[id]?>" target="_black">
		<? } else { ?>
			<a href="/modules/bbsext/theme/_pc/list02/final3_view.php?uid=<?php echo $m_rs1['uid']?>&admin_add_email=<?=$R[id]?>&r=<?=$r?>&m=<?=$m?>&bid=<?=$bid?>&_uid=<?=$uid?>" target="_black">
		<? } ?>
		<? if( $list_count == $row_count ) { ?><font color="blue"><? } ?>
		<?php echo getStrCut($m_rs1[subject],35,'..')?><? if( $list_count == $row_count ) { ?></font><? } ?></a></td>
		<td colspan="1" class="txt2" ><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$m1[0]?>(<?=$total?>)<? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td class="txt2" ><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$f1[5]?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td colspan="2" class="txt2" style="font-size:8pt;"><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$air?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
	</tr>
<?endwhile?>





<!--작업자리-->
	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>


	<tr class="sec2_start">
		<td colspan="9" style="border:solid 1px #888;height:40px;background:#ddd;text-align:center;">추 가 정 보 ▼ <?php if($d['upload']['data']):?><font color="red">첨부된 파일이 있습니다.</font><?endif?></td>
	</tr>


	<tr>
		<td colspan="9"style="border:1;height:150px;padding:5px;" valign="top"><div style="width:1190px;height:100%;overflow-x:scroll"><?php echo getContents($R['content'],$R['html'])?></div>
</td>
	</tr>
			<?php if($d['upload']['data']&&$d['theme']['show_upfile']):?>

	<tr>
		<td colspan="9" style="border:1;padding:5px;" valign="top">		


			<div class="attach">
			<ul>
			<?php foreach($d['upload']['data'] as $_u):?>
			<li>
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;a=download&amp;uid=<?php echo $_u['uid']?>" title="<?php echo $_u['caption']?>"><?php echo $_u['name']?></a>
				<span class="size">(<?php echo getSizeFormat($_u['size'],1)?>)</span>
				<span class="down">(<?php echo number_format($_u['down'])?>)</span>
			</li>
			<?php endforeach?>
			</ul>
			</div>
		</td>
	</tr>


				<?php endif?>





<!--작업자리 2222222222222222222222222-->

	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>  
		<td colspan="9" style="border:0" class="b_title">■ 계약서 발송 내역</td>
	</tr>
	<tr>
		<td colspan="4" class="i_title" bgcolor="#e6e6e6">계약서 제목</td>
		<td colspan="1" class="i_title" bgcolor="#e6e6e6">출발일</td>
		<td class="i_title" bgcolor="#e6e6e6">박수</td>
		<td colspan="1" class="i_title" bgcolor="#e6e6e6">계약서발송일</td>
		<td class="i_title" bgcolor="#e6e6e6">계약서회신일</td>
		<td class="i_title" bgcolor="#e6e6e6">회신아이피</td>
	</tr>
<?

$m_sql1 = mysql_query("SELECT * FROM rb_contract_data where puid = '$R[uid]' ");
$list_count = 0;
$row_count = mysql_num_rows($m_sql1);

while($m_rs1 = mysql_fetch_array($m_sql1)):
$list_count++;
	$name = explode("||", $m_rs1[name]);
	$subject = $m_rs1[subject];
	$period1 = explode("~", $m_rs1[period]);
	$period2 = explode("||", $m_rs1[period]);
	$regist_date = $m_rs1[regist_date];

?>
	<tr>
		<td colspan="4" class="txt2" ><a href="/modules/bbsext/theme/_pc/list02/final_view.php?uid=<?php echo $m_rs1['uid']?>" target="_black"><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$name[0]?>님의 <?php echo getStrCut($subject,35,'..')?><? if( $list_count == $row_count ) { ?></font><? } ?></a></td>
		<td colspan="1" class="txt2" align="center"><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$period1[0]?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td class="txt2" align="center"><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$period2[1]?> <? if( !strstr($period2[1], "박") ) { ?> 박 <? }?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td colspan="1" class="txt2" ><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$regist_date?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td class="txt2" ><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$m_rs1[reply_date]?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
		<td class="txt2" ><? if( $list_count == $row_count ) { ?><font color="blue"><? } ?><?=$m_rs1[ip]?><? if( $list_count == $row_count ) { ?></font><? } ?></td>
	</tr>
<?endwhile?>

	<tr>
		<td colspan="9" style="border:0;height:50px" align="center">
		
		<?if((!$add6[0] || !$add6[1] || !$add6[2] || !$add6[3] || !$add6[4] || !$add6[5] || !$add6[6] || !$add6[7]) && $add7[1]!="Resort Only" ):?>
			<span class="btn00"><a href="javascript:alert('항공 예약 정보가 빠졌습니다.');">계약서 발송</a></span>
		<?elseif((!$add8[0] || !$add8[1] )&& $add7[0]!="Air Ticket Only" ):?>
			<span class="btn00"><a href="javascript:alert('리조트정보가 빠졌습니다.');">계약서 발송</a></span>

		<?elseif( $add7[0]=="Air Ticket Only" && ($add10[1] == 0 || $add10[3] == 0) ) :?>
			<span class="btn00"><a href="javascript:alert('여행경비내역(항공)이 빠졌습니다.');">계약서 발송</a></span>

		<?elseif( $add7[1]=="Resort Only" && ($add10[2] == 0 || $add10[4] == 0) ) :?>
			<span class="btn00"><a href="javascript:alert('여행경비내역(리조트)이 빠졌습니다.');">계약서 발송</a></span>

		<?elseif( ($add10[1] == 0 || $add10[2] == 0 || $add10[3] == 0 || $add10[4] == 0) && $add7[0]!="Air Ticket Only" &&  $add7[1]!="Resort Only"  ) :?>
			<span class="btn00"><a href="javascript:alert('여행경비내역이 빠졌습니다.');">계약서 발송</a></span>

		<?else:?>
		<script>var kkk = 1;</script>
			<span class="btn00"><a href="<?php echo $g['bbs_list']?>&mod=final&puid=<?php echo $R['uid']?>" id="contract_new" target="_blank" onclick="document.getelementById('contract_new').target = contract + kkk++">계약서 발송</a></span>
		<?endif?>
		
		<!--
		발송일 : <span id="nDate"><?php if($R[add12]):?><?php echo $R[add12]?><?php else:?>발송전<?php endif?></span> | <font color="red">계약서회신일자 : <?php echo $R['add13']?></font>
		--></td>
	</tr>

	<tr >  
		<td colspan="8" style="border:0" class="b_title">■ 항공 예약 정보</td>
		<td class="i_title" >Air Ticket Only<input type="checkbox" name="add7_1" value="Air Ticket Only" <?if($add7[0]=="Air Ticket Only"):?>checked<?endif?> disabled /></td>
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
		<td class="i_title">여정</td>
		<td class="i_title">편명</td>
		<td class="i_title">날짜</td>
		<td class="i_title">시간</td>
	</tr>

<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="air<?=$i?>" <?if($i>0&&!$add6[$k]):?>style="display:none"<?endif?>  >
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
		<td class="txt2"><?=$add6[$k++]?></td>
	</tr>
<?endfor?>


	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >  
		<td colspan="8" style="border:0" class="b_title">■ 리조트정보</td>
		<td class="i_title">Resort Only<input type="checkbox" name="add7_2" value="Resort Only" <?if($add7[1]=="Resort Only"):?>checked<?endif?> disabled /></td>
	</tr>
	<tr >
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">호텔명</td>
		<td colspan="1" class="i_title" bgcolor="#e6e6e6">룸타입</td>
		<td class="i_title" bgcolor="#e6e6e6">체크인</td>
		<td class="i_title" bgcolor="#e6e6e6">박수</td>
		<td class="i_title" bgcolor="#e6e6e6">체크아웃</td>
		<td class="i_title" bgcolor="#e6e6e6">식사</td>
		<td colspan="1" class="i_title" bgcolor="#e6e6e6">리조트이동수단</td>
		<td class="i_title" bgcolor="#e6e6e6">Confim No.</td>
	</tr>
	
<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="resort<?=$i?>" <?if($i>0&&!$add8[$k]):?>style="display:none"<?endif?>  >
		<td colspan="2"><?=$add8[$k++]?></td>
		<td colspan="1"><?=$add8[$k++]?></td>
		<td class="txt2" align="center"><?=$adddata[$i];$plus_date=$add8[$k]?></td>
		<td class="txt2" align="center"><?=$add8[$k++];?>박</td>
		<td class="txt2" align="center"><?=$adddata[$i]?date("Y-m-d", strtotime($adddata[$i]." ". $plus_date." day")):''?></td>
		<td class="txt2" align="center"><?=$add8[$k++]?></td>
		<td colspan="1" align="center"><?=$add8[$k++]?></td>
		<td class="txt2"><?=$add8[$k]?><? if ( !empty($add8[$k++]) ) { ?>
			<input type="button" value="바우처" onclick="window.open('/modules/bbsext/theme/_pc/list02/voucher.php?uid=<?=$uid?>&seq=<?=$k-6?>&admin_email=<?=$R[id]?>&admin_name=<?=$R[name]?>')" style="color:white;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" />
		<? } ?>
		</td>
	</tr>
<?endfor?>
<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >  
		<td colspan="9" style="border:0" class="b_title">■ 제공사항 </td>
	</tr>
	<tr >
		<td colspan="9" style="border:0;margin:0;padding:0">
		  <table width="100%">
		  <tr>
			<td rowspan="1" align="center" bgcolor="#E6E6E6" width="135px"><span class="style4">제공사항</span></td>
			<td colspan="6" align="left" bgcolor="#ffffff">&nbsp;
			<?
				for( $i=0; $i<12; $i++ )
				{
					echo $add30[$i];
					if( $add30[$i+1] && $i<11 )
						echo ' , ';
				}
			?>
			</td>
		  </tr>
		  <tr>
			<td height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">기타특전</span></td>
			<td colspan="6" align="left" bgcolor="#ffffff">&nbsp;<?=$add30[12]?></td>
		  </tr>
		  <tr>
			<td height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">비    고</span></td>
			<td colspan="6" align="left" bgcolor="#ffffff">&nbsp;<?=$add30[13]?></td>
		  </tr>
		  </table>
		</td>
	</tr>
	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >  
		<td colspan="9" style="border:0" class="b_title">■ 여행경비내역</td>
	</tr>
	<tr >
		<td align="center" class="txt2"><select name="add_20" style="width:120px" disabled="disabled">
			<option value="달러" <?if($R[add20]=='달러'):?>selected="selected"<?endif?>>달러</option>
			<option value="유로" <?if($R[add20]=='유로'):?>selected="selected"<?endif?>>유로</option>
			</select>
		</td>
		<td class="i_title">적용환율Rate</td>
		<td class="txt2" style="text-align:right"><?=number_format($add9[0])?></td>
		<td class="i_title">외화 총비용</td>
		<td class="txt2" style="text-align:right"><font color="black"><b><?if($R[add20]=='달러'):?>$<?endif?><?if($R[add20]=='유로'):?>€<?endif?>  <?=$add9[1]?></b></font></td>
		<td class="i_title">원화 총비용</td>
		<td class="txt2" style="text-align:right"><font color="blue"><b>￦ <?=number_format($add9[2])?></b></font></td>
		<td class="i_title">총 합계</td>
		<td style="text-align:right"><font color="red"><b>￦ <?=number_format($add9[3])?></b></font></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">고객명</td>
		<td class="i_title" bgcolor="#e6e6e6">항공 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">리조트 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">항공금액 <input type="checkbox" name="add14_1" value="1" <?if($add14[0]=='1'):?>checked="checked"<?endif?> disabled="disabled"> </td>
		<td class="i_title" bgcolor="#e6e6e6">리조트금액 <input type="checkbox" name="add14_2" value="1" <?if($add14[1]=='1'):?>checked="checked"<?endif?> disabled="disabled"></td>
		<td class="i_title" bgcolor="#e6e6e6">경유지비용 <input type="checkbox" name="add14_3" value="1" <?if($add14[2]=='1'):?>checked="checked"<?endif?> disabled="disabled"> </td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용1 <input type="checkbox" name="add14_4" value="1" <?if($add14[3]=='1'):?>checked="checked"<?endif?> disabled="disabled"> </td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용2 <input type="checkbox" name="add14_5" value="1" <?if($add14[4]=='1'):?>checked="checked"<?endif?> disabled="disabled"></td>
		<td class="i_title" bgcolor="#e6e6e6">비고 <!--<input type="checkbox" name="add14_6" value="1" <?if($add14[5]=='1'):?>checked="checked"<?endif?> disabled="disabled">--></td>
	</tr>
	
<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="cost<?=$i?>" <?if($i>0&&!$add10[$k]):?>style="display:none"<?endif?>  >
		<td class="txt2"><?=$add10[$k++]?></td>
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
		<td class="txt2" style="text-align:right;"><?=$add10[$k++]?></td>
	</tr>
<?endfor?>

	<tr >
		<td class="i_title" bgcolor="#e6e6e6">입금예정일</td>
		<td class="txt2"><?=$add11[0]?></td>
		<td class="txt2"><?=$add11[1]?></td>
		<td class="txt2"><?=$add11[2]?></td>
		<td class="txt2"><?=$add11[3]?></td>
		<td class="txt2"><?=$add11[4]?></td>
		<td class="txt2"><?=$add11[5]?></td>
		<td class="txt2"><?=$add11[6]?></td>
		<td class="txt2"><?=$add11[7]?></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">출금예정일</td>
		<td class="txt2"><?=$add11[8]?></td>
		<td class="txt2"><?=$add11[9]?></td>
		<td class="txt2"><?=$add11[10]?></td>
		<td class="txt2"><?=$add11[11]?></td>
		<td class="txt2"><?=$add11[12]?></td>
		<td class="txt2"><?=$add11[13]?></td>
		<td class="txt2"><?=$add11[14]?></td>
		<td class="txt2"><?=$add11[15]?></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">예상정산(수익)</td>
		<td class="txt2" style="text-align:right;"><?=$add11[16]?></td>
		<td class="txt2" style="text-align:right;"><?=$add11[17]?></td>
		<td class="txt2" style="text-align:right;"><?=$add11[18]?></td>
		<td class="txt2" style="text-align:right;"><?=$add11[19]?></td>
		<td class="txt2" style="text-align:right;"><?=$add11[20]?></td>
		<td class="txt2" style="text-align:right;"><?=$add11[21]?></td>
		<td class="txt2" style="text-align:right;"><?=$add11[22]?></td>
		<td class="txt2" style="text-align:right;"><?=$add11[23]?></td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">비고</td>
		<td colspan="8"><?=$add11[24]?></td>
	</tr>

	<tr>
		<td colspan="9" style="border:0;color:black;">&nbsp;※ 금액필드는 빈칸없이 '0원'이라도 입력되어 있어야됩니다.</td>
	</tr>
	<tr>
		<td colspan="9" style="border:0;color:black;">
			<li id="toggle">
				<a id="open" class="open">정산열기▼</a>
				<a id="close" style="display: none;" class="close">정산닫기▲</a>			
			</li>		
		</td>
	</tr>
				
</table>

<div id="stats" style="height:700px;display:none" >
  <table width="100%" style="border-collapse:collapse; " id="ttid_1"  cellpadding="0" cellspacing="0" >
	  <tr>
		<td colspan="12" align="center" bgcolor="#cccccc"><span class="style4"><strong>입금정보(고객)</strong></span></td>
	  </tr>
	  <tr>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금1</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[0]?></td>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금2</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[5]?></td>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금3</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[10]?></td>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금4</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[15]?></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[1]?></td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[6]?></td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[11]?></td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[16]?></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in1"><?=$add16[0]?></span><?=number_format($add15[2])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in2"><?=$add16[1]?></span><?=number_format($add15[7])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in3"><?=$add16[2]?></span><?=number_format($add15[12])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in4"><?=$add16[3]?></span><?=number_format($add15[17])?></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_4">
				<option value="현금" <?if($add15[3]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[3]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[3]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[3]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_5" class="i_normal" value="<?=$add15[4]?>"></td>
		<td>
		  <select name="add15_9">
				<option value="현금" <?if($add15[8]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[8]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[8]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[8]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_10" class="i_normal" value="<?=$add15[9]?>"></td>
		<td>
		  <select name="add15_14">
				<option value="현금" <?if($add15[13]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[13]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[13]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[13]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_15" class="i_normal" value="<?=$add15[14]?>"></td>
		<td>
		  <select name="add15_19">
				<option value="현금" <?if($add15[18]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[8]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[18]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[18]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_20" class="i_normal" value="<?=$add15[19]?>"></td>
	  </tr>
	  <tr></tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금5</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[20]?></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금6</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[25]?></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금7</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[30]?></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금8</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[35]?></td>
	  </tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[21]?></td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[26]?></td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[31]?></td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff"><?=$add15[36]?></td>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in5"><?=$add16[4]?></span><?=number_format($add15[22])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in6"><?=$add16[5]?></span><?=number_format($add15[27])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in7"><?=$add16[6]?></span><?=number_format($add15[32])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in8"><?=$add16[7]?></span><?=number_format($add15[37])?></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_24">
				<option value="현금" <?if($add15[23]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[23]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[23]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[23]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_25" class="i_normal" value="<?=$add15[24]?>"></td>
		<td>
		  <select name="add15_29">
				<option value="현금" <?if($add15[28]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[28]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[28]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[28]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_30" class="i_normal" value="<?=$add15[29]?>"></td>
		<td>
		  <select name="add15_34">
				<option value="현금" <?if($add15[33]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[33]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[33]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[33]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_35" class="i_normal" value="<?=$add15[34]?>"></td>
		<td>
		  <select name="add15_39">
				<option value="현금" <?if($add15[38]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[38]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[38]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[38]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_40" class="i_normal" value="<?=$add15[39]?>"></td>
	  </tr>
	  <tr>
		<td colspan="12" align="center" bgcolor="#cccccc"><span class="style4"><strong>출금정보(고객)</strong></span></td>
	  </tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금1</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_41" class="i_normal" id="datepicker39" value="<?=$add15[40]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금2</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_46" class="i_normal" id="datepicker40" value="<?=$add15[45]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금3</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_51" class="i_normal" id="datepicker41" value="<?=$add15[50]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금4</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_56" class="i_normal" id="datepicker42" value="<?=$add15[55]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_42">
				<option value="계약금" <?if($add15[41]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[41]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[41]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[41]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[41]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[41]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[41]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[41]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[41]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_47">
				<option value="계약금" <?if($add15[46]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[46]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[46]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[46]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[46]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[46]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[46]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[46]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[46]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_52">
				<option value="계약금" <?if($add15[51]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[51]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[51]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[51]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[51]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[51]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[51]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[51]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[51]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_57">
				<option value="계약금" <?if($add15[56]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[56]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[56]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[56]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[6]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[56]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[56]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[56]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[56]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in9"><?=$add16[8]?></span><?=number_format($add15[42])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in10"><?=$add16[9]?></span><?=number_format($add15[47])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in11"><?=$add16[10]?></span><?=number_format($add15[52])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in12"><?=$add16[11]?></span><?=number_format($add15[57])?></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_44">
				<option value="현금" <?if($add15[43]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[43]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[43]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[43]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_45" class="i_normal" value="<?=$add15[44]?>"></td>
		<td>
		  <select name="add15_49">
				<option value="현금" <?if($add15[48]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[48]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[48]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[48]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_50" class="i_normal" value="<?=$add15[49]?>"></td>
		<td>
		  <select name="add15_54">
				<option value="현금" <?if($add15[53]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[53]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[53]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[53]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_55" class="i_normal" value="<?=$add15[54]?>"></td>
		<td>
		  <select name="add15_59">
				<option value="현금" <?if($add15[58]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[58]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[58]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[58]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_60" class="i_normal" value="<?=$add15[59]?>"></td>
	  </tr>
	  <tr></tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금5</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_61" class="i_normal" id="datepicker43" value="<?=$add15[60]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금6</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_66" class="i_normal" id="datepicker44" value="<?=$add15[65]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금7</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_71" class="i_normal" id="datepicker45" value="<?=$add15[70]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금8</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_76" class="i_normal" id="datepicker46" value="<?=$add15[75]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_62">
				<option value="계약금" <?if($add15[61]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[61]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[61]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[61]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[61]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[61]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[61]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[61]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[61]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_67">
				<option value="계약금" <?if($add15[66]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[66]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[66]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[66]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[66]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[66]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[66]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[66]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[66]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_72">
				<option value="계약금" <?if($add15[71]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[71]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[71]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[71]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[71]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[71]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[71]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[71]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[71]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_77">
				<option value="계약금" <?if($add15[76]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[76]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[76]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[76]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[76]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[76]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[76]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[76]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[76]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in13"><?=$add16[12]?></span><?=number_format($add15[62])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in14"><?=$add16[13]?></span><?=number_format($add15[67])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in15"><?=$add16[14]?></span><?=number_format($add15[72])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in16"><?=$add16[15]?></span><?=number_format($add15[77])?></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_64">
				<option value="현금" <?if($add15[63]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[63]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[63]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[63]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_65" class="i_normal" value="<?=$add15[64]?>"></td>
		<td>
		  <select name="add15_69">
				<option value="현금" <?if($add15[68]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[68]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[68]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[68]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_70" class="i_normal" value="<?=$add15[69]?>"></td>
		<td>
		  <select name="add15_74">
				<option value="현금" <?if($add15[73]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[73]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[73]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[73]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_75" class="i_normal" value="<?=$add15[74]?>"></td>
		<td>
		  <select name="add15_79">
				<option value="현금" <?if($add15[78]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[78]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[78]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[78]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_80" class="i_normal" value="<?=$add15[79]?>"></td>
	  </tr>
	  <tr></tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금9</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_81" class="i_normal" id="datepicker47" value="<?=$add15[80]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금10</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_86" class="i_normal" id="datepicker48" value="<?=$add15[85]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금11</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_91" class="i_normal" id="datepicker49" value="<?=$add15[80]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금12</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_96" class="i_normal" id="datepicker50" value="<?=$add15[85]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_82">
				<option value="계약금" <?if($add15[81]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[81]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[81]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[81]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[81]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[81]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[81]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[81]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[81]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_87">
				<option value="계약금" <?if($add15[86]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[86]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[86]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[86]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[86]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[86]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[86]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[86]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[86]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_92">
				<option value="계약금" <?if($add15[91]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[91]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[91]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[91]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[91]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[91]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[91]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[91]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[91]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_97">
				<option value="계약금" <?if($add15[96]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[96]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[96]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[96]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[96]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[96]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[96]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[96]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[96]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in17"><?=$add16[16]?></span><?=number_format($add15[82])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in18"><?=$add16[17]?></span><?=number_format($add15[87])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in19"><?=$add16[18]?></span><?=number_format($add15[92])?></td>
	  	<td align="center" bgcolor="#f0f0f0"></td>
		<td align="left" bgcolor="#ffffff"><span id="in20"><?=$add16[19]?></span><?=number_format($add15[97])?></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_84">
				<option value="현금" <?if($add15[83]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[83]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[83]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[83]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_85" class="i_normal" value="<?=$add15[84]?>"></td>
		<td>
		  <select name="add15_89">
				<option value="현금" <?if($add15[88]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[88]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[88]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[88]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_90" class="i_normal" value="<?=$add15[89]?>"></td>
		<td>
		  <select name="add15_94">
				<option value="현금" <?if($add15[93]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[93]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[93]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[93]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_95" class="i_normal" value="<?=$add15[94]?>"></td>
		<td>
		  <select name="add15_99">
				<option value="현금" <?if($add15[98]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[98]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[98]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[98]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_100" class="i_normal" value="<?=$add15[99]?>"></td>
	  </tr>
<script>
function autocal() {
	var f = document.writeForm;
	var totalW = 0;
	var totalS = 0;
	var temp = 0;
	var j = 0;

	for ( i = 3; i < 40 ; i+=5 )
	{
		j++;
		temp = eval("f.add15_" + i + ".value");
		if( temp == "" ) continue;

		if( $("#in"+j).html() == "￦")
			totalW += parseInt(temp);
		else if ( $("#in"+j).html() == "$")
			totalS += parseInt(temp);
	}
	
	f.add15_101.value = totalW;
	f.add15_101.value = '￦ ' + f.add15_101.value.comma();
	f.add15_104.value = totalS;
	f.add15_104.value = '$ ' + f.add15_104.value.comma();

	f.add15_103.value = onlyNum(f.add15_101.value) - onlyNum(f.add15_102.value);
	f.add15_103.value = '￦ ' + f.add15_103.value.comma();
	f.add15_106.value = onlyNum(f.add15_104.value) - onlyNum(f.add15_105.value);
	f.add15_106.value = '$ ' + f.add15_106.value.comma();

}

function autocal2() {
	var f = document.writeForm;
	var totalW = 0;
	var totalS = 0;
	var temp = 0;
	var j = 8;

	for ( i = 43; i < 80 ; i+=5 )
	{
		j++;
		temp = eval("f.add15_" + i + ".value");
		if( temp == "" ) continue;

		if( $("#in"+j).html() == "￦")
			totalW += parseInt(temp);
		else if ( $("#in"+j).html() == "$")
			totalS += parseInt(temp);
	}
	f.add15_102.value = totalW;
	f.add15_102.value = '￦ ' + f.add15_102.value.comma();
	f.add15_105.value = totalS;
	f.add15_105.value = '$ ' + f.add15_105.value.comma();

	f.add15_103.value = onlyNum(f.add15_101.value) - onlyNum(f.add15_102.value);
	f.add15_103.value = '￦ ' + f.add15_103.value.comma();
	f.add15_106.value = onlyNum(f.add15_104.value) - onlyNum(f.add15_105.value);
	f.add15_106.value = '$ ' + f.add15_106.value.comma();
}

String.prototype.comma = function() {
    var tmp = this.split('.');

    var minus = false;
    var str = new Array();

    if(tmp[0].indexOf('-') >= 0) {
        minus = true;
        tmp[0] = tmp[0].substring(1, tmp[0].length);
    }

    var v = tmp[0].replace(/,/gi,'');
    for(var i=0; i<=v.length; i++) {
        str[str.length] = v.charAt(v.length-i);
        if(i%3==0 && i!=0 && i!=v.length) {
            str[str.length] = '.';
        }
    }
    str = str.reverse().join('').replace(/\./gi,',');
    if(minus) str = '-' + str;

    return (tmp.length==2) ? str + '.' + tmp[1] : str;
}

function onlyNum(value) {
    var val = value;
    var re = /[^0-9\.\,\-]/gi;
    val = val.replace(re, '');
	return val.replace(',','');
}

</script>
	  <tr>
		<td colspan="12" align="center" bgcolor="#cccccc"><span class="style4"><strong> 요금 정산 함계 </strong> </span></td>
	  </tr>
	  <tr>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금총액</span></td>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금총액</span></td>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">수익</span></td>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4"></span></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#ffffff">KRW</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><?=$add15[100]?>&nbsp;</td>
	  	<td align="center" bgcolor="#ffffff">KRW</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><?=$add15[101]?>&nbsp;</td>
	  	<td align="center" bgcolor="#ffffff">KRW</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><?=$add15[102]?>&nbsp;</td>
	  	<td align="center" bgcolor="#ffffff"></td>
		<td colspan="2" align="left" bgcolor="#ffffff"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#ffffff">USD</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><?=$add15[103]?>&nbsp;</td>
	  	<td align="center" bgcolor="#ffffff">USD</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><?=$add15[104]?>&nbsp;</td>
	  	<td align="center" bgcolor="#ffffff">USD</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><?=$add15[105]?>&nbsp;</td>
	  	<td align="center" bgcolor="#ffffff"></td>
		<td colspan="2" align="left" bgcolor="#ffffff"></td>
	  </tr>
	  <tr><td colspan="12" height="10" style="border-width:0"></td></tr>
	  <tr>
		<td colspan="12" align="right" style=" border-width:0">
			<input id="print_cost" type="button" value="정산서출력" onclick="window.open('/modules/bbsext/theme/_pc/list02/table.php?uid=<?=$uid?>')" 
				style="color:black;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" />
		</td>
	  </tr>
  </table>
</div>

<!--작업자리 2222222222222222222222222-->

<!--
			<?php echo getContents($R['content'],$R['html'])?>

			<?php if($d['theme']['show_score1']||$d['theme']['show_score2']):?>
			<div class="scorebox">
			<?php if($d['theme']['show_score1']):?>
			<a href="<?php echo $g['bbs_action']?>score&amp;value=good&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 평가하시겠습니까?');"><img src="<?php echo $g['img_module_skin']?>/btn_s_1.gif" alt="공감" /></a> 
			<?php endif?>
			<?php if($d['theme']['show_score2']):?>
			<a href="<?php echo $g['bbs_action']?>score&amp;value=bad&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 평가하시겠습니까?');"><img src="<?php echo $g['img_module_skin']?>/btn_s_2.gif" alt="비공감" /></a> 
			<?php endif?>
			</div>
			<?php endif?>

			<?php if($R['tag']&&$d['theme']['show_tag']):?>
			<div class="tag">
			<img src="<?php echo $g['img_core']?>/_public/ico_tag.gif" alt="태그" />
			<?php $_tags=explode(',',$R['tag'])?>
			<?php $_tagn=count($_tags)?>
			<?php $i=0;for($i = 0; $i < $_tagn; $i++):?>
			<?php $_tagk=trim($_tags[$i])?>
			<a href="<?php echo $g['bbs_orign']?>&amp;where=subject|tag&amp;keyword=<?php echo urlencode($_tagk)?>"><?php echo $_tagk?></a><?php if($i < $_tagn-1):?>, <?php endif?>
			<?php endfor?>
			</div>
			<?php endif?>

			<?php if($d['upload']['data']&&$d['theme']['show_upfile']):?>
			<div class="attach">
			<ul>
			<?php foreach($d['upload']['data'] as $_u):?>
			<?php if($_u['hidden'])continue?>
			<li>
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;a=download&amp;uid=<?php echo $_u['uid']?>" title="<?php echo $_u['caption']?>"><?php echo $_u['name']?></a>
				<span class="size">(<?php echo getSizeFormat($_u['size'],1)?>)</span>
				<span class="down">(<?php echo number_format($_u['down'])?>)</span>
			</li>
			<?php endforeach?>
			</ul>
			</div>
			<?php endif?>

			<?php if($d['theme']['snsping']):?>
			<div class="snsbox">
			<img src="<?php echo $g['img_core']?>/_public/sns_t1.gif" alt="twitter" title="게시글을 twitter로 보내기" onclick="snsWin('t');" />
			<img src="<?php echo $g['img_core']?>/_public/sns_f1.gif" alt="facebook" title="게시글을 facebook으로 보내기" onclick="snsWin('f');" />
			<img src="<?php echo $g['img_core']?>/_public/sns_m1.gif" alt="me2day" title="게시글을 me2day로 보내기" onclick="snsWin('m');" />
			<img src="<?php echo $g['img_core']?>/_public/sns_y1.gif" alt="요즘" title="게시글을 요즘으로 보내기" onclick="snsWin('y');" />
			</div>
			<?php endif?>

			-->
		</div>
	</div>

	<div class="bottom">
	<br /><br />
	<script>
		//alert("<?php echo $g['bbs_delete'].$R['uid']?>");
	</script>
		<span class="btn00"><a href="<?php echo $g['bbs_modify'].$R['uid']?>">수정</a></span>
<!--	<?php if($d['theme']['use_reply']):?><span class="btn00"><a href="<?php echo $g['bbs_reply'].$R['uid']?>">답변</a></span><?php endif?>-->
		<?php if($my['admin']):?>
		<span class="btn00"><a href="<?php echo $g['bbs_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 삭제하시겠습니까?');">삭제</a></span>
		<?php if($my['admin']):?>
		<span class="btn00"><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=admin&module=<?php echo $m?>&front=movecopy&type=multi_move&postuid=<?php echo $R['uid']?>');">이동</a></span>
		<span class="btn00"><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=admin&module=<?php echo $m?>&front=movecopy&type=multi_copy&postuid=<?php echo $R['uid']?>');">복사</a></span>
		<?php endif?>
		<?php endif?>
		<span class="btn00"><a href="<?php echo $g['bbs_list']?>">목록으로</a></span>
	</div>

	<?php if(!$d['bbs']['c_hidden']&&$iframe!='Y'):?>
	<div class="comment">
		<img src="<?php echo $g['img_module_skin']?>/ico_comment.gif" alt="" class="icon1" />
		<a href="#." onclick="commentShow('comment');">댓글 <span id="comment_num<?php echo $R['uid']?>"><?php echo $R['comment']?></span>개</a>
		<?php if(getNew($R['d_comment'],24)):?><img src="<?php echo $g['img_core']?>/_public/ico_new_01.gif" alt="new" /><?php endif?>
		<?php if($d['theme']['use_trackback']):?>
		| <a href="#." onclick="commentShow('trackback');">엮인글 <span id="trackback_num<?php echo $R['uid']?>"><?php echo $R['trackback']?></span>개</a>
		<?php if(getNew($R['d_trackback'],24)):?><img src="<?php echo $g['img_core']?>/_public/ico_new_01.gif" alt="new" /><?php endif?>
		<?php endif?>
	</div>
	<a name="CMT"></a>
	<iframe name="commentFrame" id="commentFrame" src="<?php if(!$d['bbs']['c_hidden']&&($CMT || $d['bbs']['c_open'])):?><?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=comment&amp;skin=<?php echo $d['bbs']['c_skin']?>&amp;hidepost=<?php echo ($R['display']?0:1)?>&amp;iframe=Y&amp;cync=[<?php echo $m?>][<?php echo $R['uid']?>][uid,comment,oneline,d_comment][<?php echo $table[$m.'data']?>][<?php echo $R['mbruid']?>][m:<?php echo $m?>,bid:<?php echo $R['bbsid']?>,uid:<?php echo $R['uid']?>]&amp;CMT=<?php echo $CMT?><?php endif?>" width="100%" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
	<?php endif?>

</div> 
<iframe name="iprint" id="iprint" width="0" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>

<script type="text/javascript">
//<![CDATA[
<?php if($d['theme']['snsping']):?>
function snsWin(sns)
{
	var snsset = new Array();
	var enc_tit = "<?php echo urlencode($_HS['title'])?>";
	var enc_sbj = "<?php echo urlencode($R['subject'])?>";
	var enc_url = "<?php echo urlencode($g['url_root'].($_HS['rewrite']?($_HS['usescode']?'/'.$r:'').'/b/'.$R['bbsid'].'/'.$R['uid']:'/?'.($_HS['usescode']?'r='.$r.'&':'').'m='.$m.'&bid='.$R['bbsid'].'&uid='.$R['uid']))?>";
	var enc_tag = "<?php echo urlencode(str_replace(',',' ',$R['tag']))?>";

	snsset['t'] = 'http://twitter.com/home/?status=' + enc_sbj + '+++' + enc_url;
	snsset['f'] = 'http://www.facebook.com/sharer.php?u=' + enc_url + '&t=' + enc_sbj;
	snsset['m'] = 'http://me2day.net/posts/new?new_post[body]=' + enc_sbj + '+++["'+enc_tit+'":' + enc_url + '+]&new_post[tags]='+enc_tag;
	snsset['y'] = 'http://yozm.daum.net/api/popup/prePost?sourceid=' + enc_url + '&prefix=' + enc_sbj;
	window.open(snsset[sns]);
}
<?php endif?>
function printWindow(url) 
{
	window.open(url,'printw','left=0,top=0,width=1250px,height=600px,statusbar=no,scrollbars=yes,toolbar=yes');
}
function commentShow(type)
{
	var url;
	if (type == 'comment')
	{
		url = '<?php echo $g['s']?>/?r=<?php echo $r?>&bid=<?php echo $bid?>&m=comment&skin=<?php echo $d['bbs']['c_skin']?>&hidepost=<?php echo ($R['display']?0:1)?>&iframe=Y&cync=';
		url+= '[<?php echo $m?>][<?php echo $R['uid']?>]';
		url+= '[uid,comment,oneline,d_comment]';
		url+= '[<?php echo $table[$m.'data']?>][<?php echo $R['mbruid']?>]';
		url+= '[m:<?php echo $m?>,bid:<?php echo $R['bbsid']?>,uid:<?php echo $R['uid']?>]';
		url+= '&CMT=<?php echo $CMT?>';
	}
	else {
		url = '<?php echo $g['s']?>/?r=<?php echo $r?>&m=trackback&iframe=Y&cync=';
		url+= '[<?php echo $m?>][<?php echo $R['uid']?>]';
		url+= '[m:<?php echo $m?>,bid:<?php echo $R['bbsid']?>,uid:<?php echo $R['uid']?>]';
		url+= '&TBK=<?php echo $TBK?>';
	}

	frames.commentFrame.location.href = url;
}
function setImgSizeSetting()
{
	<?php if($d['theme']['use_autoresize']):?>
	var ofs = getOfs(getId('vContent')); 
	getDivWidth(ofs.width,'vContent');
	<?php endif?>
	getId('vContent').style.fontFamily = getCookie('myFontFamily');
	getId('vContent').style.fontSize = getCookie('myFontSize');

	<?php if($TRACKBACK):?>
	commentShow('trackback');
	<?php endif?>

	<?php if($print=='Y'):?>
	document.body.style.padding = '15px';
	self.print();
	<?php endif?>
}
window.onload = setImgSizeSetting;

//]]>
</script>

<?php if($d['theme']['show_list']&&$print!='Y'):?>
<?php include_once $g['dir_module'].'lang.'.$_HS['lang'].'/mod/_list.php'?>
<?php include_once $g['dir_module_skin'].'list.php'?>
<?php endif?>

