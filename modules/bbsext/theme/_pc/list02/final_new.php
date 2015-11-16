<!-- 접수완료 페이지 (2011/05/03) -->

<?php
//이메일전송


$g_arr = explode(",",$d['theme']['gubun_list']);
$g_num = count($g_arr);
		
$m_sql = mysql_query("SELECT * FROM ".$table[$m.'data']." where uid = '".$puid."' ");
$m_rs = mysql_fetch_array($m_sql);


$add1 = explode("||", $m_rs[add1]);
$add2 = explode("||", $m_rs[add2]);
$add3 = explode("||", $m_rs[add3]);
$add4 = explode("||", $m_rs[add4]);
$add5 = explode("||", $m_rs[add5]);
$add6 = explode("||", $m_rs[add6]);
$add7 = explode("||", $m_rs[add7]);
$add8 = explode("||", $m_rs[add8]);
$add9 = explode("||", $m_rs[add9]);
$add10 = explode("||", $m_rs[add10]);
$add11 = explode("||", $m_rs[add11]);	
?>



<link rel="stylesheet" href="http://trevia.co.kr/mail/style.css">


<form name="form" action="/modules/bbsext/theme/_pc/list01/final2.php" method="post" />
<input type="hidden" name="to_email" value="<?=$add3[5]?>" />
<input type="hidden" name="to_name" value="<?=$add3[1]?>" />
<input type="hidden" name="from_email" value="ok@trevia.co.kr" />
<input type="hidden" name="from_name" value="트레비아" />
<input type="hidden" name="tb_name" value="<?=$table[$m.'data']?>" />
<input type="hidden" name="puid" value="<?php echo $puid?>" />



<body>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<!--
	<table border="0" cellpadding="0" cellspacing="1" width="200" bgcolor="#999999">
      <tr>
        <td width="100" height="20" align="center" bgcolor="white"><input type="text" name="val1"  /></td>
        <Td bgcolor="white" width="100" align="center"><input type="text" name="val2"  /></td>
    </table>
	-->
    <div align="right"></div></td>
  </tr>
  <tr>
    <td><Table border="0" cellpadding="0" cellspacing="1" width="800">
      <tr>
        <td width="200" height="50" align="center"><img src="http://trevia.co.kr/mail/ci_trevia.jpg" width="180" height="55"></td>
        <td width="396" height="50" align="center"><font size="5"><u><b>해 외 여 행 계 약 서</b></u></font> </td>
        <td width="200" align="center">&nbsp;</td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td height="20"><span class="style4"><strong>당사("갑")와 당사를 이용하는 여행자("을")는 다음조건으로 여행계약을 체결합니다.</strong></span></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
	<table width="800" hight="200" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td width="98" height="20" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행상품명</strong></span></td>
        <td colspan="2" align="center" bgcolor="white"><input type="text" name="val3" value="<?=$add2[2]?> <?=$add2[4]?>" /></td>
        <td width="99" align="center" bgcolor="#F1F1F1">여행기간</td>
        <td width="199" align="center" bgcolor="white"><input type="text" name="val4" value="<?=$add2[7]?> ~ <?=$add2[8]?>" /></td>
        <td width="99" align="center" bgcolor="#F1F1F1">2박</td>
      </tr>

      <tr>
        <td height="20" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행자명</strong></span></td>
        <td width="99" align="center" bgcolor="white"><input type="text" name="val5" value="<?=$add3[1]?>" /></td>
        <td width="199"" align="center" bgcolor="#FFFFFF" ><input type="text" name="val6" value="<?=$add3[2]?>" /></td>
        <td bgcolor="white" align="center"><input type="text" name="val7" value="<?=$add3[7]?>" /></td>
        <td bgcolor="white" align="center"><input type="text" name="val8" value="<?=$add3[8]?>" /></td>
        <td bgcolor="white" align="center"><?=$add2[0]?><input type="hidden" name="val8_1" value="<?=$add2[0]?>" /></td>
      </tr>

<?if($add3[13]) {?>
      <tr>
        <td height="20" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행자명</strong></span></td>
        <td width="99" align="center" bgcolor="white"><input type="text" name="val9" value="<?=$add3[13]?>" /></td>
        <td width="199"" align="center" bgcolor="#FFFFFF" ><input type="text" name="val10" value="<?=$add3[14]?>" /></td>
        <td bgcolor="white" align="center"><input type="text" name="val11" value="<?=$add3[19]?>" /></td>
        <td bgcolor="white" align="center"><input type="text" name="val12" value="<?=$add3[20]?>" /></td>
        <td bgcolor="white" align="center">&nbsp;</td>
      </tr>
<? } ?>

    </table>
	</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td width="98" rowspan="5" align="center" bgcolor="#E6E6E6"><span class="style4"><strong>여행경비</strong></span></td>
        <td width="99" align="center" bgcolor="#F1F1F1"><span class="style4"><strong>구분</strong></span></td>
        <td width="99" height="20" align="center" bgcolor="#F1F1F1"><span class="style4"><strong>인원수</strong></span></td>
        <td width="166" align="center" bgcolor="#f1dbda"><span class="style4"><strong>계약금</strong></span></td>
        <td width="166" align="center" bgcolor="#ebf1de"><span class="style4"><strong>항공료</strong></span></td>
        <td width="165" align="center" bgcolor="#e6dfec"><span class="style4"><strong>숙박료</strong></span></td>
      </tr>
      <tr>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><strong>성인</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><input type="text" name="val13" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val14" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val15" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val16" value="" /></td>
      </tr>
      <tr>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><strong>소아</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><input type="text" name="val17" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val18" value="" /></td>
        <td width="166" bgcolor="#ffffff" align="center"><input type="text" name="val19" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val20" value="" /></td>
      </tr>
      <tr>
        <td bgcolor="#F1F1F1" align="center"><span class="style4"><strong>유아</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><input type="text" name="val21" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val22" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val23" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val24" value="" /></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#F1F1F1"><span class="style4"><strong>합계</strong></span></td>
        <td height="20" align="center" bgcolor="#ffffff"><input type="text" name="val25" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val26" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val27" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val28" value="" /></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6" align="center"><span class="style4"><strong>입금일</strong></span></td>
        <td height="20" colspan="2" align="center" bgcolor="#ffffff"><strong>납부일자 ( T/L )</strong></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val29" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val30" value="" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val31" value="" /></td>
      </tr>
    </table></td>
  </tr>
