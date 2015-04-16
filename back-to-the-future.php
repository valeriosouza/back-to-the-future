<?php
/*
 * Plugin Name: Back to the Future
 * Author URI: http://www.valeriosouza.com.br
 * Plugin URI: https://github.com/valeriosouza/back-to-the-future
 * Description: Allow future posts to be visible.
 * Author: Valerio Souza
 * Version: 1.0
 */

add_filter('the_posts', 'show_future_posts_back_to_the_future');

add_shortcode('backfuture', 'shortcode_back_to_the_future' );

add_filter( 'plugin_row_meta', 'show_future_posts_plugin_row_meta', 10, 4 );

function show_future_posts_back_to_the_future($posts)
{
   global $wp_query, $wpdb;

   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }

   return $posts;
}

function shortcode_back_to_the_future( $atts, $content ) {
	extract( shortcode_atts( array(
		'post_type' => 'post',
		'posts_per_page' => '-99',
		'orderby' => 'menu_order',
		'thumbsize' => 'thumbnail',
		'post_status' => array( 'publish', 'future' ),
	), $atts ) );
	$output = '<div class="clear"></div><div class="back_to_the_future_posts"><ul>';
	$args = array(  	
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,  
			'orderby' => $orderby,  
			'post_status' => $post_status
	);
	$back_loop = new WP_Query( $args );
	while ( $back_loop->have_posts() ) : $back_loop->the_post(); 
		$output .= '<div id="back_post">'.
					get_the_post_thumbnail($thumbsize).
					'<h2 class="back_title">'.
					get_the_title().
					'</h2>'.
					get_the_excerpt().
					'<a class="read-more" href="'.
                   get_permalink().
                   '">'.__('Read More', 'back_to_the_future').'</a></div><!--  ends here -->';
	endwhile;
    wp_reset_query();
    $output .= '</ul></div>';
	return $output;
}

function show_future_posts_plugin_row_meta( $links, $file ) {
		if( plugin_basename( __FILE__ ) === $file ) {
			$links[] = sprintf(
				'<a target="_blank" href="%s">%s</a>',
				esc_url('http://valeriosouza.com.br/en/donate/'),
				__( 'Donate', 'back_to_the_future' )
			);
		}
		return $links;
	}
?>
