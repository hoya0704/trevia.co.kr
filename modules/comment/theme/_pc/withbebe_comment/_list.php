<div id="clist">
	
	<?php include_once $g['dir_module_skin'].'_func.php'?>
	<?php $RCD=$NCD+$RCD?>
	<?php foreach($RCD as $R):?>
	<?php $isSECRETCHECK=true?>
	<?php $M = getDbData($table['s_mbrdata'],'memberuid='.$R['mbruid'],'*');?>
	<?php 
		$OCD = array();
		if ($R['oneline'])
		{
			$TCD = getDbArray($table['s_oneline'],'parent='.$R['uid'],'*','uid',$d['comment']['orderby2'],0,0);
			while($_R = db_fetch_array($TCD)) $OCD[] = $_R;
		}
	?>
	<div class = "comment">
		<table>
			<tr>
				<td class="td1"><?php if($M['level']):?><img src="<?php echo $g['img_module_skin']?>/level/<?php echo $M['level']?>.gif" alt=""  /><?php endif?><span class="hand" onclick="getMemberLayer('<?php echo $R['mbruid']?>',event);"><b><?php echo $R[$_HS['nametype']]?></b></span><span class="st">|</span><span class="date"><?php echo getDateFormat($R['d_regis'],'Y.m.d H:i')?></span><span class="st">|</span><a href="<?php echo $g['cment_action']?>singo&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 신고하시겠습니까?   ');">신고</a><span class="st">|</span><a href="<?php echo $g['cment_modify'].$R['uid']?>" onclick="return cmentModify('<?php echo $R['id']?>','<?php echo $R['uid']?>',event);">수정</a><span class="st">|</span><a href="<?php echo $g['cment_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return cmentDel('<?php echo $R['id']?>','<?php echo $R['uid']?>',event);">삭제</a><span class="st">|</span><a href="javascript:;" onclick="oneline_reply(<?php echo $R['uid']?>);" class="replybtn_<?php echo $R['uid']?>">답글달기</a></td>
			</tr>
			<tr>
				<td class="td2"><?php if($R['hidden']&&($my['nic'] == $R['nic'])):?><span class="st_secret">비밀글입니다.</span><br /><?php endif;?><?php if(!$R['hidden'] or $my['admin'] or $my['nic'] == $R['nic'] ):?><?php echo getContents($R['content'],$R['html'])?><?php if(getNew($R['d_regis'],24)):?><span class="new"><img src="<?php echo $g['img_module_skin']?>/new.gif"></span><?php endif?><?php else:?>비공개 댓글입니다. ^^*<?php endif?></td>				
			</tr>
		</table>
	</div>

	<div class="line"></div>
		<div class="wbox replybox<?php echo $R['uid']?>" style="display:none;">

				<form name="writeForm" method="post" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return oneCheck(this);">
				<input type="hidden" name="r" value="<?php echo $r?>" />
				<input type="hidden" name="a" value="oneline_write" />
				<input type="hidden" name="m" value="<?php echo $m?>" />
				<input type="hidden" name="parent" value="<?php echo $R['uid']?>" />
				<input type="hidden" name="c" value="<?php echo $c?>" />
				<input type="hidden" name="iframe" value="<?php echo $iframe?>" />

				<table>
				<tr>
				<td width="100%"><input type="checkbox" name="hidden" value="1"<?php if($R['hidden']):?> checked="checked"<?php endif?> /><span class="name">비밀답글</span></td>
				</tr>
				<tr>
				<td width="100%"><textarea name="content" id="oneline_comment"><?php if(!$my['uid']):?>로그인하셔야 이용하실 수 있습니다.<?php endif?></textarea></td>
				<td valign="bottom"><input type="image" src="<?php echo $g['img_module_skin']?>/btn_onewrite.gif" alt="등록" /></td>
				</tr>
				</table>

				</form>

			</div>

		<div class="onebox">
			
			<?php foreach($OCD as $O):?>
			<?php $O['mobile']=isMobileConnect($O['agent'])?>
			<?php $g['member']=getDbData($table['s_mbrdata'],'memberuid='.$O['mbruid'],'*')?>



			<div class="oneline<?php if($R['oneline']==++$_oi):?> none<?php endif?>">
				<div class="cont">
					<div>
					<?php if($O['mobile']):?><img src="<?php echo $g['img_core']?>/_public/ico_mobile.gif" class="imgpos" alt="모바일" title="모바일(<?php echo $O['mobile']?>)로 등록된 글입니다" /><?php endif?>
					<?php if($M['level']):?><img src="<?php echo $g['img_module_skin']?>/level/<?php echo $g['member']['level']?>.gif" alt=""  /><?php endif?><span class="hand" onclick="getMemberLayer('<?php echo $O['mbruid']?>',event);"><b><?php echo $O[$_HS['nametype']]?></b></span><span class="st">|</span><span class="date"><?php echo getDateFormat($O['d_regis'],'Y.m.d H:i')?></span><span class="st">|</span><span class="link"><a href="<?php echo $g['cment_odelete'].$O['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return oneDel('<?php echo $O['id']?>');">삭제</a></span><span class="st">|</span>
					<span class="link"><a href="<?php echo $g['cment_action']?>singo_oneline&amp;uid=<?php echo $O['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 신고하시겠습니까?   ');">신고</a></span>				
					</div>
					<div class="comment_reply">
						<?php if($O['hidden']&&($my['nic'] == $O['nic'])):?><span class="st_secret">비밀답글입니다.</span><br /><?php endif;?>
						<?php if(!$O['hidden'] or $my['admin'] or $my['nic'] == $R['nic']):?><?php echo getContents($O['content'],$O['html'])?><?php if(getNew($O['d_regis'],24)):?><span class="new"><img src="<?php echo $g['img_module_skin']?>/new.gif"></span><?php endif?><?php else:?><span class="st_secret">비공개 답글입니다. ^^*</span><br /><?php endif;?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<?php endforeach?>

			
		</div>
	
	
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