<tr>
    <td height="30"><br />
<b>[ 잔금(리조트) 환산방법 &#8211; (USD)외화, (KRW)원화에 따른 안내]</b><br />
<font color="blue">
1. 원화로 잔금 결재시 (잔금 외화USD) = 달러잔금 X 당일전신환 &#8211; 계약금<br />
2. 원화로 잔금 결재시 (잔금 원화KRW) = (원화잔금 / 적용환율) X 당일전신환<br />
3. 외화로 잔금 결재시 (잔금 외화USD) = 계약금은 환불 처리 됩니다.<br />
</font>
[환율기준 : 잔금입금당일 오전 10시 외환은행 전신환 (송금보낼때) 기준]<br />
잔금 환산 예시) 원화로 잔금 결재시 총액 1,360,000원= $2,000 (잔금외화) X 1,080 (송금환) &#8211; 800,000 (계약금) <br />
</td>
  </tr>
  <tr>
  <td><br />
<b>[ 트레비아 법인 입금 계좌안내 &#8211; 서울 등촌서지점 ]</b><br />
원화계좌 : 신한은행 140-009-270166 주)트레비아 / 주)트레비아 임희성 <br />
외화계좌 : 신한은행 180-005-629941 TREVIA CO.,LTD / 지점명 : DEUNGCHON SEO<br /><br />
</td>
</tr>
  <tr>
    <td height="20"><span class="style4"><strong>■ 여행조건</strong></span></td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
	  <tr>
        <td colspan="8" width="98" rowspan='1<?//=$pcount?>' align="center" bgcolor="#E6E6E6"><span class="style4"><b>항공여정 예약정보</b></span></td>
      </tr>
	  <tr>
        <td height="20" colspan="4" align="center" bgcolor="#dbe6f1"><span class="style4"><b>출발</b></span></td>
        <td colspan="4" align="center" bgcolor="#f1dbda"><span class="style4"><b>도착</b></span></td>
      </tr>
      <tr>
        <td width="87" height="20" align="center" bgcolor="#f1f1f1"><span class="style4"><b>여정</b></span></td>
        <td width="85" bgcolor="#f1f1f1" align="center"><span class="style4"><b>편명</b></span></td>
        <td width="87" bgcolor="#f1f1f1" align="center"><span class="style4"><b>날짜</b></span></td>
        <td width="87" bgcolor="#f1f1f1" align="center"><span class="style4"><b>시간</b></span></td>
        <td width="87" bgcolor="#f1f1f1" align="center"><span class="style4"><b>여정</b></span></td>
        <td width="85" bgcolor="#f1f1f1" align="center"><span class="style4"><b>편명</b></span></td>
        <td width="87" align="center" bgcolor="#f1f1f1"><span class="style4"><b>날짜</b></span></td>
        <td width="87" bgcolor="#f1f1f1" align="center"><span class="style4"><b>시간</b></span></td>
      </tr>

<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<?if(!$add6[$k]){break;}?>

	<tr>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	 <td bgcolor='#ffffff' align='center'><input type="text" name="nadd<?=$k?>" value="<?=$add6[$k++]?>" style="width:70px" /></td>
	</tr>
	<?$k++;?>
<?endfor?>
<?

$pcount = 0;
if ($add8[18]) {
	$pcount = 5;
}elseif ($add8[12]) {
	$pcount = 4;
}elseif ($add8[6]) {
	$pcount = 3;
}elseif ($add8[0]) {
	$pcount = 2;
}
?>
</table >
<table  width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
	  <tr>
        <td colspan="7" width="98" rowspan='1<?//=$pcount?>' align="center" bgcolor="#E6E6E6"><span class="style4"><b>숙박시설 예약정보</b></span></td>
      </tr>
	  <tr>
        <td align="center" bgcolor="#f1f1f1" width="130"><span class="style4"><b>호텔명</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>룸타입</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>체크인</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>박수</b></span></td>
		<td align="center" bgcolor="#f1f1f1"><span class="style4"><b>체크아웃</b></span></td>
		<td bgcolor="#f1f1f1" align="center"><span class="style4"><b>식사</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>이동수단 </b></span></td>
      </tr>


<?$k=0;?>
<? for($i=0;$i<10;$i++):?>
	<?if(!$add8[$k]){break;}?>

	<tr>
	 <td align='center' bgcolor='#ffffff'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>" style="width:130px" /></td>
	<td colspan='1' align='center' bgcolor='#ffffff'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>" style="width:130px" /></td>
	<td bgcolor='#ffffff' align='center'><?=$adddata[$i]?><input type="hidden" name="madddata<?=$i?>" value="<?=$adddata[$i]?>" /></td>
	<td bgcolor='#ffffff' align='center'><?=$add8[$k];$plus_date=$add8[$k]?> 박<input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>"  /></td>
	<td bgcolor='#ffffff' align="center"><?=$adddata[$i]?date("Y-m-d", strtotime($adddata[$i]." ". $plus_date." day")):''?></td>

	<td bgcolor='#ffffff' align='center'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>" /></td>
	<td colspan='1' align='center' bgcolor='#ffffff'><?=$add8[$k]?><input type="hidden" name="madd<?=$k?>" value="<?=$add8[$k++]?>"  /></td>
	</tr>

