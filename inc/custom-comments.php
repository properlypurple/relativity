<?php
/**
 * Callback for custom comments
 *
 * @package Relativity
 */

/**
 * Builds the custom markup for our comments template
 *
 * @package Relativity
 * @see http://codex.wordpress.org/Function_Reference/
 * @param object $comment the current commrnt object.
 * @param array  $args The arguments array.
 * @param int    $depth depth of comment thread.
 */
function relativity_custom_comments( $comment, $args, $depth ) {
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
			<li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
			<div class="back-link">< ?php comment_author_link(); ?></div>
		<?php break;
		default : ?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<article <?php comment_class(); ?> class="comment">

				<header class="comment-header">
					<p class="comment-author">
						<?php echo get_avatar( $comment, 48 ); ?>
								<span class="author-name"><?php comment_author(); ?></span><span class="says">says</span>
							</p>

					<p class="comment-meta">
						<time <?php comment_time( 'c' ); ?> class="comment-time">
							<span class="date">
							<?php comment_date(); ?>
							</span>
							<span class="time">
							<?php comment_time(); ?>
							</span>
						</time>
					</p>
				</header>

				<div class="comment-content">
					<?php comment_text(); ?>
				</div>

				<div class="comment-reply">
				<?php
				comment_reply_link( array_merge( $args, array(
					'reply_text' => 'Reply',
					'after' => ' <span>&darr;</span>',
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
				) ) );
				?>
				</div>

			</article><!-- #comment-<?php comment_ID(); ?> -->
		<?php // End the default styling of comment.
		break;
	endswitch;
}
