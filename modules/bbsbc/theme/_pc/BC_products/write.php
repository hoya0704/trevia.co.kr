<SCRIPT src="<?=$g['img_module_skin']?>/jquery-1.4.2.min.js" type=text/javascript></SCRIPT>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=$g['img_module_skin']?>/common.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/base/jquery-ui.css" rel="stylesheet" />
<script>
CATEGORY_NODE = new Coditech.Framework.Category("SROOT","");
addCategory(CATEGORY_NODE,"","+ 선택하세요.  ");
addCategory(CATEGORY_NODE.get(0),"","+ 선택하세요.  ");
<?
for($cs=0;$cs<count($rcate);$cs++){
	$catcount = $cs+1;
	$ser = explode(":",$rcate[$cs]);
	if(trim($ser[0]) !=""){
		echo "addCategory(CATEGORY_NODE,\"".trim($ser[0])."\",\"".trim($ser[0])."\");\n";
		echo "addCategory(CATEGORY_NODE.get(".$catcount."),\"\",\" + 선택하세요. \");\n";
		$ser_option = explode(",",$ser[1]);
		for($ws=0;$ws<count($ser_option);$ws++){
			if(trim($ser_option[$ws]) != ""){
				echo "addCategory(CATEGORY_NODE.get(".$catcount."),\"".trim($ser_option[$ws])."\",\"".trim($ser_option[$ws])."\");\n";
			}
		}		
	}
}
?>
</script>

