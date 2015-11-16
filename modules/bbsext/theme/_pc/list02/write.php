<link rel="stylesheet" href="/lib/jquery.ui.all.css">
<script src="/lib/jquery-1.4.4.js"></script>
<script src="/lib/jquery.ui.core.js"></script>
<script src="/lib/jquery.ui.widget.js"></script>
<script src="/lib/jquery.ui.datepicker.js"></script>

<script>
var totalW3 = 0;
var totalS3 = 0;
var totalW4 = 0;
var totalS4 = 0;

function autocal() {
	var f = document.writeForm;
	var temp = 0;
	var j = 0;
	var totalW = 0;
	var totalS = 0;

	for ( i = 3; i < 40 ; i+=5 )
	{
		j++;
		temp = eval("f.add15_" + i + ".value");
		if( temp == "" ) continue;

		if( $("#in"+j).html() == "￦")
			totalW = totalW + parseInt(temp);
		else if ( $("#in"+j).html() == "$")
			totalS = totalS + parseInt(temp);
	}
	
	totalW3 = totalW;
	totalS3 = totalS;
	f.add15_101.value = totalW;
	f.add15_101.value = '￦ ' + f.add15_101.value.comma();
	f.add15_104.value = totalS;
	f.add15_104.value = '$ ' + f.add15_104.value.comma();

	autocal2();	
}
function autocal2() {
	var totalW2 = 0;
	var totalS2 = 0;
	var f = document.writeForm;
	var temp = 0;
	var j = 8;

	for ( i = 43; i < 100 ; i+=5 )
	{
		j++;
		temp = eval("f.add15_" + i + ".value");
		if( temp == "" ) continue;

		if( $("#in"+j).html() == "￦")
			totalW2 += parseInt(temp);
		else if ( $("#in"+j).html() == "$")
			totalS2 += parseInt(temp);
	}

	totalW4 = totalW2;
	totalS4 = totalS2;

	f.add15_102.value = totalW2;
	f.add15_102.value = '￦ ' + f.add15_102.value.comma();

	f.add15_105.value = totalS2;
	f.add15_105.value = '$ ' + f.add15_105.value.comma();

	f.add15_103.value = totalW3 - totalW4;
	f.add15_103.value = '￦ ' + f.add15_103.value.comma();

	f.add15_106.value = totalS3 - totalS4;
	f.add15_106.value = '$ ' + f.add15_106.value.comma();

}

function cal()
{

}

String.prototype.comma = function() {
    var tmp = this.split('.');

    var minus = false;
    var str = new Array();

    if(tmp[0].indexOf('-') >= 0) {
        minus = true;
        tmp[0] = tmp[0].substring(1, tmp[0].length);
    }

    var v = tmp[0].replace(/,/gi,'');
    for(var i=0; i<=v.length; i++) {
        str[str.length] = v.charAt(v.length-i);
        if(i%3==0 && i!=0 && i!=v.length) {
            str[str.length] = '.';
        }
    }
    str = str.reverse().join('').replace(/\./gi,',');
    if(minus) str = '-' + str;

    return (tmp.length==2) ? str + '.' + tmp[1] : str;
}

function onlyNum(value) {
    var val = value;
    var re = /[^0-9\.\,\-]/gi;
    val = val.replace(re, '');
	val = val.replace(',','');
	alert(val);
	return val;
}
function leadingZeros(n, digits) {
  var zero = '';
  n = n.toString();

  if (n.length < digits) {
    for (var i = 0; i < digits - n.length; i++)
      zero += '0';
  }
  return zero + n;
}

	$(function() {
		$( "#datepicker1" ).datepicker();
	});
	$(function() {
		$( "#datepicker2" ).datepicker();
		$( "#datepicker2" ).change(function() {
			var strDate = $(this).val();
			var objDate = new Date(strDate);
			var newDate = new Date(Date.parse(objDate) - 46 * 1000 * 60 * 60 * 24);
			var newDate = newDate.getFullYear() + '-' + leadingZeros((newDate.getMonth() + 1), 2) + '-' + leadingZeros(newDate.getDate(), 2);
			$('[name=add11_1]').val(newDate);
			$('[name=add11_2]').val(newDate);
		});
	});
	$(function() {
		$( "#datepicker5" ).datepicker();
	});
	$(function() {
		$( "#datepicker6" ).datepicker();
	});
	$(function() {
		$( "#datepicker7" ).datepicker();
	});
	$(function() {
		$( "#datepicker8" ).datepicker();
	});
	$(function() {
		$( "#datepicker9" ).datepicker();
	});
	$(function() {
		$( "#datepicker10" ).datepicker();
	});
	$(function() {
		$( "#datepicker11" ).datepicker();
	});
	$(function() {
		$( "#datepicker12" ).datepicker();
	});
	$(function() {
		$( "#datepicker13" ).datepicker();
	});
	$(function() {
		$( "#datepicker14" ).datepicker();
	});
	$(function() {
		$( "#datepicker15" ).datepicker();
	});
	$(function() {
		$( "#datepicker16" ).datepicker();
	});
	$(function() {
		$( "#datepicker17" ).datepicker();
	});
	$(function() {
		$( "#datepicker18" ).datepicker();
	});
	$(function() {
		$( "#datepicker19" ).datepicker();
	});
	$(function() {
		$( "#datepicker20" ).datepicker();
	});
	$(function() {
		$( "#datepicker21" ).datepicker();
	});
	$(function() {
		$( "#datepicker22" ).datepicker();
	});
	$(function() {
		$( "#datepicker23" ).datepicker();
	});
	$(function() {
		$( "#datepicker24" ).datepicker();
	});
	$(function() {
		$( "#datepicker25" ).datepicker();
	});
	$(function() {
		$( "#datepicker26" ).datepicker();
	});
	$(function() {
		$( "#datepicker27" ).datepicker();
	});
	$(function() {
		$( "#datepicker28" ).datepicker();
	});
	$(function() {
		$( "#datepicker29" ).datepicker();
	});
	$(function() {
		$( "#datepicker30" ).datepicker();
	});
	$(function() {
		$( "#datepicker31" ).datepicker();
	});
	$(function() {
		$( "#datepicker32" ).datepicker();
	});
	$(function() {
		$( "#datepicker33" ).datepicker();
	});
	$(function() {
		$( "#datepicker34" ).datepicker();
	});
	$(function() {
		$( "#datepicker35" ).datepicker();
	});
	$(function() {
		$( "#datepicker36" ).datepicker();
	});
	$(function() {
		$( "#datepicker37" ).datepicker();
	});
	$(function() {
		$( "#datepicker38" ).datepicker();
	});
	$(function() {
		$( "#datepicker39" ).datepicker();
	});
	$(function() {
		$( "#datepicker40" ).datepicker();
	});
	$(function() {
		$( "#datepicker41" ).datepicker();
	});
	$(function() {
		$( "#datepicker42" ).datepicker();
	});
	$(function() {
		$( "#datepicker43" ).datepicker();
	});
	$(function() {
		$( "#datepicker44" ).datepicker();
	});
	$(function() {
		$( "#datepicker45" ).datepicker();
	});
	$(function() {
		$( "#datepicker46" ).datepicker();
	});
	$(function() {
		$( "#datepicker47" ).datepicker();
	});
	$(function() {
		$( "#datepicker48" ).datepicker();
	});
	$(function() {
		$( "#datepicker49" ).datepicker();
	});
	$(function() {
		$( "#datepicker50" ).datepicker();
	});

	$(function() {
		$( "#postData" ).datepicker();

			// Expand Panel
		$("#open").click(function(){
			$("div#stats").slideDown("slow");
			autocal();
		});	
		
		// Collapse Panel
		$("#close").click(function(){
			$("div#stats").slideUp("slow");	
			autocal();
		});		
		
		// Switch buttons from "Log In | Register" to "Close Panel" on click
		$("#toggle a").click(function () {
			$("#toggle a").toggle();
		});
	});

	function addZero(i){
		var rtn = i + 100;
		return rtn.toString().substring(1,3);
	}

	function converDateString(dt){
		return dt.getFullYear() + "-" + addZero(eval(dt.getMonth()+1)) + "-" + addZero(dt.getDate());
	}

	function add_date(i) {
		var currentDate;
		currentDate = this.getDate() + i * 1;
		this.setDate(currentDate);
	}

    function withdrawresort() {
		Date.prototype.addDate = add_date;
		var selectedDate = new Date($("#datepicker9").val());
		selectedDate.addDate(1);
		$("#datepicker14").val(converDateString(selectedDate));
	}

	function duplicate(value) {
		var uid = "<?=$R['uid']?>";
		$.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/duplicate.php',
				data: "value="+value+"&uid="+uid,
				success: function(msg){
					$("#alert").html(msg);
				}
		 });
	}

	</script>
