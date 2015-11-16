
<!-- bc 라운지 제공소스 -->
<link rel="stylesheet" type="text/css" href="http://loung.bccard.com/front/tour/css/tour.css" />
<link rel="stylesheet" type="text/css" href="<?=$g['img_module_skin']?>/css/trevia.css" /><!-- 트레비아 페이지 관련 CSS -->

<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/common.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/main_rolling.js"></script>
<script type="text/javascript" src="http://loung.bccard.com/front/loung/js/jquery.bxSlider.min.js"></script>
<!-- bc 라운지 제공소스 -->


<SCRIPT src="<?=$g['img_module_skin']?>/jquery-1.4.2.min.js" type=text/javascript></SCRIPT>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/base/jquery-ui.css" rel="stylesheet" />


<script language="JavaScript" type="text/javascript">
//email value setting
function setEmail(v) {

inForm = document.writeForm;

if(v == "etc"){
inForm.add_txt5.value = "";
inForm.add_txt5.readOnly = false;
inForm.add_txt5.focus();

}else{
inForm.add_txt5.readOnly = true;
inForm.add_txt5.value = v;
}
}


</script>


<div id="contents_wrap">

<div id="bbswrite">

<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="http://loung.bccard.com/front/tour/img/main/h3_tour_oversea.gif" alt="해외여행" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<?=$g['img_module_skin']?>/stit_overseas.jpg" alt="라운지투어는 하나투어, 모두투어, 한진관광, 레드캡투어와 제휴하여 해외여행 서비스를 제공하고 있습니다."  /></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<?=$g['img_module_skin']?>/title_w_01.gif"></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<?=$g['img_module_skin']?>/w_text_01.gif"></td>
  </tr>
</table>

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
	<input type="hidden" name='adddata' value="">



<style type="text/css">
    <!--
    .ui-datepicker { font:12px dotum; }
    .ui-datepicker select.ui-datepicker-month, 
    .ui-datepicker select.ui-datepicker-year { width: 70px;}
    .ui-datepicker-trigger { margin:0 0 -5px 2px; }
    -->
    </style>
    <script type="text/javascript">
    jQuery(function($){
            $.datepicker.regional['ko'] = {
                    closeText: '닫기',
                    prevText: '이전달',
                    nextText: '다음달',
                    currentText: '오늘',
                    monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)',
                    '7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
                    monthNamesShort: ['1월','2월','3월','4월','5월','6월',
                    '7월','8월','9월','10월','11월','12월'],
                    dayNames: ['일','월','화','수','목','금','토'],
                    dayNamesShort: ['일','월','화','수','목','금','토'],
                    dayNamesMin: ['일','월','화','수','목','금','토'],
                    weekHeader: 'Wk',
                    dateFormat: 'yy-mm-dd',
                    firstDay: 0,
                    isRTL: false,
        		    minDate: '+0d',
					maxDate: '+750d',     // 2년                
                    showMonthAfterYear: true,
                    yearSuffix: ''};
            $.datepicker.setDefaults($.datepicker.regional['ko']);

        $('#wr_3').datepicker({
            showOn: 'button',
            buttonImage: '<?=$g['img_module_skin']?>/calendar.gif',
            buttonImageOnly: true,
            buttonText: "달력",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            minDate: '+0d',
			maxDate: '+750d',          // 2년  
            yearRange: 'c-99:c+99'
        }); 
    });
    </script>


    <script type="text/javascript">
    jQuery(function($){
            $.datepicker.regional['ko'] = {
                    closeText: '닫기',
                    prevText: '이전달',
                    nextText: '다음달',
                    currentText: '오늘',
                    monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)',
                    '7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
                    monthNamesShort: ['1월','2월','3월','4월','5월','6월',
                    '7월','8월','9월','10월','11월','12월'],
                    dayNames: ['일','월','화','수','목','금','토'],
                    dayNamesShort: ['일','월','화','수','목','금','토'],
                    dayNamesMin: ['일','월','화','수','목','금','토'],
                    weekHeader: 'Wk',
                    dateFormat: 'yy-mm-dd',
                    firstDay: 0,
                    isRTL: false,
                    showMonthAfterYear: true,
                    yearSuffix: ''};
            $.datepicker.setDefaults($.datepicker.regional['ko']);

        $('#wr_4').datepicker({
            showOn: 'button',
            buttonImage: '<?=$g['img_module_skin']?>/calendar.gif',
            buttonImageOnly: true,
            buttonText: "달력",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: 'c-99:c+99'
        }); 
    });
    </script>

