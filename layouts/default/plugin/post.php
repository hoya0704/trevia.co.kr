<div class="post">
	<div class="tt">최근게시물</div>
	<ul>
	<?php $_RCD=getDbArray($table['bbsdata'],'display=1 and site='.$s,'*','gid','asc',$d['layout']['postnum'],1)?>
	<?php while($_R=db_fetch_array($_RCD)):?>
	<li>
		<a href="<?php echo getPostLink($_R)?>" title="<?php echo $_R[$_HS['nametype']]?>님"><?php echo $_R['subject']?></a>
		<?php if($_R['comment']):?><span class="comment">[<?php echo $_R['comment']?><?php if($_R['oneline']):?>+<?php echo $_R['oneline']?><?php endif?>]</span><?php endif?>
		<?php if($_R['trackback']):?><span class="trackback">[<?php echo $_R['trackback']?>]</span><?php endif?>
		<?php if(getNew($_R['d_regis'],24)):?><span class="new">new</span><?php endif?>
	</li>
	<?php endwhile?>
	<?php if(!db_num_rows($_RCD)):?><li class="none">등록된 게시물이 없습니다.</li><?php endif?>
	</ul>
</div>