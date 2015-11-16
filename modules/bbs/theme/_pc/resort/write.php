<?php 
$adddata = unserialize($R['adddata']);
if(is_array($adddata))
{
	foreach($adddata as $key => $value)
	{
		$adddata[$key] = stripslashes(urldecode($value));
	}
}

// 검색엔진에서 사이트코드 뒤섞이는 문제
if($k != 'copy'):
	$infoSite = getDbData($table['s_site'],"uid='".$R['site']."'","id");
	if($infoSite[0] != $r) $r = $infoSite[0];
endif;

?>
<script type="text/javascript">
	var g_category4 = new Array(), g_category5 = new Array();
	var g_category = new Array();

	for (var i = 0; i < 5; i++) g_category[i] = new Array();
	for (var i = 0; i < 13; i++) g_category[0][i] = new Array();
	for (var i = 0; i < 6; i++) g_category[1][i] = new Array();
	for (var i = 0; i < 3; i++) g_category[2][i] = new Array();	
	for (var i = 0; i < 3; i++) g_category[3][i] = new Array();
	for (var i = 0; i < 8; i++) g_category[4][i] = new Array();

	g_category[0][0][0] = "아시아";
	g_category[0][1][0] = "태국";
	g_category[0][1][1] = "방콕";
	g_category[0][1][2] = "푸켓";
	g_category[0][1][3] = "파타야";
	g_category[0][1][4] = "코사무이";
	g_category[0][1][5] = "후아힌";
	g_category[0][1][6] = "치앙마이";
	g_category[0][2][0] = "인도네시아";
	g_category[0][2][1] = "발리";
	g_category[0][2][2] = "룸복";
	g_category[0][2][3] = "자카르타";
	g_category[0][3][0] = "말레이시아";
	g_category[0][3][1] = "코타키나발루";
	g_category[0][3][2] = "쿠알라룸프";
	g_category[0][3][3] = "브루나이";
	g_category[0][4][0] = "싱가폴";
	g_category[0][4][1] = "싱가폴";
	g_category[0][4][2] = "빈탄";
	g_category[0][5][0] = "몰디브";
	g_category[0][5][1] = "수상비행기";
	g_category[0][5][2] = "국내선지역";
	g_category[0][5][3] = "수상보트지역";
	g_category[0][6][0] = "대한민국";
	g_category[0][6][1] = "서울";
	g_category[0][6][2] = "제주도";
	g_category[0][7][0] = "홍콩";
	g_category[0][7][1] = "홍콩";
	g_category[0][8][0] = "일본";
	g_category[0][8][1] = "도쿄";
	g_category[0][8][2] = "오사카";
	g_category[0][8][3] = "규슈";
	g_category[0][9][0] = "중국";
	g_category[0][9][1] = "북경";
	g_category[0][9][2] = "상해";
	g_category[0][9][3] = "하이난";
	g_category[0][10][0] = "베트남";
	g_category[0][10][1] = "호치민";
	g_category[0][10][2] = "하노이";
	g_category[0][11][0] = "캄보디아";
	g_category[0][11][1] = "앙코르왓트";
	g_category[0][11][2] = "씨엠립";
	g_category[0][11][3] = "푸놈펜";
	g_category[0][12][0] = "필리핀";
	g_category[0][12][1] = "세부";
	g_category[0][12][2] = "보라카이";
	g_category[0][12][3] = "마닐라";
	g_category[0][12][4] = "클락";
	g_category[0][12][5] = "수빅";

	g_category[1][0][0] = "유럽";
	g_category[1][1][0] = "그리스";
	g_category[1][1][1] = "아테네";
	g_category[1][1][2] = "산토리니";
	g_category[1][1][3] = "모코노스";
	g_category[1][2][0] = "프랑스";
	g_category[1][2][1] = "파리";
	g_category[1][3][0] = "이태리";
	g_category[1][3][1] = "밀라노";
	g_category[1][3][2] = "피렌체";
	g_category[1][3][3] = "로마";
	g_category[1][3][4] = "나폴리";
	g_category[1][3][5] = "시실리";
	g_category[1][4][0] = "스페인";
	g_category[1][4][1] = "바르셀로나";
	g_category[1][4][2] = "마드리드";
	g_category[1][4][3] = "말라가";
	g_category[1][5][0] = "스위스";
	g_category[1][5][1] = "취리히";

	g_category[2][0][0] = "북미";
	g_category[2][1][0] = "미국";
	g_category[2][1][1] = "라스베가스";
	g_category[2][1][2] = "센프란시스코";
	g_category[2][2][0] = "캐나다";
	g_category[2][2][1] = "벤쿠버";
	g_category[2][2][2] = "토론토";
	g_category[2][2][3] = "퀘벡";
	g_category[2][2][4] = "갤거리";

	g_category[3][0][0] = "중남미";
	g_category[3][1][0] = "멕시코";
	g_category[3][1][1] = "칸쿤";
	g_category[3][2][0] = "브라질";
	g_category[3][2][1] = "상파울로";
	g_category[3][2][2] = "리오데자네이루";

	g_category[4][0][0] = "남태평양";
	g_category[4][1][0] = "괌";
	g_category[4][1][1] = "아가나";
	g_category[4][2][0] = "사이판";
	g_category[4][2][1] = "사이판";
	g_category[4][2][2] = "티니안";
	g_category[4][3][0] = "하와이";
	g_category[4][3][1] = "호놀룰루";
	g_category[4][4][0] = "뉴칼레도니아";
	g_category[4][4][1] = "루메아";
	g_category[4][4][2] = "일데팡";
	g_category[4][5][0] = "팔라우";
	g_category[4][5][1] = "코롤(팔라우)";
	g_category[4][6][0] = "피지";
	g_category[4][6][1] = "난디";
	g_category[4][7][0] = "타히티";
	g_category[4][7][1] = "타히티섬";
	g_category[4][7][2] = "보라보라섬";
	g_category[4][7][3] = "모레아";

	g_category4[0] = "7성";
	g_category4[1] = "6성";
	g_category4[2] = "5성";
	g_category4[3] = "4성";
	g_category4[4] = "3성";
	g_category4[5] = "풀빌라";
	g_category4[6] = "레지던스";
	g_category4[7] = "관광호텔";
	g_category4[8] = "기타";

	g_category5[0] = "휴양지역";
	g_category5[1] = "관광지역";
	g_category5[2] = "여행지역";
	g_category5[3] = "쇼핑지역";
	g_category5[4] = "휴양+관광";
	g_category5[5] = "관광+쇼핑";
	g_category5[6] = "기타";

	g_selCategory1 = "<?php echo $adddata['category1']?>";
	g_selCategory2 = "<?php echo $adddata['category2']?>";
	g_selCategory3 = "<?php echo $adddata['category3']?>";
	g_selCategory4 = "<?php echo $adddata['category4']?>";
	g_selCategory5 = "<?php echo $adddata['category5']?>";

	window.onload = function()
	{
		
		var category1, category2, category3, category4, category5;

		category1 = document.getElementById("category1");
		category2 = document.getElementById("category2");
		category3 = document.getElementById("category3");
		category4 = document.getElementById("category4");
		category5 = document.getElementById("category5");

		/*var nSel1 = null, nSel2 = null;
		
		// category1
		for(var i = 0; i < g_category.length; i++)
		{
			var newOption = new Option(g_category[i][0][0], g_category[i][0][0], false, (g_category[i][0][0] == g_selCategory1));
			category1.options[category1.options.length] = newOption;
		}

		// category2
		nSel1 = category1.options.selectedIndex;
		for(var i = 1; i < g_category[nSel1].length; i++)
		{
			var newOption = new Option(g_category[nSel1][i][0], g_category[nSel1][i][0], false, (g_category[nSel1][i][0] == g_selCategory2));
			category2.options[category2.options.length] = newOption;
		}

		// category3
		nSel1 = category1.options.selectedIndex;
		nSel2 = category2.options.selectedIndex + 1;
		for(var i = 1; i < g_category[0][1].length; i++)
		{
			var newOption = new Option(g_category[nSel1][nSel2][i], g_category[nSel1][nSel2][i], false, (g_category[nSel1][nSel2][i] == g_selCategory3));
			category3.options[category3.options.length] = newOption;
		}*/


		for(var i = 0; i < g_category4.length; i++)
		{
			var newOption = new Option(g_category4[i], g_category4[i], false, (g_category4[i] == g_selCategory4));
			category4.options[category4.options.length] = newOption;
		}

		// category5
		for(var i = 0; i < g_category5.length; i++)
		{
			var newOption = new Option(g_category5[i], g_category5[i], false, (g_category5[i] == g_selCategory5));
			category5.options[category5.options.length] = newOption;
		}
	}

	// 상단 메뉴 설정
	var strUid = "<?php echo $uid;?>";
	var aryTopMenu = new Object();
	aryTopMenu['1'] = '/?r=mexico&m=bbs&bid=resort&mod=write&k=copy&uid=' + strUid; // 칸쿤
	aryTopMenu['2'] = '/?r=thailand&c=miju&cat=미주허니문&mod=write&k=copy&uid=' + strUid; // 미주허니문
	aryTopMenu['3'] = '/?r=thailand&c=hawaii&cat=하와이&mod=write&k=copy&uid=' + strUid; // 하와이
	aryTopMenu['4'] = '/?r=indonesia&m=bbs&bid=resort&mod=write&k=copy&uid=' + strUid; // 발리
	aryTopMenu['5'] = '/?r=kosamui&c=kosamui&cat=코사무이&mod=write&k=copy&uid=' + strUid; // 코사무이
	aryTopMenu['6'] = '/?r=seychelles&c=seychelles&mod=write&k=copy&uid=' + strUid; // 세이셸
	aryTopMenu['7'] = '/?r=mauritius&c=mauritius&mod=write&k=copy&uid=' + strUid; // 모리셔스
	aryTopMenu['8'] = '/?r=maldives&m=bbs&bid=resort&mod=write&k=copy&uid=' + strUid; // 몰디브
	function goTopMenuChange(myThis) {
		var r = $(myThis).val();
		location.href = aryTopMenu[r];
	}

	// 본 게시물을 복사합니다.
	$(function() {
		$('[name=copy]').change(function() {
			var strChecked = $(this).attr('checked');
			if(strChecked == 'checked') {
				$('[name=uid]').val('');
			} else {
				$('[name=uid]').val(strUid);
			}
		});
	});
