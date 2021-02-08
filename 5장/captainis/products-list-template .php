<?php /* 	Template Name: 제품 리스트 페이지  */?>
<?php get_header(); ?>
  <h1 id="pro_head">products</h1>     
	<article>
    <h2><?php the_title(); ?></h2>             
                
     	<?php 
		   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
		   $args=array(
		   'post_parent' => 293,
		   'post_type' => 'page', 
		   'meta_key'  => publish, 
		   'order' => 'DESC', 
		   'posts_per_page' => 3,
		   'paged'=>$paged 
		   ); 
		   query_posts($args);           
		   if(have_posts() ) while (have_posts()) :the_post(); ?>            
                    
            <div id='book'>
			  <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
			   <figure><?php echo "<img src='" . get_post_meta($post->ID, "s-image", true) . "' >"; ?></figure>
                <ul>
                    <li><span>출간일 :</span> <?php echo get_post_meta($post-> ID, 'publish', true); ?></li>
                    <li><span>정 가 :</span> <?php echo get_post_meta($post-> ID, 'price', true); ?></li>
                    <li><span>저 자 :</span> <?php echo get_post_meta($post-> ID, 'writer', true); ?></li>            
                </ul>
               <p><?php echo get_post_meta($post-> ID, 'txt', true);  ?> </p>
              
			</div>
            	
             <?php  endwhile;  ?>	 
             <?php wp_pagenavi(); ?>      
            <?php  wp_reset_query();  ?>  	
      </article>	

<?php get_sidebar(products); ?>
<?php get_footer(); ?>