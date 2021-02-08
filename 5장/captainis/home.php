<?php get_header(); ?>
<div id="main-content">
    <div class="slider-wrapper theme-default"> 
	<div id="slider" class="nivoSlider">
		<img src="images/banner/banner1.jpg">
        <img src="images/banner/banner2.jpg">
        <img src="images/banner/banner3.jpg">
    </div>
    </div>
    <div id="news">
    	<h2>최신뉴스  </h2>
          <ul>
			<?php 
			   $first_query = new WP_Query('cat=5&posts_per_page=5'); 
    		   while($first_query->have_posts()) : $first_query->the_post(); 
			 ?>
           <li>
             <a href="<?php the_permalink() ?>" <?php the_title_attribute(); ?>">
  				<?php the_title_shorten(37) ?>
             </a>
           </li>
           <?php  endwhile; wp_reset_query(); ?>
            </ul>
    </div>
    <div id="blog_post">
    	<h2>최신 블로그 포스트 </h2>
        <?php 
		   $second_query = new WP_Query('cat=1&posts_per_page=1'); 
           while($second_query->have_posts()) : $second_query->the_post(); 
		?>
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>	
           <?php the_post_thumbnail(array(60,60), array('class' => 'alignleft2')); ?>   			         
     		<a href="<?php the_permalink() ?>"><?php my_excerpt(8); ?> </a> 
        <?php  endwhile;  wp_reset_query(); ?>
		  </div>
    <div id="customer">
        <img src="images/banner1.gif" alt="고객지원센터" >
    </div>

<?php get_footer(); ?>
