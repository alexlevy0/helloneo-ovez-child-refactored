<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;
$add_class='paging_numbers';
$typePagination  = get_theme_mod('ovez_woo_pagination',false);
if($typePagination){
    $add_class='paging_loadMore';
}
if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>

    <nav class="paging <?php echo esc_attr($add_class);?>">
        <?php
        echo str_replace("<ul class='page-numbers'>", '<ul class="pagination">', paginate_links( apply_filters( 'woocommerce_pagination_args', array(
            'base'         	=> esc_url( str_replace( 999999999, '%#%', remove_query_arg( array( 'add-to-cart', 'shop_load', '_', 'infload', 'ajax_filters' ), get_pagenum_link( 999999999, false ) ) ) ),
            'format' 		=> '',
            'current' 		=> max( 1, get_query_var('paged') ),
            'total' 		=> $wp_query->max_num_pages,
            'prev_text' 	=> '<i class="ion-ios-arrow-left"></i>',
            'next_text' 	=> '<i class="ion-ios-arrow-right"></i>',
            'type'			=> 'list',
            'end_size'		=> 3,
            'mid_size'		=> 3
        ) ) ));
        ?>
    </nav>
    <div class="infload-link"><?php next_posts_link( '&nbsp;' ); ?></div>
    <?php if($typePagination):?>
        <div class="infload-controls">
            <a href="#" id="loadShop" class="infload-btn"><?php esc_html_e( '... Load More ...', 'ovez' ); ?></a>
            <a href="#" class="infload-to-top hidden"><?php esc_html_e( 'All products loaded.', 'ovez' ); ?></a>
        </div>
    <?php endif;?>
