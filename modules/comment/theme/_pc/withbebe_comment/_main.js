// view
var checkFlag = false;
var oResizeFlag = false;
function layerOpen(e)
{
	var x = myagent != 'ie' ? e.pageX : event.x+(document.body.scrollLeft || document.documentElement.scrollLeft);
	var y = myagent != 'ie' ? e.pageY : event.y+(document.body.scrollTop || document.documentElement.scrollTop);
	var layer = getId('pwbox');
	
	layer.style.display = 'block';
	layer.style.left = (x + 10) + 'px';
	layer.style.top = (y + 10) + 'px';
}
function cmentModify(id,cuid,e)
{
	if ((memberid && memberid == id) || is_admin != '')
	{
		return true;
	}
	else {
		layerOpen(e);
		var f = document.checkForm;
		f.target = '';
		f.a.value = '';
		f.type.value = 'modify';
		f.uid.value = cuid;
		f.pw.focus();
		return false;
	}
}
function cmentHidden(id,cuid,e)
{
	if ((memberid && memberid == id) || is_admin != '')
	{
		return true;
	}
	else {
		layerOpen(e);
		var f = document.checkForm;
		f.target = '';
		f.a.value = '';
		f.type.value = '';
		f.uid.value = cuid;
		f.pw.focus();
		return false;
	}
}
function cmentDel(id,cuid,e)
{
	if ((memberid && memberid == id) || is_admin != '')
	{
		return confirm('정말 삭제하시겠습니까?    ');
	}
	else {
		layerOpen(e);
		var f = document.checkForm;
		f.target = '_action_frame_' + moduleid;
		f.a.value = 'delete';
		f.type.value = '';
		f.uid.value = cuid;
		f.pw.focus();
		return false;
	}
}
function cmentDelClose()
{
	getId('pwbox').style.display = 'none';
}
function permCheck(f)
{
	if (checkFlag == true)
	{
		alert('확인중입니다. 잠시만 기다려 주세요.   ');
		return false;
	}
	
	if (f.pw.value == '')
	{
		alert('비밀번호를 입력해 주세요.   ');
		f.pw.focus();
		return false;
	}
	checkFlag = true;
}
function oneline_reply(uid)
{	
	$('div.wbox').slideUp();
	$('a:contains("답글취소")').html('답글달기');
	var display = $('div.replybox'+uid).css('display');
	if (display == 'block') {
		$('div.replybox'+uid).slideUp();
		frameSetting();
	} else {
		$('div.replybox'+uid).slideDown();
		$('a.replybtn_'+uid).html('답글취소');
		frameSetting();
	}
}
function onelineOpen(uid)
{
	var x = getId('onelinebox' + uid);
	if (x.style.display != 'block')
	{
		x.style.display = 'block';
	}
	else
	{
		x.style.display = 'none';
	}

	frameSetting();
}
function oneline_comment_flag()
{
	if (oResizeFlag == false)
	{
		$('#oneline_comment').height('200px');
		getId('oneline_comment_str').innerHTML = '입력상자 줄이기';
		oResizeFlag = true;
	}
	else
	{
		getId('oneline_comment').style.height = '28px';
		getId('oneline_comment_str').innerHTML = '입력상자 늘리기';
		oResizeFlag = false;
	}

	frameSetting();
}
function oneDel(id)
{
	if ((memberid && memberid == id) || is_admin != '')
	{
		return confirm('정말 삭제하시겠습니까?    ');
	}
	else {
		alert('삭제권한이 없습니다.    ');
		return false;
	}
}
function oneCheck(f)
{
	if (memberid == '')
	{
		alert('로그인하셔야 이용하실 수 있습니다.');
		return false;
	}
	if (f.content.value == '')
	{
		alert('내용을 입력해 주세요.    ');
		f.content.focus();
		return false;
	}
}


// write
var submitFlag = false;
function commentLogin()
{
	var uexp = location.href.split('#CMT');
	OpenWindow(rooturl + '/?r='+raccount+'&system=popup.login&iframe=Y&referer=' + escape(uexp[0]));
}
function writeCheck(f)
{
	if (submitFlag == true)
	{
		alert('댓글을 등록하고 있습니다. 잠시만 기다려 주세요.');
		return false;
	}
	if (f.notice && f.hidden)
	{
		if (f.notice.checked == true && f.hidden.checked == true)
		{
			alert('공지글은 비밀글로 등록할 수 없습니다.  ');
			f.hidden.checked = false;
			return false;
		}
	}

	if (f.name && f.name.value == '')
	{
		alert('이름을 입력해 주세요. ');
		f.name.focus();
		return false;
	}

	if (f.pw && f.pw.value == '')
	{
		alert('비밀번호를 입력해 주세요. ');
		f.pw.focus();
		return false;
	}

	if (f.subject && f.subject.value == '')
	{
		alert('제목을 입력해 주세요.      ');
		f.subject.focus();
		return false;
	}

	if (f.content.value == '')
	{
		alert('내용을 입력해 주세요.       ');
		frames.editFrame.getEditFocus();
		return false;
	}
	if (getId('upfilesFrame'))
	{
		frames.upfilesFrame.dragFile();
	}

	submitFlag = true;
}

function mbrLayerMove()
{
	getId('_action_layer_').style.left = (parseInt(getId('_action_layer_').style.left) + 50) + 'px';
}

// Autosize 1.6 - jQuery plugin for textareas
// (c) 2011 Jack Moore - jacklmoore.com
// license: www.opensource.org/licenses/mit-license.php
(function(a,b){var c="hidden",d='<textarea style="position:absolute; top:-9999px; left:-9999px; right:auto; bottom:auto; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden">',e=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing"],f="oninput",g="onpropertychange",h=a(d)[0];h.setAttribute(f,"return"),a.isFunction(h[f])||g in h?a.fn.autosize=function(b){return this.each(function(){function o(){var a,b;m||(m=!0,j.value=h.value,j.style.overflowY=h.style.overflowY,j.style.width=i.css("width"),j.scrollTop=0,j.scrollTop=9e4,a=j.scrollTop,b=c,a>l?(a=l,b="scroll"):a<k&&(a=k),h.style.overflowY=b,h.style.height=h.style.minHeight=h.style.maxHeight=a+"px",setTimeout(function(){m=!1},1))}var h=this,i=a(h).css({overflow:c,overflowY:c,wordWrap:"break-word"}),j=a(d).addClass(b||"autosizejs")[0],k=i.height(),l=parseInt(i.css("maxHeight"),10),m,n=e.length;l=l&&l>0?l:9e4;while(n--)j.style[e[n]]=i.css(e[n]);a("body").append(j),g in h?f in h?h[f]=h.onkeyup=o:h[g]=o:h[f]=o,a(window).resize(o),i.bind("autosize",o),o()})}:a.fn.autosize=function(){return this}})(jQuery);

$(document).ready(function(){
    $('textarea').autosize();   
});
