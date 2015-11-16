<!--
///////////////////////////////////////////////////////////////////////
//         Kimsq Rb FAQ (자주하는질문) '헐크존(Hulkzone)       //
//         REDJUWEBSOLUTION : www.01044052580.com       //
//         제작관련문의 : textile96@nate.com                          //
///////////////////////////////////////////////////////////////////////
-->
<SCRIPT LANGUAGE="JavaScript">
function showsub(n)
{
	var total = document.getElementById('total_j').value;
	for (var i = 1; i <= total; i++)  //갯수 + 1
	{
		var ff = eval("document.getElementById('tdid_" + i +"')");

		if (n == i)
		{
			if(ff.style.display=="block"){
				ff.style.display = "none";
			}else{
				ff.style.display = "block";
			}
		}
		else {

			ff.style.display = "none";
		}
	}
}
</script>
<div id="bbslist">
	<div class="info">
		<div class="article">
			<?php echo number_format($NUM+count($NCD))?>개(<?php echo $p?>/<?php echo $TPG?>페이지)
			<?php if($d['bbs']['rss']):?><a href="<?php echo $g['r']?>/?m=<?php echo $m?>&amp;bid=<?php echo $B['id']?>&amp;mod=rss" target="_blank"><img src="<?php echo $g['img_core']?>/_public/ico_rss.gif" alt="rss" /></a><?php endif?>
		</div>
		<div class="category">
			<?php if($my['admin']):?>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=<?php echo $m?>&amp;&amp;uid=<?php echo $B['uid']?>"><img src="<?php echo $g['img_core']?>/_public/btn_admin.gif" alt="" title="게시판관리" /></a>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=<?php echo $m?>&amp;front=skin&amp;theme=<?php echo $d['bbs']['skin']?>"><img src="<?php echo $g['img_core']?>/_public/btn_explorer.gif" alt="" title="테마관리" /></a>
			<?php endif?>
			<?php if($B['category']):$_catexp = explode(',',$B['category']);$_catnum=count($_catexp)?>
			<select onchange="document.bbssearchf.cat.value=this.value;document.bbssearchf.submit();">
			<option value="">&nbsp;+ <?php echo $_catexp[0]?></option>
			<option value="" class="sline">-------------------</option>
			<?php for($i = 1; $i < $_catnum; $i++):if(!$_catexp[$i])continue;?>
			<option value="<?php echo $_catexp[$i]?>"<?php if($_catexp[$i]==$cat):?> selected="selected"<?php endif?>>ㆍ<?php echo $_catexp[$i]?><?php if($d['theme']['show_catnum']):?>(<?php echo getDbRows($table[$m.'data'],'site='.$s.' and notice=0 and bbs='.$B['uid']." and category='".$_catexp[$i]."'")?>)<?php endif?></option>
			<?php endfor?>
			</select>
			<?php endif?>
		</div>
		<div class="clear"></div>
	</div>
	<table summary="<?php echo $B['name']?$B['name']:'전체'?> 게시물리스트 입니다.">
	<caption><?php echo $B['name']?$B['name']:'전체게시물'?></caption> 
	<tbody>
	<?php foreach($NCD as $R):?> 
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<tr>
	<td>
		<?php if($R['uid'] != $uid):?>
		<img src="<?php echo $g['img_module_skin']?>/ico_notice.gif" alt="공지" class="notice" />
		<?php else:?>
		<span class="now">&gt;&gt;</span>
		<?php endif?>
	</td>
	<td class="sbj">
		<?php if($R['mobile']):?><img src="<?php echo $g['img_core']?>/_public/ico_mobile.gif" class="imgpos" alt="모바일" title="모바일(<?php echo $R['mobile']?>)로 등록된 글입니다" /><?php endif?>
		<a href="<?php echo $g['bbs_view'].$R['uid']?>" class="b"><?php echo getStrCut($R['subject'],$d['bbs']['sbjcut'],'')?></a>
		<?php if(strstr($R['content'],'.jpg')):?><img src="<?php echo $g['img_core']?>/_public/ico_pic.gif" class="imgpos" alt="사진" title="사진" /><?php endif?>
		<?php if($R['upload']):?><img src="<?php echo $g['img_core']?>/_public/ico_file.gif" class="imgpos" alt="첨부파일" title="첨부파일" /><?php endif?>
		<?php if($R['hidden']):?><img src="<?php echo $g['img_core']?>/_public/ico_hidden.gif" class="imgpos" alt="비밀글" title="비밀글" /><?php endif?>
		<?php if($R['comment']):?><span class="comment">[<?php echo $R['comment']?><?php if($R['oneline']):?>+<?php echo $R['oneline']?><?php endif?>]</span><?php endif?>
		<?php if($R['trackback']):?><span class="trackback">[<?php echo $R['trackback']?>]</span><?php endif?>
		<?php if(getNew($R['d_regis'],24)):?><span class="new">new</span><?php endif?>
	</td>
	<td class="name"><span class="hand" onclick="getMemberLayer('<?php echo $R['mbruid']?>',event);"><?php echo $R[$_HS['nametype']]?></span></td>
	<td class="hit b"><?php echo $R['hit']?></td>
	<td><?php echo getDateFormat($R['d_regis'],'Y.m.d H:i')?></td>
	</tr> 
	<?php endforeach?> 
