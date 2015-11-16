<?
$today = date("Y-m-d");
?>
<link rel="stylesheet" href="/lib/jquery.ui.all.css">
<link rel="stylesheet" href="_main.css">
<script src="/lib/jquery-1.4.4.js"></script>
<script src="/lib/jquery.ui.core.js"></script>
<script src="/lib/jquery.ui.widget.js"></script>
<script src="/lib/jquery.ui.datepicker.js"></script>
<style>
	#tooltip { 
		position: absolute;
		z-index: 999;
		color: white;
		font-size: 15px;
	}
	#tooltip .tipBody { 
		background-color: black; 
		padding: 8px;
	}
	
#gnb {list-style-type: none;}
#gnb li{display: inline;float:left;list-style-type: none;}

ul.mainCommon { margin: 33px 0 0 0; padding: 0; list-style: none; }
ul.mainCommon h1 { margin: 0 0 12px 0; padding: 0; font-family: "Times New Roman"; font-style: italic; font-size: 20px; font-weight: normal; }
ul.mainCommon h1.blank { height:19px; }
ul.mainCommon li { float: left; margin-right: 8px; }
ul.mainCommon li img.Thumbnail { width:231px; height:129px; }
ul.mainCommon li.noMargin{ margin: 0; }
ul.mainCommon li p { width: 231px; height: 12px; margin: 10px 0 0 0; padding: 0; overflow: hidden; }
ul.mainCommon li p.content { width: 231px; height: 35px; overflow: hidden; color: #7e7e7e; line-height: 18px; font-size: 11px; }

h1.mainLinks { margin: 40px 0 10px 0; }
ul.mainLinks { margin: 0 0 20px 0; }
ul.mainLinks li { margin-right: 10px; }
ul.mainLinks li.noMargin{ margin: 0; }
ul.mainLinks li img { width:310px; height: 107px; }
ul.mainLinks h1 img { width: auto; height: auto; }
ul.mainLinks h2 { width: 310px; height:12px; margin: 10px 0 0 0; padding: 0; overflow: hidden; color: #363636; font-size: 12px; }
ul.mainLinks p { width: 310px; height: 44px; margin: 0; padding: 0; overflow: hidden; color: #7e7e7e; line-height: 15px; font-size: 11px; 





}
</style>
<script>
$(document).ready(function() {
	$(function() {
		$( "#datepicker_s" ).datepicker();
	});
	$(function() {
		$( "#datepicker_e" ).datepicker();
	});
	// Expand Panel
	$("#open").click(function(){
		$("div#stats").slideDown("slow");

/*		
		$.ajax({
		      type: "POST",
		      url: "/modules/bbsext/theme/_pc/list02/contract_ajax.php",
		      success:function( html ) {
				  $( "#contract_div" ).append( html );
			  },
			  error:function(xhr, status, error) {
				  alert("error code : " + xhr.status);
			  }
		});
*/

	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#stats").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});		
		
	// html 페이지에서 'rel=tooltip'이 사용된 곳에 마우스를 가져가면
	$('tr[rel=tooltip]').mouseover(function(e)
		{ 
			var tip = $(this).attr('title');
			// 브라우져에서 제공하는 기본 툴 팁을 끈다        
			// css와 연동하기 위해 html 태그를 추가해줌        
			$('#stats').append('<div id="tooltip"><div class="tipBody">' + tip + '</div></div>');
		}).mousemove(function(e)   
		{ 
			//마우스가 움직일 때 툴 팁이 따라 다니도록 위치값 업데이트 
			$('#tooltip').css('top', e.pageY + 10 );
			$('#tooltip').css('left', e.pageX + 10 ); 
		}).mouseout(function()
		{ 
			//위에서 껐던 브라우져에서 제공하는 기본 툴 팁을 복원 
			$('#stats').children('div#tooltip').remove(); 
		});

	$('td[rel=tooltip]').mouseover(function(e)
		{ 
			var tip = $(this).attr('title');
			// 브라우져에서 제공하는 기본 툴 팁을 끈다        
			// css와 연동하기 위해 html 태그를 추가해줌        
			$('#stats').append('<div id="tooltip"><div class="tipBody">' + tip + '</div></div>');
		}).mousemove(function(e)   
		{ 
			//마우스가 움직일 때 툴 팁이 따라 다니도록 위치값 업데이트 
			$('#tooltip').css('top', e.pageY + 10 );
			$('#tooltip').css('left', e.pageX + 10 ); 
		}).mouseout(function()
		{ 
			//위에서 껐던 브라우져에서 제공하는 기본 툴 팁을 복원 
			$('#stats').children('div#tooltip').remove(); 
		});


	$('#comment_tbody').children().each(function(){
        $(this).click(function(){
           // alert( ($('#comment_tbody').children().index(this)+1)+'번쨰 TR' );
        });
    });
	
});
</script>
<div id="bbslist">
<h2>트레비아 고객관리 시스템[TIGER]</h2>
<div align="right" style="width:100%">
	<input id="create" type="button" value="고객관리" onclick="location.href='http://www.himaldives.co.kr/?r=maldives&m=bbsext&bid=cus_manager2'" 
				style="color:white;background-color:purple;border-color:blue;border-width:1px;height:20px" />
	<input id="create" type="button" value="통계관리" onclick="location.href='http://www.himaldives.co.kr/?r=maldives&m=bbsext&bid=cus_manager2&mod=statisics'" 
				style="color:white;background-color:purple;border-color:blue;border-width:1px;height:20px" />
</div>
<div id="stats" style="height:300px;" >
<ul  class="mainCommon mainLinks">
	<li>
		작업예약등록내역 [담당:<?=$selected_admin?>]
		<table style="width:400px">
			<caption>예약작업등록내역</caption>
			<colgroup> 
				<col width="50"> 
				<col width="50"> 
				<col width="70"> 
				<col width="100"> 
				<col width="100"> 
				<col width="100"> 
			</colgroup> 
			<thead>
				<tr>
					<th scope="col" class="side1">지역</th>
					<th scope="col">일정</th>
					<th scope="col">고객명</th>
					<th scope="col">전화번호</th>
					<th scope="col">출발일</th>
					<th scope="col">작업예약일</th>
				</tr>
			</thead>
		</table>
		<div style="height:240px;overflow:auto;width:418px">
			<table style="width:400px">
				<colgroup> 
					<col width="50"> 
					<col width="50"> 
					<col width="70"> 
					<col width="100"> 
					<col width="100"> 
					<col width="100"> 
				</colgroup> 
				<tbody>
		<?
		 foreach($RCD2 as $R):
			$day = dateDiff($R['reservation_date'], date('Y-m-d'));
				if($day <= 2 && $p == 1 && $R['reservation_date'] > 0):

				$add1 = explode("||", $R[add1]);
				$add2 = explode("||", $R[add2]);
				$add3 = explode("||", $R[add3]);
				$add4 = explode("||", $R[add4]);
				$add5 = explode("||", $R[add5]);
				$add6 = explode("||", $R[add6]);
				$add7 = explode("||", $R[add7]);
				$add8 = explode("||", $R[add8]);
				$add9 = explode("||", $R[add9]);
				$add10 = explode("||", $R[add10]);
				$add11 = explode("||", $R[add11]);	

		?>
		<?php $R['mobile']=isMobileConnect($R['agent'])?>
				
				<tr rel="tooltip" title="<?php echo $R['reservation_data']?>" style="height:20px;background-color:#ffdcdc">
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[0]?></a></td><!--접수처-->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $state?></a></td><!--상태-->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[2]?></a></td><!--여행지역-->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[5]?>박</a></td><!-- 일정 -->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[1]?></a></td><!-- 고객명 -->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[7]?></a></td><!-- 고객명2 -->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[4]?></a></td><!-- 전화번호 -->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[7]?></a></td><!-- 출발일 -->
					<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['reservation_date']?></a></td><!--작업예약일-->
				</tr> 
			<?php endif?> 
		<?php endforeach?> 
				</tbody>
			</table>
		</div>
	</li>
	<li>
		<?
$db_host = "localhost";
$db_id = "trevia";
$db_passwd = "trevia6681";
$db_name = "trevia";

if($db_host&&$db_id&&$db_passwd&&$db_name) {
  $conn = @mysql_connect($db_host,$db_id,$db_passwd) or error_page("Databases sever name, ID or Password is not correct");
  if($conn) if(!@mysql_select_db($db_name,$conn)) error_page("Databases Name is not correct");
}

$ten_days = date("Y-m-d");
$sql = mysql_query("SELECT * FROM rb_s_comment where parent LIKE 'bbsext%' and date(d_regis) >= date(subdate(now(), INTERVAL 10 DAY)) and date(d_regis) <= date(now()) order by d_regis desc;");
		?>
		최근 댓글
		<table style="width:400px">
			<colgroup> 
				<col width="50"> 
				<col width="150"> 
				<col width="50"> 
			</colgroup> 
			<thead>
				<tr>
					<th scope="col" class="side1">이름</th>
					<th scope="col">내용</th>
					<th scope="col">등록일</th>
				</tr>
			</thead>
		</table>
		<div style="height:240px;overflow:auto;width:418px">
			<table style="width:400px">
				<colgroup> 
					<col width="50"> 
					<col width="200"> 
					<col width="50"> 
				</colgroup> 
				<tbody id="comment_tbody">
				<? while ($rs = mysql_fetch_array($sql)) { ?>
					<tr rel="tooltip" title="<?php echo $rs['content']?>" onclick="location.href='/?r=maldives&m=bbsext&bid=cus_manager2&uid=<?=str_replace("bbsext", "",$rs[parent])?>'">
						<td><?=$rs[nic]?></td>
						<td><?=substr($rs[subject],0,60)?></td>
						<td><?=substr($rs[d_regis],0,4).'-'.substr($rs[d_regis],4,2).'-'.substr($rs[d_regis],6,2)?></td>
					</tr>
				<? } ?>
				</tbody>
			</table>
		</div>
	</li>
	<li>
		통계
		<table style="width:310px">
			<colgroup> 
				<col width="100"> 
				<col width="100"> 
				<col width="100"> 
				<col width="100"> 
			</colgroup> 
			<thead>
				<tr>
					<th scope="col" class="side1">구분</th>
					<th scope="col">견적수</th>
					<th scope="col">계약</th>
					<th scope="col">체결</th>
				</tr>
			</thead>
		</table>
		<div id="contract_div" style="height:240px;overflow:auto;width:328px">
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
		</div>
	</li>
</ul>
</div>

<table border="0">
	<caption>직원별 실적 통계</caption> 
	<colgroup> 
		<col width="100"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
		<col width="80"> 
	</colgroup> 
	<thead>
	<tr>
		<th scope="col" rowspan="2" class="side1" >담당자</th>
		<th scope="col" class="side1" colspan="3">9월</th>
		<th scope="col" class="side1" colspan="3">8월</th>
		<th scope="col" class="side1" colspan="3">7월</th>
		<th scope="col" class="side3" colspan="3">최근3개월평균</th>
	</tr>
	<tr>
		<th class="side1"> 신규 </th>
		<th> 계약 </th>
		<th class="side2"> 체결율 </th>
		<th> 신규 </th>
		<th> 계약 </th>
		<th class="side2"> 체결율 </th>
		<th> 신규 </th>
		<th> 계약 </th>
		<th class="side2"> 체결율 </th>
		<th> 계약 </th>
		<th class="side2"> 체결율 </th>
	</tr>
	</thead>
	<tbody>
<?

$dbconnect = mysql_connect("localhost", "trevia", "trevia6681") or die(mysql_error()); 
$mysql = mysql_select_db("trevia") or die(mysql_error());
mysql_query("set names utf8;");

$qry1 = "select * from rb_s_mbrdata where admin=1";

$rlt1 = mysql_query($qry1);

while($row = mysql_fetch_row($rlt1))
{
	$n_m = "2014-09-01";
	$sql = mysql_query("SELECT * FROM rb_bbsext_data where (category = '견적요청' or category = '견적발송' or category = '계약서발송') and date(d_regis) like '" . substr($n_m,0,7) . "%' and name like '%". $row[9] ."%';");
	$total = mysql_num_rows($sql);

	$sql = mysql_query("SELECT * FROM rb_bbsext_data as b right join rb_contract_data as c on b.uid = c.puid where reply_date like '" . substr($n_m,0,7) . "%' and b.category = '계약완료' and b.name like '%". $row[9] ."%' group by c.puid order by c.reply_date asc ");
	$total2 = mysql_num_rows($sql);

?>
	<tr>
		<td height="20" class="side1" > <?=$row[9]?> </td>
		<td class="side1" > <?=$total?> </td>
		<td> <?=$total2?> </td>
		<td> <?=sprintf("%2.2f" ,$total2/$total*100);?>% </td>
<?
	$n_m = "2014-08-01";
	$sql = mysql_query("SELECT * FROM rb_bbsext_data where (category = '견적요청' or category = '견적발송' or category = '계약서발송') and date(d_regis) like '" . substr($n_m,0,7) . "%' and name like '%". $row[9] ."%';");
	$total3 = mysql_num_rows($sql);

	$sql = mysql_query("SELECT * FROM rb_bbsext_data as b right join rb_contract_data as c on b.uid = c.puid where reply_date like '" . substr($n_m,0,7) . "%' and b.category = '계약완료' and b.name like '%". $row[9] ."%' group by c.puid order by c.reply_date asc ");
	$total4 = mysql_num_rows($sql);

?>
		<td class="side1" > <?=$total3?> </td>
		<td> <?=$total4?> </td>
		<td> <?=sprintf("%2.2f" ,$total4/$total3*100);?>% </td>
<?
	$n_m = "2014-07-01";
	$sql = mysql_query("SELECT * FROM rb_bbsext_data where (category = '견적요청' or category = '견적발송' or category = '계약서발송') and date(d_regis) like '" . substr($n_m,0,7) . "%' and name like '%". $row[9] ."%';");
	$total5 = mysql_num_rows($sql);

	$sql = mysql_query("SELECT * FROM rb_bbsext_data as b right join rb_contract_data as c on b.uid = c.puid where reply_date like '" . substr($n_m,0,7) . "%' and b.category = '계약완료' and b.name like '%". $row[9] ."%' group by c.puid order by c.reply_date asc ");
	$total6 = mysql_num_rows($sql);

?>
		<td class="side1" > <?=$total5?> </td>
		<td> <?=$total6?> </td>
		<td> <?=sprintf("%2.2f" ,$total6/$total5*100);?>% </td>

		<td class="side1" > <?=$total2+$total4+$total6?> </td>
		<td class="side2" > <?=sprintf("%2.2f" ,($total2+$total4+$total6)/($total+$total3+$total5)*100);?>% </td>
	</tr>
<?
}

?>


</table>
<pre>
</pre>
</div>