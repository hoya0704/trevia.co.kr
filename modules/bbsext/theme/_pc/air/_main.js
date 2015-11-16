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

	if (f.trackback)
	{

	}

	
	
f.add11.value = f.add11_1.value+"||"+f.add11_2.value+"||"+f.add11_3.value+"||"+f.add11_4.value+"||"+f.add11_5.value+"||"+f.add11_6.value;
f.add12.value = f.add12_1.value+"||"+f.add12_2.value+"||"+f.add12_3.value+"||"+f.add12_4.value+"||"+f.add12_5.value+"||"+f.add12_6.value;
f.add13.value = f.add13_1.value+"||"+f.add13_2.value+"||"+f.add13_3.value+"||"+f.add13_4.value+"||"+f.add13_5.value+"||"+f.add13_6.value;
f.add14.value = f.add14_1.value+"||"+f.add14_2.value+"||"+f.add14_3.value+"||"+f.add14_4.value+"||"+f.add14_5.value+"||"+f.add14_6.value;
f.add15.value = f.add15_1.value+"||"+f.add15_2.value+"||"+f.add15_3.value+"||"+f.add15_4.value+"||"+f.add15_5.value+"||"+f.add15_6.value;
f.add16.value = f.add16_1.value+"||"+f.add16_2.value+"||"+f.add16_3.value+"||"+f.add16_4.value+"||"+f.add16_5.value+"||"+f.add16_6.value;
f.add17.value = f.add17_1.value+"||"+f.add17_2.value+"||"+f.add17_3.value+"||"+f.add17_4.value+"||"+f.add17_5.value+"||"+f.add17_6.value;
f.add18.value = f.add18_1.value+"||"+f.add18_2.value+"||"+f.add18_3.value+"||"+f.add18_4.value+"||"+f.add18_5.value+"||"+f.add18_6.value;

f.add21.value = f.add21_1.value+"||"+f.add21_2.value+"||"+f.add21_3.value+"||"+f.add21_4.value+"||"+f.add21_5.value+"||"+f.add21_6.value;
f.add22.value = f.add22_1.value+"||"+f.add22_2.value+"||"+f.add22_3.value+"||"+f.add22_4.value+"||"+f.add22_5.value+"||"+f.add22_6.value;
f.add23.value = f.add23_1.value+"||"+f.add23_2.value+"||"+f.add23_3.value+"||"+f.add23_4.value+"||"+f.add23_5.value+"||"+f.add23_6.value;
f.add24.value = f.add24_1.value+"||"+f.add24_2.value+"||"+f.add24_3.value+"||"+f.add24_4.value+"||"+f.add24_5.value+"||"+f.add24_6.value;
f.add25.value = f.add25_1.value+"||"+f.add25_2.value+"||"+f.add25_3.value+"||"+f.add25_4.value+"||"+f.add25_5.value+"||"+f.add25_6.value;
f.add26.value = f.add26_1.value+"||"+f.add26_2.value+"||"+f.add26_3.value+"||"+f.add26_4.value+"||"+f.add26_5.value+"||"+f.add26_6.value;
f.add27.value = f.add27_1.value+"||"+f.add27_2.value+"||"+f.add27_3.value+"||"+f.add27_4.value+"||"+f.add27_5.value+"||"+f.add27_6.value;
f.add28.value = f.add28_1.value+"||"+f.add28_2.value+"||"+f.add28_3.value+"||"+f.add28_4.value+"||"+f.add28_5.value+"||"+f.add28_6.value;
f.add29.value = f.add29_1.value+"||"+f.add29_2.value+"||"+f.add29_3.value;



submitFlag = true;
}
function cancelCheck()
{
	if (confirm('정말 취소하시겠습니까?    '))
	{
		history.back();
	}
}