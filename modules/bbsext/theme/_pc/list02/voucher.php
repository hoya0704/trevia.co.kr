<meta charset="euc-kr" />
<script src="/lib/jquery-1.4.4.js"></script>
<style>
	#tooltip { 
		z-index: 999;
		font-size: 15px;
		background-color: red; 
		color: blue;
		padding: 4px;

	}
	#tooltip .tipBody { 
		background-color: white; 
	}
</style>
<? 

$month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

$seq = $_GET[seq];

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$m_sql = mysql_query("SELECT * FROM rb_bbsext_data where uid = '".$_GET['uid']."' ");
$m_rs = mysql_fetch_array($m_sql);

$user = explode("||", $m_rs['add3']);

$admin = explode("||", $m_rs['add2']);

echo "<pre>";
//print_r($admin);
echo "</pre>";


$resort = explode("||", $m_rs['add8']);

$check = explode("||", $m_rs['adddata']);

$days = explode("-", $check[$seq/6]);

$afterdays = explode("-", date("Y-m-d", strtotime($check[$seq/6]." ". $resort[$seq+2]." day")));

echo "<pre>";
//print_r($check[$seq/6]);
echo "</pre>";

$sql = "SELECT * FROM rb_voucher_data where bbsext_uid='". $_GET['uid'] ."' and resort_name='". $resort[$seq]."';";
$vo_sql = mysql_query($sql);
$vo_rs1 = mysql_fetch_array($vo_sql);

if( empty( $vo_rs1 ) )
{
	$tempArray = explode(" ", $resort[$seq]);
	$sql = "SELECT * FROM rb_bbs_data where bbsid='resort' and ((";

	$tempCount = count($tempArray);
	for ( $i = 0; $i < $tempCount - 1; $i++ )
	{
		$sql .= "subject LIKE '%".$tempArray[$i]."%' AND ";
	}

	$sql .= " subject LIKE  '%". $tempArray[$i] ."%')";


	$sql .= " OR (";

	$tempCount = count($tempArray);
	for ( $i = 0; $i < $tempCount - 1; $i++ )
	{
		$sql .= " adddata LIKE '%". $tempArray[$i] ."%' AND ";
	}

	$sql .= " adddata LIKE  '%". $tempArray[$i] ."%'))";
} else {
	$sql = "select * from rb_bbs_data where uid=" . $vo_rs1['resort_uid'];
}
	
//	echo $sql;
$m_sql1 = mysql_query($sql);

$temp_adddata = '';
echo "<br>";

while($m_rs1 = mysql_fetch_array($m_sql1))
{
	$temp_flag = true;

	$adddata = unserialize($m_rs1[adddata]);

	if(is_array($adddata))
	{
		foreach($adddata as $key => $value)
		{
			$adddata[$key] = stripslashes(iconv('utf-8','euc-kr',urldecode($value)));
			
		}
	}
	
	for( $i = 0; $i < count( $tempArray ) ; $i++ )
	{
		if( strpos( "-".$adddata[sbj_eng], $tempArray[$i] ) != 0  )
		{ }
		else
			$temp_flag = false;
	}

	for( $i = 0; $i < count( $tempArray ) ; $i++ )
	{
		if( strpos( "-".$m_rs1[subject], $tempArray[$i] ) != 0  )
		{ }
		else
			$temp_flag = false;
	}

	if( $temp_flag ) $temp_adddata = $m_rs1;

echo "<pre>";
//print_r($adddata);
echo "</pre>";
}

$m_rs1 = $temp_adddata;
?>

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
 }

 function presetChange(obj)
{
	document.vform.pickup.value = obj.value;
}

