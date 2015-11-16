<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/top.php'?>


<div class="subbox">
	<div class="wrap">
		<div class="subtitle">
		<h2><?php echo $_HM['name']?$_HM['name']:$_tmp['location']['name']?></h2>
		</div>
		<div class="searchbox">

		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="wrap">
	<?php include __KIMS_CONTAINER_HEAD__?>
	<div id="content">
	<?php include __KIMS_CONTENT__?>
	</div>
	<div class="snb">
		<ul class="submenu">
		<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$g['nowFMemnu'].' and hidden=0 and depth=2 order by gid asc','*')?>
		<?php while($_M2=db_fetch_array($_MENUS2)):?>
		<li class="s1"><a href="<?php echo RW('c='.$_CA[0].'/'.$_M2['id'])?>" target="<?php echo $_M2['target']?>"><?php echo $_M2['name']?></a>
		<?php if($_M2['isson']):?>
		<ul>
		<?php $_MENUS3=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M2['uid'].' and hidden=0 and depth=3 order by gid asc','*')?>
		<?php while($_M3=db_fetch_array($_MENUS3)):?>
		<li><a href="<?php echo RW('c='.$_CA[0].'/'.$_CA[1].'/'.$_M3['id'])?>" target="<?php echo $_M3['target']?>"<?php if($_M3['uid']==$_HM['uid']):?> class="on"<?php endif?>><?php echo $_M3['name']?></a></li>
		<?php endwhile?>
		</ul>
		<?php endif?>
		</li>
		<?php endwhile?>
		</ul>
	</div>
	<div class="clear"></div>
	<?php include __KIMS_CONTAINER_FOOT__?>
</div>


<?php include  $g['path_layout'].$d['layout']['dir'].'/_cross/bottom.php'?>