<!---- //제목바 ---->
<table width="100%" cellspacing="0" cellpadding="0" border="0" >
	<tr height="29" align="center">
		<td width="0" style="height:28px;border-top:#D2D2D2 solid 1px;border-bottom:#D2D2D2 solid 1px;background:url('<?php echo $g['img_module_skin']?>/bg_list_tt.jpg');font-size:11px;font-family:dotum;font-weight:normal;color:#787878;"></td>
			<td style="height:40px;border-top:#D2D2D2 solid 1px;border-bottom:#D2D2D2 solid 1px;background:url('<?php echo $g['img_module_skin']?>/bg_list_tt.jpg');font-size:11px;font-family:dotum;font-weight:normal;color:#787878;">
		<form name="bbssearchf" action="<?php echo $g['s']?>/">
		<input type="hidden" name="r" value="<?php echo $r?>" />
		<input type="hidden" name="c" value="<?php echo $c?>" />
		<input type="hidden" name="m" value="<?php echo $m?>" />
		<input type="hidden" name="bid" value="<?php echo $bid?>" />
		<input type="hidden" name="cat" value="<?php echo $cat?>" />
		<input type="hidden" name="sort" value="<?php echo $sort?>" />
		<input type="hidden" name="orderby" value="<?php echo $orderby?>" />
		<input type="hidden" name="recnum" value="<?php echo $recnum?>" />
		<input type="hidden" name="type" value="<?php echo $type?>" />
		<input type="hidden" name="iframe" value="<?php echo $iframe?>" />
		<input type="hidden" name="skin" value="<?php echo $skin?>" />
		<?php if($d['theme']['search']):?>
		<select name="where">
		<option value="subject|tag"<?php if($where=='subject|tag'):?> selected="selected"<?php endif?>>제목+태그</option>
		<option value="content"<?php if($where=='content'):?> selected="selected"<?php endif?>>본문</option>
		<option value="name"<?php if($where=='name'):?> selected="selected"<?php endif?>>이름</option>
		<option value="nic"<?php if($where=='nic'):?> selected="selected"<?php endif?>>닉네임</option>
		<option value="id"<?php if($where=='id'):?> selected="selected"<?php endif?>>아이디</option>
		<option value="term"<?php if($where=='term'):?> selected="selected"<?php endif?>>등록일</option>
		</select>
		<input type="text" name="keyword" size="30" value="<?php echo $_keyword?>" class="input" />
		<input type="submit" value=" 검색 " class="btngray" />
		<?php endif?>
		</form>
