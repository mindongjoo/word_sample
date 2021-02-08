<?php /* Template Name:회사소개  템플릿  */ ?>

<?php get_header(); the_post(); ?>

   <h1 id="company_head">about company</h1>            
    <article>
    	
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>	
    
    </article> 
<?php get_sidebar(company); ?>     
<?php get_footer(); ?>