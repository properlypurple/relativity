<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Relativity
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses relativity_get_default_header_image()
 */
function relativity_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'relativity_custom_header_args', array(
		'width'                  => 2000,
		'height'                 => 500,
		'flex-height'            => true,
		'flex-width'             => true,
	) ) );
}
add_action( 'after_setup_theme', 'relativity_custom_header_setup' );

/**
 * Implement the Custom Avatar Header feature.
 */
function relativity_get_default_header_image() {

	// Get default from Discussion Settings.
	$default = get_option( 'avatar_default', 'mystery' ); // Mystery man default.
	if ( 'mystery' == $default ) {
		$default = 'mm';
	} elseif ( 'gravatar_default' == $default ) {
		$default = '';
	}

	$protocol = ( is_ssl() ) ? 'https://secure.' : 'http://';
	$url = sprintf( '%1$sgravatar.com/avatar/%2$s/', $protocol, md5( get_option( 'admin_email' ) ) );
	$url = add_query_arg( array(
		's' => 150,
		'd' => urlencode( $default ),
	), $url );

	return esc_url_raw( $url );
} // relativity_get_default_header_image

/* Reimplement gravatar header with custom logo, and use header image as background. */

function relativity_custom_logo_setup() {

	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 150,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

}
add_action( 'after_setup_theme', 'relativity_custom_logo_setup' );

function relativity_default_theme_logo() {

	$html = '<a class="site-logo" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'" href="'. esc_url( home_url( '/' ) ) .'" rel="home">';
	$html .= '<img class="no-grav header-image" alt="" src="'. relativity_get_default_header_image() .'" width="150" height="150" /></a>';
	echo $html;
}

function relativity_the_custom_logo() {

	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		relativity_default_theme_logo();
	}

}
