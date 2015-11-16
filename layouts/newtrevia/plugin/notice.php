<div class="post">
	<div class="tt">공지사항</div>
	<ul>
	<?php $_RCD=getDbArray($table['bbsdata'],'notice=1 and site='.$s,'*','gid','asc',$d['layout']['noticenum'],1)?>
	<?php while($_R=db_fetch_array($_RCD)):?>
	<li>
		<a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a>
		<?php if($_R['comment']):?><span class="comment">[<?php echo $_R['comment']?><?php if($_R['oneline']):?>+<?php echo $_R['oneline']?><?php endif?>]</span><?php endif?>
		<?php if($_R['trackback']):?><span class="trackback">[<?php echo $_R['trackback']?>]</span><?php endif?>
		<?php if(getNew($_R['d_regis'],24)):?><span class="new">new</span><?php endif?>
	</li>
	<?php endwhile?>
	<?php if(!db_num_rows($_RCD)):?><li class="none">공지사항이 없습니다.</li><?php endif?>
	</ul>
</div>