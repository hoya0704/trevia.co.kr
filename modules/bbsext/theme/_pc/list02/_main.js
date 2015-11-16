(function($) {
 $.fn.toPrice = function(cipher) {
  var strb, len, revslice,minus;
  minus='';
  strb = $(this).val().toString();
  if(strb.charAt(0)=='-')
	  minus=strb.charAt(0);
  strb = strb.replace(/-,/g, '');
  strb = $(this).getOnlyNumeric();
  strb = parseInt(strb, 10);
  if(isNaN(strb)){
   return $(this).val(minus+'');
  }
  strb = strb.toString();
  len = strb.length;

  if(len < 4){
   return $(this).val(minus+strb);
  }
  if(cipher == undefined || !isNumeric(cipher))
   cipher = 3;

  count = len/cipher;
  slice = new Array();

  for(var i=0; i<count; ++i) {
   if(i*cipher >= len)
    break;
   slice[i] = strb.slice((i+1) * -cipher, len - (i*cipher));
  }

  revslice = slice.reverse();
  return $(this).val(minus+revslice.join(','));
 }

 $.fn.getOnlyNumeric = function(data) {
  var chrTmp, strTmp;
  var len, str;

  if(data == undefined) {
   str = $(this).val();
  }
  else {
   str = data;
  }

  len = str.length;
  strTmp = '';

  for(var i=0; i<len; ++i) {
   chrTmp = str.charCodeAt(i);
   if((chrTmp > 47 || chrTmp <= 31) && chrTmp < 58) {
    strTmp = strTmp + String.fromCharCode(chrTmp);
   }
  }

  if(data == undefined)
   return strTmp;
  else
   return $(this).val(strTmp);
 }

 var isNumeric = function(data) {
  var len, chrTmp;

  len = data.length;
  for(var i=0; i<len; ++i) {
   chrTmp = str.charCodeAt(i);
   if((chrTmp <= 47 && chrTmp > 31) || chrTmp >= 58) {
    return false;
   }
  }

  return true;
 }
})(jQuery);

function delResort( trid ) {
	var c = 16 + trid * 1;
	var d = trid * 6 + 1;
	var e = trid * 6 + 2;
	var f = trid * 6 + 6;
	document.getElementById("resort"+trid).style.display="none";
	document.getElementById("add8_"+d).value = "";
	document.getElementById("add8_"+e).value = "";
	document.getElementById("add8_"+f).value = "";
	document.getElementById("datepicker"+c).value = "";

}

function addResort() {
	var i = 0;

	while( i < 10 )
	{
		if( document.getElementById("resort"+i).style.display == "none" )
		{
			document.getElementById("resort"+i).style.display = ""
			return;
		}
		i++;
	}
}

function delAir( trid ) {
	var d = trid * 6;
	document.getElementById("air"+trid).style.display="none";
	document.getElementById("add6_"+(d+1)).value = "";
	document.getElementById("add6_"+(d+2)).value = "";
	document.getElementById("add6_"+(d+3)).value = "";
	document.getElementById("add6_"+(d+4)).value = "";
	document.getElementById("add6_"+(d+5)).value = "";
	document.getElementById("add6_"+(d+6)).value = "";
	document.getElementById("add6_"+(d+7)).value = "";
	document.getElementById("add6_"+(d+8)).value = "";
	document.getElementById("add6_"+(d+9)).value = "";

}

function addAir() {
	var i = 0;

	while( i < 10 )
	{
		if( document.getElementById("air"+i).style.display == "none" )
		{
			document.getElementById("air"+i).style.display = ""
			return;
		}
		i++;
	}
}

