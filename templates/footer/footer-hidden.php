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
<?php  if(get_theme_mod( 'ovez_footer_social' ,false)): ?>
    <div class="footer-vertical clearfix">
        <?php get_template_part('templates/social');?>
    </div>
<?php endif;?>