<?php
/**
 * Plugin Name: WP Plugin
 * Plugin URI: https://github.com/shamsbd71/wp-plugin
 * Description: Add a description of what your plugin does - this will be shown on the plugins admin page.
 * Version: 1.0
   Author: Abu Huraira
   Author URI: https://github.com/shamsbd71
 */

// So let’s say you want to create a function for a call to action button, and then add it in multiple places in your theme.
// call it from your theme <?php wpmudev_cta(); >
function wpmudev_cta() {

  $test = '<div class="cta">';
    $test .= '<p>Call us on 000-0000 or email <a href="mailto:sales@example.com">sales@example.com</a></p>';
  $test .= '</div>';
  apply_filters( 'mytheme_cta', $test );

}

function wpmudev_cta_change() {

  $test = '<p>Changed from Filter</p>';
  apply_filters( 'mytheme_cta', $test );

}


add_action( 'mytheme_sidebar', 'wpmudev_cta' );
add_action( 'mytheme_below_content', 'wpmudev_cta' );

add_filter( 'mytheme_cta', 'wpmudev_cta_change' ); 



function wpmudev_cta_shortcode() {
  ob_start(); ?> 
  <div class="cta">
    <p>Call us on 000-0000 or email <a href="mailto:sales@example.com">sales@example.com</a></p>
  </div>
  <?php	return ob_get_clean();
}
add_shortcode( 'CTA', 'wpmudev_cta_shortcode' );