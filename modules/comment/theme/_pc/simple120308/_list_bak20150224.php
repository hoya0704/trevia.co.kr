<div id="clist">
	<table summary="댓글리스트입니다.">

	<tbody>

	<!-- AArocal -->
	<?php foreach($NCD as $R):?>
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<!--// AArocal -->
	

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- 공지 댓글 시작-->

	<tr class="noticetr" bgcolor="#eeeeee">
	
			
	<td class="sbj">
	
			<!-- () 공지 이미지와 내용 -->
	<span style="padding-left:5px;">
	<img src="<?php echo $g['img_module_skin']?>/ico_notice.png" alt="공지"style="vertical-align:middle;margin:-3px 0 0 0;">
	</span>

	<span style="padding:0 0 0 1px;">
	<font style="color:#000000">
	<b><?php echo $R['content']?></b>
	</font>
	</span>
			<!--// () -->

			<!-- () 날짜 -->
	<span style="padding-left:5px;">
	<font style="font-family:dotum;font-size:11px;">
	<?php if(getDateFormat($R['d_regis'],'Ymd')==date('Ymd')):?> 
	<?php echo getDateFormat($R['d_regis'],'H:i')?>
	<?php elseif(getDateFormat($R['d_regis'],'Ymd')<date('Ymd')):?>
	<?php echo getDateFormat($R['d_regis'],'m/d')?>
	<?php endif?>
	</font>
	</span>
			<!--// () -->
	</td>

	
			<!-- () 자신의 덧글이면 수정과 삭제 보임 -->
	<?php if($my['admin'] | $R['id'] == $my['id']):?>
	<td width="11%" vAlign="middle">
	<a href="<?php echo $g['cment_modify'].$R['uid']?>" onclick="return cmentModify('<?php echo $R['id']?>',event);">
	<font style="text-align:right;font-family:dotum;font-size:11px;color:#9999cc;">수정</font></a>
	</td>

	<td width="11%" vAlign="middle">
	<a href="<?php echo $g['cment_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return cmentDel('<?php echo $R['id']?>',event);">
	<font style="text-align:right;font-family:dotum;font-size:11px;color:#9999cc;">삭제</font></a>
	</td>
	<?php endif?>
		
			<!--// () -->
	
	
	
	</tr>
	
	<!--// 공지 댓글 끝-->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



	<!-- AArocal -->
	<?php endforeach?>
	<?php $cnt=count($RCD)?>
	<?php foreach($RCD as $R):?>
	<?php $g['member'] = getDbData($table['s_mbrdata'],'memberuid='.$R['mbruid'],'*'); // 회원 테이블 값 추출?>
	<?php $myaddsf = explode('^^^',$g['member']['addfield']);$myaddvf = explode ('|',$myaddsf[1]); // 회원 직업 값 추출?>	
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<!--// AArocal -->




<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- 일반 댓글 시작-->

	<tr class="ticetr" bgcolor="#fcfcfc">
	
			<!-- () 닉네임 -->
	<td class="top_side" <?php if($my['admin']):?>colspan="3"<?php endif?> style="padding-top:8px;">


				<!-- () 자신의 덧글이면 수정과 삭제 보임 -->	
		<span style="float:right;padding:0 10px 0 0;">
		<a href="<?php echo $g['cment_action']?>singo&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 신고하시겠습니까?   ');">
		<img src="<?=$g[img_module_skin]?>/singo.png" alt="신고" title="신고" style="vertical-align:middle;margin:-3px 0 0 0;"/></a>
		</span>

		<?php if($my['admin'] | $R['id'] == $my['id']):?>

		<span style="float:right;padding:0 5px 0 0;">
		<a href="<?php echo $g['cment_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return cmentDel('<?php echo $R['id']?>','<?php echo $R['uid']?>',event);">
		<img src="<?=$g[img_module_skin]?>/delete.png" alt="삭제" title="삭제" style="vertical-align:middle;margin:-3px 0 0 0;"/></a>
		</span>

		<?php if(!$R['hidden']):?>
		<span style="float:right;padding:0 5px 0 0;">
		<a href="<?php echo $g['cment_modify'].$R['uid']?>" onclick="return cmentModify('<?php echo $R['id']?>','<?php echo $R['uid']?>',event);">
		<img src="<?=$g[img_module_skin]?>/modify.png" alt="수정" title="수정" style="vertical-align:middle;margin:-3px 0 0 0;"/></a>
		</span>
		<?php endif?>

		<?php endif?>
		
		<?php if(!$R['hidden'] && $my['id']):?>
		<span style="float:right;padding:0 5px 0 0;">
		<a class="hand" onclick="onelineOpen('<?php echo $R['uid']?>');"><img src="<?=$g[img_module_skin]?>/reply.png" alt="의견" title="의견" style="vertical-align:middle;margin:-3px 0 0 0;"/></a>
		</span>
		<?php endif?>
			<!--// () -->	


	<?php if(!$R['hidden']):?>
		<?php if(!$R['mbruid']):?>
		<b><font style="font-size:12px;color:#999999">[손님]</font></b>
		<?php endif?>

		<?php if($R['mbruid']):?>
