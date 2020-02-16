<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$display_type = get_option( 'woocommerce_shop_page_display', '' );
$page_title = get_theme_mod('ovez_show_page_title',true);
$page_top = get_theme_mod('ovez_show_page_top',true);
$shop_layout = get_theme_mod('ovez_show_page_layout','container');
$product_padding = get_theme_mod('ovez_woo_product_padding',false);

if(isset($_GET['shop-top'])){
    $page_top=$_GET['shop-top'];
}
if(isset($_GET['col-padding'])){
    $product_padding=$_GET['col-padding'];
}
$pdd ='';
if(isset($product_padding) && $product_padding !=0 ){
    $pdd='no-padding';
}
$class='hidden';
if(isset($page_top) && $page_top !=0 ){
    $class='';
}

if(isset($_GET['shop-layout'])){
    $shop_layout=$_GET['shop-layout'];
}
if(isset($_GET['shop-type'])){
    $display_type=$_GET['shop-type'];
}
if(isset($_GET['title'])){
    $page_title=$_GET['title'];
}

get_header( 'shop' ); ?>



<?php
$titre_hn = get_field('titre_shop_hn', 5394);
$content_hn = get_field('content_shop_hn', 5394);
?>

<div class="wrapper-eshop">
  <div class="container">
    <div class="row">

      <div class="col-xs-12">

        <h1><?php echo $titre_hn; ?></h1>
        <div class="intro"><?php echo $content_hn; ?></div>

      </div>

    </div>
  </div>
</div>


<?php if( have_rows('bloc_categories', 5394) ): ?>

  <div class="wrapper-mosaic">
    <div class="container">
      <div class="row">


      	<?php while( have_rows('bloc_categories', 5394) ): the_row();

      		// vars
      		$image = get_sub_field('image');
      		$titre = get_sub_field('titre');
      		$link = get_sub_field('lien');

      		?>

          <div class="col-xs-6 col-sm-6 col-lg-3 cat-mosaic">
            <a href="<?php echo get_term_link( $link ); ?>#anchor" class="anchor-link">
              <div class="cat-mosaic-inner" style="background-image: url('<?php echo $image['sizes']['large']; ?>');">
                <h3><?php echo $titre ?></h3>
              </div>
            </a>
          </div>

      	<?php endwhile; ?>

        <script>
        	(function( $ ) {

            var $root = $('html, body');

            $('a[href^="#"]').click(function () {
                $root.animate({
                    scrollTop: $( $.attr(this, 'href') ).offset().top
                }, 500);

                return false;
            });

            var href = window.location.pathname;
            $('.cat-mosaic').find('a[href*="' + href + '"]').addClass('active');

        	})( jQuery );
      	</script>

      </div>
    </div>
  </div>

<?php endif; ?>




<div class="wrap-content <?php echo esc_attr($pdd); ?> clearfix" id="anchor">
    <div class="cat-header clearfix">
        <div class="<?php echo esc_attr($shop_layout);?>">
            <?php if ($page_title) : ?>
                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

                <?php if(is_product_category()) : ?>

                  <?php
                  $term_object = get_queried_object();
                  ?>

                  <?php if($term_object->description) : ?>
                    <div class="category-description">
                      <div class="description"><?php echo $term_object->description; ?></div>
                    </div>
                  <?php endif; ?>

                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>
    <div class="<?php echo esc_attr($shop_layout);?>">
        <div class="row shop-content type-loadShop ovez-<?php echo esc_attr($display_type);?> <?php echo esc_attr($pdd);?> clearfix">
        <?php do_action('woo-sidebar-left'); ?>
        <?php do_action('woo-content-before'); ?>

            <?php if ( woocommerce_product_loop() )  { ?>

                    <?php if($display_type=='subcategories' || $display_type=='both' ){?>
                        <div class="shop-subcategories clearfix">
                            <?php ovez_subcategories_loop_start();?>
                        </div>
                    <?php  }?>

                    <div class="shop-content-top <?php echo esc_attr($class);?> clearfix">
                        <?php
                        /**
                         * woocommerce_before_shop_loop hook.
                         *
                         * @hooked wc_print_notices - 10
                         * @hooked ovez_nav_category - 17
                         * @hooked ovez_nav_filters - 18
                         * @hooked ovez_btn_filter - 19
                         * @hooked woocommerce_catalog_ordering - 30
                         * @hooked ovez_filter_down - 31
                         * @hooked ovez_search - 32
                         * @hooked ovez_filter_full - 33
                         */
                        do_action( 'woocommerce_before_shop_loop' );
                        ?>
                    </div>
                    <?php  woocommerce_product_loop_start();
                    if ( wc_get_loop_prop( 'total' ) ) {

                        while ( have_posts() ) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             *
                             * @hooked WC_Structured_Data::generate_product_data() - 10
                             */

                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content', 'product' );
                        }

                    }
                    woocommerce_product_loop_end(); ?>
                    <?php
                    /**
                     * woocommerce_after_shop_loop hook.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                    ?>

            <?php } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action( 'woocommerce_no_products_found' );
            } ?>

        <?php do_action('woo-content-after'); ?>
    </div>
    </div>

</div>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
?>

<?php get_footer( 'shop' ); ?>