<div style="width:700px;background:#ffffff;border:solid 1px #dfdfdf;padding:8px 8px 8px 8px;">
  <table width="700px" class="bbs-view mgb20">
    <colgroup>
    <col style="width:150px;" />
    <col />
    </colgroup>
    <tbody>
      
      <?php if($B['category']):$_catexp = explode(',',$B['category']);$_catnum=count($_catexp)?>
      <tr>
        <th height="30"><span class="td1">카테고리</span></th>
        <td style="width:250px;padding:10px 10px 10px 10px;"><select name="category">
            <option value="">&nbsp;+ <?php echo $_catexp[0]?>선택</option>
            <option value="">-----------------------------------------------------------------------------------------</option>
            <?php for($i = 1; $i < $_catnum; $i++):if(!$_catexp[$i])continue;?>
            <option value="<?php echo $_catexp[$i]?>"<?php if($_catexp[$i]==$R['category']||$_catexp[$i]==$cat):?> selected="selected"<?php endif?>>ㆍ<?php echo $_catexp[$i]?>
            <?php if($d['theme']['show_catnum']):?>
          (<?php echo getDbRows($table[$m.'data'],'site='.$s.' and notice=0 and bbs='.$B['uid']." and category='".$_catexp[$i]."'")?>)
          <?php endif?>
            </option>
            <?php endfor?>
          </select>
            <?php if($my['admin']):?>
            <a href="./?m=admin&amp;module=<?php echo $m?>&amp;uid=5" target="_blank"><img src="<?php echo $g['img_core']?>/_public/btn_add.gif" alt="추가" title="추가" /></a>
            <?php endif?></td>
      </tr>
      <?php endif?>
	  
        <input type="hidden" name="subject" value="여행견적요청" style="width:350px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;" />

        <?php if($d['theme']['use_hidden']==1):?>
        <input type="checkbox" name="hidden" value="1"<?php if($R['hidden']):?> checked="checked"<?php endif?> />
        비밀글
        <?php elseif($d['theme']['use_hidden']==2):?>
        <input type="hidden" name="hidden" value="1" />
        <?php endif?>
		
		  

      <tr>
        <th height="30"><span style="color: #FF0000;">*</span> 이 름</th>
        <td style="padding:10px 10px 10px 10px;"><input size="20" type="text" name="name" value="<?php echo $R['name']?>" style="width:150px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;" /></td>
      </tr>

       <tr>
        <th height="30"><span style="color: #FF0000;">*</span> 비밀번호</th>
        <td style="padding:10px 10px 10px 10px;"> <input size="20" type="password" name="pw" value="<?php echo $R['pw']?>" style="width:150px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;" /></td>
      </tr>

      <tr>
        <th height="30"><span style="color: #FF0000;">*</span>  연락처</th>
        <td style="padding:10px 10px 10px 10px;">
		    <select name="add_txt1" style="width:100px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;">
  <option value="" selected>선택하세요</option>
  <option value="010" <?if ($R['add_txt1'] == '010') echo "selected"?>>010</option>
  <option value="011" <?if ($R['add_txt1'] == '011') echo "selected"?>>011</option>
  <option value="016" <?if ($R['add_txt1'] == '016') echo "selected"?>>016</option>
  <option value="017" <?if ($R['add_txt1'] == '017') echo "selected"?>>017</option>
  <option value="018" <?if ($R['add_txt1'] == '018') echo "selected"?>>018</option>
  <option value="019" <?if ($R['add_txt1'] == '019') echo "selected"?>>019</option>
