<?php
/**
 * Template Name: Blog
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();
?>


<div class="wrap-articles container" role="main">

  <?php
  if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
  } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => '20',
    'paged' => $paged,
    'post_status' => 'publish',
    'order' => 'DESC', // 'ASC'
    'orderby' => 'date'
  );

  $count = 0;

  ?>

  <?php $posts_query = new WP_Query( $args ); ?>

  <?php if ( $posts_query->have_posts() ) : ?>

    <script>
      jQuery(function($){
        $( document ).ready(function() {
          // init Masonry
          var $grid = $('.grid').masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
          });
          // layout Masonry after each image loads
          $grid.imagesLoaded().progress( function() {
            $grid.masonry();
          });
        });
      });
    </script>


    <div class="grid row">
      <div class="grid-sizer"></div>

      <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>

        <?php
        $une = get_the_post_thumbnail_url('', 'medium');
        $image_id = get_post_thumbnail_id(get_the_ID());
        $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
        $terms = get_the_terms( $post->ID, 'category' );
        $titre = get_the_title($post->ID);
        $resume = get_field('intro_articles');
        $link = get_the_permalink($post->ID);
        ?>

        <div class="grid-item">
          <div class="thumbnail__article">
            <a href="<?php echo $link; ?>">
              <img src="<?php echo $une; ?>" alt="<?php echo $alt_text; ?>">
            </a>
          </div>
          <div class="content__article">
            <div class="article__categories">
              <?php foreach ( $terms as $term ) { ?>
                <?php $term_link = get_term_link( $term ); ?>
                <a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a>
              <?php } ?>
            </div>
            <a href="<?php echo $link; ?>">
              <p class="article__titre"><?php echo $titre; ?></p>
            </a>
            <div class="article__resume">
              <?php echo $resume; ?>
            </div>
            <a href="<?php echo $link; ?>" class="article__link btn btn-primary">Lire la suite</a>
          </div>
        </div>

        <?php $count++ ?>

      <?php endwhile; ?>
    </div>

    <div class="pagination text-center">

      <?php
      echo paginate_links( array(
      	'format'             => '?paged=%#%',
      	'current'            => max( 1, get_query_var('paged') ),
      	'total'              => $posts_query->max_num_pages,
        'prev_text'          => '<i class="ion-ios-arrow-left"></i>',
        'next_text'          => '<i class="ion-ios-arrow-right"></i>',
        'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
      ));
      ?>

    </div>

    <?php wp_reset_postdata(); ?>
  <?php endif; ?>

</div>

<?php get_footer(); ?>
