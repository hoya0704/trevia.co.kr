<?
$today = date("Y-m-d");

// echo $g['bbs_view'];

?>
<link rel="stylesheet" href="/lib/jquery.ui.all.css">
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
			$('#bbslist').append('<div id="tooltip"><div class="tipBody">' + tip + '</div></div>');
		}).mousemove(function(e)   
		{ 
			//마우스가 움직일 때 툴 팁이 따라 다니도록 위치값 업데이트 
			$('#tooltip').css('top', e.pageY + 10 );
			$('#tooltip').css('left', e.pageX + 10 ); 
		}).mouseout(function()
		{ 
			//위에서 껐던 브라우져에서 제공하는 기본 툴 팁을 복원 
			$('#bbslist').children('div#tooltip').remove(); 
		});

	$('td[rel=tooltip]').mouseover(function(e)
		{ 
			var tip = $(this).attr('title');
			// 브라우져에서 제공하는 기본 툴 팁을 끈다        
			// css와 연동하기 위해 html 태그를 추가해줌        
			$('#bbslist').append('<div id="tooltip"><div class="tipBody">' + tip + '</div></div>');
		}).mousemove(function(e)   
		{ 
			//마우스가 움직일 때 툴 팁이 따라 다니도록 위치값 업데이트 
			$('#tooltip').css('top', e.pageY + 10 );
			$('#tooltip').css('left', e.pageX + 10 ); 
		}).mouseout(function()
		{ 
			//위에서 껐던 브라우져에서 제공하는 기본 툴 팁을 복원 
			$('#bbslist').children('div#tooltip').remove(); 
		});


	$('#comment_tbody').children().each(function(){
        $(this).click(function(){
           // alert( ($('#comment_tbody').children().index(this)+1)+'번쨰 TR' );
        });
    });
	
});
</script>

<div id="bbslist">
<div align="right" style="width:100%">
	<input id="create" type="button" value="고객관리" onclick="location.href='http://www.himaldives.co.kr/?r=maldives&m=bbsext&bid=cus_manager2'" 
				style="color:white;background-color:purple;border-color:blue;border-width:1px;height:20px" />
	<input id="create" type="button" value="통계관리" onclick="location.href='http://www.himaldives.co.kr/?r=maldives&m=bbsext&bid=cus_manager2&mod=statisics'" 
				style="color:white;background-color:purple;border-color:blue;border-width:1px;height:20px" />
