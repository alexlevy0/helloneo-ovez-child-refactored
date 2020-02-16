<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

    <p><?php
        /* translators: 1: order number 2: order date 3: order status */
        printf(
            esc_html__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'ovez' ),
            '<mark class="order-number">' . $order->get_order_number() . '</mark>',
            '<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>',
            '<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>'
        );
        ?></p>

<?php if ( $notes = $order->get_customer_order_notes() ) :
	?>
    <div class="featured-box align-left">
        <div class="box-content">
            <h2><?php esc_html_e( 'Order Updates', 'ovez' ); ?></h2>
            <ol class="commentlist notes">
                <?php foreach ( $notes as $note ) : ?>
                <li class="comment note">
                    <div class="comment_container">
                        <div class="comment-text">
                            <p class="meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'ovez' ), strtotime( $note->comment_date ) ); ?></p>
                            <div class="description">
                                <?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
	<?php
endif;

do_action( 'woocommerce_view_order', $order_id );
