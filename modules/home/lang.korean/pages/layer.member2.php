<?php
if (!$my['uid']) exit;
include_once $g['path_module'].'member/var/var.join.php';
$M = getDbData($table['s_mbrdata'],'memberuid='.$uid,'*');
$M1 = getUidData($table['s_mbrid'],$M['memberuid']);
$L = getDbData($table['s_mbrlevel'],'uid='.$M['level'],'*');
$X = getDbData($table['s_mbrlevel'],'gid=1','*');
$C = -getRemainDate($M['last_log']);
$cset = array('오늘','어제','글피');
$SNS = explode('|',$M['sns']);
$SNSENG = array('t','f','m','y');
$SNSSET = array
(
	'twitter.com'=>'트위터',
	'facebook.com'=>'페이스북',
	'me2day.net'=>'미투데이',
	'yozm.daum.net'=>'요즘'
);
?>
<div id="layerbox">

	<div id="mbrLayer" onclick="mbrclick=true;setTimeout('mbrclick=false;',100);">
	<!--<?php/*<div class="photo"><?php if($M['photo']):?><img src="<?php echo $g['url_root']?>/_var/simbol/<?php echo $M['photo']?>" alt="" /><?php endif?></div>*/?>-->
	<div class="info">
		<div class="name">
		<span>
		<?php echo $M[$_HS['nametype']]?>님 ( <?=$M['name']?> )
		<?php if($M['sex']):?><img src="<?php echo $g['img_core']?>/_public/ico_sex_<?php echo $M['sex']?>.gif" alt="" title="<?php echo getSex($M['sex'])?>성(<?php echo getAge($M['birth1'])?>세)"  /><?php endif?>
		</span>
		</div>

		이메일 : <a href="mailto:<?php echo $M['email']?>"><?php echo $M['email']?></a><br />
		휴대폰 : <?php echo $M['tel2']?><br />
		최근접속 : <?php echo $cset[$C]?$cset[$C]:$C.'일전'?><span class="log">(<?php echo $M['now_log']?'online':'offline'?>)</span><br />
	</div>
	<div class="clear"></div>
	<!--<?php/*<div class="level">
		<div title="<?php echo $L['name']?>(<?php echo $M['level']?>/<?php echo $X['uid']?>)"><img src="<?php echo $g['url_root']?>/_core/image/level/<?php echo $M['level']?>.gif" alt=""  /></div>
	</div>*/?>-->
	<div class="close">
		<div title="닫기" onclick="closeMemberLayer();"><img src="<?php echo $g['img_core']?>/_public/btn_del_s01.gif" alt="닫기" /></div>
	</div>

	<!--<?php/*<div class="tool">
		<input type="button" value="쪽지" class="btngray" onclick="OpenWindow('<?php echo $g['s']?>/?r=<?php echo $r?>&system=popup.papersend&iframe=Y&id=<?php echo $d['member']['login_emailid']?$M['email']:$M1['id']?>');" />
		<?php if($my['uid']==$M1['uid']):?>
		<input type="button" value="친구" class="btngray disabled" />
		<?php else:?>
		<?php $ISF = getDbData($table['s_friend'],'by_mbruid='.$M1['uid'],'*')?>
		<?php if($ISF['uid']):?>
		<input type="button" value="친구" class="btngray disabled" />
		<?php else:?>
		<input type="button" value="친구" class="btngray" onclick="if(confirm('정말로 친구맺기를 요청하시겠습니까?')){frames._friend_.location.href='<?php echo $g['s']?>/?r=<?php echo $r?>&m=member&a=friend_add1&id=<?php echo $d['member']['login_emailid']?$M['email']:$M1['id']?>';}" />
		<?php endif?>
		<?php endif?>

		<?php $i=0?>
		<?php foreach($SNSSET as $key => $val):?>
		<?php if($SNS[$i]):?>
		<a href="http://<?php echo $key?>/<?php echo $SNSENG[$i]=='f'?(is_numeric($SNS[$i])?'profile.php?id='.$SNS[$i]:$SNS[$i]):$SNS[$i]?>" target="_blank"><img src="<?php echo $g['img_core']?>/_public/sns_<?php echo $SNSENG[$i]?>1.gif" alt="<?php echo $val?>" title="<?php echo $val?>" /></a>
		<?php else:?>
		<img src="<?php echo $g['img_core']?>/_public/sns_<?php echo $SNSENG[$i]?>1.gif" alt="<?php echo $val?>" title="<?php echo $val?>" class="nonesns" />
		<?php endif?>
		<?php $i++; endforeach?>

	</div>
	<div class="post">
		<ul>
		<?php $i=0?>
		<?php $_RCD=getDbArray($table['bbsdata'],'mbruid='.$M1['uid'].' and site='.$s.' and display=1','*','gid','asc',5,1)?>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<li>
			ㆍ<a href="<?php echo getPostLink($_R)?>" title="[게시물]<?php echo htmlspecialchars($_R['subject'])?>" target="_blank"><?php echo $_R['subject']?></a>
			<?php if($_R['comment']):?><span class="comment">[<?php echo $_R['comment']?><?php if($_R['oneline']):?>+<?php echo $_R['oneline']?><?php endif?>]</span><?php endif?>
			<?php if(getNew($_R['d_regis'],24)):?><span class="new">N</span><?php endif?>
		</li>
		<?php $i++;endwhile?>
		<?php $_RCD=getDbArray($table['s_comment'],'mbruid='.$M1['uid'].' and site='.$s.' and display=1','*','uid','asc',5,1)?>
		<?php while($_R=db_fetch_array($_RCD)):?>
		<li>
			ㆍ<a href="<?php echo getCyncUrl($_R['cync'].',CMT:'.$_R['uid'])?>#CMT" title="[댓글]<?php echo htmlspecialchars($_R['subject'])?>" target="_blank"><?php echo $_R['subject']?></a>
			<?php if($_R['oneline']):?><span class="comment">[<?php echo $_R['oneline']?>]</span><?php endif?>
			<?php if(getNew($_R['d_regis'],24)):?><span class="new">N</span><?php endif?>
		</li>
		<?php $i++;endwhile?>s
		</ul>
	</div>*/?>-->
	</div>
	<iframe name="_friend_" width="0" height="0" frameborder="0" scrolling="no"></iframe>
	<style type="text/css">
	#mbrLayer {position:relative;z-index:100001;width:200px;padding:5px 5px 5px 8px;background:#efefef;border:#dfdfdf solid 4px;}
	#mbrLayer .level {position:absolute;}
	#mbrLayer .level div {position:relative;top:-30px;left:187px;}
	#mbrLayer .level div img {}
	#mbrLayer .close {position:absolute;}
	#mbrLayer .close div {position:relative;top:-72px;left:179px;background:#f9f9f9;}
	#mbrLayer .close div:hover {background:#000000;}
	#mbrLayer .close div img {padding:5px;border:#dfdfdf solid 1px;cursor:pointer;}
	#mbrLayer .photo {float:left;width:50px;height:50px;background:url('<?php echo $g['s']?>/_var/simbol/0.gif') center center no-repeat;position:relative;top:4px;left:2px;}
	#mbrLayer .info {font-size:11px;font-family:dotum;color:#777;line-height:130%;}
	#mbrLayer .info div {border-bottom:#dfdfdf solid 1px;margin:0 0 4px 0;padding:7px 0 0 0;}
	#mbrLayer .info div span {position:relative;top:-5px;font-weight:bold;color:#33ABE8;}
	#mbrLayer .info div span img {position:relative;top:-1px;left:-2px;}
	#mbrLayer .info .log {font-size:10px;font-family:arial;color:#FF3217;position:relative;top:-1px;left:2px;}
	#mbrLayer .tool {border-top:#dfdfdf solid 1px;padding:7px 0 0 10px;margin:15px 0 0 0;}
	#mbrLayer .tool .nonesns {filter:alpha(opacity=10);opacity:0.1;}
	#mbrLayer .tool .btngray {position:relative;top:-7px;left:-6px;width:43px;height:20px;}
	<?php if($i):?>#mbrLayer .post {padding:10px 0 10px 0;border-top:#dfdfdf solid 1px;}<?php endif?>
	#mbrLayer .post ul {padding:0;margin:0;}
	#mbrLayer .post li {list-style-type:none;margin:3px 0 3px 0;width:200px;height:12px;overflow:hidden;}
	#mbrLayer .post li a {font-family:dotum;font-size:12px;color:#444;}
	#mbrLayer .post li a:hover {text-decoration:underline;}
	#mbrLayer .post li .comment {font:normal 11px arial;color:#FC6138;}
	#mbrLayer .post li .new {font-family:arial;font-size:10px;color:#ff0000;}
	#mbrLayer .disabled {filter:alpha(opacity=30);opacity:0.3;}
	</style>
</div>


<script type="text/javascript">
//<![CDATA[
function layerDraw()
{
	parent.getId('_action_layer_').innerHTML = getId('layerbox').innerHTML;
}
window.onload = layerDraw;
//]]>
</script>