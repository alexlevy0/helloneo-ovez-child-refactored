<?php
/**
 * The template for displaying pages
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();

$ovez_title     = get_post_meta(get_the_ID(), 'ovez_show_title',true);
?>
<div class="container">
    <div class="row">
        <div class="site-main page-content col-sm-12" role="main">
                <?php if( ($ovez_title=== '1') || ($ovez_title=='')){
                    the_title( '<h1 class="page-title">', '</h1>' );
                }?>
                <?php
                while ( have_posts() ) : the_post();?>
                    <?php get_template_part( 'content', 'page' );
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile;
                ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>