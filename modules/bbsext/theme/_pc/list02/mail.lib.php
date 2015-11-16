<?
// 폼에서 넘어오는 값들
//-- $mailTo : 수신자 이메일주소
//-- $mailFrom : 송신자 이메일주소
//-- $fromName : 송신자명 또는 정보
//-- $title    : 메일제목
//-- $content  : 메일내용
//-- $upfile   : 첨부파일명
//*******************************


// getSendMail($mailTo, $mailForm, $title, $content, $_FILES['upfile'], $html);


function getSendMail($mailTo, $mailFrom, $title, $content, $upfile, $html)
{
	if( $_POST['save_flag'] == "true" ) { return; }

	$to_exp   = explode('|', $mailTo);
	$from_exp = explode('|', $mailFrom);
	$mailTo =  $to_exp[0]; //$to_exp[1] ? "\"".getUTFtoKR($to_exp[1])."\" <$to_exp[0]>" :
	$mailFrom =  $from_exp[0]; //$from_exp[1] ? "\"".getUTFtoKR($from_exp[1])."\" <$from_exp[0]>" :
	
	if(!$mailTo) return;
	if(!$mailFrom) return;

	if ($html == 'TEXT') $content = nl2br(htmlspecialchars($content));	

	## 구분자 생성
	$boundary = '----' . uniqid('part'); // 구분자 생성
 
	## 해더생성
	$header  = "Return-Path: {$mailFrom}\r\n";		// 반송 이메일 주소
	$header .= "from: {$mailFrom}\r\n";   // 송신자명, 송신자 이메일 주소

	## 첨부파일이 있는 경우
	if($upfile && $upfile['name']):
	
		## 해더생성
		$header .= "MIME-Version: 1.0\r\n";                                  // MIME 버전 표시
		$header .= "Content-Type: Multipart/mixed; boundary=\"{$boundary}\"";  // 구분자 설정, Multipart/mixed 일 경우 첨부화일

		$filename	= basename($upfile['name']); // 파일명 추출
		$fp			= fopen($upfile['tmp_name'],'r'); // 파일 열기
		$file		= fread($fp,$upfile['size']); // 파일 읽기
		fclose($fp);  // 파일 닫기
		
		$upfile_type = $upfile['type'];
		if($upfile_type == '')
			$upfile_type = 'application/octet-stream'; 

		## 이메일 본문 생성
		$mailbody  = "This is a multi-part message in MIME format.\r\n\r\n";
		$mailbody .= "--$boundary\r\n";
		$mailbody .= "Content-Type: text/html; charset=euc-kr\r\n";
		$mailbody .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
//		$mailbody .= nl2br(addslashes($content)) . "\r\n";
		$mailbody .= $content . "\r\n";
		
		## 첨부파일
		$mailbody .= "--$boundary\r\n";  
		$mailbody .= "Content-Type: ".$upfile_type."; name=\"".$filename."\"\r\n";   // 내용
		$mailbody .= "Content-Transfer-Encoding: base64\r\n"; // 암호화 방식  
		$mailbody .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n"; // 첨부파일인 것을 알림
		$mailbody .= base64_encode($file)."\r\n\r\n";  

		$mailbody .= "--$boundary--";  //내용 구분자 마침

	else:
		
		## 해더생성
		$header .= "MIME-Version: 1.0\r\n";  
		$header .= "Content-Type: Multipart/alternative; boundary = \"$boundary\"";  

		## 이메일 본문 생성
		$mailbody = "--$boundary\r\n";  
		$mailbody .= "Content-Type: text/html; charset=euc-kr\r\n";
		$mailbody .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
//		$mailbody .= nl2br(addslashes($content)) . "\r\n";
		$mailbody .= $content . "\r\n";

		$mailbody .= "--$boundary--\r\n\r\n";  
	
	endif;
	
	return @mail($mailTo,getUTFtoKR($title),$mailbody,$header);

}

?>