<div id="header">
	<div class="layout_wrap">
		<div class="logo">
			<h1><a href="<?php echo RW(0)?>"><?php echo $_HS['title']?></a></h1>
		</div>
		<div class="lnb">
			<ul>
				<li<?php if($_mod==''):?> class="selected"<?php endif?>><a href="<?php echo RW(0)?>">HOME</a></li>
				<li<?php if($_mod=='photo'):?> class="selected"<?php endif?>><a href="<?php echo RW('mod=photo')?>">포토로그</a></li>
				<li<?php if($_mod=='tags'):?> class="selected"<?php endif?>><a href="<?php echo RW('mod=tags')?>">태그모음</a></li>
				<li<?php if($_mod=='guestbook'):?> class="selected"<?php endif?>><a href="<?php echo RW('mod=guestbook')?>">방명록</a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
</div>
	
<div id="container">
	<?php include __KIMS_CONTAINER_HEAD__?>
	<div class="layout_wrap">

		<div id="content">
			<?php include __KIMS_CONTENT__?>
			&nbsp;
		</div>

		<div class="snb">

			<div class="search" >
				<form action="<?php echo $g['s']?>/">
				<input type="hidden" name="r" value="<?php echo $r?>" />
				<input type="hidden" name="mod" value="search" />
				<input type="text" name="keyword" value="<?php echo $_keyword?>" class="input" />
				<input type="submit" value="검색" class="btnblue" />
				</form>
			</div>
			
			<div class="tmenu">
				<ul>
				<li><a href="<?php echo RW(0)?>">HOME</a></li>
				<?php if($my['id']):?>
				<li><a href="<?php echo RW('mod=mypage')?>">마이페이지</a></li>
				<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout">로그아웃</a></li>
				<?php else:?>
				<li><a href="<?php echo RW('mod=join')?>">회원가입</a></li>
				<li><a href="<?php echo RW('mod=login')?>">로그인</a></li>
				<?php endif?>
				</ul>
			</div>

			<div class="category">
				<div class="tt">
					카테고리
				</div>
				<ul>
				<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
				<?php $_i=0; while($_M1=db_fetch_array($_MENUS1)):?>
				<li class="m1<?php if(in_array($_M1['id'],$_CA)):?> selected1<?php endif?>">
				<a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" target="<?php echo $_M1['target']?>"><?php echo $_M1['name']?></a>
				<?php if($_M1['num']):?><span class="num">(<?php echo $_M1['num']?>)</span><?php endif?>
				<?php if(getNew($_M1['d_last'],$d['layout']['newhour'])):?><span class="new">new</span><?php endif?>
				</li>
				<?php if($_M1['isson'] && $_M1['id']==$_CA[0]):?>
				<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
				<?php while($_M2=db_fetch_array($_MENUS2)):?>
				<li class="m2<?php if(in_array($_M2['id'],$_CA)):?> selected2<?php endif?>">
				+ <a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>" target="<?php echo $_M2['target']?>"><?php echo $_M2['name']?></a>
				<?php if($_M2['num']):?><span class="num">(<?php echo $_M2['num']?>)</span><?php endif?>
				<?php if(getNew($_M2['d_last'],$d['layout']['newhour'])):?><span class="new">new</span><?php endif?>
				</li>
				<?php if($_M2['isson'] && $_M2['id']==$_CA[1]):?>
				<?php $_MENUS3=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M2['uid'].' and hidden=0 and depth=3 order by gid asc','*')?>
				<?php while($_M3=db_fetch_array($_MENUS3)):?>
				<li class="m3<?php if(in_array($_M3['id'],$_CA)):?> selected3<?php endif?>">
				ㆍ<a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'].'/'.$_M3['id'])?>" target="<?php echo $_M3['target']?>"><?php echo $_M3['name']?></a>
				<?php if($_M3['num']):?><span class="num">(<?php echo $_M3['num']?>)</span><?php endif?>
				<?php if(getNew($_M3['d_last'],$d['layout']['newhour'])):?><span class="new">new</span><?php endif?>
				</li>
				<?php endwhile?>
				<?php endif?>
				<?php endwhile?>
				<?php endif?>
				<?php $_i++; endwhile?>
				<?php if(!$_i):?>
				<li class="m1"><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&type=menu&makemenu=Y">메뉴를 등록해주세요</a></li>
				<?php endif?>
				</ul>
			
			</div>

			<div class="photo">
				<div class="tt">최근사진</div>
				<?php $_RCD=getDbArray($table['s_upload'],'site='.$s." and type=2 and ext='jpg'",'*','gid','asc',6,1)?>
				<?php for($i = 0; $i < 6; $i++):?>
				<?php $_R=db_fetch_array($_RCD)?>
				<div class="pic<?php if(!($i%3)):?> nomargin<?php endif?>">
					<?php if($_R['uid']):?>
					<a href="<?php echo getCyncUrl($_R['cync'])?>"><img src="<?php echo $_R['url'].$_R['folder'].'/'.$_R['thumbname']?>" alt="" title="<?php echo $_R['caption']?$_R['caption']:$_R['name']?>" /></a>
					<?php else:?>
					<img src="<?php echo $g['img_core']?>/blank.gif" alt="" />
					<?php endif?>
				</div>
				<?php endfor?>
				<div class="clear"></div>
			</div>

			<div class="tags">
				<div class="tt">태그</div>
				<div class="items">

					<?php $d_regis1 = date('Ymd',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-7,substr($date['today'],0,4)))?>
					<?php $d_regis2 = $date['today']?>
					<?php $WHEREIS1 = 'site='.$s.' and date between '.$d_regis1.' and '.$d_regis2?>
					<?php $_RCD=getDbArray($table['s_tag'],$WHEREIS1,'*','hit','desc',20,1)?>
					<?php while($TG=db_fetch_array($_RCD)):?>
					<?php $TARR[]=$TG['keyword']?>
					<?php endwhile?>
					<?php $TGN=count($TARR)?>
					<?php if($TGN)$rkey = array_rand($TARR,$TGN)?>
					
					<?php $x2 = 0?>
					<?php $x1 = 5?>
					<?php for($i = 0; $i < $TGN; $i++):?>
					<?php $TCNUM=$rkey[$i]>$x1?1:($rkey[$i]>$x2?2:3)?>

					<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=search&amp;keyword=<?php echo urlencode($TARR[$rkey[$i]])?>"><span class="tags_<?php echo $TCNUM?>"><?php echo $TARR[$rkey[$i]]?></span></a>
					<?php endfor?>

				</div>
			</div>

			<div class="post">
				<div class="tt">최근포스트</div>
				<ul>
				<?php $_RCD=getDbArray($table['bbsdata'],'display=1 and site='.$s,'*','gid','asc',5,1)?>
				<?php while($_R=db_fetch_array($_RCD)):?>
				<li>
					<a href="<?php echo getPostLink($_R)?>" title="<?php echo $_R[$_HS['nametype']]?>님"><?php echo $_R['subject']?></a>
					<?php if($_R['comment']):?><span class="comment">[<?php echo $_R['comment']?><?php if($_R['oneline']):?>+<?php echo $_R['oneline']?><?php endif?>]</span><?php endif?>
					<?php if($_R['trackback']):?><span class="trackback">[<?php echo $_R['trackback']?>]</span><?php endif?>
					<?php if(getNew($_R['d_regis'],24)):?><span class="new">new</span><?php endif?>
				</li>
				<?php endwhile?>
				<?php if(!db_num_rows($_RCD)):?><li class="none"></li><?php endif?>
				</ul>
			</div>

			<div class="post">
				<div class="tt">최근댓글</div>
				<ul>
				<?php $_RCD=getDbArray($table['s_comment'],'display=1 and site='.$s,'*','uid','asc',5,1)?>
				<?php while($_R=db_fetch_array($_RCD)):?>
				<li>
					<a href="<?php echo getCyncUrl($_R['cync'].',CMT:'.$_R['uid'])?>#CMT" title="<?php echo $_R[$_HS['nametype']]?>님"><?php echo $_R['subject']?></a>
					<?php if($_R['oneline']):?><span class="comment">[<?php echo $_R['oneline']?>]</span><?php endif?>
					<?php if(getNew($_R['d_regis'],24)):?><span class="new">new</span><?php endif?>
				</li>
				<?php endwhile?>
				<?php if(!db_num_rows($_RCD)):?><li class="none"></li><?php endif?>
				</ul>
			</div>


			<div class="archiv">
			<div class="tt">포스트현황</div>
			<ul>
			<?php for($i=0;$i<12;$i++):?>
			<?php $_month = date('Ym',mktime(0,0,0,substr($date['today'],4,2)-$i,substr($date['today'],6,2),$date['year']))?>
			<?php $_num = getDbCnt($table['bbsmonth'],'sum(num)',"date='".$_month."' and site=".$s)?>
			<li>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=bbs&amp;where=term&amp;keyword=<?php echo $_month?>"><?php echo getDateFormat($_month,'Y M')?></a>
			<span>(<?php echo $_num?>)</span>
			</li>
			<?php endfor?>
			</ul>
			<div class="clear"></div>
			</div>

			

			<?php
			if ($where == 'term' && $keyword)
			{
				$_yr = substr($keyword,0,4);
				$_mh = substr($keyword,4,2);
			}
			else {
				$_yr	= $_yr ? $_yr : $date['year'];
				$_mh	= $_mh ? $_mh : substr($date['month'],4,2);
			}
			$todaynum	= $date['today'];
			$firstday	= mktime(0,0,0,$_mh,1,$_yr);
			$startday	= date('w',$firstday);
			$endday		= date('t',$firstday);

			$prevyear	= date('Y',mktime(0,0,0,$_mh-1,1,$_yr));
			$nextyear	= date('Y',mktime(0,0,0,$_mh+1,1,$_yr));
			$prevmonth	= date('m',mktime(0,0,0,$_mh-1,1,$_yr));
			$nextmonth	= date('m',mktime(0,0,0,$_mh+1,1,$_yr));

			$DAYNUM = getDbSelect($table['bbsday'],"date like '".$_yr.$_mh."%' and site=".$s.' order by date asc','*');
			while($_R=db_fetch_array($DAYNUM)) if($_R['num']) $_D[$_R['date']] = $_R['num'];
			?>
			
			<div class="daily">
				<a name="calendar"></a>
				<div class="tt">
					<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;_yr=<?php echo $prevyear?>&amp;_mh=<?php echo $prevmonth?>#calendar"><img src="<?php echo $g['img_layout']?>/b_prev.gif" alt="" title="이전달" /></a>
					<?php echo $_yr?>.<?php echo $_mh?>
					<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;_yr=<?php echo $nextyear?>&amp;_mh=<?php echo $nextmonth?>#calendar"><img src="<?php echo $g['img_layout']?>/b_next.gif" alt="" title="다음달" /></a>
				</div>
				<table> 
					<tr class="week">
						<td class="sunday">일</td>
						<td>월</td>
						<td>화</td>
						<td>수</td>
						<td>목</td>
						<td>금</td>
						<td>토</td>
					</tr>
				<?php for( $i = 1; $i < 7; $i++ ):?>
					<tr align="center" height="20"> 
					<?php for( $j = 0; $j < 7; $j++ ):$xday = $day+1; $pday = sprintf("%02d",$xday); $onday = $_yr.$_mh.$pday?>
						<td width="14%" class="sys_f_11d">
						<?php if((($i == 1 && $startday == $j) || $day > 0) && $day < $endday): $day++?>
						<?php if($_D[$onday]):?>
						<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=bbs&amp;where=term&amp;keyword=<?php echo $onday?>" title="<?php echo $_D[$onday]?> Post">
							<?php if($j == 0):?>
							<span class="sunday b"><?php echo $pday?></span>
							<?php else:?>
							<span class="b"><?php echo $pday?></span>
							<?php endif?>
						</a>
						<?php else:?>
							<?php if($j == 0):?>
							<span class="sunday"><?php echo $pday?></span>
							<?php else:?>
							<?php echo $pday?>
							<?php endif?>
						<?php endif?>
						<?php else:?>&nbsp;<?php endif?>
						</td>
					<?php endfor?>
					</tr>
				<?php if($day >= $endday) break?>
				<?php endfor?>
				</table>
			</div>
		



			
			<div class="counter">
			Total : <?php echo number_format(getDbCnt($table['s_counter'],'sum(hit)','site='.$s))?><br />
			Yesterday : <?php echo number_format(getDbCnt($table['s_counter'],'sum(hit)','site='.$s." and date='".getDateCal('Ymd',$date['totime'],-24)."'"))?><br />
			Today : <?php echo number_format(getDbCnt($table['s_counter'],'sum(hit)','site='.$s." and date='".$date['today']."'"))?><br />
			</div>


			<div class="rss">
				<img src="<?php echo $g['img_core']?>/_public/btn_rss_gray.gif" alt="rss" />
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=bbs&amp;mod=rss&amp;type=rss2" target="_blank">RSS 2.0</a> |
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=bbs&amp;mod=rss&amp;type=rss1" target="_blank">RSS 1.0</a> |
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=bbs&amp;mod=rss&amp;type=atom" target="_blank">ATOM 0.3</a>
			</div>

		</div>

		<div class="clear"></div>
	</div>
	<?php include __KIMS_CONTAINER_FOOT__?>
</div>

<div id="footer">
	<div class="layout_wrap">
		<div>
		<a href="<?php echo RW('mod=agreement')?>">홈페이지 이용약관</a> <span class="split">|</span>
		<a href="<?php echo RW('mod=private')?>">개인정보 취급방침</a> <span class="split">|</span>
		<a href="<?php echo RW('mod=postrule')?>">게시물 게재원칙</a> <span class="split">|</span>
		<a href="http://validator.w3.org/check?url=referer" target="_blank" title="W3C XHTML 1.0 VALIDATION">XHTML 1.0 VALIDATION</a>
		</div>
		<address>
		Copyrights © <?php echo $date['year']?> <?php echo $_SERVER['HTTP_HOST']?> All Rights Reserved. Powered by kimsQ-RB (Excute Time <?php echo round(getNowTimes()-$g['time_start'],3)?>)
		</address>
	</div>
</div>

