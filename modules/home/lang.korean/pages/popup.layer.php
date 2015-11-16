<?php
$R = getUidData($table['s_popup'],$uid);
if (!$R['uid']) getLink('','','','close');
?>


<div id="poplayer">

	<div class="popupbody" style="height:<?php echo ($R['height']-25)?>px;overflow-x:hidden;overflow-y:<?php echo $R['scroll']?'auto':'hidden'?>;">
	<?php echo getContents($R['content'],$R['html'],'')?>
	</div>
	<div class="popclose">
		<input type="checkbox" id="popCheck" />
		오늘 하루 이창을 그만 엽니다.
		<img src="<?php echo $g['img_module_skin']?>/event_close_btn.gif" alt="창닫기" class="hand" onclick="hidePopupLayer('<?php echo $R['uid']?>');" />
	</div>

	<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['url_module_mode']?>.css" />
</div>
<script type="text/javascript">
//<![CDATA[

var pg = parent.getId('_action_layer_popup');
var ng = getId('poplayer');

pg.style.position = 'absolute';
pg.style.width = '<?php echo $R['width']?>';
pg.style.height = '<?php echo $R['height']?>';
pg.style.top = '0px';
pg.style.left = '0px';

ng.style.margin = '<?php echo $R['center']?'auto':'0'?>';
ng.style.position = 'relative';
ng.style.zIndex = '<?php echo (10000+$R['uid'])?>';
<?php if($R['center']):?>
ng.style.top = (parseInt((parseInt(window.screen.height)-<?php echo $R['height']?>)/2) + <?php echo $R['ptop']?>)+'px';
<?php else:?>
ng.style.top = '<?php echo $R['ptop']?>px';
<?php endif?>
ng.style.left = '<?php echo $R['pleft']?>px';
ng.style.width = '<?php echo $R['width']?>px';
ng.style.height = '<?php echo $R['height']?>px';

pg.innerHTML = document.body.innerHTML;
//]]>
</script> 

