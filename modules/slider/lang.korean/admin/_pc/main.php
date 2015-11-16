<?php $sitecode=$sitecode?$sitecode:"maldives"?>
<label for="sitecode">사이트 선택</label>
<select id="sitecode" name="sitecode" onchange="location.href='<?php echo RW("m=".$m."&amp;module=".$module."&amp;sitecode=")?>'+this.value">
	<option value="maldives"<?php if($sitecode=="maldives"):?> selected<?php endif?>>하이몰디브</option>
	<option value="newtrevia"<?php if($sitecode=="newtrevia"):?> selected<?php endif?>>트레비아</option>
</select>
<hr />
<form name="formSlider" action="<?php echo $g['s']?>/" method="post" target="_action_frame_<?php echo $m?>" enctype="multipart/form-data">
<input type="hidden" name="r" value="<?php echo $r?>" />
<input type="hidden" name="m" value="<?php echo $module?>" />
<input type="hidden" name="a" value="update" />
<input type="hidden" name="sitecode" value="<?php echo $sitecode?>" />
<ol id="slider">
	<?php for($i=0; $i<10; $i++):?>
	<?php $R=getDbData($table['sliderdata'],"seq=".$i." AND sitecode='$sitecode'", "*")?>
	<li>
		<p>
			<? if ( $R['imgsrc'] ) { ?>
				<img src="/modules/slider/var/files/<?php echo $R['imgsrc']?>" height="200" />
			<? } ?>	
		</p>
		<p>
			<input type="checkbox" name="view[<?php echo $i?>]" id="view[<?php echo $i?>]" style="width:50px;" <? if($R['view']) {?> checked <?}?>>
			<label for="imgsrc[<?php echo $i?>]">이미지</label>
			<input type="file" id="imgsrc[<?php echo $i?>]" name="imgsrc[<?php echo $i?>]" />
			<?php if($R['imgsrc']):?>
			<a href="<?php echo $g['s']?>/?r=<?php echo $r?>&m=admin&module=filemanager&front=main&editmode=Y&pwd=./modules/<?php echo $module?>/var/files/&file=<?php echo $R['imgsrc']?>" target="_blank" title="<?php echo $R['imgsrc']?>" class="u">파일수정</a>
			<a href="<?php echo $g['r']?>/?m=<?php echo $module?>&amp;a=delete&amp;seq=<?php echo $R['seq']?>&amp;sitecode=<?php echo $sitecode?>" target="_action_frame_<?php echo $m?>" class="u" onclick="return confirm('정말로 삭제하시겠습니까?     ');">삭제</a>
			<?php endif?>
		</p>
		<p>
			<label for="url[<?php echo $i?>]">URL</label>
			<input type="text" id="url[<?php echo $i?>]" name="url[<?php echo $i?>]" value="<?php echo $R['url']?>" />
		</p>
		<p>
			<label for="title[<?php echo $i?>]">Title</label>
			<input type="text" id="title[<?php echo $i?>]" name="title[<?php echo $i?>]" value="<?php echo $R['title']?>" />
		</p>
		<p>
			<label for="content[<?php echo $i?>]">Content</label>
			<textarea type="text" id="content[<?php echo $i?>]" name="content[<?php echo $i?>]" style="width:300px;height:100px;"><?php echo $R['content']?></textarea>
		</p>
		<hr />
	</li>
	<?php endfor?>
</ol>
<p class="controls">
	<input type="submit" value="저장">
</p>