function showType( trid, btnid ) {
	document.getElementById(trid).style.display="";
	document.getElementById(btnid).style.display="none";
}

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
	if (f.category && f.category.value == '')
	{
		alert('분류를 선택해 주세요. ');
		f.category.focus();
		return false;
	}
	if (f.add2_8.value == '')
	{
		alert('출발일을 입력해 주세요.      ');
		f.add2_8.focus();
		return false;
	} 
	if (f.add3_2.value == '')
	{
		alert('고객명을 입력해 주세요.      ');
		f.add3_2.focus();
		return false;
	} 
	if (f.add3_5.value == '')
	{
		alert('전화번호을 입력해 주세요.      ');
		f.add3_5.focus();
		return false;
	} 
	if (f.add3_6.value == '')
	{
		alert('이메일을 입력해 주세요.      ');
		f.add3_6.focus();
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
/*	if (f.content.value == '')
	{
		alert('내용을 입력해 주세요.       ');
		frames.editFrame.getEditFocus();
		return false;
	}
*/
	if (getId('upfilesFrame'))
	{
		frames.upfilesFrame.dragFile();
	}

	if (f.trackback)
	{

	}

/*추가부분*/
f.add1.value= f.add1_1.value+"||"+f.add1_2.value+"||"+f.add1_3.value+"||"+f.add1_4.value+"||"+f.add1_5.value+"||"+f.add1_6.value+"||"+f.add1_7.value+"||"+f.add1_8.value;

for ( var i  = 0;i < f.add2_1.length ; i++)
{
	if (f.add2_1[i].checked == true) break;
}

for ( var j  = 0;j < f.add2_5.length ; j++)
{
	if (f.add2_5[j].checked == true) break;
}


f.add2.value= f.add2_1[i].value+"||"+f.add2_2.value+"||"+f.add2_3.value+"||"+f.add2_4.value+"||"+f.add2_5[j].value+"||"+f.add2_6.value+"||"+f.add2_7.value+"||"+f.add2_8.value+"||"+f.add2_9.value+"||"+f.add2_10.value;
f.add3.value= f.add3_1.value+"||"+f.add3_2.value+"||"+f.add3_3.value+"||"+f.add3_4.value+"||"+f.add3_5.value+"||"+f.add3_6.value+"||"+f.add3_7.value+"||"+f.add3_8.value+"||"+f.add3_9.value+"||"+f.add3_10.value+"||"+f.add3_11.value+"||"+f.add3_12.value+"||"+f.add3_13.value+"||"+f.add3_14.value+"||"+f.add3_15.value+"||"+f.add3_16.value+"||"+f.add3_17.value+"||"+f.add3_18.value+"||"+f.add3_19.value+"||"+f.add3_20.value+"||"+f.add3_21.value+"||"+f.add3_22.value+"||"+f.add3_23.value+"||"+f.add3_24.value+"||"+f.add3_25.value+"||"+f.add3_26.value+"||"+f.add3_27.value+"||"+f.add3_28.value+"||"+f.add3_29.value+"||"+f.add3_30.value+"||"+f.add3_31.value+"||"+f.add3_32.value+"||"+f.add3_33.value+"||"+f.add3_34.value+"||"+f.add3_35.value+"||"+f.add3_36.value+"||"+f.add3_37.value+"||"+f.add3_38.value+"||"+f.add3_39.value+"||"+f.add3_40.value+"||"+f.add3_41.value+"||"+f.add3_42.value+"||"+f.add3_43.value+"||"+f.add3_44.value+"||"+f.add3_45.value+"||"+f.add3_46.value+"||"+f.add3_47.value+"||"+f.add3_48.value+"||"+f.add3_49.value+"||"+f.add3_50.value+"||"+f.add3_51.value+"||"+f.add3_52.value+"||"+f.add3_53.value+"||"+f.add3_54.value+"||"+f.add3_55.value+"||"+f.add3_56.value+"||"+f.add3_57.value+"||"+f.add3_58.value+"||"+f.add3_59.value+"||"+f.add3_60.value;

if (!f.add4_2.checked)
{
	f.add4_2.value="";
}
if (!f.add4_3.checked)
{
	f.add4_3.value="";
}
if (!f.add4_4.checked)
{
	f.add4_4.value="";
}
if (!f.add7_1.checked)
{
	f.add7_1.value="";
}
if (!f.add7_2.checked)
{
	f.add7_2.value="";
}

f.add4.value= f.add4_1.value+"||"+f.add4_2.value+"||"+f.add4_3.value+"||"+f.add4_4.value;
f.add5.value= f.add5_1.value+"||"+f.add5_2.value+"||"+f.add5_3.value+"||"+f.add5_4.value+"||"+f.add5_5.value+"||"+f.add5_6.value+"||"+f.add5_7.value+"||"+f.add5_8.value+"||"+f.add5_9.value+"||"+f.add5_10.value+"||"+f.add5_11.value+"||"+f.add5_12.value+"||"+f.add5_13.value+"||"+f.add5_14.value+"||"+f.add5_15.value+"||"+f.add5_16.value+"||"+f.add5_17.value+"||"+f.add5_18.value+"||"+f.add5_19.value+"||"+f.add5_20.value+"||"+f.add5_21.value+"||"+f.add5_22.value+"||"+f.add5_23.value+"||"+f.add5_24.value+"||"+f.add5_25.value+"||"+f.add5_26.value+"||"+f.add5_27.value+"||"+f.add5_28.value+"||"+f.add5_29.value+"||"+f.add5_30.value+"||"+f.add5_31.value+"||"+f.add5_32.value+"||"+f.add5_33.value+"||"+f.add5_34.value+"||"+f.add5_35.value+"||"+f.add5_36.value+"||"+f.add5_37.value+"||"+f.add5_38.value+"||"+f.add5_39.value+"||"+f.add5_40.value+"||"+f.add5_41.value+"||"+f.add5_42.value+"||"+f.add5_43.value+"||"+f.add5_44.value+"||"+f.add5_45.value+"||"+f.add5_46.value+"||"+f.add5_47.value+"||"+f.add5_48.value+"||"+f.add5_49.value+"||"+f.add5_50.value+"||"+f.add5_51.value+"||"+f.add5_52.value+"||"+f.add5_53.value+"||"+f.add5_54.value+"||"+f.add5_55.value+"||"+f.add5_56.value+"||"+f.add5_57.value+"||"+f.add5_58.value+"||"+f.add5_59.value+"||"+f.add5_60.value+"||"+f.add5_61.value+"||"+f.add5_62.value+"||"+f.add5_63.value+"||"+f.add5_64.value+"||"+f.add5_65.value+"||"+f.add5_66.value+"||"+f.add5_67.value+"||"+f.add5_68.value+"||"+f.add5_69.value+"||"+f.add5_70.value;
f.add6.value= f.add6_1.value+"||"+f.add6_2.value+"||"+f.add6_3.value+"||"+f.add6_4.value+"||"+f.add6_5.value+"||"+f.add6_6.value+"||"+f.add6_7.value+"||"+f.add6_8.value+"||"+f.add6_9.value+"||"+f.add6_10.value+"||"+f.add6_11.value+"||"+f.add6_12.value+"||"+f.add6_13.value+"||"+f.add6_14.value+"||"+f.add6_15.value+"||"+f.add6_16.value+"||"+f.add6_17.value+"||"+f.add6_18.value+"||"+f.add6_19.value+"||"+f.add6_20.value+"||"+f.add6_21.value+"||"+f.add6_22.value+"||"+f.add6_23.value+"||"+f.add6_24.value+"||"+f.add6_25.value+"||"+f.add6_26.value+"||"+f.add6_27.value+"||"+f.add6_28.value+"||"+f.add6_29.value+"||"+f.add6_30.value+"||"+f.add6_31.value+"||"+f.add6_32.value+"||"+f.add6_33.value+"||"+f.add6_34.value+"||"+f.add6_35.value+"||"+f.add6_36.value+"||"+f.add6_37.value+"||"+f.add6_38.value+"||"+f.add6_39.value+"||"+f.add6_40.value+"||"+f.add6_41.value+"||"+f.add6_42.value+"||"+f.add6_43.value+"||"+f.add6_44.value+"||"+f.add6_45.value+"||"+f.add6_46.value+"||"+f.add6_47.value+"||"+f.add6_48.value+"||"+f.add6_49.value+"||"+f.add6_50.value+"||"+f.add6_51.value+"||"+f.add6_52.value+"||"+f.add6_53.value+"||"+f.add6_54.value+"||"+f.add6_55.value+"||"+f.add6_56.value+"||"+f.add6_57.value+"||"+f.add6_58.value+"||"+f.add6_59.value+"||"+f.add6_60.value+"||"+f.add6_61.value+"||"+f.add6_62.value+"||"+f.add6_63.value+"||"+f.add6_64.value+"||"+f.add6_65.value+"||"+f.add6_66.value+"||"+f.add6_67.value+"||"+f.add6_68.value+"||"+f.add6_69.value+"||"+f.add6_70.value+"||"+f.add6_71.value+"||"+f.add6_72.value+"||"+f.add6_73.value+"||"+f.add6_74.value+"||"+f.add6_75.value+"||"+f.add6_76.value+"||"+f.add6_77.value+"||"+f.add6_78.value+"||"+f.add6_79.value+"||"+f.add6_80.value+"||"+f.add6_81.value+"||"+f.add6_82.value+"||"+f.add6_83.value+"||"+f.add6_84.value+"||"+f.add6_85.value+"||"+f.add6_86.value+"||"+f.add6_87.value+"||"+f.add6_88.value+"||"+f.add6_89.value+"||"+f.add6_90.value;
f.add7.value= f.add7_1.value+"||"+f.add7_2.value;
f.add8.value= f.add8_1.value+"||"+f.add8_2.value+"||"+f.add8_3.value+"||"+f.add8_4.value+"||"+f.add8_5.value+"||"+f.add8_6.value+"||"+f.add8_7.value+"||"+f.add8_8.value+"||"+f.add8_9.value+"||"+f.add8_10.value+"||"+f.add8_11.value+"||"+f.add8_12.value+"||"+f.add8_13.value+"||"+f.add8_14.value+"||"+f.add8_15.value+"||"+f.add8_16.value+"||"+f.add8_17.value+"||"+f.add8_18.value+"||"+f.add8_19.value+"||"+f.add8_20.value+"||"+f.add8_21.value+"||"+f.add8_22.value+"||"+f.add8_23.value+"||"+f.add8_24.value+"||"+f.add8_25.value+"||"+f.add8_26.value+"||"+f.add8_27.value+"||"+f.add8_28.value+"||"+f.add8_29.value+"||"+f.add8_30.value+"||"+f.add8_31.value+"||"+f.add8_32.value+"||"+f.add8_33.value+"||"+f.add8_34.value+"||"+f.add8_35.value+"||"+f.add8_36.value+"||"+f.add8_37.value+"||"+f.add8_38.value+"||"+f.add8_39.value+"||"+f.add8_40.value+"||"+f.add8_41.value+"||"+f.add8_42.value+"||"+f.add8_43.value+"||"+f.add8_44.value+"||"+f.add8_45.value+"||"+f.add8_46.value+"||"+f.add8_47.value+"||"+f.add8_48.value+"||"+f.add8_49.value+"||"+f.add8_50.value+"||"+f.add8_51.value+"||"+f.add8_52.value+"||"+f.add8_53.value+"||"+f.add8_54.value+"||"+f.add8_55.value+"||"+f.add8_56.value+"||"+f.add8_57.value+"||"+f.add8_58.value+"||"+f.add8_59.value+"||"+f.add8_60.value;
f.add9.value= f.add9_1.value+"||"+f.add9_2.value+"||"+f.add9_3.value+"||"+f.add9_4.value;
f.add10.value= f.add10_1.value+"||"+f.add10_2.value+"||"+f.add10_3.value+"||"+f.add10_4.value+"||"+f.add10_5.value+"||"+f.add10_6.value+"||"+f.add10_7.value+"||"+f.add10_8.value+"||"+f.add10_9.value+"||"+f.add10_10.value+"||"+f.add10_11.value+"||"+f.add10_12.value+"||"+f.add10_13.value+"||"+f.add10_14.value+"||"+f.add10_15.value+"||"+f.add10_16.value+"||"+f.add10_17.value+"||"+f.add10_18.value+"||"+f.add10_19.value+"||"+f.add10_20.value+"||"+f.add10_21.value+"||"+f.add10_22.value+"||"+f.add10_23.value+"||"+f.add10_24.value+"||"+f.add10_25.value+"||"+f.add10_26.value+"||"+f.add10_27.value+"||"+f.add10_28.value+"||"+f.add10_29.value+"||"+f.add10_30.value+"||"+f.add10_31.value+"||"+f.add10_32.value+"||"+f.add10_33.value+"||"+f.add10_34.value+"||"+f.add10_35.value+"||"+f.add10_36.value+"||"+f.add10_37.value+"||"+f.add10_38.value+"||"+f.add10_39.value+"||"+f.add10_40.value+"||"+f.add10_41.value+"||"+f.add10_42.value+"||"+f.add10_43.value+"||"+f.add10_44.value+"||"+f.add10_45.value+"||"+f.add10_46.value+"||"+f.add10_47.value+"||"+f.add10_48.value+"||"+f.add10_49.value+"||"+f.add10_50.value+"||"+f.add10_51.value+"||"+f.add10_52.value+"||"+f.add10_53.value+"||"+f.add10_54.value+"||"+f.add10_55.value+"||"+f.add10_56.value+"||"+f.add10_57.value+"||"+f.add10_58.value+"||"+f.add10_59.value+"||"+f.add10_60.value+"||"+f.add10_61.value+"||"+f.add10_62.value+"||"+f.add10_63.value+"||"+f.add10_64.value+"||"+f.add10_65.value+"||"+f.add10_66.value+"||"+f.add10_67.value+"||"+f.add10_68.value+"||"+f.add10_69.value+"||"+f.add10_70.value+"||"+f.add10_71.value+"||"+f.add10_72.value+"||"+f.add10_73.value+"||"+f.add10_74.value+"||"+f.add10_75.value+"||"+f.add10_76.value+"||"+f.add10_77.value+"||"+f.add10_78.value+"||"+f.add10_79.value+"||"+f.add10_80.value+"||"+f.add10_81.value+"||"+f.add10_82.value+"||"+f.add10_83.value+"||"+f.add10_84.value+"||"+f.add10_85.value+"||"+f.add10_86.value+"||"+f.add10_87.value+"||"+f.add10_88.value+"||"+f.add10_89.value+"||"+f.add10_90.value;

f.add11.value= f.add11_1.value+"||"+f.add11_2.value+"||"+f.add11_3.value+"||"+f.add11_4.value+"||"+f.add11_5.value+"||"+f.add11_6.value+"||"+f.add11_7.value+"||"+f.add11_8.value+"||"+f.add11_9.value+"||"+f.add11_10.value+"||"+f.add11_11.value+"||"+f.add11_12.value+"||"+f.add11_13.value+"||"+f.add11_14.value+"||"+f.add11_25.value+"||"+f.add11_16.value+"||"+f.add11_26.value+"||"+f.add11_18.value+"||"+f.add11_19.value+"||"+f.add11_20.value+"||"+f.add11_21.value+"||"+f.add11_22.value+"||"+f.add11_23.value+"||"+f.add11_24.value+"||"+f.add11_27.value;
/*add12 사용중 이메일 기록
add13 사용중 회신 기록 
add14 체크인 기록*/
f.add15.value = f.add15_1.value+"||"+f.add15_2.value+"||"+f.add15_3.value+"||"+f.add15_4.value+"||"+f.add15_5.value+"||"+f.add15_6.value+"||"+f.add15_7.value+"||"+f.add15_8.value+"||"+f.add15_9.value+"||"+f.add15_10.value+"||"+f.add15_11.value+"||"+f.add15_12.value+"||"+f.add15_13.value+"||"+f.add15_14.value+"||"+f.add15_15.value+"||"+f.add15_16.value+"||"+f.add15_17.value+"||"+f.add15_18.value+"||"+f.add15_19.value+"||"+f.add15_20.value+"||"+f.add15_21.value+"||"+f.add15_22.value+"||"+f.add15_23.value+"||"+f.add15_24.value+"||"+f.add15_25.value+"||"+f.add15_26.value+"||"+f.add15_27.value+"||"+f.add15_28.value+"||"+f.add15_29.value+"||"+f.add15_30.value+"||"+f.add15_31.value+"||"+f.add15_32.value+"||"+f.add15_33.value+"||"+f.add15_34.value+"||"+f.add15_35.value+"||"+f.add15_36.value+"||"+f.add15_37.value+"||"+f.add15_38.value+"||"+f.add15_39.value+"||"+f.add15_40.value+"||"+f.add15_41.value+"||"+f.add15_42.value+"||"+f.add15_43.value+"||"+f.add15_44.value+"||"+f.add15_45.value+"||"+f.add15_46.value+"||"+f.add15_47.value+"||"+f.add15_48.value+"||"+f.add15_49.value+"||"+f.add15_50.value+"||"+f.add15_51.value+"||"+f.add15_52.value+"||"+f.add15_53.value+"||"+f.add15_54.value+"||"+f.add15_55.value+"||"+f.add15_56.value+"||"+f.add15_57.value+"||"+f.add15_58.value+"||"+f.add15_59.value+"||"+f.add15_60.value+"||"+f.add15_61.value+"||"+f.add15_62.value+"||"+f.add15_63.value+"||"+f.add15_64.value+"||"+f.add15_65.value+"||"+f.add15_66.value+"||"+f.add15_67.value+"||"+f.add15_68.value+"||"+f.add15_69.value+"||"+f.add15_70.value+"||"+f.add15_71.value+"||"+f.add15_72.value+"||"+f.add15_73.value+"||"+f.add15_74.value+"||"+f.add15_75.value+"||"+f.add15_76.value+"||"+f.add15_77.value+"||"+f.add15_78.value+"||"+f.add15_79.value+"||"+f.add15_80.value+"||"+f.add15_81.value+"||"+f.add15_82.value+"||"+f.add15_83.value+"||"+f.add15_84.value+"||"+f.add15_85.value+"||"+f.add15_86.value+"||"+f.add15_87.value+"||"+f.add15_88.value+"||"+f.add15_89.value+"||"+f.add15_90.value+"||"+f.add15_91.value+"||"+f.add15_92.value+"||"+f.add15_93.value+"||"+f.add15_94.value+"||"+f.add15_95.value+"||"+f.add15_96.value+"||"+f.add15_97.value+"||"+f.add15_98.value+"||"+f.add15_99.value+"||"+f.add15_100.value+"||"+f.add15_101.value+"||"+f.add15_102.value+"||"+f.add15_103.value+"||"+f.add15_104.value+"||"+f.add15_105.value+"||"+f.add15_106.value;

f.add16.value = $('#in1').html()+"||"+$('#in2').html()+"||"+$('#in3').html()+"||"+$('#in4').html()+"||"+$('#in5').html()+"||"+$('#in6').html()+"||"+$('#in7').html()+"||"+$('#in8').html()+"||"+$('#in9').html()+"||"+$('#in10').html()+"||"+$('#in11').html()+"||"+$('#in12').html()+"||"+$('#in13').html()+"||"+$('#in14').html()+"||"+$('#in15').html()+"||"+$('#in16').html()+"||"+$('#in17').html()+"||"+$('#in18').html()+"||"+$('#in19').html()+"||"+$('#in20').html();


f.adddata.value = f.adddata_0.value + "||" + f.adddata_1.value + "||" + f.adddata_2.value + "||" + f.adddata_3.value + "||" + f.adddata_4.value + "||" + f.adddata_5.value + "||" + f.adddata_6.value + "||" + f.adddata_7.value + "||" + f.adddata_8.value + "||" + f.adddata_9.value;

for ( var k  = 0;i < f.add2_1.length ; i++)
{
	if (f.add2_1[i].checked == true) break;
}

if (!f.add14_1.checked)
{
	f.add14_1.value="";
}
if (!f.add14_2.checked)
{
	f.add14_2.value="";
}
if (!f.add14_3.checked)
{
	f.add14_3.value="";
}
if (!f.add14_4.checked)
{
	f.add14_4.value="";
}
if (!f.add14_5.checked)
{
	f.add14_5.value="";
}



f.add14.value= f.add14_1.value+"||"+f.add14_2.value+"||"+f.add14_3.value+"||"+f.add14_4.value+"||"+f.add14_5.value;

f.add30.value= f.add30_1.value+"||"+f.add30_2.value+"||"+f.add30_3.value+"||"+f.add30_4.value+"||"+f.add30_5.value+"||"+f.add30_6.value+"||"+f.add30_7.value+"||"+f.add30_8.value+"||"+f.add30_9.value+"||"+f.add30_10.value+"||"+f.add30_11.value+"||"+f.add30_12.value+"||"+f.add30_13.value+"||"+f.add30_14.value;

f.add29.value= f.add29_0.value+"||"+f.add29_1.value+"||"+f.add29_2.value+"||"+f.add29_3.value+"||"+f.add29_4.value+"||"+f.add29_5.value+"||"+f.add29_6.value+"||"+f.add29_7.value+"||"+f.add29_8.value+"||"+f.add29_9.value+"||"+f.add29_10.value+"||"+f.add29_11.value+"||"+f.add29_12.value+"||"+f.add29_13.value+"||"+f.add29_14.value+"||"+f.add29_15.value+"||"+f.add29_16.value+"||"+f.add29_17.value+"||"+f.add29_18.value+"||"+f.add29_19.value;

f.add20.value = f.add_20.value;



	submitFlag = true;
}
function cancelCheck()
{
	if (confirm('정말 취소하시겠습니까?    '))
	{
		history.back();
	}
}