</div>
	<div class="info">

		<div class="article">
			<?php echo number_format($NUM+count($NCD))?>개(<?php echo $p?>/<?php echo $TPG?>페이지)
			<?php if($d['bbs']['rss']):?><a href="<?php echo $g['r']?>/?m=<?php echo $m?>&amp;bid=<?php echo $B['id']?>&amp;mod=rss" target="_blank"><img src="<?php echo $g['img_core']?>/_public/ico_rss.gif" alt="rss" /></a><?php endif?>
			<!--
			<li id="toggle">
				<a id="open" class="open" href="#">통계열기▼</a>
				<a id="close" style="display: none;" class="close" href="#">통계닫기▲</a>			
			</li>
			-->
		</div>
		<div class="category">
			<ul id="gnb">
				<li>
					기간 &nbsp; : &nbsp;
					<input type="text" name="start_duration" style="width:70px" id="datepicker_s" value="<?=$start_duration?>" onchange="document.bbssearchf.start_duration.value=this.value"> - 
					<input type="text" name="end_duration" style="width:70px" id="datepicker_e" value="<?=$end_duration?>" onchange="document.bbssearchf.end_duration.value=this.value"> &nbsp;
				</li>
				<li>
					<select onchange="document.bbssearchf.reception.value=this.value;document.bbssearchf.submit();">
						<option value=""<? if( $reception == "" ) echo "selected"?> >접수처</option>
						<option value="아이웨딩"<? if( $reception == "아이웨딩" ) echo "selected"?> >아이웨딩</option>
						<option value="B2B"<? if( $reception == "B2B" ) echo "selected"?> >B2B</option>
						<option value="인터넷"<? if( $reception == "인터넷" ) echo "selected"?> >인터넷</option>
						<option value="전화"<? if( $reception == "전화" ) echo "selected"?> >전화</option>
						<option value="방문"<? if( $reception == "방문" ) echo "selected"?> >방문</option>
						<option value="지인"<? if( $reception == "지인" ) echo "selected"?> >지인</option>
					</select> &nbsp;
				</li>
				<li>
					<select onchange="document.bbssearchf.sort_kind.value=this.value;document.bbssearchf.submit();">
						<option value="gid"<? if( $sort_kind == "gid" ) echo "selected"?> >정렬조건</option>
						<option value="resort"<? if( $sort_kind == "resort" ) echo "selected"?> >리조트 T/L</option>
						<option value="air"<? if( $sort_kind == "air" ) echo "selected"?> >항공 T/L</option>
						<option value="start_date"<? if( $sort_kind == "start_date" ) echo "selected"?> >출발일순</option>
						<option value="request"<? if( $sort_kind == "request" ) echo "selected"?> >견적요청일순</option>
						<option value="reservation_date"<? if( $sort_kind == "reservation_date" ) echo "selected"?> >예약작업일순</option>
					</select> &nbsp;
				</li>
				<li>
					<select id="man1" onchange="document.bbssearchf.admin_email.value=this.value;document.bbssearchf.submit();">
						<option value="all" <? if( $selected_admin == "all" ) echo "selected"?> >담당자</option>
					<?
					$m_sql1 = mysql_query("SELECT * FROM rb_s_mbrdata where admin = 1");
					$row_count = mysql_num_rows($m_sql1);
					while($m_rs1 = mysql_fetch_array($m_sql1))
					{
					?>
						<option value="<?=$m_rs1[name]?>" <? if( $selected_admin == $m_rs1[name] || $admin_email == $m_rs1[name]) echo "selected"?> ><?=$m_rs1[name]?></option>
					<?
					}
					?>
					</select>
				</li>
			</ul>
			&nbsp;
			<?php if($my['admin']):?>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=<?php echo $m?>&amp;&amp;uid=<?php echo $B['uid']?>"><img src="<?php echo $g['img_core']?>/_public/btn_admin.gif" alt="" title="게시판관리" /></a>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;m=admin&amp;module=<?php echo $m?>&amp;front=skin&amp;theme=<?php echo $d['bbs']['skin']?>"><img src="<?php echo $g['img_core']?>/_public/btn_explorer.gif" alt="" title="테마관리" /></a>
			<?php endif?>

			<?php if($B['category']):$_catexp = explode(',',$B['category']);$_catnum=count($_catexp)?>
			<select onchange="document.bbssearchf.cat.value=this.value;document.bbssearchf.submit();">
			<option value="">&nbsp;+ <?php echo $_catexp[0]?></option>
			<option value="" class="sline">-------------------</option>
			<?php for($i = 1; $i < $_catnum; $i++):if(!$_catexp[$i])continue;?>
			<option value="<?php echo $_catexp[$i]?>"<?php if($_catexp[$i]==$cat):?> selected="selected"<?php endif?>>ㆍ<?php echo $_catexp[$i]?><?php if($d['theme']['show_catnum']):?>(<?php echo getDbRows($table[$m.'data'],'site='.$s.' and notice=0 and bbs='.$B['uid']." and category='".$_catexp[$i]."'")?>)<?php endif?></option>
			<?php endfor?>
			</select>
			<?php endif?>
		</div>
		<div class="clear"></div>
	</div>

	<table summary="<?php echo $B['name']?$B['name']:'전체'?> 게시물리스트 입니다." border="0">
	<caption><?php echo $B['name']?$B['name']:'전체게시물'?></caption> 
	<colgroup> 
	<col width="50"> 
	<col width="100"> 
<!--	<col width="100"> -->
	<col width="100"> 
	<col width="80"> 
	<col width="50"> 
	<col width="80"> 
	<col width="100"> 
	<col width="100"> 
	<col width="100"> 
	<col width="100"> 
	<col width="100"> 
	<col width="150"> 
	</colgroup> 
	<thead>
	<tr>
	<th scope="col" class="side1">번호</th>
	<th scope="col">작업예약일</th>
