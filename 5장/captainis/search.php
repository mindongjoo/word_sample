<?php get_header(); ?>

	<article class="src_rslt" <?php post_class() ?> id="post-<?php the_ID(); ?>" >
		<h2>검색 결과</h2>
		
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>                   
        <?php my_excerpt(25); ?>	

		<?php endwhile; else : ?>
			<h3>페이지를 찾을 수 없습니다.</h3>
		<?php endif; ?>
         </article>

<?php get_footer(); ?>
