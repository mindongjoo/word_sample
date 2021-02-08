<?php /* Template Name: 블로그 리스트 페이지  */ ?>

<?php get_header(); ?>    
    <h1 id="blog_head">news</h1>   
     <article> 
     <h2><?php the_title(); ?></h2>  	    
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts = query_posts("cat=1&posts_per_page=5&paged=$paged");
            if (have_posts()) : while (have_posts()) : the_post(); 
			?>

               <h3 class="blogtitle">
               <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
               </h3>
               <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
               <div class="bloglist">  
               <?php the_post_thumbnail(array(120,120), array('class' => 'alignleft')); ?>              
               <?php my_excerpt(55); ?>              
               </div>

            <?php  endwhile;  endif;?>           
            <?php wp_pagenavi(); ?> 
            <?php wp_reset_query(); ?>                    
    	</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>