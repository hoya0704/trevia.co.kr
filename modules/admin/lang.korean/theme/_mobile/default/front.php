<div id="wrap">
	<div id="header">
		<div class="logo">
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=<?php echo $m?>"><img src="<?php echo $g['img_core']?>/_public/ico_rb.gif" alt="rb" /></a>
		</div>
		<div class="logout">
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout"><img src="<?php echo $g['img_core']?>/_public/btn_logout.gif" alt="logout" /></a>
		</div>
		<div class="clear"></div>
	</div>
	<div id="container">


		<div class="mtitle">
			<div class="xl">
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=<?php echo $m?>"><span class="b"><?php echo $my[$_HS['nametype']]?>님</span> Mobile Administration</a>
			</div>
			<div class="xr">
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>" class="b">HOME</a>
			</div>
			<div class="clear"></div>
		</div>


		<?php if($module == 'admin'):?>

		<div class="allmodule">
			<?php $MODULES = getDbArray($table['s_module'],'hidden=0 and mobile=1','*','gid','asc',0,1)?>
			<?php while($R=db_fetch_array($MODULES)):?>
			<?php if(strpos('_'.$my['adm_view'],'['.$R['id'].']')) continue?>
			<div class="module<?php if($R['id']==$module):?> selected<?php endif?>" title="<?php echo $R['id']?>">
				<div class="name<?php if($R['id']==$module):?> nselected<?php endif?>"><span><?php echo $R['name']?></span></div>
				<div class="icon" style="background:url('<?php echo getThumbImg($g['path_module'].$R['id'].'/icon')?>') center center no-repeat;" onselectstart="return false;"><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=<?php echo $m?>&amp;module=<?php echo $R['id']?>"><img src="<?php echo $g['img_core']?>/blank.gif" alt="<?php echo $R['name']?>(<?php echo $R['id']?>)" /></a></div>
			</div>
			<?php endwhile?>
			<?php if(!db_num_rows($MODULES)):?>
			<div class="none">
			모바일 관리패널에 등록된 모듈이 없습니다.<br />
			관리패널 등록은 PC모드에서만 지원됩니다.
			</div>
			<?php endif?>
		</div>

		<div class="clear"></div>

		<?php else:?>

		<div class="tab01">
			<ul>
			<?php if(count($d['amenu'])):?>
			<?php foreach($d['amenu'] as $_k => $_v):?>
			<li<?php if($front == $_k):?> class="on"<?php endif?> onclick="goHref('<?php echo $g['s']?>/?r=<?php echo $r?>&m=<?php echo $m?>&module=<?php echo $module?>&front=<?php echo $_k?><?php if($account):?>&account=<?php echo $account?><?php endif?>');"><span><?php echo $_v?></span></li>
			<?php endforeach?>
			<li class="wall">&nbsp;</li>
			<?php else:?>
			<li onclick="goHref('<?php echo $g['s']?>/?r=<?php echo $r?>&a=pcmode');"><span>PC화면 전환</span></li>
			<li class="on"><span>모듈안내</span></li>
			<li onclick="goHref('<?php echo $g['s']?>/?r=<?php echo $r?>&m=<?php echo $m?>');"><span>모듈 프론트로 돌아가기</span></li>
			<li class="wall">&nbsp;</li>
			<?php endif?>
			</ul>
			<div class="more">

			</div>
		</div>
		<div class="loc1">
			현재위치 : <?php echo $MD['name']?><?php if($d['amenu'][$front]):?> &gt; <?php echo $d['amenu'][$front]?><?php endif?>
		</div>


		<div class="cwrap">
		<?php if(is_file($g['adm_module_varmenu'])):?>
		<?php include_once $g['adm_module']?>
		<?php else:?>


		<div class="notice">
			<div class="icon" style="background:url('<?php echo getThumbImg($g['path_module'].$MD['id'].'/icon')?>') center center no-repeat;"></div>
			<div class="ment">
			<div><?php echo $MD['name']?><span>(<?php echo $MD['id']?>)</span></div>
			이 모듈은 모바일 관리자모드를 지원하지 않습니다. <a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=<?php echo $m?>&amp;a=module_mobile_eject&amp;module_id=<?php echo $MD['id']?>" class="del" onclick="return confirm('정말로 제외하시겠습니까?   ');">모바일 프론트에서 제외하기</a><br />
			</div>
		</div>

		<?php endif?>
		</div>

		<?php endif?>


	</div>

	<div id="footer">

		<p>
		<a href="http://www.redblock.co.kr" target="_blank">Copyrights &copy; Redblock Allrights Reserved.</a><br />
		<a href="http://www.kimsq.com/" target="_blank">Powered by kimsQ-Rb</a><br />
		</p>


	</div>
</div>
