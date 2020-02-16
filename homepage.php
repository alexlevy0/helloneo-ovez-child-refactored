<?php
/**
 * Template Name: Homepage
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();

$slide = 'slide_homepage_helloneo';

$activer_m = get_field('enable_mosaique');
$titre_m = get_field('titre_mosaique');
$bloc1 = get_field('bloc_1_mosaique');
$bloc2 = get_field('bloc_2_mosaique');
$bloc3 = get_field('bloc_3_mosaique');
$bloc4 = get_field('bloc_4_mosaique');

$activer_p = get_field('enable_produits');
$titre_p = get_field('titre_produits');
$products = get_field('selection_de_produits');
$product_ids = implode(', ', $products);

$titre_content = get_field('titre_content');
$content_content = get_field('content_content');
$img_left_content = get_field('img_left_content');
$img_right_content = get_field('img_right_content');
$btn_content = get_field('bouton_content');

$citation = get_field('citation_citation');
$image_c = get_field('photo_citation');
$person_c = get_field('personne_citation');
$role_c = get_field('poste_citation');

$blog_titre = get_field('titre_blog');
$blog_intro = get_field('introduction_blog');

$user_name_insta 		= get_field('user_name_instagram_hn', 'option');
$user_id_insta 			= get_field('user_id_instagram_hn', 'option');
$client_id_insta 		= get_field('client_id_instagram_hn', 'option');
$access_token_insta = get_field('access_token_instagram_hn', 'option');
$link_insta					= get_field('lien_instagram_hn', 'option');

?>

<link rel="stylesheet" type="text/css" href="https://www.helloneo.fr/wp-content/themes/ovez-child/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://www.helloneo.fr/wp-content/themes/ovez-child/slick/slick-theme.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://www.helloneo.fr/wp-content/themes/ovez-child/slick/slick.min.js"></script>


<div class="wrapper-slider">
  <?php if ( !wp_is_mobile() ) : ?>
  <div class="container">
  <?php endif; ?>
  <?php if( have_rows($slide) ): ?>
    <div class="slider-home">
      <?php while ( have_rows($slide) ) : the_row(); ?>

        <?php
        $alignement_img = get_sub_field('alignement_image');
        $alignement_txt = get_sub_field('alignement_texte');
        $schema = get_sub_field('schema');
        $image = get_sub_field('image');
        $titre = get_sub_field('titre');
        $description = get_sub_field('description');
        $bouton = get_sub_field('bouton');
        ?>

        <div class="slide<?php if($schema === 'Dark') : ?> dark<?php elseif ($schema === 'Light') : ?> light<?php endif; ?><?php if($alignement_txt === 'Centre'): ?> text-center<?php endif; ?>" style="background-image: url('<?php echo $image['url']; ?>'); background-position: <?php echo $alignement_img; ?>;">
          <div class="container">
            <div class="row">

              <?php if($alignement_txt === 'Gauche') : ?>
                <div class="col-xs-12 col-sm-8">
              <?php elseif ($alignement_txt === 'Centre'): ?>
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
              <?php elseif ($alignement_txt === 'Droite') : ?>
                <div class="col-xs-12 col-sm-8 col-sm-offset-4">
              <?php endif; ?>

                <h2 class="title-block title-box"><?php echo $titre; ?></h2>
                <div class="content">
                  <?php echo $description; ?>
                </div>
                <?php if ($bouton['label']): ?>
                  <a class="btn btn-primary" href="<?php echo $bouton['lien']['url']; ?>"><?php echo $bouton['label']; ?></a>
                <?php endif; ?>


              </div>
            </div>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
  <?php endif; ?>


  <script>
  $(document).ready(function(){
    $('.slider-home').slick({
      dots: true,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5500,
      speed: 300,
      fade: true,
      cssEase: 'linear'
    });
  });
  </script>

</div>
</div>


<?php if($activer_m) : ?>


<div class="wrapper-mosaic">
  <div class="container">
    <div class="row">

      <div class="col-xs-12">
        <h2 class="text-center"><?php echo $titre_m; ?></h2>
      </div>

      <div class="col-xs-12 col-sm-6 col-lg-4 bloc-mosaic bloc-1">
        <a href="<?php echo $bloc1['bloc_1_lien']['url'] ?>">
          <div class="bloc-mosaic-inner" style="background-image: url('<?php echo $bloc1['bloc_1_image']['sizes']['large'] ?>'); background-position: <?php echo $bloc1['bloc_1_alignement_image'] ?> ;">
            <h3><?php echo $bloc1['bloc_1_titre'] ?></h3>
          </div>
        </a>
      </div>

      <div class="col-xs-12 col-sm-6 col-lg-8">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-lg-12 hidden-sm bloc-mosaic bloc-2">
            <a href="<?php echo $bloc2['bloc_2_lien']['url'] ?>">
              <div class="bloc-mosaic-inner" style="background-image: url('<?php echo $bloc2['bloc_2_image']['sizes']['large'] ?>'); background-position: <?php echo $bloc2['bloc_2_alignement_image'] ?> ;">
                <h3><?php echo $bloc2['bloc_2_titre'] ?></h3>
              </div>
            </a>
          </div>
          <div class="col-xs-12 col-sm-12 col-lg-6 bloc-mosaic bloc-3">
            <a href="<?php echo $bloc3['bloc_3_lien']['url'] ?>">
              <div class="bloc-mosaic-inner" style="background-image: url('<?php echo $bloc3['bloc_3_image']['sizes']['large'] ?>'); background-position: <?php echo $bloc3['bloc_3_alignement_image'] ?> ;">
                <h3><?php echo $bloc3['bloc_3_titre'] ?></h3>
              </div>
            </a>
          </div>
          <div class="col-xs-12 col-sm-12 col-lg-6 bloc-mosaic bloc-4">
            <a href="<?php echo $bloc4['bloc_4_lien']['url'] ?>">
              <div class="bloc-mosaic-inner" style="background-image: url('<?php echo $bloc4['bloc_4_image']['sizes']['large'] ?>'); background-position: <?php echo $bloc4['bloc_4_alignement_image'] ?> ;">
                <h3><?php echo $bloc4['bloc_4_titre'] ?></h3>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="col-sm-12 visible-sm bloc-mosaic bloc-2">
        <a href="<?php echo $bloc2['bloc_2_lien']['url'] ?>">
          <div class="bloc-mosaic-inner" style="background-image: url('<?php echo $bloc2['bloc_2_image']['sizes']['large'] ?>'); background-position: <?php echo $bloc2['bloc_2_alignement_image'] ?> ;">
            <h3><?php echo $bloc2['bloc_2_titre'] ?></h3>
          </div>
        </a>
      </div>



      </div>
    </div>
  </div>
</div>


<?php endif; ?>


<?php if($activer_p) : ?>

<div class="wrapper-product-selection">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="text-center"><?php echo $titre_p; ?></h2>
        <?php echo do_shortcode('[products ids="'.$product_ids.'"]'); ?>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>



<div class="wrapper-content-homepage">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="block na-infoCategory box clearfix">
          <div class="entry-image clearfix">
            <div class="image_f">
              <img class="" src="<?php echo $img_left_content['url']; ?>" width="570" height="700" alt="<?php echo $img_left_content['alt']; ?>">
            </div>
          </div>
          <div class="entry-content clearfix">
            <div class="content-box clearfix">
              <h3 class="title-block title-box"><?php echo $titre_content; ?></h3>
              <div class="des-box"><?php echo $content_content; ?></div>
              <?php if($btn_content['label']): ?>
                <a class="btn btn-link" href="<?php echo $btn_content['lien']['url']; ?>" title="New Homepage" target="" rel=""><?php echo $btn_content['label']; ?></a>
              <?php endif; ?>
            </div>
            <div class="image-box clearfix">
              <div class="image_t">
                <img class="" src="<?php echo $img_right_content['url']; ?>" width="470" height="470" alt="<?php echo $img_right_content['alt']; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php if ($citation): ?>

<div class="wrapper-quote">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1 text-center citation-bloc">
        <p class="citation"><?php echo $citation; ?></p>
        <?php if($image_c) { ?><div class="photo" style="background-image: url('<?php echo $image_c['url']; ?>');"></div><?php } ?>
        <p class="personne"><?php echo $person_c; ?></p>
        <p class="poste"><?php echo $role_c; ?></p>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>


<div class="wrapper-partenaires">
  <div class="container">
    <div class="row">

      <div class="customer-logos slider">

        <?php
        $images = get_field('partenaires');

        if( $images ): ?>
          <?php foreach( $images as $image ): ?>
            <div class="slide">
              <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt']; ?>">
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

      </div>

    </div>
  </div>
</div>


<script>

$(function() {
	$('.customer-logos').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3500,
		arrows: false,
		dots: false,
		pauseOnHover: false,
		responsive: [
			{
				breakpoint: 900,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
  				slidesToShow: 2,
  				slidesToScroll: 1
  			}
  		}
  	]
  });
});

</script>


<div class="wrapper-blog">
  <div class="container">
    <div class="row">

      <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1 text-center blog-intro-bloc">
        <h2><?php echo $blog_titre ;?></h2>
        <div class="intro"><?php echo $blog_intro ;?></div>
      </div>

      <?php if ( wp_is_mobile() ) : ?>

        <?php
        $the_query = new WP_Query( array(
          'posts_per_page' => 2,
        ));
        ?>

      <?php else: ?>

        <?php
        $the_query = new WP_Query( array(
          'posts_per_page' => 3,
        ));
        ?>

      <?php endif; ?>



      <?php if ( $the_query->have_posts() ) : ?>

        <div class="col-xs-12">
        <div class="grid row">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


            <?php
            $une = get_the_post_thumbnail_url('', 'medium');
            $terms = get_the_terms( $post->ID, 'category' );
            $titre = get_the_title($post->ID);
            $resume = get_field('intro_articles');
            $link = get_the_permalink($post->ID);
            ?>

            <div class="col-xs-12 col-sm-6 col-lg-4 grid-item">
              <div class="thumbnail__article">
                <a href="<?php echo $link; ?>">
                  <div class="thumbnail__article-inner">
                    <img src="<?php echo $une; ?>">
                  </div>
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

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

      </div>
    </div>

      <?php endif; ?>

    </div>
  </div>
</div>



<div class="wrapper-instagram">
  <div class="container">
    <div class="row">

      <script type="text/javascript">
      	var user_id = <?php echo json_encode($user_id_insta ); ?>;
      	var client_id = <?php echo json_encode($client_id_insta); ?>;
      	var access_token = <?php echo json_encode($access_token_insta); ?>;

      	var feed = new Instafeed({
      			get: 'user',
      			userId: user_id,
      			clientId: client_id,
      			accessToken: access_token,
      			resolution: 'standard_resolution',
      			sortBy: 'most-recent',
      			limit: '3',
      			orientation: 'square',
      			template: '<div class="col-xs-6 col-sm-6 col-lg-3 post-instagram"><a href="{{link}}" target="_blank"><img src="{{image}}" /><div class="rollover"><p><span class="like"><i class="ion ion-ios-heart"></i>{{likes}}</span>|<span class="comment"><i class="ion ion-chatbubble"></i>{{comments}}</span></p></div></a></div>',
      			links: false,
      	});


      	feed.run();
      </script>

      <div id="instafeed">
      	<div class="col-xs-6 col-sm-6 col-lg-3 profil-instagram">
      		<a href="<?php echo $link_insta; ?>" target="_blank">
      			<div class="profil-instagram-inner">
              <i class="ion ion-social-instagram-outline"></i>
      				<p>Suivez-nous</p>
      				<p><strong>@<?php echo $user_name_insta; ?></strong></p>
      			</div>
      		</a>
      	</div>
      </div>

    </div>
  </div>
</div>



<?php get_footer(); ?>