</select> - 
		    <input type=text name=add_txt2 class="input subject"  value='<?php echo $R['add_txt2']?>' style="width:100px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;"  /> - 
		    <input type=text name=add_txt3 class="input subject"  value='<?php echo $R['add_txt3']?>' style="width:100px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;"  /></td>
      </tr>
	  <tr>
        <th height="30"><span style="color: #FF0000;">*</span>  이메일</th>
        <td style="padding:10px 10px 10px 10px;">
		<input type=text name=add_txt4 class="input subject"  value='<?php echo $R['add_txt4']?>' style="width:140px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;"  /> @
		<input type=text name=add_txt5 class="input subject"  value='<?php echo $R['add_txt5']?>' style="width:140px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;"  /> 
		<select name="Email_select" class="inputForm" style="width:140px;height:26px;font-weight:bold;border:solid 1px #dfdfdf;" onchange="javascript:setEmail(this.value)">
<option value="">선택하세요</option>
<option value='naver.com'>naver.com</option>
<option value='gmail.com'>gmail.com</option>
<option value='daum.net'>daum.net</option>
<option value='nate.com'>nate.com</option>
<option value='hanmail.net'>hanmail.net</option>
<option value='hotmail.com'>hotmail.com</option>
<option value='dreamwiz.com'>dreamwiz.com</option>
<option value='korea.com'>korea.com</option>
<option value="etc">선택취소</option>
</select></td>
      </tr>
      <tr>
        <th height="30">여행 출발일</th>
        <td style="padding:10px 10px 10px 10px;"><input class="input subject" type=text id='wr_3' name='add_txt6' style="width:206px;height:24px;font-weight:bold;border:solid 1px #dfdfdf;"  maxlength=110  minlength=10 required itemname= '출발일' value="<?php echo $R['add_txt6']?>" readonly title='옆의 달력 아이콘을 클릭하여 출발일 입력하세요.'></td>
      </tr>
      <tr>
        <th>문의사항</th>
        <td style="padding:10px 10px 10px 10px;"><textarea type="text" name="content" rows="7" style="width:500px;font-weight:bold;border:solid 1px #dfdfdf;" onfocus="if (this.value=='희망여행지역/여행기간/희망리조트/대략의 예산등의 정보를 기재해주세요.'){this.value='';};return false;" onblur="if (this.value==''){this.value='희망여행지역/여행기간/희망리조트/대략의 예산등의 정보를 기재해주세요.';return false;}"><?if($R['content']):?><?php echo $R['content']?><?else:?>희망여행지역/여행기간/희망리조트/대략의 예산등의 정보를 기재해주세요.<?endif?></textarea></td>
      </tr>
    </tbody>
  </table>
</div>

<div style="margin-top:20px;"></div>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="24"><img src="<?=$g['img_module_skin']?>/w_ico_01.gif" width="12" height="12" align="absmiddle"> 개인정보 수집의 목적 및 활용동의</td>
  </tr>
  <tr>
    <td><div style="width:710;height:100px;line-height:17px;background:#ffffff;border:solid 1px #dfdfdf;padding:10px 10px 10px 10px; overflow-x:scroll; overflow-y:scroll;">
<?php include_once $g['dir_module_skin'].'/inc/agree_text1.php'?>
</div></td>
  </tr>
  <tr>
    <td><input name="agreecheckbox1" type="checkbox" value="1" > 이용약관에 동의 합니다.</td>
  </tr>
</table>

<div style="margin-top:20px;"></div>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="24"><img src="<?=$g['img_module_skin']?>/w_ico_01.gif" width="12" height="12" align="absmiddle"> 개인정보 제3자 제공 및 공유안내</td>
  </tr>
  <tr>
    <td><div style="width:710;height:100px;line-height:17px;background:#ffffff;border:solid 1px #dfdfdf;padding:10px 10px 10px 10px; overflow-x:scroll; overflow-y:scroll;">
<?php include_once $g['dir_module_skin'].'/inc/agree_text2.php'?>
</div></td>
  </tr>
  <tr>
    <td><input name="agreecheckbox2" type="checkbox" value="1" > 이용약관에 동의 합니다.</td>
  </tr>
</table>



	<div class="bottombox">
		<input type="image" value="<?if($uid):?>수정<?else:?>확인<?endif;?>" src="<?=$g['img_module_skin']?>/w_write.gif" width="300" height="50" />
	</div>
<input type="hidden" name="backtype" id="backtype2" value="view" checked="checked"/>
	</form>


</div>

<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?=$g['img_module_skin']?>/w_text_02.gif"></td>
  </tr>
</table>

</div>