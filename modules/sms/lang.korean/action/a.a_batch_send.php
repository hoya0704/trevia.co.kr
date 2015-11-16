<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

// history에 저장
$arrCP = explode(",", $cpnumber);


for($i = 0; $i < count($arrCP); $i++)
{
	//$arrTemp = explode("||", $arrCP[$i]);

	//if( strlen($arrTemp[0]) == 11 )
	//	$receiver = substr($arrTemp[0], 0, 3) . "-" . substr($arrTemp[0], 3, 4) . "-" . substr($arrTemp[0], 7, 4); 
	//else
	//	$receiver = substr($arrTemp[0], 0, 3) . "-" . substr($arrTemp[0], 3, 3) . "-" . substr($arrTemp[0], 6, 4); 


	$key = "cp,writer,content,send_date,from_type";
	$val = "'".$arrCP[$i]."','".$my['uid']."','".$receiver."','".$smsText."','".date("YmdHis")."','batch'";
	echo "<script>alert('" . $arrCP[$i] . "');</script>";
	getDbInsert($table['smshistory'], $key, $val);
}

// 전송
getSendSMS("_sms","sms",$cpnumber,"대량전송(관리자)", $smsText, $xms);


// 페이지 이동

getLink($g['s']."/?r=".$r."&m=sms&a=a_refresh",'self.','전송이 완료되었습니다.','');
//getLink($g['s']."/",'self.','전송이 완료되었습니다.','');

?>