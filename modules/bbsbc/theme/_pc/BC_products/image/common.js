
function setSubSelect(fm,sub_value)
{

	var s_value = sub_value.value;
	for (i = fm.add_txt3.options.length; i >= 0; i--) 
	{
		fm.add_txt3.options[i] = null; 
	}

	
	if (s_value=="" && sub_value=="")
	{
		fm.add_txt3.options[0] = new Option("선택하세요")
		fm.add_txt3.options[0].value=""
		
	}
	else if (s_value == "직접입력"){
		fm.add_txt3.options[0] = new Option("직접입력");
		fm.add_txt3.options[0].value="직접입력";
		fm.add_txt4.style.display=''
	}
	else if (s_value=="멕시코")
	{
		fm.add_txt3.options[0] = new Option("칸쿤")
		fm.add_txt3.options[0].value="칸쿤"
		fm.add_txt3.options[1] = new Option("리비에라마야")
		fm.add_txt3.options[1].value="리비에라마야"

	}
	else if (s_value=="몰디브")
	{
		fm.add_txt3.options[0] = new Option("국내선")
		fm.add_txt3.options[0].value = "국내선"
		fm.add_txt3.options[1] = new Option("수상비행기")
		fm.add_txt3.options[1].value = "수상비행기"
		fm.add_txt3.options[2] = new Option("스피드보트")
		fm.add_txt3.options[2].value = "스피드보트"
		
	}

	else if (s_value=="모리셔스")
	{
		fm.add_txt3.options[0] = new Option("모리셔스")
		fm.add_txt3.options[0].value = "모리셔스"

	}
	else if (s_value=="세이셸")
	{
		fm.add_txt3.options[0] = new Option("세이셸")
		fm.add_txt3.options[0].value = "세이셸"

	}
	else if (s_value=="인도네시아")
	{
		fm.add_txt3.options[0] = new Option("발리")
		fm.add_txt3.options[0].value = "발리"
		fm.add_txt3.options[1] = new Option("롬복")
		fm.add_txt3.options[1].value = "롬복"

	}
	else if (s_value=="태국")
	{
		fm.add_txt3.options[0] = new Option("코사무이")
		fm.add_txt3.options[0].value = "코사무이"
		fm.add_txt3.options[1] = new Option("푸켓")
		fm.add_txt3.options[1].value = "푸켓"
		fm.add_txt3.options[2] = new Option("방콕")
		fm.add_txt3.options[2].value = "방콕"

	}
	
	else if (s_value=="하와이")
	{
		fm.add_txt3.options[0] = new Option("하와이")
		fm.add_txt3.options[0].value = "하와이"

	}
	
	else if (s_value=="미주")
	{
		fm.add_txt3.options[0] = new Option("미주")
		fm.add_txt3.options[0].value="미주"

	}
	else if (s_value=="베트남")
	{
		fm.add_txt3.options[0] = new Option("다낭")
		fm.add_txt3.options[0].value = "다낭"
		fm.add_txt3.options[1] = new Option("호치민")
		fm.add_txt3.options[1].value = "호치민"
		fm.add_txt3.options[2] = new Option("하노이")
		fm.add_txt3.options[2].value = "하노이"

	}


}

// 2단 셀렉트 박스
Array.prototype.get = function(index)
{ 
	return this[index]; 
} 


Array.prototype.set = function(object)
{ 
	this[this.length] = object; 
} 


Coditech = new Object();
Coditech.Version="1.0.0.0";
Coditech.Framework = new Object(); 


Coditech.Framework.Category = function(name,value)
{
	var _name = name;
	var _value = value;
	var _subcategory = new Array(); 


	this.getName = function(){return _name;}
	this.getValue = function(){ return _value;}
	this.add = function(name,value)
	{
		_subcategory.set(new Coditech.Framework.Category(name,value)); 
	} 


	this.get = function(index)
	{
		return _subcategory.get(index);
	} 


	this.length = function(){ return _subcategory.length;}
} 


function addCategory(category,name,value)
{
	category.add(name,value);
} 


function initialize()
{
	var defaultForm = document.getElementById("writeForm");
	if (null != defaultForm)
	{
		createOption(defaultForm.category, CATEGORY_NODE);
		createOption(defaultForm.add_txt8, CATEGORY_NODE.get(0));
	}
} 


function clearSelectBox(selectBox)
{
	if (null == selectBox || null == selectBox.options){
	return;
	}
	var length = selectBox.options.length;
	for (var index=0;index<length ;index++){ selectBox.options.remove(0); }
} 


function createOption(selectBox,category)
{
	if (null == category) return; 

	clearSelectBox(selectBox); 

	for (var index=0;index<category.length(); index++)
	{
		var c = category.get(index);
		var option = new Option(); 

		option.value = c.getName();
		option.text = c.getValue(); 

	selectBox.options.add(option);
	}
} 