<div id="bbswrite">

	<form name="writeForm" method="post" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return writeCheck(this);">
	<input type="hidden" name="r" value="<?php echo $r?>" />
	<input type="hidden" name="a" value="write" />
	<input type="hidden" name="c" value="<?php echo $c?>" />
	<input type="hidden" name="cuid" value="<?php echo $_HM['uid']?>" />
	<input type="hidden" name="m" value="<?php echo $m?>" />
	<input type="hidden" name="bid" value="<?php echo $R['bbsid']?$R['bbsid']:$bid?>" />
	<input type="hidden" name="uid" value="<?php echo $R['uid']?>" />
	<input type="hidden" name="reply" value="<?php echo $reply?>" />
	<input type="hidden" name="nlist" value="<?php echo $g['bbs_list']?>" />
	<input type="hidden" name="pcode" value="<?php echo $date['totime']?>" />
	<input type="hidden" name="upfiles" id="upfilesValue" value="<?php echo $reply=='Y'?'':$R['upload']?>" />
	<?for ($i=1;$i<=30;$i++) :?>
	<input type="hidden" name="add<?=$i?>" />
	<?endfor?>
	<input type="hidden" name="adddata" />

	<table>
		<tr style="display:none">
		<td class="td1">제목</td>
		<td class="td2">
			<input type="text" name="subject" value="<?php echo (htmlspecialchars($R['subject']))?(htmlspecialchars($R['subject'])):"고객관리시스템"?>" class="input subject" />
			<span class="check">
			<?php if($my['admin']):?>
			<input type="checkbox" name="notice" value="1"<?php if($R['notice']):?> checked="checked"<?php endif?> />공지글
			<?php endif?>
			<?php if($d['theme']['use_hidden']==1):?>
			<input type="checkbox" name="hidden" value="1"<?php if($R['hidden']):?> checked="checked"<?php endif?> />비밀글
			<?php elseif($d['theme']['use_hidden']==2):?>
			<input type="hidden" name="hidden" value="1" />
			<?php endif?>
			</span>
		</td>
		</tr>

		<tr>
		<td class="td2" colspan="2">
<!--작업자리-->


<?
	$add1 = explode("||", $R[add1]);
	$add2 = explode("||", $R[add2]);
	$add3 = explode("||", $R[add3]);
	$add4 = explode("||", $R[add4]);
	$add5 = explode("||", $R[add5]);
	$add6 = explode("||", $R[add6]);
	$add7 = explode("||", $R[add7]);
	$add8 = explode("||", $R[add8]);
	$add9 = explode("||", $R[add9]);
	$add10 = explode("||", $R[add10]);
	$add11 = explode("||", $R[add11]);	
	$add14 = explode("||", $R[add14]);	
	$add15 = explode("||", $R[add15]);	
	$add16 = explode("||", $R[add16]);	
	$add29 = explode("||", $R[add29]);	
	$add30 = explode("||", $R[add30]);	
	$adddata = explode("||", $R[adddata]);	

?>




<style>

