var openmbrlayer;

//객체얻기
function getId(id)
{
	return document.getElementById(id);
}
//리다이렉트
function goHref(url)
{
	location.href = url;
}
//아이디형식체크
function chkIdValue(id)
{
	if (id == '') return false;
	if (!getTypeCheck(id,"abcdefghijklmnopqrstuvwxyz1234567890_")) return false;
	return true;
}
//파일명형식체크
function chkFnameValue(file)
{
	if (file == '') return false;
	if (!getTypeCheck(file,"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_")) return false;
	return true;
}
//이메일체크
function chkEmailAddr(email)
{
	if (email == '') return false;
	if (email.indexOf('\@') == -1 || email.indexOf('.') == -1) return false;
	return true;
}
//오픈윈도우
function OpenWindow(url) 
{
	setCookie('TmpCode','',1);
	window.open(url,'','left=0,top=0,width=100px,height=100px,statusbar=no,scrollbars=no,toolbar=no');
}
//이미지보기
function imgOrignWin(url)
{
	setCookie('TmpImg',url,1);
	OpenWindow(rooturl+'/_core/lib/zoom.php','','width=10px,height=10px,status=yes,resizable=yes,scrollbars=yes');
}
//로그인체크
function isLogin()
{
	if (memberid == '')
	{
		alert(needlog+'  ');
		return false;
	}
	return true;
}
/*쿠키세팅*/
function setCookie(name,value,expiredays) 
{ 
	var todayDate = new Date(); 
	todayDate.setDate( todayDate.getDate() + expiredays ); 
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
}
/*쿠키추출*/
function getCookie( name )
{
	var nameOfCookie = name + "=";
	var x = 0;
	while ( x <= document.cookie.length )
	{
		var y = (x+nameOfCookie.length);
		if ( document.cookie.substring( x, y ) == nameOfCookie ) 
		{
			if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 ) endOfCookie = document.cookie.length;
			return unescape( document.cookie.substring( y, endOfCookie ) );
		}
		x = document.cookie.indexOf( " ", x ) + 1;
		if ( x == 0 ) break;
	}
	return "";
}
/*이벤트좌표값*/
function getEventXY(e)
{
	var obj = new Object(); 
	obj.x = (e.pageX) ? e.pageX : event.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft) - (document.documentElement.clientLeft || document.body.clientLeft);
	obj.y = (e.pageY) ? e.pageY : event.clientY + (document.documentElement.scrollTop || document.body.scrollTop)  - (document.documentElement.clientTop || document.body.clientTop);
	return obj;
}
/*파일확장자*/
function getFileExt(file)
{
	var arr = file.split('.');
	return arr[arr.length-1];
}
/*객체의위치/크기*/
function getDivWidth(width,div)
{
	var maxsize = parseInt(width);
    var content = getId(div); 
    var img = content.getElementsByTagName('img');
	var len = img.length;
    for(i=0;i<len;i++) 
    {
        if (img[i].width > maxsize) img[i].width=maxsize;
		if (img[i].style.display == 'none') img[i].style.display = 'block';
    }
}
function getOfs(id) 
{
	var uagent = navigator.userAgent;
	if (myagent == 'ie' && uagent.indexOf('MSIE 9')==-1 && uagent.indexOf('MSIE 8')==-1 && uagent.indexOf('MSIE 7')==-1)
	{
		var img = id.getElementsByTagName('img');
		var len = img.length;
		for (var i=0;i<len;i++) img[i].style.display = 'none';
	}
    var obj = new Object();
	var box = id.getBoundingClientRect(); 
	obj.left = box.left + (document.documentElement.scrollLeft || document.body.scrollLeft); 
	obj.top = box.top + (document.documentElement.scrollTop || document.body.scrollTop); 
	obj.width = box.right - box.left; 
	obj.height = box.bottom - box.top;
    return obj; 
} 
/*조사처리*/
/*은,는,이,가 - getJosa(str,"은는")*/
function getJosa(str, tail) 
{ 
    strTemp = str.substr(str.length - 1); 
    return ((strTemp.charCodeAt(0) - 16) % 28 != 0) ? str + tail.substr(0, 1) : str + tail.substr(1, 1); 
}
/*타입비교 (비교문자 , 비교형식 ; ex: getTypeCheck(string , "1234567890") ) */
function getTypeCheck(s, spc)
{
	var i;

	for(i=0; i< s.length; i++) 
	{
		if (spc.indexOf(s.substring(i, i+1)) < 0) 
		{
			return false;
		}
	}        
	return true;
}

