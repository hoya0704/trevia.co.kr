

// view
var checkFlag = false;
var oResizeFlag = false;
function layerOpen(e)
{
	var x = myagent != 'ie' ? e.pageX : event.x+(document.body.scrollLeft || document.documentElement.scrollLeft);
	var y = myagent != 'ie' ? e.pageY : event.y+(document.body.scrollTop || document.documentElement.scrollTop);
	var layer = getId('pwbox');
	
	layer.style.display = 'block';
	layer.style.left = (x - 350) + 'px';
	layer.style.top = (y + 20) + 'px';
}
function cmentModify(id,e)
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
		f.pw.focus();
		return false;
	}
}
function cmentDel(id,e)
{
	if ((memberid && memberid == id) || is_admin != '')
	{
		return confirm('정말 삭제하시겠습니까?    ');
	}
	else
	{
		alert('권한이 없습니다.');
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
function oneline_comment_flag()
{
	if (oResizeFlag == false)
	{
		getId('oneline_comment').style.height = '200px';
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

	//frames.editFrame.getEditCode(f.content,f.html);
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

// list
function qTilePop(obj)
{
    var content ='<div style="width:300px;line-height:150%;font-family:dotum;color:#666666;border:#999999 solid 1px;padding:3px;background:lightyellow;">'+obj.title+'</div>';
	skn.style.position= 'absolute';
	skn.style.display = 'block';
	skn.style.zIndex = '1';
	itt = obj.title;
	obj.title = '';
	skn.innerHTML = content;
}
function get_mouse(e) 
{
    var x = myagent != 'ie' ? e.pageX : event.x+(document.body.scrollLeft || document.documentElement.scrollLeft);
    var y = myagent != 'ie' ? e.pageY : event.y+(document.body.scrollTop || document.documentElement.scrollTop);
    skn.style.left = (x - 0) + 'px';
    skn.style.top  = (y + 20) + 'px';
}
function qTilePopKill(obj) 
{
	obj.title = itt;
	itt = '';
	skn.style.top = '10000';
	skn.style.display = 'none';
}

function doReply(id)
{
	var wbox = document.getElementById("wbox_" + id);

	if(wbox)
	{
		wbox.style.display = "block";
	}

	frameSetting();
}

function clearForm(obj)
{
	if(obj.innerHTML == "견적을 요청하실때는 여행인원수 / 출발일과 숙박일수 / 희망항공사 / 리조트명 / 대략의 예산/기타 사항을 입력해주세요.\n상세하고 빠른 견적을 원하실때는 좌측 일대일 예약 요청을 이용하시는 것도 좋습니다.")
		obj.innerHTML='';
	obj.style.color='#000';
}


function needLogin(obj)
{
	alert("로그인 후 이용하실 수 있습니다.");
	obj.blur();
	return false;
}