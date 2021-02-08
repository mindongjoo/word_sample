<?php 
	$post = $wp_query->post; if ( in_category('1') ) 
	{ include(TEMPLATEPATH . '/single-blog.php'); }
 	elseif ( in_category('5') ) { include(TEMPLATEPATH . '/single-news.php'); } 
  ?>