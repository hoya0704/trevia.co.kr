<!--  LOG corp Web Analitics & Live Chat  START -->
<script  type="text/javascript">
//<![CDATA[
function logCorpAScript_full(){
	HTTP_MSN_MEMBER_NAME="";/*member name*/
	LOGSID="<?=$_SESSION['logsid']?>";/*logsid*/
	LOGREF="<?=$_SESSION['logref']?>";/*logref*/
	var prtc=(document.location.protocol=="https:")?"https://":"http://";
	var hst=prtc+"namuloga1.http.or.kr";
	var rnd="r"+(new  Date().getTime()*Math.random()*9);
	this.ch=function(){
		if(document.getElementsByTagName("head")[0]){this.dls();}else{window.setTimeout(logCorpAnalysis_full.ch,30)}
	}
	this.dls=function(){
		var  h=document.getElementsByTagName("head")[0];
		var  s=document.createElement("script");s.type="text/jav"+"ascript";try{s.defer=true;}catch(e){};try{s.async=true;}catch(e){};
		if(h){s.src=hst+"/HTTP_MSN/UsrConfig/1_himaldives/js/ASP_Conf.js?s="+rnd;h.appendChild(s);}
	}
	this.init= function(){
		document.write('<img src="'+hst+'/sr.gif?d='+rnd+'"  style="width:1px;height:1px;position:absolute;" alt="" onload="logCorpAnalysis_full.ch()" />');
	}
}
if(typeof logCorpAnalysis_full=="undefined"){	var logCorpAnalysis_full=new logCorpAScript_full();logCorpAnalysis_full.init();}
//]]>
//alert("占쎄퐣甕곤옙 占쎌젎野껓옙餓λ쵐�뿯占쎈빍占쎈뼄.");
</script>
<? $catgory = db_fetch_array(getDbArray($table['bbsdata'],"bbsid='resort' AND uid=".$uid,"category","uid","desc","","")); ?>