$(document).ready(function () {

	$("#sbj_address").focus(function () { if ($("#sbj_address").val() == "주소를 입력해주세요") { $("#sbj_address").val(""); } });
	$("#sbj_address").blur(function () { if ($("#sbj_address").val() == "") { $("#sbj_address").val("주소를 입력해주세요"); } });

	$("#sbj_tel").focus(function () { if ($("#sbj_tel").val() == "전화번호를 입력해주세요") { $("#sbj_tel").val(""); } });
	$("#sbj_tel").blur(function () { if ($("#sbj_tel").val() == "") { $("#sbj_tel").val("전화번호를 입력해주세요"); } });
	
	$("#sbj_fax").focus(function () { if ($("#sbj_fax").val() == "FAX번호를 입력해주세요") { $("#sbj_fax").val(""); } });
	$("#sbj_fax").blur(function () { if ($("#sbj_fax").val() == "") { $("#sbj_fax").val("FAX번호를 입력해주세요"); } });

	$('#resort1_area').change(function(){
		if ($("#resort1_area option:selected").val() != "다른지역")
		{
		   $.ajax({
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				type: 'post',
				url: '/modules/bbsext/theme/_pc/list02/process_area.php',
				data: "area="+$("#resort1_area option:selected").val(),
				success: function(msg){
					$("#resort1").html(msg);
					$("#resort1 option:first").remove();
					$("#resort1 option:first").remove();
				}
		   });
		}
		return false; //<- 이 문장으로 새로고침(reload)이 방지됨
	});

	$("#searchBtn").click(function(){
		if($("#resort1").val() == null) alert("리조트를 선택해주세요");
		else 
		$.ajax({
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			type: 'post',
			url: '/modules/bbsext/theme/_pc/list02/search_resort.php',
			data: "resort_uid="+$("#resort1").val()+"&confirm=<?=$resort[$seq+5]?>",
			success: function(msg){
				$("#noSearch").html(msg);
			}
	   });
	});


});

function vprint()
{
	$("#print_flag").val("true");
	vform.submit();
}

function email()
{
	$("#email_flag").val("true");
	vform.submit();
}

function remove()
{
	if( confirm("바우처를 삭제 하시겠습니까?") ) {
		location.href = "removeVoucher.php?uid=<?=$vo_rs1['uid']?>";
	}
}
</script>
<object id=factory viewastext style="display:none"
classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814"
  codebase="ScriptX.cab#Version=6,1,431,8">
</object>
<center>
<form id="vform" name="vform" action="voucher3.php" method="post">
<input type="hidden" name="seq" value="<?=$seq?>" />
<input type="hidden" name="bbsext_uid" value="<?=$_GET['uid']?>" />
<input type="hidden" name="resort_name" value="<?=$resort[$seq]?>" />
<div id="idPrint">
<table width="800" style="margin:0;padding:0;" cellspacing="0" border="0">
	<thead>
		<th width="200"></th>
		<th width="200"></th>
		<th width="200"></th>
		<th width="200"></th>
	</thead>
	<tr>
		<td colspan="4"><img src="http://trevia.co.kr/layouts/newtrevia/image/logo.gif" /> </td>
	</tr>
	<tr>
		<td height="80" colspan="4"><center><h1><b>HOTEL VOUCHER</b></h1></center></td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Hotel Reservation Summary</b>
		<input type="button" value="삭제" onclick="remove()" />
		</td>
	</tr>
		<?
