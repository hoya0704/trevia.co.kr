<div class="archiv">
<div class="tt">포스트현황</div>
<ul>
<?php for($i=0;$i<12;$i++):?>
<?php $_month = date('Ym',mktime(0,0,0,substr($date['today'],4,2)-$i,substr($date['today'],6,2),$date['year']))?>
<?php $_num = getDbCnt($table['bbsmonth'],'sum(num)',"date='".$_month."' and site=".$s)?>
<li>
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=bbs&amp;where=term&amp;keyword=<?php echo $_month?>"><?php echo getDateFormat($_month,'Y M')?></a>
<span>(<?php echo $_num?>)</span>
</li>
<?php endfor?>
</ul>
<div class="clear"></div>
</div>