/*콤마삽입 (number_format)*/
function commaSplit(srcNumber) 
{ 
	var txtNumber = '' + srcNumber; 

	var rxSplit = new RegExp('([0-9])([0-9][0-9][0-9][,.])'); 
	var arrNumber = txtNumber.split('.'); 
	arrNumber[0] += '.'; 
	do { 
		arrNumber[0] = arrNumber[0].replace(rxSplit, '$1,$2'); 
	} 
	while (rxSplit.test(arrNumber[0])); 
	if (arrNumber.length > 1) { 
		return arrNumber.join(''); 
	} 
	else { 
		return arrNumber[0].split('.')[0]; 
	} 
}
function priceFormat(obj)
{
	if (!getTypeCheck(filterNum(obj.value),'0123456789'))
	{
		alert(neednum);
		obj.value = obj.defaultValue;
		obj.focus();
		return false;
	}
	else {
		obj.value = commaSplit(filterNum(obj.value));
	}
}
function numFormat(obj)
{
	if (!getTypeCheck(obj.value,'0123456789'))
	{
		alert(neednum);
		obj.value = obj.defaultValue;
		obj.focus();
		return false;
	}
}
function getJeolsa(price,_round)
{
	return price - (price%(_round*10));
}
/*콤마제거*/
function filterNum(str) 
{ 
	return str.replace(/^\$|,/g, ""); 
}
/*페이징처리*/
function getPageLink(lnum,p,tpage,img)
{
	var g_hi = img.split('|');
	var imgpath = g_hi[0];
	var wp = g_hi[1] ? g_hi[1] : '';
	var g_p1 = '<img src="'+imgpath+'/p1.gif" alt="Prev '+lnum+' pages" />';
	var g_p2 = '<img src="'+imgpath+'/p2.gif" alt="Prev '+lnum+' pages" />';
	var g_n1 = '<img src="'+imgpath+'/n1.gif" alt="Next '+lnum+' pages" />';
	var g_n2 = '<img src="'+imgpath+'/n2.gif" alt="Next '+lnum+' pages" />';
	var g_cn = '<img src="'+imgpath+'/l.gif" class="split" alt="" />';
	var g_q  = p > 1 ? '<a href="'+getPageGo(1,wp)+'"><img src="'+imgpath+'/fp.gif" alt="First page" class="phidden" /></a>' : '<img src="'+imgpath+'/fp1.gif" alt="First page" class="phidden" />';

	if(p < lnum+1) { g_q += g_p1; }
	else{ var pp = parseInt((p-1)/lnum)*lnum; g_q += '<a href="'+getPageGo(pp,wp)+'">'+g_p2+'</a>';} g_q += g_cn;

	var st1 = parseInt((p-1)/lnum)*lnum + 1;
	var st2 = st1 + lnum;

	for(var jn = st1; jn < st2; jn++)
	if ( jn <= tpage)
	(jn == p)? g_q += '<span class="selected" title="'+jn+' page">'+jn+'</span>'+g_cn : g_q += '<a href="'+getPageGo(jn,wp)+'" class="notselected" title="'+jn+' page">'+jn+'</a>'+g_cn;

	if(tpage < lnum || tpage < jn) { g_q += g_n1; }
	else{var np = jn; g_q += '<a href="'+getPageGo(np,wp)+'">'+g_n2+'</a>'; }
	g_q  += tpage > p ? '<a href="'+getPageGo(tpage,wp)+'"><img src="'+imgpath+'/lp.gif" alt="Last page" class="phidden" /></a>' : '<img src="'+imgpath+'/lp1.gif" alt="Last page" class="phidden" />';
	document.write(g_q);
}
/*페이지클릭*/
function getPageGo(n,wp)
{ 
	var v   = wp != '' ? wp : 'p';
	var p   = getUriString(v);
	var que = location.href.replace('&'+v+'='+p,'');
		que = que.indexOf('?') != -1 ? que : que + '?';
		que = que.replace('&mod=view&uid=' + getUriString('uid') , '');
	var xurl = que.split('#');
	return xurl[0].indexOf('?') != -1 ?  xurl[0] + '&'+v+'=' + n : xurl[0] + '?'+v+'=' + n; 
}
/*파라미터값*/
function getUriString(param)
{
	var QuerySplit = location.href.split('?');
	var ResultQuer = QuerySplit[1] ? QuerySplit[1].split('&') : '';

	for (var i = 0; i < ResultQuer.length; i++)
	{
		var keyval = ResultQuer[i].split('=');
		if (param == keyval[0]) return keyval[1];
	}
	return '';
}
/* 날짜출력포맷 */
/* getDateFormat('yyyymmddhhiiss','xxxx.xx.xx xx:xx:xx')*/
var dateFormat = 0;
function getDateFormat(date , type)
{
	var ck;
	var rtstr = "";
	var j = 0;
	for(var i = 0; i < type.length; i++) 
	{
		if(type.substring(i,i+1) == 'x')
		{
			rtstr += date.substring(j,j+1);
		}
		else {
			j--;
			rtstr += type.substring(i,i+1);
		}
		j++;
	}
	if(dateFormat == 0)
	{
		document.write(rtstr);
	}
	else {
		dateFormat = 0;
		return rtstr;
	}
}
//선택반전
function chkFlag(f)
{
    var l = document.getElementsByName(f);
    var n = l.length;
    var i;

    for (i = 0; i < n; i++) l[i].checked = !l[i].checked;
}

