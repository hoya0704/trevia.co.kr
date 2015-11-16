<!-- bc 라운지 제공소스 -->
<link rel="stylesheet" type="text/css" href="http://loung.bccard.com/front/tour/css/tour.css" />
<link rel="stylesheet" type="text/css" href="<?=$g['img_module_skin']?>/css/trevia.css" /><!-- 트레비아 페이지 관련 CSS -->

<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/common.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/main_rolling.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery.bxSlider.min.js"></script>
<!-- bc 라운지 제공소스 -->

<div id="contents_wrap">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="http://loung.bccard.com/front/tour/img/main/h3_tour_oversea.gif" alt="해외여행" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<?php echo $g['img_layout']?>/img/stit_overseas.jpg" alt="라운지투어는 하나투어, 모두투어, 한진관광, 레드캡투어와 제휴하여 해외여행 서비스를 제공하고 있습니다."  /></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<?=$g['img_module_skin']?>/title_v_01.gif"></td>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</table>


<!-- 본문 시작 -->

<div style="background:#ffffff;border:solid 1px #dfdfdf;padding:8px 8px 8px 8px;">
  <table width="300" class="bbs-view mgb20">
    <colgroup>
    <col style="width:150px;" />
    <col />
    </colgroup>
    <tbody>
      <tr>
        <th height="30"> 이 름</th>
        <td style="padding:10px 10px 10px 10px;font-weight:bold;"><?php echo $R['name']?></td>
      </tr>
      <tr>
        <th height="30">연락처</th>
        <td style="padding:10px 10px 10px 10px;font-weight:bold;"><?php echo $R['add_txt1']?> - <?php echo $R['add_txt2']?> - <?php echo $R['add_txt3']?></td>
      </tr>
	  <tr>
        <th height="30">이메일</th>
        <td style="padding:10px 10px 10px 10px;font-weight:bold;"><?php echo $R['add_txt4']?>@<?php echo $R['add_txt5']?></td>
      </tr>
      <tr>
        <th height="30">여행 출발일</th>
        <td style="padding:10px 10px 10px 10px;font-weight:bold;"><?php echo $R['add_txt6']?></td>
      </tr>
      <tr>
        <th>문의사항</th>
        <td valign="top" style="padding:10px 10px 10px 10px;font-weight:bold;"><?php echo getContents($R['content'],$R['html'],$keyword)?></td>
      </tr>
    </tbody>
  </table>
</div>
		
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td height="20">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<?=$g['img_module_skin']?>/v_text_01.gif"></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<?=$g['img_module_skin']?>/v_text_02.gif"></td>
  </tr>
</table>

</div>

<?if($iframe == "Y"):?>
<div align="center"><a href="#" onClick=parent.close();><img src="<?=$g['img_module_skin']?>/close.gif" border="0"></a></div>
<div style="margin-top:20px;"></div>
<?endif?>

	<!--// 본문 끝 -->
	<?php if($my['admin']):?>
	    <div style="margin-top:10px;"></div>
		 <a href="<?php echo $g['bbs_list']?>">목록</a> &nbsp;|&nbsp; 
         <a href="<?php echo $g['bbs_modify'].$R['uid']?>">수정</a> &nbsp;|&nbsp; 
		 <a href="<?php echo $g['bbs_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 삭제하시겠습니까?');">삭제</a>
		 <div style="margin-top:20px;"></div>
	<?php endif?>


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



