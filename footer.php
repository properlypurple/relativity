<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Relativity
 */

?>

	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
	<div class="footer-widgets">
		<div class="wrap">
			<aside id="secondary-1" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</aside><!-- #secondary 1 -->
			<aside id="secondary-2" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</aside><!-- #secondary 2 -->
		</div>
	</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php if ( function_exists( 'jetpack_social_menu' ) ) jetpack_social_menu(); ?>
		
		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'relativity' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'relativity' ), 'WordPress' ); ?></a>
			<br />
			<span class="author-credit">
				<?php printf( esc_html__( '%1$s by %2$s.', 'relativity' ), '<a href="https://wordpress.org/themes/relativity">Relativity</a>', '<a href="https://properlypurple.com/projects/wordpress-themes/relativity/" rel="designer">Prpl</a>' ); ?>
			</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
