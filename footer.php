<?php
/**
 * The template for displaying the footer
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?>

<?php

$icon1 = get_field('icone1_rea', 'options');
$icon2 = get_field('icone2_rea', 'options');
$icon3 = get_field('icone3_rea', 'options');
$icon4 = get_field('icone4_rea', 'options');
$titre_newsletter = get_field('phrase_daccroche_newsletter', 'options');
$desc_newsletter = get_field('description_newsletter', 'options');
$shortcode_newsletter = get_field('shortcode_newsletter', 'options');
?>

        </div><!-- .site-content -->

        <div class="reassurance-row">
          <div class="container">
            <div class="row">

              <?php if($icon1) : ?>

                <div class="col-xs-12 col-sm-6 col-lg-3 icon">
                  <img src="<?php echo $icon1['img_icone1']['url']; ?>" alt="<?php echo $icon1['img_icone1']['alt']; ?>">
                  <p><?php echo $icon1['texte_icone1']; ?></p>
                </div>

              <?php endif; ?>

              <?php if($icon2) : ?>

                <div class="col-xs-12 col-sm-6 col-lg-3 icon">
                  <img src="<?php echo $icon2['img_icone2']['url']; ?>" alt="<?php echo $icon2['img_icone2']['alt']; ?>">
                  <p><?php echo $icon2['texte_icone2']; ?></p>
                </div>

              <?php endif; ?>

              <?php if($icon3) : ?>

                <div class="col-xs-12 col-sm-6 col-lg-3 icon">
                  <img src="<?php echo $icon3['img_icone3']['url']; ?>" alt="<?php echo $icon3['img_icone3']['alt']; ?>">
                  <p><?php echo $icon3['texte_icone3']; ?></p>
                </div>

              <?php endif; ?>

              <?php if($icon4) : ?>

                <div class="col-xs-12 col-sm-6 col-lg-3 icon">
                  <img src="<?php echo $icon4['img_icone4']['url']; ?>" alt="<?php echo $icon4['img_icone4']['alt']; ?>">
                  <p><?php echo $icon4['texte_icone4']; ?></p>
                </div>

              <?php endif; ?>

            </div>
          </div>
        </div>

        <?php if($shortcode_newsletter): ?>
          <div class="newsletter-row" id="na-footer">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                    <p class="label"><?php echo $titre_newsletter; ?></p>
                    <p class="description"><?php echo $desc_newsletter; ?></p>
                    <?php echo do_shortcode($shortcode_newsletter); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>





        <?php
            $layout_footer = get_theme_mod('ovez_footer', 'footer-1');
            if(is_page()){
                $layout_footer = get_post_meta($post->ID, 'layout_footer', true);
            }
            if($layout_footer == 'global' || empty($layout_footer)){
                $layout_footer = get_theme_mod('ovez_footer', 'footer-1');
            }
            get_template_part('templates/footer/'.$layout_footer);
        ?>

    </div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
