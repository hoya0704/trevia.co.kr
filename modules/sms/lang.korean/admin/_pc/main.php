<?php
if(!defined('__KIMS__')) exit;
?>
<div id="smsWrap">
	<div id="smsBody">
		<?php
		$infoSite = getDbData($table['s_site'],"id='".$r."'","title");
		$siteTitle = $infoSite[0];

		if($siteTitle != "하이몰디브") $siteTitle = "트레비아";
		?>
		<form name="smsForm" action="<?php echo $g['s']?>/" target="_action_frame_<?php echo $m?>" onsubmit="return preSubmit()" >
		<input type="hidden" name="r" value="<?php echo $r?>" />
		<input type="hidden" name="m" value="<?php echo $module?>" />
		<input type="hidden" name="a" value="a_batch_send" />
		<input type="hidden" name="cpnumber" value="" />
		<input type="hidden" name="xms" id="xms" value="sms" />
		<select name="textPreset" onchange="presetChange(this)">
			<option value="" selected="selected">=== 선택하세요 ===</option>
			<option value="[<?php echo $siteTitle?>]요청하신 여행견적 이메일로 발송하였으니 확인 후 연락 바랍니다.">견적발송</option>
			<option value="[<?php echo $siteTitle?>]고객님 여행계약서 발송하였으니 확인 후 메일 및 팩스로 회신바랍니다.">계약서발송</option>
			<option value="[<?php echo $siteTitle?>]요청하신 해당항공편의 예약이 확정되었음을 알려드립니다.">항공예약완료</option>
			<option value="[<?php echo $siteTitle?>]요청하신 해당리조트의 예약이 확정되었음을 알려드립니다.">리조트예약완료</option>
			<option value="롯데시네마 영화관람권">롯데시네마 영화관람권</option>
		</select>
		<textarea name="smsText" onkeydown="return OntextCheck(this)" onchange="return OntextCheck(this)"></textarea>
		<input type="text" name="custom_number" value="" class="addInput" />
		<input type="button" value="추가" class="addButton" onclick="addCustomNumber()" />
		<select name="numberList" multiple="multiple" ondblclick="deleteSelected(this)" class="multiple">
		</select>
		<p id="countText">총 0명</p>
		<p id="totalBytes">0 / 80 bytes</p>
		<p id="issms">SMS</p>
		<input type="submit" value="전송" class="submit" />
		</form>
	</div>
	<div id="addressBook">
		<?php
		function getMDname($id)
		{
			global $typeset;
			if ($typeset[$id]) return $typeset[$id].' ('.$id.')';
			else return $id;
		}
		$typeset = array
		(
			'_join'=>'회원가입축하 양식',
			'_auth'=>'이메일인증 양식',
			'_pw'=>'비밀번호요청 양식',
		);

		$SITES = getDbArray($table['s_site'],'','*','gid','asc',0,1);
		$year1	= $year1  ? $year1  : substr($date['today'],0,4);
		$month1	= $month1 ? $month1 : substr($date['today'],4,2);
		$day1	= $day1   ? $day1   : 1;//substr($date['today'],6,2);
		$year2	= $year2  ? $year2  : substr($date['today'],0,4);
		$month2	= $month2 ? $month2 : substr($date['today'],4,2);
		$day2	= $day2   ? $day2   : substr($date['today'],6,2);


		$sort	= $sort ? $sort : 'memberuid';
		$orderby= $orderby ? $orderby : 'desc';
		$recnum	= 500;

		$accountQue = $account ? 'site='.$account.' and ':'';
		$_WHERE = $accountQue.'d_regis > '.$year1.sprintf('%02d',$month1).sprintf('%02d',$day1).'000000 and d_regis < '.$year2.sprintf('%02d',$month2).sprintf('%02d',$day2).'240000';
		if ($auth) $_WHERE .= ' and auth='.$auth;
		if ($sosok) $_WHERE .= ' and sosok='.$sosok;
		if ($level) $_WHERE .= ' and level='.$level;
		if ($now_log) $_WHERE .= ' and now_log='.($now_log-1);
		if ($sex) $_WHERE .= ' and sex='.$sex;
		if ($comp) $_WHERE .= ' and comp='.$comp;

		if ($marr1)
		{
			if ($marr1==1) $_WHERE .= ' and marr1=0';
			else $_WHERE .= ' and marr1>0';
		}
		if ($mailing) $_WHERE .= ' and mailing='.($mailing-1);
		if ($sms) $_WHERE .= ' and sms='.($sms-1);

		if ($addr0)
		{
			$_WHERE .= $addr0!='NULL'?" and addr0='".$addr0."'":" and addr0=''";
		}
		if ($where && $keyw) $_WHERE .= " and ".$where." like '%".trim($keyw)."%'";



		$RCD = getDbArray($table['s_mbrdata'],$_WHERE,'*',$sort,$orderby,$recnum,$p);
		$NUM = getDbRows($table['s_mbrdata'],$_WHERE);
		$TPG = getTotalPage($NUM,$recnum);
		$autharr = array('','인증','보류','대기','탈퇴');

		$xyear1	= substr($date['totime'],0,4);
		$xmonth1= substr($date['totime'],4,2);
		$xday1	= substr($date['totime'],6,2);
		$xhour1	= substr($date['totime'],8,2);
		$xmin1	= substr($date['totime'],10,2);
		?>


		<div id="mbrlist">


			<div class="sbox">
				<form name="procForm" action="<?php echo $g['s']?>/" method="get">
				<input type="hidden" name="r" value="<?php echo $r?>" />
				<input type="hidden" name="m" value="<?php echo $m?>" />
				<input type="hidden" name="module" value="<?php echo $module?>" />
				<input type="hidden" name="front" value="<?php echo $front?>" />

				<select name="account" class="account" onchange="this.form.submit();">
				<option value="">&nbsp;+ 전체사이트</option>
				<option value="">---------------------------</option>
				<?php while($S = db_fetch_array($SITES)):?>
				<option value="<?php echo $S['uid']?>"<?php if($account==$S['uid']):?> selected="selected"<?php endif?>>ㆍ<?php echo $S['name']?></option>
				<?php endwhile?>
				<?php if(!db_num_rows($SITES)):?>
				<option value="">등록된 사이트가 없습니다.</option>
				<?php endif?>
				</select>

				<div>
				<select name="year1">
				<?php for($i=$date['year'];$i>2000;$i--):?><option value="<?php echo $i?>"<?php if($year1==$i):?> selected="selected"<?php endif?>><?php echo $i?>년</option><?php endfor?>
				</select>
				<select name="month1">
				<?php for($i=1;$i<13;$i++):?><option value="<?php echo sprintf('%02d',$i)?>"<?php if($month1==$i):?> selected="selected"<?php endif?>><?php echo sprintf('%02d',$i)?>월</option><?php endfor?>
				</select>
				<select name="day1">
				<?php for($i=1;$i<32;$i++):?><option value="<?php echo sprintf('%02d',$i)?>"<?php if($day1==$i):?> selected="selected"<?php endif?>><?php echo sprintf('%02d',$i)?>일(<?php echo getWeekday(date('w',mktime(0,0,0,$month1,$i,$year1)))?>)</option><?php endfor?>
				</select> ~
				<select name="year2">
				<?php for($i=$date['year'];$i>2000;$i--):?><option value="<?php echo $i?>"<?php if($year2==$i):?> selected="selected"<?php endif?>><?php echo $i?>년</option><?php endfor?>
				</select>
				<select name="month2">
				<?php for($i=1;$i<13;$i++):?><option value="<?php echo sprintf('%02d',$i)?>"<?php if($month2==$i):?> selected="selected"<?php endif?>><?php echo sprintf('%02d',$i)?>월</option><?php endfor?>
				</select>
				<select name="day2">
				<?php for($i=1;$i<32;$i++):?><option value="<?php echo sprintf('%02d',$i)?>"<?php if($day2==$i):?> selected="selected"<?php endif?>><?php echo sprintf('%02d',$i)?>일(<?php echo getWeekday(date('w',mktime(0,0,0,$month2,$i,$year2)))?>)</option><?php endfor?>
				</select>
				</div>
				<div>
				<input type="button" class="btngray" value="기간적용" onclick="this.form.submit();" />
				<input type="button" class="btngray" value="어제" onclick="dropDate('<?php echo date('Ymd',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-1,substr($date['today'],0,4)))?>','<?php echo date('Ymd',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-1,substr($date['today'],0,4)))?>');" />
				<input type="button" class="btngray" value="오늘" onclick="dropDate('<?php echo $date['today']?>','<?php echo $date['today']?>');" />
				<input type="button" class="btngray" value="일주" onclick="dropDate('<?php echo date('Ymd',mktime(0,0,0,substr($date['today'],4,2),substr($date['today'],6,2)-7,substr($date['today'],0,4)))?>','<?php echo $date['today']?>');" />
				<input type="button" class="btngray" value="한달" onclick="dropDate('<?php echo date('Ymd',mktime(0,0,0,substr($date['today'],4,2)-1,substr($date['today'],6,2),substr($date['today'],0,4)))?>','<?php echo $date['today']?>');" />
				<input type="button" class="btngray" value="당월" onclick="dropDate('<?php echo substr($date['today'],0,6)?>01','<?php echo $date['today']?>');" />
				<input type="button" class="btngray" value="전월" onclick="dropDate('<?php echo date('Ym',mktime(0,0,0,substr($date['today'],4,2)-1,substr($date['today'],6,2),substr($date['today'],0,4)))?>01','<?php echo date('Ym',mktime(0,0,0,substr($date['today'],4,2)-1,substr($date['today'],6,2),substr($date['today'],0,4)))?>31');" />
				<input type="button" class="btngray" value="전체" onclick="dropDate('20010101','<?php echo $date['today']?>');" />
				</div>

				<div>

				<select name="auth" onchange="this.form.submit();">
				<option value="">회원인증</option>
				<option value="">--------</option>
				<option value="1"<?php if($auth == 1):?> selected="selected"<?php endif?>><?php echo $autharr[1]?></option>
				<option value="2"<?php if($auth == 2):?> selected="selected"<?php endif?>><?php echo $autharr[2]?></option>
				<option value="3"<?php if($auth == 3):?> selected="selected"<?php endif?>><?php echo $autharr[3]?></option>
				<option value="4"<?php if($auth == 4):?> selected="selected"<?php endif?>><?php echo $autharr[4]?></option>
				</select>

				<select name="sosok" onchange="this.form.submit();">
				<option value="">회원그룹</option>
				<option value="">--------</option>
				<?php $_GRPARR = array()?>
				<?php $GRP = getDbArray($table['s_mbrgroup'],'','*','gid','asc',0,1)?>
				<?php while($_G=db_fetch_array($GRP)):$_GRPARR[$_G['uid']] = $_G['name']?>
				<option value="<?php echo $_G['uid']?>"<?php if($_G['uid']==$sosok):?> selected="selected"<?php endif?>><?php echo $_G['name']?> (<?php echo number_format($_G['num'])?>)</option>
				<?php endwhile?>
				</select>

				<select name="level" onchange="this.form.submit();">
				<option value="">회원등급</option>
				<option value="">--------</option>
				<?php $_LVLARR = array()?>
				<?php $levelnum = getDbData($table['s_mbrlevel'],'gid=1','*')?>
				<?php $LVL=getDbArray($table['s_mbrlevel'],'','*','uid','asc',$levelnum['uid'],1)?>
				<?php while($_L=db_fetch_array($LVL)):$_LVLARR[$_L['uid']] = $_L['name']?>
				<option value="<?php echo $_L['uid']?>"<?php if($_L['uid']==$level):?> selected="selected"<?php endif?>><?php echo $_L['name']?> (<?php echo number_format($_L['num'])?>)</option>
				<?php endwhile?>
				</select>

				<select name="sex" onchange="this.form.submit();">
				<option value="">회원성별</option>
				<option value="">--------</option>
				<option value="1"<?php if($sex == 1):?> selected="selected"<?php endif?>>남성</option>
				<option value="2"<?php if($sex == 2):?> selected="selected"<?php endif?>>여성</option>
				</select>

				<select name="addr0" onchange="this.form.submit();">
				<option value="">가입지역</option>
				<option value="">--------</option>
				<option value="서울"<?php if($addr0 == '서울'):?> selected="selected"<?php endif?>>서울</option>
				<option value="경기"<?php if($addr0 == '경기'):?> selected="selected"<?php endif?>>경기</option>
				<option value="인천"<?php if($addr0 == '인천'):?> selected="selected"<?php endif?>>인천</option>
				<option value="강원"<?php if($addr0 == '강원'):?> selected="selected"<?php endif?>>강원</option>
				<option value="충남"<?php if($addr0 == '충남'):?> selected="selected"<?php endif?>>충남</option>
				<option value="충북"<?php if($addr0 == '충북'):?> selected="selected"<?php endif?>>충북</option>
				<option value="대전"<?php if($addr0 == '대전'):?> selected="selected"<?php endif?>>대전</option>
				<option value="전남"<?php if($addr0 == '전남'):?> selected="selected"<?php endif?>>전남</option>
				<option value="전북"<?php if($addr0 == '전북'):?> selected="selected"<?php endif?>>전북</option>
				<option value="광주"<?php if($addr0 == '광주'):?> selected="selected"<?php endif?>>광주</option>
				<option value="경남"<?php if($addr0 == '경남'):?> selected="selected"<?php endif?>>경남</option>
				<option value="경북"<?php if($addr0 == '경북'):?> selected="selected"<?php endif?>>경북</option>
				<option value="부산"<?php if($addr0 == '부산'):?> selected="selected"<?php endif?>>부산</option>
				<option value="대구"<?php if($addr0 == '대구'):?> selected="selected"<?php endif?>>대구</option>
				<option value="울산"<?php if($addr0 == '울산'):?> selected="selected"<?php endif?>>울산</option>
				<option value="제주"<?php if($addr0 == '제주'):?> selected="selected"<?php endif?>>제주</option>
				<option value="해외"<?php if($addr0 == '해외'):?> selected="selected"<?php endif?>>해외</option>
				<option value="NULL"<?php if($addr0 == 'NULL'):?> selected="selected"<?php endif?>>없음</option>
				</select>

				<select name="mailing" onchange="this.form.submit();">
				<option value="">메일수신</option>
				<option value="">--------</option>
				<option value="2"<?php if($mailing == 2):?> selected="selected"<?php endif?>>동의</option>
				<option value="1"<?php if($mailing == 1):?> selected="selected"<?php endif?>>동의안함</option>
				</select>

				<select name="sms" onchange="this.form.submit();">
				<option value="">문자수신</option>
				<option value="">--------</option>
				<option value="2"<?php if($sms == 2):?> selected="selected"<?php endif?>>동의</option>
				<option value="1"<?php if($sms == 1):?> selected="selected"<?php endif?>>동의안함</option>
				</select>

				</div>

				<div>
				<select name="sort" onchange="this.form.submit();">
				<option value="memberuid"<?php if($sort=='memberuid'):?> selected="selected"<?php endif?>>가입일</option>
				<option value="sosok"<?php if($sort=='sosok'):?> selected="selected"<?php endif?>>회원그룹</option>
				<option value="level"<?php if($sort=='level'):?> selected="selected"<?php endif?>>회원등급</option>
				<option value="point"<?php if($sort=='point'):?> selected="selected"<?php endif?>>보유포인트</option>
				<option value="usepoint"<?php if($sort=='usepoint'):?> selected="selected"<?php endif?>>사용포인트</option>
				<option value="cash"<?php if($sort=='cash'):?> selected="selected"<?php endif?>>보유적립금</option>
				<option value="money"<?php if($sort=='money'):?> selected="selected"<?php endif?>>보유예치금</option>
				<option value="last_log"<?php if($sort=='last_log'):?> selected="selected"<?php endif?>>최근접속</option>
				<option value="birth1"<?php if($sort=='birth1'):?> selected="selected"<?php endif?>>나이</option>
				<option value="birth2"<?php if($sort=='birth2'):?> selected="selected"<?php endif?>>생년월일</option>
				</select>
				<select name="orderby" onchange="this.form.submit();">
				<option value="desc"<?php if($orderby=='desc'):?> selected="selected"<?php endif?>>역순</option>
				<option value="asc"<?php if($orderby=='asc'):?> selected="selected"<?php endif?>>정순</option>
				</select>

				<select name="where">
				<option value="id"<?php if($where=='id'):?> selected="selected"<?php endif?>>아이디</option>
				<option value="name"<?php if($where=='name'):?> selected="selected"<?php endif?>>이름</option>
				<option value="nic"<?php if($where=='nic'):?> selected="selected"<?php endif?>>닉네임</option>
				</select>

				<input type="text" name="keyw" value="<?php echo stripslashes($keyw)?>" class="input" />

				<input type="submit" value="검색" class="btnblue" />
				<input type="button" value="리셋" class="btngray" onclick="location.href='<?php echo $g['adm_href']?>';" />
				</div>

				</form>
			</div>


			<div class="info">

				<div class="article">
					<?php echo ($NUM > 500 ? "500" : $NUM)?>명(최대 500명)
				</div>
				
				<div class="category">

				</div>
				<div class="clear"></div>
			</div>


			<form name="listForm" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>">
			<input type="hidden" name="r" value="<?php echo $r?>" />
			<input type="hidden" name="m" value="<?php echo $module?>" />
			<input type="hidden" name="a" value="" />
			<input type="hidden" name="act" value="" />
			<input type="hidden" name="_WHERE" value="<?php echo $_WHERE?>" />
			<input type="hidden" name="_num" value="<?php echo $NUM?>" />

			<div class="scroll">
			<table summary="회원리스트 입니다.">
			<caption>회원리스트</caption> 
			<colgroup> 
			<col width="30">
			<col width="40"> 
			<col width="60"> 
			<col width="80">
			<col width="180"> 
			<col width="50"> 
			<col width="100"> 
			<col  style="display:none" width="30"> 
		<?php if($wideview == 'Y'):?>
			<col width="70"> 
			<col width="150"> 
			<col width="70"> 
			<col width="60"> 
			<col width="30"> 
			<col width="30"> 
			<col width="60"> 
			<col width="60"> 
			<col width="70"> 
		<?php else:?>
			<col width="50"> 
		<?php endif?>
			<col>
			</colgroup> 
			<thead>
			<tr>
			<th scope="col" class="side1"><img src="<?php echo $g['img_core']?>/_public/ico_check_01.gif" alt="선택/반전" class="hand" onclick="toggleAllMemers('mbrmembers[]');" /></th>
			<th scope="col">번호</th>
			<th scope="col">이름</th>
			<th scope="col">닉네임</th>
			<th scope="col">아이디</th>
			<th scope="col">지역</th>
			<th scope="col">연락처</th>
			<th scope="col" style="display:none">UID</th>
		<?php if($wideview == 'Y'):?>
			<th scope="col">최근접속</th>
			<th scope="col">이메일</th>
			<th scope="col">그룹</th>
			<th scope="col">직업</th>
			<th scope="col">메일</th>
			<th scope="col">SMS</th>
			<th scope="col">보유P</th>
			<th scope="col">사용P</th>
			<th scope="col">결혼기념일</th>
		<?php else:?>
			<th scope="col">최근접속</th>
		<?php endif?>
			<th scope="col" class="side2"></th>
			</tr>
			</thead>
			<tbody>
			<?php while($R=db_fetch_array($RCD)):?>
			<?php $_R=getUidData($table['s_mbrid'],$R['memberuid'])?>
			<tr>
			<td class="side1"><input type="checkbox" name="mbrmembers[]" value="<?php echo $R['memberuid']?>" onchange="toggleMember(this)" /></td>
			<td><?php echo ($NUM-((($p-1)*$recnum)+$_recnum++))?></td>
			<td><?php echo $R['name']?></td>
			<td><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=member&front=manager&page=post&mbruid=<?php echo $R['memberuid']?>');" title="게시정보"><?php echo $R['nic']?></a></td>
			<td><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=member&front=manager&page=info&mbruid=<?php echo $R['memberuid']?>');" title="회원정보"><?php echo $_R['id']?></a></td>
			<td><?php echo $R['addr0']?></td>
			<td><?php echo $R['tel2']?$R['tel2']:$R['tel1']?></td>
			<td style="display:none"><?php echo $R['memberuid']?></td>
			<td title="<?php echo getDateFormat($R['last_log'],'Y.m.d')?>"><?php echo -getRemainDate($R['last_log'])?>일</td>
		<?php if($wideview == 'Y'):?>
			<td><?php echo $R['email']?></td>
			<td><?php echo $_GRPARR[$R['sosok']]?></td>
			<td><?php echo $R['job']?></td>
			<td><?php echo $R['mailing']?'Y':'N'?></td>
			<td><?php echo $R['sms']?'Y':'N'?></td>
			<td><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=<?php echo $module?>&front=manager&page=point&price=1&mbruid=<?php echo $R['memberuid']?>');" title="포인트획득내역"><?php echo number_format($R['point'])?></a></td>
			<td><a href="javascript:OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&iframe=Y&m=<?php echo $module?>&front=manager&page=point&price=2&mbruid=<?php echo $R['memberuid']?>');" title="포인트사용내역"><?php echo number_format($R['usepoint'])?></a></td>
			<td class="side2"><?php echo $R['marr1']&&$R['marr2']?getDateFormat($R['marr1'].$R['marr2'],'Y.m.d'):''?></td>
		<?php endif?>
			<td></td>
			</tr>
			<?php endwhile?>
			</tbody>
			</table>
			</div>

			<?php if(!$NUM):?>
			<div class="nodata"><img src="<?php echo $g['img_core']?>/_public/ico_notice.gif" alt="" /> 조건에 해당하는 회원이 없습니다.</div>
			<?php endif?>

			<!--<div class="pagebox01">
				<script type="text/javascript">getPageLink(10,<?php echo $p?>,<?php echo $TPG?>,'<?php echo $g['img_core']?>/page/default');</script>
			</div>-->
	</div>
	<div class="clear"></div>
</div>