if( empty($m_rs1[adddata]) ) 
{
?>
<tr><td colspan="4">
<div id="noSearch">
<table width="800" style="margin:0;padding:0;" cellspacing="0" border="0">
<tr>
	<td height="30" width="150" colspan="2" align="center"><input id="create" type="button" value="New" onclick="window.open('http://trevia.co.kr/?r=mexico&m=bbs&bid=resort&mod=write')" 
				style="color:black;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" /></td>
	<td>Confirmation No</td>
	<td><b><?=$resort[$seq+5]?></b></td>
</tr>
<tr>
		<td height="30" colspan="4">
	    <div id='tooltip'><div class='tipBody'>[<?=$resort[$seq]?>] 해당 리조트를 찾을 수가 없습니다. 아래에서 리조트를 선택하여 자세히 작성해주세요.</div></div>
		</td>
       	</td>
</tr>
<tr>
	<td colspan="4" style="border-bottom-style:solid; border-width:1">
		[리조트 찾기]

		<select name="resort1_area" id="resort1_area">
					<option value="몰디브">몰디브</option>
					<option value="칸쿤">칸쿤</option>
					<option value="리비에라마야">리비에라마야</option>
					<option value="발리">발리</option>
					<option value="하와이">하와이</option>
					<option value="세이셸">세이셸</option>
		</select>
		<select name="resort1" id="resort1">
<?
			$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
			while($m_rs4 = mysql_fetch_array($m_sql4)):
			?>	
				<option value="<?=$m_rs4[uid]?>">[몰디브] <?=$m_rs4[subject]?></option>
			<?endwhile;
?>
		</select>
		<input id="searchBtn" type="button" value="Search" 
				style="color:black;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" />
	</td>
</tr>
</table>
</div>
</td></tr>
<!--		
		<td style="border-bottom-style:solid; border-width:1" align="right">
		<input id="searchBtn" type="button" value="Search" onclick="window.open('search_resort.php')" 
				style="color:black;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" />
		</td>
-->				
<?
} else {
		?>
	<tr>
		<td height="30" colspan="2"><b><?=$adddata[sbj_eng]?></td>
		<td>Confirmation No<input type="hidden" name="resort_uid" value="<?=$m_rs1[uid]?>" /></td>
		<td><b><?=$resort[$seq+5]?></b></td>
	</tr>
	<tr>
		<td height="30" colspan="2">
			<? if (empty($adddata[sbj_address])) {?>
				<input id="sbj_address" name="sbj_address" type="text" value="주소를 입력해주세요" style="width:400px" />
			<? } else { ?>
				<input id="sbj_address" name="sbj_address" type="text" value="<?=$adddata[sbj_address]?>" style="width:400px" />
			<? } ?>
		</td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td height="30" colspan="2" style="border-bottom-style:solid; border-width:1">Phone : 
		<? if (empty($adddata[sbj_tel])) {?>
			<input id="sbj_tel" name="sbj_tel" type="text" value="전화번호를 입력해주세요" style="width:160px" />
		<? } else { ?>
			<input id="sbj_tel" name="sbj_tel" type="text" value="<?=$adddata[sbj_tel]?>" style="width:160px" />
		<? } ?>,
			<? if (empty($adddata[sbj_fax])) {?>
			<input id="sbj_fax" name="sbj_fax" type="text" value="FAX번호를 입력해주세요" style="width:160px" />
		<? } else { ?>
			<input id="sbj_fax" name="sbj_fax" type="text" value="<?=$adddata[sbj_fax]?>" style="width:160px" />
		<? } ?>		
		 </td>
		<td style="border-bottom-style:solid; border-width:1">
       	</td>
		<td style="border-bottom-style:solid; border-width:1" align="right"></td>
	</tr>
<? } ?>
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
		<td height="30" style="border-bottom-style:solid; border-width:4"><?=$days[2] . "-" . $month[intval($days[1]) -1] . "-" . $days[0]?> </td>
		<td style="border-bottom-style:solid; border-width:4"><?=$afterdays[2] . "-" . $month[intval($afterdays[1]) -1] . "-" . $afterdays[0]?> </td>
		<td width="400" colspan="2" style="border-bottom-style:solid; border-width:4"><?=$resort[$seq+1]?> </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1">Guests </td>
		<td style="border-bottom-style:solid; border-width:1">Rooms </td>
		<td style="border-bottom-style:solid; border-width:1">Nights </td>
		<td style="border-bottom-style:solid; border-width:1">Board Base </td>
	</tr>
	<tr>
		<td height="30" style="border-bottom-style:solid; border-width:1" id="guest"> </td>
		<td style="border-bottom-style:solid; border-width:1">1 </td>
		<td style="border-bottom-style:solid; border-width:1"><?=$resort[$seq+2]?> </td>
		<td style="border-bottom-style:solid; border-width:1"><?=$resort[$seq+3]?> </td>
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

<? 
$guestCount = 0;
$i = 0;
while ( !empty($user[$i+1]) ) { ?>
	<tr>
		<td height="30"><b><?=$user[$i]?></b> </td>
		<td><?=$user[$i+2]?> </td>
		<td> </td>
		<td> </td>
	</tr>
<? 
$guestCount++;
$i += 6;
} ?>
<script>
	$("#guest").html(<?=$guestCount?>);
