<?php include_once $g['path_module'].$module.'/var/var.php'?>

<div id="configbox">

	<form name="procForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" onsubmit="return saveCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="m" value="<?php echo $module?>" />
	<input type="hidden" name="a" value="config" />

	<div class="title">
		큐마켓 기본정보
	</div>

	<table>
		<tr>
			<td class="td1">큐마켓 URL</td>
			<td class="td2">
				<input type="text" name="url" value="<?php echo $d['market']['url']?>" size="50" class="input" />
			</td>
		</tr>
	</table>



	<div class="title">
		FTP 관련정보
	</div>


	<table>
		<tr>
			<td class="td1">자동설치사용</td>
			<td class="td2 shift">
				<input type="checkbox" name="ftpuse" value="1"<?php if($d['market']['ftpuse']):?> checked="checked"<?php endif?> />자동설치를 사용합니다.
			</td>
		</tr>
		<tr>
			<td class="td1">FTP주소/포트</td>
			<td class="td2">
				<input type="text" name="ftphost" value="<?php echo $d['market']['ftphost']?>" size="20" class="input" />
				<input type="text" name="ftpport" value="<?php echo $d['market']['ftpport']?>" size="5" class="input" />
				<input type="checkbox" name="ftppm" value="1"<?php if($d['market']['ftppm']):?> checked="checked"<?php endif?> />Passive Mode
			</td>
		</tr>
		<tr>
			<td class="td1">아이디</td>
			<td class="td2">
				<input type="text" name="ftpid" value="<?php echo $d['market']['ftpid']?>" size="20" class="input" />
			</td>
		</tr>
		<tr>
			<td class="td1">비밀번호</td>
			<td class="td2">
				<input type="password" name="ftppw" value="<?php echo $d['market']['ftppw']?>" size="20" class="input" />

				<div class="guide">
					FTP관련 정보를 등록하시면 큐마켓을 통해 실시간으로 자동설치를 지원받을 수 있습니다.<br />
					FTP정보등록을 원치 않을 경우 직접 다운로드 받아 패키지등록 페이지에서 등록하실 수 있습니다.<br />
					이 정보는 <?php echo $g['r']?>/modules/<?php echo $module?>/var/var.php 에 저장됩니다.<br />
				</div>
			</td>
		</tr>
		<tr>
			<td class="td1">킴스큐Rb 경로</td>
			<td class="td2">
				<input type="text" name="rbpath" value="<?php echo $d['market']['rbpath']?>" size="20" class="input" />

					<div class="guide">
					FTP접속시 최상위폴더로 부터 rb 폴더의 절대경로를 입력해 주세요.<br />
					경로의 처음과 마지막은 반드시 슬래쉬(/)이어야 합니다.<br />
					보기) /public_html/rb/<br />

				</div>
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
function saveCheck(f)
{
	if (f.theme.value == '')
	{
		alert('테마를 선택해 주세요.       ');
		f.theme.focus();
		return false;
	}
	return confirm('정말로 실행하시겠습니까?         ');
}
//]]>
</script>

