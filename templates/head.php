<?php
/**
 * The template for displaying the header
 *
 * @package Smores
 * @since Smores 2.0
 */
?>
<!doctype html>

<html class="no-js" <?php language_attributes(); ?> id="returnTop">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="<?php bloginfo('description') ?>" />
  <meta name="author" content="Findsome &amp; Winmore" />
  <meta name="Copyright" content="<?php echo date('Y'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-touch-fullscreen" content="yes" />
  <?php get_template_part('partials/meta', 'favicons'); ?>

    <?php

        /*
         * Wordpress Head
         */

        wp_head();

    ?>
</head>

<body <?php body_class() ?>>
<?php get_template_part('partials/notice', 'outdated'); ?>