/* sms 추가 부분 */

function presetChange(obj)
{
	document.smsForm.smsText.value = obj.value;
	OntextCheck(document.smsForm.smsText);
}


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


/*추가부분*/
function preSubmit()
{
	var form = document.smsForm;
	
	if (form.smsText.value == "" || form.send_tel_0.value == "") return false;

	return true;
}


function cpyName(num) {
	document.getElementById('cpyName'+num).value = document.getElementById('oriName'+num).value;
}


function dateCal( value ) {

	var flag_date = value;

	var flag_time = new Date(flag_date.substr(0,4), flag_date.substr(5,2)-1, flag_date.substr(8,2),0,0,0,0); 
	var mktime = flag_time.getTime() + (24 * 60 * 60 * 1000 * 1); 
	var str_date= new Date(); 
	
	str_date.setTime(mktime); 
	var year  = str_date.getFullYear(); 
	var month = str_date.getMonth()+1; 
	var day  = str_date.getDate(); 
	
	if(month < 10) month = "0" + month; 
	if(day < 10) day = "0" + day; 
	var result_date = year.toString() + '-' + month.toString() + '-' + day.toString(); 

	document.getElementById('datepicker2').value = result_date;
	dateCal2();
 }

function dateCal2(  ) {
	if(!document.getElementById('datepicker2').value) {
		alert('출발일을 먼저 입력해주세요.');
	} else {

		var flag_date = document.getElementById('datepicker2').value;
		var cal_date =  parseInt(document.getElementById('periodate_1').value) - 1;

		var flag_time = new Date(flag_date.substr(0,4), flag_date.substr(5,2)-1, flag_date.substr(8,2),0,0,0,0); 
		var mktime = flag_time.getTime() + (24 * 60 * 60 * 1000 * cal_date); 
		var str_date= new Date(); 
		
		str_date.setTime(mktime); 
		var year  = str_date.getFullYear(); 
		var month = str_date.getMonth()+1; 
		var day  = str_date.getDate(); 
		
		if(month < 10) month = "0" + month; 
		if(day < 10) day = "0" + day; 
		var result_date = year.toString() + '-' + month.toString() + '-' + day.toString(); 

		document.getElementById('datepicker3').value = result_date;


//T/L 잔금(항공) 계산, 잔금(리조트) 계산
		var cal_date = -46;

		var flag_time = new Date(flag_date.substr(0,4), flag_date.substr(5,2)-1, flag_date.substr(8,2),0,0,0,0); 
		var mktime = flag_time.getTime() + (24 * 60 * 60 * 1000 * cal_date); 
		var str_date= new Date(); 
		
		str_date.setTime(mktime); 
		var year  = str_date.getFullYear(); 
		var month = str_date.getMonth()+1; 
		var day  = str_date.getDate(); 
		
		if(month < 10) month = "0" + month; 
		if(day < 10) day = "0" + day; 
		var result_date = year.toString() + '-' + month.toString() + '-' + day.toString(); 

		document.getElementById('datepicker8').value = result_date;
		document.getElementById('datepicker9').value = result_date;

	}
 }

