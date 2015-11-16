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
		<div class="inputbox">
			<?php if(!$my['id']):?>
			<li><input type="text" name="name" value="<?php echo $R['name']?>" class="input1" /> </li>
			<li><input type="password" name="pw" value="<?php echo $pw?>" class="input1" /></li>
			<?php endif?>			
		</div>

		<div class="editbox1">
			<input type="hidden" name="html" id="editFrameHtml" value="<?php echo $R['html']?$R['html']:'HTML'?>" />
			<input type="hidden" name="content" id="editFrameContent" value="<?php echo htmlspecialchars($R['content'])?>" />
			<iframe name="editFrame" id="editFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $R['upload']?'Y':'N'?>" width="<?php if($my['id']):?>800px<?php else:?>530px<?php endif?>" height="39px" frameborder="0" scrolling="no"></iframe>		
			<input type="image" src="<?php echo $g['img_module_skin']?>/btn_write.gif" alt="의견등록" />
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