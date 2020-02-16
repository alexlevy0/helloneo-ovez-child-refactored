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
<footer id="na-footer" class="na-footer  footer-2">
    <!--    Footer bottom-->
    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <?php  if(is_active_sidebar( 'footer-hoz' ) ): ?>
                        <div class="col-md-9 col-sm-12">
                            <?php dynamic_sidebar('footer-hoz'); ?>
                        </div>
                        <div class="col-md-3 col-sm-12 sm-copyright-text-center">
                            <div class="footer-bottom-inner">
                                <?php if(get_theme_mod('ovez_copyright_text')) {?>
                                    <span><?php echo  wp_kses_post(get_theme_mod('ovez_copyright_text'));?></span>
                                <?php } else {
                                    echo '<span>'.esc_html('&copy; Copyrights ','ovez').' '.date("Y").'<a href="'.esc_url('http://ovez.nanoagency.co').'">'.esc_html('  Ovez theme. ','ovez').'</a></span>';
                                } ?>
                            </div>
                            <?php  if(get_theme_mod( 'ovez_footer_social' ,false)): ?>
                                    <?php get_template_part('templates/social');?>
                            <?php endif;?>
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