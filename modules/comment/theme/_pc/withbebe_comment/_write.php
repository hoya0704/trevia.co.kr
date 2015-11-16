<div id="cwrite" class="<?php echo $type=='modify'?'md':'wr'?>box">

	<?php if($d['comment']['perm_write'] <= $my['level'] || $my['admin']):?>
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

	<div class="box">
		
		<div class="tt">
			<span class="title"><?php if($type == 'modify'):?>댓글수정<?php else:?>댓글쓰기<?php endif?></span>
			<span>- 타인을 비방하거나 개인정보를 유출하는 글의 게시를 삼가주세요.</span>
		</div>

		<div class="inputbox">
			<?php if(!$my['id']):?>
			<div>
				<input type="text" name="name" value="<?php echo $R['name']?>" class="input1" /> <span>(이름)</span>
				<input type="password" name="pw" value="<?php echo $pw?>" class="input1" /> <span>(패스워드)</span>
			</div>
			<?php endif?>
			<?php if($d['comment']['use_subject']):?>
			<div>
				<input type="text" name="subject" value="<?php echo htmlspecialchars($R['subject'])?>" class="input2" /> <span>(제목)</span>	
			</div>
			<?php endif?>
		</div>

		<div class="editbox">
			<textarea name="content" id="editFrameContent" class="content"><?php if(!$my['uid']):?>로그인하셔야 이용하실 수 있습니다.<?php endif?></textarea>
		
		</div>		

		<div class="bottom">
				<?php if($type=='modify'):?><input type="image" src="<?php echo $g['img_module_skin']?>/btn_cancel.gif" alt="취소" class="hand" onclick="history.back();"><?php endif?>
				<?php if($type=='modify'):?><input type="image" src="<?php echo $g['img_module_skin']?>/btn_modify.gif" alt="댓글수정" /><?php else:?><input type="image" src="<?php echo $g['img_module_skin']?>/btn_write.gif" alt="댓글등록" /><?php endif?>			
				<?php if($d['comment']['use_hidden']):?>
				<input type="checkbox" name="hidden" value="1"<?php if($R['hidden']):?> checked="checked"<?php endif?> /><span class="name">비밀글</span>
				<?php endif?>
				<?php if(!$R['uid']&&is_file($g['path_module'].$d['comment']['snsconnect'])):?>
				&nbsp;&nbsp;SNS동시등록 - 
				<?php include_once $g['path_module'].$d['comment']['snsconnect']?>
				<?php endif?>
		</div>

	</div>

	</form>
	<?php else:?>
	<?php if(!$my['uid']):?>
	<div class="box">
		<div class="tt">
			댓글쓰기
			<span>- 로그인한 후 댓글작성권한이 있을 경우 이용하실 수 있습니다.</span>
			<span class="login"><img src="<?php echo $g['img_module_skin']?>/btn_login.gif" alt="로그인" class="hand" onclick="commentLogin();"></span>
		</div>
	</div>
	<?php endif?>
	<?php endif?>


</div>





