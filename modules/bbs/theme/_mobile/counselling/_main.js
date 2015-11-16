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
	
	var name = parent.document.getElementById("name");
	if (name.value == '')
	{
		alert('고객명을 입력해 주세요. ');
		name.focus();
		return false;
	}

	var name = parent.document.getElementById("email");
	if(email && email.value == '')
	{
		re=/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;

		if(email.value.length<6 || !re.test(email.value))
		{
			alert("메일형식이 맞지 않습니다.");
			email.value="";
			email.focus();
			return false;
		}
	}

	var cellphone1 = parent.document.getElementById("cellphone1");
	var cellphone2 = parent.document.getElementById("cellphone2");
	var cellphone3 = parent.document.getElementById("cellphone3");
	if (cellphone1.value == '')
	{
		alert('휴대폰번호를 입력해주세요.');
		cellphone1.focus();
		return false;
	}
	if (cellphone2.value == '')
	{
		alert('휴대폰번호를 입력해주세요.');
		cellphone2.focus();
		return false;
	}
	if (cellphone3.value == '')
	{
		alert('휴대폰번호를 입력해주세요.');
		cellphone3.focus();
		return false;
	}

	var person_count = parent.document.getElementById("person_count");
	if (person_count.value == '')
	{
		alert('총 여행인원을 입력해주세요.');
		person_count.focus();
		return false;
	}

	var start_date = parent.document.getElementById("start_date");
	if (start_date.value == '')
	{
		alert('출발날짜를 입력해주세요.');
		start_date.focus();
		return false;
	}
	
	/*if (f.subject.value == '')
	{
		f.subject.value = f.name.value + "님의 견적상담 요청입니다.";
	}*/

	
	//frames.editFrame.getEditCode(f.content,f.html);
	/*if (f.content.value == '')
	{
		alert('내용을 입력해 주세요.       ');
		frames.editFrame.getEditFocus();
		return false;
	}*/

	if (getId('upfilesFrame'))
	{
		frames.upfilesFrame.dragFile();
	}

	if (f.trackback)
	{

	}

	submitFlag = true;
}
function cancelCheck()
{
	if (confirm('정말 취소하시겠습니까?    '))
	{
		history.back();
	}
}