<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}?>
<?php if ( $order ) : ?>

    <?php if ( $order->has_status( 'failed' ) ) : ?>

        <p class="woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'ovez' ); ?></p>

        <p class="woocommerce-thankyou-order-failed-actions">
            <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="btn btn-default pay"><?php esc_html_e( 'Pay', 'ovez' ) ?></a>
            <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="btn btn-default pay"><?php esc_html_e( 'My Account', 'ovez' ); ?></a>
            <?php endif; ?>
        </p>

    <?php else : ?>
        <div class="thankyou-order">
            <p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'ovez' ), $order ); ?></p>
        </div>
        <div class="thankyou-order-details">
            <ul class="woocommerce-thankyou-order-details order_details clearfix">
                <li class="order">
                    <?php esc_html_e( 'Order Number:', 'ovez' ); ?>
                    <strong><?php echo  esc_html($order->get_order_number()); ?></strong>
                </li>
                <li class="date">
                    <?php esc_html_e( 'Date:', 'ovez' ); ?>
                    <strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->get_date_created() ) ); ?></strong>
                </li>
                <li class="total">
                    <?php esc_html_e( 'Total:', 'ovez' ); ?>
                    <strong><?php echo ent2ncr($order->get_formatted_order_total()); ?></strong>
                </li>
                <?php if ( $order->get_payment_method_title() ) : ?>
                    <li class="method">
                        <?php esc_html_e( 'Payment Method:', 'ovez' ); ?>
                        <strong><?php echo  esc_html($order->get_payment_method_title()); ?></strong>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="clear"></div>

    <?php endif; ?>
    <div class="thankyou-order-payment-details">
        <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
        <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
    </div>
<?php else : ?>

    <p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'ovez' ), null ); ?></p>

<?php endif; ?>
