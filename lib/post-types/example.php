<?php
// Example custom post type

 $properties = new CPT(
     array(
         'post_type_name' => 'memberid',
         'singular'       => 'Member ID',
         'plural'         => 'Member IDs',
         'slug'           => 'member-id',
     ),
     array(
         'supports' => array(
             'title'
         ),
         'public' => true,
         'show_ui' => true,

     )
 );

 $properties->menu_icon("dashicons-admin-users");
