<?php get_header(); ?>
	<h1 id="blog_head">blog</h1>       
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h2 class="n_title"><?php the_title(); ?></h2>
            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>			
			<div class="entry-content">
                        
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>							

			</div>
			
			<?php edit_post_link('Edit this entry','','.'); ?>
			<?php comments_template(); ?>        

	<?php endwhile; endif; ?>
    </article>	
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>