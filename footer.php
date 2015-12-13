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
		<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'footer-1' ); ?>
		</aside><!-- #secondary -->
	</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'relativity' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'relativity' ), 'WordPress' ); ?></a>
			<br />
			<?php printf( esc_html__( 'Built with %1$s at %2$s.', 'relativity' ), '<big>&hearts;</big>', '<a href="http://magikpress.com/" rel="designer">MagikPress</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
