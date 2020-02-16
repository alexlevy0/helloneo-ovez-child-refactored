<?php
/**
 * The template for displaying the footer
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?>
<footer id="na-footer" class="na-footer  footer-1">
    <!--    Footer center-->
    <?php  if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )){ ?>
        <div class="footer-center clearfix">
            <div class="container">
                <div class="container-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <!--    Footer bottom-->
    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="container-inner">
                <div class="row">

                    <?php  if(get_theme_mod( 'ovez_footer_social' ,false)): ?>
                        <div class="col-md-6 col-sm-6  col-xs-12 footer-bottom-left">
                            <div class="footer-bottom-inner">
                                <?php if(get_theme_mod('ovez_copyright_text')) {?>
                                    <span><?php echo  wp_kses_post(get_theme_mod('ovez_copyright_text'));?></span>
                                <?php } else {
                                    echo '<span>'.esc_html('&copy; Copyrights ','ovez').' '.date("Y").'<a href="'.esc_url('http://ovez.nanoagency.co').'">'.esc_html('  Ovez theme. ','ovez').'</a></span>';
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 footer-bottom-right">
                            <?php get_template_part('templates/social');?>
                        </div>
                    <?php else:?>
                        <div class="col-md-12 col-sm-12">
                            <div class="footer-bottom-center">
                                <?php if(get_theme_mod('ovez_copyright_text')) {?>
                                    <span><?php echo  wp_kses_post(get_theme_mod('ovez_copyright_text'));?></span>
                                <?php } else {
                                    echo '<span>'.esc_html('&copy; Copyrights ','ovez').' '.date("Y").'<a href="'.esc_url('http://ovez.nanoagency.co').'">'.esc_html('  Ovez theme. ','ovez').'</a></span>';
                                } ?>
                            </div><!-- .site-info -->
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

</footer><!-- .site-footer -->
