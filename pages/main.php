<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/pages/js/jquery.banner.js"></script>

<div id="subboard">
	<div  id="image_list_3">
		<div  id="label_3">
			<ul class="clsBannerButton">
				<li><img src="<?php echo $g['s']?>/pages/image/banner_sel.gif" oversrc="<?php echo $g['s']?>/pages/image/banner_sel.gif" outsrc="<?php echo $g['s']?>/pages/image/banner_disel.gif" /></li>
				<li><img src="<?php echo $g['s']?>/pages/image/banner_disel.gif" oversrc="<?php echo $g['s']?>/pages/image/banner_sel.gif" outsrc="<?php echo $g['s']?>/pages/image/banner_disel.gif" /></li>
				<li><img src="<?php echo $g['s']?>/pages/image/banner_disel.gif" oversrc="<?php echo $g['s']?>/pages/image/banner_sel.gif" outsrc="<?php echo $g['s']?>/pages/image/banner_disel.gif" /></li>
				<li><img src="<?php echo $g['s']?>/pages/image/banner_disel.gif" oversrc="<?php echo $g['s']?>/pages/image/banner_sel.gif" outsrc="<?php echo $g['s']?>/pages/image/banner_disel.gif" /></li>
			</ul>
		</div>
		<div class="clsBannerScreen">
			<div class="images" style="display:block"><img src="<?php echo $g['s']?>/pages/image/banner1.jpg" /></div>
			<div class="images"><img src="<?php echo $g['s']?>/pages/image/banner2.jpg" /></div>
			<div class="images"><img src="<?php echo $g['s']?>/pages/image/banner3.jpg" /></div>
			<div class="images"><img src="<?php echo $g['s']?>/pages/image/banner4.jpg" /></div>
		</div>
	</div>
</div>

<div id="bn_m1"><img src="<?php echo $g['s']?>/pages/image/bn_m1.gif" /></div>
<div id="bn_m2"><img src="<?php echo $g['s']?>/pages/image/bn_m2.gif" /></div>
<div id="bn_m3"><img src="<?php echo $g['s']?>/pages/image/bn_m3.gif" /></div>
<div id="bn_m4"><img src="<?php echo $g['s']?>/pages/image/bn_m4.gif" /></div>

<script type="text/javascript">
$(function() {
	$("#image_list_3").jQBanner({nWidth:960,nHeight:478,nCount:4,isActType:"left",nOrderNo:1,isStartAct:"N",isStartDelay:"Y",nDelay:6000,isBtnType:"img"});
});
</script>