</script>
<div id="bbswrite">
	
	
	<form name="writeForm" method="post" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return writeCheck(this);">
	<!--<form name="writeForm" method="post" action="<?php echo $g['s']?>/buff.php" target="_self" onsubmit="return writeCheck(this);">-->
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

	<table>

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

		<?php /*<tr>
		<td class="td1">분류 선택</td>
		<td class="td2">
			<select name="adddata[category1]" id="category1" class="resort" onchange="updateCategory('category2')">
			</select>
			<select name="adddata[category2]" id="category2" class="resort" onchange="updateCategory('category3')">				
			</select>
			<select name="adddata[category3]" id="category3" class="resort">
		</td>
		</tr> */?>
		<?php
		$cate['maldives'] = array("수상비행기","국내선지역","스피드보트","가족여행");
//		$cate['thailand'] = array("미주허니문","하와이");
		// $cate['thailand'] = array("미주허니문","하와이","코사무이");
		$cate['thailand'] = array("푸켓","보라카이","하와이","코사무이");
		$cate['indonesia'] = array("발리","롬복");
		$cate['dubai'] = array("두바이");
		$cate['mexico'] = array("칸쿤","리비에라마야");
		$cate['seychelles'] = array("프랄린","마헤","라디그");
		$cate['mauritius'] = array("모리셔스");
		?>
		<tr>
			<td class="td1">옵션</td>
			<td class="td2"><input type="checkbox" name="copy" value="Y"> 본 게시물을 복사합니다.</td>
		</tr>
		<tr>
			<td class="td1">상단 메뉴</td>
			<td class="td2">
				<select onchange="goTopMenuChange(this);">
					<option value="1"<?php if($r=="mexico"){echo " selected";}?>>칸쿤</option>
					<option value="2"<?php if($r=="thailand" && $c=="miju"){echo " selected";}?>>미주허니문</option>
					<option value="2"<?php if($r=="thailand" && $c=="phuket"){echo " selected";}?>>푸켓</option>
					<option value="2"<?php if($r=="thailand" && $c=="boracay"){echo " selected";}?>>보라카이</option>
					<option value="3"<?php if($r=="thailand" && $c=="hawaii"){echo " selected";}?>>하와이</option>
					<option value="4"<?php if($r=="indonesia"){echo " selected";}?>>발리</option>
					<option value="5"<?php if($r=="thailand" && $c=="kosamui"){echo " selected";}?>>코사무이</option>
					<option value="6"<?php if($r=="seychelles"){echo " selected";}?>>세이셸</option>
					<option value="7"<?php if($r=="mauritius"){echo " selected";}?>>모리셔스</option>
					<option value="8"<?php if($r=="maldives"){echo " selected";}?>>몰디브</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td1">메인 출력</td>
			<td class="td2">
				<select name="notice">
					<option value="">출력 안함</option>
					
					<?php if($r=="maldives"):?>
					<option value="2"<?php if($R['notice']==2):?> selected="selected"<?php endif?>>New Resort</option>
					<option value="3"<?php if($R['notice']==3):?> selected="selected"<?php endif?>>Promotion Resort</option>
					<option value="4"<?php if($R['notice']==4):?> selected="selected"<?php endif?>>Best Product</option>
					<?php else:?>
					<option value="5"<?php if($R['notice']==5):?> selected="selected"<?php endif?>>메인 출력</option>
					<?php endif?>
				</select>
			</td>
		</tr>
		<tr>
		<td class="td1">분류 선택</td>
		<td class="td2">
			<select name="category" class="resort">
			<option value="">&nbsp;+ 리조트 타입선택</option>
			<option value="">-------------------</option>
			<?php for($i = 0; $i < count($cate[$r]); $i++):?>
			<option value="<?php echo $cate[$r][$i]?>"<?php if($cate[$r][$i]==$R['category']||$cate[$r][$i]==$cat):?> selected="selected"<?php endif?>>ㆍ<?php echo $cate[$r][$i]?><?php if($d['theme']['show_catnum']):?>(<?php echo getDbRows($table[$m.'data'],'site='.$s.' and notice=0 and bbs='.$B['uid']." and category='".$cate[$r][$i]."'")?>)<?php endif?></option>
			<?php endfor?>
			</select>			
			</select>
			<select name="adddata[category4]" id="category4" class="resort">
			</select>
			<select name="adddata[category5]" id="category5" class="resort">
			</select>
		</td>
		</tr>

		<tr>
		<td class="td1">리조트명(한글)</td>
		<td class="td2">
			<input type="text" name="subject" value="<?php echo htmlspecialchars($R['subject'])?>" class="input subject" />
			<span class="check">
			<?php if($my['admin']):?>
			<!--<input type="checkbox" name="notice" value="1"<?php if($R['notice']):?> checked="checked"<?php endif?> />공지글-->
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
		<td class="td1">리조트명(영문)</td>
		<td class="td2">
			<input type="text" name="adddata[sbj_eng]" value="<?php echo $adddata['sbj_eng']?>" class="input subject" />
		</td>
		</tr>

		<td class="td1">주소</td>
		<td class="td2">
			<input type="text" name="adddata[sbj_address]" value="<?php echo $adddata['sbj_address']?>" class="input subject" />
		</td>
		</tr>

		<td class="td1">전화번호</td>
		<td class="td2">
			<input type="text" name="adddata[sbj_tel]" value="<?php echo $adddata['sbj_tel']?>" class="input subject" />
		</td>
		</tr>

		<td class="td1">팩스번호</td>
		<td class="td2">
			<input type="text" name="adddata[sbj_fax]" value="<?php echo $adddata['sbj_fax']?>" class="input subject" />
		</td>
		</tr>

		<tr>
		<td class="td1">객실타입</td>
		<td class="td2">
			<input type="text" name="adddata[room_type]" value="<?php echo $adddata['room_type']?>" class="input subject" />
		</td>
		</tr>

		<tr>
		<td class="td1">객실수</td>
		<td class="td2">
			<input type="text" name="adddata[room_cnt]" value="<?php echo $adddata['room_cnt']?>" class="input" />
		</td>
		</tr>

		<tr>
		<td class="td1">식사부분</td>
		<td class="td2">
			<input type="text" name="adddata[eat]" value="<?php echo $adddata['eat']?>" class="input subject" />
		</td>
		</tr>

		<tr>
		<td class="td1">이동수단</td>
		<td class="td2">
			<input type="text" name="adddata[transportation]" value="<?php echo $adddata['transportation']?>" class="input subject" />
		</td>
		</tr>

		<tr>
		<td class="td1">상세위치</td>
		<td class="td2">
			<input type="text" name="adddata[location]" value="<?php echo $adddata['location']?>" class="input subject" />
		</td>
		</tr>

		<tr>
		<td class="td1">리조트 특징</td>
		<td class="td2">
			<textarea name="adddata[feature]" style="width:547px"><?php echo $adddata['feature']?></textarea>
		</td>
		</tr>

		<tr>
		<td class="td1">허니문 특전</td>
		<td class="td2">
			<textarea name="adddata[honeymoon]" style="width:547px"><?php echo $adddata['honeymoon']?></textarea>
		</td>
		</tr>

		<tr>
		<td class="td1">포함사항</td>
		<td class="td2">
			<textarea name="adddata[inctext]" style="width:547px"><?php echo $adddata['inctext']?></textarea>
		</td>
		</tr>

		<tr>
		<td class="td1">불 포함 사항</td>
		<td class="td2">
			<textarea name="adddata[no_include]" style="width:547px"><?php echo $adddata['no_include']?></textarea>
		</td>
		</tr>


	</table>

	
	<?php 
	// 내용 쪼개기
	$arrContent = explode("[bc_separator]", $R['content']);
	?>

	<!-- 리조트 소개 -->
	<div class="editbox">
		<h1>리조트 소개</h1>
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
		<input type="hidden" name="html" id="editFrameHtml" value="HTML" />
		<input type="hidden" name="content" id="editFrameContent" value="<?php echo htmlspecialchars($arrContent[0])?>" />
		<iframe name="editFrame" id="editFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="<?php echo $d['theme']['edit_height']?>" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
	</div>
	<!-- / 리조트 소개 -->

	<!-- 객실 소개 -->
	<div class="editbox">
		<h1>객실 소개</h1>
		<?php if(!$g['mobile']&&$d['theme']['edit_html']<=$my['level']):?>
		<div class="iconbox">
			<?php if($d['theme']['perm_photo'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=photo&gparam=upfilesValue|upfilesFrame|editFrame2');" /><img src="<?php echo $g['img_core']?>/_public/ico_photo.gif" alt="" />사진</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<?php if($d['theme']['perm_upload'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=file&gparam=upfilesValue|upfilesFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_xfile.gif" alt="" />파일</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<a href="#." onclick="ToolCheck2('layout');">레이아웃</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck2('table');">테이블</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck2('box');">박스</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck2('char');">특수문자</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck2('link');">링크</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />

			<a href="#." onclick="ToolCheck2('icon');">아이콘</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck2('flash');">플래쉬</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck2('movie');">동영상</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck2('html');">HTML</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="frames.editFrame2.ToolboxShowHide(0);" /><img src="<?php echo $g['img_core']?>/_public/ico_edit.gif" alt="" />편집</a>
		</div>
		<?php endif?>

		<div>
		<input type="hidden" name="html2" id="editFrameHtml2" value="HTML" />
		<input type="hidden" name="content2" id="editFrame2Content" value="<?php echo htmlspecialchars($arrContent[1])?>" />
		<iframe name="editFrame2" id="editFrame2" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="<?php echo $d['theme']['edit_height']?>" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
	</div>
	<!-- / 객실 소개 -->

	<!-- 부대 시설 -->
	<div class="editbox">
		<h1>부대 시설</h1>
		<?php if(!$g['mobile']&&$d['theme']['edit_html']<=$my['level']):?>
		<div class="iconbox">
			<?php if($d['theme']['perm_photo'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=photo&gparam=upfilesValue|upfilesFrame|editFrame3');" /><img src="<?php echo $g['img_core']?>/_public/ico_photo.gif" alt="" />사진</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<?php if($d['theme']['perm_upload'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=file&gparam=upfilesValue|upfilesFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_xfile.gif" alt="" />파일</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<a href="#." onclick="ToolCheck3('layout');">레이아웃</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck3('table');">테이블</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck3('box');">박스</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck3('char');">특수문자</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck3('link');">링크</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />

			<a href="#." onclick="ToolCheck3('icon');">아이콘</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck3('flash');">플래쉬</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck3('movie');">동영상</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck3('html');">HTML</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="frames.editFrame3.ToolboxShowHide(0);" /><img src="<?php echo $g['img_core']?>/_public/ico_edit.gif" alt="" />편집</a>
		</div>
		<?php endif?>

		<div>
		<input type="hidden" name="html3" id="editFrameHtml3" value="HTML" />
		<input type="hidden" name="content3" id="editFrame3Content" value="<?php echo htmlspecialchars($arrContent[2])?>" />
		<iframe name="editFrame3" id="editFrame3" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="<?php echo $d['theme']['edit_height']?>" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
	</div>
	<!-- / 부대 시설 -->

	<!-- 항공 일정 -->
	<!--<div class="editbox">
		<h1>항공 일정</h1>
		<?php if(!$g['mobile']&&$d['theme']['edit_html']<=$my['level']):?>
		<div class="iconbox">
			<?php if($d['theme']['perm_photo'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=photo&gparam=upfilesValue|upfilesFrame|editFrame4');" /><img src="<?php echo $g['img_core']?>/_public/ico_photo.gif" alt="" />사진</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<?php if($d['theme']['perm_upload'] <= $my['level']):?>
			<a href="#." onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&m=upload&mod=file&gparam=upfilesValue|upfilesFrame');" /><img src="<?php echo $g['img_core']?>/_public/ico_xfile.gif" alt="" />파일</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<?php endif?>
			<a href="#." onclick="ToolCheck4('layout');">레이아웃</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck4('table');">테이블</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck4('box');">박스</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck4('char');">특수문자</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck4('link');">링크</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />

			<a href="#." onclick="ToolCheck4('icon');">아이콘</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck4('flash');">플래쉬</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck4('movie');">동영상</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="ToolCheck4('html');">HTML</a>
			<img src="<?php echo $g['img_core']?>/_public/split_01.gif" alt="" class="split" />
			<a href="#." onclick="frames.editFrame4.ToolboxShowHide(0);" /><img src="<?php echo $g['img_core']?>/_public/ico_edit.gif" alt="" />편집</a>
		</div>
		<?php endif?>

		<div>
		<input type="hidden" name="html4" id="editFrameHtml4" value="HTML" />
		<input type="hidden" name="content4" id="editFrame4Content" value="<?php echo htmlspecialchars($arrContent[3])?>" />
		<iframe name="editFrame4" id="editFrame4" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=editor&amp;toolbox=<?php echo $d['theme']['show_edittool2']&&$d['theme']['edit_html']<=$my['level']?'Y':'N'?>" width="100%" height="<?php echo $d['theme']['edit_height']?>" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
		</div>
	</div>-->
	<!-- / 항공 일정 -->

	<h1>첨부파일</h1>
	<?php if($d['theme']['perm_upload']<=$my['level']||$d['theme']['perm_photo']<=$my['level']):?>
	<div>
	<iframe name="upfilesFrame" id="upfilesFrame" src="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=upload&amp;mod=list&amp;gparam=upfilesValue|editFrame&amp;code=<?php echo $reply=='Y'?'':$R['upload']?>" width="100%" height="0" frameborder="0" scrolling="no" allowTransparency="true"></iframe>
	</div>
	<?php endif?>

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
		<input type="submit" value="확인" class="btnblue" />
	</div>

	</form>


</div>
