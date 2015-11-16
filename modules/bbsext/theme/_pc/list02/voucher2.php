<meta charset="utf-8" />
<script language="JavaScript">
   var initBody
   function beforePrint(){
   initBody = document.body.innerHTML;
   document.body.innerHTML = idPrint.innerHTML;
       }
   function afterPrint(){
       document.body.innerHTML = initBody;
      }
   function printArea() {
       window.print();
      }
      window.onbeforeprint = beforePrint;
      window.onafterprint = afterPrint;

 function printWindow()
 {
  factory.printing.header       = ""
  factory.printing.footer       = ""
  factory.printing.portrait     = true // true 세로출력 , false 가로출력
  factory.printing.leftMargin   = 10
  factory.printing.topMargin    = 10
  factory.printing.rightMargin  = 10
  factory.printing.bottomMargin = 10

  factory.printing.Print( false, window ) // 대화상자 표시여부 / 출력될 프레임명

  window.close();
 }
  
</script>
<body onload="printWindow();">
<object id="factory" style="display:none"
classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814"
  codebase="/smsx.cab#Version=7.4.0.8">
</object>
<center>
<div id="idPrint">
<table width="800" style="margin:0;padding:0;" cellspacing="0" border="0">
	<tr>
		<td colspan="4"><img src="http://trevia.co.kr/layouts/newtrevia/image/logo.gif" /> </td>
	</tr>
	<tr>
		<td height="80" colspan="4"><center><h1><b>HOTEL VOUCHER</b></h1></center></td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Hotel Reservation Summary</b></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><b>LEBLANC SPA Resort Cancun</td>
		<td>Confirmation No</td>
		<td><b>ZHLB1060017</b></td>
	</tr>
	<tr>
		<td height="30" colspan="2">Boulevard KUKULKAN KM 10 Hotel Zone<br /> Cancun 77500 Mexico</td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td height="30" colspan="2" style="border-bottom-style:solid; border-width:1">Phone : (52) 998-881-4740, (52) 998-881-4741 </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1" align="right"></td>
	</tr>
	<tr>
		<td height="30" colspan="4"> </td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Service Description</b> </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1">Check-IN </td>
		<td style="border-bottom-style:solid; border-width:1">Check-OUT </td>
		<td colspan="2" style="border-bottom-style:solid; border-width:1">Room Type </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:4">08-APR-2014 </td>
		<td style="border-bottom-style:solid; border-width:4">13-APR-2014 </td>
		<td width="400" colspan="2" style="border-bottom-style:solid; border-width:4">Royal Honeymoon Ocean Front </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1">Guests </td>
		<td style="border-bottom-style:solid; border-width:1">Rooms </td>
		<td style="border-bottom-style:solid; border-width:1">Nights </td>
		<td style="border-bottom-style:solid; border-width:1">Board Base </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1">2 </td>
		<td style="border-bottom-style:solid; border-width:1">1 </td>
		<td style="border-bottom-style:solid; border-width:1">5 </td>
		<td style="border-bottom-style:solid; border-width:1">A.I. </td>
	</tr>
	<tr>
		<td height="30" colspan="4"> </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:4"><b>Guests Info</b> </td>
		<td style="border-bottom-style:solid; border-width:4"> </td>
		<td style="border-bottom-style:solid; border-width:4"> </td>
		<td style="border-bottom-style:solid; border-width:4"> </td>
	</tr>
	<tr>
		<td height="30"><b>MS</b> </td>
		<td>PARK MI AE </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1"><b>MR</b> </td>
		<td style="border-bottom-style:solid; border-width:1">KIM JI HOON </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
	</tr>
	<tr>
		<td height="30" colspan="4"> </td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Remarks</b> </td>
	</tr>
	<tr>
		<td height="100" style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
		<td style="border-bottom-style:solid; border-width:1"> </td>
	</tr>
	<tr>
		<td height="30"> </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Pick Up & Sending</b> </td>
	</tr>
	<tr>
		<td height="150" colspan="4" style="border-bottom-style:solid; border-width:4">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trevia CanCun Office (현지사무소) : (52)-998-206-1251<p />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Local Guide (현지가이드) : 남재현 대리(52)-998-230-6414, 이성일 이사 (521)-998-116-2544<p />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meeting Point (미팅장소) : 세관 통과 후 공항 밖으로 나오시면 됩니다. 한국인 가이드가 이름이 적힌 피켓을 <p />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;들고 기다립니다. ^^<p />
		</td>
	</tr>
	<tr>
		<td height="80" colspan="4" style="border-bottom-style:solid; border-width:1">
			&nbsp; TREVIA CO.LTD (주식회사트레비아) <br/> 
			&nbsp; 3rd Floor. Mirinae B/D, 480-10, Seokyo-dong, Mapo-gu, Seoul, Korea <br/> 
			&nbsp; Phone : (82)-1644-6681, (82)-70-4324-4400, (82)-70-4324-4442 <br/> 
			&nbsp; Email : usa@trevia.co.kr, Kakao ID : wiseways
		</td>
	</tr>
	<tr>
		<td height="30" colspan="4" align="right"><b>Thank you for booking with TREVIA CO.LTD</b> </td>
	</tr>
</table>
</div>
</center>
</body>