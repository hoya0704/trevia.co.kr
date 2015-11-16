<?php if($d['layout']['bbs1']):?>
<?php $_sort=explode(',',$d['layout']['sort1'])?>
<?php $_date=$d['layout']['bbs1_day']!=''?date('YmdHis',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-$d['layout']['bbs1_day'],$date['year'])):0?>
<?php $_RCD=getDbArray($table['bbsdata'],'bbs='.$d['layout']['bbs1'].' and display=1 and d_regis > '.$_date,'*',$_sort[0],$_sort[1],6,1)?>
<?php $_R=db_fetch_array($_RCD)?>

<div class="mainbox">
	<?php if($_R['uid']):?>
	<?php $_IMGS=getImgs($_R['content'],'jpg|jpeg')?>
	<div id="_getMainPost_" class="wrap">
		
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
		<div class="clear"></div>

	</div>
	<?php endif?>
</div>

<div class="wrap">
	<div class="picbox">
		
		<?php for($i=1;$i<6;$i++):$_R=db_fetch_array($_RCD);$_thumbimg=getUploadImage($_R['upload'],$_R['d_regis'],$_R['content'],'jpg|jpeg')?>
		<?php if($_R['uid']):?>
		<div class="border<?php if($i==5):?> plast<?php endif?>" onclick="getMainPost(<?php echo $_R['uid']?>);"><div><img src="<?php echo $_thumbimg?$_thumbimg:$g['img_layout'].'/noimage.png'?>" alt="" /></div></div>
		<?php else:?>
		<div class="border<?php if($i==5):?> plast<?php endif?>"><div></div></div>
		<?php endif?>
		<?php endfor?>
		<div class="clear"></div>
	</div>
</div>
<?php endif?>
<?php if(!$d['layout']['bbs1']&&!$_R['uid']):?>
<?php $d['layout']['_is_mainbox']=true?>
<div class="maintop"></div>
<?php endif?>


