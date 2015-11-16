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
	<colgroup> 
	<col width="80"> 
	<col width="120"> 

	<col> 
	<col width="120"> 
	<col width="130"> 
	<col width="180"> 
	<col width="130"> 
	<col width="130"> 
	<col width="130"> 
	</colgroup> 
	<thead>
	<tr>
	<th scope="col" class="side1">번호</th>
	<th scope="col">처리상태</th>
	<th scope="col">여행지역</th>
	<th scope="col">고객명1</th>
	<th scope="col">고객명2</th>
	<th scope="col">전화번호</th>
	<th scope="col">출발일</th>
	<th scope="col">담당자</th>
	<th scope="col">견적요청일</th>
	</tr>
	</thead>
	<tbody>

	<?php foreach($RCD as $R):?>
<?
	$add1 = explode("||", $R[add1]);
	$add2 = explode("||", $R[add2]);
	$add3 = explode("||", $R[add3]);
	$add4 = explode("||", $R[add4]);
	$add5 = explode("||", $R[add5]);
	$add6 = explode("||", $R[add6]);
	$add7 = explode("||", $R[add7]);
	$add8 = explode("||", $R[add8]);
	$add9 = explode("||", $R[add9]);
	$add10 = explode("||", $R[add10]);
	$add11 = explode("||", $R[add11]);	
?>
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<tr>
		<td>
			<?php if($R['uid'] != $uid):?>
			<?php echo $NUM-((($p-1)*$recnum)+$_rec++)?>
			<?php else:$_rec++?>
			<span class="now">&gt;&gt;</span>
			<?php endif?>
		</td>
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['category']?></a></td><!--처리상태-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[2]?></a></td><!--여행지역-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[1]?></a></td><!-- 고객명1 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[7]?></a></td><!-- 고객명2 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[4]?></a></td><!-- 전화번호 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[7]?></a></td><!-- 출발일 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['name']?></a></td>
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[1]?></a></td><!-- 견적요청일 -->
	</tr> 
	<?php endforeach?> 

	<?php if(!$NUM):?>
	<tr>
		<td>1</td>
		<td colspan="8" class="sbj1">게시물이 없습니다.</td>
	</tr> 
	<?php endif?>

	</tbody>
	</table>

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
		<form name="bbssearchf" action="<?php echo $g['s']?>/"  >
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
		<option value="add1|add2|add3|add4|add5|add6|add7|add8|add9|add10|add11" <?php if($where=='add1|add2|add3|add4|add5|add6|add7|add8|add9|add10|add11'):?> selected="selected"<?php endif?>>전체</option>
		<option value="add3"<?php if($where=='add3'):?> selected="selected"<?php endif?>>고객명</option>
		<option value="add2"<?php if($where=='add2'):?> selected="selected"<?php endif?>>담당자</option>
		</select>
		
		<input type="text" name="keyword" size="30" value="<?php echo $_keyword?>" class="input" />
		<input type="submit" value=" 검색 " class="btngray" />
		<?php endif?>
		</form>
	</div>

</div>