</td>

<!---- 제목바// ---->
	<!---- 리스트// ---->
			<?$j=0; //Layer Count?>
		<?$ListNum=0; foreach($RCD as $R):$ListNum++; $j++;?>
	<tr height="26">
		<td>			
·
</td>
	<td class="sbj">
		<?php if($R['depth']):?><img src="<?php echo $g['img_core']?>/blank.gif" width="<?php echo ($R['depth']-1)*13?>" height="1"><img src="<?php echo $g['img_module_skin']?>/ico_re.gif" alt="답글" /><?php endif?>
		<?php if($R['mobile']):?><img src="<?php echo $g['img_core']?>/_public/ico_mobile.gif" class="imgpos" alt="모바일" title="모바일(<?php echo $R['mobile']?>)로 등록된 글입니다" /><?php endif?>
		<?php if($R['category']):?><span class="cat">[<?php echo $R['category']?>]</span><?php endif?>
		<A HREF="<?="#".$j?>" onclick="showsub('<?=$j;?>');" style='cursor:hand;'>
		<?php echo $R['subject']?>
		</A>
		<?php if(strstr($R['content'],'.jpg')):?><img src="<?php echo $g['img_core']?>/_public/ico_pic.gif" class="imgpos" alt="사진" title="사진" /><?php endif?>
		<?php if($R['upload']):?><img src="<?php echo $g['img_core']?>/_public/ico_file.gif" class="imgpos" alt="첨부파일" title="첨부파일" /><?php endif?>
		<?php if($R['hidden']):?><img src="<?php echo $g['img_core']?>/_public/ico_hidden.gif" class="imgpos" alt="비밀글" title="비밀글" /><?php endif?>
		<?php if($R['comment']):?><span class="comment">[<?php echo $R['comment']?><?php if($R['oneline']):?>+<?php echo $R['oneline']?><?php endif?>]</span><?php endif?>
		<?php if($R['trackback']):?><span class="trackback">[<?php echo $R['trackback']?>]</span><?php endif?>
		<?php if($my['admin']):?>
		<a href="<?php echo $g['bbs_modify'].$R['uid']?>">[E]</a>
		<a href="<?php echo $g['bbs_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 삭제하시겠습니까?');">[D]</a>
		<?php endif?>
		<?php if(getNew($R['d_regis'],24)):?><span class="new">new</span><?php endif?>
	</td>
	</tr>
	<tr>
	  <td></td>
	  <td align="left" valign="top">
			<div id='tdid_<?=$j;?>' STYLE='display:none;width:100%;background:#F0F0F0;'>
					<div id="vContent" style="text-align:left;padding:20px 20px 20px 20px;line-height:160%;font-family:dotum;font-size:12px;">
						 <!-- 내용물 -->
						<?php echo getContents($R['content'],$R['html'])?>
						<!-- //내용물 -->
					</div>
				</div>
		</td>
	</tr>
<?$i++;endforeach?>
<!---- 리스트// ---->
<input type=hidden name='total' id='total_j' value="<?=$j;?>">
<?php if(!$NUM):?>
<div id="bbs_none_data">조건에 해당하는 게시물이 없습니다. </div>
<?php endif?>
	</tbody>
	</table>
	<div class="bottom">
		<div class="btnbox1">
		<?php if($B['uid']):?><span class="btn00"><?php if($my['admin']):?><a href="<?php echo $g['bbs_write']?>">글쓰기</a><?php endif?></span><?php endif?>
		</div>
		<div class="btnbox2">
		<span class="btn00"><a href="<?php echo $g['bbs_reset']?>">처음목록</a></span>
		<span class="btn00"><a href="<?php echo $g['bbs_list']?>">새로고침</a></span>
		</div>
		<div class="clear"></div>
		<div class="pagebox01">
		<?php echo getPageLink($d['theme']['pagenum'],$p,$TPG,$g['img_core'].'/page/default')?>
		</div>
	</div>
</div>