<noscript><img src="http://namuloga1.http.or.kr/HTTP_MSN/Messenger/Noscript.php?key=1_himaldives" border="0" style="display:none;width:0;height:0;" /></noscript>
<!-- LOG corp Web Analitics & Live Chat END  -->
<div id="bgWrap"<?php if($m=="home" && $_CA[1]!="oneqna" && $mod!="trainfomain"):?> class="index"<?php endif?>>
<div id="wrap">
	<div id="header">
		<div class="logo">
			<h1><a href="<?php echo RW(0)?>"><img src="<?php echo $g['img_layout']?>/logo.gif" alt="<?php echo $_HS['title']?>" /></a></h1>
		</div>
		<div class="gnb<?php if($my['id']):?> login<?php endif?>">
			<ul>
			<?php if($my['id']):?>
			<li>
			<strong><?php echo $my['name']?></strong>님 환영합니다.
			</li>
			<?php endif?>
			<?php if($my['id']):?>
			<!--<li><a href="<?php echo RW('mod=mypage')?>">마이페이지</a></li>-->
			<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;mod=mypage&amp;page=info">마이페이지</a> &nbsp;&nbsp;&nbsp;|</li>
			<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;a=logout">로그아웃</a> &nbsp;&nbsp;&nbsp;|</li>			
			<?php else:?>
			<li><a href="<?php echo RW('mod=join')?>">회원가입</a> &nbsp;&nbsp;&nbsp;|</li>
			<li><a href="<?php echo RW('mod=login')?>">로그인</a> &nbsp;&nbsp;&nbsp;|</li>
			<?php endif?>
			</ul>
		</div>
		<div class="lnb<?php if($my['id']):?> in<?php else:?> out<?php endif?>">
			<ul>
			<?php
			$rndBoat = getDbArray($table['bbsdata'],"site=2 AND category='占쎈뮞占쎈돗占쎈굡癰귣똾�뱜'","uid","","rand()",1,1);
			$infoBoat = db_fetch_array($rndBoat);
			?>
			<li onmouseover="showM('12');" onmouseout="hideM('12');" class="ship">
			<a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c=boat&uid='.$infoBoat[0])?>&list=true" target="<?php echo $_M1['target']?>"<?php if($_CA[0]=="boat" || ($bid=="resort" && $R['category']=="占쎈뮞占쎈돗占쎈굡癰귣똾�뱜")):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/btn_lnb_boat.gif" alt="<?php echo $_M1['name']?>" /><img src="<?php echo $g['img_layout']?>/btn_lnb_boat_over.gif" alt="<?php echo $_M1['name']?>" class="over" /></a>
			</li>
			<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
						<?php
			$rndBoat = getDbArray($table['bbsdata'],"site=2 AND category='占쎈땾占쎄맒�뜮袁る뻬疫뀐옙'","uid","","rand()",1,1);
			$infoBoat = db_fetch_array($rndBoat);
			?>
			<li onmouseover="showM('12');" onmouseout="hideM('12');" class="ship">
			<a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c=float&uid='.$infoBoat[0])?>&list=true" target="<?php echo $_M1['target']?>"<?php if($_CA[0]=="float" || ($bid=="resort" && $R['category']=="占쎈땾占쎄맒�뜮袁る뻬疫뀐옙")):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/btn_lnb_float.gif" alt="<?php echo $_M1['name']?>" /><img src="<?php echo $g['img_layout']?>/btn_lnb_float_over.gif" alt="<?php echo $_M1['name']?>" class="over" /></a>
			</li>
			<?php
			$rndShip = getDbArray($table['bbsdata'],"site=2 AND category='�뤃占쏙옙沅∽옙苑묕쭪占쏙옙肉�'","uid","","rand()",1,1);
			$infoShip = db_fetch_array($rndShip);
			?>
			<li onmouseover="showM('10');" onmouseout="hideM('10');" class="ship">
			<a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c=ship&uid='.$infoShip[0])?>&list=true" target="<?php echo $_M1['target']?>"<?php if($_CA[0]=="ship" || ($bid=="resort" && $R['category']=="�뤃占쏙옙沅∽옙苑묕쭪占쏙옙肉�")):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/btn_lnb_ship.gif" alt="<?php echo $_M1['name']?>" /><img src="<?php echo $g['img_layout']?>/btn_lnb_ship_over.gif" alt="<?php echo $_M1['name']?>" class="over" /></a>
			</li>

			<?php
			$rndShip = getDbArray($table['bbsdata'],"site=2 AND category='揶쏉옙鈺곌퉮肉э옙六�'","uid","","rand()",1,1);
			$infoShip = db_fetch_array($rndShip);
			?>
			<li onmouseover="showM('10');" onmouseout="hideM('10');" class="ship">
			<a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c=family&uid='.$infoShip[0])?>" target="<?php echo $_M1['target']?>"<?php if($_CA[0]=="family" || ($bid=="resort" && $R['category']=="揶쏉옙鈺곌퉮肉э옙六�")):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/btn_lnb_family.gif" alt="<?php echo $_M1['name']?>" /><img src="<?php echo $g['img_layout']?>/btn_lnb_family_over.gif" alt="<?php echo $_M1['name']?>" class="over" /></a>
			</li>
			
			<?php $_i=0; while($_M1=db_fetch_array($_MENUS1)):?>
			<?php if($_i < 3){  $_i++; continue;}?>
			<li onmouseover="showM('<?php echo $_M1['uid']?>');" onmouseout="hideM('<?php echo $_M1['uid']?>');" class="<?php echo $_M1['id']?>">
			<a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" target="<?php echo $_M1['target']?>"<?php if($_CA[0]==$_M1['id']):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/btn_lnb_<?php echo $_M1['id']?>.gif" alt="<?php echo $_M1['name']?>" /><img src="<?php echo $g['img_layout']?>/btn_lnb_<?php echo $_M1['id']?>_over.gif" alt="<?php echo $_M1['name']?>" class="over" /></a>
			</li>
			<?php $_i++; if($_i >= $d['layout']['menunum']) break; endwhile?>
			<?php if(!$_i):?>
			<li><a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;system=edit.all&type=menu&makemenu=Y">占쎌뵠 占쎄텢占쎌뵠占쎈뱜占쎈뮉 占쎈툡筌욑옙 筌롫뗀�뤀揶쏉옙 占쎈쾻嚥≪빖由븝쭪占� 占쎈륫占쎈릭占쎈뮸占쎈빍占쎈뼄. 筌롫뗀�뤀�몴占� 占쎈쾻嚥≪빜鍮먧틠�눘苑�占쎌뒄</a></li>
			<?php endif?>
			</ul>
		</div>
		<!--<div class="location">
			占쎌겱占쎌삺占쎌맄燁삼옙 : <?php echo $g['location']?>
		</div>-->
		<div class="clear"></div>
	</div>

	<div id="container">
		<?php include __KIMS_CONTAINER_HEAD__?>
		<div class="1">			
		<?php foreach($d['layout']['show'] as $_pluginkey => $_pluginval):if(!$_pluginval)continue?>
		<?php include $g['path_layout'].$d['layout']['dir'].'/plugin/'.$_pluginkey.'.php'?>
		<div class="plugingap"></div>
		<?php endforeach?>
		</div>
		<div id="content">
			<?php $arrComm = array("airline", "tour", "epilogue", "resortnews", "qna", "travelinfo", "travelinfo2")?>
			<?php $arrCustom = array("notice", "counselling", "faq", "complain")?>
			<?php if($bid == "event"):?>
			<div class="infobar">
				<?php
				// 占쎄텢占쎌뵠占쎈뱜 �굜遺얜굡 �겫�뜄�쑎占쎌궎疫뀐옙
				$tmp = getDbData($table['s_site'],"id='".$r."'","uid");
				$siteCode = $tmp[0];

				// Event 野껊슣�뻻占쎈솇 �뵳�딅뮞占쎈뱜 �겫�뜄�쑎占쎌궎疫뀐옙
				$resEvent1 = getDbArray($table['bbsdata'],"site='".$siteCode."' AND bbsid='event' AND notice = 1","uid, subject, bbsid, adddata","uid","desc","3","1");

				// QnA �뵳�딅뮞占쎈뱜 �겫�뜄�쑎占쎌궎疫뀐옙
				$resEvent2 = getDbArray($table['s_comment'],"site='".$siteCode."' AND parent not like 'bbsext%'","content, d_regis","uid","asc","3","1");

				?>
				<div class="list2">
					<div class="wrap">
					<h1><img src="<?php echo $g['img_layout']?>/header_title_event.gif" alt="QnA 占쏙옙占쎌뵠占쏙옙" /></h1>
					<ul class="event1">
					<?php for($i = 1; ($infoEvent1= db_fetch_array($resEvent1)); $i++):?>
					<?php $adddata = unserialize($infoEvent1['adddata'])?>
					<?php $d_regis = str_replace("-", ".", $adddata['dateStart']) . "~" . str_replace("-", ".", $adddata['dateEnd'])?>
					<li><a href="<?php echo RW("m=bbs&bbsid=".$infoEvent1['bbsid']."&uid=".$infoEvent1['uid'])?>"><?php echo getStrCut($infoEvent1['subject'], 20, "...")?>&nbsp;&nbsp;[<?=$d_regis?>]</a></li>
					<?php endfor?>
					</ul>
					</div>
					
					<div class="wrap">
					<h1><img src="<?php echo $g['img_layout']?>/header_title_qna.gif" alt="QnA 占쏙옙占쎌뵠占쏙옙" /></h1>
					<ul class="event2">
					<?php for($i = 1; ($infoEvent2= db_fetch_array($resEvent2)); $i++):?>
					<?php $d_regis = substr($infoEvent2['d_regis'], 0, 4).".".substr($infoEvent2['d_regis'], 4, 2).".".substr($infoEvent2['d_regis'], 6, 2)?>
					<li><?php echo getStrCut(strip_tags($infoEvent2['content']), 30, "...")?>&nbsp;&nbsp;[<?=$d_regis?>]</li>
					<?php endfor?>
					</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="navi">
				<ul class="big">
					<li><a href="javascript:;" class="counselling"><img src="<?php echo $g['img_layout']?>/resort_navi_00.gif" alt="1:1占쎈연占쎈뻬占쎄맒占쎈뼖" /><img src="<?php echo $g['img_layout']?>/resort_navi_00.gif" alt="1:1占쎈연占쎈뻬占쎄맒占쎈뼖" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=event");?>"><img src="<?php echo $g['img_layout']?>/event_navi_01.gif" alt="筌욊쑵六얌빳臾믪뵥 占쎈뱟揶쏉옙&占쎌뵠甕겹끋�뱜" /><img src="<?php echo $g['img_layout']?>/event_navi_01.gif" alt="筌욊쑵六얌빳臾믪뵥 占쎈뱟揶쏉옙&占쎌뵠甕겹끋�뱜" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=event&past=yes");?>"><img src="<?php echo $g['img_layout']?>/event_navi_02.gif" alt="筌욑옙占쎄텆 占쎈뱟揶쏉옙&占쎌뵠甕겹끋�뱜" /><img src="<?php echo $g['img_layout']?>/event_navi_02.gif" alt="筌욑옙占쎄텆 占쎈뱟揶쏉옙&占쎌뵠甕겹끋�뱜" class="over" /></a></li>
				</ul>
				<ul class="border">
					<li><a href="<?php echo RW("m=bbs&bid=epilogue")?>"><img src="<?php echo $g['img_layout']?>/inb_epilogue.gif" alt="占쎈연占쎈뻬占쎌뜎疫뀐옙" /><img src="<?php echo $g['img_layout']?>/inb_epilogue_over.gif" alt="占쎈연占쎈뻬占쎌뜎疫뀐옙" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=resortnews")?>"><img src="<?php echo $g['img_layout']?>/inb_resortnews.gif" alt="�뵳�듼�쒙옙�뱜占쎈뤀占쎈뮞" /><img src="<?php echo $g['img_layout']?>/inb_resortnews_over.gif" alt="�뵳�듼�쒙옙�뱜占쎈뤀占쎈뮞" class="over" /></a></li>
					<li><a href="javascript:alert('餓ο옙�뜮袁⑹㉦占쎌뿯占쎈빍占쎈뼄.');<?//php echo RW("m=bbs&bid=qna")?>"><img src="<?php echo $g['img_layout']?>/inb_qna.gif" alt="QNA筌뤴뫁�벉" /><img src="<?php echo $g['img_layout']?>/inb_qna_over.gif" alt="QNA筌뤴뫁�벉" class="over" /></a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<?php elseif(in_array($bid, $arrComm) || in_array($bid, $arrCustom) || $_CA[0]=="support" || $mod=="oneqna" || $mod=="trainfomain"):?>
			<div class="infobar">
				<?php				
				// 占쎄텢占쎌뵠占쎈뱜 �굜遺얜굡 �겫�뜄�쑎占쎌궎疫뀐옙
				$tmp = getDbData($table['s_site'],"id='".$r."'","uid");
				$siteCode = $tmp[0];


				// Notice 野껊슣�뻻占쎈솇 �뵳�딅뮞占쎈뱜 �겫�뜄�쑎占쎌궎疫뀐옙
				$resNotice = getDbArray($table['bbsdata'],"site!='2' AND bbsid='notice' AND notice = 0","uid, bbsid, subject, d_regis","uid","desc","3","1");

				// QnA �뵳�딅뮞占쎈뱜 �겫�뜄�쑎占쎌궎疫뀐옙
				$resQNA = getDbArray($table['s_comment'],"site!='2' AND parent not like 'bbsext%'","content, d_regis","uid","asc","3","1");
				?>
				<div class="list2">
					<div class="wrap">
					<h1><a href="<?php echo RW("m=bbs&bid=notice")?>"><img src="<?php echo $g['img_layout']?>/header_title_notice.gif" alt="�⑤벊占쏙옙沅쀯옙鍮� 占쏙옙占쎌뵠占쏙옙" /></a></h1>
					<ul class="notice">
					<?php for($i = 1; ($infoNotice = db_fetch_array($resNotice)); $i++):?>
					<?php $d_regis = substr($infoNotice['d_regis'], 0, 4).".".substr($infoNotice['d_regis'], 5, 2).".".substr($infoNotice['d_regis'], 8, 2)?>
					<li><a href="<?php echo RW("c=".$_CA[0]."/".$infoNotice['bbsid']."&uid=".$infoNotice['uid'])?>"><?php echo getStrCut($infoNotice['subject'], 29, "...")?>&nbsp;&nbsp;[<?php echo getDateFormat($infoNotice['d_regis'],"Y.m.d")?>]</a></li>
					<?php endfor?>
					</ul>
					</div>

					<div class="wrap">
					<h1><img src="<?php echo $g['img_layout']?>/header_title_qna.gif" alt="QnA 占쏙옙占쎌뵠占쏙옙" /></h1>
					<ul class="qna">
					<?php for($i = 1; ($infoQNA = db_fetch_array($resQNA)); $i++):?>
					<li><?php echo getStrCut(strip_tags($infoQNA['content']), 30, "...")?>&nbsp;&nbsp;[<?php echo getDateFormat($infoQNA['d_regis'],"Y.m.d")?>]</li>
					<?php endfor?>
					</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="navi">
				<ul class="big">
					<li><a href="javascript:;" class="counselling"><img src="<?php echo $g['img_layout']?>/resort_navi_00.gif" alt="1:1占쎈연占쎈뻬占쎄맒占쎈뼖" /><img src="<?php echo $g['img_layout']?>/resort_navi_00.gif" alt="1:1占쎈연占쎈뻬占쎄맒占쎈뼖" class="over" /></a></li>
				</ul>
				<?php if(in_array($bid, $arrComm) || $mod=="trainfomain"):?>
				<ul class="community">
					<li><a href="<?php echo RW("m=bbs&bid=airline")?>"<?php if($bid == "airline"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_board_airline.gif" /><img src="<?php echo $g['img_layout']?>/inb_board_airline_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=epilogue")?>"<?php if($bid == "epilogue"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_board_epilogue.gif" /><img src="<?php echo $g['img_layout']?>/inb_board_epilogue_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=resortnews")?>"<?php if($bid == "resortnews"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_board_resortnews.gif" /><img src="<?php echo $g['img_layout']?>/inb_board_resortnews_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=travelinfo")?>"<?php if($bid == "travelinfo"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_board_travelinfo.gif" /><img src="<?php echo $g['img_layout']?>/inb_board_travelinfo_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=travelinfo2")?>"<?php if($bid == "travelinfo2"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_board_travelinfo2.gif" /><img src="<?php echo $g['img_layout']?>/inb_board_travelinfo2_over.gif" class="over" /></a></li>
				</ul>	
				<?php elseif(in_array($bid, $arrCustom) || $mod == "oneqna"):?>
				<ul class="community">
					<li><a href="<?php echo RW("m=bbs&bid=notice")?>"<?php if($bid == "notice"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_board_notice.gif" /><img src="<?php echo $g['img_layout']?>/inb_board_notice_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=counselling")?>"<?php if($bid == "counselling"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_customer_counsel.gif" /><img src="<?php echo $g['img_layout']?>/inb_customer_counsel_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=faq")?>"<?php if($bid == "faq"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_customer_faq.gif" /><img src="<?php echo $g['img_layout']?>/inb_customer_faq_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("mod=oneqna")?>"<?php if($mod == "oneqna"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_customer_qna.gif" /><img src="<?php echo $g['img_layout']?>/inb_customer_qna_over.gif" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=complain")?>"<?php if($bid == "complain"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_customer_complain.gif" /><img src="<?php echo $g['img_layout']?>/inb_customer_complain_over.gif" class="over" /></a></li>
				</ul>
				<?php endif?>
				<div class="clear"></div>
			</div>
			<?php elseif($m=="home"):?>
			<?php else:?>
			<?php if( 1 ):?>

			<div class="infobar">
				<div class="thumb">
					<?php
					$resThumb = getDbArray($table['bbsdata'],"uid=" . $uid,"upload","uid","desc","","");
					$infoThumb = db_fetch_array($resThumb);
					$uploadUid = substr($infoThumb['upload'], 1, strpos($infoThumb['upload'], "]") - 1);
					$infoUpload = getDbData($table['s_upload'], "uid = " . $uploadUid, "url, folder, thumbname ");
					$thumbSrc = $infoUpload[0] . $infoUpload[1] . "/" . $infoUpload[2];
					?>
					<img id="resortThumb" src="<?php if($uid) { echo $thumbSrc; }?>" class="thumb<?php if(!$uid):?> hidden<?php endif?>" />
				</div>
				<?php
				// Resort 野껊슣�뻻占쎈솇 �뵳�딅뮞占쎈뱜 �겫�뜄�쑎占쎌궎疫뀐옙
				// == //
				// ==== 占쎈땾占쎄맒�뜮袁る뻬疫뀐옙, �뤃占쏙옙苑묕쭪占쏙옙肉� 占쎌깕占쎈� 占쎌뿫占쎈뻻筌ｌ꼶�봺
				if($cat == "占쎈땾占쎄맒�뜮袁る뻬疫뀐옙" || $R['category'] == "占쎈땾占쎄맒�뜮袁る뻬疫뀐옙")
				{
					$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND (category = '占쎈땾占쎄맒�뜮袁る뻬疫뀐옙')","uid, subject, upload","uid","desc","","");
				}
				else if( $R['category'] == "�뤃占쏙옙沅∽옙苑묕쭪占쏙옙肉�")
				{
					$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND (category = '�뤃占쏙옙沅∽옙苑묕쭪占쏙옙肉�')","uid, subject, upload","uid","desc","","");
				}
				// == //
				// ==== 占쎈늄占쎌뿫�뵳占�, 筌띾뜇肉� , 占쎌뵬占쎈탵域뱄옙
				else if($R['category'] == "占쎈늄占쎌뿫�뵳占�" || $R['category'] == "筌띾뜇肉�" || $R['category'] == "占쎌뵬占쎈탵域뱄옙")
				{
					$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND (category = '占쎈늄占쎌뿫�뵳占�' OR category = '筌띾뜇肉�' OR category = '占쎌뵬占쎈탵域뱄옙')","uid, subject, upload","uid","desc","","");
				}
				else if( $_GET[mod] == "login" )
				{
					$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND (category = '占쎈땾占쎄맒�뜮袁る뻬疫뀐옙')","uid, subject, upload","uid","desc","","");
				}
				else
				{
					if($bid == "resort")
						$resResort = getDbArray($table['bbsdata'],"bbsid='resort' AND category = '" . ($cat ? $cat : $R['category']) . "'","uid, subject, upload","uid","desc","","");
					else
						$resResort = getDbArray($table['bbsdata'],"bbsid='resort'","uid, subject, upload","uid","desc","","");
				}
				$rcdCount = mysql_num_rows($resResort);
				
				$perCol = ceil($rcdCount / 4);

				?>
				<div class="list">
					<ul class="resort">
					<?php for($i = 1; ($infoResort = db_fetch_array($resResort)); $i++):?>
					<?php
					$uploadUid = substr($infoResort['upload'], 1, strpos($infoResort['upload'], "]") - 1);
					$infoUpload = getDbData($table['s_upload'], "uid = " . $uploadUid, "url, folder, thumbname ");
					$uploadSrc = $infoUpload[0] . $infoUpload[1] . "/" . $infoUpload[2];
					?>
					<li><a href="<?php echo RW("m=bbs&uid=" . $infoResort['uid']);?>&dp=resort"<?php if($uid==$infoResort['uid']):?> class="over"<?php endif?> onmouseover="swapResortThumb('<?php echo $uploadSrc?>');"><?php echo $infoResort['subject']?></a></li>

					<?php endfor?>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="navi" >
				<ul class="big">
					<li><a href="javascript:;" class="counselling"><img src="<?php echo $g['img_layout']?>/resort_navi_00.gif" alt="1:1占쎈연占쎈뻬占쎄맒占쎈뼖" /><img src="<?php echo $g['img_layout']?>/resort_navi_00.gif" alt="1:1占쎈연占쎈뻬占쎄맒占쎈뼖" class="over" /></a></li>
				</ul>

				<?php if($bid == "resort" && !$list):?>
				<ul>
					<li><a href="<?php echo $g['bbs_view'].$R['uid']?>"<?php if(!$dp && $uid):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_tab_all.gif" alt="占쎌읈筌ｋ��궖疫뀐옙" /><img src="<?php echo $g['img_layout']?>/inb_tab_all_over.gif" alt="占쎌읈筌ｋ��궖疫뀐옙" class="over" /></a></li>
					<li><a href="<?php echo $g['bbs_view'].$R['uid']?>&dp=resort"<?php if($dp=="resort"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_tab_resort.gif" alt="�뵳�듼�쒙옙�뱜" /><img src="<?php echo $g['img_layout']?>/inb_tab_resort_over.gif" alt="�뵳�듼�쒙옙�뱜" class="over" /></a></li>
					<li><a href="<?php echo $g['bbs_view'].$R['uid']?>&dp=room"<?php if($dp=="room"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_tab_room.gif" alt="揶쏆빘�뼄占쎈꺖揶쏉옙" /><img src="<?php echo $g['img_layout']?>/inb_tab_room_over.gif" alt="揶쏆빘�뼄占쎈꺖揶쏉옙" class="over" /></a></li>
					<li><a href="<?php echo $g['bbs_view'].$R['uid']?>&dp=facility"<?php if($dp=="facility"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_tab_facility.gif" alt="�겫占쏙옙占쏙옙�뻻占쎄퐬" /><img src="<?php echo $g['img_layout']?>/inb_tab_facility_over.gif" alt="�겫占쏙옙占쏙옙�뻻占쎄퐬" class="over" /></a></li>
					<li><a href="<?php echo $g['bbs_view'].$R['uid']?>&dp=sdetail"<?php if($dp=="airline"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_tab_schedule.gif" alt="占쎌뵬占쎌젟 獄쏉옙 占쎌뒄疫뀐옙" /><img src="<?php echo $g['img_layout']?>/inb_tab_schedule_over.gif" alt="占쎈퉮�⑤벊�뵬占쎌젟" class="over" /></a></li>
					<li><a href="<?php echo $g['bbs_view'].$R['uid']?>&dp=travelinfo"<?php if($dp=="travelinfo"):?> class="over"<?php endif?>><img src="<?php echo $g['img_layout']?>/inb_trav_info.gif" alt="占쎈연占쎈뻬占쎌젟癰귨옙" /><img src="<?php echo $g['img_layout']?>/inb_trav_info_over.gif" alt="占쎈연占쎈뻬占쎌젟癰귨옙" class="over" /></a></li>
					<li><a href="<?php echo RW("m=bbs&bid=epilogue&cat=".$R['subject'])?>"><img src="<?php echo $g['img_layout']?>/inb_epilogue.gif" alt="占쎈연占쎈뻬占쎌뜎疫뀐옙" /><img src="<?php echo $g['img_layout']?>/inb_epilogue_over.gif" alt="占쎈연占쎈뻬占쎌뜎疫뀐옙" class="over" /></a></li>
				</ul>
				<?php endif?>
				<div class="clear"></div>
			</div>
			<?php endif?>
			<?php endif?>

			<?php if($mod=="trainfomain" || $m!="home"):?>
			<ul id="floatWin">
				<li><a href="http://www.himaldives.co.kr" onfocus="this.blur();" target="_blank"><img src="<?php echo $g["img_layout"]?>/float_win_00.gif" /></a></li>
				<li><a href="javascript:;" class="counselling" onfocus="this.blur();"><img src="<?php echo $g["img_layout"]?>/float_win_01.gif" /></a></li>
				<li><img src="<?php echo $g["img_layout"]?>/float_win_02.gif" /></li>
				<li class="button"><a href="#wrap"><img src="<?php echo $g["img_layout"]?>/float_win_03.gif" onfocus="this.blur();" /></a></li>
				<li class="button"><a href="#footer"><img src="<?php echo $g["img_layout"]?>/float_win_04.gif" onfocus="this.blur();" /></a></li>
			</ul>

			<ul id="bannerPanel">
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_01.gif" /></li>
				<li><a href="http://www.etihad.com/kr" target="_blank"><img src="<?php echo $g["img_layout"]?>/right_banner_02.gif" /></a></li>
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_03.gif" /></li>
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_04.gif" /></li>
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_05.gif" /></li>
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_06.gif" /></li>
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_07.gif" /></li>
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_08.gif" /></li>
				<li><img src="<?php echo $g["img_layout"]?>/right_banner_09.gif" /></li>
				<li>
					<img src="<?php echo $g['s']?>/pages/image/kakaoidban.jpg" /> 
				</li>
				<li>
					<a href="http://blog.naver.com/treviatour" target="_blank"><img src="<?php echo $g['s']?>/pages/image/blogbanner.gif" /></a>
				</li>
				<li>
					<a href="https://www.facebook.com/treviatour" target="_blank"><img src="<?php echo $g['s']?>/pages/image/facebook_icon.gif" /></a>
				</li>
			</ul>			
			<?php endif?>

			<?php if($m!="home"):?><div class="panel"><?php endif?>
			<?php if(in_array($bid, $arrComm) || in_array($bid, $arrCustom)):?>
			<div class="board_header">
				<img src="<?php echo $g['img_layout']?>/board_header_<?php echo $bid?>.jpg" alt="<?php echo $bid?>" />
			</div>
			<?php elseif($mod == "oneqna"):?>			
			<div class="board_header">
				<img src="<?php echo $g['img_layout']?>/board_header_oneqna.jpg" alt="<?php echo $bid?>" />
			</div>
			<br /><br />
			<?php endif?>
			<?php if( $list ):?>
				<?php include "list.php"?>
			<?php else:?>
				<?php include __KIMS_CONTENT__?>
			<?php endif?>
			<?php if($m!="home"):?></div><?php endif?>
		</div>
		<div class="clear"></div>
		
	</div>
	<?php include __KIMS_CONTAINER_FOOT__?>
	<div id="footer">
		<img src="<?php echo $g['img_layout']?>/partners.gif" />
		
		<div class="logo">
			<img src="<?php echo $g['img_layout']?>/logo_copyright.gif" />
		</div>
		<div class="copyright">
		<ul class="links">
			<li class="first"><a href="javascript:company_pop('http://www.trevia.co.kr/?r=Trevia&c=1/6')"><img src="<?php echo $g['img_layout']?>/footer_link_intro.gif" alt="占쎌돳占쎄텢占쎈꺖揶쏉옙" /></a></li>
			<li><a href="javascript:company_pop('http://www.trevia.co.kr/?r=Trevia&c=2/9')"><img src="<?php echo $g['img_layout']?>/footer_link_privacy.gif" alt="揶쏆뮇�뵥占쎌젟癰귣똻�옱疫뀀맧媛묊㎉占�" /></a></li>
			<li><a href="javascript:company_pop('http://www.trevia.co.kr/?r=Trevia&c=2/9')"><img src="<?php echo $g['img_layout']?>/footer_link_agreement.gif" alt="占쎌뵠占쎌뒠占쎈튋�꽴占�" /></a></li>
			<li><a href="javascript:company_pop('http://www.trevia.co.kr/?r=Trevia&c=2/9')"><img src="<?php echo $g['img_layout']?>/footer_link_agreement2.gif" alt="占쎈연占쎈뻬占쎈튋�꽴占�" /></a></li>
			<li class="last"><a href="javascript:company_pop('http://www.trevia.co.kr/?r=Trevia&c=4')"><img src="<?php echo $g['img_layout']?>/footer_link_map.gif" alt="筌≪뼚釉섓옙�궎占쎈뻻占쎈뮉 疫뀐옙" /></a></li>
			<div class="clear"></div>
		</ul>
		<p>
			<img src="<?php echo $g['img_layout']?>/copyright.gif" alt="占쎄맒占쎌깈筌륅옙 : 雅뚯눘�뻼占쎌돳占쎄텢 占쎈뱜占쎌쟿�뜮袁⑸툡 (占쏙옙占쎈ご占쎌뵠占쎄텢: 占쎈즲占쎌겫�빊占�)     雅뚯눘�꺖 : 占쎄퐣占쎌뒻占쎈뱟癰귢쑴�뻻 揶쏅벡苑뚧뤃占� 占쎈쾻�룯�슢猷� 678-13 筌욊쑴苑��뜮�슢逾� 602占쎌깈    占쎄텢占쎈씜占쎌쁽占쎈쾻嚥≪빖苡뀐옙�깈 109-86-28731    占쎈꽰占쎈뻿占쎈솇筌띲끉毓쏙옙�뻿�⑥쥓苡뀐옙�깈 : 占쎌젫2011-占쎄퐣占쎌뒻揶쏅벡苑�-0497占쎌깈<br />
		占쎌뵬獄쏆꼷肉э옙六억옙毓� : 占쎌젫2011-000003占쎌깈    �⑥쥒而쇽옙苑깍옙占� : 1644-6681 (占쎈즸占쎌뵬 占쎌궎占쎌읈 09~占쎌궎占쎌뜎 06占쎈뻻繹먮슣占�/占쎈꽅占쎌뒄占쎌뵬,占쎌뵬占쎌뒄占쎌뵬 占쎌몧�눧占�)    占쎈솯占쎈뮞 : 02-3662-6681" />
		</p>
		<address>
		COPYRIGHT 2011 @ TREVIA CO., LTD ALL RIGHTS RESERVED.
		</address>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="popupLayer">
	<form name="counsellingForm" action="<?php echo $g['s']?>/" method="get" target="_action_frame_<?php echo $m?>">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="m" value="bbs" />
	<input type="hidden" name="bid" value="counselling" />
	<input type="hidden" name="mod" value="write" />

	<div id="layerTitle">
		<!--<a href="javascript:closeCounselling();"><img src="/modules/bbs/theme/_pc/counselling/image/btn_close.gif" alt="창닫기" /></a>-->
	</div>
	<div id="bbswrite2">
		<h1><img src="/modules/bbs/theme/_pc/counselling/image/title_01.gif" alt="고객님 필수정보 입력" /></h1>
		<table cellspacing="0">
			<?php if(!$my['id']):?>
			<tr>
			<td class="td11 topBorder1"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_name.gif" alt="고객명" /></td>
			<td class="td21 topBorder2">
				<input size="20" type="text" name="name" id="name" value="" class="input1" />
			</td>
			<td class="td11 topBorder2"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_cp.gif" alt="휴대폰" /></td>
			<td class="td21 topBorder2">
				<input size="3" type="text" name="adddata[cellphone1]" id="cellphone1" value="" maxlength="3" class="input1 cellphone" />-<input size="4" type="text" name="adddata[cellphone2]" id="cellphone2" value="" maxlength="4" class="input1 cellphone" />-<input size="4" type="text" name="adddata[cellphone3]" id="cellphone3" value="" maxlength="4" class="input1 cellphone" />
			</td>
			</tr>
			<tr>
			<td class="td11"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_email.gif" alt="이메일" /></td>
			<td class="td21">
				<input size="20" type="text" name="adddata[email]" id="email" value="" class="input1" />
			</td>			
			<td class="td11"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_region.gif" alt="여행지역" /></td>
			<td class="td21">
				<select name="adddata[region]">
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="발리">발리</option>
					<option value="코사무이">코사무이</option>
					<option value="리비에라마야">리비에라마야</option>
					<option value="미주허니문">미주허니문</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
					<option value="모리셔스">모리셔스</option>
					<option value="동남아">동남아</option>
					<option value="유럽">유럽</option>
					<option value="기타">기타</option>
				</select>
			</td>
			</tr>
			<?php else:?>
			<input type="hidden" name="name" id="name" value="<?php echo $my['nic']?>" />
			<?php $cellphone = explode("-", $my['tel2'])?>
			<input type="hidden" name="adddata[cellphone1]" id="cellphone1" value="<?php echo $cellphone[0]?>" />
			<input type="hidden" name="adddata[cellphone2]" id="cellphone2" value="<?php echo $cellphone[1]?>" />
			<input type="hidden" name="adddata[cellphone3]" id="cellphone3" value="<?php echo $cellphone[2]?>" />
			<input type="hidden" name="adddata[email]" id="email" value="<?php echo $my['email']?>" />
			<tr>
			<td class="td11 topBorder1"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_region.gif" alt="여행지역" /></td>
			<td class="td21 topBorder2" colspan="3">
				<select name="adddata[region]">
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="발리">발리</option>
					<option value="코사무이">코사무이</option>
					<option value="리비에라마야">리비에라마야</option>
					<option value="미주허니문">미주허니문</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
					<option value="모리셔스">모리셔스</option>
					<option value="동남아">동남아</option>
					<option value="유럽">유럽</option>
					<option value="기타">기타</option>
				</select>
			</td>
			</tr>
			<?php endif?>
			<tr>
			<td class="td11"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_kind.gif" alt="여행종류" /></td>
			<td class="td21">				
				<select name="adddata[kind]">
					<option value="허니문" selected>허니문</option>
					<option value="가족여행">가족여행</option>
					<option value="기타">기타</option>
				</select>
			</td>
			<td class="td11<?php if($my['id']):?> topBorder2<?php endif?>"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_person_count.gif" alt="총 여행인원" /></td>
			<td class="td21<?php if($my['id']):?> topBorder2<?php endif?>">
				<input size="20" type="text" name="adddata[person_count]" id="person_count" value="" class="input1" />
			</td>
			</tr>
			<tr>
			<td class="td11"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_start_date.gif" alt="출발날짜" /></td>
			<td class="td21">
				<input size="20" type="text" name="adddata[start_date]" id="start_date" value="<?php echo date("Y-m-d")?>" class="input1" />
			</td>
			<td class="td31"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_scheduled.gif" alt="예정" /></td>
			<td class="td21">
				<select name="adddata[scheduled]">
					<option value="8박" selected>8박</option>
					<option value="7박">7박</option>
					<option value="6박">6박</option>
					<option value="5박">5박</option>
					<option value="4박">4박</option>
					<option value="3박">3박</option>
					<option value="2박">2박</option>
				</select>
			</td>
			</tr>
		</table>

		<h1><img src="/modules/bbs/theme/_pc/counselling/image/title_02.gif" alt="고객님 선택정보 입력" /></h1>
		
		<table cellspacing="0" class="bottom">
			<tr>
			<td class="td11 topBorder1"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_budget.gif" alt="예산" /></td>
			<td class="td21 topBorder2">
				<input size="10" type="text" name="adddata[budget]" value="" class="input1" /> 만원
			</td>
			<td class="td31 topBorder2"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_wish_time.gif" alt="상담 희망시간" /></td>
			<td class="td21 topBorder2">
				<select name="adddata[wish_time]">
					<option value="8시|10시" selected>8시 ~ 10시</option>
					<option value="10시|12시">10시 ~ 12시</option>
					<option value="12시|14시">12시 ~ 14시</option>
					<option value="14시|16시">14시 ~ 16시</option>
					<option value="16시|18시">16시 ~ 18시</option>
					<option value="18시|20시">18시 ~ 20시</option>
				</select>
			</td>
			</tr>
			<tr>
			<td class="td11"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_airline.gif" alt="희망 항공사" /></td>
			<td class="td21">
				<select name="adddata[airline]">
					<option value="" selected>선택</option>
					<option value="">---------------</option>
					<option value="국적기">국적기</option>
					<option value="외국항공사">외국항공사</option>
					<option value="KE(대한항공)">KE(대한항공)</option>
					<option value="OZ(아시아나)">OZ(아시아나)</option>
					<option value="SQ(싱가폴)">SQ(싱가폴)</option>
					<option value="CX(케세이퍼시픽)">CX(케세이퍼시픽)</option>
					<option value="EY(에티하드)">EY(에티하드)</option>
					<option value="EK(아랍에미레이츠)">EK(아랍에미레이츠)</option>
					<option value="QR(카타르)">QR(카타르)</option>
					<option value="MH(말레이시아)">MH(말레이시아)</option>
					<option value="AA(아메리칸)">AA(아메리칸)</option>
					<option value="UA(유나이티드)">UA(유나이티드)</option>
					<option value="DL(델타항공)">DL(델타항공)</option>
					<option value="JL(일본항공)">JL(일본항공)</option>
				</select>
			</td>
			<td class="td31"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_fax.gif" alt="팩스번호" /></td>
			<td class="td21" colspan="3">
				<input size="3" type="text" name="adddata[fax1]" value="" maxlength="3" class="input1 cellphone" />-<input size="4" type="text" name="adddata[fax2]" value="" maxlength="4" class="input1 cellphone" />-<input size="4" type="text" name="adddata[fax3]" value="" maxlength="4" class="input1 cellphone" />
			</td>
			</tr>
			<tr>
			<td class="td11"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_resort.gif" alt="희망리조트" /></td>
			<td class="td21" colspan="3">
				<input size="15" type="text" name="adddata[wish_resort1]" value="" class="input1" />,
				<input size="15" type="text" name="adddata[wish_resort2]" value="" class="input1" />,
				<input size="15" type="text" name="adddata[wish_resort3]" value="" class="input1" />
			</td>
			</tr>
			<td class="td11"><img src="/modules/bbs/theme/_pc/counselling/image/lbl_etc_requirement.gif" alt="기타 요청사항" /></td>
			<td class="td21" colspan="3">
				
				<div class="editbox">
					<div>
						<textarea name="content"></textarea>
					</div>
				</div>

			</td>
			</tr>
			<tr>
			<td class="td11">제휴사코드</td>
			<td class="td21" colspan="3">
				
				<div class="editbox">
					<div>
						<input size="15" type="text" name="adddata[Affiliates]" value="" class="input1" />
					</div>
				</div>

			</td>
			</tr>
			<tr>
			<td colspan="4" class="td11">카카오톡 실시간상담 아이디는 trevia 입니다.</td>
					
			</tr>			
		</table>

	</div>
	<div id="layerBottom">
		<input type="image" src="/modules/bbs/theme/_pc/counselling/image/btn_confirm.gif" />
	</div>
	</form>
</div>
</div>
