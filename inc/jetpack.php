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

	/**
	 * Add theme support for Content Options.
	 *
	 * @package Relativity
	 * @see: https://jetpack.com/support/content-options/
	 */
	add_theme_support( 'jetpack-content-options', array(
	  'blog-display'       => array( 'content', 'excerpt' ), // the default setting of the theme: 'content', 'excerpt' or array( 'content', 'excerpt' ) for themes mixing both display.
	  'author-bio'         => true, // display or not the author bio: true or false.
	  'author-bio-default' => false, // the default setting of the author bio, if it's being displayed or not: true or false (only required if false).
	  'post-details'       => array(
	    'stylesheet'      => 'relativity-style', // name of the theme's stylesheet.
	    'date'            => '.posted-on', // a CSS selector matching the elements that display the post date.
	    'categories'      => '.cat-links', // a CSS selector matching the elements that display the post categories.
	    'tags'            => '.tags-links', // a CSS selector matching the elements that display the post tags.
	    'author'          => '.byline', // a CSS selector matching the elements that display the post author.
	    'comment'         => '.comments-link', // a CSS selector matching the elements that display the comment link.
	  ),
	  'featured-images'    => array(
	    'archive'         => true, // enable or not the featured image check for archive pages: true or false.
	    'archive-default' => true, // the default setting of the featured image on archive pages, if it's being displayed or not: true or false (only required if false).
	    'post'            => true, // enable or not the featured image check for single posts: true or false.
	    'post-default'    => true, // the default setting of the featured image on single posts, if it's being displayed or not: true or false (only required if false).
	    'page'            => true, // enable or not the featured image check for single pages: true or false.
	    'page-default'    => false, // the default setting of the featured image on single pages, if it's being displayed or not: true or false (only required if false).
	  ),
	) );

	/**
	 * Add theme support for Social menu.
	 *
	 * @package Relativity
	 * @see: https://jetpack.com/support/social-menu/
	 */

	add_theme_support( 'jetpack-social-menu' );
	
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

/**
 * Author Bio Avatar Size.
 */
function themeslug_author_bio_avatar_size() {
    return 64; // in px
}
add_filter( 'jetpack_author_bio_avatar_size', 'themeslug_author_bio_avatar_size' );
