<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Relativity
 */

/**
 * Add theme support for Infinite Scroll.
 *
 * @package Relativity
 * @see: https://jetpack.me/support/infinite-scroll/
 */
function relativity_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'relativity_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function relativity_jetpack_setup
add_action( 'after_setup_theme', 'relativity_jetpack_setup' );

/**
 * Function to render more posts for infinite scroll.
 *
 * @package Relativity
 * @see: https://jetpack.me/support/infinite-scroll/
 */
function relativity_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function relativity_infinite_scroll_render