//레이어팝업닫기
function hidePopupLayer(n) 
{ 
	if ( getId('popCheck').checked == true )
	{
		var nowcookie = getCookie('popview');
		setCookie('popview', '['+n+']' + nowcookie , 1);
	}    
	getId('_action_layer_popup').style.display = 'none';
}
/*문자열카피*/
function copyStr(str) 
{
	if(myagent == 'ie')
	{
		window.clipboardData.setData('Text',str); 
	}
	else {
		window.execCommand('copy',str);
	}
}
//레이어show/hide
function layerShowHide(layer,show,hide)
{
	if(getId(layer).style.display != show) getId(layer).style.display = show;
	else getId(layer).style.display = hide;
}
//회원레이어
function getMemberLayer(uid,e)
{
	
	if(memberid==''||uid=='0') return false;
	eval('frames._action_frame_'+moduleid).location.href = rooturl+'/?system=layer.member&uid=' + uid;
	var ly = getId('_action_layer_');
	var xy = getEventXY(e);
	ly.style.position = 'absolute';
	ly.style.display = 'block';
	ly.style.top = (parseInt(xy.y) + 15) + 'px';
	ly.style.left = (parseInt(xy.x) - 50) + 'px';
	mbrclick = true;
	openmbrlayer = true;
	setTimeout("mbrclick=false;",100);
}
function getMemberLayer2(uid,e)
{
	if(memberid==''||uid=='0') return false;
	eval('frames._action_frame_'+moduleid).location.href = rooturl+'/?system=layer.member2&uid=' + uid;
	var ly = getId('_action_layer_');
	var xy = getEventXY(e);
	ly.style.position = 'absolute';
	ly.style.display = 'block';
	ly.style.top = (parseInt(xy.y) + 15) + 'px';
	ly.style.left = (parseInt(xy.x) - 50) + 'px';
	mbrclick = true;
	setTimeout("mbrclick=false;",100);
}
function closeMemberLayer()
{
	if(mbrclick==false) getId('_action_layer_').style.display = 'none';
}
