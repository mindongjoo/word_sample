<?php get_header(); ?>
	<h1 id="news_head">news</h1>       
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h2 class="n_title"><?php the_title(); ?></h2>
            <?php include (TEMPLATEPATH . '/inc/meta-news.php' ); ?>			
			<div class="entry-content">            
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>							

			</div>
			
			<?php edit_post_link('Edit this entry','','.'); ?>
			
		</article>	

	<?php endwhile; endif; ?>
	
<?php get_sidebar(news); ?>

<?php get_footer(); ?>