<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$dw_only = false;




$use_html=1;
$to_name = "관리자";
$to = "jds@trevia.co.kr";

extract($_POST);

function getUTFtoKRm($str)
{
	return iconv('utf-8','euc-kr',$str);
}

function goUrl($str, $go=-1) {
   echo "<script type=\"text/javascript\">";
   if($str) echo "window.alert(\"".str_replace('"','\"',$str)."\");";
   if(is_string($go)) echo "location.replace(\"".$go."\");";
   else echo "history.go(".$go.")";
   echo "</script>";
}

function errorReturn($text){ 
 echo " 
  <script language=javascript> 
  window.alert('$text') 
  history.go(-1) 
  </script>"; 
 exit; 
} 

function checkSpace($str) {
   return !ereg("([^[:space:]]+)",$str);
}

function checkEmail($email) {
   return !preg_match('/^[A-z0-9][\w\d.-_]*@[A-z0-9][\w\d.-_]+\.[A-z]{2,6}$/',$email);
}

function getbasename($path)
{
$pattern = (strncasecmp(PHP_OS,'WIN',3)?'/([^V]+)[V]*$/':'/[^V\\\\]+)[V\\\\]*$/');
if(preg_match($pattern,$path,$matches))
return $matches[1];
return '';
}

function getFileBody($var, $boundary, $idx='') {
   global $dw_only;

   if($idx !== '') {
      //$filename = basename($_FILES[$var][name][$idx]);
	  $filename = $_FILES[$var][name][$idx];
      $type = $_FILES[$var][type][$idx];

      $fp = fopen($_FILES[$var][tmp_name][$idx], "r");
      $file_content = fread($fp, $_FILES[$var][size][$idx]);
      fclose($fp);
   } else {
      //$filename = basename($_FILES[$var][name]);
      $filename = $_FILES[$var][name];
	  $type = $_FILES[$var][type];

      $fp = fopen($_FILES[$var][tmp_name], "r");
      $file_content = fread($fp, $_FILES[$var][size]);
      fclose($fp);
   }
	$filename=getUTFtoKRm($filename);
   if($dw_only) $type = "application/octet-stream";
   $mailbody = "--".$boundary."\r\n";
   $mailbody .= "Content-Type: ".$type."; name=\"".$filename."\"\r\n";
   $mailbody .= "Content-Transfer-Encoding: base64\r\n";
   $mailbody .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
   $mailbody .= chunk_split(base64_encode($file_content))."\r\n\r\n";

   return $mailbody;
}

function checkFileError($errno) {
   switch($errno) {
      case(1) : $errorMsg = "파일 용량이 서버에서 허용된 용량을 초과했습니다."; break;
      case(2) : $errorMsg = "파일 용량이 입력폼에 허용된 용량을 초과했습니다."; break;
      case(3) : $errorMsg = "파일의 일부만 업로드 되었습니다."; break;
      case(4) : $errorMsg = "업로드된 파일이 없습니다."; break;
   }
   return $errorMsg;
}

if(checkSpace($site)) {
   goUrl("제휴 희망 사이트를 선택 해주세요.");
   exit;
}

if(checkSpace($site2)) {
   goUrl("제휴 구분을 선택 해주세요.");
   exit;
}

if(checkSpace($subject)) {
   goUrl("제목을 입력해 주십시오.");
   exit;
}

if(checkSpace($content)) {
   goUrl("내용을 입력해 주세요.");
   exit;
}

if(checkSpace($company)) {
   goUrl("회사(기관)명을 입력해주세요.");
   exit;
}

if(checkSpace($from_name)) {
   goUrl("제안자명을 입력해주세요.");
   exit;
}

if(checkSpace($tel)) {
   goUrl("전화번호가 입력해주세요.");
   exit;
}

if(checkSpace($from)) {
   goUrl("메일주소를 입력해주세요.");
   exit;
}

if(checkEmail($from)) {
   goUrl("메일 주소를 정확히 입력해 주세요.");
   exit;
}

$subject = htmlspecialchars(trim($subject));
$receiver = '"'.getUTFtoKRm($to_name).'" <'.$to.'>';

$from_name=trim($from_name);
$from=trim($from);
$sender = '"'.getUTFtoKRm($from_name).'" <'.$from.'>';

