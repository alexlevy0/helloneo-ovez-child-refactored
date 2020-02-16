<?php
/**
 * The default template for displaying content
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?>
<div class="box box-article">
    <article id="post-<?php the_ID(); ?>" <?php  post_class();?>>
        <div class="entry-header clearfix">
            <header class="entry-header-title">
                <?php  the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>
            <div class="article-meta-single">
                <span class="post-cat"><?php echo ovez_category(', '); ?></span>
                <span class="post-date">
                    <?php ovez_entry_date(); ?>
                </span>
            </div>
            <!-- .entry-header -->
        </div>
        <?php if(has_post_format('gallery')) : ?>

            <?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

            <?php if($images) : ?>
                <div class="post-image single-image">
                    <ul class="owl-single">
                        <?php foreach($images as $image) : ?>
                            <?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?>
                            <?php $the_caption = get_post_field('post_excerpt', $image); ?>
                            <li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> /></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php elseif(has_post_format('video')) : ?>

                <div class="embed-responsive embed-responsive-16by9 post-video single-video embed-responsive embed-responsive-16by9">
                    <?php $sp_video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>
                    <?php if(wp_oembed_get( $sp_video )) : ?>
                        <?php echo wp_oembed_get($sp_video); ?>
                    <?php else : ?>
                        <?php echo esc_url($sp_video); ?>
                    <?php endif; ?>
                </div>

            <?php elseif(has_post_format('audio')) : ?>

                <div class="post-image audio single-audio">
                    <?php $sp_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
                    <?php if(wp_oembed_get( $sp_audio )) : ?>
                        <?php echo str_replace($search, $replace, wp_oembed_get($sp_audio)); ?>
                    <?php else : ?>
                        <?php echo str_replace('','', $sp_audio); ?>
                    <?php endif; ?>
                </div>

            <?php else : ?>

            <?php if(has_post_thumbnail()) : ?>
                <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                    <div class="post-image single-image ">
                        <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <div class="entry-content">
            <?php ovez_excerpt(); ?>
            <?php
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'ovez' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span class="page-numbers">',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'ovez' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );

            ?>

        </div>
    <!--    Author bio.-->
        <div class="entry-footer clearfix">
            <?php
                get_template_part('templates/tag');
                get_template_part('templates/share');
            ?>
        </div>
    </article>
</div>
<?php get_template_part('templates/post_pagination'); ?>
<div class="box box-author">
    <?php
        if ( '' !== get_the_author_meta( 'description' ) ) {
            get_template_part('templates/about_author');
        }
    ?>
</div>
<?php get_template_part('templates/related_posts'); ?>
