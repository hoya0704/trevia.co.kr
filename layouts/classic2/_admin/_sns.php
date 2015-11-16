<div class="guide">
<span class="b">소셜로그인 서비스로 방문자의 쉬운 접근을 유도해 보세요.</span><br /><br />
소셜로그인 서비스를 위해서는 소셜링크 모듈을 설치해야 합니다.<br />
이 모듈은 <a href="http://www.kimsq.com/?r=home&m=qmarket&page=view&uid=26" target="_blank" class="u">킴스큐 마켓</a>에서 구매하실 수 있습니다.<br />
<?php if(is_dir($g['path_module'].'social')):?>
<span class="emp">(이 패키지는 소셜링크 모듈이 설치되어 있습니다)</span><br />
<?php else:?>
<span class="emp">(이 패키지는 소셜링크 모듈이 설치되어 있지 않습니다)</span><br />
<?php endif?>
</div>

<form name="themeForm" method="post" action="<?php echo $g['s']?>/" onsubmit="return configCheck(this);">
<input type="hidden" name="r" value="<?php echo $r?>" />
<input type="hidden" name="_layoutAction" value="config" />
<input type="hidden" name="nowLayout" value="<?php echo $d['layout']['dir']?>" />
<input type="hidden" name="changeType" value="<?php echo $_themeConfig?>" />


<table>
<tr>
<td class="t1">소셜로그인 지원</td>
<td class="t2">:</td>
<td class="t3">
	<label><input type="checkbox" name="sns_use" value="1"<?php if($d['layout']['sns_use']):?> checked="checked"<?php endif?> />사용함</label><br />
</td>
</tr>
<tr>
<td></td>
<td></td>
<td><div class="small"><br />소셜링크 모듈 설치 후 각각의 SNS 서비스에 APP을 등록해야 실 서비스를 할 수 있습니다.</div></td>
</tr>

<tr>
<td></td>
<td></td>
<td><br /><br /><input type="submit" value=" 변경하기 " class="btnblue" /></td>
</tr>
</table>

</form>