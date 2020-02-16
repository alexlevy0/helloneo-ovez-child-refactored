<?php

// Enqueue child theme styles
function ovez_child_theme_styles() {
    wp_enqueue_style( 'ovez-child-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'ovez-child-theme', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_script( 'instafeed-script', get_stylesheet_directory_uri() . '/instafeed.min.js');
}
add_action( 'wp_enqueue_scripts', 'ovez_child_theme_styles', 1000 );


// Register Page option

if( function_exists('acf_add_options_page') ) {
  $args_options = array(
  	'page_title' => 'Options',
  	'update_button'		=> __('Actualiser', 'acf'),
  	'updated_message'	=> __("Options mises à jour", 'acf'),
		'position' 				=> '59.3',
		'icon_url'  			=> 'dashicons-marker',
  );
	acf_add_options_page( $args_options );
}



function customizing_stock_availability_text( $availability, $product ) {
    if ( ! $product->is_in_stock() ) {
        $availability = __( 'Rupture de stock', 'woocommerce' );
    }
    elseif ( $product->managing_stock() && $product->is_on_backorder( 1 ) )
    {
        $availability = $product->backorders_require_notification() ? __( 'Rupture de stock', 'woocommerce' ) : '';
    }
    elseif ( $product->managing_stock() )
    {
        $availability = __( 'En stock', 'woocommerce' );
        $stock_amount = $product->get_stock_quantity();

        switch ( get_option( 'woocommerce_stock_format' ) ) {
            case 'low_amount' :
                if ( $stock_amount <= get_option( 'woocommerce_notify_low_stock_amount' ) ) {
                    /* translators: %s: stock amount */
                    $availability = sprintf( __( 'Bientôt épuisé !', 'woocommerce' ), wc_format_stock_quantity_for_display( $stock_amount, $product ) );
                }
            break;
            case '' :
                /* translators: %s: stock amount */
                $availability = sprintf( __( 'En stock', 'woocommerce' ), wc_format_stock_quantity_for_display( $stock_amount, $product ) );
            break;
        }

        if ( $product->backorders_allowed() && $product->backorders_require_notification() ) {
            $availability .= ' ' . __( 'Rupture de stock', 'woocommerce' );
        }
    }
    else
    {
        $availability = '';
    }

    return $availability;
}
add_filter( 'woocommerce_get_availability_text', 'customizing_stock_availability_text', 1, 2);



/* Redirects to the Orders List instead of Woocommerce My Account Dashboard */
function wpmu_woocommerce_account_redirect() {

  $current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $dashboard_url = get_permalink( get_option('woocommerce_myaccount_page_id'));

  if(is_user_logged_in() && $dashboard_url == $current_url){
    $url = get_home_url() . '/mon-compte/orders/';
    wp_redirect( $url );
    exit;
  }
}
add_action('template_redirect', 'wpmu_woocommerce_account_redirect');



/* Remove the Dashboard tab of the My Account Page */
function custom_my_account_menu_items( $items ) {
  unset($items['dashboard']);
  return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );
