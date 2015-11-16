<link rel="stylesheet" type="text/css" href="http://loung.bccard.com/front/tour/css/tour.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $g['img_layout']?>/css/trevia.css" /><!-- 트레비아 페이지 관련 CSS -->

<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/common.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/main_rolling.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery.bxSlider.min.js"></script>


</head>

<body>
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

			<!-- 이미지 스크롤링 -->
			<div class="tourEvtWrap">
				<div class="scrWrap">
					<ul id="slider2" class="scrBox">
						<?php $_RCD = db_query('select * from '.$table['bbsbcdata'].' where bbs=1 and add_int1=1 and notice=0 and display=1 order by gid asc limit 0,6',$DB_CONNECT)?>
    <?php while($_R=db_fetch_array($_RCD)):?>
	<?php $_img=getUploadImage_src($_R['upload'],$_R['d_regis'],$_R['content'],$d['theme']['picimgext'])?>
    <?php $_img=$_img?$_img:$g['img_module_skin'].'/noimg.gif'?>
    <li><a href="?m=bbsbc&bid=bc_product&uid=<?php echo $_R['uid']?>"><img src="<?php echo $_img?>" alt="<?php echo getStrCut(str_replace(' ',' ',strip_tags($_R['subject'])),30,'..')?>" width="630" height="380"></a></li>
    <?php endwhile?>
					</ul>
					<div class="count-item"></div>                    
				</div>
			</div>
			<!--// 이미지 스크롤링 -->

			<!-- 추천상품 -->
			<div class="contents_pop_wrap">
				<div class="contents_pop01">
					<h4><img src="<?php echo $g['img_layout']?>/img/h4_maldives.gif" alt="몰디브 허니문 추천상품" ></h4>
					<ul>
						<?php $_RCD = db_query('select * from '.$table['bbsbcdata'].' where bbs=1 and add_txt2="몰디브" and add_int2=1 and notice=0 and display=1 order by gid asc limit 0,2',$DB_CONNECT)?>
    <?php while($_R=db_fetch_array($_RCD)):?>
	<?php $_img=getUploadImage_src($_R['upload'],$_R['d_regis'],$_R['content'],$d['theme']['picimgext'])?>
    <?php $_img=$_img?$_img:$g['img_module_skin'].'/noimg.gif'?>
    <li><a href="?m=bbsbc&bid=bc_product&uid=<?php echo $_R['uid']?>"><img src="<?php echo $_img?>" alt="<?php echo getStrCut(str_replace(' ',' ',strip_tags($_R['subject'])),30,'..')?>" width="350" height="296"></a></li>
    <?php endwhile?>
					</ul>
					<h4><img src="<?php echo $g['img_layout']?>/img/h4_cancun.gif" alt="칸쿤 허니문 추천상품" ></h4>
					<ul>
						<?php $_RCD = db_query('select * from '.$table['bbsbcdata'].' where bbs=1 and add_txt2="멕시코" and add_int2=1 and notice=0 and display=1 order by gid asc limit 0,2',$DB_CONNECT)?>
    <?php while($_R=db_fetch_array($_RCD)):?>
	<?php $_img=getUploadImage_src($_R['upload'],$_R['d_regis'],$_R['content'],$d['theme']['picimgext'])?>
    <?php $_img=$_img?$_img:$g['img_module_skin'].'/noimg.gif'?>
    <li><a href="?m=bbsbc&bid=bc_product&uid=<?php echo $_R['uid']?>"><img src="<?php echo $_img?>" alt="<?php echo getStrCut(str_replace(' ',' ',strip_tags($_R['subject'])),30,'..')?>" width="350" height="296"></a></li>
    <?php endwhile?>
					</ul>
				</div>
			
				<div class="contents_pop02">
					<h4><img src="<?php echo $g['img_layout']?>/img/h4_popular.gif" alt="인기지역 허니문 추천상품"></h4>
					<ul>
						<?php $_RCD = db_query('select * from '.$table['bbsbcdata'].' where bbs=1 and category="허니문"  and add_int3=1 and notice=0 and display=1 order by gid asc limit 0,3',$DB_CONNECT)?>
    <?php while($_R=db_fetch_array($_RCD)):?>
	<?php $_img=getUploadImage_src($_R['upload'],$_R['d_regis'],$_R['content'],$d['theme']['picimgext'])?>
    <?php $_img=$_img?$_img:$g['img_module_skin'].'/noimg.gif'?>

<li>
							<a href="?m=bbsbc&bid=bc_product&uid=<?php echo $_R['uid']?>"><img src="<?php echo $_img?>" alt="<?php echo getStrCut(str_replace(' ',' ',strip_tags($_R['subject'])),30,'..')?>" width="230" height="154">
								<dl>
									<dt><strong><?php echo getStrCut(str_replace(' ',' ',strip_tags($_R['subject'])),30,'..')?></strong></dt>
									<dd><strong class="red">[가격대] <?php echo $_R['add_txt4']?> ~ <?php echo $_R['add_txt5']?>원</strong></dd>
								</dl>
  </a>
	</li>



    <?php endwhile?>
					</ul>
					<h4 class="mt40"><img src="<?php echo $g['img_layout']?>/img/h4_family.gif" alt="가족여행 허니문 추천상품"></h4>
					<ul>
						<?php $_RCD = db_query('select * from '.$table['bbsbcdata'].' where bbs=1 and category="가족" and add_int3=1 and notice=0 and display=1 order by gid asc limit 0,3',$DB_CONNECT)?>
    <?php while($_R=db_fetch_array($_RCD)):?>
	<?php $_img=getUploadImage_src($_R['upload'],$_R['d_regis'],$_R['content'],$d['theme']['picimgext'])?>
    <?php $_img=$_img?$_img:$g['img_module_skin'].'/noimg.gif'?>

<li>
							<a href="?m=bbsbc&bid=bc_product&uid=<?php echo $_R['uid']?>"><img src="<?php echo $_img?>" alt="<?php echo getStrCut(str_replace(' ',' ',strip_tags($_R['subject'])),30,'..')?>" width="230" height="154">
								<dl>
									<dt><strong><?php echo getStrCut(str_replace(' ',' ',strip_tags($_R['subject'])),30,'..')?></strong></dt>
									<dd><strong class="red">[가격대] <?php echo $_R['add_txt4']?> ~ <?php echo $_R['add_txt5']?>원</strong></dd>
								</dl>
  </a>
	</li>



    <?php endwhile?>
					</ul>
				</div>
			</div>
		</div>
		<!--// 추천상품 -->


		<!--// 컨텐츠 끝 -->

	<!--// 본문 끝 -->