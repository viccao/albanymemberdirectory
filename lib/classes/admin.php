<?php

/** Admin Settings */

// Editor Styles

function wpdocs_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/admin/css/styles.min.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


if(!function_exists('old_fashioned_admin_styles')) {
function old_fashioned_admin_styles() {
//wp_enqueue_style( 'admin', get_template_directory_uri() . '/admin/css/styles.min.css', false, 'all' );
//wp_enqueue_script( 'admin', get_template_directory_uri() . '/admin/js/scripts.js', array( 'jquery' ), 'all' );
}

add_action( 'admin_enqueue_scripts', 'old_fashioned_admin_styles' );
add_action( 'login_enqueue_scripts', 'old_fashioned_admin_styles' );
}


/** old_fashioned Admin Theme Function **/
if(!function_exists('add_favicon')) {
function add_favicon() {
      $favicon_url = get_template_directory_uri() . '/admin/img/favicon.ico';
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

// Now, just make sure that function runs when you're on the login page and admin pages
//add_action('login_head', 'add_favicon');
//add_action('admin_head', 'add_favicon');
}

//add_action('init', 'old_fashioned_admin_settings');
function old_fashioned_admin_settings() {
    if (function_exists('acf_add_options_page')) {
        $page = acf_add_options_page(array(
            'menu_title' => 'Admin Settings',
            'menu_slug' => 'admin-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }

}
//add_action('init', 'acf_fields_admin');
function acf_fields_admin() {
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
    'key' => 'group_58921d3dedafd',
    'title' => 'FIWI Admin Settings',
    'fields' => array (
        array (
            'placement' => 'top',
            'endpoint' => 0,
            'key' => 'field_58921d6f0db2f',
            'label' => 'WP Admin Bar',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'key' => 'field_58921d490db2d',
            'label' => 'Admin Bar Logo',
            'name' => 'admin_bar_logo',
            'type' => 'image',
            'instructions' => 'Transparent White 1:1 Logo Works Best',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'placement' => 'top',
            'endpoint' => 0,
            'key' => 'field_58921d7c0db30',
            'label' => 'WP Login',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'key' => 'field_58921d870db31',
            'label' => 'WP Login Logo',
            'name' => 'wp_login_logo',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),

    ),
    'location' => array (
        array (
            array (
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'admin-settings',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

endif;
}


$user = get_current_user_id();


if($user != 1){

//add_action( 'admin_init', 'remove_superadmin_level' );



function remove_superadmin_level(){

  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
//  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  remove_menu_page( 'options-general.php' );        //Settings
  remove_menu_page( 'admin.php?page=aiowpsec' );        //Settings
  remove_menu_page( 'admin.php?page=pagespeed' );        //Settings
  remove_menu_page( 'admin.php?page=pmxe-admin-export' );        //Settings
  remove_menu_page( 'admin.php?page=pmxi-admin-import' );        //Settings
  remove_menu_page( 'admin.php?page=gadash_settings' );        //Settings
  remove_menu_page( 'admin.php?page=server-settings' );        //Settings
  remove_menu_page( 'edit.php?post_type=acf-field-group' );        //Settings
  remove_menu_page( 'admin.php?page=all-in-one-seo-pack%2Faioseop_class.php' );        //Settings
}

function remove_pu_menus() {?>

<style>
    li#toplevel_page_aiowpsec, li#toplevel_page_pagespeed, li#toplevel_page_pmxe-admin-home, li#toplevel_page_pmxi-admin-home, li#toplevel_page_gadash_settings, li#toplevel_page_admin-settings, li#toplevel_page_server-settings {

        display: none;
    }
</style>
<?php }

// Now, just make sure that function runs when you're on the login page and admin pages
//add_action('admin_head', 'remove_pu_menus');

}