<!--	<th scope="col">예약사유</th> -->
	<th scope="col">처리상태</th>
	<th scope="col">접수처</th>
	<th scope="col">상태</th>
	<th scope="col">여행지역</th>
	<th scope="col">일정</th>
	<th scope="col">고객명</th>
	<th scope="col">고객명2</th>
	<th scope="col">전화번호</th>
	<th scope="col">출발일</th>
<!--
	<th scope="col">리조트잔금(T/L)</th>
-->

	<th scope="col">담당자</th>
	<th scope="col">견적요청일</th>
	</tr>
	</thead>
	<tbody>

<!-------------------------------------------   당일 예약 작업 우선  ---------------------------------------------------->
<?


function dateDiff($date1, $date2) { 
	$_date1 = explode("-",$date1); 
	$_date2 = explode("-",$date2); 

	$tm1 = mktime(0,0,0,$_date1[1],$_date1[2],$_date1[0]); 
	$tm2 = mktime(0,0,0,$_date2[1],$_date2[2],$_date2[0]);

	return ($tm1 - $tm2) / 86400; 
} 


?>
	<?php foreach($RCD2 as $R):
		$day = dateDiff($R['reservation_date'], date('Y-m-d'));
		if($day >= -2 && $day <= 1 && $p == 1):

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
	
	$add15 = explode("||", $R[add15]);	
	$add16 = explode("||", $R[add16]);	

	$today = date('Y-m-d');

	?>
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<tr rel="tooltip" title="<?php echo $R['reservation_data']?>" style="height:20px;background-color:#<?=($day == 0) ? "c3c4ff" : "ffdcdc"?>">
		<td style="height:20px;">
			<?php if($R['uid'] != $uid):?>
			<?php echo $NUM-((($p-1)*$recnum)+$_rec++)?>
			<?php else:$_rec++?>
			<span class="now">&gt;&gt;</span>
			<?php endif?>
		</td>
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['reservation_date']?></a></td><!--작업예약일-->
<!--		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['reservation_data']?></a></td><!--예약사유-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><? if( $R['category'] == "계약완료" ) { ?><font color="#0000ff"><? } else if( $R['category'] == "계약서발송" || $R['category'] == "계약서재발송") { ?><font color="ff5544"><? }?> 
			<?php echo $R['category']?>
			<?
				$m_sql1 = mysql_query("SELECT * FROM rb_extra where puid = '$R[puid]' ");
				$row_count = mysql_num_rows($m_sql1);
				if( $R['category'] == "견적발송" ) { ?>
				(<?=$row_count?>)
			<? } ?>
			<?
				$m_sql1 = mysql_query("SELECT * FROM rb_contract_data where puid = '$R[uid]' ");
				$row_count = mysql_num_rows($m_sql1);
				if( $R['category'] == "계약서발송" ) { ?>
				(<?=$row_count?>)
			<? } ?>
		</a></td><!--처리상태-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[0]?></a></td><!--접수처-->
		<?
			$state = "";
			$comment = "";

			$temp = empty($add8[5]) ? (empty($add8[11]) ? (empty($add8[17]) ? (empty($add8[23]) ? (empty($add8[29]) ? (empty($add8[35]) ? (empty($add8[41]) ? (empty($add8[47]) ? (empty($add8[53]) ? (empty($add8[59]) ? $add8[65] : $add8[59]) : $add8[53]) : $add8[47]) : $add8[41]) : $add8[35]) : $add8[29]) : $add8[23]) : $add8[17]) : $add8[11]) : $add8[5];

			$temp1 = eregi("리조트잔금", $R[add15]);
			
			$temp2 = false;

			$qry1 = "select * from rb_bbsext_data where (site = '2' and add3 like '%".$add3[4]."%' or add3 like '%".$add3[5]."%'";
			if( !empty($add3[10]) ) $qry1 .= "or add3 like '%".$add3[10]."%'";
			if( !empty($add3[11]) ) $qry1 .= "or add3 like '%".$add3[11]."%'";
			$qry1 = ") and uid != '$R[uid]' and display='1' ";

			$rlt1 = mysql_query($qry1);
			$cnt1 = mysql_num_rows($rlt1);
			$sameCheck = false;
			if($cnt1>1) {
				$sameCheck = true;
			}

			for( $i=1; $i < count($add15); $i+=5)
			{
				if(  $add15[$i] == "계약금" && $add15[$i+1] > 0 )
					$temp2 = true;
			}

			if( $R['category'] == "계약서발송" && empty($temp))
			{
				$state = "<font color='red'>!</font>";
				$comment .= "리조트 컨펌번호 여부확인!\n";
			}
			if( empty($temp1) && $add11[3] < $today )
			{
				$state = "<font color='red'>!</font>";
				$comment .= "여행 잔금일 경과!\n";
			}
			if( $R['category'] == "계약서발송" && !$temp2 )
			{
				$state = "<font color='red'>!</font>";
				$comment .= "계약금 입금확인요망!\n";
			}
			if( $sameCheck )
			{
				$state = "<font color='red'>!</font>";
				$comment .= $cnt1."중복고객 DB가 존재 합니다!\n";
			}
		?>
		<td class="name" rel="tooltip" title="<?=$comment?>"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $state?></a></td><!--상태-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[2]?></a></td><!--여행지역-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[5]?>박</a></td><!-- 일정 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[1]?></a></td><!-- 고객명 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[7]?></a></td><!-- 고객명2 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[4]?></a></td><!-- 전화번호 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[7]?></a></td><!-- 출발일 -->
