<style type="text/css">
body {padding:0;margin:0;font-size:12px;font-family:gulim;}
input,select,textarea {font-size:12px;font-family:gulim;}
img,p {border:0;margin:0;padding:0;}
a {text-decoration:none;color:#000;}
a:hover {color:#666;}
#wrap {width:960px;margin:auto;}
#header {}
#top_logo {margin:10px 0 0 0;}
#top_logo .link1 {padding-left:10px;padding-top:26px;}
#top_logo .link2 {padding-left:10px;padding-top:26px;}
#container {margin:0px;z-index:0;}
#content {margin:0px 0 0 0;float:left;width:960px;padding:15px 0 0 0px;z-index:0;}
#container2 {margin:0px;z-index:0;}
#content2 {margin:0 0 0 0;float:left;width:960px;padding:0px 0 0 0px;z-index:0;}
#footer {margin:15px 0 0 0;border:0;solid 0px;text-align:left;height:121px;background:url('<?php echo $g['img_layout']?>/footbg.jpg');}
#footer div {}
#footer div a {font-size:11px;font-family:dotum;color:#444444;letter-spacing:0px;}
#footer div .split {font-family:dotum;font-size:9px;color:#c0c0c0;}
#footer address {padding: 15px 0 0 240px;font-family:dotum;font-size:11px;font-style:normal;color:#999999;line-height:24px;}
#footer2 {margin-top:15px;border:0;solid 0px;text-align:left;height:121px;background:url('<?php echo $g['img_layout']?>/footbg.jpg');}
#footer2 div {}
#footer2 div a {font-size:11px;font-family:dotum;color:#444444;letter-spacing:0px;}
#footer2 div .split {font-family:dotum;font-size:9px;color:#c0c0c0;}
#footer2 address {padding: 15px 0 0 240px;font-family:dotum;font-size:11px;font-style:normal;color:#999999;line-height:24px;}
<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?>
#menu_1 {margin:0px 0 0 0;padding:0px 0 0 0;float:left;z-index:999;}
#menu_2 {margin:0px 0 0 0;padding:0px 0 0 0;float:left;z-index:999;}
#menu {height:52px;margin:0px 0 0 0;padding:0px 0 0 0;float:left;z-index:999;}
#menu1 {height:52px;margin:0px 0 0 0;padding:0px 0 0 0;float:left;z-index:999;}
.diz_menu1 { z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_01.gif"); background-repeat:no-repeat;font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:normal;}
a.diz_menu1:link { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu1:visited { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu1:hover { font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:bold; }
a.diz_menu1:active { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
.diz_menu_over1 {z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_01.gif"); background-repeat:no-repeat;font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:bold}
.diz_menu2 { z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_02.gif");background-repeat:no-repeat; font-size:12pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:normal;}
a.diz_menu2:link { font-size:12pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu2:visited { font-size:12pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu2:hover { font-size:12pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:bold; }
a.diz_menu2:active { font-size:12pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
.diz_menu_over2 {z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_02.gif"); background-repeat:no-repeat;font-size:12pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:bold}
.diz_menu3 { z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_03.gif");background-repeat:no-repeat; font-size:7pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:normal;}
a.diz_menu3:link { font-size:7pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu3:visited { font-size:7pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu3:hover { font-size:7pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:bold; }
a.diz_menu3:active { font-size:7pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
.diz_menu_over3 {z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_03.gif"); background-repeat:no-repeat;font-size:7pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:bold}
.diz_menu4 { z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_04.gif"); background-repeat:no-repeat;font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:normal;}
a.diz_menu4:link { height:52px;font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu4:visited {height:52px; font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu4:hover { height:52px;font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:bold; }
a.diz_menu4:active { height:52px;font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
.diz_menu_over4 { z-index:999;height:52px;background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_04.gif"); background-repeat:no-repeat;font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:bold}
.diz_menu5 {z-index:999; background-image:url("<?php echo $g['img_layout']?>/menu/menu_05.gif");background-repeat:no-repeat; font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:normal;}
a.diz_menu5:link { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu5:visited { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu5:hover { font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:bold; }
a.diz_menu5:active { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
.diz_menu_over5 {z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_05.gif");background-repeat:no-repeat; font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:bold}
.diz_menu6 {z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_06.gif");background-repeat:no-repeat; font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:normal;}
a.diz_menu6:link { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu6:visited { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
a.diz_menu6:hover { font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:bold; }
a.diz_menu6:active { font-size:11pt; color:#555555; font-family:Tahoma; line-height:110%; padding-top:6px; text-decoration:none; font-weight:normal; }
.diz_menu_over6 {z-index:999;background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_06.gif");background-repeat:no-repeat; font-size:11pt; color:#1375CA; font-family:Tahoma; line-height:110%; padding-top:6px; cursor:hand; font-weight:bold}

.diz_popmenu1 { z-index:999;width:161px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0201.gif");background-repeat:no-repeat; font-align:center;font-family:Tahoma; font-size:16pt; color:#EEEEEE; background-color:#3B3B3B; cursor:hand; padding-left:0px;}
.diz_popmenu_over1 { z-index:999;width:161px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0201.gif");background-repeat:no-repeat; font-align:center; font-family:Tahoma; font-size:16pt; color:#FFFFFF; background-color:#6B6B6B; cursor:hand; padding-left:0px;}
.diz_popmenu2 { z-index:999;width:161px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0202.gif");background-repeat:no-repeat;font-align:center;font-family:Tahoma; font-size:16pt; color:#EEEEEE; background-color:#3B3B3B; cursor:hand; padding-left:0px;}
.diz_popmenu_over2 { z-index:999;width:161px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0202.gif");background-repeat:no-repeat;font-align:center; font-family:Tahoma; font-size:16pt; color:#FFFFFF; background-color:#6B6B6B; cursor:hand; padding-left:0px;}

.diz_popmenu31 { z-index:999;width:160px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0301.gif");background-repeat:no-repeat; font-align:center;font-family:Tahoma; font-size:16pt; color:#EEEEEE; background-color:#3B3B3B; cursor:hand; padding-left:0px;}
.diz_popmenu_over31 { z-index:999;width:160px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0301.gif");background-repeat:no-repeat; font-align:center; font-family:Tahoma; font-size:16pt; color:#FFFFFF; background-color:#6B6B6B; cursor:hand; padding-left:0px;}
.diz_popmenu32 { z-index:999;width:160px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0302.gif");background-repeat:no-repeat;font-align:center;font-family:Tahoma; font-size:16pt; color:#EEEEEE; background-color:#3B3B3B; cursor:hand; padding-left:0px;}
.diz_popmenu_over32 { z-index:999;width:160px;height:30px;background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0302.gif");background-repeat:no-repeat;font-align:center; font-family:Tahoma; font-size:16pt; color:#FFFFFF; background-color:#6B6B6B; cursor:hand; padding-left:0px;}


<?php else:?>
#mainMenu{float:left;width:965px; height:52px;z-index:999;}
#mainMenu .ulm {margin:0 0 0 0px;padding:0 0 0 0px;float:left}
#top-menu1,
#top-menu2,
#top-menu3,
#top-menu4,
#top-menu5,
#top-menu6{margin:0px 0 0 0;padding:0px 0 0 0;float:left;;z-index:999;}
#top-menu-head1,
#top-menu-head2,
#top-menu-head3,
#top-menu-head4,
#top-menu-head5,
#top-menu-head6 {margin:0px 0 0 0;padding:0px 0 0 0;float:left;display:block; overflow:hidden; height:52px; background:no-repeat 0 0; text-indent:-5000px;;z-index:999;}
#top-menu-head1{width:159px; background-image:url("<?php echo $g['img_layout']?>/menu/menu_01.gif")}
#top-menu-head1.on{background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_01.gif");}
#top-menu-head2{width:161px; background-image:url("<?php echo $g['img_layout']?>/menu/menu_02.gif")}
#top-menu-head2.on{background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_02.gif");}
#top-menu-head3{width:160px; background-image:url("<?php echo $g['img_layout']?>/menu/menu_03.gif")}
#top-menu-head3.on{background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_03.gif");}
#top-menu-head4{width:160px; background-image:url("<?php echo $g['img_layout']?>/menu/menu_04.gif")}
#top-menu-head4.on{background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_04.gif");}
#top-menu-head5{width:159px; background-image:url("<?php echo $g['img_layout']?>/menu/menu_05.gif")}
#top-menu-head5.on{background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_05.gif");}
#top-menu-head6{width:161px; background-image:url("<?php echo $g['img_layout']?>/menu/menu_06.gif")}
#top-menu-head6.on{background-image:url("<?php echo $g['img_layout']?>/menu/menu_over_06.gif");}
#mainMenu li {list-style:none;}
#mainMenu li ul{list-style:none;z-index:999; }
#mainMenu #top-sub-menu2{float:left;position:absolute; margin:44px 0 0 -40px;width:161px;z-index:999;}
#mainMenu #top-sub-menu3{float:left;position:absolute; margin:44px 0 0 -40px;width:160px;z-index:999;}
#mainMenu li ul li{list-style:none;float:left;}
#mainMenu li ul a{display:block; overflow:hidden; height:30px; background:no-repeat 0 0; text-indent:-5000px;}
#mainMenu #top-2-1 a{width:161px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0201.gif")}
#mainMenu #top-2-1 a:hover{width:161px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0201.gif")}
#mainMenu #top-2-2 a{width:161px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0202.gif")}
#mainMenu #top-2-2 a:hover{width:161px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0202.gif")}
#mainMenu #top-3-1 a{width:160px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0301.gif")}
#mainMenu #top-3-1 a:hover{width:160px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0301.gif")}
#mainMenu #top-3-2 a{width:160px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_0302.gif")}
#mainMenu #top-3-2 a:hover{width:160px; height:30px; background-image:url("<?php echo $g['img_layout']?>/menu/submenu_over_0302.gif")}

<?php endif?>
</style>
<script LANGUAGE="JavaScript" type="text/javascript">


<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?>

function set_submenu(obj) {
    var nLeft,nTop

    <?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 9')):?>
    ph = 44; // 서브메뉴 상단위치 조절
	pw = 1;
	nLeft = event.x - event.offsetX + document.body.scrollLeft;
    nTop = event.y - event.offsetY + document.body.scrollTop;
    <?php elseif (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8') || strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')):?>

	if(obj == "submenu2")
	{
		ph = 44; // 서브메뉴 상단위치 조절
		pw = -2;
		var el = event.srcElement;
		nLeft = ((document.body.scrollWidth/2)-275)-ph;
		nTop = event.y - event.offsetY + document.body.scrollTop;
	}
	else if(obj == "submenu3")
	{
		ph = 44; // 서브메뉴 상단위치 조절
		pw = -2;
		var el = event.srcElement;
		nLeft = ((document.body.scrollWidth/2)-275)+117;
		nTop = event.y - event.offsetY + document.body.scrollTop;
	}else{
		ph = 44; // 서브메뉴 상단위치 조절
		pw = -2;
		var el = event.srcElement;
		nLeft = ((document.body.scrollWidth/2)-275)-ph;
		nTop = event.y - event.offsetY + document.body.scrollTop;
	}
	<?php elseif (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?>
    ph = 44; // 서브메뉴 상단위치 조절
	pw = -2;
	
	nLeft = event.x - event.offsetX + document.body.scrollLeft;
    nTop = event.y - event.offsetY + document.body.scrollTop;
    <?php else:?>
    ph = 44; // 서브메뉴 상단위치 조절
	pw = 0;
	nLeft = event.x - event.offsetX + document.body.scrollLeft;
    nTop = event.y - event.offsetY + document.body.scrollTop;
	<?php endif?>

	eval(obj+".style").posLeft = nLeft + pw;
    eval(obj+".style").posTop = nTop + ph;
    eval(obj+".style").display='block';
}

function show_submenu(obj) {
    <?php if (strstr($_SERVER['HTTP_USER_AGENT'],'Firefox')):?>
		obj.style.display = 'block';
	<?php else:?>
    eval(obj+".style").display='block';
	<?php endif?>
}

function hide_submenu(obj) {
    <?php if (strstr($_SERVER['HTTP_USER_AGENT'],'Firefox')):?>
		obj.style.display = 'none';
	<?php else:?>
    eval(obj+".style").display='none';
	<?php endif?>
}

<?php else:?>
function selectTopmenuByMenuId() {
	var depth1 = this.id.substring("top-menu-head".length,this.id.length);
	var menuId = "sub-menu" + depth1;
	var selectDepth1 = "top-" + depth1 + "-1";
	var topnav = document.getElementById("mainMenu");
	if(!topnav) return;
	var topEl = topnav.getElementsByTagName("ul");
	for(i = 0 ; i < topEl.length ; i++){
		if(topEl[i].id.substring(0,12) == "top-sub-menu") {
			topEl[i].style.display = "none";
		}
	}
	var topEl2 = topnav.getElementsByTagName("li");
	for(i = 0 , seq = 1; i < topEl2.length ; i++){
		if(topEl2[i].id.substring(0,8) == "top-menu") {
			/*initTopMenu(topEl2[i],depth1);*/
			topEl2[i].onmouseover = function(){
				this.style.display = 'block';
				this.firstChild.className = 'on';
				this.onmouseout = function(){
					this.firstChild.className = '';
					this.getElementsByTagName('ul')[0].style.display = 'none';
					/*this.getElementsByTagName('ul')[0].style.display = 'block';*/
				}
			}
		}
		if(topEl2[i].id.substring(0,8) == "position") {
			if(depth1 == seq) topEl2[i].style.display = "block";
			else topEl2[i].style.display = "none";
			seq++;
		}
	}
	
	var nav = document.getElementById("top-" + menuId);
	if(!nav) return;
	nav.style.display = "block";

	nav.onmouseover = function(){
		this.style.display = 'block';
		this.onmouseout = function(){
			this.style.display = 'none';
		}
	}
	menuEl = nav.getElementsByTagName("li");
	for(i = 0; i < menuEl.length; i++) {
		var imgEl = menuEl.item(i).getElementsByTagName("img")
		if(imgEl != null && imgEl.length>0) {
			imgEl.item(0).onmouseover = menuOver;
			imgEl.item(0).onmouseout = menuOut;
			imgEl.item(0).onfocus = menuOver;
			imgEl.item(0).onblur = menuOut;
		}
	}
}

function initTopmenuByMenuId(depth1, depth2, depth3, depth4, menuId) {
	var selectDepth1 = "top-" + depth1 + "-" + depth2;
	var selectDepth2 = "top-" + depth1 + "-" + depth2 + "-" + depth3;
	var selectDepth3 = "top-" + depth1 + "-" + depth2 + "-" + depth3 + "-" + depth4;
	var topnav = document.getElementById("mainMenu");
	if(!topnav) return;
	var topEl = topnav.getElementsByTagName("ul");	
	for(var i = 0 ; i < topEl.length ; i++){
		if(topEl[i].id.substring(0,12) == "top-sub-menu") {
			topEl[i].style.display = "none";
		}
	}
	var topEl3 = topnav.getElementsByTagName("li");
	for(i = 0 , seq = 1; i < topEl3.length ; i++){
		if(topEl3[i].id.substring(0,8) == "position") {
			if(depth1 == seq) topEl3[i].style.display = "block";
			else topEl3[i].style.display = "none";
			seq++;
		}
	}
	var topEl2 = topnav.getElementsByTagName("a");
	for(i = 0 , seq = 0; i < topEl2.length ; i++){
		if(topEl2[i].id.substring(0,13) == "top-menu-head") {
			topEl2[i].onmouseover =  selectTopmenuByMenuId;
			topEl2[i].onfocus = selectTopmenuByMenuId;
			if ( seq+1 == depth1) {
				topEl2[i].onmouseover();
				topEl2[i].onfocus();
			}
			seq++;
		}
	}
	var nav = document.getElementById("top-sub-" + menuId);
	if(!nav) return;
	nav.style.display = "block";
	menuEl = nav.getElementsByTagName("li");
	for(i = 0; i < menuEl.length; i++) {
		var menuElItm = menuEl.item(i);
		var imgEl = menuElItm.getElementsByTagName("img");
		if(imgEl == null || imgEl.length == 0) continue;
		var itm = imgEl.item(0);
		if (menuElItm.id == selectDepth1 || menuElItm.id == selectDepth2  || menuElItm.id == selectDepth3  ) {
			itm.src = itm.src.replace(".gif", "_over.gif");
			itm.onmouseover = null;
			itm.onmouseout = null;
			itm.onfocus = null;
			itm.onblur = null;
		}
		else {
			itm.onmouseover = menuOver;
			itm.onmouseout = menuOut;
			itm.onfocus = menuOver;
			itm.onblur = menuOut;
		}
	}
}

<?php endif?>
</script>
<h1 style="height:0px;color:#FFFFFF;font-size:0pt;">trevia</h1>
<div id="wrap">
	<div id="header">
		<div id="top_logo">
		<table height="50"><tr>
		<td><a href="<?php echo RW(0)?>" onfocus="this.blur()"><img src="<?php echo $g['img_layout']?>/logo.jpg" alt="<?php echo $_HS['title']?>" /></a></td><td width='390'>&nbsp</td>
<!--		<td><a href="http://www.himaldives.co.kr" target='_blank' onfocus="this.blur()"><img class="link1" src="<?php echo $g['img_layout']?>/hibali.jpg" alt="Hi Bali" /></a></td>-->
		<td width="165"></td>
		<td><a href="http://www.himaldives.co.kr" target='_blank' onfocus="this.blur()"><img class="link2" src="<?php echo $g['img_layout']?>/himaldives.jpg" alt="Hi Maldives" /></td>
		</tr></table>
		</div>
		<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?>
		<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6') || strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')):?><div id="menu_1"><?php else:?><div id="menu_2"><?php endif?>	
		<!-- 대메뉴 -->
		<table border="0" cellpadding="0" cellspacing="0" height="52">
		<tr align="center">
		<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
		<td width="159" id="menu" onClick="location.href='<?php echo RW(0)?>'" class="diz_menu1" onMouseOver="this.className='diz_menu_over1';set_submenu('submenu1');" onMouseOut="this.className='diz_menu1';hide_submenu('submenu1')">&nbsp</td>
		<?php $_M2=db_fetch_array($_MENUS1)?><td width="161" id="menu1" onClick="location.href='<?php echo $_M2['redirect']?$_M2['joint']:RW('c='.$_M2['id'])?>'" class="diz_menu2" onMouseOver="this.className='diz_menu_over2';set_submenu('submenu2');" onMouseOut="this.className='diz_menu2';hide_submenu('submenu2')">&nbsp</td>
		<?php $_M3=db_fetch_array($_MENUS1)?><td width="160" id="menu2" onClick="location.href='<?php echo $_M3['redirect']?$_M3['joint']:RW('c='.$_M3['id'])?>'" class="diz_menu3" onMouseOver="this.className='diz_menu_over3';set_submenu('submenu3');" onMouseOut="this.className='diz_menu3';hide_submenu('submenu3')">&nbsp</td>
		<?php $_M1=db_fetch_array($_MENUS1)?><td width="160" id="menu" onClick="location.href='<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>'" class="diz_menu4" onMouseOver="this.className='diz_menu_over4';set_submenu('submenu4');" onMouseOut="this.className='diz_menu4';hide_submenu('submenu4')">&nbsp</td>
		<?php $_M1=db_fetch_array($_MENUS1)?><td width="159" id="menu" onClick="location.href='<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>'" class="diz_menu5" onMouseOver="this.className='diz_menu_over5';set_submenu('submenu5');" onMouseOut="this.className='diz_menu5';hide_submenu('submenu5')">&nbsp</td>
		<?php $_M1=db_fetch_array($_MENUS1)?><td width="161" id="menu" onClick="location.href='<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>'" class="diz_menu6" onMouseOver="this.className='diz_menu_over6';set_submenu('submenu6');" onMouseOut="this.className='diz_menu6';hide_submenu('submenu6')">&nbsp</td>
		</tr>
		</table>

		<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M2['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
		<table width="161" cellpadding="0" cellspacing="0" border="0" id="submenu2" style="position:absolute; background:#6B6B6B; z-index:999; display:none;" onMouseOver="menu1.className='diz_menu_over2';show_submenu('submenu2');" onMouseOut="menu1.className='diz_menu2';hide_submenu('submenu2');">
		<tr><td bgcolor="#3B3B3B">
		<table border="0" cellpadding="0" cellspacing="0" bgcolor="#3B3B3B" width="100%">
		<tr><?php $_M21=db_fetch_array($_MENUS2)?><td width='161' height='30' onClick="self.location='<?php echo RW('c='.$_M2['id'].'/'.$_M21['id'])?>'" class="diz_popmenu1" onMouseOver="this.className='diz_popmenu_over1'" onMouseOut="this.className='diz_popmenu1'">&nbsp</td></tr>
		<tr><?php $_M21=db_fetch_array($_MENUS2)?><td width='161' height='30' onClick="self.location='<?php echo RW('c='.$_M2['id'].'/'.$_M21['id'])?>'" class="diz_popmenu2" onMouseOver="this.className='diz_popmenu_over2'" onMouseOut="this.className='diz_popmenu2'">&nbsp</td></tr>
		</table></td></tr></table>
		
		<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M3['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
		<table width="160" cellpadding="0" cellspacing="0" border="0" id="submenu3" style="position:absolute; background:#6B6B6B; z-index:999; display:none;" onMouseOver="menu2.className='diz_menu_over3';show_submenu('submenu3');" onMouseOut="menu2.className='diz_menu3';hide_submenu('submenu3');">
		<tr><td bgcolor="#3B3B3B">
		<table border="0" cellpadding="0" cellspacing="0" bgcolor="#3B3B3B" width="100%">
		<tr><?php $_M31=db_fetch_array($_MENUS2)?><td width='160' height='30' onClick="self.location='<?php echo RW('c='.$_M3['id'].'/'.$_M31['id'])?>'" class="diz_popmenu31" onMouseOver="this.className='diz_popmenu_over31'" onMouseOut="this.className='diz_popmenu31'">&nbsp</td></tr>
		<tr><?php $_M31=db_fetch_array($_MENUS2)?><td width='160' height='30' onClick="self.location='<?php echo RW('c='.$_M3['id'].'/'.$_M31['id'])?>'" class="diz_popmenu32" onMouseOver="this.className='diz_popmenu_over32'" onMouseOut="this.className='diz_popmenu32'">&nbsp</td></tr>
		</table></td></tr></table>
		
		
		</div>
		 
		<?php else:?>
		<?php $_MENUS1=getDbSelect($table['s_menu'],'site='.$s.' and hidden=0 and depth=1 order by gid asc','*')?>
		<div id="mainMenu"><ul class="ulm">
			<li id="top-menu1"><a href="<?php echo RW(0)?>" id="top-menu-head1">메뉴1</a></li>
			<?php $_M1=db_fetch_array($_MENUS1)?><li id="top-menu2"><a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" id="top-menu-head2">메뉴2</a>
			<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
			<ul id="top-sub-menu2">
				<?php $_M2=db_fetch_array($_MENUS2)?><li id="top-2-1"><a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>">서브메뉴1</a></li>
				<?php $_M2=db_fetch_array($_MENUS2)?><li id="top-2-2"><a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>">서브메뉴2</a></li>
			</ul></li>
			<?php $_M1=db_fetch_array($_MENUS1)?><li id="top-menu3"><a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" id="top-menu-head3">메뉴3</a>
			<?php $_MENUS2=getDbSelect($table['s_menu'],'site='.$s.' and parent='.$_M1['uid'].' and hidden=0 and depth=2 order by gid asc','*')?>
			<ul id="top-sub-menu3">
				<?php $_M2=db_fetch_array($_MENUS2)?><li id="top-3-1"><a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>">서브메뉴1</a></li>
				<?php $_M2=db_fetch_array($_MENUS2)?><li id="top-3-2"><a href="<?php echo RW('c='.$_M1['id'].'/'.$_M2['id'])?>">서브메뉴2</a></li>
			</ul></li>
			<?php $_M1=db_fetch_array($_MENUS1)?><li id="top-menu4"><a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" id="top-menu-head4">메뉴4</a></li>
			<?php $_M1=db_fetch_array($_MENUS1)?><li id="top-menu5"><a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" id="top-menu-head5">메뉴5</a></li>
			<?php $_M1=db_fetch_array($_MENUS1)?><li id="top-menu6"><a href="<?php echo $_M1['redirect']?$_M1['joint']:RW('c='.$_M1['id'])?>" id="top-menu-head6">메뉴6</a></li>
		</ul><script type="text/javascript">initTopmenuByMenuId(0, 0, 0, 0, "menu1")</script>
		</div>
		<?php endif?>
	</div>
	<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?><div id="container"><?php else:?><div id="container"><?php endif?>	
		<?php include __KIMS_CONTAINER_HEAD__?>
		<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?><div id="content"><?php else:?><div id="content"><?php endif?>	
			<?php include __KIMS_CONTENT__?>
		</div>
		<div class="clear"></div>
	</div>
	<?php include __KIMS_CONTAINER_FOOT__?>
	<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6') || strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')):?><div id="footer2"><?php else:?><div id="footer"><?php endif?>		
		<address>
		상호명 : 주식회사 트레비아 (대표이사: 임희성) | 주소 : 서울특별시 마포구 서교동 480-10 미리내빌딩 3층 사업자등록번호 109-86-28731<br>
		통신판매업신고번호 : 제2013-서울마포-0644호 | 일반여행업 : 제2013호-000026호<br>
		고객센타 : 1644-6681 (평일 오전 09~오후 08시까지 / 토요일 10-17시까지 / 일요일 휴무) | 팩스 : 02-3662-6681<br>
		copyright (c) trevia all right reserved.<br>
		</address>
	</div>
</div>