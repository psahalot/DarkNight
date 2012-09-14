<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'AboutMe Child Theme' );
define( 'CHILD_THEME_URL', 'http://iampuneet.com/themes/about-me/' );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'add_viewport_meta_tag' );
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add JS for backstretch background image **/ 
add_action( 'wp_enqueue_scripts', 'ps_child_script' );
function ps_child_script() {
	wp_enqueue_script( 'backstretch-bg', get_stylesheet_directory_uri() . '/lib/js/jquery.backstretch.min.js', array( 'jquery' ) , '1.0.0' );
}


/** remove all genesis layouts except for full width layout **/
/** Unregister layout settings */
genesis_unregister_layout( 'content-sidebar' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'full-width' );

add_filter( 'genesis_pre_get_option_site_layout', 'child_do_layout' );
/**
 * Force layout
 *
 * @author Greg Rickaby
 * @since 1.0.0
 */
function child_do_layout( $opt ) {
    $opt = 'full-width-content'; // You can change this to any Genesis layout
    return $opt;
}

/** Remove Genesis Layout Settings */
remove_theme_support( 'genesis-inpost-layouts' );

/** Unregister secondary navigation menu */
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );	

/** Remove Footer */
remove_action( 'genesis_footer', 'genesis_do_footer' );

/** Add support for custom background */
add_theme_support('custom-background');

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 100 ) );

/** Add js for backgorund **/
function ps_background_js() { ?>
<script type="text/javascript">
jQuery(function($){
     $(window).resize(function(){
         if($(this).width() >= 767){
             $.backstretch("<?php echo get_stylesheet_directory_uri(); ?>/images/bg.jpg", {speed: 150});
         }
      })
      .resize();//trigger resize on page load
});
</script>
<?php }
add_action('wp_footer','ps_background_js');