<!--심볼 표시 설정 -->
	<?php if($g['member']['symbol']): // 아이콘이 있다면 ?>
	<img src="<?php echo $g['member']['symbol']?>" align="absmiddle" onerror="this.style.display='none'"  />
	<?php elseif(!$g['member']['symbol']): // 아이콘이 없다면 ?>
	<?php endif?>
<!--// 심볼 표시 설정 끝 -->
		<span class="hand" onclick="getMemberLayer('<?php echo $R['mbruid']?>',event);">
		<b><font style="font-size:12px;color:#000000"><?php echo $R[$_HS['nametype']]?></font></b> 님의 댓글 입니다.
		</span>
		<?php else:?>
		<b><font style="font-size:12px;color:#000000"><?php echo $R[$_HS['nametype']]?></font></b> 님의 댓글 입니다.
		<?php endif?>
	<?php elseif($R['hidden']):?>
		<b>
		<font style="font-size:12px;color:#ff7777;">비밀 댓글</font>
		</b>
			<font style="font-family:dotum;font-size:12px;color:#999;padding-left:5px;">
			신고가 <?php echo $d['comment']['singo_del_num']?>회 이상 누적되어 임시로 비밀 댓글 처리가 되었습니다.
			</font>
	<?php endif?>


			<!--// () -->


			<!-- () 날짜 -->
	<?php if(!$R['hidden']):?>
		<span style="padding-left:3px;">
		<?php if(getDateFormat($R['d_regis'],'Ymd')==date('Ymd')):?> 
		<?php echo getDateFormat($R['d_regis'],'H:i')?>
		<?php elseif(getDateFormat($R['d_regis'],'Ymd')<date('Ymd')):?>
		<?php echo getDateFormat($R['d_regis'],'m/d')?>
		<?php endif?>
		<?php if($R['d_modify']):?>
		<span style="padding-left:5px;">
		<font style="font-family:dotum;font-size:11px;color:#cc9999;"><?php echo getDateFormat($R['d_modify'],'Y/m/d H:i')?></a>
		</span>
		<?php endif?>
		</span>
				<!--// () -->

				<!-- () 자신의 덧글이면 수정과 삭제 보임2 -->
	<?php endif?>

	<?php if($R['hidden'] && $my['admin']):?>
		<span style="float:right;padding:0 10px 0 0;">
		<a href="<?php echo $g['cment_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return cmentDel('<?php echo $R['id']?>','<?php echo $R['uid']?>',event);">
		<img src="<?=$g[img_module_skin]?>/delete.png" alt="삭제" title="삭제" style="vertical-align:middle;margin:-1.5px 0 0 0;"/></a>
		</span>
	<?php endif?>
			<!--// () -->	


<?php if(!$R['hidden']):?>

<div style="width:98%;padding:10px 0 0 0; line-height:130%;font-size:12px;">
	<font style="font-family:dotum;font-size:12px;color:#000000">
	<?php echo getContents($R['content'],$R['html'],$keyword)?>
	</font>
</div>

	<div class="cont">
					
						
					

	<!--///////////////////////////////////////////////////// 라인 댓글 추출 시작///////////////////////////////////////////////////////////////  -->
												<?php if($R['oneline'] != 0):?>
												<?php $TCD = getDbArray($table['s_oneline'],'parent='.$R['uid'],'*','uid',$d['comment']['orderby2'],0,0)?>

																						<div style="margin:10px -1px -11px -11px;">
																					<table>
																				<tr>



																			<td style="text-align:left;">

										<?php while($O=db_fetch_array($TCD)):?>
	<?php $g['member'] = getDbData($table['s_mbrdata'],'memberuid='.$O['mbruid'],'*'); // 회원 테이블 값 추출?>
	<?php $myaddsf = explode('^^^',$g['member']['addfield']);$myaddvf = explode ('|',$myaddsf[1]); // 회원 직업 값 추출?>	

	<?php /* $O['mobile']=isMobileConnect($O['agent']) */?>
		<div style="padding:7px 0 0 0;">	
		
					<div>

					<span style="padding-left:5px;">
					<img src="<?=$g[img_module_skin]?>/ico_re.png" alt="답글"/>
					<span style="padding-left:3px;">
