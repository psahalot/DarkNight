<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'AboutMe Child Theme' );
define( 'CHILD_THEME_URL', 'http://iampuneet.com/themes/about-me/' );

/** child theme layout and other functions */
require_once('lib/child-functions.php');

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'add_viewport_meta_tag' );
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}


/** reposition primary navigation **/
remove_action('genesis_after_header','genesis_do_nav');
add_action('genesis_before','genesis_do_nav');


/** Unregister layout settings */
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );


/** Remove Genesis Layout Settings */
remove_theme_support( 'genesis-inpost-layouts' );

/** Unregister secondary navigation menu */
// add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );	


/** Add support for custom background */
add_theme_support('custom-background');

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 100 ) );