function periodatefunction() {
	document.getElementById('periodate_1').value = parseInt(document.getElementById('periodate').value) + 1;
	dateCal2();
	
}

function periodatefunction1() {
	dateCal2();
	//document.getElementById('periodate_1').value = parseInt(document.getElementById('periodate').value) + 1;
}


function postsendCheck() {
	if (document.getElementById('postsend').checked ==true) {
		document.getElementById('postData').value= '발송대기'
	} else {
		document.getElementById('postData').value= ''
	}
}



function costCheck() {
	if (document.getElementById('datepicker11').value !="" && document.getElementById('datepicker12').value  !="") {
		document.getElementById('cost_top1').value = "[항공] [리조트]";
	} else if (document.getElementById('datepicker11').value  !="" && document.getElementById('datepicker12').value  =="") {
		document.getElementById('cost_top1').value = "[항공]";
	} else if (document.getElementById('datepicker11').value  =="" && document.getElementById('datepicker12').value  !="") {
		document.getElementById('cost_top1').value = "[리조트]";
	} else {
		document.getElementById('cost_top1').value = "";
	}
}


function costCheck2() {
	if (document.getElementById('datepicker13').value !="" && document.getElementById('datepicker14').value  !="") {
		document.getElementById('cost_top2').value = "[항공] [리조트]";
	} else if (document.getElementById('datepicker13').value  !="" && document.getElementById('datepicker14').value  =="") {
		document.getElementById('cost_top2').value = "[항공]";
	} else if (document.getElementById('datepicker13').value  =="" && document.getElementById('datepicker14').value  !="") {
		document.getElementById('cost_top2').value = "[리조트]";
	} else {
		document.getElementById('cost_top2').value = "";
	}
}



