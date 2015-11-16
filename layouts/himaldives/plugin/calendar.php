<?php
if ($where == 'term' && $keyword)
{
	$_yr = substr($keyword,0,4);
	$_mh = substr($keyword,4,2);
}
else {
	$_yr	= $_yr ? $_yr : $date['year'];
	$_mh	= $_mh ? $_mh : substr($date['month'],4,2);
}
$todaynum	= $date['today'];
$firstday	= mktime(0,0,0,$_mh,1,$_yr);
$startday	= date('w',$firstday);
$endday		= date('t',$firstday);

$prevyear	= date('Y',mktime(0,0,0,$_mh-1,1,$_yr));
$nextyear	= date('Y',mktime(0,0,0,$_mh+1,1,$_yr));
$prevmonth	= date('m',mktime(0,0,0,$_mh-1,1,$_yr));
$nextmonth	= date('m',mktime(0,0,0,$_mh+1,1,$_yr));

$DAYNUM = getDbSelect($table['bbsday'],"date like '".$_yr.$_mh."%' and site=".$s.' order by date asc','*');
while($_R=db_fetch_array($DAYNUM)) if($_R['num']) $_D[$_R['date']] = $_R['num'];
?>

<div class="daily">
	<a name="calendar"></a>
	<div class="tt">
		<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;_yr=<?php echo $prevyear?>&amp;_mh=<?php echo $prevmonth?>#calendar"><img src="<?php echo $g['img_layout']?>/b_prev.gif" alt="" title="이전달" /></a>
		<?php echo $_yr?>.<?php echo $_mh?>
		<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;_yr=<?php echo $nextyear?>&amp;_mh=<?php echo $nextmonth?>#calendar"><img src="<?php echo $g['img_layout']?>/b_next.gif" alt="" title="다음달" /></a>
	</div>
	<table> 
		<tr class="week">
			<td class="sunday">일</td>
			<td>월</td>
			<td>화</td>
			<td>수</td>
			<td>목</td>
			<td>금</td>
			<td>토</td>
		</tr>
	<?php for( $i = 1; $i < 7; $i++ ):?>
		<tr align="center" height="20"> 
		<?php for( $j = 0; $j < 7; $j++ ):$xday = $day+1; $pday = sprintf("%02d",$xday); $onday = $_yr.$_mh.$pday?>
			<td width="14%" class="sys_f_11d">
			<?php if((($i == 1 && $startday == $j) || $day > 0) && $day < $endday): $day++?>
			<?php if($_D[$onday]):?>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=bbs&amp;where=term&amp;keyword=<?php echo $onday?>" title="<?php echo $_D[$onday]?> Post">
				<?php if($j == 0):?>
				<span class="sunday b"><?php echo $pday?></span>
				<?php else:?>
				<span class="b"><?php echo $pday?></span>
				<?php endif?>
			</a>
			<?php else:?>
				<?php if($j == 0):?>
				<span class="sunday"><?php echo $pday?></span>
				<?php else:?>
				<?php echo $pday?>
				<?php endif?>
			<?php endif?>
			<?php else:?>&nbsp;<?php endif?>
			</td>
		<?php endfor?>
		</tr>
	<?php if($day >= $endday) break?>
	<?php endfor?>
	</table>
</div>
