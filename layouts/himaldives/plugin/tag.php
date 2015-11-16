<div class="tags">
	<div class="tt">태그</div>
	<div class="items">

		<?php $d_regis1 = date('Ymd',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-7,substr($date['today'],0,4)))?>
		<?php $d_regis2 = $date['today']?>
		<?php $WHEREIS1 = 'site='.$s.' and date between '.$d_regis1.' and '.$d_regis2?>
		<?php $_RCD=getDbArray($table['s_tag'],$WHEREIS1,'*','hit','desc',20,1)?>
		<?php while($TG=db_fetch_array($_RCD)):?>
		<?php $TARR[]=array($TG['keyword'],$k++)?>
		<?php endwhile?>
		<?php $TGN=count($TARR)?>
		<?php if($TGN)shuffle($TARR)?>
		
		<?php $x2 = 0?>
		<?php $x1 = 5?>
		<?php for($i = 0; $i < $TGN; $i++):?>
		<?php $TCNUM=$TARR[$i][1]>$x1?1:($TARR[$i][1]>$x2?2:3)?>

		<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=search&amp;keyword=<?php echo urlencode($TARR[$i][0])?>"><span class="tags_<?php echo $TCNUM?>"><?php echo $TARR[$i][0]?></span></a>
		<?php endfor?>
		<?php if(!db_num_rows($_RCD)):?><span class="none">등록된 태그가 없습니다.</span><?php endif?>

	</div>
</div>