<!--
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add11[3]?></a></td><!-- 리조트잔금(T/L) -->


		<td class="name">
<? if ( $my[name] == "Trevia" ) { ?>

<form name="changeadmin<?=$R[uid]?>" action="/modules/bbsext/theme/_pc/list02/change_admin.php" method="post">
	<input type="hidden" name="uid" value="<?=$R['uid']?>" />
	<input type="hidden" id="admin_email" name="admin_email" value="<?=$admin_email?>" />
	<input type="hidden" id="sort_kind" name="sort_kind" value="<?=$sort_kind?>" />
	<input type="hidden" id="p" name="p" value="<?=$p?>" />

	<select name="selected_admin" onchange="document.changeadmin<?=$R[uid]?>.submit();" >
		<option value="all" <? if( $selected_admin == "all" ) echo "selected"?> >전체</option>
	<?
	$m_sql1 = mysql_query("SELECT * FROM rb_s_mbrdata where admin = 1");
	$row_count = mysql_num_rows($m_sql1);
	while($m_rs1 = mysql_fetch_array($m_sql1))
	{
	?>
		<option value="<?=$m_rs1[name]?>" <? if( $R['name'] == $m_rs1[name] ) echo "selected"?> ><?=$m_rs1[name]?></option>
	<?
	}
	?>
	</select>
</form>

<? } else { ?>			
		<a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['name']?></a>
<? } ?>				
		</td>


		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[1]?></a></td><!-- 견적요청일 -->
	</tr> 
		<?php endif?>
	<?php endforeach?> 
<!-------------------------------------------   당일 예약 작업 우선 끝 ---------------------------------------------------->

	<?php foreach($RCD as $R):?>
		<?php if($R['reservation_date'] != date('Y-m-d') ):?>
	<?
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
	
	$add15 = explode("||", $R[add15]);
	$add16 = explode("||", $R[add16]);

	

	
	?>
	<?php $R['mobile']=isMobileConnect($R['agent'])?>
	<tr style="height:20px;">
		<td>
<?
			if( ($R['category'] == "계약완료" || $R['category'] == "출발확정") && $add2[8] < $today )
			{
				$R['category'] = "여행완료";
				$qrys = "UPDATE `trevia`.`rb_bbsext_data` SET `category` = '여행완료' WHERE `rb_bbsext_data`.`uid` = $R[uid];"; 
				$m_sql = mysql_query($qrys);
			}
