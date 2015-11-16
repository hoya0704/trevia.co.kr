<?php
if(!defined('__KIMS__')) exit;


$_tmp = db_query( "select count(*) from ".$table[$module.'data'], $DB_CONNECT );
if ( !$_tmp ) {
$_tmp = ("
CREATE TABLE ".$table[$module.'data']." (
sitecode varchar(20) NULL ,
seq int NULL ,
imgsrc  varchar(255) NULL ,
url  varchar(255) NULL
) ENGINE=MyISAM DEFAULT CHARACTER SET=UTF8");                           
db_query($_tmp, $DB_CONNECT);
db_query("OPTIMIZE TABLE ".$table[$module.'data'],$DB_CONNECT);

// Insert Dummy Record
	for($i=0; $i<10; $i++)
	{
		db_query("INSERT INTO ".$table[$module.'data']."(sitecode,seq) VALUES('maldives',$i)",$DB_CONNECT);
		db_query("INSERT INTO ".$table[$module.'data']."(sitecode,seq) VALUES('newtrevia',$i)",$DB_CONNECT);
	}
}

?>