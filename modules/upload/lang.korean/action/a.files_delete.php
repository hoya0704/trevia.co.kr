<?php
if(!defined('__KIMS__')) exit;

include_once $g['dir_module'].'var/var.php';

if ($file_uid)
{
	$R = getUidData($table['s_upload'],$file_uid);
	if (!$my['admin'] && (!$R['mbruid'] || $my['uid'] != $R['mbruid']))
	{
		getLink('','','삭제권한이 없습니다.','');
	}
	if ($R['uid'])
	{
		getDbDelete($table['s_upload'],'uid='.$R['uid']);
		getDbUpdate($table['s_numinfo'],'upload=upload-1',"date='".substr($R['d_regis'],0,8)."' and site=".$R['site']);

		if ($R['url']==$d['upload']['ftp_urlpath'])
		{
			$FTP_CONNECT = ftp_connect($d['upload']['ftp_host'],$d['upload']['ftp_port']); 
			$FTP_CRESULT = ftp_login($FTP_CONNECT,$d['upload']['ftp_user'],$d['upload']['ftp_pass']); 
			if (!$FTP_CONNECT) getLink('','','FTP서버 연결에 문제가 발생했습니다.','');
			if (!$FTP_CRESULT) getLink('','','FTP서버 아이디나 패스워드가 일치하지 않습니다.','');

			ftp_delete($FTP_CONNECT,$d['upload']['ftp_folder'].$R['folder'].'/'.$R['tmpname']);
			if($R['type']==2) ftp_delete($FTP_CONNECT,$d['upload']['ftp_folder'].$R['folder'].'/'.$R['thumbname']);
			ftp_close($FTP_CONNECT);
		}
		else {
			unlink($g['path_file'].$R['folder'].'/'.$R['tmpname']);
			if($R['type']==2) unlink($g['path_file'].$R['folder'].'/'.$R['thumbname']);
		}
	}
	
	if ($isreload == 'Y')
	{
		getLink('reload','parent.','','');
	}
	exit;
}
else {

	$sescode = $_SESSION['upsescode'];

	if ($sescode)
	{
		if ($d['upload']['use_fileserver'])
		{
			$FTP_CONNECT = ftp_connect($d['upload']['ftp_host'],$d['upload']['ftp_port']); 
			$FTP_CRESULT = ftp_login($FTP_CONNECT,$d['upload']['ftp_user'],$d['upload']['ftp_pass']); 
			if (!$FTP_CONNECT) getLink('','','FTP서버 연결에 문제가 발생했습니다.','');
			if (!$FTP_CRESULT) getLink('','','FTP서버 아이디나 패스워드가 일치하지 않습니다.','');


			$FILES = getDbArray($table['s_upload'],"tmpcode='".$sescode."'",'*','uid','asc',0,0);
			while($R = db_fetch_array($FILES))
			{
				getDbDelete($table['s_upload'],'uid='.$R['uid']);
				getDbUpdate($table['s_numinfo'],'upload=upload-1',"date='".substr($R['d_regis'],0,8)."' and site=".$R['site']);
				
				ftp_delete($FTP_CONNECT,$d['upload']['ftp_folder'].$R['folder'].'/'.$R['tmpname']);
				if($R['type']==2)
				{
					ftp_delete($FTP_CONNECT,$d['upload']['ftp_folder'].$R['folder'].'/'.$R['thumbname']);
				}
			}
			
			ftp_close($FTP_CONNECT);
		}
		else {

			$FILES = getDbArray($table['s_upload'],"tmpcode='".$sescode."'",'*','uid','asc',0,0);
			while($R = db_fetch_array($FILES))
			{
				getDbDelete($table['s_upload'],'uid='.$R['uid']);
				getDbUpdate($table['s_numinfo'],'upload=upload-1',"date='".substr($R['d_regis'],0,8)."' and site=".$R['site']);
				unlink($g['path_file'].$R['folder'].'/'.$R['tmpname']);
				if($R['type']==2)
				{
					unlink($g['path_file'].$R['folder'].'/'.$R['thumbname']);
				}
			}
		}
	}
	if ($close == 'Y')
	{
		$_SESSION['upsescode'] = '';
		getLink('','','','close');
	}
	else {
		getLink('reload','parent.','','');
	}
}
?>