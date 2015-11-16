

// view
var checkFlag = false;
var oResizeFlag = false;
function layerOpen(e)
{

	var x = myagent != 'ie' ? e.pageX : event.x+(document.body.scrollLeft || document.documentElement.scrollLeft);
	var y = myagent != 'ie' ? e.pageY : event.y+(document.body.scrollTop || document.documentElement.scrollTop);
	
	var layer = getId('pwbox');
	
	layer.style.display = 'block';
	layer.style.left = (x - 300) + 'px';
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

	frames.editFrame.getEditCode(f.content,f.html);
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

function get_mouse(e) 
{
    var x = myagent != 'ie' ? e.pageX : event.x+(document.body.scrollLeft || document.documentElement.scrollLeft);
    var y = myagent != 'ie' ? e.pageY : event.y+(document.body.scrollTop || document.documentElement.scrollTop);
    skn.style.left = (x - 0) + 'px';
    skn.style.top  = (y + 20) + 'px';
}