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
<header id="masthead" class="site-header header-center ">
    <div id="ovez-header" class="ovez-header">
        <!--Top bar-->
        <div id="ovez-top-navbar" class="top-navbar">
            <div class="container">
                <?php  do_action( 'ovez_topbar'); ?>
            </div>
        </div>
        <!--Logo-->
        <div class="container">
            <div class="header-content-logo">
                <?php
                get_template_part('templates/logo');
                ?>
            </div>
            <div class="header-content-right hidden-md hidden-lg">
                <div class="searchform-mini searchform-moblie hidden-md hidden-lg">
                    <button class="btn-mini-search"><i class="ion-ios-search-strong"></i></button>
                </div>
                <div class="searchform-wrap search-transition-wrap ovez-hidden">
                    <div class="search-transition-inner">
                        <?php
                        get_search_form();
                        ?>
                        <button class="btn-mini-close pull-right"><i class="ion-ios-close-empty"></i></button>
                    </div>
                </div>
            </div>
            <div class="header-content-menu">
                    <div class="ovez-header-content">
                        <div class="header-content">
                            <div class="header-content-left">
                                <div class="searchform-mini">
                                    <button class="btn-mini-search"><i class="ion-ios-search-strong"></i></button>
                                </div>
                                <div class="searchform-wrap search-transition-wrap ovez-hidden">
                                    <div class="search-transition-inner">
                                        <?php
                                        get_search_form();
                                        ?>
                                    </div>
                                    <button class="btn-mini-close pull-right"><i class="ion-ios-close-empty"></i></button>
                                </div>
                            </div>
                            <!-- Menu-->
                            <div id="na-menu-primary" class="nav-menu clearfix">
                                <nav class="text-center na-menu-primary clearfix">
                                    <?php
                                    if (has_nav_menu('primary_navigation')) :
                                        // Main Menu
                                        wp_nav_menu( array(
                                            'theme_location' => 'primary_navigation',
                                            'menu_class'     => 'nav navbar-nav na-menu mega-menu',
                                            'container'      => '',
                                        ) );
                                    endif;
                                    ?>
                                </nav>
                            </div>
                            <!--Search & Cart-->
                            <div class="header-content-right">
                                <?php if($ovez_cart):?>
                                <div class="cart-wrap">
                                    <?php
                                    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
                                        <?php ovez_cartbox();?>
                                    <?php }
                                    ?>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</header>
<!-- .site-header -->
<div id="content" class="site-content">
    <?php if ($ovez_breadcrumb):?>
    <div class="wrapper-breadcrumb clearfix">
        <div class="container">
            <?php do_action( 'ovez_breadcrumb'); ?>
        </div>
    </div>
    <?php endif;?>