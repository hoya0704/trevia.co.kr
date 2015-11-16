<link rel="stylesheet" type="text/css" href="http://loung.bccard.com/front/tour/css/tour.css" />

<link rel="stylesheet" type="text/css" href="<?=$g['img_module_skin']?>/css/trevia.css" /><!-- 트레비아 페이지 관련 CSS -->

<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/common.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/main_rolling.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery.bxSlider.min.js"></script>


<a name="view"></a>
<!-- 본문 시작 -->

		<!-- 컨텐츠 시작 -->

		<div id="contents_wrap">
		
			<!-- 상단 타이틀 영역 -->
			<div class="titWrap">
				
				<!-- 타이틀 -->
				<h3><img src="http://loung.bccard.com/front/tour/img/main/h3_tour_oversea.gif" alt="해외여행" /></h3>
				<p class="subTit"><!-- 텍스트 2줄일 경우 class="twoLine" 으로 변경됨 //-->
					<img src="<?php echo $g['img_layout']?>/img/stit_overseas.jpg" alt="라운지투어는 하나투어, 모두투어, 한진관광, 레드캡투어와 제휴하여 해외여행 서비스를 제공하고 있습니다."  />
				</p>
				<!--// 타이틀 -->
				
			</div>
			<!--// 상단 타이틀 영역 --> 


			<!-- 상품 상세정보 -->
			<div class="tour_detail_wrap">
			<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<?php $_thumbimg=getUploadImage($R['upload'],$R['d_regis'],$R['content'],$d['theme']['picimgext'],'jpg|jpeg|gif|GIF')?>
	<?php $_img=getUploadImage_src($R['upload'],$R['d_regis'],$R['content'],$d['theme']['picimgext'])?>
	<?php $_thumbimg=$_thumbimg?$_thumbimg:$g['img_core'].'/blank.gif'?>
				<img src="<?php echo $_img?>" alt="여행 상품관련 이미지" width="408" height="314">
				<div class="tour_detail">
					<p class="detail_title"><strong><?php echo $R['add_txt1']?><br />숙박기간 | <?php echo $R['add_txt6']?> ~ <?php echo $R['add_txt7']?></strong></p>
					<h4><?php echo $R['subject']?></h4>
					<p class="tour_price"><strong>KRW <?php echo $R['add_txt4']?> ~  <?php echo $R['add_txt5']?></strong></p>
					<ul>
						<?php echo $R['add_txt8']?>
					</ul><!-- <a href="#" onclick="window.open('?m=bbsbc&bid=bc_product_qna&mod=write&iframe=Y','bc','scrollbars=yes,width=740,height=500')"> -->
					<a href="http://yajava.com/rb/?r=home&m=bbsbc&bid=bc_product_qna&mod=write">
					<img src="<?=$g['img_module_skin']?>/img/btn_tour_inquire.jpg" alt="여행 상담문의"></a>
				</div>
		  </div>
		  
		    <div style="margin-top:20px;">
				<table width="100%" cellspacing="0" cellpadding="0" style="border:solid 1px #dfdfdf;padding:10px 10px 10px 10px;">
  <tr>
    <td bgcolor="#efefef" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;"><strong>리조트 정보요약</strong></td>
  </tr>
  <tr>
    <td valign="top" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;line-height:17px;"><?php echo $R['add_txt9']?>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#efefef" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;"><strong>포함사항</strong></td>
  </tr>
  <tr>
    <td valign="top" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;line-height:17px;"><?php echo $R['add_txt10']?>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#efefef" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;"><strong>불포함사항</strong></td>
  </tr>
  <tr>
    <td valign="top" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;line-height:17px;"><?php echo $R['add_txt11']?>&nbsp;</td>
  </tr>
</table>

<div style="margin-top:20px;"></div>

<table width="100%" cellspacing="0" cellpadding="0" style="border:solid 1px #dfdfdf;padding:10px 10px 10px 10px;">
  <tr>
    <td bgcolor="#efefef" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;"><strong>공지 및 유의사항</strong></td>
  </tr>
  <tr>
    <td valign="top" style="padding:10px 10px 10px 10px;border-bottom:1px solid #dfdfdf;line-height:17px;"><?php echo $R['add_txt12']?>&nbsp;</td>
  </tr>
</table>
			</div>
			
			<div class="detail_contents">
				<?php echo getContents($R['content'],$R['html'],$keyword)?>
			</div>
			

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><a href="#" onClick="history.go(0)"><img src="<?=$g['img_module_skin']?>/topicon.jpg" border="0"></a> &nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>

			
		</div>
		<!--// 상품 상세정보 -->


		<!--// 컨텐츠 끝 -->

	<!--// 본문 끝 -->
	<?php if($my['admin']):?>
	    <div style="margin-top:10px;"></div>
		 <a href="<?php echo $g['bbs_list']?>">목록</a> &nbsp;|&nbsp; 
         <a href="<?php echo $g['bbs_modify'].$R['uid']?>">수정</a> &nbsp;|&nbsp; 
		 <a href="<?php echo $g['bbs_delete'].$R['uid']?>" target="_action_frame_<?php echo $m?>" onclick="return confirm('정말로 삭제하시겠습니까?');">삭제</a>
		 <div style="margin-top:20px;"></div>
	<?php endif?>