<?endfor?>
    </table></td>
  </tr>
  <tr>
    <td height="20"><span class="style4"><strong>■ 제공사항 및 여행자보험 </strong></span></td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellpadding="0" cellspacing="1" bgcolor="#545350">
      <tr>
        <td height="20" colspan="2" align="center" bgcolor="#E6E6E6"><span class="style4">제공사항</span></td>
        <td colspan="2" align="center" bgcolor="#E6E6E6"><input type="checkbox" name="val32" value="checkbox">허니문특전</td>
        <td colspan="2" align="center" bgcolor="#E6E6E6"><span class="style4">기타특전 및 할인</span></td>
        <td colspan="4" align="center" bgcolor="#ffffff"><input type="text" name="val33" value="" /></td>
        </tr>
      <tr>
        <td height="20" colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val34" value="checkbox">항공권</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val35" value="checkbox">유류세 및 택스</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val36" value="checkbox">리조트</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val37" value="checkbox">여행안내서</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val38" value="checkbox">여행자보험</td>
      </tr>
      <tr>
        <td height="20" colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val39" value="checkbox">여행인솔자</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val40" value="checkbox">현지안내원</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val41" value="checkbox">현지여행사</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val42" value="checkbox">가이드 팁</td>
        <td colspan="2" align="left" bgcolor="#ffffff"><input type="checkbox" name="val43" value="checkbox">여권발급비</td>
      </tr>
      <tr>
        <td width="80" rowspan="2" align="center" bgcolor="#E6E6E6"><span class="style4">항목</span></td>
        <td height="20" colspan="3" align="center" bgcolor="#F1F1F1"><span class="style4"><b>상해</b></span></td>
        <td colspan="2" align="center" bgcolor="#F1F1F1"><span class="style4"><b>질병</b></span></td>
        <td colspan="4" align="center" bgcolor="#F1F1F1"><span class="style4"><b>기타</b></span></td>
      </tr>
      <tr>
        <td width="80" height="20" align="center" bgcolor="#F1F1F1"><span class="style4"><b>사망</b></span></td>
        <td width="80" bgcolor="#F1F1F1" align="center"><span class="style4"><b>후유장애</b></span></td>
        <td width="80" bgcolor="#F1F1F1" align="center"><span class="style4"><b>해외의료비</b></span></td>
        <td width="80" bgcolor="#F1F1F1" align="center"><span class="style4"><b>사망</b></span></td>
        <td width="80" bgcolor="#F1F1F1" align="center"><span class="style4"><b>해외의료비</b></span></td>
        <td width="80" bgcolor="#F1F1F1" align="center"><span class="style4"><b>배상책임</b></span></td>
        <td width="80" bgcolor="#ffffff" align="center"><span class="style4"><b>특별비용</b></span></td>
        <td width="80" align="center" bgcolor="#ffffff"><span class="style4"><b>휴대품손해</b></span></td>
        <td width="80" align="center" bgcolor="#ffffff"><span class="style4"><b>항공기납치</b></span></td>
      </tr>
      <tr>
        <td width="80" bgcolor="#E6E6E6" align="center"><span class="style4">성인</span></td>
        <td width="80" height="20" align="center" bgcolor="#ffffff"><span class="style4">최고1억원</span></td>
        <td width="80" bgcolor="#ffffff" align="center"><span class="style4">최고1억원</span></td>
        <td width="80" bgcolor="#ffffff" align="center"><span class="style4">최고1천만원</span></td>
        <td width="80" bgcolor="#ffffff" align="center"><span class="style4">최고2천만원</span></td>
        <td width="80" bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td width="80" bgcolor="#ffffff" align="center"><span class="style4">최고2천만원</span></td>
        <td width="80" bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td width="80" align="center" bgcolor="#ffffff"><span class="style4">최고1백만원</span></td>
        <td width="80" align="center" bgcolor="#ffffff"><span class="style4">최고140만원</span></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6" align="center"><span class="style4">학생(어린이)</span></td>
        <td height="20" align="center" bgcolor="#ffffff"><span class="style4">-</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">-</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고1천만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">-</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고2천만원</span></td>
        <td bgcolor="#ffffff" align="center"><span class="style4">최고5백만원</span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">최고1백만원</span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">최고140만원</span></td>
      </tr>
      <tr>
        <td colspan="5" align="center" bgcolor="#ffffff"><span class="style4">학생(어린이)는 만15세 미만.<br>
          휴대품손해는 건당 20만원 최고1백만원 </span></td>
        <td rowspan="2" align="center" bgcolor="#f1f1f1"><span class="style4"><b>구분계약</b></span></td>
        <td height="20" align="center" bgcolor="#f1f1f1"><span class="style4"><b>행사비</b></span></td>
        <td bgcolor="#f1f1f1" align="center"><span class="style4"><b>항공료</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>기타경비</b></span></td>
        <td align="center" bgcolor="#f1f1f1"><span class="style4"><b>수수료</b></span></td>
      </tr>
      <tr>
        <td height="20" colspan="5" align="left" bgcolor="#ffffff"><div align="center" class="style4">영업공제보험가입 [금액 : 5천만원]<br/>
영업보증보험 [금액 : 2 억원] / 피보험자 : 주)트레비아 </div></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val44" value="" style="width:50px" /></td>
        <td bgcolor="#ffffff" align="center"><input type="text" name="val45" value="" style="width:50px" /></td>
        <td align="center" bgcolor="#ffffff"><input type="text" name="val46" value="" style="width:50px" /></td>
        <td align="center" bgcolor="#ffffff"><input type="text" name="val47" value="" style="width:50px" /></td>
      </tr>
    </table></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td height="20"><span class="style4"><strong>■ 취소수수료 규정 안내 </strong></span></td>
  </tr>
  <tr>
    <td>
  <table  width="800" height="50" border="0" cellpadding="0" cellspacing="1" bgcolor="#545350" >
      <tr>
        <td align="center" bgcolor="#F1F1F1"><span class="style4">취소수수료 부과 기준 </span></td>
        <td align="center" bgcolor="#FFFFFF" ><span class="style4">특별 약관 적용</span></td>
        <td align="center" bgcolor="#F1F1F1"><span class="style4">계약시 </span></td>
        <td align="center" bgcolor="#FFFFFF" ><span class="style4">계약금액 환불 불가 </span></td>
		<td align="center" bgcolor="#F1F1F1"><span class="style4"> D-40일</span></td>
		<td align="center" bgcolor="#FFFFFF" ><span class="style4">전액환불불가</span></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="6"><span class="style4">- 취소수수료는 계약금 입금일부터 적용됩니다. 특별약관 적용의 경우, 표준약관보다 높은 취소수수료가 부과될 수 있습니다. </span></td>
      </tr>
  </table>                                                       
  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style4">▣ 갑과 을은 위 계약내용과 약관을 상호 성실히 이행 및 준수할 것을 확인하며 아래와 같이 서명 또는 날인합니다.</span></td>
  </tr>
  <tr>
    <td><span class="style4">※ 항공기 정비 등 항공사의 귀책사유로 인하거나 천재지변 등으로 인하여 발생하는 여행일정 변경은 항공사와 여행자의 부담으로 한다</span></td>
  </tr>
  <tr>
    <td><span class="style4">※ 본 계약과 관련한 다툼이 있을 경우 문화관광부고시에 의거 운영되는 관광불편신고처리위원회(전화 1588-8692) 또는 여행사 본사 소재 시.도청(시.군.구 포함) 문화관광과로 중재를 요청할 수 있다.</span></td>
  </tr>
  <tr>
    <td><span class="style4">트레비아의 허니문여행상품은 환율이 좋을때 언제든지 선결제가 가능합니다. 안내드린 상품가는 현금(원화 or 달러)결제 기준으로 할인된 금액입니다.</span></td>
  </tr>
  <tr>
    <td><span class="style4">국외여행 표준약관 제12조에 의거 환율 증감에 따른 상품가 변동이 있습니다. </span></td>
  </tr>
  <tr>
    <td><span class="style4">※ ﻿계약진행 확정 후 리조트 사정으로 해당 예약이 불가할 경우, 변경 가능한 리조트를 안내해드리며 이후 고객 요청시에는 계약금 전액을 환불 처리해 