#ttid td {border:solid 1px #999;height:25px;padding:0px 5px;}
#ttid_1 td {border:solid 1px #999;height:25px;}
.b_title {font-weight:bold;font-size:14px;color:#114411;}
.i_normal {border:solid 1px #ccc;width:110px;}
.i_normal_2 {border:solid 1px #ccc;width:80px;}

.i_normal2_2 {border:solid 1px #ccc;width:208px;}
.i_normal2_3 {border:solid 1px #ccc;width:208px;}
.i_normal3 {border:solid 1px #ccc;width:527px;}
.i_title {text-align:center;font-weight:bold;}
</style>
		<? print_r($add17) ?>

<table width="100px" cellpadding="0" cellspacing="0" id="ttid"  style="border-collapse:collapse; ">
	<colgroup>
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
		<col style="width:150px">
	</colgroup>
	<tr>  
		<td colspan="9" style="border:0" class="b_title">■ 예약처리상태표시</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">처리상태</td>
		<td class="i_title" bgcolor="#e6e6e6">계약금입금</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금입금</td>
		<td class="i_title" bgcolor="#e6e6e6">여권사본</td>
		<td class="i_title" bgcolor="#e6e6e6">계약서</td>
		<td class="i_title" bgcolor="#e6e6e6">우편물발송</td>
		<td class="i_title" bgcolor="#e6e6e6">계약금지출</td>
		<td class="i_title" bgcolor="#e6e6e6">잔금지출</td>
		<td class="i_title" bgcolor="#e6e6e6">현금영수증</td>
	</tr>
	<tr>
		<td>
			<?php if($B['category']):$_catexp = explode(',',$B['category']);$_catnum=count($_catexp)?>
	
		<select name="category" >
			<?php for($i = 1; $i < $_catnum; $i++):if(!$_catexp[$i])continue;?>
			<option value="<?php echo $_catexp[$i]?>"<?php if($_catexp[$i]==$R['category']||$_catexp[$i]==$cat):?> selected="selected"<?php endif?>>ㆍ<?php echo $_catexp[$i]?><?php if($d['theme']['show_catnum']):?>(<?php echo getDbRows($table[$m.'data'],'site='.$s.' and notice=0 and bbs='.$B['uid']." and category='".$_catexp[$i]."'")?>)<?php endif?></option>
			<?php endfor?>
			</select>
			<?php endif?></td>
		<td><input type="text" name="add1_1" class="i_normal" id="cost_top1" value="<?=$add1[0]?>" /></td>
		<td><input type="text" name="add1_2" class="i_normal" id="cost_top2" value="<?=$add1[1]?>" /></td>
		<td><input type="text" name="add1_3" class="i_normal" value="<?=$add1[2]?>" /></td>
		<td><input type="text" name="add1_4" class="i_normal" value="<?=$add1[3]?>" /></td>
		<td><input type="text" name="add1_5" id="postData" class="i_normal" value="<?=$add1[4]?>" /></td>
		<td><input type="text" name="add1_6" class="i_normal" value="<?=$add1[5]?>" /></td>
		<td><input type="text" name="add1_7" class="i_normal" value="<?=$add1[6]?>" /></td>
		<td><input type="text" name="add1_8" class="i_normal" value="<?=$add1[7]?>" /></td>
	</tr>
	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">담당자</td>
		<td colspan="2">
		<input type="text" name="add2_10" value="<?if(!$add2[9]):?><?php echo $my[name]?><?else:?><?php echo $add2[9]?><?endif?>"  class="i_normal" />
		</td>									 
		<td class="i_title" bgcolor="#e6e6e6">접수방법</td>
		<td colspan="3">
			<input type="radio" name="add2_1" value="인터넷" <?if($add2[0]=="인터넷" || !$add2[0]):?>checked<?endif?> />인터넷 
			<input type="radio" name="add2_1" value="전화" <?if($add2[0]=="전화"):?>checked<?endif?>  />전화 
			<input type="radio" name="add2_1" value="방문" <?if($add2[0]=="방문"):?>checked<?endif?>  />방문 
			<input type="radio" name="add2_1" value="지인" <?if($add2[0]=="지인"):?>checked<?endif?>  />지인 
			<input type="radio" name="add2_1" value="아이웨딩" <?if($add2[0]=="아이웨딩"):?>checked<?endif?>  />아이웨딩 
			<input type="radio" name="add2_1" value="르씨엘" <?if($add2[0]=="르씨엘"):?>checked<?endif?>  />르씨엘 
			<input type="radio" name="add2_1" value="B2B" <?if($add2[0]=="B2B"):?>checked<?endif?>  />B2B
			<input type="radio" name="add2_1" value="BC카드" <?if($add2[0]=="BC카드"):?>checked<?endif?>  />BC카드
		
		</td>									 
		
		<td class="i_title" bgcolor="#e6e6e6">견적요청일</td>
		<td colspan="1"><input type="text" id="datepicker5" name="add2_2" class="i_normal" value="<?=($add2[1])?$add2[1]:date('Y-m-d')?>" /></td>									 
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">여행지역</td>
		<td><select name="add2_3">
				<option value="모리셔스" <?if($add2[2]=="모리셔스"):?>selected<?endif?> >모리셔스</option>
				<option value="몰디브" <?if($add2[2]=="몰디브"):?>selected<?endif?> >몰디브</option>
				<option value="세이셸" <?if($add2[2]=="세이셸"):?>selected<?endif?> >세이셸</option>
				<option value="두바이" <?if($add2[2]=="두바이"):?>selected<?endif?> >두바이</option>
				<option value="칸쿤" <?if($add2[2]=="칸쿤"):?>selected<?endif?> >칸쿤</option>
				<option value="발리" <?if($add2[2]=="발리"):?>selected<?endif?> >발리</option>
				<option value="하와이" <?if($add2[2]=="하와이"):?>selected<?endif?> >하와이</option>
				<option value="코사무이" <?if($add2[2]=="코사무이"):?>selected<?endif?> >코사무이</option>
				<option value="유럽" <?if($add2[2]=="유럽"):?>selected<?endif?> >유럽</option>
				<option value="미주" <?if($add2[2]=="미주"):?>selected<?endif?> >미주</option>
				<option value="기타" <?if($add2[2]=="기타"):?>selected<?endif?> >기타</option>
			</select></td>	
		<td>
		<select name="add2_4">
				<option value="-" <?if($add2[3]=="-"):?>selected<?endif?> >선택</option>
				<option value="모리셔스" <?if($add2[3]=="모리셔스"):?>selected<?endif?> >모리셔스</option>
				<option value="몰디브" <?if($add2[3]=="몰디브"):?>selected<?endif?> >몰디브</option>
				<option value="세이셸" <?if($add2[3]=="세이셸"):?>selected<?endif?> >세이셸</option>
				<option value="두바이" <?if($add2[3]=="두바이"):?>selected<?endif?> >두바이</option>
				<option value="칸쿤" <?if($add2[3]=="칸쿤"):?>selected<?endif?> >칸쿤</option>
				<option value="발리" <?if($add2[2]=="발리"):?>selected<?endif?> >발리</option>
				<option value="하와이" <?if($add2[2]=="하와이"):?>selected<?endif?> >하와이</option>
				<option value="코사무이" <?if($add2[3]=="코사무이"):?>selected<?endif?> >코사무이</option>
				<option value="유럽" <?if($add2[3]=="유럽"):?>selected<?endif?> >유럽</option>
				<option value="미주" <?if($add2[3]=="미주"):?>selected<?endif?> >미주</option>
				<option value="기타" <?if($add2[3]=="기타"):?>selected<?endif?> >기타</option>
			</select>
			<!--<input type="text" name="add2_4" class="i_normal" value="<?=$add2[3]?>" />
			--></td>				 
		<td class="i_title" bgcolor="#e6e6e6">여행종류</td>
		<td colspan="3"><input type="radio" name="add2_5" value="허니문" <?if($add2[4]=="허니문" || !$add2[4]):?>checked<?endif?> />허니문 <input type="radio" name="add2_5" value="가족여행" <?if($add2[4]=="가족여행"):?>checked<?endif?> />가족여행 <input type="radio" name="add2_5" value="기타" <?if($add2[4]=="기타"):?>checked<?endif?> />기타 </td>									 
		<td class="i_title" bgcolor="#e6e6e6">여행기간</td>
		<td colspan="1">
			<select name="add2_6" id="periodate" onchange="periodatefunction()";>
				<?for($i=1;$i<=20;$i++):?>
					<option value="<?=$i?>" <?if($add2[5]==$i):?>selected="selected"<?endif?> ><?=$i?>박</option>
				<?endfor?>
			</select>
			<select name="add2_12" id="periodate_1" onchange="periodatefunction1()" >
				<?for($i=2;$i<=20;$i++):?>
					<option value="<?=$i?>" <?if($add2[10]==$i):?>selected="selected"<?endif?> ><?=$i?>일</option>
				<?endfor?>
			</select>
		</td>									 
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">예식일</td>
		<td colspan="2"><input type="text" id="datepicker1" name="add2_7" class="i_normal" value="<?=$add2[6]?>"  onChange="dateCal( this.value )" /></td>									 
		<td class="i_title" bgcolor="#e6e6e6">출발일</td>
		<td colspan="3"><input type="text" id="datepicker2" onchange="dateCal2()" name="add2_8" class="i_normal" value="<?=$add2[7]?>" /></td>	  
		<td class="i_title" bgcolor="#e6e6e6">도착일</td>
		<td colspan="1"><input type="text" id="datepicker3" name="add2_9" class="i_normal" value="<?=$add2[8]?>" /></td>									 
	</tr>
	<tr>
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="9" style="border:0" class="b_title">■ 고객정보</td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">구분</td>
		<td class="i_title" bgcolor="#e6e6e6">한글</td>
		<td  class="i_title" colspan="2" bgcolor="#e6e6e6">영문</td>             
		<td class="i_title" bgcolor="#e6e6e6">구분</td>
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">전화번호</td>
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">이메일</td>
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">주민번호</td>
		<td  class="i_title" colspan="1" bgcolor="#e6e6e6">비자유무</td>
	</tr>	

<?$j=1;?>
<?$k=0;?>
<?$l=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="cus<?=$i?>" <?if($i>0&&!$add3[$k+1]):?>style="display:none"<?endif?> >
		<td class="i_title"><select name="add3_<?=$j++;?>" class="i_normal">
				<option value="MR" <?if($add3[$k]=='MR'):?>selected<?endif?>>MR</option>
				<option value="MS" <?if($add3[$k++]=='MS'):?>selected<?endif?>>MS</option>
			</select></td>
		<td><input type="text" name="add3_<?=$j++;?>" id="oriName<?=$i;?>" onblur="cpyName('<?=$i;?>')" class="i_normal" value="<?=$add3[$k++]?>" /></td>
		<td colspan="2"><input type="text" name="add3_<?=$j++;?>" class="i_normal2" value="<?=$add3[$k++]?>" /></td>             
		<td><select name="add3_<?=$j++;?>" class="i_normal">
				<option value="성인" <?if($add3[$k]=='성인'):?>selected<?endif?>>성인</option>
				<option value="소아" <?if($add3[$k]=='소아'):?>selected<?endif?>>소아</option>
				<option value="유아" <?if($add3[$k++]=='유아'):?>selected<?endif?>>유아</option>
			</select>				
		</td>
		<td colspan="1"><input type="text" name="add3_<?=$j++;?>" class="i_normal2" value="<?=$add3[$k++]?>" onChange="duplicate(this.value);" /></td>
		<td colspan="1"><input type="text" name="add3_<?=$j++;?>" class="i_normal2" value="<?=$add3[$k++]?>" onChange="duplicate(this.value)" /></td>
		<td colspan="1"><input type="text" name="add29_<?=$l?>" class="i_normal2" value="<?=$add29[$l++]?>" /></td>
		<td colspan="1">
		<select name="add29_<?=$l?>">
			<option value="NONE" <?if($add29[$l]=='NONE'):?>selected="selected"<?endif?>>NONE</option>
			<option value="ESTA" <?if($add29[$l]=='ESTA'):?>selected="selected"<?endif?>>ESTA</option>
			<option value="VISA" <?if($add29[$l++]=='VISA'):?>selected="selected"<?endif?>>VISA</option>
		</select>
		<?if($i!=9):?><input type="button" value="+" onclick="showType('cus<?=$i+1?>','btnCus<?=$i?>');" id="btnCus<?=$i?>" <?if($add3[$k+1]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>		
<?endfor?>		
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">주소</td>
		<td colspan="4"><input type="text" name="add4_1" class="i_normal3"  value="<?=$add4[0]?>" /></td>
		<td colspan="4"><input type="checkbox" name="add4_2" value="견적발송" <?if($add4[1]=="견적발송"):?>checked<?endif?> />견적발송 <input type="checkbox" name="add4_3" value="APIS접수" <?if($add4[2]=="APIS접수"):?>checked<?endif?> />APIS접수 <input type="checkbox" name="add4_4" id="postsend" value="우편물발송" <?if($add4[3]=="우편물발송"):?>checked<?endif?> onclick="postsendCheck();" />우편물발송</td>
	</tr>

	<!--자동화처리하면서 삭제-->
	<tr >
		<td height="20" colspan="9" style="border:0;padding-top:5px" align="right" valign="bottom"><font color="red"><div id="alert" style="width:100%;height:100%" valign="bottom">&nbsp;</div></td>
	</tr>
	<tr style="display:none">  
		<td colspan="9" style="border:0" class="b_title">■ 요청 견적내용</td>
	</tr>
	<tr style="display:none">
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">호텔명</td>
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">룸타입</td>
		<td class="i_title" bgcolor="#e6e6e6">박수</td>
		<td class="i_title" bgcolor="#e6e6e6">식사</td>
		<td class="i_title" bgcolor="#e6e6e6">판매가(인)</td>
		<td class="i_title" bgcolor="#e6e6e6">예상수익</td>
		<td class="i_title" bgcolor="#e6e6e6">추가</td>
	</tr>

<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="room<?=$i?>" <?if($i>0&&!$add5[$k]):?>style="display:none"<?endif?> style="display:none">
		<td colspan="2"><input type="text" name="add5_<?=$j++;?>" class="i_normal2" value="<?=$add5[$k++]?>" style="width:100%"/></td>
		<td colspan="2"><input type="text" name="add5_<?=$j++;?>" class="i_normal2" value="<?=$add5[$k++]?>" /></td>
		<td>
		
			<select name="add5_<?=$j++;?>" class="i_normal">
				<option value="1" <?if($add5[$k]=='1'):?>selected<?endif?>>1박</option>
				<option value="2" <?if($add5[$k]=='2'):?>selected<?endif?>>2박</option>
				<option value="3" <?if($add5[$k]=='3'):?>selected<?endif?>>3박</option>
				<option value="4" <?if($add5[$k]=='4'):?>selected<?endif?>>4박</option>
				<option value="5" <?if($add5[$k]=='5'):?>selected<?endif?>>5박</option>
				<option value="6" <?if($add5[$k]=='6'):?>selected<?endif?>>6박</option>
				<option value="7" <?if($add5[$k]=='7'):?>selected<?endif?>>7박</option>
				<option value="8" <?if($add5[$k]=='8'):?>selected<?endif?>>8박</option>
				<option value="9" <?if($add5[$k]=='9'):?>selected<?endif?>>9박</option>
				<option value="10" <?if($add5[$k]=='10'):?>selected<?endif?>>10박</option>
				<option value="11" <?if($add5[$k]=='11'):?>selected<?endif?>>11박</option>
				<option value="12" <?if($add5[$k]=='12'):?>selected<?endif?>>12박</option>
				<option value="13" <?if($add5[$k]=='13'):?>selected<?endif?>>13박</option>
				<option value="14" <?if($add5[$k]=='14'):?>selected<?endif?>>14박</option>
				<option value="15" <?if($add5[$k]=='15'):?>selected<?endif?>>15박</option>
				<option value="16" <?if($add5[$k]=='16'):?>selected<?endif?>>16박</option>
				<option value="17" <?if($add5[$k]=='17'):?>selected<?endif?>>17박</option>
				<option value="18" <?if($add5[$k]=='18'):?>selected<?endif?>>18박</option>
				<option value="19" <?if($add5[$k]=='19'):?>selected<?endif?>>19박</option>
				<option value="20" <?if($add5[$k++]=='20'):?>selected<?endif?>>20박</option>
			</select>
			
		
		</td>
		<td>
			<select name="add5_<?=$j++;?>" class="i_normal">
				<option value="NONE" <?if($add8[$k]=='NONE'):?>selected<?endif?>>NONE</option>
				<option value="BB" <?if($add5[$k]=='BB'):?>selected<?endif?>>BB</option>
				<option value="HB" <?if($add5[$k]=='HB'):?>selected<?endif?>>HB</option>
				<option value="FB" <?if($add5[$k]=='FB'):?>selected<?endif?>>FB</option>
				<option value="AI" <?if($add5[$k++]=='AI'):?>selected<?endif?>>AI</option>
			</select>
		</td>
		<td><input type="text" name="add5_<?=$j++;?>" class="i_normal" value="<?=$add5[$k++]?>" /></td>
		<td><input type="text" name="add5_<?=$j++;?>" class="i_normal" value="<?=$add5[$k++]?>" /></td>
		<td><input type="text" name="add5_<?=$j++;?>" class="i_normal_2" value="<?=$add5[$k++]?>" style="display:none" /><?if($i!=9):?><input type="button" value="+" onclick="showType('room<?=$i+1?>','btnRoom<?=$i?>');" id="btnRoom<?=$i?>" <?if($add5[$k]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>
<?endfor?>





<!--작업자리-->


	<tr>
		<td colspan="9" style="border:0;height:50px">&nbsp;</td>
	</tr>

	<tr class="sec2_start">
		<td colspan="9" style="border:solid 1px #888;height:30px;background:#ddd;text-align:center;">추 가 정 보 ▼</td>
	</tr>



	<tr>
		<td colspan="9" style="border:1;height:50px">


	<div class="editbox" >
		<?php if(!$g['mobile']&&$d['theme']['edit_html']<=$my['level']):?>
		<div class="iconbox">
			<?php if($d['theme']['perm_photo'] <= $my['level'] && false):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=photo&gparam=upfilesValue|upfilesFrame|editFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_photo.gif" alt="" />사진</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<?php if($d['theme']['perm_upload'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=file&gparam=upfilesValue|upfilesFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_xfile.gif" alt="" />파일</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?><!--
			<a href="#." onclick="ToolCheck('layout');">레이아웃</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('table');">테이블</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('box');">박스</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('char');">특수문자</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('link');">링크</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />

			<a href="#." onclick="ToolCheck('icon');">아이콘</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('flash');">플래쉬</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('movie');">동영상</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck('html');">HTML</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />-->
			<a href="#." onclick="frames.editFrame.ToolboxShowHide(0);" /><img src="<?php echo $g['img_core']?>/_public/ico_edit.gif" alt="" />편집</a>
		</div>
		<?php endif?>

		<div>
		<input type="hidden" name="html" id="editFrameHtml" value="<?php echo $d['theme']['edit_html']>$my['level']?'TEXT':($R['html']?$R['html']:'HTML')?>" />
		<input type="hidden" name="content" id="editFrameContent" value="<?php echo htmlspecialchars($R['content'])?>" />
		<iframe name="editFrame" id="editFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="100px" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
		
		<?php if($d['theme']['perm_upload']<=$my['level']||$d['theme']['perm_photo']<=$my['level']):?>
		<div>
		<iframe name="upfilesFrame" id="upfilesFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;mod=list&amp;gparam=upfilesValue|editFrame&amp;code=<?php echo $reply=='Y'?'':$R['upload']?>" width="100%" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
		<?php endif?>
	</div>
	
		</td>
	</tr>


<!--작업자리 2222222222222222222222222-->


	<tr >  
		<td colspan="8" style="border:0" class="b_title" >■ 항공 예약 정보</td>
		<td colspan="1" class="i_title" style="text-align:right">AirTicket Only<input type="checkbox" name="add7_1" value="Air Ticket Only" <?if($add7[0]=="Air Ticket Only"):?>checked<?endif?> /></td>
	</tr>
	<tr >
		<td colspan="4" class="i_title" bgcolor="#e6e6e6">출 발</td>
		<td colspan="4" class="i_title" bgcolor="#e6e6e6">도 착</td>
		<td rowspan="2" class="i_title" bgcolor="#e6e6e6">Confirm No.<!--<input type="button" value="+" onclick="showType('air<?=$i+1?>','btnAir<?=$i?>');" id="btnAir<?=$i?>" />--></td>
	</tr>
	<tr >
		<td class="i_title">여정</td>
		<td class="i_title">편명</td>
		<td class="i_title">날짜</td>
		<td class="i_title">시간</td>
		<td class="i_title">여정</td>
		<td class="i_title">편명</td>
		<td class="i_title">날짜</td>
		<td class="i_title">시간</td>
	</tr>
<? //print_r($add6); ?>
<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="air<?=$i?>" <?if($i>0&&!$add6[$k]):?>style="display:none"<?endif?>  >
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal" value="<?=$add6[$k++]?>" /></td>
		<td><input type="text" id="add6_<?=$j;?>" name="add6_<?=$j++;?>" class="i_normal_2" value="<?=$add6[$k++]?>" /><input type="button" value="-" onclick="delAir('<?=$i?>');" id="btnAir<?=$i?>" /></td>
	</tr>
<?endfor?>
	<tr>
		<td colspan="9" style="border:0" align="right"><input type="button" value="+" id="btnResort" onclick="addAir();" /> </td>
	</tr>

	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >  
		<td colspan="8" style="border:0" class="b_title">■ 리조트정보</td>
		<td class="i_title">Resort Only<input type="checkbox" name="add7_2" value="Resort Only" <?if($add7[1]=="Resort Only"):?>checked<?endif?> /></td>
	</tr>
	<tr >
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">호텔명</td>
		<td colspan="2" class="i_title" bgcolor="#e6e6e6">룸타입</td>
		<td class="i_title" bgcolor="#e6e6e6">체크인</td>
		<td class="i_title" bgcolor="#e6e6e6">박수</td>
		<td class="i_title" bgcolor="#e6e6e6">식사</td>
		<td class="i_title" bgcolor="#e6e6e6">리조트이동수단</td>
		<td class="i_title" bgcolor="#e6e6e6">Confim No.</td>
	</tr>
	
<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="resort<?=$i?>" <?if($i>0&&!$add8[$k]):?>style="display:none"<?endif?>  >
		<td colspan="2"><input type="text" id="add8_<?=$j;?>" name="add8_<?=$j++;?>" class="i_normal2_3" value="<?=$add8[$k++]?>" /></td>
		<td colspan="2"><input type="text" id="add8_<?=$j;?>" name="add8_<?=$j++;?>" class="i_normal2_3" value="<?=$add8[$k++]?>" /></td>
		<td><input type="text" id="datepicker<?=$i+16?>" name="adddata_<?=$i?>" class="i_normal" value="<?=$adddata[$i]?>"  /></td>
		<td>
			<select name="add8_<?=$j++;?>" class="i_normal">
				<option value="1" <?if($add8[$k]=='1'):?>selected<?endif?>>1박</option>
				<option value="2" <?if($add8[$k]=='2'):?>selected<?endif?>>2박</option>
				<option value="3" <?if($add8[$k]=='3'):?>selected<?endif?>>3박</option>
				<option value="4" <?if($add8[$k]=='4'):?>selected<?endif?>>4박</option>
				<option value="5" <?if($add8[$k]=='5'):?>selected<?endif?>>5박</option>
				<option value="6" <?if($add8[$k]=='6'):?>selected<?endif?>>6박</option>
				<option value="7" <?if($add8[$k]=='7'):?>selected<?endif?>>7박</option>
				<option value="8" <?if($add8[$k]=='8'):?>selected<?endif?>>8박</option>
				<option value="9" <?if($add8[$k]=='9'):?>selected<?endif?>>9박</option>
				<option value="10" <?if($add8[$k]=='10'):?>selected<?endif?>>10박</option>
				<option value="11" <?if($add8[$k]=='11'):?>selected<?endif?>>11박</option>
				<option value="12" <?if($add8[$k]=='12'):?>selected<?endif?>>12박</option>
				<option value="13" <?if($add8[$k]=='13'):?>selected<?endif?>>13박</option>
				<option value="14" <?if($add8[$k]=='14'):?>selected<?endif?>>14박</option>
				<option value="15" <?if($add8[$k]=='15'):?>selected<?endif?>>15박</option>
				<option value="16" <?if($add8[$k]=='16'):?>selected<?endif?>>16박</option>
				<option value="17" <?if($add8[$k]=='17'):?>selected<?endif?>>17박</option>
				<option value="18" <?if($add8[$k]=='18'):?>selected<?endif?>>18박</option>
				<option value="19" <?if($add8[$k]=='19'):?>selected<?endif?>>19박</option>
				<option value="20" <?if($add8[$k++]=='20'):?>selected<?endif?>>20박</option>
			</select>
		</td>
		<td>
			<select name="add8_<?=$j++;?>" class="i_normal">
				<option value="NONE" <?if($add8[$k]=='NONE'):?>selected<?endif?>>NONE</option>
				<option value="BB" <?if($add8[$k]=='BB'):?>selected<?endif?>>BB</option>
				<option value="HB" <?if($add8[$k]=='HB'):?>selected<?endif?>>HB</option>
				<option value="FB" <?if($add8[$k]=='FB'):?>selected<?endif?>>FB</option>
				<option value="AI" <?if($add8[$k++]=='AI'):?>selected<?endif?>>AI</option>
			</select>
		</td>	
		<td>
		
		
			<select name="add8_<?=$j++;?>" class="i_normal2">
				<option value="스피드보트" <?if($add8[$k]=='스피드보트'):?>selected<?endif?>>스피드보트</option>
				<option value="수상비행기" <?if($add8[$k]=='수상비행기'):?>selected<?endif?>>수상비행기</option>
				<option value="국내선" <?if($add8[$k]=='국내선'):?>selected<?endif?>>국내선</option>
				<option value="국내선+스피드보트" <?if($add8[$k]=='국내선+스피드보트'):?>selected<?endif?>>국내선+스피드보트</option>
				<option value="전용차량" <?if($add8[$k]=='전용차량'):?>selected<?endif?>>전용차량</option>
				<option value="개별이동" <?if($add8[$k]=='개별이동'):?>selected<?endif?>>개별이동</option>
				<option value="기타" <?if($add8[$k++]=='기타'):?>selected<?endif?>>기타</option>
			</select>
			 

		</td>
		<td><input type="text" id="add8_<?=$j;?>" name="add8_<?=$j++;?>" class="i_normal_2" value="<?=$add8[$k++]?>" /><input type="button" value="-" onclick="delResort('<?=$i?>');" id="btnResort<?=$i?>" /></td>
	</tr>
<?endfor?>
	<tr>
		<td colspan="9" style="border:0" align="right"><input type="button" value="+" id="btnResort" onclick="addResort();" /> </td>
	</tr>
	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >  
		<td colspan="9" style="border:0" class="b_title">■ 제공사항 </td>
	</tr>
<script>
function boxCheck (obj, value) {
	if (obj.checked==true)
	{
		obj.value = value;
	} else {
		obj.value = '';

	}
}
</script>
<? $i30 = 0; ?>
	<tr >
		<td colspan="9" style="border:0;margin:0;padding:0">
		  <table width="100%">
		  <tr>
			<td rowspan="2" align="center" bgcolor="#E6E6E6" width="120px"><span class="style4">제공사항</span></td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_1" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'허니문특전');" >허니문특전</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_2" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'리조트');" >리조트</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_3" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'항공권');" >항공권</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_4" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'유류세 및 택스');" >유류세 및 택스</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_5" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'여행자보험');" >여행자보험</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_6" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'여행안내서');" >여행안내서</td>
		  </tr>
		  <tr>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_7" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'현지안내원');" >현지안내원</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_8" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'픽업샌딩');" >픽업샌딩</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_9" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'경유지관광');" >경유지관광</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_10" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'여권발급비');" >여권발급비</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_11" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'가이드 팁');" >가이드 팁</td>
			<td colspan="1" align="left" bgcolor="#ffffff"><input type="checkbox" name="add30_12" value="<?=$add30[$i30]?>" <?=$add30[$i30++]?'checked':''?> onclick="boxCheck(this,'여행인솔자(T/C)');" >여행인솔자(T/C)</td>
		  </tr>
		  <tr>
			<td height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">기타특전</span></td>
			<td colspan="6" align="center" bgcolor="#ffffff"><input type="text" name="add30_13" value="<?=$add30[$i30++]?>" style="width:98%; border:0;  border-bottom-style:none;" /></td>
		  </tr>
		  <tr>
			<td height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">비     고</span></td>
			<td colspan="6" align="center" bgcolor="#ffffff"><input type="text" name="add30_14" value="<?=$add30[$i30++]?>" style="width:98%; border:0;  border-bottom-style:none;" /></td>
		  </tr>
		  </table>
		</td>
	</tr>
	<tr >
		<td colspan="9" style="border:0">&nbsp;</td>
	</tr>
	<tr >  
		<td colspan="9" style="border:0" class="b_title">■ 여행경비내역</td>
	</tr>
	<tr >
		<td align="center"><select name="add_20" style="width:120px">
			<option value="달러" <?if($R[add20]=='달러'):?>selected="selected"<?endif?>>달러</option>
			<option value="유로" <?if($R[add20]=='유로'):?>selected="selected"<?endif?>>유로</option>
			</select>		
		</td>
		<td class="i_title">적용환율Rate</td>
		<td><input type="text" name="add9_1" class="i_normal" value="<?=($add9[0])?$add9[0]:'1050'?>" onblur="totalPrice();" ></td>
		<td class="i_title">외화 총비용 </td>
		<td><input type="text" name="add9_2" class="i_normal" value="<?=$add9[1]?>" readonly="readonly"></td>
		<td class="i_title">원화 총비용</td>
		<td><input type="text" name="add9_3" class="i_normal" value="<?=$add9[2]?>" readonly="readonly"></td>
		<td class="i_title">총 합계 </td>
		<td><input type="text" name="add9_4" class="i_normal" value="<?=$add9[3]?>" readonly="readonly"></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">고객명</td>
		<td class="i_title" bgcolor="#e6e6e6">항공 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">리조트 계약금</td>
		<td class="i_title" bgcolor="#e6e6e6">항공금액 <input type="checkbox" name="add14_1" value="1" <?if($add14[0]=='1'):?>checked="checked"<?endif?> onclick="totalPrice();"></td>
		<td class="i_title" bgcolor="#e6e6e6">리조트금액 <input type="checkbox" name="add14_2" value="1" <?if($add14[1]=='1'):?>checked="checked"<?endif?> onclick="totalPrice();"></td>
		<td class="i_title" bgcolor="#e6e6e6">경유지비용 <input type="checkbox" name="add14_3" value="1" <?if($add14[2]=='1'):?>checked="checked"<?endif?> onclick="totalPrice();"></td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용1 <input type="checkbox" name="add14_4" value="1" <?if($add14[3]=='1'):?>checked="checked"<?endif?> onclick="totalPrice();"></td>
		<td class="i_title" bgcolor="#e6e6e6">기타비용2 <input type="checkbox" name="add14_5" value="1" <?if($add14[4]=='1'):?>checked="checked"<?endif?> onclick="totalPrice();"></td>
		<td class="i_title" bgcolor="#e6e6e6">비 고 <!--<input type="checkbox" name="add14_6" value="1" <?if($add14[5]=='1'):?>checked="checked"<?endif?> onclick="totalPrice();">--></td>
	</tr>

<?$j=1;?>
<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<tr id="cost<?=$i?>" <?if($i>0&&!$add10[$k]):?>style="display:none"<?endif?>  >
		<td><input type="text" name="add10_<?=$j++;?>" id="cpyName<?=$i?>" class="i_normal" value="<?=$add10[$k++]?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" onblur="totalPrice();" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" onblur="totalPrice();" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" onblur="totalPrice();" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" onblur="totalPrice();" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" onblur="totalPrice();" /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" onblur="totalPrice();"  /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal" value="<?=($add10[$k++])?$add10[$k-1]:'0'?>" onblur="totalPrice();"  /></td>
		<td><input type="text" name="add10_<?=$j++;?>" class="i_normal_2" value="<?=($add10[$k++])?>"  /><?if($i!=9):?><input type="button" value="+" onclick="showType('cost<?=$i+1?>','btnCost<?=$i?>');" id="btnCost<?=$i?>" <?if($add10[$k]):?>style="display:none"<?endif?> /><?endif?> </td>
	</tr>
<?endfor?>
<? $today = date("Y-m-d"); ?>
<? $thridDay = date("Y-m-d", strtotime("+3 day"));?>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">입금예정일</td>
		<td><input type="text" name="add11_1" class="i_normal" id="datepicker6"value="<?= (empty($add11[0])? $today : $add11[0]) ?>" ></td>
		<td><input type="text" name="add11_2" class="i_normal" id="datepicker7" value="<?= (empty($add11[1])? $today : $add11[1]) ?>"></td>
		<td><input type="text" name="add11_3" class="i_normal" id="datepicker8" value="<?= (empty($add11[2])? $thridDay : $add11[2]) ?>"></td>
		<td><input type="text" name="add11_4" class="i_normal" onChange="withdrawresort();" id="datepicker9" value="<?=$add11[3]?>"></td>
		<td><input type="text" name="add11_5" class="i_normal" id="datepicker10" value="<?=$add11[4]?>"></td>
		<td><input type="text" name="add11_6" class="i_normal" id="datepicker26" value="<?=$add11[5]?>"></td>
		<td><input type="text" name="add11_7" class="i_normal" id="datepicker27" value="<?=$add11[6]?>"></td>
		<td><input type="text" name="add11_8" class="i_normal" value="<?=$add11[7]?>"></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">출금예정일</td>
		<td><input type="text" name="add11_9" class="i_normal" id="datepicker11" value="<?=$add11[8]?>"></td>
		<td><input type="text" name="add11_10" class="i_normal" id="datepicker12" value="<?=$add11[9]?>"></td>
		<td><input type="text" name="add11_11" class="i_normal" id="datepicker13" value="<?= (empty($add11[10])? $thridDay : $add11[10]) ?>"></td>
		<td><input type="text" name="add11_12" class="i_normal" id="datepicker14" value="<?=$add11[11]?>"></td>
		<td><input type="text" name="add11_13" class="i_normal" id="datepicker28" value="<?=$add11[12]?>"></td>
		<td><input type="text" name="add11_14" class="i_normal" id="datepicker29" value="<?=$add11[13]?>"></td>
		<td><input type="text" name="add11_25" class="i_normal" id="datepicker30" value="<?=$add11[14]?>"></td>
		<td><input type="text" name="add11_16" class="i_normal" value="<?=$add11[15]?>"></td>
	</tr>
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">예산정산(수익)</td>
		<td class="txt2"><input type="text" name="add11_26" class="i_normal" value="<?=$add11[16]?>"></td>
		<td class="txt2"><input type="text" name="add11_18" class="i_normal" value="<?=$add11[17]?>"></td>
		<td class="txt2"><input type="text" name="add11_19" class="i_normal" value="<?=$add11[18]?>"></td>
		<td class="txt2"><input type="text" name="add11_20" class="i_normal" value="<?=$add11[19]?>"></td>
		<td class="txt2"><input type="text" name="add11_21" class="i_normal" value="<?=$add11[20]?>"></td>
		<td class="txt2"><input type="text" name="add11_22" class="i_normal" value="<?=$add11[21]?>"></td>
		<td class="txt2"><input type="text" name="add11_23" class="i_normal" value="<?=$add11[22]?>"></td>
		<td class="txt2"><input type="text" name="add11_24" class="i_normal" value="<?=$add11[23]?>"></td>
	</tr>
	<tr>
		<td class="i_title" bgcolor="#e6e6e6">비고</td>
		<td colspan="8"><input type="text" name="add11_27" class="i_normal" style="width:100%" value="<?=$add11[24]?>"></td>
	</tr>
<!--
	<tr >
		<td class="i_title" bgcolor="#e6e6e6">결제수단</td>
		<td><select name="add11_17">
				<option value="현금" <?if($add11[16]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[16]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[16]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[16]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_18">
				<option value="현금" <?if($add11[17]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[17]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[17]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[17]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_19">
				<option value="현금" <?if($add11[18]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[18]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[18]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[18]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_20">
				<option value="현금" <?if($add11[19]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[19]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[19]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[19]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_21">
				<option value="현금" <?if($add11[20]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[20]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[20]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[20]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_22">
				<option value="현금" <?if($add11[21]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[21]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[21]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[21]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_23">
				<option value="현금" <?if($add11[22]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[22]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[22]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[22]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td><select name="add11_24">
				<option value="현금" <?if($add11[23]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add11[23]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add11[23]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add11[23]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
	</tr>
-->
	<tr>
		<td colspan="9" style="border:0;color:black;">&nbsp;※ 금액필드는 빈칸없이 '0원'이라도 입력되어 있어야됩니다.</td>
	</tr>
	<tr>
		<td colspan="9" style="border:0;color:black;">
			<li id="toggle">
				<a id="open" class="open">정산열기▼</a>
				<a id="close" style="display: none;" class="close">정산닫기▲</a>			
			</li>		
		</td>
	</tr>
				
</table>

<div id="stats" style="height:850px;display:none" >
  <table width="100%" style="border-collapse:collapse; " id="ttid_1"  cellpadding="0" cellspacing="0" >
	  <tr>
		<td colspan="12" align="center" bgcolor="#cccccc"><span class="style4"><strong>입금정보(고객)</strong></span></td>
	  </tr>
	  <tr>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금1</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_1" class="i_normal" id="datepicker31" value="<?=$add15[0]?>"></td>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금2</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_6" class="i_normal" id="datepicker32" value="<?=$add15[5]?>"></td>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금3</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_11" class="i_normal" id="datepicker33" value="<?=$add15[10]?>"></td>
		<td rowspan="3" width="80" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금4</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_16" class="i_normal" id="datepicker34" value="<?=$add15[15]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_2">
				<option value="계약금" <?if($add15[1]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[1]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[1]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[1]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[1]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[1]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[1]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[1]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_7">
				<option value="계약금" <?if($add15[6]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[6]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[6]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[6]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[6]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[6]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[6]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[6]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_12">
				<option value="계약금" <?if($add15[11]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[11]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[11]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[11]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[11]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[11]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[11]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[11]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_17">
				<option value="계약금" <?if($add15[16]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[16]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[16]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[16]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[16]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[16]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[16]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[16]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  </tr>
	  <tr>
<!--
	  	<td align="center" bgcolor="#f0f0f0">[<span onclick="$('#in1').html('￦');autocal();">KRW</span>,<span onclick="$('#in1').html('$');autocal();">USD</span>]</td>
		<td align="left" bgcolor="#ffffff"><span id="in1">￦</span><input type="text" name="add15_3" onblur="autocal()" class="i_normal" value="<?=$add15[2]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">[<span onclick="$('#in2').html('￦');autocal();">KRW</span>,<span onclick="$('#in2').html('$');autocal();">USD</span>]</td>
		<td align="left" bgcolor="#ffffff"><span id="in2">￦</span><input type="text" name="add15_8" onblur="autocal()" class="i_normal" value="<?=$add15[7]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">[<span onclick="$('#in3').html('￦');autocal();">KRW</span>,<span onclick="$('#in3').html('$');autocal();">USD</span>]</td>
		<td align="left" bgcolor="#ffffff"><span id="in3">￦</span><input type="text" name="add15_13" onblur="autocal()" class="i_normal" value="<?=$add15[12]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">[<span onclick="$('#in4').html('￦');autocal();">KRW</span>,<span onclick="$('#in4').html('$');autocal();">USD</span>]</td>
		<td align="left" bgcolor="#ffffff"><span id="in4">￦</span><input type="text" name="add15_18" onblur="autocal()" class="i_normal" value="<?=$add15[17]?>"></td>
-->
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in1').html(this.value);autocal();">
					<option value="￦" <?if($add16[0]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[0]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in1"><?=empty($add16[0])?'￦':$add16[0]?></span><input type="text" name="add15_3" onblur="autocal()" class="i_normal" value="<?=$add15[2]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in2').html(this.value);autocal();">
					<option value="￦" <?if($add16[1]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[1]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in2"><?=empty($add16[1])?'￦':$add16[1]?></span><input type="text" name="add15_8" onblur="autocal()" class="i_normal" value="<?=$add15[7]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in3').html(this.value);autocal();">
					<option value="￦" <?if($add16[2]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[2]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in3"><?=empty($add16[2])?'￦':$add16[2]?></span><input type="text" name="add15_13" onblur="autocal()" class="i_normal" value="<?=$add15[12]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in4').html(this.value);autocal();">
					<option value="￦" <?if($add16[3]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[3]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in4"><?=empty($add16[3])?'￦':$add16[3]?></span><input type="text" name="add15_18" onblur="autocal()" class="i_normal" value="<?=$add15[17]?>"></td>

	  </tr>
	  <tr>
		<td>
		  <select name="add15_4">
				<option value="현금" <?if($add15[3]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[3]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[3]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[3]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_5" class="i_normal" value="<?=$add15[4]?>"></td>
		<td>
		  <select name="add15_9">
				<option value="현금" <?if($add15[8]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[8]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[8]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[8]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_10" class="i_normal" value="<?=$add15[9]?>"></td>
		<td>
		  <select name="add15_14">
				<option value="현금" <?if($add15[13]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[13]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[13]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[13]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_15" class="i_normal" value="<?=$add15[14]?>"></td>
		<td>
		  <select name="add15_19">
				<option value="현금" <?if($add15[18]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[8]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[18]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[18]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_20" class="i_normal" value="<?=$add15[19]?>"></td>
	  </tr>
	  <tr></tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금5</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_21" class="i_normal" id="datepicker35" value="<?=$add15[20]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금6</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_26" class="i_normal" id="datepicker36" value="<?=$add15[25]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금7</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_31" class="i_normal" id="datepicker37" value="<?=$add15[30]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금8</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_36" class="i_normal" id="datepicker38" value="<?=$add15[35]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_22">
				<option value="계약금" <?if($add15[21]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[21]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[21]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[21]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[21]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[21]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[21]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[21]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_27">
				<option value="계약금" <?if($add15[26]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[26]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[26]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[26]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[26]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[26]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[26]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[26]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_32">
				<option value="계약금" <?if($add15[31]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[31]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[31]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[31]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[31]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[31]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[31]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[31]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_37">
				<option value="계약금" <?if($add15[36]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[6]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[36]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[36]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[36]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[36]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[36]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[36]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
			</select>
		</td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in5').html(this.value);autocal();">
					<option value="￦" <?if($add16[4]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[4]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in5"><?=empty($add16[4])?'￦':$add16[4]?></span><input type="text" name="add15_23" onchange="autocal()" class="i_normal" value="<?=$add15[22]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in6').html(this.value);autocal();">
					<option value="￦" <?if($add16[5]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[5]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in6"><?=empty($add16[5])?'￦':$add16[5]?></span><input type="text" name="add15_28" onchange="autocal()" class="i_normal" value="<?=$add15[27]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in7').html(this.value);autocal();">
					<option value="￦" <?if($add16[6]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[6]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in7"><?=empty($add16[6])?'￦':$add16[6]?></span><input type="text" name="add15_33" onchange="autocal()" class="i_normal" value="<?=$add15[32]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in8').html(this.value);autocal();">
					<option value="￦" <?if($add16[7]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[7]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in8"><?=empty($add16[7])?'￦':$add16[7]?></span><input type="text" name="add15_38" onchange="autocal()" class="i_normal" value="<?=$add15[37]?>"></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_24">
				<option value="현금" <?if($add15[23]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[23]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[23]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[23]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_25" class="i_normal" value="<?=$add15[24]?>"></td>
		<td>
		  <select name="add15_29">
				<option value="현금" <?if($add15[28]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[28]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[28]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[28]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_30" class="i_normal" value="<?=$add15[29]?>"></td>
		<td>
		  <select name="add15_34">
				<option value="현금" <?if($add15[33]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[33]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[33]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[33]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_35" class="i_normal" value="<?=$add15[34]?>"></td>
		<td>
		  <select name="add15_39">
				<option value="현금" <?if($add15[38]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[38]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[38]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[38]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_40" class="i_normal" value="<?=$add15[39]?>"></td>
	  </tr>
	  <tr>
		<td colspan="12" align="center" bgcolor="#cccccc"><span class="style4"><strong>출금정보(고객)</strong></span></td>
	  </tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금1</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_41" class="i_normal" id="datepicker39" value="<?=$add15[40]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금2</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_46" class="i_normal" id="datepicker40" value="<?=$add15[45]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금3</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_51" class="i_normal" id="datepicker41" value="<?=$add15[50]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금4</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_56" class="i_normal" id="datepicker42" value="<?=$add15[55]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_42">
				<option value="계약금" <?if($add15[41]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[41]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[41]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[41]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[41]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[41]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[41]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[41]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[41]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_47">
				<option value="계약금" <?if($add15[46]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[46]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[46]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[46]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[46]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[46]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[46]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[46]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[46]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_52">
				<option value="계약금" <?if($add15[51]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[51]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[51]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[51]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[51]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[51]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[51]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[51]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[51]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_57">
				<option value="계약금" <?if($add15[56]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[56]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[56]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[56]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[6]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[56]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[56]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[56]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[56]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in9').html(this.value);autocal();">
					<option value="￦" <?if($add16[8]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[8]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in9"><?=empty($add16[8])?'￦':$add16[8]?></span><input type="text" name="add15_43" onchange="autocal()" class="i_normal" value="<?=$add15[42]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in10').html(this.value);autocal();">
					<option value="￦" <?if($add16[9]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[9]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in10"><?=empty($add16[9])?'￦':$add16[9]?></span><input type="text" name="add15_48" onchange="autocal()" class="i_normal" value="<?=$add15[47]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in11').html(this.value);autocal();">
					<option value="￦" <?if($add16[10]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[10]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in11"><?=empty($add16[10])?'￦':$add16[10]?></span><input type="text" name="add15_53" onchange="autocal()" class="i_normal" value="<?=$add15[52]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in12').html(this.value);autocal();">
					<option value="￦" <?if($add16[11]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[11]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in12"><?=empty($add16[11])?'￦':$add16[11]?></span><input type="text" name="add15_58" onchange="autocal()" class="i_normal" value="<?=$add15[57]?>"></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_44">
				<option value="현금" <?if($add15[43]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[43]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[43]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[43]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_45" class="i_normal" value="<?=$add15[44]?>"></td>
		<td>
		  <select name="add15_49">
				<option value="현금" <?if($add15[48]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[48]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[48]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[48]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_50" class="i_normal" value="<?=$add15[49]?>"></td>
		<td>
		  <select name="add15_54">
				<option value="현금" <?if($add15[53]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[53]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[53]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[53]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_55" class="i_normal" value="<?=$add15[54]?>"></td>
		<td>
		  <select name="add15_59">
				<option value="현금" <?if($add15[58]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[58]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[58]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[58]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_60" class="i_normal" value="<?=$add15[59]?>"></td>
	  </tr>
	  <tr></tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금5</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_61" class="i_normal" id="datepicker43" value="<?=$add15[60]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금6</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_66" class="i_normal" id="datepicker44" value="<?=$add15[65]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금7</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_71" class="i_normal" id="datepicker45" value="<?=$add15[70]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금8</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_76" class="i_normal" id="datepicker46" value="<?=$add15[75]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_62">
				<option value="계약금" <?if($add15[61]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[61]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[61]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[61]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[61]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[61]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[61]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[61]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[61]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_67">
				<option value="계약금" <?if($add15[66]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[66]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[66]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[66]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[66]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[66]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[66]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[66]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[66]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_72">
				<option value="계약금" <?if($add15[71]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[71]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[71]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[71]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[71]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[71]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[71]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[71]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[71]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_77">
				<option value="계약금" <?if($add15[76]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[76]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[76]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[76]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[76]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[76]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[76]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[76]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[76]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in13').html(this.value);autocal();">
					<option value="￦" <?if($add16[12]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[12]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in13"><?=empty($add16[12])?'￦':$add16[12]?></span><input type="text" name="add15_63" onchange="autocal()" class="i_normal" value="<?=$add15[62]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in14').html(this.value);autocal();">
					<option value="￦" <?if($add16[13]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[13]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in14"><?=empty($add16[13])?'￦':$add16[13]?></span><input type="text" name="add15_68" onchange="autocal()" class="i_normal" value="<?=$add15[67]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in15').html(this.value);autocal();">
					<option value="￦" <?if($add16[14]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[14]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in15"><?=empty($add16[14])?'￦':$add16[14]?></span><input type="text" name="add15_73" onchange="autocal()" class="i_normal" value="<?=$add15[72]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in16').html(this.value);autocal();">
					<option value="￦" <?if($add16[15]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[15]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in16"><?=empty($add16[15])?'￦':$add16[15]?></span><input type="text" name="add15_78" onchange="autocal()" class="i_normal" value="<?=$add15[77]?>"></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_64">
				<option value="현금" <?if($add15[63]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[63]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[63]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[63]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_65" class="i_normal" value="<?=$add15[64]?>"></td>
		<td>
		  <select name="add15_69">
				<option value="현금" <?if($add15[68]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[68]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[68]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[68]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_70" class="i_normal" value="<?=$add15[69]?>"></td>
		<td>
		  <select name="add15_74">
				<option value="현금" <?if($add15[73]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[73]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[73]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[73]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_75" class="i_normal" value="<?=$add15[74]?>"></td>
		<td>
		  <select name="add15_79">
				<option value="현금" <?if($add15[78]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[78]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[78]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[78]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_80" class="i_normal" value="<?=$add15[79]?>"></td>
	  </tr>
	  <tr></tr>
	  <tr>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금9</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_81" class="i_normal" id="datepicker47" value="<?=$add15[80]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금10</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_86" class="i_normal" id="datepicker48" value="<?=$add15[85]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금11</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_91" class="i_normal" id="datepicker49" value="<?=$add15[90]?>"></td>
		<td rowspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금12</span></td>
		<td align="center" bgcolor="#f0f0f0">날짜</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_96" class="i_normal" id="datepicker50" value="<?=$add15[95]?>"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_82">
				<option value="계약금" <?if($add15[81]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[81]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[81]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[81]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[81]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[81]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[81]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[81]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[81]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_87">
				<option value="계약금" <?if($add15[86]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[86]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[86]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[86]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[86]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[86]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[86]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[86]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[86]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_92">
				<option value="계약금" <?if($add15[91]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[91]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[91]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[91]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[91]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[91]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[91]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[91]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[91]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  	<td align="center" bgcolor="#f0f0f0">항목</td>
		<td align="left" bgcolor="#ffffff">
		  <select name="add15_97">
				<option value="계약금" <?if($add15[96]=='계약금'):?>selected="selected"<?endif?>>계약금</option>
				<option value="리조트잔금" <?if($add15[96]=='리조트잔금'):?>selected="selected"<?endif?>>리조트잔금</option>
				<option value="항공잔금" <?if($add15[96]=='항공잔금'):?>selected="selected"<?endif?>>항공잔금</option>
				<option value="기타비용" <?if($add15[96]=='계약기타비용금'):?>selected="selected"<?endif?>>기타비용</option>
				<option value="경유지비용" <?if($add15[96]=='경유지비용'):?>selected="selected"<?endif?>>경유지비용</option>
				<option value="픽업샌딩" <?if($add15[96]=='픽업샌딩'):?>selected="selected"<?endif?>>픽업샌딩</option>
				<option value="기타지상비용" <?if($add15[96]=='기타지상비용'):?>selected="selected"<?endif?>>기타지상비용</option>
				<option value="보험료" <?if($add15[96]=='보험료'):?>selected="selected"<?endif?>>보험료</option>
				<option value="사은품" <?if($add15[96]=='사은품'):?>selected="selected"<?endif?>>사은품</option>
			</select>
		</td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in17').html(this.value);autocal();">
					<option value="￦" <?if($add16[16]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[16]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in17"><?=empty($add16[16])?'￦':$add16[16]?></span><input type="text" name="add15_83" onchange="autocal()" class="i_normal" value="<?=$add15[82]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in18').html(this.value);autocal();">
					<option value="￦" <?if($add16[17]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[17]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in18"><?=empty($add16[17])?'￦':$add16[17]?></span><input type="text" name="add15_88" onchange="autocal()" class="i_normal" value="<?=$add15[87]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in19').html(this.value);autocal();">
					<option value="￦" <?if($add16[18]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[18]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in19"><?=empty($add16[18])?'￦':$add16[18]?></span><input type="text" name="add15_93" onchange="autocal()" class="i_normal" value="<?=$add15[92]?>"></td>
	  	<td align="center" bgcolor="#f0f0f0">
			<select onchange="$('#in20').html(this.value);autocal();">
					<option value="￦" <?if($add16[19]=='￦'):?>selected="selected"<?endif?>>KRW</option>
					<option value="$" <?if($add16[19]=='$'):?>selected="selected"<?endif?>>USD</option>
			</select>
		</td>
		<td align="left" bgcolor="#ffffff"><span id="in20"><?=empty($add16[19])?'￦':$add16[19]?></span><input type="text" name="add15_98" onchange="autocal()" class="i_normal" value="<?=$add15[97]?>"></td>
	  </tr>
	  <tr>
		<td>
		  <select name="add15_84">
				<option value="현금" <?if($add15[83]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[83]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[83]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[83]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_85" class="i_normal" value="<?=$add15[84]?>"></td>
		<td>
		  <select name="add15_89">
				<option value="현금" <?if($add15[88]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[88]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[88]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[88]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_90" class="i_normal" value="<?=$add15[89]?>"></td>
		<td>
		  <select name="add15_94">
				<option value="현금" <?if($add15[73]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[73]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[73]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[73]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_95" class="i_normal" value="<?=$add15[94]?>"></td>
		<td>
		  <select name="add15_99">
				<option value="현금" <?if($add15[78]=='현금'):?>selected="selected"<?endif?>>현금</option>
				<option value="카드" <?if($add15[78]=='카드'):?>selected="selected"<?endif?>>카드</option>
				<option value="현금+카드" <?if($add15[78]=='현금+카드'):?>selected="selected"<?endif?>>현금+카드</option>
				<option value="기타" <?if($add15[78]=='기타'):?>selected="selected"<?endif?>>기타</option>
			</select>
		</td>
		<td align="center" bgcolor="#f0f0f0">비고</td>
		<td align="left" bgcolor="#ffffff"><input type="text" name="add15_100" class="i_normal" value="<?=$add15[99]?>"></td>
	  </tr>


	  <tr>
		<td colspan="12" align="center" bgcolor="#cccccc"><span class="style4"><strong> 요금 정산 함계 </strong> </span></td>
	  </tr>
	  <tr>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">입금총액</span></td>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">출금총액</span></td>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4">수익</span></td>
		<td colspan="3" height="20" align="center" bgcolor="#E6E6E6" border="0"><span class="style4"></span></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#ffffff">KRW</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><input type="text" name="add15_101" style="border:0" value="<?=$add15[100]?>"></td>
	  	<td align="center" bgcolor="#ffffff">KRW</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><input type="text" name="add15_102" style="border:0" value="<?=$add15[101]?>"></td>
	  	<td align="center" bgcolor="#ffffff">KRW</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><input type="text" name="add15_103" style="border:0" value="<?=$add15[102]?>"></td>
	  	<td align="center" bgcolor="#ffffff"></td>
		<td colspan="2" align="left" bgcolor="#ffffff"></td>
	  </tr>
	  <tr>
	  	<td align="center" bgcolor="#ffffff">USD</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><input type="text" name="add15_104" style="border:0" value="<?=$add15[103]?>"></td>
	  	<td align="center" bgcolor="#ffffff">USD</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><input type="text" name="add15_105" style="border:0" value="<?=$add15[104]?>"></td>
	  	<td align="center" bgcolor="#ffffff">USD</td>
		<td colspan="2" align="right" bgcolor="#ffffff"><input type="text" name="add15_106" style="border:0" value="<?=$add15[105]?>"></td>
	  	<td align="center" bgcolor="#ffffff"></td>
		<td colspan="2" align="left" bgcolor="#ffffff"></td>
	  </tr>
  </table>
</div>

<!--작업자리 2222222222222222222222222-->






		</td>
		<?php if(!$my['id']):?>
		<tr>
		<td class="td1">작성자명</td>
		<td class="td2">
			<input size="20" type="text" name="name" value="<?php echo $R['name']?>" class="input subject" />
		</td>
		</tr>
		<?php if(!$R['uid']||$reply=='Y'):?>
		<tr>
		<td class="td1">비밀번호</td>
		<td class="td2">
			<input size="20" type="password" name="pw" value="<?php echo $R['pw']?>" class="input subject" />
			<?php if($R['hidden']&&$reply=='Y'):?>
			<div class="guide">
			<img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" />
			비밀답변은 비번을 수정하지 않아야 원게시자가 열람할 수 있습니다.
			</div>
			<?php endif?>
		</td>
		</tr>
		<?php endif?>
		<?php endif?>



	</table>


	<table style="display:none">
		<?php if($d['theme']['show_wtag']):?>
		<tr>
		<td class="td1">검색태그</td>
		<td class="td2">
			<input size="80" type="text" name="tag" value="<?php echo $R['tag']?>" class="input subject" />
			<img src="<?php echo $g['img_core']?>/_public/ico_q.gif" alt="도움말" title="도움말" class="hand" onclick="layerShowHide('bbsTag','block','none');" />
			<div id="bbsTag" class="guide hide">
			<img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" />
			이 게시물을 가장 잘 표현할 수 있는 단어를 콤마(,)로 구분해서 입력해 주세요.
			</div>			
		</td>
		</tr>
		<?php endif?>

		<?php if($d['theme']['show_trackback']):?>
		<tr>
		<td class="td1">엮을주소</td>
		<td class="td2">
			<input size="80" type="text" name="trackback" value="" class="input subject" />
			<img src="<?php echo $g['img_core']?>/_public/ico_q.gif" alt="도움말" title="도움말" class="hand" onclick="layerShowHide('bbsTrackback','block','none');" />
			<div id="bbsTrackback" class="guide hide">
			<img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" />
			이 게시물을 보낼 트랙백주소를 입력해 주세요.
			</div>				
		</td>
		</tr>
		<?php endif?>


		<?php if((!$R['uid']||$reply=='Y')&&is_file($g['path_module'].$d['bbs']['snsconnect'])):?>
		<tr>
		<td class="td1" style="padding-top:18px;">소셜연동</td>
		<td class="td2 shift">
			<br />
			<?php include_once $g['path_module'].$d['bbs']['snsconnect']?> 에도 게시물을 등록합니다.
		</td>
		</tr>
		<?php endif?>

		<tr>
		<td class="td1"></td>
		<td class="td2">
			<div class="after">
			게시물 등록(수정/답변)후
			<input type="radio" name="backtype" id="backtype1" value="view"<?php if($_SESSION['bbsback']=='view'):?> checked="checked"<?php endif?> /><label for="backtype1">목록으로 이동</label>
			<input type="radio" name="backtype" id="backtype2" value="view"<?php if(!$_SESSION['bbsback'] || $_SESSION['bbsback']=='view'):?> checked="checked"<?php endif?> /><label for="backtype2">본문으로 이동</label>
			<input type="radio" name="backtype" id="backtype3" value="now"<?php if($_SESSION['bbsback']=='now'):?> checked="checked"<?php endif?> /><label for="backtype3">이 화면 유지</label>
			</div>
		</td>
		</tr>
	</table>

	<div class="bottombox">
		<input type="button" value="취소" class="btngray" onclick="cancelCheck();" />
		<input type="submit" value="확인" class="btnblue" />
	</div>

	</form>


</div>