?>
			<?php if($R['uid'] != $uid):?>
			<?php echo $NUM-((($p-1)*$recnum)+$_rec++)?>
			<?php else:$_rec++?>
			<span class="now">&gt;&gt;</span>
			<?php endif?>
		</td>
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['reservation_date']?></a></td><!--작업예약일-->
<!--		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['reservation_data']?></a></td><!--작업예약일-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><? if( $R['category'] == "계약완료" ) { ?><font color="#0000ff"><? }  else if( $R['category'] == "계약서발송" || $R['category'] == "계약서재발송") { ?><font color="ff5544"><? }?> 
			<?php echo $R['category']?>
			<?
				$m_sql1 = mysql_query("SELECT * FROM rb_extra where puid = '$R[uid]' ");
				$row_count = mysql_num_rows($m_sql1);
				if( $R['category'] == "견적발송" ) { ?>
				(<?=$row_count?>)
			<? } ?>
			<?
				$m_sql1 = mysql_query("SELECT * FROM rb_contract_data where puid = '$R[uid]' ");
				$row_count = mysql_num_rows($m_sql1);
				if( $R['category'] == "계약서발송" ) { ?>
				(<?=$row_count?>)
			<? } ?>
			<?
				$m_sql1 = mysql_query("SELECT * FROM rb_contract_data where puid = '$R[uid]' ");
				$row_count = mysql_num_rows($m_sql1);
				if( $R['category'] == "계약서재발송" ) { ?>
				(<?=$row_count?>)
			<? } ?>
		</a></td><!--처리상태-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[0]?></a></td><!--접수처-->
		<?
			$state = "";
			$comment = "";

			$temp = empty($add8[5]) ? (empty($add8[11]) ? (empty($add8[17]) ? (empty($add8[23]) ? (empty($add8[29]) ? (empty($add8[35]) ? (empty($add8[41]) ? (empty($add8[47]) ? (empty($add8[53]) ? (empty($add8[59]) ? $add8[65] : $add8[59]) : $add8[53]) : $add8[47]) : $add8[41]) : $add8[35]) : $add8[29]) : $add8[23]) : $add8[17]) : $add8[11]) : $add8[5];

			$temp1 = eregi("리조트잔금", $R[add15]);
			
			$temp2 = false;

			$qry1 = "select * from rb_bbsext_data where (site = '2' and add3 like '%".$add3[4]."%' or add3 like '%".$add3[5]."%'";
			if( !empty($add3[10]) ) $qry1 .= "or add3 like '%".$add3[10]."%'";
			if( !empty($add3[11]) ) $qry1 .= "or add3 like '%".$add3[11]."%'";
			$qry1 = ") and uid != '$R[uid]' and display='1' ";

			$rlt1 = mysql_query($qry1);
			$cnt1 = mysql_num_rows($rlt1);
			$sameCheck = false;
			if($cnt1>1) {
				$sameCheck = true;
			}

			for( $i=1; $i < count($add15); $i+=5)
			{
				if(  $add15[$i] == "계약금" && $add15[$i+1] > 0 )
					$temp2 = true;
			}

			if( $R['category'] == "계약서발송" && empty($temp))
			{
				$state = "<font color='red'>!</font>";
				$comment .= "리조트 컨펌번호 여부확인!\n";
			}
			if( ( $R['category'] == "계약서발송" || $R['category'] == "계약서재발송" || $R['category'] == "계약완료" ) && empty($temp1) && $add11[3] < $today )
			{
				$state = "<font color='red'>!</font>";
				$comment .= "여행 잔금일 경과!\n";
			}
			if( $R['category'] == "계약서발송" && !$temp2 )
			{
				$state = "<font color='red'>!</font>";
				$comment .= "계약금 입금확인요망!\n";
			}
			if( $sameCheck )
			{
				$state = "<font color='red'>!</font>";
				$comment .= $cnt1."중복고객 DB가 존재 합니다!\n";
			}
		?>
		<td class="name" rel="tooltip" title="<?=$comment?>"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $state?></a></td><!--상태-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[2]?></a></td><!--여행지역-->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[5]?>박</a></td><!-- 일정 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[1]?></a></td><!-- 고객명 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[7]?></a></td><!-- 고객명2 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add3[4]?></a></td><!-- 전화번호 -->
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[7]?></a></td><!-- 출발일 -->

<!--		
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add11[3]?></a></td><!-- 리조트잔금(T/L) -->

		<td class="name">
		
