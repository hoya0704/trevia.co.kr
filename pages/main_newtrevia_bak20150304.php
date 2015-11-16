<?php
// ******************* 메인배너 이미지/링크 ******************* //
$rcd=getDbSelect($table['sliderdata'],"sitecode='newtrevia'", "*");

$seq_array = array();

for($i=0; $R=db_fetch_array($rcd); $i++)
{
	if(empty($R['imgsrc']) || empty($R['url'])) continue;
	
	$bannerImageTemp[$R['seq']] = "/modules/slider/var/files/".$R['imgsrc'];
	$bannerLinkTemp[$R['seq']] = $R['url'];
	//echo $bannerImageTemp[$i] . " - " . $bannerLinkTemp[$i];
	array_push($seq_array, $R['seq']);

/*
	echo "<pre>";
	print_r($R);
	echo "</pre>";
//--*/
}

for($i=min($seq_array); $i<=max($seq_array); $i++) {

	do {
		$index = rand(min($seq_array), max($seq_array));
	}
	while ( $bannerImageTemp[$index] == "ok");
	if( $bannerImageTemp[$index] != null ) {
		$bannerImage[$i] = $bannerImageTemp[$index];
		$bannerLink[$i] = $bannerLinkTemp[$index];
	}
	$bannerImageTemp[$index] = "ok";
	//echo " ( " . $i . " : " . $index . " ) " . $bannerImage[$i] . " - " . $bannerLink[$i];
}
/*$bannerImage[0] = "/pages/image/main/newtrevia/main_slide_04.jpg";
$bannerImage[1] = "/pages/image/main/newtrevia/main_slide_02.jpg";
$bannerImage[2] = "/pages/image/main/newtrevia/main_slide_03.jpg";
//$bannerImage[3] = "/pages/image/main/newtrevia/main_slide_01.jpg";

$bannerLink[0] = "/?r=thailand&m=bbs&bid=event&uid=976";
$bannerLink[1] = "/?r=thailand&m=bbs&bid=event&uid=836";
$bannerLink[2] = "/?r=thailand&m=bbs&bid=event&uid=889";
$bannerLink[3] = "#";*/
// ******************* 메인배너 이미지/링크 ******************* //
?>

<?php
// 사이트 코트 알아오기
$infoSite = getDbData($table['s_site'],"id='".$r."'","uid");
$siteUid = $infoSite[0];
?>

<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/pages/js/jquery.banner.js"></script>

<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?>
<div id="subboard2">
<?php else:?>
<div id="subboard">
<?php endif?>

	<div  id="image_list_3">
		<div class="clsBannerArrow">
			<img src="/pages/image/main/btn_arrow_left.png" class="left" />
			<img src="/pages/image/main/btn_arrow_right.png" class="right" />
		</div>
		<div id="label_3">
			<ul class="clsBannerButton">
				<?php for($i=0; $i<count($bannerImage); $i++):?>
					<?php if( $bannerImage[$i] != null ):?> 
						<li><img src="<?php echo $g['s']?>/pages/image/banner_sel2.gif" oversrc="<?php echo $g['s']?>/pages/image/banner_sel2.gif" outsrc="<?php echo $g['s']?>/pages/image/banner_disel.gif" /></li>
					<?php endif?>
				<?php endfor?>
			</ul>
		</div>
		<div class="clsBannerScreen">
			<?php for($i=0; $i<count($bannerImage); $i++):?>
				<?php if( $bannerImage[$i] != null ):?> 
					<div class="images"><a href="<?php echo $g['s'].$bannerLink[$i]?>"><img src="<?php echo $g['s'].$bannerImage[$i]?>" /></a></div>
				<?php endif?>
			<?php endfor?>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	$("#image_list_3").jQBanner({nWidth:950,nHeight:380,nCount:<?php echo count($bannerImage)?>,isActType:"left",nOrderNo:1,isStartAct:"N",isStartDelay:"Y",nDelay:10000,isBtnType:"img"});
});
</script>

<div class="latest">
	<?php $infoQnA = db_fetch_array(getDbArray($table['s_comment'],"site >=4 AND site<=8 AND cync LIKE '%bid:resort%'","content,site","uid","asc","1","1"))?>
	<div class="qna">
		<img src="<?php echo $g['img_module_skin']?>/lbl_qna.gif" alt="qna" />		
		<?php
		$infoSite = getDbData($table['s_site'],"uid='".$infoQnA['site']."'","id");
		$siteR = $infoSite[0];
		?>
		<p><a href="<?php echo "?r=".$siteR."&mod=oneqna"?>"><?php echo getStrCut(strip_tags(str_replace("<","&lt;",str_replace(">","&gt;",$infoQnA['content']))), 100, "...")?></a></p>
		<div class="clear"></div>
	</div>
	<?php $infoNotice = db_fetch_array(getDbArray($table['bbsdata'],"site >=4 AND site<=8  AND bbsid='notice' AND notice = 0","uid, subject,site","uid","desc","1","1"))?>
	<div class="notice">
		<img src="<?php echo $g['img_module_skin']?>/lbl_notice.gif" alt="notice" />
		<?php
		$infoSite = getDbData($table['s_site'],"uid='".$infoNotice['site']."'","id");
		$siteR = $infoSite[0];
		?>
		<p><a href="<?php echo $g['s']?>/?r=<?php echo $siteR?>&m=bbs&uid=<?php echo $infoNotice['uid']?>"><?php echo getStrCut($infoNotice['subject'], 100, "...")?></a></p>
		<div class="clear"></div>
	</div>
	<a href="javascript:;" class="counselling"><img src="/layouts/himaldives/image/resort_navi_00.gif" /></a>
	<div class="clear"></div>
