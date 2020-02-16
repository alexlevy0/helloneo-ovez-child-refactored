<?php
/**
 * Template Name: Page Builder
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();
?>



    <?php if( have_rows('bloc_page') ): ?>
      <?php while( have_rows('bloc_page') ): the_row(); ?>

        <?php
        $type = get_sub_field('type_bloc');
        $b1_texte = get_sub_field('texte_b1');
        $b1_width = get_sub_field('width_b1');
        $b1_align = get_sub_field('align_b1');
        $b1_btn = get_sub_field('bouton_b1');
        $b2_image = get_sub_field('image_b2');
        $b2_width = get_sub_field('width_b2');
        $b3_texte = get_sub_field('texte_b3');
        $b3_align = get_sub_field('align_b3');
        $b3_btn = get_sub_field('bouton_b3');
        $b3_image = get_sub_field('image_b3');
        $b4_texte = get_sub_field('texte_b4');
        $b4_align = get_sub_field('align_b4');
        $b4_btn = get_sub_field('bouton_b4');
        $b4_image = get_sub_field('image_b4');
        $b51_texte = get_sub_field('texte_b51');
        $b51_align = get_sub_field('align_b51');
        $b51_btn = get_sub_field('bouton_b51');
        $b52_texte = get_sub_field('texte_b52');
        $b52_align = get_sub_field('align_b52');
        $b52_btn = get_sub_field('bouton_b52');
        $b61_image = get_sub_field('image_b61');
        $b62_image = get_sub_field('image_b62');
        $b7_product = get_sub_field('produits_b7');
        $product_ids = implode(', ', $b7_product);
        $b8_choice = get_sub_field('fond_b8');
        $b8_typo = get_sub_field('typo_b8');
        $b8_color = get_sub_field('couleur_b8');
        $b8_image = get_sub_field('image_b8');
        $b8_texte = get_sub_field('texte_b8');
        $b8_align = get_sub_field('align_b8');
        $b8_btn = get_sub_field('bouton_b8');
        ?>

        <?php if ($type === 'b1') : ?>

          <div class="container page__wrapper">
            <div class="row">

              <div class="page__bloc col-xs-12<?php if ($b1_width === 'Contain') { ?> col-sm-10 col-sm-offset-1<?php } ?> texte">
                <?php echo $b1_texte; ?>
                <?php if ($b1_btn) : ?>
                  <a class="btn btn-primary<?php if ($b1_align === 'Gauche') : ?> left<?php elseif ($b1_align === 'Droite') : ?> right<?php elseif ($b1_align === 'Centrer') : ?> center<?php endif; ?>" href="<?php echo $b1_btn['url']; ?>"><?php echo $b1_btn['title']; ?></a>
                <?php endif; ?>
              </div>

            </div>
          </div>


        <?php elseif ($type === 'b2') : ?>

          <div class="container page__wrapper">
            <div class="row">

              <div class="page__bloc col-xs-12<?php if ($b2_width === 'Contain') { ?> col-sm-10 col-sm-offset-1<?php } ?> image">
                <img src="<?php echo $b2_image['sizes']['large']; ?>" alt="<?php echo $b2_image['alt']; ?>">
              </div>

            </div>
          </div>

        <?php elseif ($type === 'b3') : ?>

          <div class="container page__wrapper">


              <div class="page__bloc mixte">
                <div class="row">

                  <div class="col-xs-12 col-sm-6 texte">
                    <?php echo $b3_texte; ?>
                    <?php if ($b3_btn) : ?>
                      <a class="btn btn-primary<?php if ($b3_align === 'Gauche') : ?> left<?php elseif ($b3_align === 'Droite') : ?> right<?php elseif ($b3_align === 'Centrer') : ?> center<?php endif; ?>" href="<?php echo $b3_btn['url']; ?>"><?php echo $b3_btn['title']; ?></a>
                    <?php endif; ?>
                  </div>

                  <div class="col-xs-12 col-sm-6 image">
                    <img src="<?php echo $b3_image['sizes']['large']; ?>" alt="<?php echo $b3_image['alt']; ?>">
                  </div>

                </div>
              </div>


          </div>

        <?php elseif ($type === 'b4') : ?>

          <div class="container page__wrapper">


              <div class="page__bloc mixte">
                <div class="row">

                  <div class="col-xs-12 col-sm-6 image">
                    <img src="<?php echo $b4_image['sizes']['large']; ?>" alt="<?php echo $b4_image['alt']; ?>">
                  </div>

                  <div class="col-xs-12 col-sm-6 texte">
                    <?php echo $b4_texte; ?>
                    <?php if ($b4_btn) : ?>
                      <a class="btn btn-primary<?php if ($b4_align === 'Gauche') : ?> left<?php elseif ($b4_align === 'Droite') : ?> right<?php elseif ($b4_align === 'Centrer') : ?> center<?php endif; ?>" href="<?php echo $b4_btn['url']; ?>"><?php echo $b4_btn['title']; ?></a>
                    <?php endif; ?>
                  </div>

                </div>
              </div>


          </div>

        <?php elseif ($type === 'b5') : ?>

          <div class="container page__wrapper">


              <div class="page__bloc full">
                <div class="row">

                  <div class="col-xs-12 col-sm-6 texte">
                    <?php echo $b51_texte; ?>
                    <?php if ($b51_btn) : ?>
                      <a class="btn btn-primary<?php if ($b51_align === 'Gauche') : ?> left<?php elseif ($b51_align === 'Droite') : ?> right<?php elseif ($b51_align === 'Centrer') : ?> center<?php endif; ?>" href="<?php echo $b51_btn['url']; ?>"><?php echo $b51_btn['title']; ?></a>
                    <?php endif; ?>
                  </div>

                  <div class="col-xs-12 col-sm-6 texte">
                    <?php echo $b52_texte; ?>
                    <?php if ($b52_btn) : ?>
                      <a class="btn btn-primary<?php if ($b52_align === 'Gauche') : ?> left<?php elseif ($b52_align === 'Droite') : ?> right<?php elseif ($b52_align === 'Centrer') : ?> center<?php endif; ?>" href="<?php echo $b52_btn['url']; ?>"><?php echo $b52_btn['title']; ?></a>
                    <?php endif; ?>
                  </div>

                </div>
              </div>


          </div>

        <?php elseif ($type === 'b6') : ?>

          <div class="container page__wrapper">


              <div class="page__bloc full">
                <div class="row">

                  <div class="col-xs-12 col-sm-6 image">
                    <img src="<?php echo $b61_image['sizes']['large']; ?>" alt="<?php echo $b61_image['alt']; ?>">
                  </div>

                  <div class="col-xs-12 col-sm-6 image">
                    <img src="<?php echo $b62_image['sizes']['large']; ?>" alt="<?php echo $b62_image['alt']; ?>">
                  </div>

                </div>
              </div>


          </div>

        <?php elseif ($type === 'b7') : ?>

          <div class="container page__wrapper">
            <div class="row">

              <div class="col-xs-12 page__bloc product">
                <?php echo do_shortcode('[products ids="'.$product_ids.'"]'); ?>
              </div>

            </div>
          </div>

        <?php elseif ($type === 'b8') : ?>


          <div class="page__wrapper" style="<?php if ($b8_choice === 'Couleurs') { ?>background-color : <?php echo $b8_color; ?><?php } elseif ($b8_choice === 'Image') { ?>background-image: url(<?php echo $b8_image['url']; ?>)<?php }?>">
            <div class="container page__bloc">


              <div class="banner<?php if ($b8_typo === 'Dark') { ?> dark<?php } elseif ($b8_typo === 'Light') { ?> light<?php }?>">
                <div class="row">

                  <div class="col-xs-12 col-sm-10 col-sm-offset-1 text text-center">

                    <?php echo $b8_texte; ?>

                    <?php if ($b8_btn) : ?>
                      <a class="btn btn-primary<?php if ($b8_align === 'Gauche') : ?> left<?php elseif ($b8_align === 'Droite') : ?> right<?php elseif ($b8_align === 'Centrer') : ?> center<?php endif; ?>" href="<?php echo $b8_btn['url']; ?>"><?php echo $b8_btn['title']; ?></a>
                    <?php endif; ?>

                  </div>


                </div>
              </div>

            </div>
          </div>

        <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
