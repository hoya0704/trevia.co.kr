<?php
function LIB_getContents($str,$html)
{
	if ($html == 'HTML')
	{
		$pattern = array 
		(
			"'<script[^>]*?>.*?</script>'si",
			"'<style[^>]*?>.*?</style>'si",
			"'<meta[^>]*?>'si",
			"/on([a-z]+)=/i",
			"/javascript:/i"
		);
		$str = str_replace('<A href=','<A target="_blank" href=',$str);
		$str = str_replace('< param','<param',$str);
		$str = str_replace("\t",'&nbsp;&nbsp;&nbsp;&nbsp;',$str);
		$str = preg_replace($pattern,'',$str);
		$str = str_replace('imgOrignWin','onclick=imgOrignWin',$str);
		if ($GLOBALS['my']['admin'])
		{
			$mat = '<div class="sysMsgBox"><img src="'.$GLOBALS['g']['img_core'].'/_public/ico_notice.gif" alt="" />'.$GLOBALS['lang']['sys']['sysmsg'].'</div>';
			$str = preg_replace("#(\<(embed|object)[^\>]*)\>(\<\/(embed|object)\>)?#i",$mat,$str);
		}
	}
	else {
		$str = str_replace('<','&lt;',$str);
		$str = str_replace('>','&gt;',$str);
		$str = str_replace('&nbsp;','&amp;nbsp;',$str);
		$str = str_replace("\t",'&nbsp;&nbsp;&nbsp;&nbsp;',$str);
		$str = nl2br($str);
	}
	return $str;
}
?>