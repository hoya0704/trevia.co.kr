<?
	$add11 = explode("||", $R[add11]);	
	$add12 = explode("||", $R[add12]);	
	$add13 = explode("||", $R[add13]);	
	$add14 = explode("||", $R[add14]);	
	$add15 = explode("||", $R[add15]);	
	$add16 = explode("||", $R[add16]);	
	$add17 = explode("||", $R[add17]);	
	$add18 = explode("||", $R[add18]);	
	$add21 = explode("||", $R[add21]);	
	$add22 = explode("||", $R[add22]);	
	$add23 = explode("||", $R[add23]);	
	$add24 = explode("||", $R[add24]);	
	$add25 = explode("||", $R[add25]);	
	$add26 = explode("||", $R[add26]);	
	$add27 = explode("||", $R[add27]);	
	$add28 = explode("||", $R[add28]);	
	$add29 = explode("||", $R[add29]);	
?>

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


		<?php if($B['category']):$_catexp = explode(',',$B['category']);$_catnum=count($_catexp)?>
		<tr>
		<td class="td1">카테고리</td>
		<td class="td2">
			<select name="category">
			<option value="">&nbsp;+ <?php echo $_catexp[0]?>선택</option>
			<option value="">-----------------------------------------------------------------------------------------</option>
			<?php for($i = 1; $i < $_catnum; $i++):if(!$_catexp[$i])continue;?>
			<option value="<?php echo $_catexp[$i]?>"<?php if($_catexp[$i]==$R['category']||$_catexp[$i]==$cat):?> selected="selected"<?php endif?>>ㆍ<?php echo $_catexp[$i]?><?php if($d['tdeme']['show_catnum']):?>(<?php echo getDbRows($table[$m.'data'],'site='.$s.' and notice=0 and bbs='.$B['uid']." and category='".$_catexp[$i]."'")?>)<?php endif?></option>
			<?php endfor?>
			</select>
			<?php if($my['admin']):?>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=<?php echo $m?>&amp;uid=<?php echo $B['uid']?>"><img src="<?php echo $g['img_core']?>/_public/btn_add.gif" alt="추가" title="추가" /></a>
			<?php endif?>		
		</td>
		</tr>
		<?php endif?>


		<tr>
		<td class="td1">항공사명</td>
		<td class="td2">
			<input type="text" name="add1" value="<?php echo htmlspecialchars($R['add1'])?>" class="input subject" />
		</td>
		</tr>


		<tr>
		<td class="td1">항공스케쥴</td>
		<td class="td2">
			<input type="text" name="subject" value="<?php echo htmlspecialchars($R['subject'])?>" class="input subject" />
		</td>
		</tr>

	</table>

