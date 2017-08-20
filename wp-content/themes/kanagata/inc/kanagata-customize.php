<?php
/**
 * Theme Customization
 *
 * @package    WordPress
 * @subpackage kanagata
 * @version    1.0.0
 * @since      1.0.0
 */

/**
 * Set Theme Customization API
 *
 * @param object $wp_customize customizer object from WordPress system.
 *
 * @since 1.0.0
 */
function kanagata_customize_register( $wp_customize ) {
	/*
	 * Set stylesheet version.
	 */
	$wp_customize->add_section(
		'stylesheet_section',
		array(
			'title'    => __( 'StyleSheet Version', 'kanagata' ),
			'priority' => 20,
		)
	);
	$wp_customize->add_setting(
		'stylesheet_version',
		array(
			'default'           => 'latest',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'kanagata_sanitize_stylesheet_version',
		)
	);
	$wp_customize->add_control(
		'stylesheet_version',
		array(
			'label'    => __( 'For compatibility with previous versions, Can select stylesheet version.', 'kanagata' ),
			'section'  => 'stylesheet_section',
			'settings' => 'stylesheet_version',
			'type'     => 'radio',
			'choices'  => array(
				'latest' => __( 'latest', 'kanagata' ),
				'1.2.4'  => __( '1.2.4 or below', 'kanagata' ),
			),
		)
	);

	/*
	 * Set sidebar layout.
	 */
	$wp_customize->add_section(
		'sidebar_layout_section',
		array(
			'title'    => __( 'Sidebar Layout', 'kanagata' ),
			'priority' => 22,
		)
	);
	$wp_customize->add_setting(
		'sidebar_layout',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'kanagata_sanitize_sidebar_layout',
		)
	);
	$wp_customize->add_control(
		'sidebar_layout',
		array(
			'label'    => __( 'Select sidebar Position', 'kanagata' ),
			'section'  => 'sidebar_layout_section',
			'settings' => 'sidebar_layout',
			'type'     => 'radio',
			'choices'  => array(
				'right' => __( 'Right sidebar', 'kanagata' ),
				'left'  => __( 'Left sidebar', 'kanagata' ),
			),
		)
	);

	/*
	 * Logo image.
	 */
	$wp_customize->add_setting(
		'logo_image',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo_image',
			array(
				'label'    => __( 'Logo image', 'kanagata' ),
				'section'  => 'title_tagline',
				'settings' => 'logo_image',
			)
		)
	);

	/*
	 * Display site title.
	 */
	$wp_customize->add_setting(
		'display_site_title',
		array(
			'default'           => 'yes',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'display_site_title',
		array(
			'settings' => 'display_site_title',
			'label'    => __( 'Display Site Title', 'kanagata' ),
			'section'  => 'title_tagline',
			'type'     => 'radio',
			'choices'  => array(
				'yes' => __( 'Yes', 'kanagata' ),
				'no'  => __( 'No', 'kanagata' ),
			),
		)
	);

	/*
	 * Site title color.
	 */
	$wp_customize->add_setting(
		'site_title_color',
		array(
			'default'           => '#337ab7',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'site_title_color', array(
				'label'    => __( 'color', 'kanagata' ),
				'section'  => 'title_tagline',
				'settings' => 'site_title_color',
			)
		)
	);

	/*
	 * Link color.
	 */
	$wp_customize->add_section(
		'link_section',
		array(
			'title'       => __( 'Site Link', 'kanagata' ),
			'priority'    => 30,
			'description' => __( 'Select site Link style', 'kanagata' ),
		)
	);
	$wp_customize->add_setting(
		'link_a_color',
		array(
			'default'           => '#337ab7',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'link_a_color', array(
				'label'    => __( 'link color', 'kanagata' ),
				'section'  => 'link_section',
				'settings' => 'link_a_color',
			)
		)
	);
	$wp_customize->add_setting(
		'link_a_link_color',
		array(
			'default'           => '#23527c',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'link_a_link_color', array(
				'label'    => __( 'Non-visit link color', 'kanagata' ),
				'section'  => 'link_section',
				'settings' => 'link_a_link_color',
			)
		)
	);
	$wp_customize->add_setting(
		'link_a_active_color',
		array(
			'default'           => '#337ab7',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'link_a_active_color', array(
				'label'    => __( 'Press link color', 'kanagata' ),
				'section'  => 'link_section',
				'settings' => 'link_a_active_color',
			)
		)
	);
	$wp_customize->add_setting(
		'link_a_visited_color',
		array(
			'default'           => '#337ab7',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'link_a_visited_color', array(
				'label'    => __( 'Visited link color', 'kanagata' ),
				'section'  => 'link_section',
				'settings' => 'link_a_visited_color',
			)
		)
	);
	$wp_customize->add_setting(
		'link_a_hover_color',
		array(
			'default'           => '#23527c',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'link_a_hover_color', array(
				'label'    => __( 'Mouse over link color', 'kanagata' ),
				'section'  => 'link_section',
				'settings' => 'link_a_hover_color',
			)
		)
	);

	/*
	 * Link underline.
	 */
	$wp_customize->add_setting(
		'text_decoration',
		array(
			'default'           => 'underline',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'text_decoration',
		array(
			'label'    => __(
				'Whether or not display link underline.',
				'kanagata'
			),
			'section'  => 'link_section',
			'settings' => 'text_decoration',
			'type'     => 'radio',
			'choices'  => array(
				'underline' => __( 'Yes', 'kanagata' ),
				'none'      => __( 'No', 'kanagata' ),
			),
		)
	);

	/*
	 * Background color (default colors section).
	 */

	// Global menu.
	$wp_customize->add_setting(
		'menu-global-container_background_color',
		array(
			'default'           => '#ffffff',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'menu-global-container_background_color', array(
				'label'    => __( 'Global menu', 'kanagata' ),
				'section'  => 'colors',
				'settings' => 'menu-global-container_background_color',
			)
		)
	);
	// Global menu dropdown list.
	$wp_customize->add_setting(
		'menu_global_dropdown',
		array(
			'default'           => '#e1e1e1',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'menu_global_dropdown', array(
				'label'    => __( 'Global menu dropdown', 'kanagata' ),
				'section'  => 'colors',
				'settings' => 'menu_global_dropdown',
			)
		)
	);
	// Extra menu dropdown list.
	$wp_customize->add_setting(
		'menu_extra_dropdown',
		array(
			'default'           => '#e1e1e1',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'menu_extra_dropdown', array(
				'label'    => __( 'Extra menu dropdown', 'kanagata' ),
				'section'  => 'colors',
				'settings' => 'menu_extra_dropdown',
			)
		)
	);
	// Sidebar.
	$wp_customize->add_setting(
		'sidebar_background_color',
		array(
			'default'           => '#ffffff',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'sidebar_background_color', array(
				'label'    => __( 'Sidebar', 'kanagata' ),
				'section'  => 'colors',
				'settings' => 'sidebar_background_color',
			)
		)
	);
	// Pager.
	$wp_customize->add_setting(
		'pager_background_color',
		array(
			'default'           => '#e1e1e1',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'pager_background_color', array(
				'label'    => __( 'Pager', 'kanagata' ),
				'section'  => 'colors',
				'settings' => 'pager_background_color',
			)
		)
	);
	// Heading.
	$wp_customize->add_setting(
		'heading_background_color',
		array(
			'default'           => '#e1e1e1',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'heading_background_color', array(
				'label'    => __( 'Heading Background Color', 'kanagata' ),
				'section'  => 'colors',
				'settings' => 'heading_background_color',
			)
		)
	);

	/*
	 * Size section.
	 * Set heading fon size, margin top, button
	 */
	$wp_customize->add_section(
		'size_section',
		array(
			'title'       => __( 'Size', 'kanagata' ),
			'description' => __(
				'You will do the settings for size. Please enter , including the unit(ie px, em, rem).',
				'kanagata'
			),
			'priority'    => 34,
		)
	);

	/*
	 * static page title(h1)
	 */

	// Font size.
	$wp_customize->add_setting(
		'static_page_title',
		array(
			'default'           => '22px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'static_page_title',
			array(
				'label'    => __( 'static page title font size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'static_page_title',
				'priority' => 1,
			)
		)
	);
	$wp_customize->add_setting(
		'static_page_title_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'static_page_title_enable',
			array(
				'label'    => __( 'enable static page title font size setting.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'static_page_title_enable',
				'priority' => 2,
			)
		)
	);
	// Margin top.
	$wp_customize->add_setting(
		'static_page_title_margin_top',
		array(
			'default'           => '0',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'static_page_title_margin_top',
			array(
				'label'    => __( 'Static page title top margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'static_page_title_margin_top',
				'priority' => 3,
			)
		)
	);
	$wp_customize->add_setting(
		'static_page_title_margin_top_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'static_page_title_margin_top_enable',
			array(
				'label'    => __( 'enable Static page title top margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'static_page_title_margin_top_enable',
				'priority' => 4,
			)
		)
	);
	// Margin bottom.
	$wp_customize->add_setting(
		'static_page_title_margin_bottom',
		array(
			'default'           => '48px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'static_page_title_margin_bottom',
			array(
				'label'    => __( 'Static page title bottom margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'static_page_title_margin_bottom',
				'priority' => 5,
			)
		)
	);
	$wp_customize->add_setting(
		'static_page_title_margin_bottom_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'static_page_title_margin_bottom_enable',
			array(
				'label'    => __( 'enable Static page title bottom margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'static_page_title_margin_bottom_enable',
				'priority' => 6,
			)
		)
	);

	/*
	 * Heading 1 in all post area
	 */

	// Font size.
	$wp_customize->add_setting(
		'heading1',
		array(
			'default'           => '30px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading1',
			array(
				'label'    => __( 'Heading 1 font size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading1',
				'priority' => 7,
			)
		)
	);
	$wp_customize->add_setting(
		'heading1_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading1_enable',
			array(
				'label'    => __( 'enable Heading 1 font size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading1_enable',
				'priority' => 8,
			)
		)
	);
	// Margin top.
	$wp_customize->add_setting(
		'heading1_margin_top',
		array(
			'default'           => '56px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading1_margin_top',
			array(
				'label'    => __( 'Heading 1 top margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading1_margin_top',
				'priority' => 9,
			)
		)
	);
	$wp_customize->add_setting(
		'heading1_margin_top_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading1_margin_top_enable',
			array(
				'label'    => __( 'enable Heading 1 top margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading1_margin_top_enable',
				'priority' => 10,
			)
		)
	);
	// Margin bottom.
	$wp_customize->add_setting(
		'heading1_margin_bottom',
		array(
			'default'           => '32px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading1_margin_bottom',
			array(
				'label'    => __( 'Heading 1 bottom margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading1_margin_bottom',
				'priority' => 11,
			)
		)
	);
	$wp_customize->add_setting(
		'heading1_margin_bottom_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading1_margin_bottom_enable',
			array(
				'label'    => __( 'enable Heading 1 bottom margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading1_margin_bottom_enable',
				'priority' => 12,
			)
		)
	);

	/*
	 * Heading 2 in all post area.
	 */

	// Font size.
	$wp_customize->add_setting(
		'heading2',
		array(
			'default'           => '30px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading2',
			array(
				'label'    => __( 'Heading 2 font size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading2',
				'priority' => 13,
			)
		)
	);
	$wp_customize->add_setting(
		'heading2_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading2_enable',
			array(
				'label'    => __( 'enable Heading 2 font size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading2_enable',
				'priority' => 14,
			)
		)
	);
	// Margin top.
	$wp_customize->add_setting(
		'heading2_margin_top',
		array(
			'default'           => '56px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading2_margin_top',
			array(
				'label'    => __( 'Heading 2 top margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading2_margin_top',
				'priority' => 15,
			)
		)
	);
	$wp_customize->add_setting(
		'heading2_margin_top_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading2_margin_top_enable',
			array(
				'label'    => __( 'enable Heading 2 top margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading2_margin_top_enable',
				'priority' => 16,
			)
		)
	);
	// Margin bottom.
	$wp_customize->add_setting(
		'heading2_margin_bottom',
		array(
			'default'           => '32px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading2_margin_bottom',
			array(
				'label'    => __( 'Heading 2 bottom margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading2_margin_bottom',
				'priority' => 17,
			)
		)
	);
	$wp_customize->add_setting(
		'heading2_margin_bottom_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading2_margin_bottom_enable',
			array(
				'label'    => __( 'enable Heading 2 bottom margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading2_margin_bottom_enable',
				'priority' => 18,
			)
		)
	);

	/*
	 * Heading 3 in all post area.
	 */

	// Font size.
	$wp_customize->add_setting(
		'heading3',
		array(
			'default'           => '24px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading3',
			array(
				'label'    => __( 'Heading 3 font size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading3',
				'priority' => 19,
			)
		)
	);
	$wp_customize->add_setting(
		'heading3_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading3_enable',
			array(
				'label'    => __( 'enable Heading 3 font size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading3_enable',
				'priority' => 20,
			)
		)
	);
	// Margin top.
	$wp_customize->add_setting(
		'heading3_margin_top',
		array(
			'default'           => '52px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading3_margin_top',
			array(
				'label'    => __( 'Heading 3 top margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading3_margin_top',
				'priority' => 21,
			)
		)
	);
	$wp_customize->add_setting(
		'heading3_margin_top_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading3_margin_top_enable',
			array(
				'label'    => __( 'enable Heading 3 top margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading3_margin_top_enable',
				'priority' => 22,
			)
		)
	);
	// Margin bottom.
	$wp_customize->add_setting(
		'heading3_margin_bottom',
		array(
			'default'           => '32px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading3_margin_bottom',
			array(
				'label'    => __( 'Heading 3 bottom margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading3_margin_bottom',
				'priority' => 23,
			)
		)
	);
	$wp_customize->add_setting(
		'heading3_margin_bottom_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading3_margin_bottom_enable',
			array(
				'label'    => __( 'enable Heading 3 bottom margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading3_margin_bottom_enable',
				'priority' => 24,
			)
		)
	);

	/*
	 * Heading 4 in all post area
	 */

	// Font size.
	$wp_customize->add_setting(
		'heading4',
		array(
			'default'           => '20px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading4',
			array(
				'label'    => __( 'Heading 4 font size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading4',
				'priority' => 25,
			)
		)
	);
	$wp_customize->add_setting(
		'heading4_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading4_enable',
			array(
				'label'    => __( 'enable Heading 4 font size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading4_enable',
				'priority' => 26,
			)
		)
	);
	// Margin top.
	$wp_customize->add_setting(
		'heading4_margin_top',
		array(
			'default'           => '52px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading4_margin_top',
			array(
				'label'    => __( 'Heading 4 top margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading4_margin_top',
				'priority' => 27,
			)
		)
	);
	$wp_customize->add_setting(
		'heading4_margin_top_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading4_margin_top_enable',
			array(
				'label'    => __( 'enable Heading 4 top margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading4_margin_top_enable',
				'priority' => 28,
			)
		)
	);
	// Margin bottom.
	$wp_customize->add_setting(
		'heading4_margin_bottom',
		array(
			'default'           => '32px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading4_margin_bottom',
			array(
				'label'    => __( 'Heading 4 bottom margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading4_margin_bottom',
				'priority' => 29,
			)
		)
	);
	$wp_customize->add_setting(
		'heading4_margin_bottom_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading4_margin_bottom_enable',
			array(
				'label'    => __( 'enable Heading 4 bottom margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading4_margin_bottom_enable',
				'priority' => 30,
			)
		)
	);

	/*
	 * Heading 5 in all post area.
	 */

	// Font size.
	$wp_customize->add_setting(
		'heading5',
		array(
			'default'           => '20px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading5',
			array(
				'label'    => __( 'Heading 5 font size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading5',
				'priority' => 31,
			)
		)
	);
	$wp_customize->add_setting(
		'heading5_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading5_enable',
			array(
				'label'    => __( 'enable Heading 5 font size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading5_enable',
				'priority' => 32,
			)
		)
	);
	// Margin top.
	$wp_customize->add_setting(
		'heading5_margin_top',
		array(
			'default'           => '48px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading5_margin_top',
			array(
				'label'    => __( 'Heading 5 top margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading5_margin_top',
				'priority' => 33,
			)
		)
	);
	$wp_customize->add_setting(
		'heading5_margin_top_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading5_margin_top_enable',
			array(
				'label'    => __( 'enable Heading 5 top margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading5_margin_top_enable',
				'priority' => 34,
			)
		)
	);
	// Margin bottom.
	$wp_customize->add_setting(
		'heading5_margin_bottom',
		array(
			'default'           => '32px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading5_margin_bottom',
			array(
				'label'    => __( 'Heading 5 bottom margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading5_margin_bottom',
				'priority' => 35,
			)
		)
	);
	$wp_customize->add_setting(
		'heading5_margin_bottom_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading5_margin_bottom_enable',
			array(
				'label'    => __( 'enable Heading 5 bottom margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading5_margin_bottom_enable',
				'priority' => 36,
			)
		)
	);

	/*
	 * Heading 6 in all post area.
	 */

	// Font size.
	$wp_customize->add_setting(
		'heading6',
		array(
			'default'           => '20px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading6',
			array(
				'label'    => __( 'Heading 6 font size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading6',
				'priority' => 37,
			)
		)
	);
	$wp_customize->add_setting(
		'heading6_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading6_enable',
			array(
				'label'    => __( 'enable Heading 6 font size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading6_enable',
				'priority' => 38,
			)
		)
	);
	// Margin top.
	$wp_customize->add_setting(
		'heading6_margin_top',
		array(
			'default'           => '48px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading6_margin_top',
			array(
				'label'    => __( 'Heading 6 top margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading6_margin_top',
				'priority' => 39,
			)
		)
	);
	$wp_customize->add_setting(
		'heading6_margin_top_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading6_margin_top_enable',
			array(
				'label'    => __( 'enable Heading 6 top margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading6_margin_top_enable',
				'priority' => 40,
			)
		)
	);
	// Margin bottom.
	$wp_customize->add_setting(
		'heading6_margin_bottom',
		array(
			'default'           => '32px',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading6_margin_bottom',
			array(
				'label'    => __( 'Heading 6 bottom margin size', 'kanagata' ),
				'section'  => 'size_section',
				'settings' => 'heading6_margin_bottom',
				'priority' => 41,
			)
		)
	);
	$wp_customize->add_setting(
		'heading6_margin_bottom_enable',
		array(
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'heading6_margin_bottom_enable',
			array(
				'label'    => __( 'enable Heading 6 bottom margin size.', 'kanagata' ),
				'type'     => 'checkbox',
				'section'  => 'size_section',
				'settings' => 'heading6_margin_bottom_enable',
				'priority' => 42,
			)
		)
	);

	/*
	 * Header right area.
	 */
	$wp_customize->add_section(
		'header_section',
		array(
			'title'       => __( 'Header right area', 'kanagata' ),
			'priority'    => 35,
			'description' => __( 'This area display on header right area', 'kanagata' ),
		)
	);
	$wp_customize->add_setting(
		'header_item_text',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'header_item_text', array(
				'label'    => __( 'Item text', 'kanagata' ),
				'section'  => 'header_section',
				'settings' => 'header_item_text',
				'priority' => 1,
			)
		)
	);
	$wp_customize->add_setting(
		'header_item_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'header_item_link', array(
				'label'    => __( 'Item link', 'kanagata' ),
				'section'  => 'header_section',
				'settings' => 'header_item_link',
				'priority' => 2,
			)
		)
	);
	$wp_customize->add_setting(
		'header_item_color',
		array(
			'default'           => '#333',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_item_color', array(
				'label'    => __( 'Item color', 'kanagata' ),
				'section'  => 'header_section',
				'settings' => 'header_item_color',
				'priority' => 3,
			)
		)
	);
	$wp_customize->add_setting(
		'header_item_image',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_item_image',
			array(
				'label'    => __( 'Item image', 'kanagata' ),
				'section'  => 'header_section',
				'settings' => 'header_item_image',
				'priority' => 4,
			)
		)
	);

	/*
	 * Footer.
	 */
	$wp_customize->add_section(
		'footer_section',
		array(
			'title'    => __( 'Footer', 'kanagata' ),
			'priority' => 55,
		)
	);
	// Footer background color.
	$wp_customize->add_setting(
		'footer_background_color',
		array(
			'default'           => '#ffffff',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'footer_background_color', array(
				'label'    => __( 'footer background color', 'kanagata' ),
				'section'  => 'footer_section',
				'settings' => 'footer_background_color',
			)
		)
	);
	// Copy right in footer.
	$wp_customize->add_setting(
		'footer_copyright',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'footer_copyright', array(
				'label'    => __( 'copy right', 'kanagata' ),
				'section'  => 'footer_section',
				'settings' => 'footer_copyright',
			)
		)
	);
	// Footer menu layout.
	$wp_customize->add_setting(
		'footer_menu_align',
		array(
			'default'           => 'left',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'kanagata_sanitize_footer',
		)
	);
	$wp_customize->add_control(
		'footer_menu_align',
		array(
			'label'    => __( 'align of Footer Menu that can be set at Appearance > Menu', 'kanagata' ),
			'section'  => 'footer_section',
			'settings' => 'footer_menu_align',
			'type'     => 'radio',
			'choices'  => array(
				'left'  => __( 'Left', 'kanagata' ),
				'right' => __( 'Right', 'kanagata' ),
			),
		)
	);

	/*
	 * Post meta information.
	 */
	$wp_customize->add_section(
		'post_meta_section',
		array(
			'title'       => __( 'Select to display post meta', 'kanagata' ),
			'priority'    => 56,
			'description' => __(
				'Select whether or not to display post meta.',
				'kanagata'
			),
		)
	);
	$wp_customize->add_setting(
		'post_meta',
		array(
			'default'           => 'yes',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'post_meta',
		array(
			'label'    => __( 'post meta', 'kanagata' ),
			'section'  => 'post_meta_section',
			'settings' => 'post_meta',
			'type'     => 'radio',
			'choices'  => array(
				'yes' => __( 'Yes', 'kanagata' ),
				'no'  => __( 'No', 'kanagata' ),
			),
		)
	);

	/*
	 * Top page post list.
	 */
	$wp_customize->add_section(
		'specific_category_section',
		array(
			'title'       => __( 'Category list displaying top page', 'kanagata' ),
			'priority'    => 57,
			'description' => __(
				'Input specific category name. that category post is shown on the top page as a list.',
				'kanagata'
			),
		)
	);
	// Specific_category_name.
	$wp_customize->add_setting(
		'specific_category_name',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'specific_category_name', array(
				'label'    => __( 'Category name', 'kanagata' ),
				'section'  => 'specific_category_section',
				'settings' => 'specific_category_name',
			)
		)
	);
	// Specific_category_num.
	$wp_customize->add_setting(
		'specific_category_num',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'specific_category_num', array(
				'label'    => __( 'Item number included in the list', 'kanagata' ),
				'section'  => 'specific_category_section',
				'settings' => 'specific_category_num',
			)
		)
	);
	$wp_customize->add_setting(
		'display_latest_post',
		array(
			'default'           => 'yes',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'kanagata_sanitize_yesno',
		)
	);
	$wp_customize->add_control(
		'display_latest_post',
		array(
			'label'    => __(
				'Whether or not display regular latest post when you display Specific category list.',
				'kanagata'
			),
			'section'  => 'specific_category_section',
			'settings' => 'display_latest_post',
			'type'     => 'radio',
			'choices'  => array(
				'yes' => __( 'Yes', 'kanagata' ),
				'no'  => __( 'No', 'kanagata' ),
			),
		)
	);

	/*
	 * Slide header image (default header image section).
	 */
	$wp_customize->add_setting(
		'slide_header_image',
		array(
			'default'           => 'no',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'slide_header_image',
		array(
			'label'    => __(
				'Select whether or not header image is slide.',
				'kanagata'
			),
			'section'  => 'header_image',
			'settings' => 'slide_header_image',
			'type'     => 'radio',
			'choices'  => array(
				'yes' => __( 'Yes', 'kanagata' ),
				'no'  => __( 'No', 'kanagata' ),
			),
		)
	);
}

add_action( 'customize_register', 'kanagata_customize_register' );
