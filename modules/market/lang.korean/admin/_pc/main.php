<?php include_once $g['path_module'].$module.'/var/var.php'?>

<?php if($d['market']['url']):?>
<iframe id="marketFrame" src="<?php echo $d['market']['url']?>&amp;iframe=Y" width="720" height="500" frameborder="0" scrolling="no" allowTransparency="true"></iframe>

<!-- FTP 정보는 세션값으로 사용되며 어떠한 형태로든 수집되지 않습니다. -->
<form name="procForm" action="<?php echo $d['market']['url']?>" method="post" target="_action_frame_<?php echo $m?>">
<input type="hidden" name="m" value="qmarket" />
<input type="hidden" name="a" value="cync" />
<input type="hidden" name="f_home" value="<?php echo $r?>" />
<?php if($d['market']['ftpuse']):?>
<input type="hidden" name="f_use" value="<?php echo $d['market']['ftpuse']?>" />
<input type="hidden" name="f_host" value="<?php echo $d['market']['ftphost']?>" />
<input type="hidden" name="f_port" value="<?php echo $d['market']['ftpport']?>" />
<input type="hidden" name="f_pm" value="<?php echo $d['market']['ftppm']?>" />
<input type="hidden" name="f_id" value="<?php echo $d['market']['ftpid']?>" />
<input type="hidden" name="f_pw" value="<?php echo $d['market']['ftppw']?>" />
<input type="hidden" name="f_path" value="<?php echo $d['market']['rbpath']?>" />
<?php endif?>
</form>

<script type="text/javascript">
//<![CDATA[
window.onload=function(){document.procForm.submit();}
//]]>
</script>
<?php else:?>
<div style="padding:20px;text-align:center;border:#dfdfdf solid 5px;width:720px;font-size:13px;">
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=<?php echo $m?>&amp;module=<?php echo $module?>&amp;front=config">마켓 접속주소를 등록해 주세요.</a>
</div>
<?php endif?>