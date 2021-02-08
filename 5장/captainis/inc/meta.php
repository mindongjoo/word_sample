<div class="meta">
	<span class="dfcolor">작성일:</span> <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_time('Y/m/d') ?></time>
	<span class="dfcolor">작성자 :</span> <?php the_author() ?>
	<?php comments_popup_link('댓글 없음', '1개의 댓글', '%개의 댓글', '댓글 링크', ''); ?>
</div>