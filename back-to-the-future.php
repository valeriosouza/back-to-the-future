<?php
/*
 * Plugin Name: Back to the Future
 * Author URI: http://www.valeriosouza.com.br
 * Plugin URI: https://github.com/valeriosouza/back-to-the-future
 * Description: Allow future posts to be visible.
 * Author: Valerio Souza
 * Version: 1.0
 */

add_filter('the_posts', 'show_future_posts');

function show_future_posts($posts)
{
   global $wp_query, $wpdb;

   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }

   return $posts;
}
?>
