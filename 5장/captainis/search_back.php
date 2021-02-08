<?php get_header(); ?>


	<article class="src_rslt" <?php post_class() ?> id="post-<?php the_ID(); ?>" >
    
    	<h2 class="pagetitle">검색어  
		<?php /* Search Count */ 
		$allsearch = &new WP_Query("s=$s&showposts=-1"); 
		$key = wp_specialchars($s, 1); 
		$count = $allsearch->post_count; _e(''); _e('<span class="search-terms">');
		 echo $key; _e('</span>'); _e(' &nbsp;  '); echo $count . ''; _e('개의 페이지'); 
		wp_reset_query(); ?></h2>        
        
		<?php query_posts($query_string.'&page=ID&posts_per_page=5'); ?>
       	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
             			
              <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
               <?php the_post_thumbnail(array(80,80), array('class' => 'alignleft3')); ?>              
               <a href="<?php the_permalink() ?>"><?php my_excerpt(55); ?></a>          


            <?php  endwhile; ?>                
			<?php wp_pagenavi(); ?> 
            <?php wp_reset_query(); ?> 
               
   	</article>

	<?php else : ?>

		<h3>검색 결과를 찾을 수 없습니다.</h3>

	<?php endif; ?>



<?php get_footer(); ?>