<table width="100%" cellpadding="0" cellspacing="0" id="ttid"  style="border-collapse:collapse; ">
	<colgroup>
		<col >
		<col >
		<col >
		<col >
		<col >
		<col >
	</colgroup>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6" >출발지</td>
		<td class="i_title" bgcolor="#e6e6e6">도착지</td>
		<td class="i_title" bgcolor="#e6e6e6">편명</td>
		<td class="i_title" bgcolor="#e6e6e6">출발시간</td>
		<td class="i_title" bgcolor="#e6e6e6">도착시간</td>
		<td class="i_title" bgcolor="#e6e6e6">항공시간</td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add11_1" value="<?=$add11[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add11_2" value="<?=$add11[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add11_3" value="<?=$add11[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add11_4" value="<?=$add11[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add11_5" value="<?=$add11[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add11_6" value="<?=$add11[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add12_1" value="<?=$add12[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add12_2" value="<?=$add12[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add12_3" value="<?=$add12[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add12_4" value="<?=$add12[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add12_5" value="<?=$add12[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add12_6" value="<?=$add12[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add13_1" value="<?=$add13[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add13_2" value="<?=$add13[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add13_3" value="<?=$add13[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add13_4" value="<?=$add13[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add13_5" value="<?=$add13[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add13_6" value="<?=$add13[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add14_1" value="<?=$add14[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add14_2" value="<?=$add14[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add14_3" value="<?=$add14[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add14_4" value="<?=$add14[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add14_5" value="<?=$add14[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add14_6" value="<?=$add14[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add15_1" value="<?=$add15[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add15_2" value="<?=$add15[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add15_3" value="<?=$add15[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add15_4" value="<?=$add15[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add15_5" value="<?=$add15[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add15_6" value="<?=$add15[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add16_1" value="<?=$add16[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add16_2" value="<?=$add16[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add16_3" value="<?=$add16[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add16_4" value="<?=$add16[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add16_5" value="<?=$add16[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add16_6" value="<?=$add16[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add17_1" value="<?=$add17[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add17_2" value="<?=$add17[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add17_3" value="<?=$add17[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add17_4" value="<?=$add17[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add17_5" value="<?=$add17[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add17_6" value="<?=$add17[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add18_1" value="<?=$add18[0]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add18_2" value="<?=$add18[1]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add18_3" value="<?=$add18[2]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add18_4" value="<?=$add18[3]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add18_5" value="<?=$add18[4]?>" class="i_normal" /></td>
		<td class="i_title" ><input type="text" name="add18_6" value="<?=$add18[5]?>" class="i_normal" /></td>
	</tr>
	<tr>
		<td colspan="6" height="100px">


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
			<?php endif?>
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
	<tr>
		<td class="i_title" bgcolor="#e6e6e6" >출발지</td>
		<td class="i_title" bgcolor="#e6e6e6">도착지</td>
		<td class="i_title" bgcolor="#e6e6e6">편명</td>
		<td class="i_title" bgcolor="#e6e6e6">출발시간</td>
		<td class="i_title" bgcolor="#e6e6e6">도착시간</td>
		<td class="i_title" bgcolor="#e6e6e6">항공시간</td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add21_1" value="<?=$add21[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add21_2" value="<?=$add21[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add21_3" value="<?=$add21[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add21_4" value="<?=$add21[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add21_5" value="<?=$add21[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add21_6" value="<?=$add21[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add22_1" value="<?=$add22[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add22_2" value="<?=$add22[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add22_3" value="<?=$add22[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add22_4" value="<?=$add22[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add22_5" value="<?=$add22[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add22_6" value="<?=$add22[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add23_1" value="<?=$add23[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add23_2" value="<?=$add23[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add23_3" value="<?=$add23[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add23_4" value="<?=$add23[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add23_5" value="<?=$add23[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add23_6" value="<?=$add23[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add24_1" value="<?=$add24[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add24_2" value="<?=$add24[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add24_3" value="<?=$add24[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add24_4" value="<?=$add24[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add24_5" value="<?=$add24[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add24_6" value="<?=$add24[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add25_1" value="<?=$add25[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add25_2" value="<?=$add25[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add25_3" value="<?=$add25[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add25_4" value="<?=$add25[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add25_5" value="<?=$add25[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add25_6" value="<?=$add25[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add26_1" value="<?=$add26[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add26_2" value="<?=$add26[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add26_3" value="<?=$add26[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add26_4" value="<?=$add26[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add26_5" value="<?=$add26[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add26_6" value="<?=$add26[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add27_1" value="<?=$add27[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add27_2" value="<?=$add27[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add27_3" value="<?=$add27[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add27_4" value="<?=$add27[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add27_5" value="<?=$add27[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add27_6" value="<?=$add27[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td class="i_title" ><input type="text" name="add28_1" value="<?=$add28[0]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add28_2" value="<?=$add28[1]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add28_3" value="<?=$add28[2]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add28_4" value="<?=$add28[3]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add28_5" value="<?=$add28[4]?>" class="i_normal"  /></td>
		<td class="i_title" ><input type="text" name="add28_6" value="<?=$add28[5]?>" class="i_normal"  /></td>
	</tr>
	<tr>
		<td colspan="6">
		</td>
	</tr>
	<tr>
		<td class="i_title" >항공권 가격</td>
		<td class="i_title" ><input type="text" name="add29_1" value="<?=$add29[0]?>" class="i_normal"  /></td>
		<td class="i_title" >유류할증료 포함여부</td>
		<td class="i_title" >
			<select name="add29_2"><option value="0" <?if($add29[1]=='0'):?>selected="selected"<?endif?>>미포함</option><option value="1" <?if($add29[1]=='1'):?>selected="selected"<?endif?>>포함</option></select>
		</td>
		<td class="i_title" >유류할증료(예상)</td>
		<td class="i_title" ><input type="text" name="add29_3" value="<?=$add29[2]?>" class="i_normal"  /></td>
	</tr>
</table>



	<table>
		<?php if($d['tdeme']['show_wtag']):?>
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

		<?php if($d['tdeme']['show_trackback']):?>
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


		<?php if((!$R['uid']||$reply=='Y')&&is_file($g['patd_module'].$d['bbs']['snsconnect'])):?>
		<tr>
		<td class="td1" style="padding-top:18px;">소셜연동</td>
		<td class="td2 shift">
			<br />
			<?php include_once $g['patd_module'].$d['bbs']['snsconnect']?> 에도 게시물을 등록합니다.
		</td>
		</tr>
		<?php endif?>

		<tr style="display:none">
		<td class="td1"></td>
		<td class="td2">
			<div class="after">
			게시물 등록(수정/답변)후
			<input type="radio" name="backtype" id="backtype1" value="list"<?php if($_SESSION['bbsback']=='list'):?> checked="checked"<?php endif?> /><label for="backtype1">목록으로 이동</label>
			<input type="radio" name="backtype" id="backtype2" value="view"<?php if(!$_SESSION['bbsback'] || $_SESSION['bbsback']=='view'):?> checked="checked"<?php endif?> /><label for="backtype2">본문으로 이동</label>
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
