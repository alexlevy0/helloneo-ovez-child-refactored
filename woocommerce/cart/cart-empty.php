<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

/**
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>

<?php
$img_ce = get_field('image_cart_empty', 'options');
$texte_ce = get_field('texte_cart_empty', 'options');
?>


<div class="empty-cart-block">
	<div class="row">
		<div class="col-xs-12 col-sm-6 text">
			<?php echo $texte_ce; ?>
			<a class="btn btn-primary" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php esc_html_e( 'Découvrez notre e-shop', 'ovez' ); ?></a>
		</div>
		<div class="col-xs-12 col-sm-6">
			<?php if ($img_ce) : ?>
				<img src="<?php echo $img_ce['url']; ?>" alt="<?php echo $img_ce['alt']; ?>">
			<?php endif; ?>
		</div>
</div>

<?php endif; ?>
