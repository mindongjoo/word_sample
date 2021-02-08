<?php get_header(); ?>

    <h1 id="blog_head">news</h1>   
	<article <?php post_class() ?>>
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2><?php the_time('F jS, Y'); ?> 글 모음 </h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2> <?php the_time(' Y, F'); ?> 글 모음</h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle">작성자 글모음 </h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle">블로그 글모음</h2>
			
			<?php } ?>
            
		
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$posts = query_posts("cat=-5&posts_per_page=5&paged=$paged"); 
			while (have_posts()) : the_post(); ?>			
				
               <h3 class="blogtitle">
               <a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
               </h3>
               <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
               <div class="bloglist">  
               <?php the_post_thumbnail(array(120,120), array('class' => 'alignleft')); ?>              
               <a href="<?php the_permalink() ?>"><?php my_excerpt(55); ?></a>          
               </div>
		

            <?php  endwhile;  endif;?>                
			<?php wp_pagenavi(); ?> 
            <?php wp_reset_query(); ?>  
	
    </article>  
     
<?php get_sidebar(); ?>
<?php get_footer(); ?>