<script language="JavaScript" type="text/javascript">
//============================================================
// 금액숫자에 ',' 붙이기
//============================================================
function money_point(str){ //함수형
str = parseInt(str,10);
str = str.toString().replace(/[^-0-9]/g,'');
while(str.match(/^(-?\d+)(\d{3})/)) { 
str = str.replace(/^(-?\d+)(\d{3})/, '$1,$2'); 
} 
return str;
}
String.prototype.money_point = function(){ //프로토타입형
str=this;
str = parseInt(str,10);
str = str.toString().replace(/[^-0-9]/g,'');
while(str.match(/^(-?\d+)(\d{3})/)) { 
str = str.replace(/^(-?\d+)(\d{3})/, '$1,$2'); 
} 
return str;
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
	<input type="hidden" name='adddata' value="">


<?php $adddata_exp=explode("|" , $R['adddata'])?>


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
					maxDate: '+730d',      // 2 년                      
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
			maxDate: '+730d',     // 2 년       
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

<div style="background:#ffffff;border:solid 1px #dfdfdf;padding:8px 8px 8px 8px;">
  <table width="300" class="bbs-view mgb20">
    <colgroup>
    <col style="width:130px;" />
    <col />
    </colgroup>
    <tbody>
      <?php if(!$my['id']):?>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />작성자명</th>
        <td class="td2"><input size="20" type="text" name="name" value="<?php echo $R['name']?>" class="input subject" /></td>
      </tr>
      <?php if(!$R['uid']||$reply=='Y'):?>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />비밀번호</th>
        <td><input size="20" type="password" name="pw" value="<?php echo $R['pw']?>" class="input subject" />
            <?php if($R['hidden']&&$reply=='Y'):?>
            <div class="guide"> <img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" /> 비밀답변은 비번을 수정하지 않아야 원게시자가 열람할 수 있습니다. </div>
            <?php endif?></td>
      </tr>
      <?php endif?>
      <?php endif?>
      <?php if($B['category']):$_catexp = explode(',',$B['category']);$_catnum=count($_catexp)?>
      <tr>
        <th><span class="td1"><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />카테고리</span></th>
        <td><select name="category" style="width:180px">
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
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />제목</th>
        <td class="td2"><input type="text" name="subject" value="<?php echo htmlspecialchars($R['subject'])?>" class="input subject" /></td>
      </tr>
	  <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />노출관리</th>
        <td class="td2">              <span class="check">
           <?php if($my['admin']):?>
              <input type="checkbox" name="notice" value="1"<?php if($R['notice']):?> checked="checked"<?php endif?> /> 체크시 노출 안됌 <br>
			  <input type="checkbox" name='add_int1' value="1" <?if($R['add_int1']):?> checked<?endif;?>> 체크시 메인 큰이미지 6개 부분 슬라이드에 노출 <br>
			  <input type="checkbox" name='add_int2' value="1" <?if($R['add_int2']):?> checked<?endif;?>> 체크시 메인 중간 이미지 4개 부분에 노출 <br>
			  <input type="checkbox" name='add_int3' value="1" <?if($R['add_int3']):?> checked<?endif;?>> 체크시 메인 하단 인기지역 허니문 / 가족여행 부분에 노출 
          <?php endif?>

          </span> </td></tr>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />지역구분</th>
        <td><select onchange=setSubSelect(document.writeForm,this); name=add_txt2 style=width:90px>
    <OPTION value="" selected>선택하세요</OPTION>
    <OPTION value="멕시코" <?if ($R['add_txt2'] == '멕시코') echo "selected"?>>멕시코</OPTION> 
    <OPTION value="몰디브" <?if ($R['add_txt2'] == '몰디브') echo "selected"?>>몰디브</OPTION>
    <OPTION value="모리셔스" <?if ($R['add_txt2'] == '모리셔스') echo "selected"?>>모리셔스</OPTION>
    <OPTION value="세이셸" <?if ($R['add_txt2'] == '세이셸') echo "selected"?>>세이셸</OPTION>
    <OPTION value="인도네시아" <?if ($R['add_txt2'] == '인도네시아') echo "selected"?>>인도네시아</OPTION>
    <OPTION value="태국" <?if ($R['add_txt2'] == '태국') echo "selected"?>>태국</OPTION> 
	<OPTION value="하와이" <?if ($R['add_txt2'] == '하와이') echo "selected"?>>하와이</OPTION> 
	<OPTION value="미주" <?if ($R['add_txt2'] == '미주') echo "selected"?>>미주</OPTION> 
	<OPTION value="베트남" <?if ($R['add_txt2'] == '베트남') echo "selected"?>>베트남</OPTION>
    </SELECT> 

<select name=add_txt3  style=width:90px>
<OPTION value="<?if ($R['add_txt3']) echo "selected"?>" selected><?if($R['add_txt3']):?><?php echo $R['add_txt3']?><?else:?>선택하세요<?endif?></OPTION>
</SELECT></td>
      </tr>
	  <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />옵션정보</th>
        <td><input type=text name=add_txt1 class="input subject"  value='<?php echo $R['add_txt1']?>' style="width:250px"  /> 예) 몰디브 > 수상비행기</td>
      </tr>
	  <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />가격</th>
        <td><input type=text name=add_txt4 class="input subject"  value='<?php echo $R['add_txt4']?>' style="width:100px;TEXT-ALIGN: right"  onChange="this.value = this.value.toString().money_point();" />KRW ~ 
		    <input type=text name=add_txt5 class="input subject"  value='<?php echo $R['add_txt5']?>' style="width:100px;TEXT-ALIGN: right"  onChange="this.value = this.value.toString().money_point();" />KRW</td>
      </tr>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />숙박기간</th>
        <td><input class="input subject" type=text id='wr_3' name='add_txt6' style=width:100px  maxlength=110  minlength=10 required itemname= '시작일' value="<?php echo $R['add_txt6']?>" readonly title='옆의 달력 아이콘을 클릭하여 출발일 입력하세요.'> ~ 
		    <input class="input subject" type=text id='wr_4' name='add_txt7' style=width:100px  maxlength=110  minlength=10 required itemname= '마감일' value="<?php echo $R['add_txt7']?>" readonly title='옆의 달력 아이콘을 클릭하여 도착일 입력하세요.'></td>
      </tr>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />추가내용</th>
        <td><textarea type="text" name="add_txt8" cols="80" rows="7" ><?php echo $R['add_txt8']?></textarea></td>
      </tr>
	  <tr>
        <th>&nbsp;</th>
        <td>추가내용 입력 유의사항 : 아래의 예시를 참고하세요!<br>
		&lt;li&gt;- 성인 1인 기준 금액입니다.&lt;/li&gt;<br>
&lt;li&gt;- 항공권, 리조트, 픽업샌딩 포함&lt;/li&gt;<br>
&lt;li&gt;- 전식이 제공되는 상품입니다.&lt;/li&gt;</td>
      </tr>
    </tbody>
  </table>