</script>
	<tr>
		<td height="1" style="border-bottom-style:solid; border-width:1"></td>
		<td style="border-bottom-style:solid; border-width:1"></td>
		<td style="border-bottom-style:solid; border-width:1"></td>
		<td style="border-bottom-style:solid; border-width:1"></td>
	</tr>
	<tr>
		<td height="30" colspan="4"> </td>
	</tr>
	<tr>
		<td height="30" colspan="4" style="border-bottom-style:solid; border-width:4"><b>Remarks</b> </td>
	</tr>
	<tr>
		<td height="100" colspan="4" style="border-bottom-style:solid; border-width:1"><textarea id="remark" name="remark" style="width:800;height:100"><?=empty($vo_rs1) ? "":$vo_rs1[remark]; ?></textarea> </td>
	</tr>
	<tr>
		<td height="30"> </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td height="30" colspan="1" style="border-bottom-style:solid; border-width:4"><b>Pick Up & Sending</b> </td>
		<td colspan="3" style="border-bottom-style:solid; border-width:4">
			<select name="textPreset" onchange="presetChange(this)">
				<option value="" selected="selected">=== 선택하세요 ===</option>
<!--
				<option value="-  Trevia Cancun Office (현지사무소) : (52)-998-206-1251, 카카오톡 : iwantour
-  Local Guide (현지가이드) : 남재현 대리(52)-998-230-6414, 이성일 이사 (521)-998-116-2544
-  Meeting Point(미팅장소) : 세관 통과 후 공항 밖으로 나오시면 됩니다. 한국인 가이드가 이름이 적힌 피켓을 들고 기다립니다. ^^
-  출발지에서의 항공스케줄 변경으로 인한 도착시간 변경이 발생하실 경우 칸쿤현지 및 당사로 꼭! 연락주셔야 합니다.
-  공항에 도착 후 가이드 분을 찾으실수 없을경우 상기 전화번호로 연락부랍니다.
" >1. BK칸쿤 픽업샌딩</option>
-->
				<option value="-  Trevia Cancun Office (현지사무소) : (52)-998-206-1251, 카카오톡 : iwantour
-  Local Guide (현지가이드) : 남재현 대리(52)-998-230-6414, 이성일 이사 (521)-998-116-2544
-  Meeting Point(미팅장소) : 세관 통과 후 공항 밖으로 나오시면 됩니다. 한국인 가이드가 이름이 적힌 피켓을 들고 기다립니다. ^^
-  출발지에서의 항공스케줄 변경으로 인한 도착시간 변경이 발생하실 경우 칸쿤현지 및 당사로 꼭! 연락주셔야 합니다.
-  공항에 도착 후 가이드 분을 찾으실수 없을경우 상기 전화번호로 연락부랍니다.
-  기사/가이드 님 팁 1인 $5-$10 은 별도 입니다.
" >1. BK칸쿤 픽업샌딩</option>
			</select>
		</td>
	</tr>
	<tr>
		<td height="150" colspan="4" style="border-bottom-style:solid; border-width:4">
		<textarea id="pickup" name="pickup" style="width:800;height:100"><?=empty($vo_rs1) ? "":$vo_rs1[pickup]; ?></textarea>
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
<input type="hidden" id="print_flag" name="print_flag" value="" />
<input type="hidden" id="email_flag" name="email_flag" value="" />

<input type="hidden" id="admin_email" name="admin_email" value="<?=$_GET[admin_email]?>" />
<input type="hidden" id="admin_name" name="admin_name" value="<?=$_GET[admin_name]?>" />
</form>
<table width="800" border="0">
	<tr>
		<td height="30" colspan="4" align="right">
<input type="button" value="Email" onclick="email()" style="color:black;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" />
<input type="button" value="PRINT" onclick="vprint()" style="color:black;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" />
<input type="button" value="Save" onclick="vform.submit()" style="color:black;background-color:#2cbdf3;border-color:blue;border-width:1px;height:20px" />				
		
		</td>
	</tr>
</table>
</center>