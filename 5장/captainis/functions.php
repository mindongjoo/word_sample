<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
	//excerpt 서로 다른 길이로 조정할때.
	function my_excerpt($excerpt_length = 55, $id = false, $echo = true) {
	  
    $text = '';
    
	  if($id) {
	  	$the_post = & get_post( $my_id = $id );
	  	$text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
	  } else {
	  	global $post;
	  	$text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
    }
	  
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
	  $text = strip_tags($text);
	
		$excerpt_more = ' ' . '...';
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		} else {
			$text = implode(' ', $words);
		}
	if($echo)
  echo apply_filters('the_content', $text);
	else
	return $text;
}

function get_my_excerpt($excerpt_length = 55, $id = false, $echo = false) {
 return my_excerpt($excerpt_length, $id, $echo);
}

// 포스트 썸네일 작동 
add_theme_support('post-thumbnails');
if ( function_exists('add_theme_support') ) {add_theme_support('post-thumbnails');}


//function to call and print shortened post title
function the_title_shorten($len,$rep='...') {
        $title = the_title('','',false);
        $shortened_title = strcut_utf8($title, $len, $rep);
        print $shortened_title;
}

// UTF-8인 경우 문자열 자르기 
function strcut_utf8($str, $len, $checkmb=false, $tail=' ...') {
    /**
     * UTF-8 Format
     * 0xxxxxxx = ASCII, 110xxxxx 10xxxxxx or 1110xxxx 10xxxxxx 10xxxxxx
     * latin, greek, cyrillic, coptic, armenian, hebrew, arab characters consist of 2bytes
     * BMP(Basic Mulitilingual Plane) including Hangul, Japanese consist of 3bytes
     **/
    preg_match_all('/[\xE0-\xFF][\x80-\xFF]{2}|./', $str, $match); // target for BMP
    $m = $match[0];
    $slen = strlen($str); // length of source string
    $tlen = strlen($tail); // length of tail string
    $mlen = count($m); // length of matched characters
    if ($slen <= $len) return $str;
    if (!$checkmb && $mlen <= $len) return $str;
    $ret = array();
    $count = 0;
    for ($i=0; $i < $len; $i++) {
        $count += ($checkmb && strlen($m[$i]) > 1)?2:1;
        if ($count + $tlen > $len) break;
        $ret[] = $m[$i];
    }
    return join('', $ret).$tail;
}
?>