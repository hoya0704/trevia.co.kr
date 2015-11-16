<div class="guide">
<span class="b">디테일한 설정을 통해 나만의 디자인을 완성할 수 있습니다.</span><br /><br />
홈페이지 제목을 변경하거나 이미지로고,배경이미지 등을 설정할 수 있습니다.<br />
아래의 설정을 통해 더 보기좋은 디자인을 완성해 보세요.<br /> 
변경사항이 적용되지 않을 경우 새로고침해 주세요.<br /> 
</div>

<form name="themeForm" method="post" action="<?php echo $g['s']?>/" enctype="multipart/form-data" onsubmit="return configCheck1(this);">
<input type="hidden" name="r" value="<?php echo $r?>" />
<input type="hidden" name="_layoutAction" value="config" />
<input type="hidden" name="nowLayout" value="<?php echo $d['layout']['dir']?>" />
<input type="hidden" name="changeType" value="<?php echo $_themeConfig?>" />

<table>
<tr>
<td class="t1">홈페이지 제목</td>
<td class="t2">:</td>
<td class="t3">
	<input type="text" name="title" class="input" value="<?php echo $d['layout']['title']?>" /> 색상코드 
	<input type="text" name="title_color" id="title_color_" class="input sf1" value="<?php echo $d['layout']['title_color']?>" maxlength="7" />
	<img src="<?php echo $g['img_core']?>/_public/btn_color.gif" class="hand" alt="" onclick="getLayerBox('<?php echo $g['s']?>/_core/opensrc/colorjack/color.php?color=<?php echo substr($d['layout']['title_color'],1,6)?>&dropf=title_color_&callback=colorChange','색상선택',220,260,event,'','r');" /> 
	<span class="small">(공백:기본값)</span>
</td>
</tr>
<tr>
<td class="t1">제목 여백(상/하)</td>
<td class="t2">:</td>
<td class="t3"><input type="text" name="title_t" class="input sf" value="<?php echo $d['layout']['title_t']?>" maxlength="3" />/<input type="text" name="title_b" class="input sf" value="<?php echo $d['layout']['title_b']?>" maxlength="3" /> 픽셀</td>
</tr>

<tr>
<td class="t1">메뉴출력 옵션</td>
<td class="t2">:</td>
<td class="t3">
	<input type="text" name="homestr" class="input sf1" value="<?php echo $d['layout']['homestr']?>" />
	<label><input type="checkbox" name="homestr_use" value="1"<?php if($d['layout']['homestr_use']):?> checked="checked"<?php endif?> />출력</label> / 대메뉴 
	<select name="menunum">
	<?php for($i = 1; $i < 11; $i++):?>
	<option value="<?php echo $i?>"<?php if($d['layout']['menunum']==$i):?> selected="selected"<?php endif?>><?php echo $i?>개</option>
	<?php endfor?>
	</select>
	<span class="small">(개 이상일 경우 생략)</span>
</td>
</tr>

<tr>
<td class="t1">멤버링크 색상</td>
<td class="t2">:</td>
<td class="t3">
	<input type="text" name="memberlink_color" id="memberlink_color_" class="input sf1" value="<?php echo $d['layout']['memberlink_color']?>" />
	<img src="<?php echo $g['img_core']?>/_public/btn_color.gif" class="hand" alt="" onclick="getLayerBox('<?php echo $g['s']?>/_core/opensrc/colorjack/color.php?color=<?php echo substr($d['layout']['memberlink_color'],1,6)?>&dropf=memberlink_color_&callback=colorChange','색상선택',220,260,event,'','r');" />
	<span class="small">(공백:기본값)</span>
</td>
</tr>
<tr>
<td class="t1">메인메뉴 색상</td>
<td class="t2">:</td>
<td class="t3">
	<input type="text" name="mainmenu_color" id="mainmenu_color_" class="input sf1" value="<?php echo $d['layout']['mainmenu_color']?>" />
	<img src="<?php echo $g['img_core']?>/_public/btn_color.gif" class="hand" alt="" onclick="getLayerBox('<?php echo $g['s']?>/_core/opensrc/colorjack/color.php?color=<?php echo substr($d['layout']['mainmenu_color'],1,6)?>&dropf=mainmenu_color_&callback=colorChange','색상선택',220,260,event,'','r');" />
	
	선택된 메뉴 
	<input type="text" name="mainmenu_color1" id="mainmenu_color1_" class="input sf1" value="<?php echo $d['layout']['mainmenu_color1']?>" />
	<img src="<?php echo $g['img_core']?>/_public/btn_color.gif" class="hand" alt="" onclick="getLayerBox('<?php echo $g['s']?>/_core/opensrc/colorjack/color.php?color=<?php echo substr($d['layout']['mainmenu_color1'],1,6)?>&dropf=mainmenu_color1_&callback=colorChange','색상선택',220,260,event,'','r');" />
	<span class="small">(공백:기본값)</span>
