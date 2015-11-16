<?php
if (!$my['uid']) getLink('','','권한이 없습니다.','close');

$sort	= $sort ? $sort : 'uid';
$orderby= $orderby ? $orderby : 'desc';
$recnum	= 1;

if ($uid)
{
	$R = getDbData($table['s_paper'],'uid='.$uid.' and (my_mbruid='.$my['uid'].' or by_mbruid='.$my['uid'].')','*');
	$NUM = 1;
	$TPG = 1;
}
else {
	$sqlque = 'my_mbruid='.$my['uid'].' and inbox=1';
	$RCD = getDbArray($table['s_paper'],$sqlque,'*',$sort,$orderby,$recnum,$p);
	$R = db_fetch_array($RCD);
	$NUM = getDbRows($table['s_paper'],$sqlque);
	$TPG = getTotalPage($NUM,$recnum);
}
if (!$R['uid']) getLink('','','','close');
if ($R['by_mbruid'])
{
	$M = getDbData($table['s_mbrdata'],'memberuid='.$R['by_mbruid'],'*');
}
if (!$R['d_read'])
{
	getDbUpdate($table['s_paper'],"d_read='".$date['totime']."'",'uid='.$R['uid']);
}
if ($my['is_paper'])
{
	getDbUpdate($table['s_mbrdata'],'is_paper=0','memberuid='.$my['uid']);
}
?>

<div id="paperbox">

	<div class="direct">
	<?php if (!$g['mobile']||$_SESSION['pcmode']=='Y'):?><a href="#" onclick="directMsg();">쪽지함 바로가기</a><?php endif?>
	</div>

	<div class="line1"></div>
	<div class="line2"></div>
	<div class="line3"></div>
	
	<div class="wrap">
		
		<?php if($R['by_mbruid']==$my['uid']):?>
		<?php $M1 = getDbData($table['s_mbrdata'],'memberuid='.$R['my_mbruid'],'*')?>
		<div class="i1"><span class="b">수신회원</span> : <?php if($M1['memberuid']):?><?php echo $M1['name']?>(<?php echo $M1['nic']?>)<?php else:?>관리자<?php endif?></div>
		<div class="i1"><span class="b">쪽지확인</span> : <span class="date"><?php echo $R['d_read'] ? getDateFormat($R['d_read'],'Y-m-d H:i') : '미확인'?></span></div>
		<?php else:?>
		<div class="i1"><span class="b">보낸사람</span> : <?php if($M['memberuid']):?><?php echo $M['name']?>(<?php echo $M['nic']?>)<?php else:?>관리자<?php endif?></div>
		<div class="i1"><span class="b">보낸시간</span> : <span class="date"><?php echo getDateFormat($R['d_regis'],'Y-m-d H:i')?></span></div>
		<?php endif?>
		<div class="msg<?php if ($g['mobile']&&$_SESSION['pcmode']!='Y'):?>1<?php endif?> scrollbar01"><?php echo getContents($R['content'],$R['html'],'')?></div>

		<div class="pagebox01">
			<script type="text/javascript">getPageLink(5,<?php echo $p?>,<?php echo $TPG?>,'<?php echo $g['img_core']?>/page/default');</script>
		</div>

		<div class="footer">
			<?php if($R['my_mbruid']==$my['uid']):?>
			<?php if($R['by_mbruid']):?>
			<input type="button" value=" 답장 " class="btnblue b" onclick="location.href = '<?php echo $g['s']?>/?r=<?php echo $r?>&system=popup.papersend&iframe=Y&uid=<?php echo $R['uid']?>';" />
			<?php endif?>
			<?php if($R['inbox']==1):?>
			<input type="button" value=" 보관 " class="btngray" onclick="actCheck('paper_save');" />
			<?php endif?>
			<input type="button" value=" 삭제 " class="btngray" onclick="actCheck('paper_delete');" />
			<?php endif?>
			<input type="button" value=" 닫기 " class="btngray" onclick="top.close();" />
		</div>
	</div>
</div>


<form name="procForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" onsubmit="return submitCheck(this);">
<input type="hidden" name="m" value="member" />
<input type="hidden" name="a" value="" />
<input type="checkbox" name="members[]" value="<?php echo $R['uid']?>" checked="checked" class="hide" />
</form>


<script type="text/javascript">
//<![CDATA[
function directMsg()
{
	opener.location.href = '<?php echo $g['s']?>/?r=<?php echo $r?>&mod=mypage&page=paper';
	top.close();
}
function actCheck(act)
{
	if (confirm('정말로 실행하시겠습니까?  '))
	{
		var f = document.procForm;
		f.a.value = act;
		f.submit();
	}
}

<?php if ($g['mobile']&&$_SESSION['pcmode']!='Y'):?>
top.resizeTo(330,360);
<?php else:?>
top.resizeTo(430,430);
<?php endif?>

document.title = "쪽지알림";
//]]>
</script> 

