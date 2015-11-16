<?php include_once $g['path_module'].$module.'/var/var.php'?>

<div id="configbox">

	<form name="procForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" onsubmit="return saveCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="m" value="<?php echo $module?>" />
	<input type="hidden" name="a" value="config" />

	<input type="hidden" name="theme" value="<?php echo $d['upload']['theme']?>" />
	<input type="hidden" name="maxsize_file" value="<?php echo $d['upload']['maxsize_file']?>" />
	<input type="hidden" name="maxnum_file" value="<?php echo $d['upload']['maxnum_file']?>" />
	<input type="hidden" name="maxsize_img" value="<?php echo $d['upload']['maxsize_img']?>" />
	<input type="hidden" name="maxnum_img" value="<?php echo $d['upload']['maxnum_img']?>" />
	<input type="hidden" name="name_file" value="<?php echo $d['upload']['name_file']?>" />
	<input type="hidden" name="name_img" value="<?php echo $d['upload']['name_img']?>" />
	<input type="hidden" name="ext_file" value="<?php echo $d['upload']['ext_file']?>" />
	<input type="hidden" name="ext_img" value="<?php echo $d['upload']['ext_img']?>" />
	<input type="hidden" name="ext_cut" value="<?php echo $d['upload']['ext_cut']?>" />
	<input type="hidden" name="use_classicup" value="<?php echo $d['upload']['use_classicup']?>" />
	<input type="hidden" name="width_img" value="<?php echo $d['upload']['width_img']?>" />

	<?php if($xmod == 'ftp'):?>

	<div class="title">
		파일서버 연결상태
	</div>
	
	<?php $FTP_CONNECT = @ftp_connect($d['upload']['ftp_host'],$d['upload']['ftp_port'])?>
	<?php $FTP_CRESULT = @ftp_login($FTP_CONNECT,$d['upload']['ftp_user'],$d['upload']['ftp_pass'])?>
	<?php if (!$FTP_CONNECT) getLink('','','FTP서버에 연결할 수 없습니다.','-1')?>
	<?php if (!$FTP_CRESULT) getLink('','','아이디나 패스워드가 일치하지 않습니다.','-1')?>
	<?php $FTP_PWD = $FTP_PWD ? $FTP_PWD : '/'?>
	<?php $PWD_EXP = explode('/',$FTP_PWD)?>
	<?php $PWD_LEN = count($PWD_EXP)?>
	<?php if (substr($FTP_PWD,0,1)!='/') getLink('','','잘못된 접근입니다.','-1')?>
	<?php ftp_chdir($FTP_CONNECT,$FTP_PWD)?>
	<?php $FTP_LIST = ftp_rawlist($FTP_CONNECT,$FTP_PWD)?>

<pre class="ftplist">
<div class="pwd"><a href="<?php echo $g['adm_href']?>&amp;xmod=<?php echo $xmod?>">처음</a><?php $i=0; $_xval=''; foreach ($PWD_EXP as $val): $_xval .= $val.'/'?><a href="<?php echo $g['adm_href']?>&amp;xmod=<?php echo $xmod?>&amp;FTP_PWD=<?php echo $_xval?>"><?php echo $val?></a><?php if($i<$PWD_LEN-1):?>/<?php endif?><?php $i++; endforeach?><div>
<?php foreach($FTP_LIST as $val):?>
<?php if(substr($val,0,1)=='d'):?>
<?php $valexp=explode(' ',$val)?>
<a href="<?php echo $g['adm_href']?>&amp;xmod=<?php echo $xmod?>&amp;FTP_PWD=<?php echo $FTP_PWD.$valexp[count($valexp)-1]?>/" class="b"><?php echo $val?></a> 
<?php else:?>
<?php echo $val?> 
<?php endif?>
<?php endforeach?>

