<?php
/**
 * My Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', esc_html__( 'My Addresses', 'ovez' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => esc_html__( 'Billing Address', 'ovez' ),
		'shipping' => esc_html__( 'Shipping Address', 'ovez' )
	), $customer_id );
} else {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', esc_html__( 'My Address', 'ovez' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  esc_html__( 'Billing Address', 'ovez' )
	), $customer_id );
}

$col = 1;
?>
<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><?php echo esc_attr($page_title); ?></h2></div>
    <div class="panel-body">
        <p class="myaccount_address">
            <?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html__( 'The following addresses will be used on the checkout page by default.', 'ovez' ) ); ?>
        </p>
    </div>
</div>
<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '<div class="col2-set addresses">'; ?>

<?php foreach ( $get_addresses as $name => $title ) : ?>

	<div class="col-<?php echo ( ( $col = $col * -1 ) < 0 ) ? 1 : 2; ?> address">
        <div class="panel panel-default">
            <div class="panel-heading">
                <header class="title clearfix">
                    <h3 class="pull-left panel-title"><?php echo esc_attr($title); ?></h3>
                    <a href="<?php echo wc_get_endpoint_url( 'edit-address', $name ); ?>" class="edit pull-right"><?php esc_html_e( 'Edit', 'ovez' ); ?></a>
                </header>
            </div>
            <div class="panel-body">
                <address>
                    <?php
                    $address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
                        'first_name'  => get_user_meta( $customer_id, $name . '_first_name', true ),
                        'last_name'   => get_user_meta( $customer_id, $name . '_last_name', true ),
                        'company'     => get_user_meta( $customer_id, $name . '_company', true ),
                        'address_1'   => get_user_meta( $customer_id, $name . '_address_1', true ),
                        'address_2'   => get_user_meta( $customer_id, $name . '_address_2', true ),
                        'city'        => get_user_meta( $customer_id, $name . '_city', true ),
                        'state'       => get_user_meta( $customer_id, $name . '_state', true ),
                        'postcode'    => get_user_meta( $customer_id, $name . '_postcode', true ),
                        'country'     => get_user_meta( $customer_id, $name . '_country', true )
                    ), $customer_id, $name );

                    $formatted_address = WC()->countries->get_formatted_address( $address );

                    if ( ! $formatted_address )
                        esc_html_e( 'You have not set up this type of address yet.', 'ovez' );
                    else
                        echo  ent2ncr($formatted_address);
                    ?>
                </address>
            </div>
        </div>
	</div>

<?php endforeach; ?>

<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '</div>'; ?>
