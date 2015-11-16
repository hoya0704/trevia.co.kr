<script src="/lib/jquery-1.4.4.js"></script>
<?

$resort_uid = $_POST['resort_uid'];

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}


$sql = "SELECT * FROM rb_bbs_data where bbsid='resort' and uid='".$resort_uid."';";


$m_sql = mysql_query($sql);
$m_rs1 = mysql_fetch_array($m_sql);

$adddata = unserialize($m_rs1[adddata]);

if(is_array($adddata))
{
	foreach($adddata as $key => $value)
	{
		$adddata[$key] = stripslashes(iconv('utf-8','euc-kr',urldecode($value)));
	}
}
?>
<script language="JavaScript">
$(document).ready(function () {

	$("#sbj_address").focus(function () { if ($("#sbj_address").val() == "주소를 입력해주세요") { $("#sbj_address").val(""); } });
	$("#sbj_address").blur(function () { if ($("#sbj_address").val() == "") { $("#sbj_address").val("주소를 입력해주세요"); } });

	$("#sbj_tel").focus(function () { if ($("#sbj_tel").val() == "전화번호를 입력해주세요") { $("#sbj_tel").val(""); } });
	$("#sbj_tel").blur(function () { if ($("#sbj_tel").val() == "") { $("#sbj_tel").val("전화번호를 입력해주세요"); } });
	
	$("#sbj_fax").focus(function () { if ($("#sbj_fax").val() == "FAX번호를 입력해주세요") { $("#sbj_fax").val(""); } });
	$("#sbj_fax").blur(function () { if ($("#sbj_fax").val() == "") { $("#sbj_fax").val("FAX번호를 입력해주세요"); } });
});
</script>

	<table width="800" style="margin:0;padding:0;" cellspacing="0" border="0">
	<tr>
		<td height="30" colspan="2" width="400"><b><?=$adddata[sbj_eng]?></td>
		<td width="200">Confirmation No<input type="hidden" name="resort_uid" value="<?=$m_rs1[uid]?>" /></td>
		<td width="200"><b> <?=$_POST['confirm']?></b></td>
	</tr>
	<tr>
		<td height="30" colspan="2">
			<? if (empty($adddata[sbj_address])) {?>
				<input id="sbj_address" name="sbj_address" type="text" value="주소를 입력해주세요" style="width:400px" />
			<? } else { echo $adddata[sbj_address];  } ?>
		</td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td height="30" colspan="2" style="border-bottom-style:solid; border-width:1">Phone : 
		<? if (empty($adddata[sbj_tel])) {?>
			<input id="sbj_tel" name="sbj_tel" type="text" value="전화번호를 입력해주세요" style="width:160px" />
		<? } else { echo $adddata[sbj_tel];  } ?>,
			<? if (empty($adddata[sbj_fax])) {?>
			<input id="sbj_fax" name="sbj_fax" type="text" value="FAX번호를 입력해주세요" style="width:160px" />
		<? } else { echo $adddata[sbj_fax];  } ?>		
		 </td>
		<td style="border-bottom-style:solid; border-width:1">
       	</td>
		<td style="border-bottom-style:solid; border-width:1" align="right"></td>
	</tr>
	</table>

<script>
//alert("<?=$adddata[sbj_address]?>");
</script>

