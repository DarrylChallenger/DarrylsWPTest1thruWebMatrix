<?php
/**
 * Theme option
 *
 * Create custom theme option page.
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0.0
 * @version    1.0.0
 */

/**
 * Add theme options page
 *
 * @since 1.0.0
 */
function kanagata_add_theme_options_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'kanagata' ),
		__( 'Theme Options', 'kanagata' ),
		'edit_theme_options',
		'kanagata_theme_options',
		'kanagata_theme_options_form'
	);
	if ( ! $theme_page ) {
		return;
	}
}

add_action( 'admin_menu', 'kanagata_add_theme_options_page' );

/**
 * Load theme option page css
 *
 * @since 1.0.0
 */
function kanagata_add_theme_options_stylesheets() {
	wp_enqueue_style(
		'theme options',
		KANAGATA_ASSETS_CSS_URL . '/wp_theme-options.min.css',
		false,
		'1.0.0',
		'all'
	);
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
}

add_action( 'admin_menu', 'kanagata_add_theme_options_stylesheets' );

/**
 * Get theme options
 *
 * @return array 'kanagata_theme_options' that is registered in wp_options table
 * @since 1.0.0
 */
function kanagata_get_theme_options() {
	return get_option( 'kanagata_theme_options', kanagata_get_default_theme_options() );
}

/**
 * Get theme option value
 *
 * @param string $name option name.
 * @since 1.0.0
 */
function kanagata_get_theme_option_value( $name ) {
	$options = kanagata_get_theme_options();
	if ( ! empty( $options[ $name ] ) ) {
		return $options[ $name ];
	}
	$options_default = kanagata_get_default_theme_options();
	if ( isset( $options_default[ $name ] ) ) {
		return $options_default[ $name ];
	}
}

/**
 * Get default theme options
 *
 * @return array default theme options
 * @since 1.0.0
 */
function kanagata_get_default_theme_options() {
	return array(
		'layout'                 => 'right',
		'side_color'             => '',
		'specific_category_name' => '',
		'specific_category_num'  => '5',
		'display_latest_post'    => 'yes',
	);
}

/**
 * Get theme option default value
 *
 * @param string $name option name value.
 *
 * @return string option value
 * @since 1.0.0
 */
function kanagata_get_default_theme_option_value( $name ) {
	$options = kanagata_get_default_theme_options();
	if ( ! empty( $options[ $name ] ) ) {
		return $options[ $name ];
	}

	return false;
}

/**
 * Register theme options
 *
 * @since 1.0.0
 */
function kanagata_register_theme_options() {
	if ( false === get_option( 'kanagata_theme_options' ) ) {
		add_option( 'kanagata_theme_options', kanagata_get_default_theme_options() );
	}

	register_setting(
		'kanagata_options',
		'kanagata_theme_options',
		'kanagata_validate_theme_options'
	);
}

add_action( 'admin_init', 'kanagata_register_theme_options' );

/**
 * Role to update theme options
 *
 * @return string role
 *
 * @since 1.0.0
 */
function kanagata_options_page_capability() {
	return 'edit_theme_options';
}

add_filter( 'option_page_capability_kanagata_options', 'kanagata_options_page_capability' );

/**
 * Get layout
 *
 * Layout apply to all post type.
 *
 * @since 1.0.0
 */
function kanagata_get_layout() {
	$layout_options = array(
		'right' => array(
			'value' => 'right',
			'label' => __( 'Right sidebar', 'kanagata' ),
		),
		'left'  => array(
			'value' => 'left',
			'label' => __( 'Left sidebar', 'kanagata' ),
		),
	);

	return $layout_options;
}

/**
 * Get display regular latest post
 *
 * @since 1.0.0
 */
function kanagata_get_display_latest_post() {
	$display_options = array(
		'yes' => array(
			'value' => 'yes',
			'label' => __( 'Yes', 'kanagata' ),
		),
		'no'  => array(
			'value' => 'no',
			'label' => __( 'No', 'kanagata' ),
		),
	);

	return $display_options;
}

/**
 * Set up media up loader
 *
 * @since 1.0.0
 */
function add_upload_assets() {
	wp_enqueue_style(
		'kanagata-uploader-css',
		KANAGATA_ASSETS_CSS_URL . '/wp_media-uploader.min.css',
		array(),
		false,
		'all'
	);
}

add_action( 'admin_init', 'add_upload_assets' );
