<?php
/**
 * Relativity Theme Customizer
 *
 * @package Relativity
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function relativity_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'relativity_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function relativity_customize_preview_js() {
	wp_enqueue_script( 'relativity_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'relativity_customize_preview_js' );

add_action( 'customize_register', 'relativity_register_color_scheme_customizer' );

/**
 * Adding our colour scheme setting and control
 *
 * @wp-hook 	customize_register
 * @param	WP_Customize_Manager $wp_customize the wp_customize object.
 * @return	void
 */
function relativity_register_color_scheme_customizer( WP_Customize_Manager $wp_customize ) {

	$schemes	= relativity_get_color_schemes();
	$section	= 'colors';
	$key		= 'relativity_color_scheme';
	$title		= __( 'Color scheme', 'relativity' );

	$wp_customize->add_setting(
		$key,
		array(
			'default' => 'default',
			'transport' => 'postMessage',
			'sanitize_callback' => 'relativity_sanitize_color',
		)
	);

	$wp_customize->add_control(
		$key, ( array(
		'label'    => $title,
		'section'  => $section,
		'settings' => $key,
		'schemes'  => $schemes,
		'default'  => 'default',
		'type'     => 'radio',
		'choices'  => $schemes,
		) ) );
}

/**
 * If colour is not in registerd colour schemes, return default.
 *
 * @param string $value Value of color scheme theme mod.
 */
function relativity_sanitize_color( $value ) {
	if ( ! array_key_exists( $value, relativity_get_color_schemes() ) ) {
		$value = 'default';
	}

	return $value;
}

/**
 * Get color schemes. You can filter this in your child theme.
 *
 * @return-filter	relativity_get_color_schemes
 * @return			Array
 */
function relativity_get_color_schemes() {

	$schemes = array(
		'default' => __( 'Default', 'relativity' ),
		'blue' => __( 'Blue', 'relativity' ),
		'red' => __( 'Red', 'relativity' ),
		'green' => __( 'Green', 'relativity' ),
		'teal' => __( 'Teal', 'relativity' ),
	);

	return apply_filters( 'relativity_get_color_schemes', $schemes );
}

add_filter( 'body_class', 'relativity_filter_body_class_add_colorscheme' );

/**
 * Adding our color scheme to the body-classes
 *
 * @wp-hook	body_class
 * @uses	get_theme_mod, relativity_get_color_schemes
 * @param	Array $classes the default body classes.
 * @return	Array $classes
 */
function relativity_filter_body_class_add_colorscheme( Array $classes ) {

	$scheme		= get_theme_mod( 'relativity_color_scheme' ) ? get_theme_mod( 'relativity_color_scheme' ) : 'default' ;
	$schemes	= relativity_get_color_schemes();

	if ( empty( $schemes ) || ! array_key_exists( $scheme, $schemes ) ) {
		$scheme = 'default';
	}

	$classes[] = $scheme;

	return $classes;
}
