<?php
/**
 * The template used for displaying page content in page.php
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
			<?php edit_post_link( esc_html__( 'Edit', 'relativity' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
