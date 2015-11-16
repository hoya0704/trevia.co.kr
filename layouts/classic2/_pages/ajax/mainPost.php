<?php 
$_R=getUidData($table['bbsdata'],$uid);
$_IMGS = getImgs($_R['content'],'jpg|jpeg');
?>

[RESULT:

<div class="mleft">
	<div class="mwrap">
		<h1><?php echo $_R['subject']?></h1>
		<div class="cont">
		<p><?php echo nl2br(getStrCut(getStripTags($_R['content']),350,'..'))?></p>
		</div>
	</div>
	<div class="btnbox">
	<a href="<?php echo getPostLink($_R)?>"><img src="<?php echo $g['img_layout']?>/btn_detail.gif" alt="자세히 보기" /></a>
	</div>
</div>
<div class="mright">
	<div><img src="<?php echo $_IMGS[0]?$_IMGS[0]:$g['img_layout'].'/pic_main.png'?>" alt="" /></div>
</div>

:RESULT]

