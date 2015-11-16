<div class="post">
	<div class="tt">최근댓글</div>
	<ul>
	<?php $_RCD=getDbArray($table['s_comment'],'display=1 and site='.$s,'*','uid','asc',$d['layout']['commentnum'],1)?>
	<?php while($_R=db_fetch_array($_RCD)):?>
	<li>
		<a href="<?php echo getCyncUrl($_R['cync'].',CMT:'.$_R['uid'])?>#CMT" title="<?php echo $_R[$_HS['nametype']]?>님"><?php echo $_R['subject']?></a>
		<?php if($_R['oneline']):?><span class="comment">[<?php echo $_R['oneline']?>]</span><?php endif?>
		<?php if(getNew($_R['d_regis'],24)):?><span class="new">new</span><?php endif?>
	</li>
	<?php endwhile?>
	<?php if(!db_num_rows($_RCD)):?><li class="none">등록된 댓글이 없습니다.</li><?php endif?>
	</ul>
</div>