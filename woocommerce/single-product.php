<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$detailLayouts = get_theme_mod('ovez_detail_layouts', 'vertical');

if(isset($_GET['detail-layouts'])){
    $detailLayouts=$_GET['detail-layouts'];
}

$container='container';
if($detailLayouts=='carousel' || $detailLayouts=='carousel-left'){
        $container='container-full';
}

get_header( 'shop' ); ?>
	<div class="<?php echo esc_attr($container);?> detail-content clearfix">
		<?php do_action('woo-sidebar-detail-left'); ?>
		<?php do_action('woo-content-detail-before'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'single-product/layouts/content-single-product', $detailLayouts ); ?>
		<?php endwhile; // end of the loop. ?>
		<?php do_action('woo-content-detail-after'); ?>
		<?php do_action('woo-sidebar-detail-right'); ?>
	</div>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
