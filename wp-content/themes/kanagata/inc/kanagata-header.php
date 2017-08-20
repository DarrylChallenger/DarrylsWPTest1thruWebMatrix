<?php
/**
 * Header settings
 *
 * @package    WordPress
 * @subpackage kanagata
 * @version    1.0.0
 * @since      1.0.0
 */

/**
 * Load stylesheet
 *
 * @since 1.0
 */
function kanagata_load_stylesheets() {
	wp_enqueue_style(
		'bootstrap',
		KANAGATA_ASSETS_CSS_URL . '/vendor/bootstrap/bootstrap.css',
		false,
		'3.3.4',
		'all'
	);
	wp_enqueue_style(
		'font-awesome',
		KANAGATA_ASSETS_CSS_URL . '/vendor/font-awesome/font-awesome.css',
		false,
		'4.3.0',
		'all'
	);
	$slide = get_theme_mod( 'slide_header_image' );
	if ( 'yes' === $slide ) {
		wp_enqueue_style(
			'jquery.bxslider',
			KANAGATA_ASSETS_CSS_URL . '/vendor/jquery.bxslider/jquery.bxslider.css',
			false,
			'4.1.2',
			'all'
		);
	}
	wp_enqueue_style(
		'lightbox',
		KANAGATA_ASSETS_CSS_URL . '/vendor/lightbox/lightbox.css',
		false,
		'2.8.1',
		'all'
	);
	wp_enqueue_style(
		'kanagata-options',
		KANAGATA_ASSETS_CSS_URL . '/kanagata-options.css',
		false,
		'1.0',
		'all'
	);
	// StyleSheet is largely changed at Version 1.3.0 from Version 1.2.4.
	// This is processing that keeps compatibility.
	if ( '1.2.4' === get_theme_mod( 'stylesheet_version' ) ) {
		wp_enqueue_style(
			'1.2.4',
			KANAGATA_ASSETS_CSS_URL . '/style-1.2.4.css',
			false,
			'1.2.4',
			'all'
		);
	} else {
		wp_enqueue_style( 'style', get_stylesheet_uri(), false, '1.0', 'screen' );
	}

	/*
	 * customizer style.
	 */

	// Sidebar layout.
	$customize_style = kanagata_get_customize_style();
	if ( '' !== $customize_style ) {
		wp_enqueue_style(
			'customize-style',
			KANAGATA_ASSETS_CSS_URL . '/kanagata-customize.css'
		);
		wp_add_inline_style( 'customize-style', $customize_style );
	}
}

add_action( 'wp_enqueue_scripts', 'kanagata_load_stylesheets' );

/**
 * Load script
 *
 * @since 1.0
 */
function kanagata_load_scripts() {
	wp_enqueue_script( 'jquery' );
	$ua = getenv( 'HTTP_USER_AGENT' );
	if ( preg_match( '/MSIE 8/', $ua ) ) {
		wp_enqueue_script( 'html5', KANAGATA_ASSETS_JS_URL . '/vendor/html5shiv.js', array(), '3.7.3', false );
	}
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$slide = get_theme_mod( 'slide_header_image' );
	if ( 'yes' === $slide ) {
		wp_enqueue_script(
			'jquery.bxslider',
			KANAGATA_ASSETS_JS_URL . '/vendor/jquery.bxslider.js',
			array(),
			'4.1.2',
			false
		);
	}
	wp_enqueue_script(
		'lightbox',
		KANAGATA_ASSETS_JS_URL . '/vendor/lightbox.js',
		array(),
		'2.8.1',
		true
	);
	wp_enqueue_script(
		'kanagata_toggle_menu',
		KANAGATA_ASSETS_JS_URL . '/kanagata_toggle_menu.js',
		array( 'jquery' ),
		'1.0.0'
	);

	do_action( 'kanagata_load_additional_scripts' );
}

add_action( 'wp_enqueue_scripts', 'kanagata_load_scripts' );

/**
 * Add viewport in head
 *
 * @since 1.0
 */
function kanagata_viewport() {
	$output = "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />' . PHP_EOL;
	echo $output;
}

add_action( 'wp_head', 'kanagata_viewport' );
