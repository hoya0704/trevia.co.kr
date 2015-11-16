<?php include_once $g['path_module'].$module.'/var/var.php'?>

<?php if($d['market']['url']):?>
<iframe id="marketFrame" src="<?php echo $d['market']['url']?>&amp;iframe=Y&amp;page=buyer/main" width="720" height="500" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
<?php else:?>
<div style="padding:20px;text-align:center;border:#dfdfdf solid 5px;width:720px;font-size:13px;">
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=<?php echo $m?>&amp;module=<?php echo $module?>&amp;front=config">마켓 접속주소를 등록해 주세요.</a>
</div>
<?php endif?>