</div>

<ul class="mainCommon">
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=7 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","1"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1><img src="<?php echo $g['s']?>/pages/image/cancun-best-title.jpg" /></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="New Resort Thumbnail" class="Thumbnail" /></a>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=7 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","2"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Resort Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=7 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","3"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li class="noMargin">
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=7 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","4"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<div class="clear"></div>
</ul>
<ul class="mainCommon">
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=5 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","1"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1><img src="<?php echo $g['s']?>/pages/image/bali-best-title.jpg" /></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="New Resort Thumbnail" class="Thumbnail" /></a>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=5 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","2"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Resort Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=5 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","3"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li class="noMargin">
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=5 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","4"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>

	<!--<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=4 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","1"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1><img src="<?php echo $g['s']?>/pages/image/title_trevia_02.gif" /></h1>
		<a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li class="noMargin">
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=8 AND bbsid='resort' AND notice = 5","uid, subject, upload, d_regis, content, adddata","uid","desc","1","1"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1><img src="<?php echo $g['s']?>/pages/image/title_trevia_04.gif" /></h1>
		<a href="<?php echo "/?r=seychelles&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=seychelles&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>-->
	<div class="clear"></div>
</ul>
<ul class="mainCommon">
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=4 AND bbsid='resort' AND notice = 5 AND category='하와이'","uid, subject, upload, d_regis, content, adddata","uid","desc","1","1"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1><img src="<?php echo $g['s']?>/pages/image/main-thumb_02.jpg" /></h1>
		<a href="<?php echo "/?r=thailand&c=hawaii&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="New Resort Thumbnail" class="Thumbnail" /></a>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<p><a href="<?php echo "/?r=thailand&c=hawaii&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=4 AND bbsid='resort' AND notice = 5 AND category='하와이'","uid, subject, upload, d_regis, content, adddata","uid","desc","1","2"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=thailand&c=hawaii&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Resort Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=thailand&c=hawaii&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li>
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=4 AND bbsid='resort' AND notice = 5 AND category='코사무이'","uid, subject, upload, d_regis, content, adddata","uid","desc","1","1"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1><img src="<?php echo $g['s']?>/pages/image/main-thumb_04.jpg" /></h1>
		<a href="<?php echo "/?r=thailand&c=kosamui&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=thailand&c=kosamui&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<li class="noMargin">
		<?php $infoResort = db_fetch_array(getDbArray($table['bbsdata'],"site=4 AND bbsid='resort' AND notice = 5 AND category='코사무이'","uid, subject, upload, d_regis, content, adddata","uid","desc","1","2"))?>
		<?php $_thumbimg=getUploadImage2($infoResort['upload'],$infoResort['d_regis'],$infoResort['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoResort['adddata'])?>
		<h1 class="blank"></h1>
		<a href="<?php echo "/?r=thailand&c=kosamui&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $_thumbimg?>" alt="Best Product Thumbnail" class="Thumbnail" /></a>
		<p><a href="<?php echo "/?r=thailand&c=kosamui&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
		<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
	</li>
	<div class="clear"></div>
</ul>

<div class="main_banner" style="position:absolute; top:450px; left:50%; margin-left:450px;">
<ul>
<!-- 삭제조치 2014.10.22
	<li>
		<a href="<?php echo $g['s']?>/?r=mexico&m=bbs&bid=notice&uid=3508">
			<img src="<?php echo $g['s']?>/pages/image/main/banner/main_gift_02.jpg" /> 
		</a>
	</li>
-->
	<li>
		<a href="<?php echo $g['s']?>/?r=dubai&m=bbs&bid=notice&uid=2236">
			<img src="<?php echo $g['s']?>/pages/image/main/banner/main_insurance_01.jpg" />
		</a>
	</li>
<!-- 삭제 조치 2013.11.04
	<li>
		<a href="https://www.facebook.com/box1race" target="_blank">
			<img src="<?php echo $g['s']?>/pages/image/banner_box1.jpg" /> 
		</a>
	</li>
-->
	<li>
		<a href="http://www.trevia.co.kr/?r=dubai&m=bbs&uid=2529" target="_blank">
			<img src="<?php echo $g['s']?>/pages/image/right_banner_02.jpg" /> 
		</a>
	</li>
	<li>
		<a href="http://www.trevia.co.kr/?r=dubai&m=bbs&bid=complain&uid=5663" target="_blank">
			<img src="<?php echo $g['s']?>/pages/image/right_banner_03.jpg" /> 
		</a>
	</li>
	<li>
		<a href="http://www.trevia.co.kr/?r=thailand&m=bbs&bid=event&uid=8385" target="_blank">
			<img src="<?php echo $g['s']?>/pages/image/right_banner.jpg" /> 
		</a>
	</li>
	<li>
		<a href="http://www.trevia.co.kr/?r=dubai&m=bbs&bid=complain&uid=7648" target="_blank">
			<img src="<?php echo $g['s']?>/pages/image/right_banner_cash.jpg" /> 
		</a>
	</li>
	<li>
		<img src="<?php echo $g['s']?>/pages/image/kakaoidban.jpg" /> 
	</li>
	<li>
		<a href="http://blog.naver.com/treviatour" target="_blank"><img src="<?php echo $g['s']?>/pages/image/blogbanner.gif" /></a>
	</li>
</ul>
</div>

<ul class="mainCommon mainLinks">
	<h1><img src="<?php echo $g['img_module_skin']?>/title_trevia_event.gif" alt="특가&이벤트" /></h1>
	<?php $resArticle=getDbArray($table['bbsdata'],"site=".$siteUid." AND bbsid='event' AND notice = 1","uid, subject, upload, d_regis, adddata","uid","desc","3","1")?>
	<?php for($i=0; ($infoArticle=db_fetch_array($resArticle)); $i++):?>
	<li<?php if($i==2):?> class="noMargin"<?php endif?>>
		<?php $_thumbimg=getUploadImage2($infoArticle['upload'],$infoArticle['d_regis'],$infoArticle['content'],"jpg|jpeg|gif|png")?>
		<?php $adddata = unserialize($infoArticle['adddata'])?>
		<a href="<?php echo RW("m=bbs&bid=event&uid=".$infoArticle['uid'])?>"><img src="<?php echo $_thumbimg?>" alt="<?php echo $infoArticle['subject']?>" /></a>
		<h2><a href="<?php echo RW("m=bbs&uid=" . $infoArticle['uid']);?>"><?php echo $infoArticle['subject']?></a></h2>
<!--		<p class="event"><?php echo getStrCut(strip_tags(urldecode($adddata['desc'])), 100, "")?></p> -->
		<p class="event" style="width:310px;height:45px;"><?php echo getStrCut(strip_tags(urldecode($adddata['desc'])), 100, "")?></p>
	</li>
	<?php endfor?>
	<div class="clear"></div>
</ul>

<ul class="mainCommon mainLinks">
	<li>
		<h1><img src="/pages/image/main_icon_notice.jpg" alt="트레비아 공지사항" /></h1>
		<ul class="latestArticle">
		<?php $infoNotice = getDbArray($table['bbsdata'],"site >=4 AND site<=8  AND bbsid='notice' AND notice = 0","uid, subject,site","uid","desc","5","1")?>
		<?php for($i=0; ($infoNotice_element=db_fetch_array($infoNotice)); $i++):?>
			<li><a href="./?r=dubai&m=bbs&uid=<?=$infoNotice_element[uid]?>"><?=$infoNotice_element[subject]?></a></li>
		<?php endfor ?>
		</ul>
	</li>
	<li>
		<h1><img src="/pages/image/main_icon_resortnews.jpg" alt="리조트 소식" /></h1>
		<ul class="latestArticle">
		<?php $infoNotice = getDbArray($table['bbsdata'],"site >=4 AND site<=8  AND bbsid='resortnews' AND notice = 0","uid, subject,site","uid","desc","5","1")?>
		<?php for($i=0; ($infoNotice_element=db_fetch_array($infoNotice)); $i++):?>
			<li><a href="./?r=dubai&m=bbs&uid=<?=$infoNotice_element[uid]?>"><?=$infoNotice_element[subject]?></a></li>
		<?php endfor ?>
		</ul>
	</li>
	<li class="noMargin">
		<h1><img src="/pages/image/main_icon_travel.jpg" alt="경유지 & 여행 정보" /></h1>
		<ul class="latestArticle">
		<?php $infoNotice = getDbArray($table['bbsdata'],"site >=4 AND site<=8  AND (bbsid='travelinfo2' OR bbsid='travelinfo') AND notice = 0","uid, subject,site","uid","desc","5","1")?>
		<?php for($i=0; ($infoNotice_element=db_fetch_array($infoNotice)); $i++):?>
			<li><a href="./?r=dubai&m=bbs&uid=<?=$infoNotice_element[uid]?>"><?=$infoNotice_element[subject]?></a></li>
		<?php endfor ?>
		</ul>
	</li>
	<div class="clear"></div>
</ul>