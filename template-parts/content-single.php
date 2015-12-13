<?php
/**
 * The template used for displaying post content in single.php
 *
 * @package Relativity
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image-container">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php endif; ?>
	<div class="wrap">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php relativity_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'relativity' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php relativity_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
