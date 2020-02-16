<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global  $post;
$product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );

$woo_facebook = get_theme_mod('ovez_woo_share_facebook',false);
$woo_twitter = get_theme_mod('ovez_woo_share_twitter',false);
$woo_pinterest = get_theme_mod('ovez_woo_share_pinterest',false);
$woo_google = get_theme_mod('ovez_woo_share_google',false);
$woo_linkedin = get_theme_mod('ovez_woo_share_linkedin',false);

if($woo_facebook || $woo_pinterest): ?>
    <div class="product-share-wrap">
        <div class="product-share">
            <?php if($woo_facebook) : ?>
                <a href="//www.facebook.com/sharer.php?u=<?php echo  esc_url( get_permalink() ); ?>" target="_blank" title="<?php esc_attr_e( 'Share on Facebook', 'ovez' ); ?>"><i class="ion-social-facebook"></i></a>
            <?php endif; ?>
            <?php if($woo_twitter) : ?>
                <a href="//twitter.com/share?url=<?php echo  esc_url( get_permalink() ); ?>" target="_blank" title="<?php esc_attr_e( 'Share on Twitter', 'ovez' ); ?>"><i class="ion-social-twitter"></i></a>
            <?php endif; ?>
            <?php if($woo_pinterest) : ?>
                <a href="//pinterest.com/pin/create/button/?url=<?php echo  esc_url( get_permalink() ); ?>&amp;media=<?php echo esc_url( $product_image[0] ); ?>&amp;description=<?php echo urlencode( get_the_title() ); ?>" target="_blank" title="<?php esc_attr_e( 'Pin in Pinterest', 'ovez' ); ?>"><i class="ion-social-pinterest"></i></a>
            <?php endif; ?>
            <?php if($woo_google): ?>
                <a href="//plus.google.com/share?url=<?php echo  esc_url( get_permalink() ); ?>" class="googleplus" title="<?php echo esc_attr__(' Share on Google +', 'ovez'); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="ion-social-googleplus"></i>
                </a>
            <?php endif; ?>
            <?php if($woo_linkedin) : ?>
                <a href="//www.linkedin.com/shareArticle?mini=true&url=<?php echo  esc_url( get_permalink() ); ?>&title=<?php echo esc_html__('Share on Pinterest', 'ovez'); ?>&summary=<?php echo get_the_title(); ?>&source=<?php echo get_the_title(); ?>">
                    <i class="ion-social-linkedin"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
