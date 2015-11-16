<style>
	ul.mainCommon { margin: 13px 0 0 0; padding: 0; list-style: none; }
	ul.mainCommon h1 { margin: 0 0 12px 0; padding: 0; font-family: "Times New Roman"; font-style: italic; font-size: 20px; font-weight: normal; }
	ul.mainCommon li { float: left; margin-right: 8px; height:230px; }
	ul.mainCommon li img.Thumbnail { width:210px; height:129px; }
	ul.mainCommon li p { width: 210px; height: 12px; margin: 10px 0 0 0; padding: 0; overflow: hidden; font-weight:bold}
	ul.mainCommon li p.content { width: 210px; height: 35px; overflow: hidden; color: #7e7e7e; line-height: 18px; font-size: 11px; font-weight:normal}
</style>
<?

if($cat == "수상비행기" || $R['category'] == "수상비행기" )
	$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND (category = '수상비행기')","uid, subject, upload, adddata","uid","desc","","");
// == //
// ==== 프랄린, 마헤 , 라디그
else if($R['category'] == "프랄린" || $R['category'] == "마헤" || $R['category'] == "라디그")
{
	$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND (category = '프랄린' OR category = '마헤' OR category = '라디그')","uid, subject, upload, adddata","uid","desc","","");
}
else
{
	if($bid == "resort")
		$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND category = '" . ($cat ? $cat : $R['category']) . "'","uid, subject, upload, adddata","uid","desc","","");
	else
		$resResort = getDbArray($table['bbsdata'],"bbsid='resort'","uid, subject, upload","uid","desc","","");
}
$rcdCount = mysql_num_rows($resResort);
$perCol = ceil($rcdCount / 4);
?>

<div >
	<div style="margin-top:20px;"><img src="/layouts/himaldives/image/<?=$c?>.jpg" /></div>
	<ul class="mainCommon">
		<?php for($i = 1; ($infoResort = db_fetch_array($resResort)); $i++):?>
		<?php
		$uploadUid = substr($infoResort['upload'], 1, strpos($infoResort['upload'], "]") - 1);
		$infoUpload = getDbData($table['s_upload'], "uid = " . $uploadUid, "url, folder, thumbname ");
		$uploadSrc = $infoUpload[0] . $infoUpload[1] . "/" . $infoUpload[2];
		?>
		<li>
			<?php $adddata = unserialize($infoResort['adddata'])?>
			<a href="<?php echo "/?r=".$r."&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><img src="<?php echo $uploadSrc?>" alt="New Resort Thumbnail" class="Thumbnail" /></a>
			<?php $adddata = unserialize($infoResort['adddata'])?>
			<p><a href="<?php echo "/?r=mexico&m=bbs&uid=".$infoResort['uid']?>&dp=resort"><?php echo $infoResort['subject'] . " " . urldecode($adddata['sbj_eng'])?></a></p>
			<p class="content"><?php echo getStrCut(urldecode($adddata["feature"]), 200, "")?></p>
		</li>
		<?php endfor?>
	</ul>
</div>