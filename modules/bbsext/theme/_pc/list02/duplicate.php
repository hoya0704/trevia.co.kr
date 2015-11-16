<?
$value = $_POST['value'];

$dbconnect = mysql_connect("localhost", "trevia", "trevia6681") or die(mysql_error()); 
$mysql = mysql_select_db("trevia") or die(mysql_error());
mysql_query("set names utf8;");

$qry1 = "select * from rb_bbsext_data where (site = '2' and add3 like '%".$value."%') and uid != '$R[uid]' and display='1' ";

$rlt1 = mysql_query($qry1);
$cnt1 = mysql_num_rows($rlt1);
if($cnt1>0) {
	echo " '" . $value . "'  " ;
?>
고객정보 DB에 중복된 데이터가 있습니다.
<pre>
<?
//print_r($rlt1[add3]);
?>
</pre>
<?
}
?>