function totalPrice() {
	f = document.writeForm;


//항공계약금총합
total1 = 0;//parseInt(f.add10_2.value)+parseInt(f.add10_11.value)+parseInt(f.add10_20.value)+parseInt(f.add10_29.value)+parseInt(f.add10_38.value)+parseInt(f.add10_47.value)+parseInt(f.add10_56.value)+parseInt(f.add10_65.value)+parseInt(f.add10_74.value)+parseInt(f.add10_83.value);

//리조트 계약금
total2 = 0;//parseInt(f.add10_3.value)+parseInt(f.add10_12.value)+parseInt(f.add10_21.value)+parseInt(f.add10_30.value)+parseInt(f.add10_39.value)+parseInt(f.add10_48.value)+parseInt(f.add10_57.value)+parseInt(f.add10_66.value)+parseInt(f.add10_75.value)+parseInt(f.add10_84.value);

//잔금(항공)
total3 = parseInt(f.add10_4.value)+parseInt(f.add10_13.value)+parseInt(f.add10_22.value)+parseInt(f.add10_31.value)+parseInt(f.add10_40.value)+parseInt(f.add10_49.value)+parseInt(f.add10_58.value)+parseInt(f.add10_67.value)+parseInt(f.add10_76.value)+parseInt(f.add10_85.value);

//잔금(리조트) 
total4 = parseInt(f.add10_5.value)+parseInt(f.add10_14.value)+parseInt(f.add10_23.value)+parseInt(f.add10_32.value)+parseInt(f.add10_41.value)+parseInt(f.add10_50.value)+parseInt(f.add10_59.value)+parseInt(f.add10_68.value)+parseInt(f.add10_77.value)+parseInt(f.add10_86.value);

//경유지비용
total5 = parseInt(f.add10_6.value)+parseInt(f.add10_15.value)+parseInt(f.add10_24.value)+parseInt(f.add10_33.value)+parseInt(f.add10_42.value)+parseInt(f.add10_51.value)+parseInt(f.add10_60.value)+parseInt(f.add10_69.value)+parseInt(f.add10_78.value)+parseInt(f.add10_87.value);

//기타비용1
total6 = parseInt(f.add10_7.value)+parseInt(f.add10_16.value)+parseInt(f.add10_25.value)+parseInt(f.add10_34.value)+parseInt(f.add10_43.value)+parseInt(f.add10_52.value)+parseInt(f.add10_61.value)+parseInt(f.add10_70.value)+parseInt(f.add10_79.value)+parseInt(f.add10_88.value);

//기타비용2
total7 = parseInt(f.add10_8.value)+parseInt(f.add10_17.value)+parseInt(f.add10_26.value)+parseInt(f.add10_35.value)+parseInt(f.add10_44.value)+parseInt(f.add10_53.value)+parseInt(f.add10_62.value)+parseInt(f.add10_71.value)+parseInt(f.add10_80.value)+parseInt(f.add10_89.value);

//기타비용3
//total8 = parseInt(f.add10_9.value)+parseInt(f.add10_18.value)+parseInt(f.add10_27.value)+parseInt(f.add10_36.value)+parseInt(f.add10_45.value)+parseInt(f.add10_54.value)+parseInt(f.add10_63.value)+parseInt(f.add10_72.value)+parseInt(f.add10_81.value)+parseInt(f.add10_90.value);


f.add9_2.value = 0;
f.add9_3.value = 0;

//외화토탈
total_d = 0;

//원화토탈
total_w = 0;

total_a = 0;

	if(f.add14_1.checked==true) {
		total_d = total_d + total3;
	} else {
		total_w = total_w + total3;
	}
	if(f.add14_2.checked==true) {
		total_d = total_d + total4;
	} else {
		total_w = total_w + total4;
	}
	if(f.add14_3.checked==true) {
		total_d = total_d + total5;
	} else {
		total_w = total_w + total5;
	}
	if(f.add14_4.checked==true) {
		total_d = total_d + total6;
	} else {
		total_w = total_w + total6;
	}
	if(f.add14_5.checked==true) {
		total_d = total_d + total7;
	} else {
		total_w = total_w + total7;
	}



f.add9_2.value = total_d;
f.add9_3.value = total1+total2+total_w;
f.add9_4.value = total1+total2+parseInt(total_d) * parseInt(f.add9_1.value) + total_w;

}


 $(function() { 
  $('.priceformat').keyup(function(event) {
   $(this).toPrice();
  })
 });