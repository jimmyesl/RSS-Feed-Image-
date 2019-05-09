
<?php

// -----------------------------------------------------------------------------
//! Setup
// -----------------------------------------------------------------------------

	
/** Add new image sizes */
    add_image_size( 'rss_image', 300, 150, true );
   




function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '' . get_the_post_thumbnail( $post->ID, 'rss_image', array( 'style' => 'float:left; margin:0 15px 15px 0;' ) ) . '' . $content;
}
return $content;
}

add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');

// Remove srcset for RSS Feed


if (is_feed()) { add_filter( 'wp_calculate_image_srcset_meta', '__return_empty_array' );}


?>
