var submitFlag = false;
function ToolCheck(compo)
{
	frames.editFrame.showCompo();
	frames.editFrame.EditBox(compo);
}
function ToolCheck2(compo)
{
	frames.editFrame2.showCompo();
	frames.editFrame2.EditBox(compo);
}
function ToolCheck3(compo)
{
	frames.editFrame3.showCompo();
	frames.editFrame3.EditBox(compo);
}
/*function ToolCheck4(compo)
{
	frames.editFrame4.showCompo();
	frames.editFrame4.EditBox(compo);
}*/
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
	frames.editFrame.getEditCode(f.content,f.html);
	frames.editFrame2.getEditCode(f.content2,f.html2);
	frames.editFrame3.getEditCode(f.content3,f.html3);
	/*frames.editFrame4.getEditCode(f.content4,f.html4);*/

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

	submitFlag = true;
}
function cancelCheck()
{
	if (confirm('정말 취소하시겠습니까?    '))
	{
		history.back();
	}
}

function updateCategory(target)
{
	var category1, category2, category3;
	category1 = document.getElementById("category1");
	category2 = document.getElementById("category2");
	category3 = document.getElementById("category3");

	if(target == "category2")
	{
		var nSel = category1.selectedIndex;
		
		// 기존 내용 삭제
		category2.options.length = 0;

		// 선택된 하위내용 추가
		for(var i = 1; i < g_category[nSel].length; i++)
		{
			var newOption = new Option(g_category[nSel][i][0], g_category[nSel][i][0], false, false);
			category2.options[category2.options.length] = newOption;
		}
	}

	if(target == "category3")
	{
		var nSel1 = category1.selectedIndex;
		var nSel2 = category2.selectedIndex + 1;
		
		// 기존 내용 삭제
		category3.options.length = 0;

		// 선택된 하위내용 추가
		for(var i = 1; i < g_category[nSel1][nSel2].length; i++)
		{
			var newOption = new Option(g_category[nSel1][nSel2][i], g_category[nSel1][nSel2][i], false, false);
			category3.options[category3.options.length] = newOption;
		}
	}
}


$(document).ready(function()
{
	$(".tooltip").tooltip({"delay":0, "showURL":false, "opacity": 0.95, "showBody":"\n"});
});