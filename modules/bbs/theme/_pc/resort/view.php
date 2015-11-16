<?
// 검색엔진에서 사이트코드 뒤섞이는 문제
$infoSite = getDbData($table['s_site'],"uid='".$R['site']."'","id");

if($infoSite[0] != $r) $r = $infoSite[0];
?>

<?php
// 로케이션바 배경 선택
if($r == "maldives")
{
	if($R['category'] == "국내선지역") $bg_class = "ship";
	else if($R['category'] == "수상비행기") $bg_class = "float";
	else if($R['category'] == "스피드보트") $bg_class = "boat";
}
?>

<div id="bbsview"<?php if($r!="maldives"):?> class="ntTitle"<?else:?> class="<?php echo $bg_class?>"<?php endif?>>
	<?php
	$adddata = unserialize($R['adddata']);
	if(is_array($adddata))
	{
		foreach($adddata as $key => $value)
		{
			$adddata[$key] = stripslashes(urldecode($value));
		}
	}
	?>

	<?php if($r!="maldives"):?>
	<?php
	// 국가
	$infoSite = getDbData($table['s_site'],"id='".$r."'","name");
	$siteTitle = str_replace("트레비아_","",$infoSite[0]);
	if( $R['category'] == "하와이" ) $siteTitle = "미주";
	?>
	<span class="locText ntLoc"><h5 class="loc1"><?php echo $siteTitle?></h5><h5 class="loc2"><?php echo $R['category']?></h5><span class="loc3"><?php echo $adddata['sbj_eng']?></span></span>
	<?php else:?>
	<span class="locText<?php if($bg_class=="boat"):?> locTextBoat<?php endif?>"><?php echo $adddata['sbj_eng']?></span>
	<?php endif?>	

	<div class="viewbox">
		<div id="vContent" class="content">
			<dl class="category">
				<dt>대륙구분</dt>
				<dd><?php echo $adddata['category1']?></dd>
				<dt>국가구분</dt>
				<dd><?php echo $adddata['category2']?></dd>
				<dt>지역구분</dt>
				<dd><?php echo $adddata['category3']?></dd>
				<dt>등급구분</dt>
				<dd><?php echo $adddata['category4']?></dd>
				<dt>유형구분</dt>
				<dd><?php echo $adddata['category5']?></dd>
			</dl>
			<dl class="info">
				<dt>리조트명한글</dt>
				<dd><?php echo $R['subject']?></dd>
				<dt>리조트명영문</dt>
				<dd><?php echo $adddata['sbj_eng']?></dd>
				<dt>객실수</dt>
				<dd><?php echo $adddata['room_cnt']?>개</dd>
				<dt>이동수단</dt>
				<dd><?php echo $adddata['transportation']?></dd>
				<dt>상세위치</dt>
				<dd title="<?php echo $adddata['location']?>"><?php echo $adddata['location']?></dd>
			</dl>
			<dl class="ext">
				<dt class="strong">리조트 특징</dt>
				<dd class="tooltip feature" title="<?php echo htmlspecialchars($adddata['feature'])?>"><?php echo $adddata['feature']?></dd>
				<dt>허니문 특전</dt>
				<dd class="tooltip honeymoon" title="<?php echo htmlspecialchars($adddata['honeymoon'])?>"><?php echo $adddata['honeymoon']?></dd>
			</dl>
			<div class="clear"></div>
			<?php 
			// 내용 쪼개기
			$arrContent = explode("[bc_separator]", $R['content']);

			if($_GET['dp'] == "resort" || $_GET['dp'] == "") echo getContents($arrContent[0],$R['html']) ."\n<br><br>\n";
			if($_GET['dp'] == "room" || $_GET['dp'] == "") echo getContents($arrContent[1],$R['html']) ."\n<br><br>\n";
			if($_GET['dp'] == "facility" || $_GET['dp'] == "") echo getContents($arrContent[2],$R['html']) ."\n<br><br>\n";
			?>

			<?php if($_GET['dp'] == "sdetail"):?>
			<table class="miniboard">
			<colgroup>
				<col width="100" />
				<col width="70" />
				<col width="80" />
				<col width="" />
				<col width="120" />
			</colgroup>
			<thead>
			<tr>
				<th scope="col">항공편</th>
				<th scope="col">직항</th>
				<th scope="col">일정</th>
				<th scope="col">일정상세</th>
				<th scope="col">일정 및 요금</th>
			</tr>
			</thead>
			<?php if($my['admin']):?>
			<tfoot>
			<tr height="20">
				<td colspan="5" align="right">
					<span class="btn00"><a href="<?php echo RW("m=bbs&bid=sdetail")?>">목록보기</a></span>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="btn00"><a href="<?php echo RW("m=bbs&bid=sdetail&mod=write")?>">글쓰기</a></span>
				</td>
			</tr>
			</tfoot>
			<?php endif?>
			<tbody>
			<?php $resSdetail = getDbArray($table['bbsdata'],"bbsid='sdetail' AND category='".$R['subject']."'","uid, subject, content, adddata","uid","desc","30","1");?>
			<?php while($infoSdetail = db_fetch_array($resSdetail)):?>
			<?php $adddata = unserialize($infoSdetail['adddata'])?>
			<tr<?php if($did==$infoSdetail['uid']):?> class="open"<?php endif?> onclick="location.href='<?php echo RW("m=bbs&bid=resort&uid=".$uid."&dp=sdetail&did=".$infoSdetail['uid'])?>'" style="cursor:pointer;">
				<td class="center"><?php echo urldecode($adddata['airline'])?></td>
				<td class="center"><?php echo urldecode($adddata['direct'])?></td>
				<td class="center"><?php echo urldecode($adddata['days'])?></td>
				<td class="center"><?php echo $infoSdetail['subject']?></td>
				<td class="center">
					<a href="<?php echo RW("m=bbs&bid=resort&uid=".$uid."&dp=sdetail&did=".$infoSdetail['uid'])?>">일정 및 요금</a>
				</td>
			</tr>
			<?php if($did==$infoSdetail['uid']) $sdetailContent = $infoSdetail['content']?>
			<?php endwhile?>
			</tbody>
			</table>
			<div class="sdetail">
				<?php echo $sdetailContent?>
			</div>
			<?php endif?>
			<?php if($_GET['dp'] == "airline"):?>
			<?php $resAirline = getDbArray($table['bbsdata'],"bbsid='airline'","uid, subject, content, nic, hit, d_regis","uid","desc","15","1");?>
			<table class="miniboard">
			<colgroup>
				<col width="" />
				<col width="80" />
				<col width="70" />
				<col width="90" />
			</colgroup>
			<thead>
			<tr>
				<th scope="col">제목</th>
				<th scope="col">글쓴이</th>
				<th scope="col">조회</th>
				<th scope="col">날짜</th>
			</tr>
			</thead>
			<tbody>
			<?php while($infoAirline = db_fetch_array($resAirline)):?>
			<tr>
				<td class="sbj"><a href="<?php echo RW("m=bbs&uid=".$infoAirline['uid'])?>" target="_blank"><?php echo $infoAirline['subject']?></a></td>
				<td class="nic"><?php echo $infoAirline['nic']?></td>
				<td class="hit"><?php echo $infoAirline['hit']?></td>
				<td class="d_regis"><?php echo getDateFormat($infoAirline['d_regis'], "Y-m-d")?></td>
			</tr>
			<?php /*<tr class="content">
				<td colspan="4"><?php echo $infoAirline['content']?></td>
			</tr>*/?>
			<?php endwhile?>
			</tbody>
			</table>
			<?php endif?>
			<?php if($_GET['dp'] == "travelinfo"):?>
			<?php $infoSite = getDbData($table['s_site'],"id='".$r."'","uid"); ?>
			<?php $resTravel = getDbArray($table['bbsdata'],"site=".$infoSite[0]." AND bbsid='tour'","uid, subject, content, nic, hit, d_regis","uid","desc","15","1");?>
			<table class="miniboard">
			<colgroup>
				<col width="" />
				<col width="80" />
				<col width="70" />
				<col width="90" />
			</colgroup>
			<thead>
			<tr>
				<th scope="col">제목</th>
				<th scope="col">글쓴이</th>
				<th scope="col">조회</th>
				<th scope="col">날짜</th>
			</tr>
			</thead>
			<tbody>
			<?php while($infoTravel = db_fetch_array($resTravel)):?>
			<tr>
				<td class="sbj"><a href="<?php echo RW("m=bbs&uid=".$infoTravel['uid'])?>" target="_blank"><?php echo $infoTravel['subject']?></a></td>
				<td class="nic"><?php echo $infoTravel['nic']?></td>
				<td class="hit"><?php echo $infoTravel['hit']?></td>
				<td class="d_regis"><?php echo getDateFormat($infoTravel['d_regis'], "Y-m-d")?></td>
			</tr>				
			<?php endwhile?>			
			</tbody>
			</table>
			<?php endif?>
			<?php if(!$_GET['dp'] || $_GET['dp'] == "resort"):?>
			<?php $resNews = getDbArray($table['bbsdata'],"bbsid='resortnews' AND category='".$R['subject']."'","uid, subject, content, nic, hit, d_regis","uid","desc","15","1");?>
			<!--<?php echo $table['bbsdata']." // bbsid='resortnews' AND category='".$cate."'" . "  // uid, subject, content, nic, hit, d_regis"?>-->
			<h1><img src="<?php echo $g['img_module_skin']?>/title_resortnews.gif" /><?php if(!$my['uid']):?><img src="<?php echo $g['img_module_skin']?>/title_resortnews_sub.gif" /><?php endif?></h1>
			<table class="miniboard">
			<colgroup>
				<col width="" />
				<col width="100" />
				<col width="70" />
				<col width="90" />
			</colgroup>
			<thead>
			<tr>
				<th scope="col">제목</th>
				<th scope="col">글쓴이</th>
				<th scope="col">조회</th>
				<th scope="col">날짜</th>
			</tr>
			</thead>
			<tbody>
			<?php while($infoNews=db_fetch_array($resNews)):?>
			<tr>
				<td class="sbj"><?php if($my['uid']):?><a href="<?php echo RW("m=bbs&uid=".$infoNews['uid'])?>" target="_blank"><?php endif?><?php echo $infoNews['subject']?><?php if($my['uid']):?></a><?php endif?></td>
				<td class="nic"><?php echo $infoNews['nic']?></td>
				<td class="hit"><?php echo $infoNews['hit']?></td>
				<td class="d_regis"><?php echo getDateFormat($infoNews['d_regis'], "Y-m-d")?></td>
			</tr>				
			<?php endwhile?>
			<?php if(db_num_rows($resNews) < 1):?>
			<tr>
				<td class="sbj">해당 리조트에 대한 글이 없습니다.</td>
				<td class="nic">-</td>
				<td class="hit">-</td>
				<td class="d_regis">-</td>
			</tr>
			<?php endif?>
			</tbody>
			</table>
			<?php endif?>

			

			<?php if($d['theme']['show_score1']||$d['theme']['show_score2']):?>
			<div class="scorebox">
			<?php if($d['theme']['show_score1']):?>
			<a href="<?php echo $g['bbs_action']?>score&amp;value=good&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 평가하시겠습니까?');"><img src="<?php echo $g['img_module_skin']?>/btn_s_1.gif" alt="공감" /></a> 
			<?php endif?>
			<?php if($d['theme']['show_score2']):?>
			<a href="<?php echo $g['bbs_action']?>score&amp;value=bad&amp;uid=<?php echo $R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 평가하시겠습니까?');"><img src="<?php echo $g['img_module_skin']?>/btn_s_2.gif" alt="비공감" /></a> 
			<?php endif?>
			</div>
			<?php endif?>

			<?php if($R['tag']&&$d['theme']['show_tag']):?>
			<div class="tag">
			<img src="<?php echo $g['img_core']?>/_public/ico_tag.gif" alt="태그" />
			<?php $_tags=explode(',',$R['tag'])?>
			<?php $_tagn=count($_tags)?>
			<?php $i=0;for($i = 0; $i < $_tagn; $i++):?>
			<?php $_tagk=trim($_tags[$i])?>
			<a href="<?php echo $g['bbs_orign']?>&amp;where=subject|tag&amp;keyword=<?php echo urlencode($_tagk)?>"><?php echo $_tagk?></a><?php if($i < $_tagn-1):?>, <?php endif?>
			<?php endfor?>
			</div>
			<?php endif?>

			<?php if($d['upload']['data']&&$d['theme']['show_upfile']):?>
			<div class="attach">
			<ul>
			<?php foreach($d['upload']['data'] as $_u):?>
			<?php if($_u['hidden'])continue?>
			<li>
				<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;a=download&amp;uid=<?php echo $_u['uid']?>" title="<?php echo $_u['caption']?>"><?php echo $_u['name']?></a>
				<span class="size">(<?php echo getSizeFormat($_u['size'],1)?>)</span>
				<span class="down">(<?php echo number_format($_u['down'])?>)</span>
			</li>
			<?php endforeach?>
			</ul>
			</div>
			<?php endif?>

			<?php if($d['theme']['snsping']):?>
			<div class="snsbox">
			<img src="<?php echo $g['img_core']?>/_public/sns_t1.gif" alt="twitter" title="게시글을 twitter로 보내기" onclick="snsWin('t');" />
			<img src="<?php echo $g['img_core']?>/_public/sns_f1.gif" alt="facebook" title="게시글을 facebook으로 보내기" onclick="snsWin('f');" />
			<img src="<?php echo $g['img_core']?>/_public/sns_m1.gif" alt="me2day" title="게시글을 me2day로 보내기" onclick="snsWin('m');" />
			<img src="<?php echo $g['img_core']?>/_public/sns_y1.gif" alt="요즘" title="게시글을 요즘으로 보내기" onclick="snsWin('y');" />
			</div>
			<?php endif?>
		</div>
	</div>

	<div class="bottom">
	<?php if($my['admin']):?>
		<span class="btn00"><a href="<?php echo $g['bbs_modify'].$R['uid']?>">수정</a></span>
		<?php if($d['theme']['use_reply']):?><span class="btn00"><a href="<?php echo $g['bbs_reply'].$R['uid']?>">답변</a></span><?php endif?>
		<span class="btn00"><a href="<?php echo $g['bbs_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 삭제하시겠습니까?');">삭제</a></span>
		<span class="btn00"><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=admin&module=<?php echo $m?>&front=movecopy&type=multi_move&postuid=<?php echo $R['uid']?>');">이동</a></span>
		<span class="btn00"><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=admin&module=<?php echo $m?>&front=movecopy&type=multi_copy&postuid=<?php echo $R['uid']?>');">복사</a></span>
		<span class="btn00"><a href="<?php echo $g['bbs_list']?>&uidX=<?php echo $uid;?>">목록으로</a></span>
	<?php endif?>
	</div>

	<?php if(!$d['bbs']['c_hidden']):?>
	<div class="comment">
		<?php if(getNew($R['d_comment'],24)):?><img src="<?php echo $g['img_core']?>/_public/ico_new_01.gif" alt="new" /><?php endif?>
		<?php if($d['theme']['use_trackback']):?>
		| <a href="#." onclick="commentShow('trackback');">엮인글 <span id="trackback_num<?php echo $R['uid']?>"><?php echo $R['trackback']?></span>개</a>
		<?php if(getNew($R['d_trackback'],24)):?><img src="<?php echo $g['img_core']?>/_public/ico_new_01.gif" alt="new" /><?php endif?>
		<?php endif?>
	</div>
	<a name="CMT"></a>
	<?php
	// 트레비아일 경우 $r 변수 dubai 로 고정
	if($r != "maldives" && $r != "dubai") $r = "dubai";
	?>
	<iframe name="commentFrame" id="commentFrame" src="<?php if(!$d['bbs']['c_hidden']&&($CMT || $d['bbs']['c_open'])):?><?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=comment&amp;bid=<?php echo $bid?>&amp;skin=<?php echo $d['bbs']['c_skin']?>&amp;hidepost=<?php echo ($R['display']?0:1)?>&amp;iframe=Y&amp;cync=[<?php echo $m?>][<?php echo $R['uid']?>][uid,comment,oneline,d_comment][<?php echo $table[$m.'data']?>][<?php echo $R['mbruid']?>][m:<?php echo $m?>,bid:<?php echo $R['bbsid']?>,uid:<?php echo $R['uid']?>]&amp;CMT=<?php echo $CMT?><?php endif?>" width="100%" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
	<?php endif?>

