=== Back to the Future ===
Contributors: valeriosza, aliascomunicacao
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P5QTGDB64SU8E&lc=US&item_name=WordPress%20Plugins&no_note=0&cn=Adicionar%20instru%c3%a7%c3%b5es%20especiais%20para%20o%20vendedor%3a&no_shipping=1&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: future post, future post type, schedule post, schedule post type, future shows, scheduled shows, event post, future post, future event post, future, events, event, schedule, Post, posts, page, pages, post type
Requires at least: 1.5
Tested up to: 4.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allow you show Future or Scheduled Post on Single Posts.

== Description ==

* Displays future/scheduled posts on single.php(Single Post Template)
* Enables comments for future/scheduled posts

== Installation ==

1. Upload 'back-to-the-future.php' to the /wp-content/plugins/ directory
2. Go to the Plugins page in your WordPress Admin area and click 'Activate' for Back to the Future

== Frequently Asked Questions ==

= How to show future/schedules post? =

On your template, just simply add the string 'post_status=future' to your WP_Query

Example: WP_Query('post_status=future');

	$args = array(  'post_type' => 'post_type', 
					'post_status' => array( 'publish', 'future' )
				);

				$loop = new WP_Query( $args );

				while ( $loop->have_posts() ) : $loop->the_post(); 



This displays all future and published posts.

== Screenshots ==

1. Post scheduled for 21 October 2015, the date movie Back to the future.

== For Developers ==

On your template, just simply add the string 'post_status=future' to your WP_Query

Example: WP_Query('post_status=future');

	$args = array(  'post_type' => 'post_type', 
					'posts_per_page' => '-99',
					'post_status' => array( 'publish', 'future' )
				);

				$loop = new WP_Query( $args );

				while ( $loop->have_posts() ) : $loop->the_post(); 



This displays all future and published posts.

== Changelog ==

= 1.0 - 29/01/2015 =
* Initial Release.

== Upgrade Notice ==

= 1.0 - 29/01/2015 =
* Initial Release.


== License ==

Back to the Future is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

Back to the Future is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with Back to the Future. If not, see <http://www.gnu.org/licenses/>.
