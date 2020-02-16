<?php

$GLOBALS['comment'] = $comment;
$add_below = '';

?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

	<div class="the-comment media">
		<div class="avatar media-left">
			<?php echo get_avatar($comment, 80); ?>
		</div>

		<div class="comment-box media-body">

			<div class="comment-author meta clearfix">
				<div class="ground-user">
					<strong class="text-user">
						<?php echo get_comment_author_link(); ?>
					</strong>
					<span class="comment-time"><?php echo human_time_diff( get_comment_date('U'), current_time('timestamp') ) . esc_html__(' ago', 'ovez'); ?></span>
				</div>
			</div>

			<div class="comment-text">
				<?php if ($comment->comment_approved == '0') : ?>
				<em><?php esc_html_e('Your comment is awaiting moderation.', 'ovez') ?></em>
				<br />
				<?php endif; ?>
				<?php comment_text() ?>
			</div>

            <small class="pull-left meta-user">
                <!--					--><?php //edit_comment_link(__('Edit', 'ovez'),'  ',' ') ?>
                <?php comment_reply_link(array_merge( $args, array( 'reply_text' => esc_html__('Reply', 'ovez'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </small>
		</div>

	</div>