</div>

<div style="margin-top:20px;"></div>

<div style="background:#ffffff;border:solid 1px #dfdfdf;padding:8px 8px 8px 8px;">
  <table width="300" class="bbs-view mgb20">
    <colgroup>
    <col style="width:130px;" />
    <col />
    </colgroup>
    <tbody>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />리조트 정보요약</th>
        <td><textarea type="text" name="add_txt9" cols="80" rows="7" ><?php echo $R['add_txt9']?></textarea></td>
      </tr>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />포함내역</th>
        <td><textarea type="text" name="add_txt10" cols="80" rows="7" ><?php echo $R['add_txt10']?></textarea></td>
      </tr>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />불포함내역</th>
        <td><textarea type="text" name="add_txt11" cols="80" rows="7" ><?php echo $R['add_txt11']?></textarea></td>
      </tr>
      <tr>
        <th><img src='<?=$g['img_module_skin']?>/dot_write_01.gif' />유의사항</th>
        <td><textarea type="text" name="add_txt12" cols="80" rows="7" ><?php echo $R['add_txt12']?></textarea></td>
      </tr>
    </tbody>
  </table>
</div>

<div style="margin-top:10px;"></div>

	<div class="editbox">
		<?php if(!$g['mobile']&&$d['theme']['edit_html']<=$my['level']):?>
		<div class="iconbox">
			<?php if($d['theme']['perm_photo'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=photo&gparam=upfilesValue|upfilesFrame|editFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_photo.gif" alt="" />사진</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<?php if($d['theme']['perm_upload'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=file&gparam=upfilesValue|upfilesFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_xfile.gif" alt="" />파일</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
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
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="frames.editFrame.ToolboxShowHide(0);" /><img src="<?php echo $g['img_core']?>/_public/ico_edit.gif" alt="" />편집</a>
		</div>
		<?php endif?>

		<div>
		<input type="hidden" name="html" id="editFrameHtml" value="<?php echo $d['theme']['edit_html']>$my['level']?'TEXT':($R['html']?$R['html']:'HTML')?>" />
		<input type="hidden" name="content" id="editFrameContent" value="<?php echo htmlspecialchars($R['content'])?>" />
		<iframe name="editFrame" id="editFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="<?php echo $d['theme']['edit_height']?>" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
		
		<?php if($d['theme']['perm_upload']||$d['theme']['perm_photo']):?>
		<div>
		<iframe name="upfilesFrame" id="upfilesFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&amp;mod=list&amp;gparam=upfilesValue|editFrame&amp;code=<?php echo $reply=='Y'?'':$R['upload']?>" width="100%" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
		<?php endif?>
	</div>

	<table>
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
			<input type="radio" name="backtype" id="backtype1" value="list"<?php if(!$_SESSION['bbsback'] || $_SESSION['bbsback']=='list'):?> checked="checked"<?php endif?> /><label for="backtype1">목록으로 이동</label>
			<input type="radio" name="backtype" id="backtype2" value="view"<?php if($_SESSION['bbsback']=='view'):?> checked="checked"<?php endif?> /><label for="backtype2">본문으로 이동</label>
			<input type="radio" name="backtype" id="backtype3" value="now"<?php if($_SESSION['bbsback']=='now'):?> checked="checked"<?php endif?> /><label for="backtype3">이 화면 유지</label>
			</div>
		</td>
		</tr>
	</table>

	<div class="bottombox">
		<input type="button" value="취소" class="btngray" onclick="cancelCheck();" />
		<input type="submit" value="<?if($uid):?>수정<?else:?>확인<?endif;?>" class="btnblue" />
	</div>

	</form>


</div>

<script>

<?

if($uid && ($R['add_txt3'] || $R['add_txt2'])){
?>
	setSubSelect(document.writeForm,document.writeForm.add_txt2);
	<?if($R['add_txt3']){?>
	setSelect(document.writeForm.add_txt3,"<?=$R['add_txt3']?>");
	<?}?>	
	<?if($R['add_txt3']=="직접입력")  echo "document.writeForm.add_txt4.style.display=''";?>
<?
}
?>
</script>