<? if ( $my[name] == "Trevia" ) { ?>

<form name="changeadmin<?=$R[uid]?>" action="/modules/bbsext/theme/_pc/list02/change_admin.php" method="post">
	<input type="hidden" name="uid" value="<?=$R['uid']?>" />
	<input type="hidden" id="admin_email" name="admin_email" value="<?=$admin_email?>" />
	<input type="hidden" id="p" name="p" value="<?=$p?>" />

	<select name="selected_admin" onchange="document.changeadmin<?=$R[uid]?>.submit();" >
	<?
	$m_sql1 = mysql_query("SELECT * FROM rb_s_mbrdata where admin = 1");
	$row_count = mysql_num_rows($m_sql1);
	while($m_rs1 = mysql_fetch_array($m_sql1))
	{
	?>
		<option value="<?=$m_rs1[name]?>" <? if( $R['name'] == $m_rs1[name] ) echo "selected"?> ><?=$m_rs1[name]?></option>
	<?
	}
	?>
	</select>
</form>

<? } else { ?>			
		<a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $R['name']?></a>
<? } ?>		
		</td>
		
		
		<td class="name"><a href="<?php echo $g['bbs_view'].$R['uid']?>"><?php echo $add2[1]?></a></td><!-- 견적요청일 -->
	</tr> 
		<?php endif?>
	<?php endforeach?> 




	<?php if(!$NUM):?>
	<tr>
		<td>1</td>
		<td colspan="9" class="sbj1">게시물이 없습니다.</td>
	</tr> 
	<?php endif?>

	</tbody>
	</table>

	<div class="bottom">
		<div class="btnbox1">
		<?php if($B['uid']):?><span class="btn00"><a href="<?php echo $g['bbs_write']?>">글쓰기</a></span><?php endif?>
		</div>
		<div class="btnbox2">
		<span class="btn00"><a href="<?php echo $g['bbs_reset']?>">처음목록</a></span>
		<span class="btn00"><a href="<?php echo $g['bbs_list']?>">새로고침</a></span>
		</div>
		<div class="clear"></div>
		<div class="pagebox01">
		<?php echo getPageLink($d['theme']['pagenum'],$p,$TPG,$g['img_core'].'/page/default',array("admin_email=".$admin_email,"sort_kind=".$sort_kind,"start_duration=".$start_duration,"end_duration=".$end_duration,"reception=".$reception))?>
		</div>
	</div>

	<div class="searchform">
		<form name="bbssearchf" action="<?php echo $g['s']?>/" method="get" >
		<input type="hidden" name="r" value="<?php echo $r?>" />
		<input type="hidden" name="c" value="<?php echo $c?>" />
		<input type="hidden" name="m" value="<?php echo $m?>" />
		<input type="hidden" name="bid" value="<?php echo $bid?>" />
		<input type="hidden" name="cat" value="<?php echo $cat?>" />
		<input type="hidden" name="sort" value="<?php echo $sort?>" />
		<input type="hidden" name="orderby" value="<?php echo $orderby?>" />
		<input type="hidden" name="recnum" value="<?php echo $recnum?>" />
		<input type="hidden" name="type" value="<?php echo $type?>" />
		<input type="hidden" name="iframe" value="<?php echo $iframe?>" />
		<input type="hidden" name="skin" value="<?php echo $skin?>" />
		<input type="hidden" name="reception" value="<?php echo $reception?>" />
		<input type="hidden" name="type" value="cms" />
		<input type="hidden" id="admin_email" name="admin_email" value="<?=$admin_email?>" />
		<input type="hidden" id="sort_kind" name="sort_kind" value="<?=$sort_kind?>" />
		<input type="hidden" id="start_duration" name="start_duration" value="<?=$start_duration?>" />
		<input type="hidden" id="end_duration" name="end_duration" value="<?=$end_duration?>" />

		<?php if($d['theme']['search']):?>
		<select name="where">
		<option value="add1|add2|add3|add4|add5|add6|add7|add8|add9|add10|add11" <?php if($where=='add1|add2|add3|add4|add5|add6|add7|add8|add9|add10|add11'):?> selected="selected"<?php endif?>>전체</option>
		<option value="add3"<?php if($where=='add3'):?> selected="selected"<?php endif?>>고객명</option>
		<option value="add2"<?php if($where=='add2'):?> selected="selected"<?php endif?>>담당자</option>
		</select>
		
		<input type="text" name="keyword" size="30" value="<?php echo $_keyword?>" class="input" />
		<input type="submit" value=" 검색 " class="btngray" />
		<?php endif?>
		</form>
	</div>

</div>
<pre>

</pre>