</div> 


<script type="text/javascript">
//<![CDATA[
<?php if($d['theme']['snsping']):?>
function snsWin(sns)
{
	var snsset = new Array();
	var enc_tit = "<?php echo urlencode($_HS['title'])?>";
	var enc_sbj = "<?php echo urlencode($R['subject'])?>";
	var enc_url = "<?php echo urlencode($g['url_root'].($_HS['rewrite']?($_HS['usescode']?'/'.$r:'').'/b/'.$R['bbsid'].'/'.$R['uid']:'/?'.($_HS['usescode']?'r='.$r.'&':'').'m='.$m.'&bid='.$R['bbsid'].'&uid='.$R['uid']))?>";
	var enc_tag = "<?php echo urlencode(str_replace(',',' ',$R['tag']))?>";

	snsset['t'] = 'http://twitter.com/home/?status=' + enc_sbj + '+++' + enc_url;
	snsset['f'] = 'http://www.facebook.com/sharer.php?u=' + enc_url + '&t=' + enc_sbj;
	snsset['m'] = 'http://me2day.net/posts/new?new_post[body]=' + enc_sbj + '+++["'+enc_tit+'":' + enc_url + '+]&new_post[tags]='+enc_tag;
	snsset['y'] = 'http://yozm.daum.net/api/popup/prePost?sourceid=' + enc_url + '&prefix=' + enc_sbj;
	window.open(snsset[sns]);
}
<?php endif?>
function printWindow(url) 
{
	window.open(url,'printw','left=0,top=0,width=700px,height=600px,statusbar=no,scrollbars=yes,toolbar=yes');
}
function commentShow(type)
{
	var url;
	if (type == 'comment')
	{
		url = '<?php echo $g['s']?>/?r=<?php echo $r?>&m=comment&skin=<?php echo $d['bbs']['c_skin']?>&hidepost=<?php echo ($R['display']?0:1)?>&iframe=Y&cync=';
		url+= '[<?php echo $m?>][<?php echo $R['uid']?>]';
		url+= '[uid,comment,oneline,d_comment]';
		url+= '[<?php echo $table[$m.'data']?>][<?php echo $R['mbruid']?>]';
		url+= '[m:<?php echo $m?>,bid:<?php echo $R['bbsid']?>,uid:<?php echo $R['uid']?>]';
		url+= '&CMT=<?php echo $CMT?>';
	}
	else {
		url = '<?php echo $g['s']?>/?r=<?php echo $r?>&m=trackback&iframe=Y&cync=';
		url+= '[<?php echo $m?>][<?php echo $R['uid']?>]';
		url+= '[m:<?php echo $m?>,bid:<?php echo $R['bbsid']?>,uid:<?php echo $R['uid']?>]';
		url+= '&TBK=<?php echo $TBK?>';
	}

	frames.commentFrame.location.href = url;
}
function setImgSizeSetting()
{
	<?php if($d['theme']['use_autoresize']):?>
	var ofs = getOfs(getId('vContent')); 
	getDivWidth(ofs.width,'vContent');
	<?php endif?>
	getId('vContent').style.fontFamily = getCookie('myFontFamily');
	getId('vContent').style.fontSize = getCookie('myFontSize');

	<?php if($TRACKBACK):?>
	commentShow('trackback');
	<?php endif?>

	<?php if($print=='Y'):?>
	document.body.style.padding = '15px';
	self.print();
	<?php endif?>
}
window.onload = setImgSizeSetting;
//]]>
</script>

<?php if($d['theme']['show_list']&&$print!='Y'):?>
<?php include_once $g['dir_module'].'lang.'.$_HS['lang'].'/mod/_list.php'?>
<?php include_once $g['dir_module_skin'].'list.php'?>
<?php endif?>

