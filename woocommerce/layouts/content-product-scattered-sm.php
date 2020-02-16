<?php
global $product;
$ovez_woo_cart      =   get_theme_mod( 'ovez_woo_cart',false);
$ovez_woo_price     =   get_theme_mod( 'ovez_woo_price',true);
$add_class="no-cart";
if ($ovez_woo_cart){ $add_class='show-cart'; }
?>
<div class="product-block product-scattered product-scattered-sm product inner-product-content">
    <figure class="caption-image product-image">
        <?php
        do_action( 'woocommerce_before_shop_loop_item' );
            do_action( 'ovez_scattered_sm_before_shop_loop_item_title' );
        do_action( 'woocommerce_after_shop_loop_item' );
        ?>
        <div class="button-groups clearfix">
            <?php do_action('ovez_yith_wishlist' );?>
        </div>
    </figure>
    <div class="caption-product <?php echo esc_attr($add_class);?>">
        <div class="caption">
            <h3 class="product-name">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <?php if ($ovez_woo_price):?>
                <div class="product-price">
                    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                </div>
            <?php endif;?>
        </div>
        <?php if ($ovez_woo_cart):?>
            <div class="ground-addcart">
                <?php do_action( 'woocommerce_add_to_cart_item' ); ?>
            </div>
        <?php endif;?>
    </div>
</div>