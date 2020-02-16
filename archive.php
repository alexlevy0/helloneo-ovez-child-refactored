<?php
/**
 * The template for displaying Category pages
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$content_col         = get_theme_mod('ovez_cat_content_col', '2');

get_header();
?>

    <div class="wrap-content container" role="main">
        <?php do_action('archive-title'); ?>
        <div class="row content-category">
            <?php do_action('archive-sidebar-left'); ?>
            <?php do_action('archive-content-before'); ?>
            <?php if ( have_posts() ) : ?>
                <div class="row archive-blog column-<?php echo esc_attr($content_col)?>">
                    <div class="affect-isotope clearfix">
                        <?php get_template_part( 'loop' );?>
                    </div>
                </div>
            <?php  else :
                // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );
            endif; ?>

            <?php
            the_posts_pagination( array(
                'prev_text'          => '<i class="ion-ios-arrow-left"></i>',
                'next_text'          => '<i class="ion-ios-arrow-right"></i>',
                'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
            ) );
            ?>
            <?php do_action('archive-content-after'); ?>
            <?php do_action('archive-sidebar-right'); ?>
        </div>

    </div>

<?php get_footer();
