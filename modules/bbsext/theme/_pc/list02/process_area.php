<?

$area = $_POST['area'];

$dbconnect = mysql_connect("localhost", "trevia", "trevia6681") or die(mysql_error()); 
$mysql = mysql_select_db("trevia") or die(mysql_error());
mysql_query("set names utf8;");

?>

<option value="0">없음</option>
			<option value="999999999">신규</option>
			<?		
			if( "몰디브" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='2' and bbsid='resort' and display='1' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[몰디브] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "칸쿤" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' and category='칸쿤' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[칸쿤] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "미주허니문" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='미주허니문' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[미주허니문] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "리비에라마야" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='7' and bbsid='resort' and display='1' and category='리비에라마야' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[리비에라마야] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "발리" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='5' and bbsid='resort' and display='1' and category='발리' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[발리] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "하와이" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='하와이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[하와이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "세이셀" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='8' and bbsid='resort' and display='1' and category='세이셀' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[세이셀] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "코사무이" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='4' and bbsid='resort' and display='1' and category='코사무이' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[코사무이] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>

			<?				
			if( "모리셔스" == $area ) {

				$m_sql4 = mysql_query("SELECT * FROM rb_bbs_data where site='10' and bbsid='resort' and display='1' and category='모리셔스' order by uid desc");
				while($m_rs4 = mysql_fetch_array($m_sql4)):
				?>	
					<option value="<?=$m_rs4[uid]?>">[모리셔스] <?=$m_rs4[subject]?></option>
				<?endwhile;
			}?>