<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
global $woocommerce_loop;
global $wp_query;

$cate   = get_queried_object();
//number products on the row is 4
$col = get_theme_mod('ovez_woo_product_per_row','4');
$ovez_layout_product      =   get_theme_mod('ovez_layout_product','grid');

if(isset($_GET['col'])){
    $col=$_GET['col'];
}
if(isset($_GET['layout-product'])){
    $ovez_layout_product=$_GET['layout-product'];
}
if($ovez_layout_product == 'list'){
    $col='1';
}

?>

<ul class="products-block row affect-isotope clearfix"
    data-col="<?php echo esc_attr($col);?>"
    data-paged="<?php echo esc_attr($wp_query->max_num_pages);?>"
    >
