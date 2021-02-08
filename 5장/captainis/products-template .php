<?php /* Template Name: 제품 소개 템플릿  */ ?>

<?php get_header(); the_post(); ?>

   <h1 id="pro_head">products</h1>            
    <article>    	
	<h2><?php the_title(); ?></h2>
	<?php  the_content(); ?>	    
    </article> 
<?php get_sidebar(products); ?>     
<?php get_footer(); ?>