드립니다.(예약 확정 까지는 최대 3~4일이 소요될 수 있습니다.) ※</span></td>
  </tr>
  <tr>
    <td><span class="style4">※ 을의 귀책사유로 취소될 경우, 취소수수료 기준은 갑의 '트레비아 몰디브 특별약관'에 의한다</span></td>
  </tr>
  <tr>
    <td><span class="style4">▣ 을은 본 상품과 일반약관 및 특별약관에 관하여 충분히 이해했으며 이에 동의합니다.</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellpadding="0" cellspacing="1" bgcolor="#545350">
      <tr>
        <td width="98" height="25" align="center" bgcolor="#e6e6e6"><span class="style4"><b>상 호 </b></span></td>
        <td width="328" align="center" bgcolor="#ffffff"><span class="style4">주식회사 트레비아 </span></td>
        <td width="100" rowspan="3" align="center" bgcolor="#ffffff"><img src="http://trevia.co.kr/mail/sign.jpg" width="80" height="79"></td>
        <td width="99" align="center" bgcolor="#e6e6e6"><span class="style13">담당자</span></td>
        <td width="169" align="center" bgcolor="#ffffff"><?=$add2[9]?><input type="hidden" name="val48" value="<?=$add2[9]?>" style="width:150px" /></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#e6e6e6"><span class="style4"><b>주 소 </b></span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">서울시 마포구 서교동 480-10 미리내빌딩 3층</span></td>
        <td align="center" bgcolor="#e6e6e6"><span class="style13">전화</span></td>
        <td align="center" bgcolor="#ffffff"><input type="text" name="val49" value="070-4324-4400" style="width:150px" /></td>
      </tr>
      <tr>
        <td height="20" align="center" bgcolor="#e6e6e6"><span class="style4"><b>대표자</b></span></td>
        <td align="center" bgcolor="#ffffff"><span class="style4">임 희 성 </span></td>
        <td align="center" bgcolor="#e6e6e6"><span class="style13">담당자직통</span></td>
<?
$sql = mysql_query("SELECT * FROM rb_s_mbrdata where name = '$add2[9]' and admin=1;");
$man = mysql_fetch_array($sql);
?>
        <td align="center" bgcolor="#ffffff"><?=$man[tel2];?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#545350">
      <tr>
        <td width="98" rowspan="2"  align="center" bgcolor="#e6e6e6"><span class="style4"><b>성 명</b></span></td>
        <td width="259" height="25" align="center" bgcolor="#ffffff"><input type="text" name="val51" value="<?=$add3[0]?>.<?=$add3[2]?>" style="width:150px" /></td>
        <td width="169" align="center" bgcolor="#ffffff"><span class="style4"><input type="text" name="val52" value="<?=$add3[1]?>" /></span></td>
        <td width="99" rowspan="2"  align="center" bgcolor="#e6e6e6"><span class="style13">전화</span></td>
        <td width="169" align="center" bgcolor="#ffffff"><span class="style4"><input type="text" name="val53" value="<?=$add3[4]?>" style="width:150px" /></span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#ffffff"><input type="text" name="val54" value=" <?=$add3[6]?>.<?=$add3[8]?>" style="width:150px" /></td>
        <td align="center" bgcolor="#ffffff"><span class="style4"><input type="text" name="val55" value="<?=$add3[7]?>" /></span></td>
        <td align="center" bgcolor="#ffffff"><input type="text" name="val56" value="<?=$add3[10]?>" style="width:150px" /></td>
      </tr>
      <tr>
        <td height="40"  align="center" bgcolor="#e6e6e6"><span class="style4"><b>유의사항</b> </span></td>
        <td height="40" colspan="4"  align="center" bgcolor="#ffffff"><div align="left" class="style4">* 영문이름이 여권과 다를 경우 탑승이 취소될 수 있으니 꼭 확인하셔야 합니다. <br>
  * 복수여권을 소지하신 분은 허니문 출발일 기준으로 유효기간이 6개월이상 남아있어야하고, 단수여권을 소지하신 분은 한번도 사용하지 않은 여권이어야 출국이 가능합니다. <br>
  * 주) 트레비아에서는 항공권을 최저가에 구매대행하여 드린것으로  마일리지 적립 및 좌석지정 등에 대해서는 최대한 도움을 드리지만 책임을 지지 않으므로 고객님이 사전에 꼭 준비하시길 바랍니다. <br>
  * 미주 여행자 및 경유자 분들은 비자 소지여부를 꼭 확인 하시고 전자여권 발급 및 ESTA(비자면제프로그램) 신청에 차질이 없도록 신경 쓰셔야 합니다. (ESTA 및 비자 업무 개별 진행된 경우 당사에서는 별도의 개별확인 절차가 없으며 미 신청에 따른 여행불편의 책임을 지지 않습니다.) <br/>
  * 몰디브 내에서의 이동수단은 현지(기상, 리조트)사정에 따라 변동될 수 있습니다.  <br/>
  * 미주항공권 대한항공 or 아시아나 + 미국 중간구간(UA, AA, DL) 발권하신 고객님의 경우 항공사의 정책에 따라 중간구간 항공권의 취소시 환불이 전혀 되지 않습니다. 스케줄변경시 변경 수수료가 부과 됩니다. 또한, 출발일 변경이 불가하오니 참고바랍니다.
  </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>


  <!--
  <tr>
    <td height="20"><div align="center"><span class="style4"><span class="style11">본 전자 계약서의 내용을 검토하신 후 아래의 &quot; 계약승인&quot; 버튼을 클릭하시면 여행계약이 성립 됩니다.</span></span></div></td>
  </tr>
  <tr>
    <td height="20" align="right">
      <div align="right"><span class="style4"></span>
          <input type="submit" name="Submit" value="계약승인">
      </div>
    </td>
  </tr>
