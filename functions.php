<?php
/**
 * Functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package OldFashioned
 * @since OldFashioned 2.0
 */

define("THEME_ROOT", get_stylesheet_directory());

// Composer dependencies
if(file_exists(__DIR__ . '/lib/vendor/autoload.php')){
} else {
    echo "<style>@import url(https://fonts.googleapis.com/css?family=Lato:300,400|Neuton:400,700,800);
    *{font-family:'Lato','sans-serif';box-sizing:border-box; text-align: center;}body{display:flex;min-height:100vh;flex-direction:column;text-align:center;align-items:center;justify-content:center;border-top:4px solid #eb3a24;margin:0;background:url(https://findsomewinmore.com/wp-content/themes/fiwi/images/bg.png) repeat}@media screen and (max-width: 1030px){.Site{padding:0 2rem}}.Site-content{flex:1;display:flex;justify-content:center;align-items:center}h1,h2,h3,h4,h5,h6{font-family:'Neuton',serif;color:#eb3a24}p{max-width:60ch;margin:2rem auto 0;line-height:1.5;color:#333}p a{color:#eb3a24}.logo-link{display:block}.main-logo{display:block;max-width:100%;padding-bottom:2rem}@media screen and (min-width: 1039px){a:hover{text-decoration:none}}</style>";
    die("<img src='https://findsomewinmore.com/wp-content/themes/fiwi/images/logo.png?230ae' alt='' class='main-logo'><h1>Woah there, partner.</h1><p>Looks like you forgot somethin'. Mosy on back to the terminal and run <pre style='font-family: monospace; font-size: 2rem;'>'composer install'</pre>. You're missing the file /lib/vendor/autoload.php</p>");
}
require_once __DIR__ . '/lib/vendor/autoload.php';

use OldFashioned\OldFashioned;
use OldFashioned\TopBarPageWalker;
use OldFashioned\TopBarWalker;


$OldFashioned = new OldFashioned(
    array( // Includes
        'lib/admin',         // Add admin scripts
        'lib/ajax',          // Add ajax scripts
        'lib/classes',       // Add classes
        'lib/custom-fields', // Add custom field scripts
        'lib/forms',         // Add form scripts
        'lib/images',        // Add images scripts
        'lib/post-types',    // Add post type scripts
        'lib/shortcodes',    // Add shortcode scripts
        'lib/widgets',       // Add widget scripts
    ),
    array( // Assets
        'css'             => '/dist/css/styles.min.css',
//        'css'             => '/dist/css/styles.min.clean.css',
        'js'              => '/dist/js/scripts.min.js',
        'modernizr'       => '/dist/js/vendor/modernizr.min.js',
        'jquery'          => '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.js',
        'jquery_fallback' => '/dist/js/vendor/jquery.min.js',
)
);


//Google Maps ACF API Key

//function my_acf_init() {
//
//    acf_update_setting('google_api_key', '');
//}
//
//add_action('acf/init', 'my_acf_init');

//Google Maps API Key

//function googlemaps_load_scripts()
//{
//    wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js&key=', null, null, false);
//    wp_enqueue_script('googlemaps');
//}
//add_action('wp_enqueue_scripts', 'googlemaps_load_scripts');

//Remove post types

if(!function_exists('remove_menus')) {
function remove_menus(){

//  remove_menu_page( 'index.php' );                  //Dashboard
//  remove_menu_page( 'jetpack' );                    //Jetpack*
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
//  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
//  remove_menu_page( 'themes.php' );                 //Appearance
//  remove_menu_page( 'plugins.php' );                //Plugins
//  remove_menu_page( 'users.php' );                  //Users
//  remove_menu_page( 'tools.php' );                  //Tools
//  remove_menu_page( 'options-general.php' );        //Settings

}


add_action( 'admin_menu', 'remove_menus' );
}


function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "<p class='text-center'>To search your Membership ID, enter the password below:</p>" ) . '<div class="row"><div class="col-sm-8 mx-auto"><input class="form-control" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" placeholder="Enter Password"/></div></div><div class="input-btn"><input type="submit" class="btn left" name="Submit" value="' . esc_attr__( "Submit" ) . '" /></div>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

add_filter( 'protected_title_format', 'remove_protected_text' );
function remove_protected_text() {
return __('%s');
}