<?php if($d['layout']['bbs2']||$d['layout']['bbs3']||$d['layout']['bbs4']):?>
<div class="topicbox wrap">
	<div class="tl">
		<?php if($d['layout']['bbs2']):?>
		<?php $_B=getUidData($table['bbslist'],$d['layout']['bbs2'])?>
		<?php $_sort=explode(',',$d['layout']['sort2'])?>
		<?php $_date=$d['layout']['bbs2_day']!=''?date('YmdHis',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-$d['layout']['bbs2_day'],$date['year'])):0?>
		<?php $_RCD=getDbArray($table['bbsdata'],'bbs='.$d['layout']['bbs2'].' and display=1 and d_regis > '.$_date,'*',$_sort[0],$_sort[1],$d['layout']['bbs2_num'],1)?>
		<?php $_R=db_fetch_array($_RCD)?>

		<div class="tt">
			<div class="ts"><?php echo $_B['name']?></div>
			<div class="tmore"><a href="<?php echo RW('m=bbs&bid='.$_B['id'])?>">더보기</a></div>
			<div class="clear"></div>
		</div>
		<?php if($_R['uid']):?>
		<?php $_IMG=getImgs($_R['content'],'jpg|jpeg')?>
		<div class="thumb"><a href="<?php echo getPostLink($_R)?>"><img src="<?php echo $_IMG[0]?$_IMG[0]:$g['img_core'].'/blank.gif'?>" alt="" /></a></div>
		<div class="tsubject"><a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a></div>
		<div class="tdate"><?php echo getDateFormat($_R['d_regis'],'Y.m.d')?> , <?php echo $_R['comment']+$_R['oneline']?> Comment<?php if($_R['comment']+$_R['oneline']>1):?>s<?php endif?></div>
		<div class="tcont"><?php echo nl2br(getStrCut(getStripTags($_R['content']),85,'..'))?></div>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<div class="tpost"><a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a><?php if($_R['comment']+$_R['oneline']):?><i>(<?php echo $_R['comment']+$_R['oneline']?>)</i><?php endif?></div>
		<?php endwhile?>
		<?php else:?>
		<div class="none"></div>
		<?php endif?>
		<?php endif?>
	</div>
	<div class="tl">
		<?php if($d['layout']['bbs3']):?>
		<?php $_B=getUidData($table['bbslist'],$d['layout']['bbs3'])?>
		<?php $_sort=explode(',',$d['layout']['sort3'])?>
		<?php $_date=$d['layout']['bbs3_day']!=''?date('YmdHis',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-$d['layout']['bbs3_day'],$date['year'])):0?>
		<?php $_RCD=getDbArray($table['bbsdata'],'bbs='.$d['layout']['bbs3'].' and display=1 and d_regis > '.$_date,'*',$_sort[0],$_sort[1],$d['layout']['bbs3_num'],1)?>
		<?php $_R=db_fetch_array($_RCD)?>

		<div class="tt">
			<div class="ts"><?php echo $_B['name']?></div>
			<div class="tmore"><a href="<?php echo RW('m=bbs&bid='.$_B['id'])?>">더보기</a></div>
			<div class="clear"></div>
		</div>
		<?php if($_R['uid']):?>
		<?php $_IMG=getImgs($_R['content'],'jpg|jpeg')?>
		<div class="thumb"><a href="<?php echo getPostLink($_R)?>"><img src="<?php echo $_IMG[0]?$_IMG[0]:$g['img_core'].'/blank.gif'?>" alt="" /></a></div>
		<div class="tsubject"><a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a></div>
		<div class="tdate"><?php echo getDateFormat($_R['d_regis'],'Y.m.d')?> , <?php echo $_R['comment']+$_R['oneline']?> Comment<?php if($_R['comment']+$_R['oneline']>1):?>s<?php endif?></div>
		<div class="tcont"><?php echo nl2br(getStrCut(getStripTags($_R['content']),85,'..'))?></div>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<div class="tpost"><a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a><?php if($_R['comment']+$_R['oneline']):?><i>(<?php echo $_R['comment']+$_R['oneline']?>)</i><?php endif?></div>
		<?php endwhile?>
		<?php else:?>
		<div class="none"></div>
		<?php endif?>
		<?php endif?>
	</div>
	<div class="tr">
		<?php if($d['layout']['bbs4']):?>
		<?php $_B=getUidData($table['bbslist'],$d['layout']['bbs4'])?>
		<?php $_sort=explode(',',$d['layout']['sort4'])?>
		<?php $_date=$d['layout']['bbs4_day']!=''?date('YmdHis',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-$d['layout']['bbs4_day'],$date['year'])):0?>
		<?php $_RCD=getDbArray($table['bbsdata'],'bbs='.$d['layout']['bbs4'].' and display=1 and d_regis > '.$_date,'*',$_sort[0],$_sort[1],$d['layout']['bbs4_num'],1)?>
		<?php $_R=db_fetch_array($_RCD)?>

		<div class="tt">
			<div class="ts"><?php echo $_B['name']?></div>
			<div class="tmore"><a href="<?php echo RW('m=bbs&bid='.$_B['id'])?>">더보기</a></div>
			<div class="clear"></div>
		</div>
		<?php if($_R['uid']):?>
		<?php $_IMG=getImgs($_R['content'],'jpg|jpeg')?>
		<div class="thumb"><a href="<?php echo getPostLink($_R)?>"><img src="<?php echo $_IMG[0]?$_IMG[0]:$g['img_core'].'/blank.gif'?>" alt="" /></a></div>
		<div class="tsubject"><a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a></div>
		<div class="tdate"><?php echo getDateFormat($_R['d_regis'],'Y.m.d')?> , <?php echo $_R['comment']+$_R['oneline']?> Comment<?php if($_R['comment']+$_R['oneline']>1):?>s<?php endif?></div>
		<div class="tcont"><?php echo nl2br(getStrCut(getStripTags($_R['content']),85,'..'))?></div>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<div class="tpost"><a href="<?php echo getPostLink($_R)?>"><?php echo $_R['subject']?></a><?php if($_R['comment']+$_R['oneline']):?><i>(<?php echo $_R['comment']+$_R['oneline']?>)</i><?php endif?></div>
		<?php endwhile?>
		<?php else:?>
		<div class="none"></div>
		<?php endif?>
		<?php endif?>
	</div>
	<div class="clear"></div>
</div>
<?php endif?>


