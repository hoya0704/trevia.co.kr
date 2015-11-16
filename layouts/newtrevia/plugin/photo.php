<div class="photo">
	<div class="tt">최근사진</div>
	<?php $_RCD=getDbArray($table['s_upload'],'site='.$s." and type=2 and ext='jpg'",'*','gid','asc',6,1)?>
	<?php for($i = 0; $i < 6; $i++):?>
	<?php $_R=db_fetch_array($_RCD)?>
	<div class="pic<?php if(!($i%3)):?> nomargin<?php endif?>">
		<?php if($_R['uid']):?>
		<a href="<?php echo getCyncUrl($_R['cync'])?>"><img src="<?php echo $_R['url'].$_R['folder'].'/'.$_R['thumbname']?>" alt="" title="<?php echo $_R['caption']?$_R['caption']:$_R['name']?>" /></a>
		<?php else:?>
		<img src="<?php echo $g['img_core']?>/blank.gif" alt="" />
		<?php endif?>
	</div>
	<?php endfor?>
	<div class="clear"></div>
</div>