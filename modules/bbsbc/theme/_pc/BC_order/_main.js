var submitFlag = false;
function ToolCheck(compo)
{
	frames.editFrame.showCompo();
	frames.editFrame.EditBox(compo);
}
function writeCheck(f)
{
	if (submitFlag == true)
	{
		alert('게시물을 등록하고 있습니다. 잠시만 기다려 주세요.');
		return false;
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

	if (f.category && f.category.value == '')
	{
		alert('분류를 선택해 주세요. ');
		f.category.focus();
		return false;
	}
	if (f.subject.value == '')
	{
		alert('제목을 입력해 주세요.      ');
		f.subject.focus();
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
	if (f.add_txt1 && f.add_txt1.value == '')
	{
		alert('번호를 선택해 주세요. ');
		f.add_txt1.focus();
		return false;
	}
	if (f.add_txt2 && f.add_txt2.value == '')
	{
		alert('번호을 입력해 주세요. ');
		f.add_txt2.focus();
		return false;
	}
	if (f.add_txt3 && f.add_txt3.value == '')
	{
		alert('번호을 입력해 주세요. ');
		f.add_txt3.focus();
		return false;
	}
	if (f.add_txt4 && f.add_txt4.value == '')
	{
		alert('이메일을 입력해 주세요. ');
		f.add_txt4.focus();
		return false;
	}
	if (f.add_txt5 && f.add_txt5.value == '')
	{
		alert('이메일을 입력 또는 선택해 주세요. ');
		f.add_txt5.focus();
		return false;
	}
	if (f.agreecheckbox1.checked == false)
	{
		alert('개인정보 수집의 목적 및 활용동의에 동의하셔야 합니다.');
		return false;
	}
	if (f.agreecheckbox2.checked == false)
	{
		alert('개인정보 제3자 제공 및 공유안내에 동의하셔야 합니다.');
		return false;
	}
	
	if (f.content && f.content.value == '')
	{
		alert('내용을 입력해 주세요. ');
		f.content.focus();
		return false;
	}

	if (getId('upfilesFrame'))
	{
		frames.upfilesFrame.dragFile();
	}

	if (f.trackback)
	{

	}

    alert('정상적으로 접수되었습니다.');
	submitFlag = true;
}
function cancelCheck()
{
	if (confirm('정말 취소하시겠습니까?    '))
	{
		history.back();
	}
}

