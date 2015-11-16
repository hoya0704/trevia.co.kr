
</div>

<div id="footer">
	<div class="footer wrap">
		<div class="slinks">
			<div class="elink">
				<a href="<?php echo RW('mod=agreement')?>">홈페이지 이용약관</a> |
				<a href="<?php echo RW('mod=private')?>">개인정보 취급방침</a> |
				<a href="<?php echo RW('mod=postrule')?>">게시물 게재원칙</a>
			</div>
			<div class="copyright">
				Copyright &copy; <?php echo $date['year']?> <?php echo $_SERVER['HTTP_HOST']?> All rights reserved.
			</div>
		</div>
		<div class="powered">
			<div class="kimsq"><!-- 출력을 원치 않으실 경우 지우세요 -->Powered by kimsQ rb (Runtime <?php echo round(getNowTimes()-$g['time_start'],3)?>)</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
