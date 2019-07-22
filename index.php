<?php
/**
 * Template Name: Home
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Smores
 * @since Smores 2.0
 */
?>

<?php get_template_part('templates/header'); ?>



        <section id="primary" class="">
                <div id="content" class="container" role="main">

                    <div class="row">

                        <div class="mx-auto logo"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo-albany.svg"></div>
                    </div>

                   <div class="container-fluid">

                            <header class="page-header">

                                <div class="row">
                                    <div class="col-sm-8 col-10 mx-auto">

                                        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
                                        <?php the_content();?>

                                        <?php endwhile; endif; ?>

                     <?php if ( !post_password_required() ) :?>

                                        <h1 class="page-title text-center mb-5">Confirming your Member Number is easy.</h1>

                                            <?php echo get_search_form();?>

                                                <?php if ( have_posts() ) : ?>



                                                <h3 class="page-title text-center"><?php printf( __( 'Member Number Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>


                                                <?php  endif;?>

                                    </div>
                                </div>
                            </header>

                            <div class="results">
                     <?php if ( !post_password_required() ) :?>

                            <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>


                               <p><?php the_field('member_id');?><span><?php the_title();?></span></p>
                            <?php endwhile; ?>
                            </div>

                    <?php  endif; endif;?>


                        </div>
                    </div>

            <?php else : ?>

            <?php endif; ?>

        </section><!-- #primary .content-area -->




<?php get_template_part('templates/footer'); ?>
