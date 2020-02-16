<?php
/**
 * @package     Ovez Theme
 * @version     1.0
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2018 NanoAgency
 * @license     GPL v2
 */
$keepMenu           = str_replace('','',ovez_keep_menu() );
$ovez_cart          = get_theme_mod('ovez_cart',true);
$ovez_breadcrumb    = get_theme_mod('ovez_breadcrumb',true);

$detailLayouts      = get_theme_mod('ovez_detail_layouts', 'vertical');
if(isset($_GET['detail-layouts'])){
    $detailLayouts=$_GET['detail-layouts'];
}
if($detailLayouts=='carousel' || $detailLayouts=='carousel-left'){
    $ovez_breadcrumb = false;
}

?>

<?php
$couleur = get_field('color_primary_neo', 'options');
?>

<style>

p,a,li,ul,div {
  --main-primary-color: <?php echo $couleur; ?>;
	--main-primary-color-op1: rgba(189, 127, 83, 0.1);
}

</style>

<div class="ovez-header-placeholder  placeholder-<?php echo esc_attr($keepMenu);?>"></div>
<header id="masthead" class="site-header header-simple header-full <?php echo esc_attr($keepMenu);?>">
    <div id="ovez-header" class="ovez-header">

        <!--Top bar-->
        <?php if(is_active_sidebar( 'topbar-left' )){ ?>
          <div id="ovez-top-navbar" class="top-navbar">
              <div class="container-fluid">
                <div class="row">
                    <div class="topbar-left col-xs-12">
                      <?php dynamic_sidebar('topbar-left'); ?>
                    </div>
                </div>
              </div>
          </div>
        <?php }?>

        <!--Header Menu-->
        <div class="container-fluid">
            <div class="ovez-header-content ">
                <!--Logo-->
                <div class="header-content-logo">
                    <?php
                            get_template_part('templates/logo');
                    ?>
                </div>
                <!-- Menu-->
                <div class="header-content-menu">
                    <div id="na-menu-primary" class="nav-menu clearfix">
                        <nav class="text-center na-menu-primary clearfix">
                            <?php
                            if (has_nav_menu('primary_navigation')) :
                                // Main Menu
                                wp_nav_menu( array(
                                    'theme_location' => 'primary_navigation',
                                    'menu_class'     => 'nav navbar-nav na-menu',
                                    'container'      => '',
                                ) );
                            endif;
                            ?>
                        </nav>
                    </div>
                </div>
                <!--Seacrch & Cart-->
                <div class="header-content-right">
                    <div class="searchform-wrap search-transition-wrap ovez-hidden">
                        <div class="search-transition-inner">
                            <?php
                                get_search_form();
                            ?>
                        </div>
                        <button class="btn-mini-close pull-right"><i class="ion-ios-close-empty"></i></button>
                    </div>

                    <?php if($ovez_cart):?>

                        <div class="account-wrap">
                          <div class="na-account">
                            <div class="mini-account btn-header clearfix" role="contentinfo">
                              <div class="icon-account text-items <?php if ( wp_is_mobile() ) : ?> mobile<?php endif; ?>">
                                <?php if ( wp_is_mobile() ) : ?>

                                  <a class="account-link" href="javascript:void(0);">

                                    <script>
                                    jQuery(function($){
                                      $(".icon-account").click(function(){
                                        $(".menu-account").toggleClass('shown');
                                      });
                                    });
                                    </script>

                                <?php else: ?>

                                  <a class="account-link" href="<?php echo site_url('/mon-compte'); ?>">

                                <?php endif; ?>

                                  <i class="icon ion-ios-contact-outline"></i>
                                </a>


                                <?php if ( !wp_is_mobile() ) : ?>

                                  <div class="menu-account<?php if ( is_user_logged_in() ) : ?> connected<?php else : ?> not-connected<?php endif; ?>">

                                    <?php if ( is_user_logged_in() ) : ?>

                                      <?php $current_user = wp_get_current_user(); ?>

                                      <div class="author-img avatar">
                                				<?php echo get_avatar( $current_user->user_email,100); ?>
                                			</div>

                                			<div class="name-account">
                                			<?php
                                				echo sprintf( esc_html__( 'Hello %s', 'ovez' ),
                                						'<strong>'.$current_user->display_name.'</strong>'
                                				);
                                			?>
                                			</div>

                                      <?php
                                      if (has_nav_menu('shop_navigation')) :
                                          // Main Menu
                                          wp_nav_menu( array(
                                              'theme_location' => 'shop_navigation',
                                              'menu_class'     => 'nav navbar-nav na-menu',
                                              'container'      => '',
                                          ) );
                                      endif;
                                      ?>

                                    <?php else: ?>

                                      <p class="title"><?php esc_attr_e( 'Login', 'ovez' ); ?></p>
                                      <?php echo do_shortcode('[woocommerce_my_account]'); ?>
                                      <div class="login-form-divider"><span><?php esc_attr_e( 'Or', 'ovez' ); ?></span></div>
                                      <a class="btn btn-primary register-btn" href="<?php echo site_url('/mon-compte'); ?>">Créer un compte</a>

                                    <?php endif; ?>

                                  </div>

                                <?php endif; ?>


                              </div>

                              <?php if ( wp_is_mobile() ) : ?>

                                <div class="menu-account<?php if ( is_user_logged_in() ) : ?> connected<?php else : ?> not-connected<?php endif; ?>">

                                  <?php if ( is_user_logged_in() ) : ?>

                                    <?php $current_user = wp_get_current_user(); ?>

                                    <div class="author-img avatar">
                              				<?php echo get_avatar( $current_user->user_email,100); ?>
                              			</div>

                              			<div class="name-account">
                              			<?php
                              				echo sprintf( esc_html__( 'Hello %s', 'ovez' ),
                              						'<strong>'.$current_user->display_name.'</strong>'
                              				);
                              			?>
                              			</div>

                                    <?php
                                    if (has_nav_menu('shop_navigation')) :
                                        // Main Menu
                                        wp_nav_menu( array(
                                            'theme_location' => 'shop_navigation',
                                            'menu_class'     => 'nav navbar-nav na-menu',
                                            'container'      => '',
                                        ) );
                                    endif;
                                    ?>

                                  <?php else: ?>

                                    <p class="title"><?php esc_attr_e( 'Login', 'ovez' ); ?></p>
                                    <?php echo do_shortcode('[woocommerce_my_account]'); ?>
                                    <div class="login-form-divider"><span><?php esc_attr_e( 'Or', 'ovez' ); ?></span></div>
                                    <a class="btn btn-primary register-btn" href="<?php echo site_url('/mon-compte'); ?>">Créer un compte</a>

                                  <?php endif; ?>

                                </div>

                              <?php endif; ?>


                            </div>
                          </div>
                        </div>

                        <div class="cart-wrap">
                            <?php
                            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
                                <?php ovez_cartbox();?>
                            <?php }
                            ?>
                        </div>
                    <?php endif;?>


                    <div class="searchform-mini">
                        <button class="btn-mini-search"><i class="ion-ios-search-strong"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- .container -->
    </div>
</header>
<!-- .site-header -->
<div id="content" class="site-content">
    <?php if ($ovez_breadcrumb):?>
    <div class="wrapper-breadcrumb clearfix">
        <div class="container-fluid">
            <?php do_action( 'ovez_breadcrumb'); ?>
        </div>
    </div>
    <?php endif;?>
