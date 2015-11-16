<div class="logbox">
	<?php if($my['id']):?>
	<div class="hello">
		<img src="<?php echo $g['img_core']?>/_public/ico_user.gif" alt="" />
		<a href="<?php echo RW('mod=mypage')?>"><span class="b"><?php echo $my[$_HS['nametype']]?>님</span> 안녕하세요!</a>
	</div>
	<div class="info">
		ㆍ회원등급 : <?php echo $my['level']?><br />
		ㆍ포인트 : <?php echo number_format($my['point'])?><br />
		ㆍ가입일 : <?php echo getDateFormat($my['d_regis'],'Y.m.d')?> (<?php echo -getRemainDate($my['d_regis'])?>일전)<br />
	</div>
	<div class="rbtm">
		<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=mypage&amp;page=info">정보변경</a> <span>|</span>
		<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=mypage&amp;page=simbol">사진변경</a> <span>|</span>
		<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout">로그아웃</a>
	</div>
	<?php else:?>
	<form name="LayoutLogForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" onsubmit="return layoutLogCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="a" value="login" />
	<div>
	<input type="text" name="id" value="<?php echo getArrayCookie($_COOKIE['svshop'],'|',0)?>" class="input" title="아이디" />
	<input type="password" name="pw" value="<?php echo getArrayCookie($_COOKIE['svshop'],'|',1)?>" class="input" title="패스워드" />
	</div>
	<div class="login"><input type="image" src="<?php echo $g['img_layout']?>/btn_login.gif" /></div>
	<div class="shift"><input type="checkbox" name="idpwsave" value="checked" onclick="layoutRMBpw(this);"<?php if($_COOKIE['svshop']):?> checked="checked"<?php endif?> />아이디/패스워드 기억</div>
	</form>
	<div class="rbtm">
		<a href="<?php echo RW('mod=join')?>" class="b">회원가입</a> <span>|</span>
		<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=login&amp;page=idpwsearch">아이디/패스워드찾기</a>
	</div>
	<?php endif?>
</div>