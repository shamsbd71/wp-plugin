<?php
/**
 * Plugin Name: My Facebook Tags
 * Plugin URI: https://github.com/shamsbd71/wp-plugin
 * Description: This plugin adds some Facebook Open Graph tags to our single posts.
 * Version: 1.0.0
 * Author: Abu Huraira
 * Author URI: https://github.com/shamsbd71
 * License: GPL2
 */

add_action( 'wp_head', 'my_facebook_tags' );
function my_facebook_tags() {
  if( is_single() ) {
  ?>
    <meta property="og:title" content="<?php the_title() ?>" />
    <meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>" />
    <meta property="og:url" content="<?php the_permalink() ?>" />
    <meta property="og:description" content="<?php the_excerpt() ?>" />
    <meta property="og:type" content="article" />
    
    <?php 
      if ( has_post_thumbnail() ) :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
    ?>
      <meta property="og:image" content="<?php echo $image[0]; ?>"/>  
    <?php endif; ?>
    
  <?php
  }
}



add_action( 'publish_post', 'post_published_notification', 10, 2 );
function post_published_notification( $ID, $post ) {
    $email = get_the_author_meta( 'user_email', $post->post_author );
    $subject = 'Published ' . $post->post_title;
    $message = 'We just published your post: ' . $post->post_title . ' take a look: ' . get_permalink( $ID ); 
    wp_mail( $email, $subject, $message );
}


add_filter('login_errors','login_error_message');

function login_error_message( $error ){
    $error = "Incorrect login information, stay out!";
    return $error;
}


add_action( 'wp_enqueue_scripts', 'my_enqueued_assets' );

function my_enqueued_assets() {
	wp_enqueue_style( 'my-font', '//fonts.googleapis.com/css?family=Roboto' );
	wp_enqueue_script( 'my-script', plugin_dir_url( __FILE__ ) . '/js/my-script.js', array( 'jquery' ), '1.0', true );
}

add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
	add_menu_page('My Plugin Settings', 'Plugin Settings', 'administrator', 'my-plugin-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
}

function my_plugin_settings_page() {
  ?>
  <div class="wrap">
<h2><?php _e( 'Staff Details', 'my-staff-plugin' ) ?></h2>


<form method="post" action="options.php">
    <?php settings_fields( 'my-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-plugin-settings-group' ); ?>
    
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Accountant Name</th>
        <td><input type="text" name="accountant_name" value="<?php echo esc_attr( get_option('accountant_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Accountant Phone Number</th>
        <td><input type="text" name="accountant_phone" value="<?php echo esc_attr( get_option('accountant_phone') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Accountant Email</th>
        <td><input type="text" name="accountant_email" value="<?php echo esc_attr( get_option('accountant_email') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
  <?php
}

add_action( 'admin_init', 'my_plugin_settings' );

function my_plugin_settings() {
	register_setting( 'my-plugin-settings-group', 'accountant_name' );
	register_setting( 'my-plugin-settings-group', 'accountant_phone' );
	register_setting( 'my-plugin-settings-group', 'accountant_email' );
}