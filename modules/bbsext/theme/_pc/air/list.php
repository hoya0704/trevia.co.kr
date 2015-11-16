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
	<col width="140"> 
	<col width="140"> 
	<col> 
	</colgroup> 
	<thead>
	<tr>
	<th scope="col" class="side1">번호</th>
	<th scope="col">지역카테고리</th>
	<th scope="col">항공사명</th>
	<th scope="col">항공스케쥴</th>
	</tr>
	</thead>
	<tbody>

	<?php foreach($RCD as $R):?>
<?
	$add11 = explode("||", $R[add11]);
	$add12 = explode("||", $R[add12]);
	$add13 = explode("||", $R[add13]);
	$add14 = explode("||", $R[add14]);
	$add15 = explode("||", $R[add15]);
	$add16 = explode("||", $R[add16]);
	$add17 = explode("||", $R[add17]);
	$add18 = explode("||", $R[add18]);
//	$add19 = explode("||", $R[add19]);
//	$add20 = explode("||", $R[add20]);
	$add21 = explode("||", $R[add21]);	
	$add22 = explode("||", $R[add22]);	
	$add23 = explode("||", $R[add23]);	
	$add24 = explode("||", $R[add24]);	
	$add25 = explode("||", $R[add25]);	
	$add26 = explode("||", $R[add26]);	
	$add27 = explode("||", $R[add27]);	
	$add28 = explode("||", $R[add28]);	

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
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['category']?></a></td><!--지역카테고리-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R[add1]?></a></td><!--항공사명-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R[subject]?></a></td><!--항공스케쥴-->

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

