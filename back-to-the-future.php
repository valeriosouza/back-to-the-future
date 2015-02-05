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
add_shortcode('backfutureend', 'shortcode_back_to_the_future_end' );

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
		'post_status' => array( 'publish', 'future' ),
	), $atts ) );

	return "<?php $args = array(  	
						'post_type' => {$post_type}, 
						'post_status' => array( 'publish', 'future' )
								);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>";
}

function shortcode_back_to_the_future_end() {
            return '<?php endwhile; wp_reset_query();?>';
}
?>
