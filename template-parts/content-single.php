<?php
/**
 * @package Relativity
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if(has_post_thumbnail() ){
				the_post_thumbnail();
		} ?>

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
</article><!-- #post-## -->