$content=nl2br($content);
$mailsend = "
			<table width='100%' bordercolor='#E3E3E3' border='1' cellSpacing='0' cellPadding='0'>
			";
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>제휴 희망 사이트</b></td><td style='padding-left=2px;'>".$site."</td></tr>
			";
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>제휴 구분</b></td><td style='padding-left=2px;'>".$site2."</td></tr>
			";			
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>제  목</b></td><td style='padding-left=2px;'>".$subject."</td></tr>
			";			
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>내  용</b></td><td style='padding-left=2px;'><pre>".$content."</pre></td></tr>
			";
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>구  분</b></td><td style='padding-left=2px;'>".$sel."</td></tr>
			";
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>회사(기관)명</b></td><td style='padding-left=2px;'>".$company."</td></tr>
			";	
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>제안자명</b></td><td style='padding-left=2px;'>".$from_name."</td></tr>
			";	
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>전화번호</b></td><td style='padding-left=2px;'>".$tel."</td></tr>
			";	
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>메일주소</b></td><td style='padding-left=2px;'>".$from."</td></tr>
			";	
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>홈페이지 주소</b></td><td  style='padding-left=2px;'>".$homepage."</td></tr>
			";		
$mailsend .= "
			<tr><td bgcolor='#efefef' width='120' align='center' valign='center'><b>팩스번호</b></td><td  style='padding-left=2px;'>".$fax."</td></tr>
			";					
$mailsend .= "
			</table>
			";

$headers = "From: ".$sender."\r\n";
$headers .= "X-Sender: ".$sender."\r\n";
$headers .= "X-Mailer: PHP\r\n";
$headers .= "X-Priority: 1\r\n";
$headers .= "Reply-to: ". $sender . "\r\n";
$headers .= "Return-Path: ". $sender . "\r\n";

$subject = "[Trevia] ".$from_name."님이 제휴 제안을 요청 하셨습니다.";
$subject = getUTFtoKRm($subject);

$boundary = md5(uniqid(microtime()));