-->


  <tr>
    <td height="20"><span class="style4"><strong>[ 일반 여행약관 ] </strong></span></td>
  </tr>
  <tr>
    <td height="20">
	<div id="policy01">
<p>공정거래위원회 승인 약관 (2011.12.28) 준용</p>

<h5>제1조 목적</h5>
이 약관은 주식회사 트레비아(이하 "당사"라 한다.)와 여행자가 체결한 여행계약의 세부 이행 및 준수사항을 정함을 목적으로 합니다. 

<h5>제2조 당사와 여행자 의무</h5>
① 당사는 여행자에게 안전하고 만족스러운 여행서비스를 제공하기 위하여 여행알선 및 안내, 운송, 숙박 등 여행계획의 수립 및 실행과정에서 맡은 바 임무를 충실히 수행하여야 합니다. 
② 여행자는 안전하고 즐거운 여행을 위하여 여행자간 화합도모 및 여행업자의 여행질서 유지에 적극 협조하여야 합니다.
 
<h5>제3조 용어의 정의</h5>
여행의 종류 및 정의, 해외여행 수속대행업의 정의는 다음과 같습니다.

① 기획여행 : 당사가 미리 여행목적지 및 관광일정, 여행자에게 제공될 운송 및 숙식서비스 내용(이하 '여행서비스'라 한다), 여행 요금을 정하여 광고 또는 기타 방법으로 여행자를 모집하여 실시하는 여행. 
② 희망여행 : 여행자(개인 또는 단체)가 희망하는 여행조건에 따라 당사가 운송, 숙식, 관광 등 여행에 관한 전반적인 계획을 수립하여 실시하는 여행. 
③ 해외여행 수속대행(이하 수속대행계약이라 한다) : 당사가 여행자로부터 소정의 수속대행요금을 받기로 약정하고, 여행자의 위탁에 따라 다음에 열거하는 업무(이하 수속 대행업무라 한다)를 대행하는 것. 
   1. 여권, 사증, 재입국 허가 및 각종 증명서 취득에 관한 수속
   2. 출입국 수속서류 작성 및 기타 관련업무 

<h5>제4조 계약의 구성</h5>
① 여행계약은 여행계약서(붙임)와 여행약관, 여행일정표(또는 여행설명서)를 계약내용으로 합니다. 
② 여행일정표(또는 여행설명서)에는 여행일자별 여행지와 관광내용, 교통수단, 쇼핑횟수, 숙박장소, 식사 등 여행실시 일정 및 여행사 제공 서비스 내용과 여행자 유의사항이 포함되어야 합니다.
 
<h5>제5조 계약의 성립</h5>
여행자가 당사에 구두, 전화, 서신, 서류 등에 의한 의사표시로 국외여행을 신청하고, 당사는 소정절차에 따라 이에 대한 신청을 확인한 후 여행자가 여행요금의 10%상당의 계약금을 당사에 지급하면 여행계약이 성립한 것으로 간주합니다. 

<h5>제6조 특약</h5>
당사와 여행자는 관계법규에 위반되지 않는 범위 내에서 서면으로 특약을 맺을 수 있습니다. 이 경우 표준약관과 다름을 당사는 여행자에게 설명하여야 합니다.

<h5>제7조 계약서 및 약관 등 교부</h5>
당사는 여행자와 여행계약을 체결한 경우 여행계약서와 여행약관, 여행일정표(또는 여행설명서)를 각 1부씩 여행자에게 교부하여야 합니다.

<h5>제8조 계약서 및 약관 등 교부 간주</h5>
당사와 여행자는 다음 각 호의 경우 여행계약서와 여행약관 및 여행일정표(또는 여행설명서)가 교부된 것으로 간주합니다.

1. 여행자가 인터넷 등 전자정보망으로 제공된 여행계약서, 약관 및 여행일정표(또는 여행설명서)의 내용에 동의하고 여행계약의 체결을 신청한데 대해 당사가 전자정보망이나 기계적 장치 등을 이용하여 여행자에게 승낙의 의사를 통지한 경우 
2. 당사가 팩시밀리 등 기계적 장치를 이용하여 제공한 여행계약서, 약관 및 여행일정표(또는 여행설명서)의 내용에 대하여 여행자가 동의하고 여행계약의 체결을 신청하는 서면을 송부한데 대해 당사가 전자정보망이나 기계적 장치 등을 이용하여 여행자에게 승낙의 의사를 통지한 경우
 
<h5>제9조 최저행사인원 미 충족시 계약해제</h5>

① 당사가 여행참가자 수 미달로 인하여 여행계약을 해제하는 경우 여행출발 7일전까지 여행자에게 통지하여야 합니다. 
② 당사가 여행참가자 수 미달로 전항의 기일내 통지를 하지 아니하고 계약을 해제하는 경우 이미 지급받은 계약금 환급 외에 다음 각 목의 1의 금액을 여행자에게 배상하여야 합니다. 
1. 여행출발 1일전까지 통지시 : 여행요금의 20%
2. 여행출발 당일 통지시 : 여행요금의 50%

<h5>제10조 계약체결 거절</h5>
당사는 여행자에게 다음 각 호의 1에 해당하는 사유가 있을 경우에는 여행자와의 계약체결을 거절할 수 있습니다.

  1. 다른 여행자에게 폐를 끼치거나 여행의 원활한 실시에 지장이 있다고 인정될 때
  2. 질병 기타 사유로 여행이 어렵다고 인정될 때
  3. 명시한 최대행사인원이 초과되었을 때
  4. 일정표에 최저행사인원이 미달되었을 때

<h5>제11조 여행요금</h5>
① 여행계약서의 여행요금에는 다음 각 호가 포함됩니다. 단, 다음의 1~9호는 여행자 본인이 직접 여행지에서 지불하여야 할 금액이나 당사가 여행자 편의를 위하여 수탁받아 이를 대신 지불합니다. 
    1. 항공기, 선박, 철도 등 이용운송기관의 운임(보통운임기준)
    2. 공항, 역, 부두와 호텔사이 등 송영버스요금
    3. 숙박요금 및 식사요금
    4. 안내자경비
    5. 여행 중 필요한 각종세금
    6. 국내외 공항, 항만세
    7. 관광진흥개발기금
    8. 일정표내 관광지 입장료
    9. 기타 개별계약에 따른 비용
   10. 여행 알선 수수료
