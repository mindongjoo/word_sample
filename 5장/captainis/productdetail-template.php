<?php /* Template Name:제품 상세  템플릿  */ ?>

<?php get_header(); the_post(); ?>
<h1 id="pro_head">products</h1>  
 <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	    <h2><?php $parent_title = get_the_title($post->post_parent); echo $parent_title; ?></h2>
           <div id="book_detail">
		      <h3><?php the_title(); ?></h3>
                <figure><img src="<?php echo get_post_meta($post-> ID, 'big-image', true); ?>"></figure>
                <ul>
                  <li><span>출간일 :</span> <?php echo get_post_meta($post-> ID, 'publish', true); ?></li>
                  <li><span>정 가 :</span> <?php echo get_post_meta($post-> ID, 'price', true); ?> </li>
                  <li><span>저 자 :</span> <?php echo get_post_meta($post-> ID, 'writer', true); ?></li> 
                  <li><span>ISBN :</span> <?php echo get_post_meta($post-> ID, 'isbn', true); ?></li>  
                  <li><span>쪽수 :</span> <?php echo get_post_meta($post-> ID, 'pages', true); ?></li> </li> 
                  <li><span>규격 :</span> <?php echo get_post_meta($post-> ID, 'dimension', true); ?></li> </li>                </ul>
           <div class="clear"></div>
			 <?php the_content(); ?>
         </div>	
		</article>
<?php get_sidebar(products); ?>     
<?php get_footer(); ?>