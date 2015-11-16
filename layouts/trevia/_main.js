
function showM(m)
{
	var box = getId('subMenuBox'+m);
	if(box){
		box.style.display = 'block';
	}
}
function hideM(m)
{
	var box = getId('subMenuBox'+m);
	if(box){
		box.style.display = 'none';
	}
}

function layoutLogCheck(f)
{
	if (f.id.value == '')
	{
		alert('아이디를 입력해 주세요.');
		f.id.value='';
		f.id.focus();
		return false;
	}
	if (f.pw.value == '')
	{
		alert('패스워드를 입력해 주세요.');
		f.pw.value='';
		f.pw.focus();
		return false;
	}
}
function layoutRMBpw(ths)
{
	if (ths.checked == true)
	{
		if (!confirm('\n\n패스워드정보를 저장할 경우 다음접속시 \n\n패스워드를 입력하지 않으셔도 됩니다.\n\n그러나, 개인PC가 아닐 경우 타인이 로그인할 수 있습니다.     \n\nPC를 여러사람이 사용하는 공공장소에서는 체크하지 마세요.\n\n정말로 패스워드를 기억시키겠습니까?\n\n'))
		{
			ths.checked = false;
		}
	}
}