② 여행계약서의 여행요금에는 다음 각 호가 불포함됩니다. 단, 희망여행은 당사자간 합의에 따릅니다. 
1. 여행중 개인적 성질의 제비용(통신료, 관세, 일체의 팁, 세탁비, 개인적으로 추가한 식.음료)
2. 여행중 여행자나 개인의 질병, 상해 및 그 밖의 사유로 의사의 진단에 따라 지불해야 하는 일체의 비용
3. 규격이나 규정을 초과하여 발생한 비용(1인 1실 사용 추가요금, 초과 규격의 수화물 운반비 등)
4. 여행 일정표에 구체적으로 명시되지 않은 비용
5. 여행 수속 제비용(여권 인지대, 사증료 등)
③ 여행자는 계약체결시 계약금(여행요금 중 10%이하 금액)을 당사에게 지급하여야 하며, 계약금은 여행요금 또는 손해배상액의 전부 또는 일부로 취급합니다. 
④ 여행자는 제1항의 여행요금 중 계약금을 제외한 잔금을 여행출발 7일전까지 당사에게 지급하여야 합니다.
⑤ 여행자는 제1항의 여행요금을 당사가 지정한 방법(지로구좌, 무통장입금 등)으로 지급하여야 합니다.
⑥ 희망여행요금에 여행자 보험료가 포함되는 경우 당사는 보험회사명, 보상내용 등을 여행자에게 설명하여야 합니다.

<h5>제12조 여행요금의 변경</h5>
① 국외여행을 실시함에 있어서 이용운송,숙박기관에 지급하여야 할 요금이 계약체결시보다 5% 이상 증감하거나 여행요금에 적용된 외화환율이 계약체결시보다 2% 이상 증감한 경우 당사 또는 여행자는 그 증감된 금액 범위 내에서 여행요금의 증감을 상대방에게 청구할 수 있습니다. 
② 당사는 제1항의 규정에 따라 여행요금을 증액하였을 때에는 여행개시 15일전에 여행자에게 통지하여야 합니다.

<h5>제13조 여행조건의 변경요건 및 요금 등의 정산</h5>
① 위 제1조 내지 제12조의 여행조건은 다음 각 호의 1의 경우에 한하여 변경될 수 있습니다. 
    1. 여행자의 안전과 보호를 위하여 여행자의 요청 또는 현지사정에 의하여 부득이하다고 쌍방이 합의한 경우
    2. 천재지변, 전란, 정부의 명령, 운송,숙박기관 등의 파업,휴업 등으로 여행의 목적을 달성할 수 없는 경우
② 제1항의 여행조건 변경 및 제12조의 여행요금 변경으로 인하여 제11조제1항의 여행요금에 증감이 생기는 경우에는 여행출발 전 변경분은 여행출발 이전에, 여행 중 변경분은 여행종료 후 10일 이내에 각각 정산(환급)하여야 합니다. 
③ 제1항의 규정에 의하지 아니하고 여행조건이 변경되거나 제15조 또는 제16조의 규정에 의한 계약의 해제,해지로 인하여 손해배상액이 발생한 경우에는 여행출발 전 발생분은 여행출발 이전에, 여행 중 발생분은 여행종료 후 10일 이내에 각각 정산(환급)하여야 합니다. 
④ 여행자는 여행출발 후 자기의 사정으로 숙박, 식사, 관광 등 여행요금에 포함된 서비스를 제공받지 못한 경우 당사에게 그에 상응하는 요금의 환급을 청구할 수 없습니다. 단, 여행이 중도에 종료된 경우에는 제14조에 준하여 처리합니다.
 
<h5>제14조 손해배상</h5>
① 당사는 현지여행업자 등의 고의 또는 과실로 여행자에게 손해를 가한 경우 당사는 여행자에게 손해를 배상하여야 합니다. 
② 당사의 귀책사유로 여행자의 국외여행에 필요한 여권, 사증, 재입국 허가 또는 각종 증명서 등을 취득하지 못하여 여행자의 여행일정에 차질이 생긴 경우 당사는 여행자로부터 절차대행을 위하여 받은 금액 전부 및 그 금액의 100% 상당액을 여행자에게 배상하여야 합니다. 
③ 당사는 항공기, 기차, 선박 등 교통기관의 연발착 또는 교통체증 등으로 인하여 여행자가 입은 손해를 배상하여야 합니다. 단, 당사가 고의 또는 과실이 없음을 입증한 때에는 그러하지 아니합니다. 
④ 당사는 자기나 그 사용인이 여행자의 수하물 수령, 인도, 보관 등에 관하여 주의를 해태(懈怠)하지 아니하였음을 증명하지 아니하면 여행자의 수하물 멸실, 훼손 또는 연착으로 인한 손해를 배상할 책임을 면하지 못합니다. 

<h5>제15조 여행출발 전 계약해제</h5>
① 당사 또는 여행자는 여행출발전 이 여행계약을 해제할 수 있습니다. 이 경우 발생하는 손해액은 '소비자 분쟁해결 기준 '(공정거래위원회 고시)에 따라 배상합니다. 
   1. 여행자의 여행계약 해제 요청이 있는 경우(여행자의 취소요청시) 
- 여행 개시 20일전(~20)까지 통보시 : 여행요금의 10% 배상 
- 여행 개시 10일전까지(19~10) 통보시 : 여행요금의 15% 배상 
- 여행 개시 8일 전까지(9~8) 통보시 : 여행요금의 20% 배상 
- 여행 개시 1일 전까지(7~1) 통보시 : 여행요금의 30% 배상 
- 여행 당일 통보시 : 여행요금의 50% 배상 
2. 당사의 귀책사유로 취소 통보하는 경우 
      - 여행 개시 20일전(~20)까지 통보시 : 계약금 환급 
      - 여행 개시 10일전까지(19~10) 통보시 : 여행요금의 5% 배상 
      - 여행 개시 8일 전까지(9~8) 통보시 : 여행요금의 10% 배상 
      - 여행 개시 1일 전까지(7~1) 통보시 : 여행요금의 20% 배상 
      - 여행 당일 통보시 : 여행요금의 50% 배상 
   단, 최저행사인원이 충족되지 않아 불가피하게 기획여행을 실시할 수 없는 경우에는 제9조(최저행사인원 미충족시 계약해제)의 조항에 의거하여 당사가 여행자에게 배상한다. 