$attached = '';
if(isset($_FILES) && is_array($_FILES)) {
   foreach($_FILES as $var => $value) {
      if(is_array($_FILES[$var][name])) {
         for($i=0;$i<count($_FILES[$var][name]);$i++) {

			if($_FILES[$var][size][$i] >= 10000000)
			{
				goUrl("첨부파일이 허용된 용량을 초과했습니다.");
				exit;
			}
			
            if($_FILES[$var][error][$i] == 0){
				if($_FILES[$var][type][$i] == "application/zip"||$_FILES[$var][type][$i] == "application/x-compressed"||$_FILES[$var][type][$i] == "application/x-zip-compressed"||$_FILES[$var][type][$i] == "multipart/x-zip"||$_FILES[$var][type][$i] == "multipart/x-gzip"||$_FILES[$var][type][$i] == "application/rar"||$_FILES[$var][type][$i] == "application/x-compressed"||$_FILES[$var][type][$i] == "compressed/rar"||$_FILES[$var][type][$i] == "application/x-rar"||$_FILES[$var][type][$i] == "application/x-rar-compressed"||$_FILES[$var][type][$i] == "application/x-navidoc"||$_FILES[$var][type][$i] == "application/pdf"||$_FILES[$var][type][$i] == "application/msword"||$_FILES[$var][type][$i] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"||$_FILES[$var][type][$i] == "application/vnd.openxmlformats-officedocument.wordprocessingml.template"||$_FILES[$var][type][$i] == "application/vnd.ms-word.document.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-word.template.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-excel"||$_FILES[$var][type][$i] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"||$_FILES[$var][type][$i] == "application/vnd.openxmlformats-officedocument.spreadsheetml.template"||$_FILES[$var][type][$i] == "application/vnd.ms-excel.sheet.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-excel.template.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-excel.addin.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-excel.sheet.binary.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-powerpoint"||$_FILES[$var][type][$i] == "application/vnd.openxmlformats-officedocument.presentationml.presentation"||$_FILES[$var][type][$i] == "application/vnd.openxmlformats-officedocument.presentationml.template"||$_FILES[$var][type][$i] == "application/vnd.openxmlformats-officedocument.presentationml.slideshow"||$_FILES[$var][type][$i] == "application/vnd.ms-powerpoint.addin.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-powerpoint.presentation.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-powerpoint.template.macroEnabled.12"||$_FILES[$var][type][$i] == "application/vnd.ms-powerpoint.slideshow.macroEnabled.12"||$_FILES[$var][type][$i] == "application/octet-stream"||$_FILES[$var][type][$i] == "text/plain"||$_FILES[$var][type][$i] == "application/x-hwp"||$_FILES[$var][type][$i] == "application/x-pdf"||$_FILES[$var][type][$i] == "application/gul"||$_FILES[$var][type][$i] == "image/gif"||$_FILES[$var][type][$i] == "image/png"||$_FILES[$var][type][$i] == "image/jpeg"||$_FILES[$var][type][$i] == "image/x-jg"||$_FILES[$var][type][$i] == "image/bmp"||$_FILES[$var][type][$i] == "image/x-windows-bmp"||$_FILES[$var][type][$i] == "image/vnd.dwg"||$_FILES[$var][type][$i] == "image/x-dwg"||$_FILES[$var][type][$i] == "image/vnd.dwg"||$_FILES[$var][type][$i] == "image/"||$_FILES[$var][type][$i] == "image/fif"||$_FILES[$var][type][$i] == "image/florian"||$_FILES[$var][type][$i] == "image/vnd.fpx"||$_FILES[$var][type][$i] == "image/vnd.net-fpx"||$_FILES[$var][type][$i] == "image/g3fax"||$_FILES[$var][type][$i] == "image/x-icon"||$_FILES[$var][type][$i] == "image/ief"||$_FILES[$var][type][$i] == "image/pjpeg"||$_FILES[$var][type][$i] == "image/x-jps"||$_FILES[$var][type][$i] == "image/justvision"||$_FILES[$var][type][$i] == "image/vasa"||$_FILES[$var][type][$i] == "image/naplps"||$_FILES[$var][type][$i] == "image/x-niff"||$_FILES[$var][type][$i] == "image/x-portable-bitmap"||$_FILES[$var][type][$i] == "image/x-pict"||$_FILES[$var][type][$i] == "image/x-pcx"||$_FILES[$var][type][$i] == "image/x-portable-graymap"||$_FILES[$var][type][$i] == "image/pict"||$_FILES[$var][type][$i] == "image/x-xpixmap"||$_FILES[$var][type][$i] == "image/x-portable-anymap"||$_FILES[$var][type][$i] == "image/x-portable-pixmap"||$_FILES[$var][type][$i] == "image/x-quicktime"||$_FILES[$var][type][$i] == "image/cmu-raster"||$_FILES[$var][type][$i] == "image/x-cmu-raster"||$_FILES[$var][type][$i] == "image/vnd.rn-realflash"||$_FILES[$var][type][$i] == "image/x-rgb"||$_FILES[$var][type][$i] == "image/vnd.rn-realpix"||$_FILES[$var][type][$i] == "image/tiff"||$_FILES[$var][type][$i] == "image/x-tiff"||$_FILES[$var][type][$i] == "image/florian"||$_FILES[$var][type][$i] == "image/vnd.wap.wbmp"||$_FILES[$var][type][$i] == "image/x-xbm"||$_FILES[$var][type][$i] == "image/xbm"||$_FILES[$var][type][$i] == "image/vnd.xiff"||$_FILES[$var][type][$i] == "image/x-xpixmap"||$_FILES[$var][type][$i] == "image/xpm"||$_FILES[$var][type][$i] == "image/x-xwd"||$_FILES[$var][type][$i] == "image/x-xwindowdump"||$_FILES[$var][type][$i] == "application/x-photoshop"||$_FILES[$var][type][$i] == "text/html"||$_FILES[$var][type][$i] == "text/plain"||$_FILES[$var][type][$i] == "application/octet-stream")
				{
				}else{
					goUrl("문서 파일 (pdf, doc, ppt, hwp, gul, txt, zip 등)만 첨부 할 수 있습니다.");
					exit;
				}

				$attached .= getFileBody($var, $boundary, $i);
			}
            else if($_FILES[$var][error] < 4) {
               goUrl(checkFileError($_FILES[$var][error][$i]));
               exit;
            }
         }
      } else {
         if($_FILES[$var][error] == 0) $attached .= getFileBody($var, $boundary);
         else if($_FILES[$var][error] < 4) {
            goUrl(checkFileError($_FILES[$var][error][$i]));
            exit;
         }
      }
   }
}
$mailsend = getUTFtoKRm($mailsend);

if($attached) {
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: Multipart/mixed; boundary = \"".$boundary."\"\r\n";

   $mailbody = "--".$boundary."\r\n";
   $mailbody .= "Content-Type: text/html; charset=\"euc-kr\"\r\n";
   $mailbody .= "Content-Transfer-Encoding: base64\r\n\r\n";
   $mailbody .= chunk_split(base64_encode($mailsend))."\r\n\r\n";
   $mailbody .= $attached;
} else {
   $headers .= "Content-Type: text/html; charset=EUC-KR\r\n";
   $headers .= "\r\n\r\n";

   $mailbody = $mailsend;
}

if(!mail($receiver, $subject, $mailbody, $headers, "-f ".$from)) goUrl("제휴제안 접수가 실패 되었습니다.");
else goUrl('제휴제안이 정상적으로 접수되었습니다.', 'http://trevia.co.kr/?r=trevia&c=5');
?>


