<form name="writeForm" method="post" action="<?php echo $g['s']?>/" target="_self">
<!--<div id="layerTitle">
	<a href="javascript:closeCounselling();"><img src="<?php echo $g['img_module_skin']?>/btn_close.gif" alt="창닫기" /></a>
</div>-->
<div id="bbswrite">
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
	<input type="hidden" name="pw" value="<?php echo $adddata['cellphone3']?>" />
	<input type="hidden" name="subject" value="<?php echo $name?>님의 견적상담 요청입니다." />
	<input type="hidden" name="backtype" value="reload" />
	<input type="hidden" name="hidden" value="1" />
	
	<?php
	$arr_wish = explode("|",$adddata['wish_time']);
	$adddata['wish_time1'] = $arr_wish[0];
	$adddata['wish_time2'] = $arr_wish[1];
	unset($adddata['wish_time']);
	?>

	<input type="hidden" name="name" value="<?php echo $name?>" />
	<input type="hidden" name="adddata[email]" id="email" value="<?php echo $adddata['email']?>" />
	<input type="hidden" name="adddata[region]" id="region" value="<?php echo $adddata['region']?>" />
	<input type="hidden" name="adddata[cellphone1]" id="cellphone1" value="<?php echo $adddata['cellphone1']?>" />
	<input type="hidden" name="adddata[cellphone2]" id="cellphone2" value="<?php echo $adddata['cellphone2']?>" />
	<input type="hidden" name="adddata[cellphone3]" id="cellphone3" value="<?php echo $adddata['cellphone3']?>" />
	<input type="hidden" name="adddata[kind]" value="<?php echo $adddata['kind']?>" />
	<input type="hidden" name="adddata[person_count]" id="person_count" value="<?php echo $adddata['person_count']?>" />
	<input type="hidden" name="adddata[start_date]" id="start_date" value="<?php echo $adddata['start_date']?>" />
	<input type="hidden" name="adddata[scheduled]" value="<?php echo $adddata['scheduled']?>" />
	<input type="hidden" name="adddata[budget]" value="<?php echo $adddata['budget']?>" />
	<input type="hidden" name="adddata[wish_time1]" value="<?php echo $adddata['wish_time1']?>" />
	<input type="hidden" name="adddata[wish_time2]" value="<?php echo $adddata['wish_time2']?>" />
	<input type="hidden" name="adddata[airline]" value="<?php echo $adddata['airline']?>" />
	<input type="hidden" name="adddata[fax1]" value="<?php echo $adddata['fax1']?>" />
	<input type="hidden" name="adddata[fax2]" value="<?php echo $adddata['fax2']?>" />
	<input type="hidden" name="adddata[fax3]" value="<?php echo $adddata['fax3']?>" />
	<input type="hidden" name="adddata[wish_resort1]" value="<?php echo $adddata['wish_resort1']?>" />
	<input type="hidden" name="adddata[wish_resort2]" value="<?php echo $adddata['wish_resort2']?>" />
	<input type="hidden" name="adddata[wish_resort3]" value="<?php echo $adddata['wish_resort3']?>" />
	<input type="hidden" name="html" value="TEXT" />
	<textarea name="content"><?php echo $content?></textarea>


	
	<?/*<h1><img src="<?php echo $g['img_module_skin']?>/title_01.gif" alt="고객님 필수정보 입력" /></h1>

	<table cellspacing="0">

		<tr>
		<td class="td1 topBorder1"><img src="<?php echo $g['img_module_skin']?>/lbl_name.gif" alt="고객명" /></td>
		<td class="td2 topBorder2">
			<input size="20" type="text" name="name" value="<?php echo $name?>" class="input" />
		</td>
		<td class="td1"><img src="<?php echo $g['img_module_skin']?>/lbl_cp.gif" alt="휴대폰" /></td>
		<td class="td2">
			<input size="3" type="text" name="adddata[cellphone1]" id="cellphone1" value="<?php echo $adddata['cellphone1']?>" maxlength="3" class="input cellphone" />-<input size="4" type="text" name="adddata[cellphone2]" id="cellphone2" value="<?php echo $adddata['cellphone2']?>" maxlength="4" class="input cellphone" />-<input size="4" type="text" name="adddata[cellphone3]" id="cellphone3" value="<?php echo $adddata['cellphone3']?>" maxlength="4" class="input cellphone" />
		</td>
		</tr>
		<tr>
		<td class="td1"><img src="<?php echo $g['img_module_skin']?>/lbl_kind.gif" alt="여행종류" /></td>
		<td class="td2">
			<input type="radio" name="adddata[kind]" id="honeymoon" value="허니문"<?php if($adddata['kind']=="허니문"):?> checked="checked"<?php endif?> /> <label for="honeymoon">허니문</label><br />
			<input type="radio" name="adddata[kind]" id="family" value="가족여행"<?php if($adddata['kind']=="가족여행"):?> checked="checked"<?php endif?> /> <label for="family">가족여행</label>
			<input type="radio" name="adddata[kind]" id="etc" value="기타"<?php if($adddata['kind']=="기타"):?> checked="checked"<?php endif?> /> <label for="etc">기타</label>
		</td>
		<td class="td1"><img src="<?php echo $g['img_module_skin']?>/lbl_person_count.gif" alt="총 여행인원" /></td>
		<td class="td2">
			<input size="20" type="text" name="adddata[person_count]" id="person_count" value="<?php echo $adddata['person_count']?>" class="input" />
		</td>
		</tr>
		<tr>
		<td class="td1"><img src="<?php echo $g['img_module_skin']?>/lbl_start_date.gif" alt="출발날짜" /></td>
		<td class="td2">
			<input size="20" type="text" name="adddata[start_date]" id="start_date" value="<?php echo $adddata['start_date']?>" class="input" />
		</td>
		<td class="td3"><img src="<?php echo $g['img_module_skin']?>/lbl_scheduled.gif" alt="예정" /></td>
		<td class="td2">
			<select name="adddata[scheduled]">
				<option value="4박"<?php if($adddata['scheduled']=="4박"):?> selected<?php endif?>>4박</option>
				<option value="3박"<?php if($adddata['scheduled']=="3박"):?> selected<?php endif?>>3박</option>
				<option value="2박"<?php if($adddata['scheduled']=="2박"):?> selected<?php endif?>>2박</option>
				<option value="1박"<?php if($adddata['scheduled']=="1박"):?> selected<?php endif?>>1박</option>
			</select>
		</td>
		</tr>
	</table>

	<h1><img src="<?php echo $g['img_module_skin']?>/title_02.gif" alt="고객님 선택정보 입력" /></h1>
	
	<table cellspacing="0" class="bottom">
		<tr>
		<td class="td1 topBorder1"><img src="<?php echo $g['img_module_skin']?>/lbl_budget.gif" alt="예산" /></td>
		<td class="td2 topBorder2">
			<input size="10" type="text" name="adddata[budget]" value="" class="input" /> 만원
		</td>
		<td class="td3 topBorder2"><img src="<?php echo $g['img_module_skin']?>/lbl_wish_time.gif" alt="상담 희망시간" /></td>
		<td class="td2 topBorder2">
			<input size="7" type="text" name="adddata[wish_time1]" value="" class="input" /> - 
			<input size="7" type="text" name="adddata[wish_time2]" value="" class="input" />
		</td>
		</tr>
		<tr>
		<td class="td1"><img src="<?php echo $g['img_module_skin']?>/lbl_airline.gif" alt="희망 항공사" /></td>
		<td class="td2">
			<select name="adddata[airline]">
				<option value="" selected>선택</option>
				<option value="">---------------</option>
				<option value="대한항공">대한항공</option>
				<option value="아시아나항공">아시아나항공</option>
			</select>
		</td>
		<td class="td3"><img src="<?php echo $g['img_module_skin']?>/lbl_fax.gif" alt="팩스번호" /></td>
		<td class="td2" colspan="3">
			<input size="3" type="text" name="adddata[fax1]" value="" maxlength="3" class="input cellphone" />-<input size="4" type="text" name="adddata[fax2]" value="" maxlength="4" class="input cellphone" />-<input size="4" type="text" name="adddata[fax3]" value="" maxlength="4" class="input cellphone" />
		</td>
		</tr>
		<tr>
		<td class="td1"><img src="<?php echo $g['img_module_skin']?>/lbl_resort.gif" alt="희망리조트" /></td>
		<td class="td2" colspan="3">
			<input size="15" type="text" name="adddata[wish_resort1]" value="" class="input" />,
			<input size="15" type="text" name="adddata[wish_resort2]" value="" class="input" />,
			<input size="15" type="text" name="adddata[wish_resort3]" value="" class="input" />
		</td>
		</tr>
		<td class="td1"><img src="<?php echo $g['img_module_skin']?>/lbl_etc_requirement.gif" alt="기타 요청사항" /></td>
		<td class="td2" colspan="3">
			
			<div class="editbox">
				<?php if(!$g['mobile']&&$d['theme']['edit_html']<=$my['level']):?>
				<div class="iconbox">
					<?php if($d['theme']['perm_photo'] <= $my['level']):?>
					<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=photo&gparam=upfilesValue|upfilesFrame|editFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_photo.gif" alt="" />사진</a>
					<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
					<?php endif?>
					<?php if($d['theme']['perm_upload'] <= $my['level']):?>
					<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=file&gparam=upfilesValue|upfilesFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_xfile.gif" alt="" />파일</a>
					<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
					<?php endif?>
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
					<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
					<a href="#." onclick="frames.editFrame.ToolboxShowHide(0);" /><img src="<?php echo $g['img_core']?>/_public/ico_edit.gif" alt="" />편집</a>
				</div>
				<?php endif?>

				<div>
				<input type="hidden" name="html" id="editFrameHtml" value="<?php echo $d['theme']['edit_html']>$my['level']?'TEXT':($R['html']?$R['html']:'HTML')?>" />
				<input type="hidden" name="content" id="editFrameContent" value="<?php echo htmlspecialchars($R['content'])?>" />
				<iframe name="editFrame" id="editFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="<?php echo $d['theme']['edit_height']?>" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
				</div>
				
				<?php if($d['theme']['perm_upload']<=$my['level']||$d['theme']['perm_photo']<=$my['level']):?>
				<div>
				<iframe name="upfilesFrame" id="upfilesFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;mod=list&amp;gparam=upfilesValue|editFrame&amp;code=<?php echo $reply=='Y'?'':$R['upload']?>" width="100%" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
				</div>
				<?php endif?>
			</div>

		</td>
	</table>

	

	<table>
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
	</table>
*/?>
</div>
<!--
<div class="bottombox">
	<input type="image" src="<?php echo $g['img_module_skin']?>/btn_confirm.gif" />