<!--심볼 표시 설정 -->
	<?php if($g['member']['symbol']): // 아이콘이 있다면 ?>
	<img src="<?php echo $g['member']['symbol']?>" align="absmiddle" onerror="this.style.display='none'"  />
	<?php elseif(!$g['member']['symbol']): // 아이콘이 없다면 ?>
	<?php endif?>
<!--// 심볼 표시 설정 끝 -->
					<a class="hand b" onclick="getMemberLayer('<?php echo $O['mbruid']?>',event);">					
					<?php echo $O[$_HS['nametype']]?></a></span> <font style="font-family:dotum;font-size:11px;">님의 댓글 입니다.
					</font>
					</span>
	
						<span style="padding-left:3px;">
						<?php if(getDateFormat($R['d_regis'],'Ymd')==date('Ymd')):?> 
						<?php echo getDateFormat($R['d_regis'],'H:i')?>
						<?php elseif(getDateFormat($R['d_regis'],'Ymd')<date('Ymd')):?>
						<?php echo getDateFormat($R['d_regis'],'m/d')?>
						<?php endif?>
						</span>

								<?php if($my['admin'] | $O['id'] == $my['id']):?>

											<span style="float:right;padding:3px 10px 0 0;">
											<a href="<?php echo $g['cment_odelete'].$O['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return oneDel('<?php echo $O['id']?>');">
											<img src="<?=$g[img_module_skin]?>/delete.png" alt="삭제" title="삭제" style="vertical-align:middle;margin:-3px 0 0 0;"/></a>
											</span>

								<?php endif?>
		
					</div>

														<div style="width:92%;padding:5px 0 5px 20px;line-height:130%;">
														<font style="font-family:dotum;font-size:12px;color:#000000">
														<?php echo getContents($O['content'],$O['html'],$keyword)?>
														</font>
														</div>

		</div>
										<?php endwhile?>

																			</td>


																				</tr>
																					</table>
																						</div>
												<?php endif?>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

				<!-- 라인 댓글 시작 -->
																					<div>

									<div id="onelinebox<?php echo $R['uid']?>" class="hide">
					
	<div style="margin:10px -1px -11px -13px;">
		<form method="post" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return oneCheck(this);">
						<input type="hidden" name="r" value="<?php echo $r?>" />
						<input type="hidden" name="a" value="oneline_write" />
						<input type="hidden" name="m" value="<?php echo $m?>" />
						<input type="hidden" name="parent" value="<?php echo $R['uid']?>" />
						<input type="hidden" name="hidden" value="<?php echo $R['hidden']?>" />
						<input type="hidden" name="c" value="<?php echo $c?>" />
						<input type="hidden" name="iframe" value="<?php echo $iframe?>" />
						<input type="hidden" name="skin" value="<?php echo $skin?>" />
						
				<table>
					<tr align="center">
<td>
<div style="padding-top:10px;width:1180px;">
<?php if($my['uid']):?>						
<textarea name="content" id="oneline_comment<?php echo $R['uid']?>" rows="5" style="width:99%;padding:7px 0 0 7px;border:#dfdfdf solid 1px;resize:none;"></textarea>
<?php elseif(!$my['uid']):?>
<textarea name="content" id="oneline_comment<?php echo $R['uid']?>" rows="5" style="width:99%;padding:7px 0 0 7px;border:#dfdfdf solid 1px;" disabled>로그인을 해주세요.</textarea>
<?php endif?>
</div>
						<div style="text-align:right;padding-top:5px;padding-right:7px;padding-bottom:5px;">
						<span><input class="btngray" type="submit" value="한줄 등록" alt="등록" /></span>
						</div>
</td>

											
					</tr>
				</table>

		</form>	
	</div>


									</div>


																					</div>
				
				<!-- 라인 댓글 끝 -->
	</div>



<?php endif?>
	<!-- 일반 댓글 끝-->	
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->





	
	<?php endforeach?>
	<?php $R=array()?>
	<?php if(!$NUM):?>
	<tr class="none">
	<td class="nodata">등록된 댓글이 없습니다.</td>
	</tr>
	<?php endif?>
	</tbody>
	</table>
	

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

<div id="qTilePopDiv"></div>
