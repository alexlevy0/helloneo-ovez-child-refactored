<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product;
$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
$number_thumbnails  = get_theme_mod('na_woo_number_product_thumbnails',5);

$attachment_ids = $product->get_gallery_image_ids();
$clear='';

wp_enqueue_script('ovez-slick');

?>

<div class="images na-gallery-image product_carousel_left <?php echo esc_attr($clear);?> clearfix" data-number="<?php echo esc_attr($number_thumbnails);?>">

    <div class="na-product-image">
        <div class="product-gallery-slider gallery-mains">

            <?php
            $attributes = array(
                'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
                'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
                'data-src'                => $full_size_image[0],
                'data-large_image'        => $full_size_image[0],
                'data-large_image_width'  => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2],
            );
            if($full_size_image[0]){
                $bg_image          ="background-image:url('$full_size_image[0]')";
                $style_css            ='style = '.$bg_image.'';
            }

            if ( has_post_thumbnail() ) {
                $html  = '<figure data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'ovez-product-large' ) . '" class="woocommerce-product-gallery__image first" '.$style_css.' width="'.esc_attr($full_size_image[1]).'px" height="'.esc_attr($full_size_image[2]).'px"><a  class="nmc" href="' . esc_url( $full_size_image[0] ) . '" width="'.esc_attr($full_size_image[1]).'" height="'.esc_attr($full_size_image[2]).'">';
//                $html .= get_the_post_thumbnail( $post->ID, 'ovez-product-large', $attributes );
                $html .= '</a></figure>';
            } else {
                $html  = '<figure class="woocommerce-product-gallery__image--placeholder">';
                $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'ovez' ) );
                $html .= '</figure>';
            }

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

            $attachment_ids = $product->get_gallery_image_ids();

            if ( $attachment_ids && has_post_thumbnail() ) {
                foreach ( $attachment_ids as $attachment_id ) {
                    $full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
                    $thumbnail       = wp_get_attachment_image_src( $attachment_id, 'ovez-product-large' );
                    if($full_size_image[0]){
                        $bg_image          ="background-image:url('$full_size_image[0]')";
                        $style_css            ='style = '.$bg_image.'';
                    }
                    $attributes      = array(
                        'title'                   => get_post_field( 'post_title', $attachment_id ),
                        'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
                        'data-src'                => $full_size_image[0],
                        'data-large_image'        => $full_size_image[0],
                        'data-large_image_width'  => $full_size_image[1],
                        'data-large_image_height' => $full_size_image[2],
                    );

                    $html  = '<figure data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image" '.$style_css.'><a class="nmc2010" href="' . esc_url( $full_size_image[0] ) . '"  data-size="'.esc_attr($full_size_image[1]).'x'.esc_attr($full_size_image[2]).'">';
//                    $html .= wp_get_attachment_image( $attachment_id, 'ovez-product-large', false, $attributes );
                    $html .= '</a></figure>';

                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
                }
            }
            ?>
        </div>
    </div><!-- .product-image -->

</div><!-- .images -->