<?php
if(!defined('__KIMS__')) exit;
?>
<?php
$recnum = 30;
$p = $p ? $p : 1;
?>
<div id="smsWrap">
	<table id="history">
	<thead>
		<tr>
			<th scope="col" width="40">구분</th>
			<th scope="col" width="60">전송시간</th>
			<th scope="col">내용</th>
			<th scope="col" width="80">전화번호</th>
			<th scope="col" width="50">작성자</th>
		</tr>
	</thead>
	<tbody>
	<?php $cntHistory=getDbRows($table['smshistory'],"")?>
	<?php $tpage=ceil($cntHistory/$recnum)?>
	<?php $resHistory=getDbArray($table['smshistory'],"","*","idx","desc",$recnum,$p)?>		
	<?php while($infoHistory=db_fetch_array($resHistory)):?>
	<?php $cpnumber=substr($infoHistory['cp'],0,3)."-".substr($infoHistory['cp'],3,4)."-".substr($infoHistory['cp'],7,4)?>
	<?php $infoMem=getDbData($table['s_mbrdata'],"memberuid=".$infoHistory['writer'],"nic")?>
	<tr>
		<td>
		<script type="text/javascript">
			var tmp = "<?php echo str_replace("\n", "", str_replace("\r", "", $infoHistory['content']))?>";
			document.write(OntextCheck2(tmp));
		</script>
		</td>
		<td class="center"><?php echo getDateFormat($infoHistory['send_date'],"Y-m-d H:i")?></td>
		<td style="font-size:9pt"><?php echo $infoHistory['content']?></td>
		<td class="center"><?php echo $cpnumber?></td>
		<td class="center"><?php echo $infoMem['nic']?></td>
	</tr>
	<?php endwhile?>
	<?php if($cntHistory < 1):?>
	<tr>
		<td colspan="3" class="empty">전송 이력이 존재하지 않습니다.</td>
	</tr>
	<?php endif?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" class="pagebox01">
				<script type="text/javascript">getPageLink(10,<?php echo $p?>,<?php echo $tpage?>,'<?php echo $g['img_core']?>/page/default')</script>
			</td>
		</tr>
	</tfoot>
	</table>
</div>