3. 규격이나 규정을 초과하여 발생한 비용(1인 1실 사용 추가요금, 초과 규격의 수화물 운반비 등)
   4. 여행 일정표에 구체적으로 명시되지 않은 비용
   5. 여행 수속 제비용(여권 인지대, 사증료 등)
② 당사 또는 여행자는 여행출발 전에 다음 각 호의 1에 해당하는 사유가 있는 경우 상대방에게 제1항의 손해배상액을 지급하지 아니하고 이 여행계약을 해제할 수 있습니다 
1. 당사가 해제할 수 있는 경우
      가. 제13조 제1항 제1호 및 제2호사유가 있는 경우
      나. 다른 여행자에게 폐를 끼치거나 여행의 원활한 실시에 현저한 지장이 있다고 인정될 때
      다. 질병 등 여행자의 신체에 이상이 발생하여 여행에의 참가가 불가능한 경우
      라. 여행자가 계약서에 기재된 기일까지 여행요금을 납입하지 아니한 경우 
2. 여행자가 해제할 수 있는 경우
      가. 제13조제1항제1호 및 제2호의 사유가 있는 경우
      나. 여행자의 3촌 이내 친족이 사망한 경우 (단, 여행자는 아래와 같은 입증서류를 당사에 제출하여야 한다.)
          1) 친족을 확인할 수 있는 서류(호적등본 등)
          2) 진단서 또는 사체검안서(사망진단서)
          3) 그밖에 필요한 자료
      다. 질병 등 여행자의 신체에 이상이 발생하여 여행에의 참가가 불가능한 경우 (단, 여행자는 아래와 같은 입증서류를 당사에 제출하여야 한다.)
          1) 진단서
          2) 그밖에 필요한 자료
      라. 배우자 또는 직계존비속이 신체이상으로 3일 이상 병원(의원)에 입원하여 여행 출발 전까지 퇴원이 곤란한 경우 (그 배우자 또는 보호자 1인 단, 여행자는 아래와 같은 입증서류를 당사에 제출하여야 한다.)
          1) 친족을 확인할 수 있는 서류(호적등본등)
          2) 진단서
          3) 그밖에 필요한 자료
마. 당사의 귀책사유로 계약서 또는 여행일정표(여행설명서)에 기재된 여행일정대로의 여행실시가 불가능해진 경우
바. 제12조 제1항의 규정에 의한 여행요금의 증액으로 인하여 여행 계속이 어렵다고 인정될 경우 

<h5>제16조 여행출발 후 계약해지</h5>
① 당사 또는 여행자는 여행출발 후 부득이한 사유가 있는 경우 이 여행계약을 해지할 수 있습니다. 단, 이로 인하여 상대방이 입은 손해를 배상하여야 합니다. 
② 제1항의 규정에 의하여 계약이 해지된 경우 당사는 여행자가 귀국하는데 필요한 사항을 협조하여야 하며, 이에 필요한 비용으로써 당사의 귀책사유에 의하지 아니한 것은 여행자가 부담합니다. 

<h5>제17조 당사의 책임</h5>
당사는 여행 출발시부터 도착시까지 당사 본인 또는 그 고용인, 현지여행업자 또는 그 고용인 등(이하 '사용인'이라 함)이 제2조 제1항에서 규정한 당사 임무와 관련하여 여행자에게 고의 또는 과실로 손해를 가한 경우 책임을 집니다.

<h5>제18조 여행자의 책임</h5>
① 여행자는 여행의 원활한 진행을 위하여 당사에서 주최하는 사전 여행 설명회에 참가하여 제11조 1항의 각호를 확인할 책임이 있습니다. 
② 여행자는 여행의 원활한 진행을 위하여 여행 안내원의 업무수행에 성실히 협조하여야 합니다.
③ 여행자의 고의 또는 과실로 당사에 끼친 손해에 대하여 여행자는 당사에 배상 및 보상의 책임을 집니다.
④ 여행자의 귀중품 및 소지품은 여행자 자신의 책임 하에 각자 보관하여야 합니다. 
   여행 도중 여행자의 귀중품 및 소지품이 도난사실이 발생한 경우 여행자 또는 보험수익자는 사고가 생긴 것을 알았을 때에는 지체 없이 그 사실을 해당 보험회사에 알리고 아래의 서류를 빠른 시간 내에 제출하여야 합니다. 
   1. 도난 확인서
   2. 경위서
   3. 그 밖에 필요한 서류
⑤ 여행자가 여행계약 체결 전에 고지하지 않은 신체의 장해 또는 질병 등으로 발생하는 문제는 여행자가 책임을 집니다. 단, 여행 도중 발생한 신체의 장해 또는 질병 등이 발생한 경우 여행자 또는 보험수익자는 지체없이 그 사실을 해당 보험회사에 알리고 아래의 서류를 즉시 제출하여야 합니다. 
   1. 사고 증명서
   2. 진단서
   3. 경위서
   4. 영수증
   5. 그 밖에 필요한 서류
⑥ 항공으로 이동 전에 해당 공사에 위탁한 수하물은 여행자가 확인할 책임이 있습니다. 국제선으로 운송되는 수하물에 손상이 발생하였을 경우 여행자는 당해 손상 발견 즉시 또는 늦어도 수하물을 수취한 날로부터 7일 이내에 운송인에게 서면으로 이의를 제기하여야 하며, 지연의 경우에는 수하물을 수취한 날로부터 21일 이내에 운송인에게 이의를 제기하여야 합니다. 

<h5>제19조 여행의 시작과 종료</h5>
여행의 시작은 탑승수속(선박인 경우 승선수속)을 마친 시점으로 하며, 여행의 종료는 여행자가 입국장 보세구역을 벗어나는 시점으로 합니다. 단, 계약내용상 국내이동이 있을 경우에는 최초 출발지에서 이용하는 운송수단의 출발시각과 도착시각으로 합니다.

