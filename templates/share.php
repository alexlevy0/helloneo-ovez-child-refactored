<?php
/**
 * @package     Over
 * @version     0.1
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$share_facebook     = get_theme_mod('ovez_share_facebook',false);
$share_twitter      = get_theme_mod('ovez_share_twitter',false);
$share_google       = get_theme_mod('ovez_share_google',false);
$share_linkedin     = get_theme_mod('ovez_share_linkedin',false);
$share_pinterest    = get_theme_mod('ovez_share_pinterest',false);
?>
<?php if ($share_facebook || $share_twitter || $share_google):?>
<div class="entry-footer-social clearfix">
    <div class="entry-footer-right">
        <div class="social share-links clearfix"">


                <div class="count-share">
                    <span><?php echo esc_html__("Share :",'ovez');?></span>
                    <ul class="social-icons list-unstyled list-inline">
                        <?php if ($share_facebook):?>
                        <li class="social-item facebook">
                            <a href="http://www.facebook.com/sharer.php?url=<?php the_permalink(); ?>" title="<?php echo esc_attr__('facebook', 'ovez'); ?>" class="post_share_facebook facebook" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;">
                                <i class="ion-social-facebook"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ($share_twitter):?>
                        <li class="social-item twitter">
                            <a href="https://twitter.com/share?url=<?php the_permalink(); ?>" title="<?php echo esc_attr__('twitter', 'ovez'); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter twitter">
                                <i class="ion-social-twitter"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ($share_google):?>
                        <li class="social-item google">
                            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="googleplus" title="<?php echo esc_attr__('google +', 'ovez'); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="ion-social-googleplus"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ($share_linkedin):?>
                        <li class="social-item linkedin">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php echo esc_attr__('pinterest', 'ovez'); ?>&summary=<?php echo get_the_title(); ?>&source=<?php echo get_the_title(); ?>">
                                <i class="ion-social-linkedin"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ($share_pinterest):?>
                            <li class="social-item pinterest">
                                <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" title="<?php echo esc_attr__('pinterest', 'ovez'); ?>" class="pinterest">
                                    <i class="ion-social-pinterest"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

        </div>
    </div>
</div>
<?php endif; ?>

