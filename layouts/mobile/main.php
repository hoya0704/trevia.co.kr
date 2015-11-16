<div id="wrap">
	<div id="header">
		<h1><?php echo $_HS['title']?></h1>
		<div class="lnb">
		<ul>
		<li class="split<?php if(!$_GET['mod']&&!$showType&&!$c):?> selected<?php endif?>"><a href="<?php echo RW(0)?>">HOME</a></li>
		<li class="split<?php if($showType=='menu'):?> selected<?php endif?>"><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;showType=menu">메뉴</a></li>
		<?php if($my['uid']):?>
		<li class="split<?php if($_GET['mod']=='mypage'):?> selected<?php endif?>"><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=mypage">마이페이지</a></li>
		<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout">로그아웃</a></li>
		<?php else:?>
		<li class="split<?php if($_GET['mod']=='join'):?> selected<?php endif?>"><a href="<?php echo RW('mod=join')?>">회원가입</a></li>
		<li<?php if($_GET['mod']=='login'):?> class="selected"<?php endif?>><a href="<?php echo RW('mod=login')?>">로그인</a></li>
		<?php endif?>
		</ul>
		<div class="clear"></div>
		</div>
	</div>
	<div id="content">
		<?php if($showType=='menu'):?>
		<div id="menubox">
		<ul>
		<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 and mobile=1 order by gid asc','*')?>
		<?php $_i=0; while($_M1=db_fetch_array($_MENUS1)):?>
		<li class="m1<?php if($_M1['id']==$c):?> selected1<?php endif?>">
		<a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" target="<?php echo $_M1['target']?>">
		<?php echo $_M1['name']?>
		<?php if($_M1['num']):?><span class="num">(<?php echo $_M1['num']?>)</span><?php endif?>
		<?php if(getNew($_M1['d_last'],$d['layout']['newhour'])):?><span class="new">new</span><?php endif?>
		</a>
		</li>
		<?php if($_M1['isson']):?>
		<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=2 and mobile=1 order by gid asc','*')?>
		<?php while($_M2=db_fetch_array($_MENUS2)):?>
		<li class="m2<?php if($_M1['id'].'/'.$_M2['id']==$c):?> selected2<?php endif?>">
		<a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>" target="<?php echo $_M2['target']?>">
		+ <?php echo $_M2['name']?>
		<?php if($_M2['num']):?><span class="num">(<?php echo $_M2['num']?>)</span><?php endif?>
		<?php if(getNew($_M2['d_last'],$d['layout']['newhour'])):?><span class="new">new</span><?php endif?>
		</a>
		</li>
		<?php if($_M2['isson']):?>
		<?php $_MENUS3=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M2['uid'].' and hidden=0 and depth=3 and mobile=1 order by gid asc','*')?>
		<?php while($_M3=db_fetch_array($_MENUS3)):?>
		<li class="m3<?php if($_M1['id'].'/'.$_M2['id'].'/'.$_M3['id']==$c):?> selected3<?php endif?>">
		<a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'].'/'.$_M3['id'])?>" target="<?php echo $_M3['target']?>">
		ㆍ<?php echo $_M3['name']?><?php if($_M3['num']):?>
		<?php if(getNew($_M3['d_last'],$d['layout']['newhour'])):?><span class="new">new</span><?php endif?>
		<span class="num">(<?php echo $_M3['num']?>)</span><?php endif?>
		</a>
		</li>
		<?php endwhile?>
		<?php endif?>
		<?php endwhile?>
		<?php endif?>
		<?php $_i++; endwhile?>
		<?php if(!$_i):?>
		<li class="m1"><a>등록된 메뉴가 없습니다.</a></li>
		<?php endif?>
		<?php if($my['admin']):?>
		<li class="m1"><a href="<?php echo RW('m=admin')?>" class="admpage">관리자페이지</a></li>
		<?php endif?>
		</ul>
		</div>
		<?php else:?>
		<?php include __KIMS_CONTENT__?>
		<?php endif?>
	</div>
	<div id="footer">
		<div id="searchbox" class="searchbox">
		<form action="<?php echo $g['s']?>/">
		<input type="hidden" name="r" value="<?php echo $r?>" />
		<input type="hidden" name="mod" value="search" />
		<input type="text" id="m_keyword" name="keyword" value="<?php echo $_keyword?>" class="input" />
		<input type="submit" value="검색" class="btngray" />
		</form>
		</div>
		<div class="menu">
		<ul>
		<li class="split"><a onclick="searchBox();"><img src="<?php echo $g['img_layout']?>/ico_search.gif" alt="" /> 통합검색</a></li>
		<li class="split"><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=pcmode"><img src="<?php echo $g['img_layout']?>/ico_pcmode.gif" alt="" /> PC화면</a></li>
		<li><a href="javascript:window.scrollTo(1,0);"><img src="<?php echo $g['img_layout']?>/ico_top.gif" alt="" /> 맨위로</a></li>
		</ul>
		<div class="clear"></div>
		</div>
		<div class="copyright">Copyrights &copy; <?php echo $d['layout']['domain']?$d['layout']['domain']:$_SERVER['HTTP_HOST']?></div>
	</div>
</div>