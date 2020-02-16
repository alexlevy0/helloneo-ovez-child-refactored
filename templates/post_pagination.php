<div class="entry_pagination">
	<div class="post-pagination pagination clearfix">

		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		?>

		<?php if (!empty( $prev_post )) : ?>
			<a class="page-numbers pull-left page-prev" href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">

                <div class="txt-pagination txt-prev">
                    <i class="ion-ios-arrow-thin-left"></i>
                    <span class="btn-prev">
                        <?php echo esc_html__('Previous Post','ovez')?>
                    </span>
                </div>
                <p class="title-pagination"><?php echo esc_html(wp_strip_all_tags($prev_post->post_title)); ?></p>
			</a>
		<?php endif; ?>

		<?php if (!empty( $next_post )) : ?>
            <a class="page-numbers pull-right page-next"  href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">

                <div class="txt-pagination txt-next">
                    <span class="btn-next">
                        <?php echo esc_html__('Next Post','ovez')?>
                    </span>
                    <i class="ion-ios-arrow-thin-right"></i>

                </div>
                <p class="title-pagination"><?php echo esc_html(wp_strip_all_tags($next_post->post_title)); ?></p>
			</a>
		<?php endif; ?>

	</div>
</div>