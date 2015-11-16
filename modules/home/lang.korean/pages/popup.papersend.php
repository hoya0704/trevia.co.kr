<?php
if (!$my['uid']) getLink('','','권한이 없습니다.','close');
include_once $g['path_module'].'member/var/var.join.php';
if ($uid)
{
	$R = getDbData($table['s_paper'],'uid='.$uid.' and my_mbruid='.$my['uid'],'*');
	if (!$R['uid'] || !$R['by_mbruid']) getLink('','','','close');
	$M = getDbData($table['s_mbrdata'],'memberuid='.$R['by_mbruid'],'*');
	if (!$M['memberuid']) getLink('','','존재하지 않거나 탈퇴한 회원입니다.','close');
	$M1= getUidData($table['s_mbrid'],$M['memberuid']);
}
?>

<div id="paperbox">

	<form name="procForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" onsubmit="return submitCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="m" value="member" />
	<input type="hidden" name="a" value="paper_send" />
	<input type="hidden" name="parent" value="<?php echo $R['uid']?>" />


	<div class="direct<?php if(!$R['uid']):?>1<?php endif?>">
	<?php if (!$g['mobile']||$_SESSION['pcmode']=='Y'):?><a href="#" onclick="directMsg();">쪽지함 바로가기</a><?php endif?>
	</div>

	<div class="line1"></div>
	<div class="line2"></div>
	<div class="line3"></div>
	
	<div class="wrap">
			
		<div class="i1<?php if ($g['mobile']&&$_SESSION['pcmode']!='Y'):?>1<?php endif?>">
		<?php if($uid):?>
		<span class="b">받는사람</span> : 
		<?php echo $M['name']?>(<?php echo $M['nic']?>)
		<input type="hidden" name="id" value="<?php echo $d['member']['login_emailid']?$M['email']:$M1['id']?>" />
		<?php else:?>
		<div>
		<span class="b">내친구들 리스트</span> : 

		<?php $FLIST=getDbArray($table['s_friend'],'by_mbruid='.$my['uid'],'*','uid','desc',0,1)?>
		<select onchange="friendSelect(this);">
		<option value="">&nbsp+ 팔로워(<?php echo number_format(db_num_rows($FLIST))?>명) 선택하기</option>
		<option value="">----------------------------------------------</option>
		<?php while($F=db_fetch_array($FLIST)):?>
		<?php $FM1=getUidData($table['s_mbrid'],$F['my_mbruid'])?>
		<?php $FM2=getDbData($table['s_mbrdata'],'memberuid='.$FM1['uid'],'*')?>
		<option value="<?php echo $d['member']['login_emailid']?$FM2['email']:$FM1['id']?>">ㆍ<?php echo $FM2[$_HS['nametype']]?>(<?php echo $d['member']['login_emailid']?$FM2['email']:$FM1['id']?>)</option>
		<?php endwhile?>
		</select>
		</div>
		<div>
		<span class="b">받는사람 <?php echo $d['member']['login_emailid']?'이메일':'아이디'?></span> : 
		<input type="text" name="id" value="<?php echo $id?>" class="input" title="여러사람에게 보내시려면 콤마(,)로 구분해 주세요." />
		</div>
		<?php endif?>
		</div>

		<textarea name="msg" rows="10" cols="50" class="msg<?php if ($g['mobile']&&$_SESSION['pcmode']!='Y'):?>1<?php endif?>"></textarea>

		<div class="footer">
			<input type="submit" value=" 보내기 " class="btnblue b" onclick="" />
			<input type="button" value=" 취소 " class="btngray" onclick="top.close();" />
		</div>
	</div>

	</form>
</div>



<script type="text/javascript">
//<![CDATA[
function directMsg()
{
	var x = opener.frames.name == '' ? opener : opener.parent;
	x.location.href = '<?php echo $g['s']?>/?r=<?php echo $r?>&mod=mypage&page=paper';
	top.close();
}
function friendSelect(obj)
{
	var f = obj.form;
	var i = f.id;

	if (obj.value != '')
	{
		if ((','+i.value+',').indexOf(obj.value) == -1)
		{
			i.value = obj.value + ',' +i.value;
		}
		obj.value = '';
	}
}
function submitCheck(f)
{
	if (f.id.value == '')
	{
		alert('받는사람 아이디를 입력해 주세요.    ');
		f.id.focus();
		return false;
	}
	if (f.msg.value == '')
	{
		alert('메세지를 입력해 주세요.    ');
		f.msg.focus();
		return false;
	}
}


<?php if ($g['mobile']&&$_SESSION['pcmode']!='Y'):?>
top.resizeTo(330,360);
<?php else:?>
<?php if($R['uid']):?>
top.resizeTo(430,360);
<?php else:?>
top.resizeTo(430,410);
<?php endif?>
<?php endif?>

document.title = "쪽지보내기";
//]]>
</script> 

