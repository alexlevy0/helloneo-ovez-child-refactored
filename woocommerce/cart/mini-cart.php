<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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

<?php do_action( 'woocommerce_before_mini_cart' ); ?>
<div class="cart_container uk-offcanvas-bar uk-offcanvas-bar-flip" data-text-emptycart="<?php esc_html_e( 'No products in the cart.', 'ovez' ); ?>">
    <div class="cart-panel">
        <div class="cart-header">
            <div class="cart-panel-title clearfix">
                <span class="mycart pull-left"><?php esc_html_e('My Cart','ovez');?></span>
                <span class="close pull-right"><i class="ion-ios-close-empty"></i></span>
            </div>

        </div>
        <div id="cart-panel-loader" class="">
            <h5 class="loader"><?php esc_html_e('Updating ...','ovez');?></h5>
        </div>
        <div class="cart_list">

                <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

									<ul class="product_list_widget">
                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                            ?>
                            <li class="media">
                                <a href="<?php echo get_permalink( $product_id ); ?>" class="cart-image">
                                    <?php echo  ent2ncr($thumbnail); ?>
                                </a>
                                <div class="cart-main-content">
                                    <div class="name">
                                        <a href="<?php echo get_permalink( $product_id ); ?>">
                                            <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );; ?>
                                        </a>
                                    </div>
                                    <p class="cart-item">
                                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ) ) . '</span>', $cart_item, $cart_item_key ); ?>
                                    </p>
                                </div>
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" data-cart-item-key="%s" class="product_remove remove" title="%s"><i class="ion-ios-close-empty"></i></a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    $cart_item_key,
                                    esc_html__( 'Remove product', 'ovez' )
                                ), $cart_item_key );
                                ?>

                            </li>
                        <?php
                        }
                    }
                    ?>

									</ul><!-- end product list -->

                <?php else : ?>

									<?php
									$img_ce = get_field('image_cart_empty', 'options');
									$texte_ce = get_field('texte_cart_empty', 'options');
									?>

									<div class="empty-cart-block text-center">
										<?php if ($img_ce) : ?>
											<img src="<?php echo $img_ce['url']; ?>" alt="<?php echo $img_ce['alt']; ?>">
										<?php endif; ?>
										<?php echo $texte_ce; ?>
										<a class="btn btn-primary" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php esc_html_e( 'Découvrez notre e-shop', 'ovez' ); ?></a>
									</div>



                <?php endif; ?>

        </div>
        <div class="cart-bottom">
            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

            <p class="total clearfix"><strong><?php esc_html_e( 'Subtotal', 'ovez' ); ?>:</strong><span class="mini-cart-subtotal"><?php echo WC()->cart->get_cart_subtotal(); ?></span></p>

            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

            <p class="buttons clearfix">
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-inverse"><?php esc_html_e( 'View Cart', 'ovez' ); ?></a>
                <a href="javascript:void(0);" class="btn btn-variant continue"><?php esc_html_e( 'Continuer mes achats', 'ovez' ); ?></a>
            </p>


						<script>
						jQuery(function($){
						  $(document).ready(function(){
								$("a.continue").click(function(){
								    $('body').toggleClass('cart-box-open');
										$('.canvas-overlay').toggleClass('show');
								});
						  });
						});
					  </script>

        <?php endif; ?>
        </div>
    </div>
</div>
