<?php
    global $product;
    $ovez_woo_cart   =   get_theme_mod( 'ovez_woo_cart',false);
    $ovez_woo_price  =   get_theme_mod( 'ovez_woo_price',true);
    if(isset($_GET['cart'])){
        $ovez_woo_cart=$_GET['cart'];
    }
?>
<div class="product-block product-list product inner-product-content">
        <figure class="caption-image product-image">
            <?php
                do_action( 'woocommerce_before_shop_loop_item' );
                    do_action( 'ovez_scattered_sm_before_shop_loop_item_title' );
                do_action( 'woocommerce_after_shop_loop_item' );
            ?>
        </figure>
        <div class="caption-product">
            <div class="caption clearfix">
                <h3 class="product-name">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <?php if ($ovez_woo_price):?>
                    <div class="product-price">
                        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                    </div>
                <?php endif;?>

                <div class="description-product">
                    <?php woocommerce_template_single_excerpt();?>
                </div>

            </div>
            <?php if ($ovez_woo_cart):?>
            <div class="ground-addcart ">
                <?php do_action( 'woocommerce_add_to_cart_item' ); ?>
            </div>
            <div class="button-groups clearfix">
                <?php do_action('ovez_yith_wishlist' );?>
            </div>
            <?php endif;?>
        </div>
</div>