<?php
if(!defined('__KIMS__')) exit;
?>

<div id="widgeArea" style="position:relative;height:<?php echo $d['page']['mainheight']?>px;">
	<?php $_widgetGroup=''?>
	<?php $i = 0?>
	<?php foreach($d['page']['widget'] as $_key => $_val):?>
	<?php $_name = $d['page']['widget'][$_key]['name']?>
	<?php $_size = explode('|',$d['page']['widget'][$_key]['size'])?>
	<?php $_prop = explode(',',$d['page']['widget'][$_key]['prop'])?>
	<?php
	$wdgvar=array();
	foreach($_prop as $_cval)
	{
		$_xval=explode('^',$_cval);
		$wdgvar[$_xval[0]]=$_xval[1];
	}
	$wdgvar['widget_id'] = $_prop[0];
	?>
	
	<?php if(!strstr($_widgetGroup,'['.$wdgvar['widget_id'].']')):?>
	<?php if(is_file($g['path_widget'].$wdgvar['widget_id'].'/main.css')):?>
	<link type="text/css" rel="stylesheet" charset="utf-8" href="<?php echo $g['s']?>/widgets/<?php echo $wdgvar['widget_id']?>/main.css" />
	<?php endif?>

	<?php if(is_file($g['path_widget'].$wdgvar['widget_id'].'/main.js')):?>
	<script type="text/javascript" charset="utf-8" src="<?php echo $g['s']?>/widgets/<?php echo $wdgvar['widget_id']?>/main.js"></script>
	<?php endif?>
	<?php endif?>

	<div id="widget_<?php echo str_replace('/','_',$wdgvar['widget_id'])?>" style="position:absolute;width:<?php echo $_size[0]?>;height:<?php echo $_size[1]?>;top:<?php echo $_size[2]?>;left:<?php echo $_size[3]?>;">
	<?php include $g['path_widget'].$wdgvar['widget_id'].'/main.php'?>
	</div>

	<?php $_widgetGroup .= '['.$wdgvar['widget_id'].']'?>
	<?php $i++; endforeach?>
</div>
