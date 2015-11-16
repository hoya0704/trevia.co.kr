
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
.txt1 {color:#555;text-align:center;}
.txt2 {color:#555;}

.i_normal {border:solid 1px #ccc;width:120px;}
.i_normal_2 {border:solid 1px #ccc;width:90px;}

.i_normal2 {border:solid 1px #ccc;width:250px;}
.i_normal2_2 {border:solid 1px #ccc;width:220px;}
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
		<td class="txt1"><?=$R['category']?></td>
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
		<td colspan="2" class="txt2"><?if(!$add2[9]):?><?php echo $my[nic]?><?else:?><?php echo $add2[9]?><?endif?></td>									 
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
		<td colspan="2" class="txt2"><?=$add2[5]?>박</td>									 
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">예식일</td>
		<td colspan="2" class="txt2"><?=$add2[6]?></td>									 
		<td class="i_title" bgcolor="#e6e6e6">출발일</td>
		<td colspan="2" class="txt2"><?=$add2[7]?></td>	  
		<td class="i_title" bgcolor="#e6e6e6">도착일</td>
		<td colspan="2" class="txt2"><?=$add2[8]?></td>									 
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
		<td class="i_title"><?=$add3[$k++]?></td>
		<td class="txt2"><?=$add3[$k++]?></td>
		<td class="txt2" colspan="2"><?=$add3[$k++]?></td>             
		<td class="txt2"><?=$add3[$k++]?></td>
		<td class="txt2" colspan="2"><?=$add3[$k++]?></td>
		<td class="txt2" colspan="2"><?=$add3[$k++]?></td>
	</tr>		
<?endfor?>		

	<tr>
		<td class="i_title" bgcolor="#e6e6e6">주소</td>
		<td colspan="4"><?=$add4[0]?></td>
		<td colspan="3"><input type="checkbox" name="add4_2" value="견적발송" <?if($add4[1]=="견적발송"):?>checked<?endif?> disabled />견적발송 <input type="checkbox" name="add4_3" value="APIS접수" <?if($add4[2]=="APIS접수"):?>checked<?endif?> disabled />APIS접수 <input type="checkbox" name="add4_4" value="우편물발송" <?if($add4[3]=="우편물발송"):?>checked<?endif?> disabled />우편물발송</td>
		<td class="txt2">SMS발송(준비중)</td>
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
		<td colspan="2"><?=$add5[$k++]?></td>
		<td colspan="2"><?=$add5[$k++]?></td>
		<td class="txt2"><?=$add5[$k++]?>박</td>
		<td class="txt2"><?=$add5[$k++]?></td>
		<td class="txt2" style="text-align:right"><?=number_format($add5[$k++])?></td>
		<td class="txt2" style="text-align:right"><?=number_format($add5[$k++])?></td>
		<td class="txt2"><?=$add5[$k++]?></td>
	</tr>
<?endfor?>





<!--작업자리-->


	<tr>
		<td colspan="9" style="border:0;height:50px" align="center"><span class="btn00"><a href="<?php echo $g['bbs_list']?>&mod=final&puid=<?php echo $R['uid']?>" target="_black">계약서 발송</a></span> 발송일 : <span id="nDate"><?php if($R[add12]):?><?php echo $R[add12]?><?php else:?>발송전<?php endif?></span> | <font color="red">계약서회신일자 : <?php echo $R['add13']?></font></td>
	</tr>

	<tr class="sec2_start">
		<td colspan="9" style="border:solid 1px #888;height:40px;background:#ddd;text-align:center;">추 가 정 보 ▼ <?php if($d['upload']['data']):?><font color="red">첨부된 파일이 있습니다.</font><?endif?></td>
	</tr>


	<tr>
		<td colspan="9" style="border:1;height:150px;padding:5px;" valign="top">			<?php echo getContents($R['content'],$R['html'])?>
</td>
	</tr>

	<tr>
		<td colspan="9" style="border:1;padding:5px;" valign="top">		


			<?php if($d['upload']['data']&&$d['theme']['show_upfile']):?>
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
			<?php endif?>



</td>
	</tr>


	




<!--작업자리 2222222222222222222222222-->


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
		<td colspan="2"><?=$add8[$k++]?></td>
		<td colspan="2"><?=$add8[$k++]?></td>
		<td class="txt2"><?=$add8[$k++]?></td>
		<td class="txt2"><?=$add8[$k++]?></td>
		<td colspan="2"><?=$add8[$k++]?></td>
		<td class="txt2"><?=$add8[$k++]?></td>
	</tr>
<?endfor?>

	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >
		<td colspan="3" style="border:0" class="b_title">■ 여행경비내역</td>
		<td class="i_title">최종환율Rate</td>
		<td class="txt2"><?=number_format($add9[0])?></td>
		<td class="i_title">달러적용<input type="checkbox" name="add7_3" value="달러적용" <?if($add7[2]=="달러적용"):?>checked<?endif?> disabled /></td>
		<td class="txt2"><?=$add9[1]?></td>
		<td class="i_title">총 비용(원)</td>
		<td class="txt2" style="text-align:right"><font color="blue"><b><?=number_format($add9[2])?></b></font></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">고객명</td>
		<td class="i_title" bgcolor="#e6e6e6">항공 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">리조트 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금(항공)</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금(리조트)<?if($add7[2]=="달러적용"):?><font color="red">$</font><?endif?></td>
		<td class="i_title" bgcolor="#e6e6e6">경유지비용</td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용1</td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용2</td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용3</td>
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
		<td class="txt2" style="text-align:right;"><?=number_format($add10[$k++])?></td>
	</tr>
<?endfor?>

	<tr >
		<td class="i_title" bgcolor="#e6e6e6">T/L</td>
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
		<td class="i_title" bgcolor="#e6e6e6">입금일</td>
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
		<td class="i_title" bgcolor="#e6e6e6">결제수단</td>
		<td class="txt2"><?=$add11[16]?></td>
		<td class="txt2"><?=$add11[17]?></td>
		<td class="txt2"><?=$add11[18]?></td>
		<td class="txt2"><?=$add11[19]?></td>
		<td class="txt2"><?=$add11[20]?></td>
		<td class="txt2"><?=$add11[21]?></td>
		<td class="txt2"><?=$add11[22]?></td>
		<td class="txt2"><?=$add11[23]?></td>
	</tr>

</table>



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
		<span class="btn00"><a href="<?php echo $g['bbs_modify'].$R['uid']?>">수정</a></span>
<!--		<?php if($d['theme']['use_reply']):?><span class="btn00"><a href="<?php echo $g['bbs_reply'].$R['uid']?>">답변</a></span><?php endif?>-->
		<?php if($my[id]=='admin'):?>

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
		url = '<?php echo $g['s']?>/?r=<?php echo $r?>&m=comment&skin=<?php echo $d['bbs']['c_skin']?>&hidepost=<?php echo ($R['display']?0:1)?>&iframe=Y&cync=';
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

