<meta charset="euc-kr"/>
<body style="margin:0;padding:0">
<?php 

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$sql = mysql_query("select * from rb_sms_history where receiver LIKE '".$_GET[receiver]."' order by send_date desc");
$row_count = mysql_num_rows($sql);

?>
<table width="100%" border="0" >
<?
$i = 0;
$sms = "";
while( $m_rs = mysql_fetch_array($sql) )
{
	$i++;
	if( strlen( $m_rs[content] ) > 80 )
		$sms = "MMS";
	else
		$sms = "SMS";
?>
<tr>
	<td class="i_title" style="font-size:9pt"><? if( 1 == $i ) { ?><font color="blue"> <? } ?>[<?=$sms?>] [<?=substr($m_rs[send_date],0,4)?>-<?=substr($m_rs[send_date],4,2)?>-<?=substr($m_rs[send_date],6,2)?> <?=substr($m_rs[send_date],8,2)?>:<?=substr($m_rs[send_date],10,2)?>:<?=substr($m_rs[send_date],12,2)?>] <?=$m_rs[content]?>
	<? if( 1 == $i ) { ?></font> <? } ?>
	</td>
</tr>


<?
}
?>
</table>
</body>