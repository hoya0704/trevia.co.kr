<meta charset="utf-8"/>
<?
$today = date("Y-m-d");

$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}
?>
			<table style="width:310px">
				<colgroup> 
					<col width="100"> 
					<col width="100"> 
					<col width="100"> 
					<col width="100"> 
				</colgroup> 
				<tbody>
				<?
					$n_m = "2013-09-01";
					while( $n_m < $today ) {
						$sql = mysql_query("SELECT * FROM rb_bbsext_data where (category = '견적요청' or category = '견적발송' or category = '계약서발송')and date(d_regis) like '" . substr($n_m,0,7) . "%';");
						$total = mysql_num_rows($sql);

						$sql = mysql_query("SELECT * FROM rb_bbsext_data as b right join rb_contract_data as c on b.uid = c.puid where reply_date like '" . substr($n_m,0,7) . "%' and b.category = '계약완료' group by c.puid order by c.reply_date asc ");
//SELECT count(*) FROM rb_bbsext_data where category = '계약완료' and date(d_regis) like '" . substr($n_m,0,7) . "%';");
						$total2 = mysql_num_rows($sql);

						$sql = mysql_query("SELECT * FROM rb_bbsext_data where category = '계약서발송' and date_sub(curdate(), INTERVAL 3 DAY)  <= date(d_regis) and add13 like '';");
						$total3 = mysql_num_rows($sql);
				?>
					<tr>
						<td><?=substr($n_m,0,7)?></td>
						<td><?=$total?></td>
						<td><?=$total2?></td>
						<td><?=sprintf("%2.2f" ,$total2/$total*100);?>%</td>
					</tr>
				<?
						$x = explode("-",$n_m); // 들어온 날짜를 년,월,일로 분할해 변수로 저장합니다.
						$s_Y = $x[0]; // 지정된 년도 
						$s_m = $x[1]; // 지정된 월
						$s_d = $x[2]; // 지정된 요일
						$n_m = date("Y-m-d", mktime(0,0,0,$s_m+1,$s_d,$s_Y)); // 다음달 
					}
				?>
					<tr>
						<td colspan="3">계약서 미 회신고객(3일)</td>
						<td><?=$total3?></td>
					</tr>
				</tbody>
			</table>