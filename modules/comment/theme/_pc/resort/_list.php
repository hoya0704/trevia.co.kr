<div id="clist">

	<table summary="댓글리스트입니다.">
	<caption>댓글리스트</caption> 
	<colgroup> 
	<col width="80"> 
	<col> 
	<col width="70">
	<col width="50">
	</colgroup> 
	<tbody>


	<?php $cnt=count($RCD)?>
	<?php foreach($RCD as $R):?>
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<tr class="dotline<?php if($cnt==++$_ol):?> none<?php endif?>">
	<td class="name"><a href="javascript:;"<?php if($my['admin']):?>  onclick="getMemberLayer2('<?php echo $R['mbruid']?>',event)<?php endif?>;"><?php echo $R[$_HS['nametype']]?></a></td>
	<td class="sbj">
	<?php if($R['mobile']):?><img src="<?php echo $g['img_core']?>/_public/ico_mobile.gif" class="imgpos1" alt="모바일" title="모바일(<?php echo $R['mobile']?>)로 등록된 글입니다" /><?php endif?>
	<?php echo $R['content']?>
	<?php if(getNew($R['d_regis'],24)):?><span class="new">new</span><?php endif?>
	</td>
	<td><?php echo getDateFormat($R['d_regis'],'Y-m-d')?></td>
	<td><a href="<?php echo $g['cment_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return cmentDel('<?php echo $R['id']?>',event);"><img src="<?php echo $g['img_module_skin']?>/btn_delete.gif" alt="삭제" title="삭제" /></a>&nbsp;<a href="javascript:;" onclick="doReply('<?php echo $R['uid']?>')"><img src="<?php echo $g['img_module_skin']?>/btn_modify.gif" alt="답변" title="답변" /></a></td>
	</tr>
	<?php $TCD = getDbArray($table['s_oneline'],'parent='.$R['uid'],'*','uid',$d['comment']['orderby2'],0,0);?>
	<?php while($O = db_fetch_array($TCD)):?>
	<?// echo $TPG . " = " . $p;// echo "<pre>"; print_r( $O ); echo "</pre>";?>
	<tr class="reply">
	<td>┗ <div class="icon inline"><?php echo $O['nic']?></div></td>
	<td class="sbj"><?php echo $O['content']?></td>
	<td><?php echo getDateFormat($O['d_regis'],'Y-m-d')?></td>
	<td><a href="<?php echo $g['cment_odelete'].$O['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return oneDel('<?php echo $O['id']?>');"><img src="<?php echo $g['img_module_skin']?>/btn_delete_one.gif" alt="삭제" title="삭제" /></a></td>
	</tr>
	<?php endwhile?>
	<tr id="wbox_<?php echo $R['uid']?>" class="wbox">
		<td colspan="5">
			<div>
				<form name="writeForm" method="post" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return oneCheck(this);">
				<input type="hidden" name="r" value="<?php echo $r?>" />
				<input type="hidden" name="a" value="oneline_write" />
				<input type="hidden" name="m" value="<?php echo $m?>" />
				<input type="hidden" name="parent" value="<?php echo $R['uid']?>" />
				<input type="hidden" name="hidden" value="<?php echo $R['hidden']?>" />
				<input type="hidden" name="c" value="<?php echo $c?>" />
				<input type="hidden" name="skin" value="_pc/resort" />
				<input type="hidden" name="iframe" value="<?php echo $iframe?>" />

				<table>
				<tr>
				<td><textarea name="content" id="oneline_comment"><?php if(!$my['uid']):?>로그인하셔야 이용하실 수 있습니다.<?php endif?></textarea></td>
				<td width="41" valign="bottom"><input type="image" src="<?php echo $g['img_module_skin']?>/btn_onewrite.gif" alt="등록" /></td>
				</tr>
				</table>

				</form>

			</div>
		</td>
	</tr>
	<?php endforeach?>
	<?php $R=array()?>

	<?php if(!$NUM):?>
	<tr class="none">
	<td class="sbj" colspan="5" align="center">Q&A 및 견적요청이 없습니다.</td>
	</tr>
	<?php endif?>

	</tbody>
	</table>
	
	<div class="page pagebox01">
		<script type="text/javascript">getPageLink(10,<?php echo $p?>,<?php echo $TPG?>,'<?php echo $g['img_core']?>/page/default');</script>
	</div>
	

</div>



<div id="qTilePopDiv"></div>
<script type="text/javascript">
//<![CDATA[
if (myagent != 'ie') document.captureEvents(Event.MOUSEMOVE);
document.onmousemove = get_mouse;

var skn = getId('qTilePopDiv');
var itt = '';
//]]>
</script>
