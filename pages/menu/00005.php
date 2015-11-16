<div style="margin-left:4px;">
<form method="post" name="form" enctype="multipart/form-data" onsubmit="return SendFormCheck(this);" action="<?php echo $g['s']?>/pages/menu/mail_send.php">


<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 9')):?>
<div id="sub_coop">
<?php elseif (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')||strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')):?>
<div id="sub_coop5">
<?php elseif (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')):?>
<div id="sub_coop2">
<?php elseif (strstr($_SERVER['HTTP_USER_AGENT'],'Firefox')):?>
<div id="sub_coop4">
<?php else:?>
<div id="sub_coop3">
<?php endif?>
<table><tr>
<td class="select1">
	<select  name="site" class="select11" size="1">
		<option value="" selected>==제휴사이트를 선택 하세요==
		<option value="www.himaldives.co.kr">www.himaldives.co.kr
		<option value="www.trevia.co.kr">www.trevia.co.kr
		<option value="www.hibali.net">www.hibali.net
		
	</select>
	<?php if (strstr($_SERVER['HTTP_USER_AGENT'],'MSIE')):?>
	</td><td class="select2">
	<?php elseif (strstr($_SERVER['HTTP_USER_AGENT'],'Windows NT')):?>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<?php elseif (strstr($_SERVER['HTTP_USER_AGENT'],'Mac OS X')):?>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<?php else:?>
	</td><td class="select2">
	<?php endif?>
	<select  name="site2" class="select21" size="1">
		<option value="" selected>==제휴구분을 선택 하세요==
		<option value="여행상품 제휴">여행상품 제휴
		<option value="마케팅 제휴">마케팅 제휴
		<option value="판매 제휴">판매 제휴
		<option value="콘텐츠 제휴">콘텐츠 제휴
		<option value="기타 제휴">기타 제휴
	</select>
</td>
</tr></table>
<div><input type="text" name="subject" class='subject1'></div>
<div><textarea name="content"  rows="10" cols="126" class='area1' wrap='hard'></textarea></div>
<div><input type="file" name="userfile[]" class="file1" onchange="checkFile(this)"></div>

<span><input name="sel"  type="radio" value="공공기관" checked="checked" class="radio1"/>공공기관</span>
<span><input name="sel"  type="radio" value="기업" class="radio2" />기업</span>
<span><input name="sel"  type="radio" value="개인" class="radio2" />개인</span>
<span><input name="sel"  type="radio" value="기타" class="radio2" />기타</span>

<div><input type="text" name="company" class="input1"></div>
<div><input type="text" name="from_name" class="input2"></div>
<div><input type="text" name="tel"  class="input2"></div>
<div><input type="text" name="from" class="input2"></div> 
<div><input type="file" name="userfile[]" size="30" class="file2" onchange="checkFile(this)"></div>
<div><input type="text" name="homepage"  class="input1"></div>
<div><input type="text" name="fax"  class="input2"></div>

 </div> 
 
  <center>
  <span><a href="http://www.Trevia.co.kr/?r=Trevia&c=5"><img src="<?php echo $g['s']?>/pages/image/subimg/reset.gif" alt="Reset" /></a></span> 
 <span><input type="image" src="<?php echo $g['s']?>/pages/image/subimg/submit.gif" alt="Submit" /></span>

 </center>
</form>
<!--
<script type="text/javascript">
       var defCharset=document.charset;

       function doSubmit() {
               if (/MSIE/.test(navigator.userAgent)) {
                       document.charset = 'euc-kr';
               }
               document.form.submit();

               document.charset=defCharset;
       }
</script>
-->
</div>