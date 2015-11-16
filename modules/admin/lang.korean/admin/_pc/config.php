
<div id="configbox">

	<form name="sendForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" onsubmit="return sendCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="m" value="<?php echo $module?>" />
	<input type="hidden" name="a" value="email_check" />

	<div class="title">
		시스템 환경
	</div>

	<table>
		<tr>
			<td class="td1">웹서버</td>
			<td>:</td>
			<td class="td2">
			<?php echo $_SERVER['SERVER_SOFTWARE']?>
			</td>
		</tr>
		<tr>
			<td class="td1">PHP버젼</td>
			<td>:</td>
			<td class="td2">
			<?php echo phpversion()?>
			</td>
		</tr>
		<tr>
			<td class="td1">MYSQL버젼</td>
			<td>:</td>
			<td class="td2">
			<?php echo db_info()?> (<?php echo $DB['type']?>)
			</td>
		</tr>
		<tr>
			<td class="td1">코어버젼</td>
			<td>:</td>
			<td class="td2">
			kimsQ-RB <?php readfile($g['path_var'].'version.txt')?>
			</td>
		</tr>
		<tr>
			<td class="td1">이메일체크</td>
			<td class="vt">:</td>
			<td class="td2">
				<input type="text" name="email" value="<?php echo $my['email']?>" class="input" />
				<input type="submit" value="이메일 전송확인" class="btngray" />

				<div class="guide">입력한 이메일주소로 전송이 되면 메일서버가 정상작동되는 상태입니다.</div>
			</td>
		</tr>
	</table>

	</form>

	<br />
	<br />


	<form name="procForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" onsubmit="return saveCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="m" value="<?php echo $module?>" />
	<input type="hidden" name="a" value="config" />

	<div class="title">
		시스템 테마
	</div>

	<table>
		<tr>
			<td class="td1">관리자테마</td>
			<td class="td2">
				
				<select name="themepc" class="select1">
				<option value="">&nbsp;+ 선택하세요</option>
				<option value="">------------------------------------</option>
				<?php $dirs = opendir($g['dir_module'].'lang.'.$_HS['lang'].'/theme/_pc')?>
				<?php while(false !== ($tpl = readdir($dirs))):?>
				<?php if($tpl=='.' || $tpl == '..')continue?>
				<option value="<?php echo $tpl?>"<?php if($d['admin']['themepc']==$tpl):?> selected="selected"<?php endif?>>ㆍ<?php echo getFolderName($g['dir_module'].'lang.'.$_HS['lang'].'/theme/_pc/'.$tpl)?>(<?php echo str_replace('.php','',$tpl)?>)</option>
				<?php endwhile?>
				<?php closedir($dirs)?>
				</select>

			</td>
		</tr>
		<tr>
			<td class="td1 m">
				(모바일모드) 
			</td>
			<td class="td2">
				
				<select name="thememobile" class="select1">
				<option value="">&nbsp;+ 선택하세요</option>
				<option value="">------------------------------------</option>
				<?php $dirs = opendir($g['dir_module'].'lang.'.$_HS['lang'].'/theme/_mobile')?>
				<?php while(false !== ($tpl = readdir($dirs))):?>
				<?php if($tpl=='.' || $tpl == '..')continue?>
				<option value="<?php echo $tpl?>"<?php if($d['admin']['thememobile']==$tpl):?> selected="selected"<?php endif?>>ㆍ<?php echo getFolderName($g['dir_module'].'lang.'.$_HS['lang'].'/theme/_mobile/'.$tpl)?>(<?php echo str_replace('.php','',$tpl)?>)</option>
				<?php endwhile?>
				<?php closedir($dirs)?>
				</select>

				<div class="guide">모바일모드는 모바일뷰를 지원하도록 제작된 모듈만 지원됩니다.</div>
			</td>
		</tr>
		<tr>
			<td class="td1">모듈메뉴접기</td>
			<td class="td2">
				<div class="shift">
				<input type="checkbox" name="autoclose" value="1"<?php if($d['admin']['autoclose']):?> checked="checked"<?php endif?> />
				가로 1024픽셀이하의 해상도에서 메뉴를 자동으로 접음
				</div>
				<div class="guide">관리자모드는 가로 1200픽셀이상의 해상도를 권장합니다.</div>
			</td>
		</tr>
	</table>





	<div class="submitbox">
		<input type="submit" class="btnblue" value=" 확인 " />
	</div>

	</form>

</div>




<script type="text/javascript">
//<![CDATA[
var sendFlag = false;
function sendCheck(f)
{
	if (sendFlag == true)
	{
		alert('이메일전송 요청중에 있습니다. 잠시만 기다려 주세요.');
		return false;
	}
	if (f.email.value == '')
	{
		alert('전송할 이메일 주소를 입력해 주세요.       ');
		f.email.focus();
		return false;
	}
	if (confirm('정말로 실행하시겠습니까?         '))
	{
		sendFlag = true;
		return true;
	}
}
function saveCheck(f)
{
	if (f.themepc.value == '')
	{
		alert('관리자테마를 선택해 주세요.       ');
		f.themepc.focus();
		return false;
	}
	if (f.thememobile.value == '')
	{
		alert('모바일모드 관리자테마를 선택해 주세요.       ');
		f.thememobile.focus();
		return false;
	}
	return confirm('정말로 실행하시겠습니까?         ');
}
//]]>
</script>




