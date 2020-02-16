<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<?php
wc_print_notices();
do_action('woocommerce_checkout_nav');
do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <div class="row">
        <div class="col-md-7 page-cart">

            <?php do_action( 'woocommerce_before_cart_table' ); ?>
            <table class="shop_table shop_table_responsive cart" cellspacing="0">
                <thead>
                <tr>
                    <th class="product-thumbnail"><?php esc_html_e( 'Product', 'ovez' ); ?></th>
                    <th class="product-name">&nbsp;</th>
                    <th class="product-price">&nbsp;</th>
                    <th class="product-quantity"><?php esc_html_e( 'Quantity', 'ovez' ); ?></th>
                    <th class="product-subtotal"><?php esc_html_e( 'Total', 'ovez' ); ?></th>
                    <th class="product-remove">&nbsp;</th>

                </tr>
                </thead>
                <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        ?>
                        <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">



                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                if ( ! $_product->is_visible() ) {
                                    echo  ent2ncr($thumbnail);
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
                                }
                                ?>
                            </td>

                            <td class="product-name" data-title="<?php esc_html_e( 'Product', 'ovez' ); ?>">
                                <?php
                                if ( ! $_product->is_visible() ) {
                                    echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
                                } else {
                                    echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
                                }

                                // Meta data
                                echo wc_get_formatted_cart_item_data( $cart_item );

                                // Backorder notification
                                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                    echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'ovez' ) . '</p>';
                                }
                                ?>
                            </td>

                            <td class="product-price" data-title="<?php esc_html_e( 'Price', 'ovez' ); ?>">
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                ?>
                            </td>

                            <td class="product-quantity" data-title="<?php esc_html_e( 'Quantity', 'ovez' ); ?>">
                                <?php
                                if ( $_product->is_sold_individually() ) {
                                    $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                } else {
                                    $product_quantity = woocommerce_quantity_input( array(
                                        'input_name'  => "cart[{$cart_item_key}][qty]",
                                        'input_value' => $cart_item['quantity'],
                                        'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                        'min_value'   => '0'
                                    ), $_product, false );
                                }

                                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                ?>
                            </td>

                            <td class="product-subtotal" data-title="<?php esc_html_e( 'Total', 'ovez' ); ?>">
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                ?>
                            </td>

                            <td class="product-remove">
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_html__( 'Remove this item', 'ovez' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
                                ), $cart_item_key );
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                }

                do_action( 'woocommerce_cart_contents' );
                ?>
                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                </tbody>
            </table>

            <?php do_action( 'woocommerce_after_cart_table' ); ?>
            <p class="return-to-shop">
                <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                    <?php esc_html_e( 'Return to shop', 'ovez' ) ?>
                </a>
            </p>
            <div class="wc-btn-updatecart">
                <input type="submit" class="btn-updatecart" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'ovez' ); ?>" />
            </div>

        </div>
        <div class="col-md-5">
            <div class="ovez-coupon">
                <div class="actions">

                    <?php if ( wc_coupons_enabled() ) { ?>
                        <div class="coupon input-group">

                            <span for="coupon_code" class="input-group-addon"><?php esc_html_e( 'Coupon', 'ovez' ); ?>:</span>
                            <input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'ovez' ); ?>" />
                            <span class="input-group-btn">
                                <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'ovez' ); ?>" />
                            </span>
                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                        </div>
                    <?php } ?>

                    <?php do_action( 'woocommerce_cart_actions' ); ?>

                    <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                </div>
            </div>
            <div class="cart-collaterals">
                <?php do_action( 'woocommerce_cart_collaterals' ); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 collaterals">
            <?php do_action('woo_cart_collaterals'); ?>
        </div>
    </div>
</form>



<?php do_action( 'woocommerce_after_cart' ); ?>