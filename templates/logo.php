<?php
    if(!get_theme_mod('ovez_logo')) {?>
        <p class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php
                $ovez_logo = get_theme_mod('ovez_logo_theme',false);
                if($ovez_logo && !empty($ovez_logo)){?>
                    <img class="logo-default" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/ovez-logo.svg'); ?>" alt="<?php echo esc_attr('ovez'); ?>" />
                <?php }
                else {?>
                    <?php bloginfo( 'name' ); ?>
                <?php }
                ?>
            </a>
        </p>
    <?php }
    else { ?>
        <div class="site-logo" id="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url(get_theme_mod('ovez_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" />
            </a>
        </div>
        <?php if(get_theme_mod('ovez_logo_retina')) { ?>
            <div class="site-logo" id="logo-retina"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('ovez_logo_retina')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></div>
        <?php } ?>
    <?php }
    ?>
<?php
if ( display_header_text() ) {
    $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo esc_attr($description); ?></p>
    <?php endif;
}
?>
