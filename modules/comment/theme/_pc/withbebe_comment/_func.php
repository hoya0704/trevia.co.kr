<?php
function getCMNTUpfiles($R)
{
	if (!$R['upload']) return array();
	else
	{
		global $table,$m;
		$d['upload'] = array();
		$d['upload']['tmp'] = $R['upload'];
		$d['_pload'] = getArrayString($R['upload']);
		foreach($d['_pload']['data'] as $_val)
		{
			$U = getUidData($table['s_upload'],$_val);
			if (!$U['uid'])
			{
				$R['upload'] = str_replace('['.$_val.']','',$R['upload']);
				$d['_pload']['count']--;
			}
			else {
				$d['upload']['data'][] = $U;
			}
			if (!$U['cync'])
			{
				$_CYNC = "cync='[".$m."][".$R['uid']."][uid,down][".$table['s_comment']."][".$R['mbruid']."][".$cyncArr['data'][5].",CMT:".$R['uid']."#CMT]'";
				getDbUpdate($table['s_upload'],$_CYNC,'uid='.$U['uid']);
			}
		}
		if ($R['upload'] != $d['upload']['tmp'])
		{
			getDbUpdate($table['s_comment'],"upload='".$R['upload']."'",'uid='.$R['uid']);
		}
		$d['upload']['count'] = $d['_pload']['count'];
		return $d['upload'];
	}
}
?>