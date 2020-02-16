<div class="ovez-social clearfix">

            <?php
            $socials= array(
                'social-facebook' => array(
                    'title' => 'facebook',
                    'link' => get_theme_mod('ovez_social_facebook',''),
                    'icon'=>'ion-social-facebook',
                ),
                'social-twitter' => array(
                    'title' => 'twitter',
                    'link' => get_theme_mod('ovez_social_twitter',''),
                    'icon'=>'ion-social-twitter',
                ),
                'social-instagram' => array(
                    'title' => 'instagram',
                    'link' => get_theme_mod('ovez_social_instagram',''),
                    'icon'=>'ion-social-instagram',
                ),
                'social-googleplus' => array(
                    'title' => 'googleplus',
                    'link' => get_theme_mod('ovez_social_googleplus',''),
                    'icon'=>'ion-social-googleplus',
                ),
                'social-pinterest' => array(
                    'title' => 'pinterest',
                    'link' => get_theme_mod('ovez_social_pinterest',''),
                    'icon'=>'ion-social-pinterest',
                ),
                'social-skype' => array(
                    'title' => 'skype',
                    'link' => get_theme_mod('ovez_social_skype',''),
                    'icon'=>'ion-social-skype',
                ),
                'social-vimeo' => array(
                    'title' => 'vimeo',
                    'link' => get_theme_mod('ovez_social_vimeo',''),
                    'icon'=>'ion-social-vimeo',
                ),
                'social-youtube' => array(
                    'title' => 'youtube',
                    'link' => get_theme_mod('ovez_social_youtube',''),
                    'icon'=>'ion-social-youtube',
                ),
                'social-dribbble' => array(
                    'title' => 'dribbble',
                    'link' => get_theme_mod('ovez_social_dribbble',''),
                    'icon'=>'ion-social-dribbble',
                ),
                'social-linkedin' => array(
                    'title' => 'linkedin',
                    'link' => get_theme_mod('ovez_social_linkedin',''),
                    'icon'=>'ion-social-linkedin',
                ),
                'social-rss' => array(
                    'title' => 'rss',
                    'link' => get_theme_mod('ovez_social_rss',''),
                    'icon'=>'ion-social-rss',
                ),
            );
            ?>
            <?php if(isset($socials) && !empty($socials)){?>
            <div class="ovez-social-share">
                <ul class="social-icons list-unstyled list-inline">
                    <?php  foreach ($socials as $key => $social) { ?>
                        <?php if ($social['link']):?>
                            <li class="social-item">
                                <a href="<?php echo esc_url($social['link']); ?>" target="_blank" title="<?php echo esc_attr($social['title']); ?>" class="<?php echo esc_attr($social['title']); ?>">
                                    <i class="<?php echo esc_attr($social['icon']); ?>"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>

</div>

