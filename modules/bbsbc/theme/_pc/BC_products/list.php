<?
   function getUpfiles($code) 
   { 
    global $DB_CONNECT; 
    
    $exp = explode(']',str_replace('[','',trim($code)));
    $len = count($exp);
    $j=0;
    for ($i = 0; $i < $len; $i++)
    {
     if(!$exp[$i]) continue;
     $UP=db_query("select * from rb_s_upload where uid='".$exp[$i]."'".($type>0?" and type=2''":""),$DB_CONNECT);
     while($U=db_fetch_array($UP))
     {
      $upload[$j] = $U;
      $j++;
     }
    } 
    return $upload; 
   }
   ?>

<div id="bbslist">

	<div class="info">

		<div class="article">
			<?php echo $B['name']?> <?php echo number_format($NUM+count($NCD))?>개(<?php echo $p?>/<?php echo $TPG?>페이지)
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

	<?php if(count($NCD)):?>
	<table summary="<?php echo $B['name']?$B['name']:'전체'?> 게시물리스트 입니다.">
	<caption><?php echo $B['name']?$B['name']:'전체게시물'?></caption> 
	<colgroup> 
	<col width="50"> 
	<col> 
	<col width="80"> 
	<col width="70"> 
	<col width="90"> 
	</colgroup> 
	<thead>
	<tr>
	<th scope="col" class="side1">번호</th>
	<th scope="col">제목</th>
	<th scope="col">글쓴이</th>
	<th scope="col">조회</th>
	<th scope="col" class="side2">날짜</th>
	</tr>
	</thead>
	<tbody>

	<?php foreach($NCD as $R):?> 
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<tr class="noticetr">
	<td>
		<?php if($R['uid'] != $uid):?>
		<img src="<?php echo $g['img_module_skin']?>/ico_notice.gif" alt="공지" class="notice" />
		<?php else:?>
		<span class="now">&gt;&gt;</span>
		<?php endif?>
	</td>
	<td class="sbj">
		<?php if($R['mobile']):?><img src="<?php echo $g['img_core']?>/_public/ico_mobile.gif" class="imgpos" alt="모바일" title="모바일(<?php echo $R['mobile']?>)로 등록된 글입니다" /><?php endif?>
		<a href="<?php echo $g['bbs_view'].$R['uid']?>" class="b"><?php echo $R['subject']?></a>
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
	</tbody>
	</table>
	<?php else:?>
	<div class="ttline"></div>
	<?php endif?>

	<?php if($NUM):?>
	<div class="gallery">
		<?php foreach($RCD as $R):?>
		<?php $R['mobile']=isMobileConnect($R['agent'])?>
		<?php $_thumbimg=getUploadImage($R['upload'],$R['d_regis'],$R['content'],'gif|jpg|jpeg')?>
		<?php $_thumbimg=$_thumbimg?$_thumbimg:$g['img_core'].'/blank.gif'?>
		<?$UPIMG=getUpfiles($R['upload'])?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:10px solid #F3F3F3; padding:0px" onMouseOver="this.style.border='10px solid #E8E8E8';" onMouseOut="this.style.border='10px solid #F3F3F3';">
          <tr>
            <td width="199" align="center" valign="middle" style="padding:10px 10px 10px 10px;"><!-- 이미지 시작-->
                <table width="199" height="160"  border="0" cellpadding="0" cellspacing="0" background="<?php echo $g['img_module_skin']?>/player_bg.jpg">
                  <tr>
                    <td valign="top" style="padding: 10px 0px 0px 3px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="18" valign="top"><img src=<?php echo $_thumbimg?> width="175" height="125"></td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
                <!-- 이미지 끝--></td>
            <td valign="top" style="padding:10px 10px 10px 10px;"><!-- 내용시작 -->
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tr>
                    <td height="25" align="left" style="font-family:돋움; font-size:14px; font-weight:bold; color:#717171; padding : 5px;"> [<?php echo $R['category']?>]<a href="<?php echo $g['bbs_view'].$R['uid']?>"><?=getStrCut(str_replace('&nbsp;',' ',strip_tags($R['subject'])),40,'...')?></a>
					[<a href="<?php echo $g['bbs_modify'].$R['uid']?>">수정</a>]</td>
                  </tr>
                  <tr>
                    <td height="25" align="left" style="font-family:돋움; font-size:12px; color:#717171; padding : 5px;"> <?php echo $R['add_txt2']?> -  <?php echo $R['add_txt3']?></td>
                  </tr>
				  <tr>
                    <td height="25" align="left" style="font-family:돋움; font-size:12px; color:#717171; padding : 5px;">가격 : KRW <?php echo $R['add_txt4']?> ~  <?php echo $R['add_txt5']?></td>
                  </tr>
				  <tr>
                    <td height="25" align="left" style="font-family:돋움; font-size:12px; color:#717171; padding : 5px;">숙박기간 : <?php echo $R['add_txt6']?> ~ <?php echo $R['add_txt7']?></td>
                  </tr>
				  <tr>
                    <td height="25" align="left" style="font-family:돋움; font-size:12px; color:#717171; padding : 5px;">메인내 노출영역 : <?if($R['add_int1'] == 1):?>
메인 큰이미지에 6개 부분 노출
<?elseif($R['add_int2']  == '1'):?>
메인 중간 이미지 4개 부분 노출
<?elseif($R['add_int3']  == '1'):?>
메인 하단 부분에 노출
<?endif?></td>
                  </tr>
                </table>
                <!-- 내용 끝 -->
            </td>
          </tr>
        </table>
        <div style="margin-top:15px;"></div>
		<?php endforeach?> 
		<div class="clear"></div>
  </div>
	<?php endif?>
	<?php if(!$NUM):?>
	<div class="none">
		<img src="<?php echo $g['img_module_skin']?>/nopost.gif" alt="등록된 포스트가 없습니다" />
	</div>
	<?php endif?>


	<div class="bottom">
		<div class="btnbox1">
		<?php if($B['uid']):?><span class="btn00"><a href="<?php echo $g['bbs_write']?>">글쓰기</a></span><?php endif?>
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

	<div class="searchform">
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
	</div>

</div>