<h5>제20조 설명의무</h5>
당사는 계약서에 정하여져 있는 중요한 내용 및 그 변경사항을 여행자가 이해할 수 있도록 설명하여야 합니다.

<h5>제21조 보험가입 등</h5>
당사는 이 여행과 관련하여 여행자에게 손해가 발생한 경우 여행자에게 보험금을 지급하기 위한 보험 또는 공제에 가입하거나 영업보증금을 예치하여야 합니다.

<h5>제22조 기타사항</h5>
① 이 계약에 명시되지 아니한 사항 또는 이 계약의 해석에 관하여 다툼이 있는 경우에는 당사 또는 여행자가 합의하여 결정하되, 합의가 이루어지지 아니한 경우에는 관계법령 및 일반관례에 따릅니다. 
② 특수지역에의 여행으로서 정당한 사유가 있는 경우에는 당사의 여행약관의 내용과 달리 정할 수 있습니다.

</div>
	
	</td>
  </tr>
  <tr>
    <td height="20"><span class="style4"><strong>[ 특별 여행약관 <?=$add2[2]?> ] <input type="hidden" name="add2_2" value="<?=$add2[2]?>" />  </strong></span></td>
  </tr>
  <tr>
    <td>
	</td>
  </tr>
  <tr>
    <td>
<div id="policy01">
<h5>제1조 (목적)</h5>
이 약관은 주식회사 트레비아(이하 '회사'라고 한다)와 여행사가 체결한 국외여행계약의 표준약관 제6조에 준해 표준약관 내용외의 세부이행 및 준수사항 정함을 목적으로 하며 본 계약 상품에 명시함으로써 일반약관보다 우선적으로 효력을 발생합니다.

<h5>제2조 (당사와 여행자 의무)</h5>
1. 당사는 여행자에게 안전하고 만족스로운 여행서비스를 제공하기 위하여 여행알선 및 안내, 운송, 숙박 등 여행계획의 수립 및 실행과정에서 맡은 바 임무를 충실히 수행하여야 한다.
2. 여행자는 안전하고 즐거운 여행을 위하여 여행자간 화합도모 및 여행업자의 여행질서 유지에 적극협조하여야 한다.
3. 본 특별약관은 여행계약서 및 여행안내서와 함께 을에게 교부하여야 하며 일반약관과 다른 점을 설명하여야 한다. 

<h5>제3조 (여행계약 및 여행비용의 납입)</h5>
1. 본 상품은 <?=$add2[2]?> 여행 상품으로 리조트와 항공권 등이 포함된 상품입니다.
2. 여행자는 직접방문, 전화, 인터넷, 이메일, 팩스 등으로 당사의 소정양식 및 절차에 따라 여행 신청을 할 경우 계약이 성립되며, 1 인당  최소 40만원의 계약금을 지급하여야 한다.   
3. 본 상품은 회사가 정한 계약금이 입금됨과 동시에 계약이 성립하며 여행출발일 46일전까지 잔금을 완납해야 계약의 효력이 유지됩니다.
4. 을 은 본 특별약관을 충분히 이해하고 동의한다는 의사표시로 여행자계약서 상의 을의 성명 옆에 서명하고 사본을 이메일, 팩스 등의 방법으로 회사로 송부하여야 한다.
   - 여행계약서 교부후 3일 이내에 서명본이 회사로 도달되지 않을 경우 서명한 것으로 간주한다.

<h5>제4조 (계약해제 및 취소규정)</h5>
1. 여행자는 여행출발전 여행계약을 해제할 수 있지만, 이에 따라 발생하는 손해액은 일반적인 상품이나 리조트의경우 국외여행표준약관 제15조에 따라 배상합니다. 하지만 국외여행표준약관 제22조 2항에 근거해 일부 특수지역이나 상품, 리조트에 대해서는 여행자의 여행계약 해제 취소요청이 있는경우(여행자의 취소요청시)소비자 피해보상규정과는 상관없이 각 상품별로 특별약관에 따른 별도의 취소요금이 부과됩니다. 특별약관의 피해보상 규정은 일반적인 약관인 소비자 피해보상규정보다 우선시 적용됩니다. 
2. 따라서 상기의 경우, 취소 수수료는 회사의 일반약관에 우선하여 부득이 본 특별약관을 적용하여 다음과 같이 취소 수수료가 적용됨을 양해해 주시기 바랍니다.
   - 여행출발일 46일전까지 취소시 : 계약금을 제외한 나머지 금액 환불
   - 여행출발일 45일전부터 출발일당일까지 취소시 : 환불 불가
3. 특정리조트는 리조트 자체 취소정책에 준하여 상기 취소일정과 상이 할수 있음을 알려드립니다.

4. 일부 발권된 항공권은 항공사의 항공권 판매정책에 준하여 환불이 불가할 수 있습니다. 

<h5>제5조 (현금영수증)</h5>
1. 현금영수증 발급은 예약일로 부터 여행도착일 +7일 이내 신청할 수 있습니다.
2. 현금 영수증 발급시기는 현금영수증 가맹점이 재화 또는 용역을 공급하고 그 대금을 현금으로 받는 때에 재화 또는 용역을 공급받는 자에게 발급하는 것으로 기지급 받은 현금에 대하여 소급하여 발급할 수는 없음을 알려 드립니다. (사건번호 서일-1059 2007. 7. 27 참조)

<h5>제6조 (기타사항)</h5>
1. 항공좌석은 사전 배정이 불가하며 여행출발일 탑승수속시 배정합니다.
2. 주식회사 트레비아에서는 최대 보험금 1억원의 여행자 보험을 가입해 드립니다. 여행 도중에 우연하게 현지에서 발생하는 불의의 사고 및 질병이 발생할 경우에는 반드시 현지 가이드 및 회사 긴급 연락처에 연락하여 도움을 받으시길 바랍니다. 보험 약관상 현지 병원 진단서 및 영수증, 경찰의 사건 확인서를 받아 오셔야 보험 혜택이 있으므로 가이드와 상의 바랍니다. 보험 약관에 관한 자세한 혜택 내용은 홈페이지(www.samsungfire.co.kr)를 통하여 확인하여 주시기 바랍니다.
</div>
	</td>
	<!-- 특별 여행약관 정책테이블 까지. -->
  </tr>
  <tr>
    <td height="20"><div align="center" class="style4"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>

<input type="submit" name="sending" value="메일전송" />
</form>

</html>
