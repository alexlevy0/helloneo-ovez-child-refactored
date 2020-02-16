<?php
/**
 * Single Product
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();
?>

<?php
$une = get_the_post_thumbnail_url('', 'full');
$terms = get_the_terms( $post->ID, 'category' );
$titre = get_the_title($post->ID);
$author = get_field('auteur_articles');
$date = get_the_date('d.m.y');
$resume = get_field('intro_articles');
$related = get_field('related_articles');
?>

<div class="wrap-article" role="main">

  <div class="article__image" style="background-image: url(<?php echo $une; ?>);">
  </div>

  <div class="article__container container">

    <div class="article__top">
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
          <div class="article__top-inner">
            <div class="article__categories text-center">
              <?php foreach ( $terms as $term ) { ?>
                <?php $term_link = get_term_link( $term ); ?>
                <a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a>
              <?php } ?>
            </div>
            <h1 class="article__titre text-center"><?php echo $titre; ?></h1>
            <p class="article__meta text-center">Par <?php echo $author['display_name']; ?>, le <?php echo $date; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="article__body">
      <div class="row">

        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
          <div class="article__body-inner">

            <div class="article__resume">
              <?php echo $resume; ?>
            </div>


            <div class="article__content">

              <?php if( have_rows('bloc_articles') ): ?>
              	<?php while( have_rows('bloc_articles') ): the_row(); ?>

              		<?php
                  $type = get_sub_field('type_bloc');
              		$b1_texte = get_sub_field('texte_b1');
              		$b2_image = get_sub_field('image_b2');
                  $b3_texte = get_sub_field('texte_b3');
              		$b3_image = get_sub_field('image_b3');
                  $b4_texte = get_sub_field('texte_b4');
              		$b4_image = get_sub_field('image_b4');
                  $b51_texte = get_sub_field('texte_b51');
                  $b52_texte = get_sub_field('texte_b52');
                  $b61_image = get_sub_field('image_b61');
                  $b62_image = get_sub_field('image_b62');
                  $b7_product = get_sub_field('produits_b7');
                  $product_ids = implode(', ', $b7_product);
              		?>

              		<?php if ($type === 'b1') : ?>

                    <div class="article__bloc texte">
                      <?php echo $b1_texte; ?>
                    </div>

                  <?php elseif ($type === 'b2') : ?>

                    <div class="article__bloc image">
                      <img src="<?php echo $b2_image['sizes']['large']; ?>" alt="<?php echo $b2_image['alt']; ?>">
                    </div>

                  <?php elseif ($type === 'b3') : ?>

                    <div class="article__bloc mixte">
                      <div class="row">

                        <div class="col-xs-12 col-sm-6 texte">
                          <?php echo $b3_texte; ?>
                        </div>

                        <div class="col-xs-12 col-sm-6 image">
                          <img src="<?php echo $b3_image['sizes']['large']; ?>" alt="<?php echo $b3_image['alt']; ?>">
                        </div>

                      </div>
                    </div>

                  <?php elseif ($type === 'b4') : ?>

                    <div class="article__bloc mixte">
                      <div class="row">

                        <div class="col-xs-12 col-sm-6 image">
                          <img src="<?php echo $b4_image['sizes']['large']; ?>" alt="<?php echo $b4_image['alt']; ?>">
                        </div>

                        <div class="col-xs-12 col-sm-6 texte">
                          <?php echo $b4_texte; ?>
                        </div>

                      </div>
                    </div>

                  <?php elseif ($type === 'b5') : ?>

                    <div class="article__bloc full">
                      <div class="row">

                        <div class="col-xs-12 col-sm-6 texte">
                          <?php echo $b51_texte; ?>
                        </div>

                        <div class="col-xs-12 col-sm-6 texte">
                          <?php echo $b52_texte; ?>
                        </div>

                      </div>
                    </div>

                  <?php elseif ($type === 'b6') : ?>

                    <div class="article__bloc full">
                      <div class="row">

                        <div class="col-xs-12 col-sm-6 image">
                          <img src="<?php echo $b61_image['sizes']['large']; ?>" alt="<?php echo $b61_image['alt']; ?>">
                        </div>

                        <div class="col-xs-12 col-sm-6 image">
                          <img src="<?php echo $b62_image['sizes']['large']; ?>" alt="<?php echo $b62_image['alt']; ?>">
                        </div>

                      </div>
                    </div>

                  <?php elseif ($type === 'b7') : ?>

                    <div class="article__bloc product">
                      <?php echo do_shortcode('[products ids="'.$product_ids.'"]'); ?>
                    </div>


                  <?php endif; ?>

              	<?php endwhile; ?>
              <?php endif; ?>


            </div>

          </div>
        </div>

      </div>
    </div>

    <div class="article__footer">
      <div class="row">
        <div class="col-xs-12 col-lg-10 col-lg-offset-1">
          <div class="article__footer-inner">
            <?php get_template_part('templates/share'); ?>
            <div class="sep"></div>
            <?php get_template_part('templates/post_pagination'); ?>
            <div class="sep"></div>
          </div>
        </div>
      </div>
    </div>

    <?php if($related): ?>
      <div class="article__related">
        <div class="row">

          <div class="col-xs-12">
            <h2 class="text-center">Découvrez également</h2>
          </div>

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

          <div class="col-xs-12 grid">
            <div class="row">
              <div class="grid-sizer"></div>

              <?php foreach( $related as $post): // variable must be called $post (IMPORTANT) ?>
              <?php setup_postdata($post); ?>

                <?php
                $une = get_the_post_thumbnail_url('', 'medium');
                $terms = get_the_terms( $post->ID, 'category' );
                $titre = get_the_title($post->ID);
                $resume = get_field('intro_articles');
                $link = get_the_permalink($post->ID);
                ?>

                <div class="grid-item">
                  <div class="thumbnail__article">
                    <a href="<?php echo $link; ?>">
                      <img src="<?php echo $une; ?>">
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

              <?php endforeach; ?>
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            </div>
          </div>


        </div>
      </div>
    <?php endif; ?>

  </div>


</div>





<?php get_footer(); ?>
