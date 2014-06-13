<?php

/*
Plugin Name: GYP Extreme Turbo Pagination
Plugin URI: https://github.com/kharissulistiyo/WP-Smart-Pagination
Description: Improve your WordPress powered blog pagination with extra input number where users can jump to any (x) page.
Author: Kharis Sulistiyono (forked by Rob Welch)
Version: 0.2
Author URI: http://kharissulistiyo.github.io
*/

// Function

if ( ! function_exists( 'wp_smart_pagination' ) ) :
	function wp_smart_pagination() {
		global $wp_query;
?>

		
<!--		<form class="wpsp-page-nav-form" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="get">
			<label for="sortby" class="wpsp-label wpsp-hidden"><?php _e('Go to', 'wp-smart-pagination'); ?></label>
			<input class="wpsp-input-number" type="text" placeholder="Jump to" size="6" name="paged" />
			<input class="wpsp-button" value="Go" type="submit" > 
		</form>
-->
		<form id="jump-to-page-form" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="get">
	        <input type="text" id="jump-to-page" placeholder="Jump to page" size="12" />
	        <input type="submit" id="jump-to-page-submit" hidefocus="true" />
    	</form>
	
<?php	
	
	}
endif;


// Shortcode

add_shortcode( 'wpsp', 'wp_smart_pagination' );

?>