</td>
</tr>
<tr>
<td class="t1">이미지 로고</td>
<td class="t2">:</td>
<td class="t3">
<input type="file" name="upfile" class="file" value="" />
<input type="checkbox" name="imglogo_use" value="1"<?php if($d['layout']['imglogo_use']):?> checked="checked"<?php endif?> />사용함
</td>
</tr>

<?php if(is_file($g['path_layout'].$d['layout']['dir'].'/_var/'.$d['layout']['imglogo'])):?>
<tr>
<td class="t1">로고사이즈 조정</td>
<td class="t2">:</td>
<td class="t3">
<input type="text" name="imglogo_w" class="input sf" value="<?php echo $d['layout']['imglogo_w']?>" maxlength="3" />*<input type="text" name="imglogo_h" class="input sf" value="<?php echo $d['layout']['imglogo_h']?>" maxlength="3" /> 픽셀
</td>
</tr>
<tr>
<td></td>
<td></td>
<td class="t3">
<br />
<img src="<?php echo $g['s'].'/layouts/'.$d['layout']['dir'].'/_var/'.$d['layout']['imglogo']?>" width="<?php echo $d['layout']['imglogo_w']?>" height="<?php echo $d['layout']['imglogo_h']?>" alt="" style="background:#000000;" />
<br /><br />
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;_layoutAction=logodelete&amp;&imgType=logo&amp;nowLayout=<?php echo $d['layout']['dir']?>" onclick="return hrefCheck(this,true,'정말로 삭제하시겠습니까?');">이 로고를 삭제하기</a>
<br />
<br />
</td>
</tr>
<?php endif?>

<tr>
<td class="t1">헤더 배경이미지</td>
<td class="t2">:</td>
<td class="t3">
<input type="file" name="upfile1" class="file" value="" />
<input type="checkbox" name="bgtitle_use" value="1"<?php if($d['layout']['bgtitle_use']):?> checked="checked"<?php endif?> />배경 이미지/CSS 사용함
</td>
</tr>
<tr>
<td class="t1">헤더 배경CSS</td>
<td class="t2">:</td>
<td class="t3">
<input type="text" name="bgtitle_o" id="bgtitle_o" class="input" value="<?php echo $d['layout']['bgtitle_o']?>" />
<a href="#." onclick="getId('bgtitle_o').value='top center repeat #ffffff';getId('bgtitle_o').focus();">기본값(반복)</a>
<a href="#." onclick="getId('bgtitle_o').value='top center no-repeat #ffffff';getId('bgtitle_o').focus();">상단 무반복</a>
<a href="#." onclick="getId('bgtitle_o').value='center center no-repeat #ffffff';getId('bgtitle_o').focus();">중앙 무반복 </a>
<a href="#." onclick="getId('bgtitle_o').value='bottom center no-repeat #ffffff';getId('bgtitle_o').focus();">하단 무반복</a>
</td>
</tr>
<?php if(is_file($g['path_layout'].$d['layout']['dir'].'/_var/'.$d['layout']['bgtitle'])):?>
<tr>
<td></td>
<td></td>
<td class="t3">
<br />
<img src="<?php echo $g['s'].'/layouts/'.$d['layout']['dir'].'/_var/'.$d['layout']['bgtitle']?>" width="205" alt="" />
<br /><br />
<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&amp;_layoutAction=logodelete&amp;imgType=bg&amp;nowLayout=<?php echo $d['layout']['dir']?>" onclick="return hrefCheck(this,true,'정말로 삭제하시겠습니까?');">이 배경 삭제하기</a>

</td>
</tr>
<?php endif?>


<tr>
<td></td>
<td></td>
<td><br /><br /><input type="submit" value=" 변경하기 " class="btnblue" /></td>
</tr>
</table>

</form>
