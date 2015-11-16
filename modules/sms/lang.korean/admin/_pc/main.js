// 문자
function presetChange(obj)
{
	if(obj.value == "롯데시네마 영화관람권")
		document.smsForm.smsText.value = "[롯데시네마 영화관람권]\n일련번호 : xxx-xx-xxx-xxxx\n비밀번호 : xxxxxxxx\n대상 : (직접 작성하시면됩니다.)\n기간 : 2013년 12월 31일까지\n         (해당 기간 상영영화 기준)\n오프라인 사용방법\n - 현장에서 영화예매시 해당문자제시\n온라인 사용방법\n - 홈페이지접속>로그인>마이롯데시네마\n   >쿠폰/관람권/할인권>관람권등록\n   >일련번호, 비밀번호 입력 후 등록\n   >영화예매시 결제수단으로 선택 후 결제\n※ 유의사항\n - 3D, 4D, AURA, V-SEAT좌석, 샤롯데\n   프레스티지관 사용불가\n - 조조, 심야 사용불가";
	else
		document.smsForm.smsText.value = obj.value;
	OntextCheck(document.smsForm.smsText);
}

function toggleAllMemers(f)
{
	var l = document.getElementsByName(f);
    var n = l.length;
    var i;

    for (i = 0; i < n; i++)
	{
		l[i].checked = !l[i].checked;
		toggleMember(l[i]);
	}
}

// 검색된 회원 추가
function toggleMember(obj)
{
	var tr = obj.parentNode.parentNode;
	var tds = tr.getElementsByTagName("td");
	var name = tds[2].innerHTML;
	var cp = tds[6].innerHTML;
	var memberuid = tds[7].innerHTML;

	var listBox = document.smsForm.numberList;
	var optText = name + "\t" + cp;// + "\t(" + memberuid + ")";
	var optVal = cp.replace(/-/gi,"");// + "||" + memberuid;

	if(obj.checked)
	{
		listBox.options[listBox.options.length] = new Option(optText,optVal);
	}
	else
	{
		for(var i = 0; i < listBox.options.length; i++)
		{
			if(listBox.options[i].value == optVal)
			{
				listBox.options[i] = null;
			} // end if
		}// end for
	}

	updateCount();
}

// 카운트 업데이트
function updateCount()
{	
	var listBox = document.smsForm.numberList;
	document.getElementById("countText").innerHTML = "총 " + listBox.options.length + "명";
}

// 수동 번호 입력 추가
function addCustomNumber()
{
	var input = document.getElementsByName("custom_number")[0];
	var listBox = document.smsForm.numberList;

	var optText = "*임의\t" + input.value.replace(/-/gi,"").replace(/^([0-9]{3})([0-9]{4})([0-9]{4})/,function($1,$2,$3,$4){return $2+"-"+$3+"-"+$4});
	var optVal = input.value.replace(/-/gi,"");
	listBox.options[listBox.options.length] = new Option(optText,optVal);

	input.value = "";

	updateCount();
}

// 더블클릭 이벤트, 선택된 아이템 삭제
function deleteSelected(listBox)
{
	var curSel = listBox.options.selectedIndex;

	listBox.options[curSel] = null;

	updateCount();
}

// 받을번호 listbox 에서 join
function joinCP()
{
	var form = document.smsForm;
	var listbox = form.numberList;

	// 배열로 변환 후 join
	var arrOpt = new Array();
	for(var i = 0; i < listbox.options.length; i++) arrOpt[i] = listbox.options[i].value;
	form.cpnumber.value = arrOpt.join();
}

// form Validation
function preSubmit()
{
	var form = document.smsForm;
	
	if (form.smsText.value == "" || form.numberList.options.length < 1) return false;


	joinCP();
	return true;
}


// 회원 리스트
function dropDate(date1,date2)
{
	var f = document.procForm;
	f.year1.value = date1.substring(0,4);
	f.month1.value = date1.substring(4,6);
	f.day1.value = date1.substring(6,8);
	
	f.year2.value = date2.substring(0,4);
	f.month2.value = date2.substring(4,6);
	f.day2.value = date2.substring(6,8);

	f.submit();
}

// SMS 문자 길이 계산
function OntextCheck(obj)
 {
    var str = new String(obj.value);
	var _byte = 0;
	if(str.length != 0)
	{
		for (var i=0; i < str.length; i++) 
		{
			var str2 = str.charAt(i);
			if(escape(str2).length > 4)
			{
				_byte += 2;
			}
			else 
			{
				_byte++;
			}
		}
	}

	var issms = document.getElementById("issms");
	var xms = document.getElementById("xms");
	if(_byte > 80)
	{
		issms.innerHTML = "MMS";
		issms.style.color="red";
		issms.style.fontWeight="bold";
		xms.value = "mms";
	}
	else
	{
		issms.innerHTML = "SMS";
		issms.style.color="black";
		issms.style.fontWeight="normal";
		xms.value = "sms";
	}

	document.getElementById("totalBytes").innerHTML = _byte + " / 80 bytes";
	return true;
 }