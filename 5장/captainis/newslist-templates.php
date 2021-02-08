<?php /* Template Name: 뉴스 리스트 페이지  */ ?>

<?php get_header(); ?>    
    <h1 id="news_head">news</h1>   
     <article> 
     <h2><?php the_title(); ?></h2>  	    
       <ul id="news_content">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts = query_posts("cat=5&posts_per_page=5&paged=$paged");
            if (have_posts()) : while (have_posts()) : the_post(); 
			?>
            <li>
               <h3 class="news_title">
               <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
               </h3>
               <?php include (TEMPLATEPATH . '/inc/meta-news.php' ); ?>
               <div class="clear"></div>
               <?php my_excerpt(45); ?>
            </li>
            <?php  endwhile;  endif;?> 
		</ul>            
            <?php wp_pagenavi(); ?> 
            <?php wp_reset_query(); ?>                    
    	</article>
<?php get_sidebar(news); ?>
<?php get_footer(); ?>