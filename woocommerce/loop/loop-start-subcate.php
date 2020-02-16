<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
global $woocommerce_loop;
global $wp_query;
global $nano_i;

$cate   = get_queried_object();
$nano_i =1;
//number products on the row is 4
$col = get_theme_mod('ovez_woo_product_per_row','4');
$display_type = get_option( 'woocommerce_shop_page_display', '' );
$subcate_woo = get_theme_mod('ovez_subcate_woo','cat-2');

if(isset($_GET['shop-type'])){
    $display_type=$_GET['shop-type'];
}
if(isset($_GET['col'])){
    $col=$_GET['col'];
}
if(isset($_GET['subcate-layout'])){
    $subcate_woo=$_GET['subcate-layout'];
}

?>

<?php if((($display_type == 'subcategories') || $display_type == 'both') && is_shop()):?>
    <ul class="cats-block row affect-isotope-cats <?php echo esc_attr($subcate_woo); ?> clearfix"
    data-col="2"
    data-paged="<?php echo esc_attr($wp_query->max_num_pages);?>"
    >
    <li class="grid-sizer"></li>
<?php else: ?>
<ul class="products-block row affect-isotope clearfix"
    data-col="<?php echo esc_attr($col);?>"
    data-paged="<?php echo esc_attr($wp_query->max_num_pages);?>"
    >
<?php endif ;?>