<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
$ovez_layout_product      =   get_theme_mod('ovez_layout_product','grid');
$ovez_woo_padding         =   get_theme_mod( 'ovez_woo_product_padding',false);

if(isset($_GET['layout-product'])){
    $ovez_layout_product=$_GET['layout-product'];
}

if(isset($_GET['col-padding'])){
    $ovez_woo_padding=$_GET['col-padding'];
}

$add_class='';
if($ovez_woo_padding){
    $add_class='no-padding';
}
?>

<li <?php post_class('col-xs-6 col-sm-4 col-lg-3 '.$add_class); ?>>
    <?php wc_get_template_part( 'layouts/content-product',$ovez_layout_product); ?>
</li>
