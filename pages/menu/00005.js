function checkFile(file)
{	
	var chk_num = 0; 
	var type = new Array('jpg','png','pdf','doc','docx','xls','xlsx','ppt','pptx','zip','rar','alz','hwp','gul','txt');

	name = file.value
	f_name = name.substring(name.lastIndexOf("\\")+1);
	f_type = name.substring(name.lastIndexOf(".")+1);
	for(var i=0;i<type.length;i++)
	{
		if(f_type==type[i]||f_type=="")
		{
			chk_num++;
		}
	}
	if(chk_num==0)
	{
		//alert("허용하지 않는 확장자입니다.\n["+upload_type+"] 만 가능합니다.");
		alert("첨부 할 수 없는 파일 형식 입니다.");
		obj = file;
		obj.outerHTML = obj.outerHTML;//--------에러발생하면 선택내용 삭제
		return;
	}
}

//-----------
function SendFormCheck(form) {
	var format = /^((\w|[\-\.])+)@((\w|[\-\.])+)\.([A-Za-z]+)$/;
	
	if(form.site.value == '') {
	   alert("제휴 희망 사이트를 선택 해주세요.");
	   form.site.focus();
	   return false;
	}

	if(form.site2.value=='') {
	   alert("제휴 구분을 선택 해주세요.");
	   form.site2.focus();
	   return false;
	}

	if(form.subject.value=='') {
	   alert("제목을 입력해 주십시오.");
	   form.subject.focus();
	   return false;
	}

	if(form.content.value=='') {
	   alert("내용을 입력해 주세요.");
	   form.content.focus();
	   return false;
	}

	if(form.company.value=='') {
	   alert("회사(기관)명을 입력해주세요.");
	   form.company.focus();
	   return false;
	}

	if(form.from_name.value=='') {
	   alert("제안자명을 입력해주세요.");
	   form.from_name.focus();
	   return false;
	}

	if(form.tel.value=='') {
	   alert("전화번호를 입력해주세요.");
	   form.tel.focus();
	   return false;
	}
	
	if( form.from.value == '' ) {
		alert('메일을 입력 해주세요.');
		form.from.focus();
		return false;
	}else{
		if (form.from.value.search(format)  == -1) {
			alert('메일을 정확히 입력 해주세요.');
			form.from.outerHTML = form.from.outerHTML;
			form.from.focus();
			return false;
		}
	}
	
	
	return true;
}
