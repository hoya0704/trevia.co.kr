<div id="clist">
	
	<?php include_once $g['dir_module_skin'].'_func.php'?>
	<?php $RCD=$NCD+$RCD?>
	<?php foreach($RCD as $R):?>
	<?php $isSECRETCHECK=true?>
	<?php $M = getDbData($table['s_mbrdata'],'memberuid='.$R['mbruid'],'*');?>
	<div class = "comment">
		<table>
			<tr>
				<td width="80" class="td1"><?php if($M['level']):?><img src="<?php echo $g['img_module_skin']?>/level/<?php echo $M['level']?>.gif" alt=""  /><?php endif?><?php echo $R[$_HS['nametype']]?></td>
				<td width="650" class="td2"><?php echo getContents($R['content'],$R['html'])?><?php if(getNew($R['d_regis'],24)):?><span class="new"><img src="<?php echo $g['img_module_skin']?>/new.gif"></span><?php endif?></td>
				<td width="100" class="td3"><?php echo getDateFormat($R['d_regis'],'y.m.d H:i')?></td>
				<td width="20" class="td4"><a href="<?php echo $g['cment_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return cmentDel('<?php echo $R['id']?>','<?php echo $R['uid']?>',event);"><img src="<?php echo $g['img_module_skin']?>/btn_delete.gif" alt="삭제" title="삭제" /></a></td>
			</tr>
		</table>
	</div>

	<div class="line"></div>
	<?php endforeach?>
	<?php $R=array()?>


	<div class="page pagebox01">
		<script type="text/javascript">getPageLink(10,<?php echo $p?>,<?php echo $TPG?>,'<?php echo $g['img_core']?>/page/default');</script>
	</div>
	

</div>



<div id="pwbox">
	<div id="chkbox">

		<div class="msg">
			<h3><img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" /> 비밀번호 확인</h3>
			<div>댓글 등록시에 입력했던 비밀번호를 입력해 주세요.</div>
		</div>

		<form name="checkForm" method="post" action="<?php echo $g['s']?>/" onsubmit="return permCheck(this);">
		<input type="hidden" name="a" value="" />
		<input type="hidden" name="type" value="" />
		<input type="hidden" name="c" value="<?php echo $c?>" />
		<input type="hidden" name="m" value="<?php echo $m?>" />
		<input type="hidden" name="skin" value="<?php echo $skin?>" />
		<input type="hidden" name="iframe" value="<?php echo $iframe?>" />
		<input type="hidden" name="p" value="<?php echo $p?>" />
		<input type="hidden" name="sort" value="<?php echo $sort?>" />
		<input type="hidden" name="orderby" value="<?php echo $orderby?>" />
		<input type="hidden" name="recnum" value="<?php echo $recnum?>" />		
		<input type="hidden" name="where" value="<?php echo $where?>" />
		<input type="hidden" name="keyword" value="<?php echo $_keyword?>" />
		<input type="hidden" name="uid" value="" />

		<div class="ibox">
			<input type="password" name="pw" class="input" />
			<input type="submit" value=" 확인 " class="btnblue" />
			<input type="button" value=" 취소 " class="btngray" onclick="cmentDelClose();" />
		</div>

		</form>
	</div>
</div>
