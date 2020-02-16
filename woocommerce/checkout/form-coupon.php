<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! WC()->cart->coupons_enabled() ) {
    return;
}

$info_message = apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'ovez' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'ovez' ) . '</a>' );?>

<div class="col-md-5">
    <div class="woocommerce_checkout_coupon">
        <?php wc_print_notice( $info_message, 'notice' ); ?>

        <form class="checkout_coupon ovez-coupon" method="post" style="display:none">
            <div class="coupon input-group">
                <input type="text" placeholder="<?php echo esc_attr__('Coupon code','ovez')?>" value="" id="coupon_code" class="input-text form-control" name="coupon_code">

                <span class="input-group-btn">
                    <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'ovez' ); ?>" />
                </span>
            </div>
            <div class="clear"></div>
        </form>
    </div>
</div>
