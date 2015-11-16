<div id="cwrite" class="<?php echo $type=='modify'?'md':'wr'?>box">
	<?php $_SESSION['wcode']=$date['totime']?>
	<form name="writeForm" method="post" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return writeCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="a" value="write" />
	<input type="hidden" name="m" value="<?php echo $m?>" />
	<input type="hidden" name="uid" value="<?php echo $R['uid']?>" />
	<input type="hidden" name="upfiles" id="upfilesValue" value="<?php echo $type=='modify'?$R['upload']:''?>" />
	<input type="hidden" name="c" value="<?php echo $c?>" />
	<input type="hidden" name="skin" value="<?php echo $skin?>" />
	<input type="hidden" name="iframe" value="<?php echo $iframe?>" />
	<input type="hidden" name="hidepost" value="<?php echo $hidepost?>" />
	<input type="hidden" name="pcode" value="<?php echo $date['totime']?>" />

	<div class="textBox">
		<img src="<?php echo $g['img_module_skin']?>/comment_text.gif" alt="몰디브여행! 참 궁금한것도 많으시죠? 망설이지 마세요~" />
	</div>
	<div class="box">

		<div class="editbox">
			<input type="hidden" name="html" id="editFrameHtml" value="<?php echo $R['html']?$R['html']:'HTML'?>" />
			<input type="hidden" name="content" id="editFrameContent" value="<?php echo htmlspecialchars($R['content'])?>" />
			<textarea name="content" onfocus="<?php if($d['comment']['perm_write'] <= $my['level'] || $my['admin']):?>clearForm(this)<?php else:?>needLogin(this)<?php endif?>"><?php echo $R['content'] ? htmlspecialchars($R['content']) : "견적을 요청하실때는 희망지역 / 여행인원수 / 출발일과 숙박일수 / 희망항공사 / 리조트명 / 대략의 예산/기타 사항을 입력해주세요.\n상세하고 빠른 견적을 원하실때는 좌측 일대일 예약 요청을 이용하시는 것도 좋습니다." ?></textarea>
			<?php if($d['comment']['perm_write'] <= $my['level'] || $my['admin']):?>
			<input type="image" src="<?php echo $g['img_module_skin']?>/btn_write.gif" alt="의견등록" />
			<?php else:?>
			<img src="<?php echo $g['img_module_skin']?>/btn_write.gif" alt="의견등록" />
			<?php endif?>
		</div>

		<div class="uploadbox">
			<iframe name="upfilesFrame" id="upfilesFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;mod=list&amp;gparam=upfilesValue|editFrame&amp;code=<?php echo $type=='modify'?$R['upload']:''?>" width="100%" height="0" frameborder="0" scrolling="no"></iframe>
		</div>

	</div>

	</form>

</div>





