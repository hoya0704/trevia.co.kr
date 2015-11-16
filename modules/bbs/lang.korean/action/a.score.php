<?php
if(!defined('__KIMS__')) exit;

if (!$my['uid']) getLink('','','로그인해 주세요.','');

$R = getUidData($table[$m.'data'],$uid);
if (!$R['uid']) exit;
$score_limit = 1; //점수한계치(이 점수보다 높은 갚을 임의로 보낼 경우 제한)
$score = $score ? $score : 1;
if ($score > $score_limit) $score = $score_limit;

if (!strstr($_SESSION['module_'.$m.'_score'],'['.$R['uid'].']'))
{
	if ($value == 'good')
	{
		getDbUpdate($table[$m.'data'],'score1=score1+'.$score,'uid='.$R['uid']);
	}
	else {
		getDbUpdate($table[$m.'data'],'score2=score2+'.$score,'uid='.$R['uid']);
	}
	$_SESSION['module_'.$m.'_score'] .= '['.$R['uid'].']';
}
else {
	getLink('','','이미 평가하신 글입니다.','');
}



getLink('','','회원님의 평가가 반영되었습니다.','');
?>