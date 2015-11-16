<div id="bbslist">

	<div class="info">
		
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


	<?php if($_GET['past'] == "yes"):?>
	<?php foreach($RCD as $R):?>
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<?php $_thumbimg=getUploadImage2($R['upload'],$R['d_regis'],$R['content'],$d['theme']['picimgext'])?>
	<?php
	$adddata = unserialize($R['adddata']);
	if(is_array($adddata))
	{
		foreach($adddata as $key => $val)
		{
			$adddata[$key] = urldecode($val);
			$adddata[$key] = stripslashes($adddata[$key]);
		}
	}
	?>
	<div class="listPast">
		<a href="<?php echo $g['bbs_view'].$R['uid']?>"><img src="<?php echo $_thumbimg?>" class="thumb" /></a>
		<div class="description">
			<h1><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['subject']?></a></h1>
			<p><?php echo $adddata['desc']?></p>
		</div>
	</div>
	<?php endforeach?>
	<?php else:?>
	<?php foreach($NCD as $R):?>
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<?php $_thumbimg=getUploadImage2($R['upload'],$R['d_regis'],$R['content'],$d['theme']['picimgext'])?>
	<?php
	$adddata = unserialize($R['adddata']);
	if(is_array($adddata))
	{
		foreach($adddata as $key => $val)
		{
			$adddata[$key] = urldecode($val);
			$adddata[$key] = stripslashes($adddata[$key]);
		}
	}
	?>
	<div class="list">
		<a href="<?php echo $g['bbs_view'].$R['uid']?>"><img src="<?php echo $_thumbimg?>" class="thumb" /></a>
		<div class="description">
			<h1><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['subject']?></a></h1>
			<p><?php echo $adddata['desc']?></p>
			<h2>제목 : <?php echo $adddata['subject']?></h2>
			<h3>기간 : <?php echo $adddata['dateStart']?> ~ <?php echo $adddata['dateEnd']?></h3>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach?>
	<?php endif?>
	<?php if(($_GET['past'] == "yes" ? !$NUM : !$NCD[0])):?>
	<p class="noarticle">
		<strong>진행중인 이벤트가 없습니다.</strong>
	</p>
	<?php endif?>
	<div class="clear"></div>
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

