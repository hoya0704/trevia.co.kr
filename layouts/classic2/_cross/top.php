<div id="header">
	<div class="headerbox">
		<div class="headertop"<?php echo $d['layout']['_bgtitle']?>>
			<div class="wrap">
				<div class="logo">
					<?php echo getLayoutLogo($d['layout'])?>
				</div>
				<div class="gnb">
					<div id="_layout_memberlink_" class="menutops">
						<img src="<?php echo $g['img_core']?>/blank.gif" width="1" height="20" alt="" />
						<?php if($my['uid']):?>
						<?php if($my['admin']):?><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;_themeConfig=theme&amp;prelayout=<?php echo $d['layout']['dir']?>/zone" class="admin">레이아웃 설정하기</a> | <?php endif?>
						<a href="<?php echo RW('mod=mypage')?>"<?php echo $d['layout']['_memberlink_color']?>>나의계정</a> | 
						<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout"<?php echo $d['layout']['_memberlink_color']?>>로그아웃</a>
						<?php if($d['layout']['sns_use']):?>
						<a href="#." onclick="getLayerBox('<?php echo $g['s']?>/?r=<?php echo $r?>&m=social&page=account','소셜계정',600,650,event,false,'l');"<?php echo $d['layout']['_memberlink_color']?>><img src="<?php echo $g['img_layout']?>/sns.png" alt="" title="소셜계정" /> SNS</a>
						<?php endif?>
						<?php else:?>
						<a href="<?php echo RW('mod=join')?>"<?php echo $d['layout']['_memberlink_color']?>>회원가입</a> | 
						<a href="<?php echo RW('mod=login')?>"<?php echo $d['layout']['_memberlink_color']?>>로그인</a>
						<?php if($d['layout']['sns_use']):?>
						<a href="#." onclick="getLayerBox('<?php echo $g['s']?>/?r=<?php echo $r?>&m=social&page=login','소셜 로그인',350,300,event,false,'l');"<?php echo $d['layout']['_memberlink_color']?>><img src="<?php echo $g['img_layout']?>/sns.png" alt="" title="소셜 로그인" /> SNS</a>
						<?php endif?>
						<?php endif?>
					</div>
				</div>
				<div class="clear"></div>
				<div class="menutabs">
					<ul id="_layout_mainmenu_">
					<?php if($d['layout']['homestr_use']):?>
					<li><a href="<?php echo RW(0)?>"<?php if($_HP['id']=='main'&&!$_themeConfig):?> class="on"<?php echo $d['layout']['_mainmenu_color1']?><?php else:?><?php echo $d['layout']['_mainmenu_color']?><?php endif?>><?php echo $d['layout']['homestr']?></a></li>
					<?php endif?>
					<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
					<?php $_i=0;while($_M1=db_fetch_array($_MENUS1)):?>
					<?php if($_i>=$d['layout']['menunum'])break?>
					<li><a href="<?php echo RW('c='.$_M1['id'])?>" target="<?php echo $_M1['target']?>"<?php if(in_array($_M1['id'],$_CA)):$g['nowFMemnu']=$_M1['uid']?> class="on"<?php echo $d['layout']['_mainmenu_color1']?><?php else:?><?php echo $d['layout']['_mainmenu_color']?><?php endif?>><?php echo $_M1['name']?></a></li>
					<?php $_i++;endwhile?>
					<?php if(!$_i&&$my['admin']):?>
					<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&type=menu&makemenu=Y"<?php echo $d['layout']['_mainmenu_color']?>>메뉴 등록하기</a></li>
					<?php endif?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>


<div id="container">