</div>
-->
</form>

<script type="text/javascript">
	function writeCheck()
	{		
		var name = parent.document.getElementById("name");
		if (name.value == '')
		{
			alert('고객명을 입력해 주세요. ');
			name.focus();
			return false;
		}

		var cellphone1 = parent.document.getElementById("cellphone1");
		var cellphone2 = parent.document.getElementById("cellphone2");
		var cellphone3 = parent.document.getElementById("cellphone3");
		if (cellphone1.value == '')
		{
			alert('휴대폰번호를 입력해주세요.');
			cellphone1.focus();
			return false;
		}
		if (cellphone2.value == '')
		{
			alert('휴대폰번호를 입력해주세요.');
			cellphone2.focus();
			return false;
		}
		if (cellphone3.value == '')
		{
			alert('휴대폰번호를 입력해주세요.');
			cellphone3.focus();
			return false;
		}

		var person_count = parent.document.getElementById("person_count");
		if (person_count.value == '')
		{
			alert('총 여행인원을 입력해주세요.');
			person_count.focus();
			return false;
		}

		var start_date = parent.document.getElementById("start_date");
		if (start_date.value == '')
		{
			alert('출발날짜를 입력해주세요.');
			start_date.focus();
			return false;
		}

		return true;
	}
	
	$(document).ready(function()
	{
		if(writeCheck())
		{
			document.writeForm.submit();
		}
	});
</script>