</pre>

	<?php ftp_close($FTP_CONNECT)?>
	<?php endif?>

	<div class="title">
		파일서버 설정
	</div>

	<div class="notice">
		파일서버를 별도로 분리하여 운영하고자 할 경우 사용합니다.<br />
		이 모듈을 통해 업로드되는 모든 첨부파일들은 지정된 파일서버로 전송됩니다.<br />
		전용서버가 아니면 파일업로드 및 삭제/갱신시에 오히려 더 느려질 수 있습니다.<br />
		반드시 필요한 경우가 아니라면 사용을 권장하지 않습니다.
	</div>


	<table>
		<tr>
			<td class="td1">파일서버 사용</td>
			<td class="td2">
				<input type="checkbox" name="use_fileserver" value="1"<?php if($d['upload']['use_fileserver']):?> checked="checked"<?php endif?> />별도의 파일서버를 사용합니다.
			</td>
		</tr>
		<tr>
			<td class="td1">FTP주소/포트</td>
			<td class="td2">
				<input type="text" name="ftp_host" value="<?php echo $d['upload']['ftp_host']?>" size="20" class="input" />
				<input type="text" name="ftp_port" value="<?php echo $d['upload']['ftp_port']?>" size="5" class="input" />
				<input type="button" class="btngray" value=" FTP연결조회 " onclick="ftpConnect();" />
			</td>
		</tr>
		<tr>
			<td class="td1">아이디</td>
			<td class="td2">
				<input type="text" name="ftp_user" value="<?php echo $d['upload']['ftp_user']?>" size="20" class="input" />
			</td>
		</tr>
		<tr>
			<td class="td1">패스워드</td>
			<td class="td2 guide">
				<input type="password" name="ftp_pass" value="<?php echo $d['upload']['ftp_pass']?>" size="20" class="input" />
			</td>
		</tr>

		<tr>
			<td class="td1">첨부폴더</td>
			<td class="td2">
				<input type="text" name="ftp_folder" value="<?php echo $d['upload']['ftp_folder']?$d['upload']['ftp_folder']:$FTP_PWD?>" size="20" class="input" />
				<div class="guide">
					FTP접속시 최상위폴더로 부터 실제 첨부할 폴더의 경로를 입력해 주세요.<br />
					FTP연결조회 버튼을 클릭하면 연결된 FTP사이트의 파일경로를 확인할 수 있습니다.<br />
					거기에서 처음을 제외한 슬래쉬(/) 포함 경로를 지정해 주세요.<br />
					경로의 처음과 마지막은 반드시 슬래쉬(/)이어야 합니다.<br />
					보기) /public_html/files/<br />
				</div>
			</td>
		</tr>
		<tr>
			<td class="td1">URL경로</td>
			<td class="td2">
				<input type="text" name="ftp_urlpath" value="<?php echo $d['upload']['ftp_urlpath']?>" size="55" class="input" />
				<div class="guide">
					첨부폴더를 웹상에서 접근할 수 있는 URL주소를 http://포함하여 입력해 주세요.<br />
					경로의 마지막은 반드시 슬래쉬(/)로 끝나야 합니다.<br />
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
function ftpConnect()
{
	var f = document.procForm;
	if (f.ftp_host.value == '')
	{
		alert('FTP주소를 입력해 주세요.');
		f.ftp_host.focus();
		return false;
	}
	if (f.ftp_port.value == '')
	{
		alert('FTP포트를 입력해 주세요.');
		f.ftp_port.focus();
		return false;
	}
	if (f.ftp_user.value == '')
	{
		alert('아이디를 입력해 주세요.');
		f.ftp_user.focus();
		return false;
	}
	if (f.ftp_pass.value == '')
	{
		alert('패스워드를 입력해 주세요.');
		f.ftp_pass.focus();
		return false;
	}

	location.href = '<?php echo str_replace('&amp;','&',$g['adm_href'])?>&xmod=ftp';
}
function saveCheck(f)
{
	if (f.use_fileserver.checked == true)
	{
		if (f.ftp_host.value == '')
		{
			alert('FTP주소를 입력해 주세요.');
			f.ftp_host.focus();
			return false;
		}
		if (f.ftp_port.value == '')
		{
			alert('FTP포트를 입력해 주세요.');
			f.ftp_port.focus();
			return false;
		}
		if (f.ftp_user.value == '')
		{
			alert('아이디를 입력해 주세요.');
			f.ftp_user.focus();
			return false;
		}
		if (f.ftp_pass.value == '')
		{
			alert('패스워드를 입력해 주세요.');
			f.ftp_pass.focus();
			return false;
		}
		if (f.ftp_folder.value == '')
		{
			alert('첨부폴더명을 입력해 주세요.');
			f.ftp_folder.focus();
			return false;
		}
		if (f.ftp_urlpath.value == '')
		{
			alert('URL경로를 입력해 주세요.');
			f.ftp_urlpath.focus();
			return false;
		}
	}
	return confirm('정말로 실행하시겠습니까?         ');
}
//]]>
</script>
