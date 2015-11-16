<?php
if(!defined('__KIMS__')) exit;

checkAdmin(0);

getDbUpdate($table['sliderdata'],"imgsrc='',url=''","seq='".$seq."' AND sitecode='".$sitecode."'");

getLink('reload','parent.','','');
?>