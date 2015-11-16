<div class="counter">
Total : <?php echo number_format(getDbCnt($table['s_counter'],'sum(hit)','site='.$s))?><br />
Yesterday : <?php echo number_format(getDbCnt($table['s_counter'],'sum(hit)','site='.$s." and date='".getDateCal('Ymd',$date['totime'],-24)."'"))?><br />
Today : <?php echo number_format(getDbCnt($table['s_counter'],'sum(hit)','site='.$s." and date='".$date['today']."'"))?><br />
</div>