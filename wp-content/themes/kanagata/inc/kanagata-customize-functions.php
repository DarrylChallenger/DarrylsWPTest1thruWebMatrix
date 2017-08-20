<?php
/**
 * Theme Customization functions
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.3.0
 * @version    1.3.0
 */

/**
 * Get Sidebar layout
 *
 * @return boolean|string false left, right
 * @since 1.3.0
 */
function kanagata_get_sidebar_layout() {
	// Give priority to Theme Options.
	$is_layout = kanagata_is_sidebar_layout( get_theme_mod( 'sidebar_layout' ) );
	if ( $is_layout ) {
		$layout = kanagata_sanitize_sidebar_layout( get_theme_mod( 'sidebar_layout' ) );

		return $layout;
	}
	$is_layout = kanagata_is_sidebar_layout( kanagata_get_theme_option_value( 'layout' ) );
	if ( $is_layout ) {
		$layout = kanagata_sanitize_sidebar_layout( kanagata_get_theme_option_value( 'layout' ) );

		return $layout;
	}

	return 'right';
}

/**
 * Get css class for layout
 *
 * @param string $target element class (main or side).
 * @return string class name for layout.
 */
function kanagata_get_layout_class( $target ) {
	$layout = kanagata_get_sidebar_layout();
	$data   = array();
	if ( 'left' === $layout ) {
		$data['main'] = ' pull-right';
		$data['side'] = ' pull-left';
	} else {
		$data['main'] = ' pull-left';
		$data['side'] = ' pull-right';
	}
	if ( 'main' === $target ) {
		return $data['main'];
	}
	if ( 'side' === $target ) {
		return $data['side'];
	}

	return '';
}

/**
 * Get style that sets at Customizer API
 *
 * @return string style that set customizer api. no style return empty string.
 */
function kanagata_get_customize_style() {
	$style = '';

	/*
	 * link
	 */

	// Color.
	$a_color = kanagata_sanitize_color( get_theme_mod( 'link_a_color', '#337ab7' ) );
	if ( '#337ab7' !== $a_color ) {
		$style .= 'a {color: ' . $a_color . ';}' . PHP_EOL;
	}
	$a_link_color = kanagata_sanitize_color( get_theme_mod( 'link_a_link_color', '#23527c' ) );
	if ( '#23527c' !== $a_link_color ) {
		$style .= 'a:link {color: ' . $a_link_color . ';}' . PHP_EOL;
	}
	$a_active_color = kanagata_sanitize_color( get_theme_mod( 'link_a_active_color', '#337ab7' ) );
	if ( '#337ab7' !== $a_active_color ) {
		$style .= 'a:active {color: ' . $a_active_color . ';}' . PHP_EOL;
	}
	$a_visited_color = kanagata_sanitize_color( get_theme_mod( 'link_a_visited_color', '#337ab7' ) );
	if ( '#337ab7' !== $a_visited_color ) {
		$style .= 'a:visited {color: ' . $a_visited_color . ';}' . PHP_EOL;
	}
	$a_hover_color = kanagata_sanitize_color( get_theme_mod( 'link_a_hover_color', '#23527c' ) );
	if ( '#23527c' !== $a_hover_color ) {
		$style .= 'a:hover {color: ' . $a_hover_color . ';}' . PHP_EOL;
	}
	// Underline.
	$underline = sanitize_text_field( get_theme_mod( 'text_decoration', 'underline' ) );
	if ( 'underline' !== $underline ) {
		$style .= 'a {text-decoration: ' . $underline . '! important;}' . PHP_EOL;
	}

	/*
	 * Background color.
	 */

	// Global menu.
	$global_menu = kanagata_sanitize_color( get_theme_mod( 'menu-global-container_background_color', '#ffffff' ) );
	if ( '#ffffff' !== $global_menu ) {
		$style .= '.menu-global-container {background-color: ' . $global_menu . ';}' . PHP_EOL;
	}
	// Global dropdown menu.
	$global_dropdown = kanagata_sanitize_color( get_theme_mod( 'menu_global_dropdown', '#e1e1e1' ) );
	if ( '#e1e1e1' !== $global_dropdown ) {
		$style .= '.menu-global-container ul ul {background-color: ' . $global_dropdown . ';}';
		$style .= '.menu-global-container ul ul a {background-color: ' . $global_dropdown . ';}';
		$style .= '.menu-global-container ul ul a:hover {background-color: ' . $global_dropdown . ';}';
		$style .= '.menu-global-container ul ul li.focus a {background-color: ' . $global_dropdown . ';}';
		$style .= '.menu-global-container li:hover {background-color: ' . $global_dropdown . ';}';
		$style .= '.menu-global-container li:hover a {background-color: ' . $global_dropdown . ';}';
		$style .= '.menu-global-container li.focus a {background-color: ' . $global_dropdown . ';}';
		$style .= '.menu-global-container ul li li.focus > a {background-color: ' . $global_dropdown . ';}';
	}
	// Extra dropdown menu.
	$extra_dropdown = kanagata_sanitize_color( get_theme_mod( 'menu_extra_dropdown', '#e1e1e1' ) );
	if ( '#e1e1e1' !== get_theme_mod( 'menu_extra_dropdown', '#e1e1e1' ) ) {
		$style .= '.menu-extra-container ul ul {background-color: ' . $extra_dropdown . ';}';
		$style .= '.menu-extra-container li:hover {background-color: ' . $extra_dropdown . ';}';
		$style .= '.menu-extra-container li:hover > a {background-color: ' . $extra_dropdown . ';}';
		$style .= '.menu-extra-container li.focus {background-color: ' . $extra_dropdown . ';}';
		$style .= '.menu-extra-container li.focus > a {background-color: ' . $extra_dropdown . ';}';
	}

	/*
	 * Sidebar
	 * sidebar background can set both Theme Options and Customize.
	 * Theme Options reminds compatibility for 1.2.4 below.
	 */
	$sidebar_color = kanagata_sanitize_color( kanagata_get_theme_option_value( 'side_color', '#ffffff' ) );
	if ( '#ffffff' !== $sidebar_color ) {
		$style .= '#sidebar {background-color: ' . $sidebar_color . ';}' . PHP_EOL;
	}
	// Customize more priority of Theme Options.
	$sidebar_color = kanagata_sanitize_color( get_theme_mod( 'sidebar_background_color', '#ffffff' ) );
	if ( '#ffffff' !== $sidebar_color ) {
		$style .= '#sidebar {background-color: ' . $sidebar_color . ';}' . PHP_EOL;
	}

	/*
	 * Size
	 * return string 1 if checkbox is checked.
	 * return string "" if checkbox is not checked.
	 */

	// Static page title(h1).
	$kanagata_static_page_title        = sanitize_text_field( get_theme_mod( 'static_page_title' ) );
	$kanagata_static_page_title_enable = get_theme_mod( 'static_page_title_enable' );
	if ( '1' === $kanagata_static_page_title_enable && ! empty( $kanagata_static_page_title ) ) {
		$style .= '.static-page__header__title h1 {font-size: ' . $kanagata_static_page_title . '!important ;}' . PHP_EOL;
	}
	$kanagata_static_page_title_margin_top        = sanitize_text_field(
		get_theme_mod( 'static_page_title_margin_top' )
	);
	$kanagata_static_page_title_margin_top_enable = get_theme_mod( 'static_page_title_margin_top_enable' );
	if ( '1' === $kanagata_static_page_title_margin_top_enable && ! empty( $kanagata_static_page_title_margin_top ) ) {
		$style .= '.static-page__header__title h1 {margin-top: '
				  . $kanagata_static_page_title_margin_top . '!important;}' . PHP_EOL;
	}
	$kanagata_static_page_title_margin_bottom        = sanitize_text_field(
		get_theme_mod( 'static_page_title_margin_bottom' )
	);
	$kanagata_static_page_title_margin_bottom_enable = get_theme_mod( 'static_page_title_margin_bottom_enable' );
	if ( '1' === $kanagata_static_page_title_margin_bottom_enable && ! empty( $kanagata_static_page_title_margin_bottom ) ) {
		$style .= '.static-page__header__title {margin-bottom: '
				  . $kanagata_static_page_title_margin_bottom . '!important;}' . PHP_EOL;
	}
	// Heading 1 in all post area.
	$kanagata_heading1        = sanitize_text_field( get_theme_mod( 'heading1' ) );
	$kanagata_heading1_enable = get_theme_mod( 'heading1_enable' );
	if ( '1' === $kanagata_heading1_enable && ! empty( $kanagata_heading1 ) ) {
		$style .= '.main h1 {font-size: ' . $kanagata_heading1 . ';}' . PHP_EOL;
	}
	$kanagata_heading1_margin_top        = sanitize_text_field( get_theme_mod( 'heading1_margin_top' ) );
	$kanagata_heading1_margin_top_enable = get_theme_mod( 'heading1_margin_top_enable' );
	if ( '1' === $kanagata_heading1_margin_top_enable && ! empty( $kanagata_heading1_margin_top ) ) {
		$style .= '.main h1 {margin-top: ' . $kanagata_heading1_margin_top . '!important;}' . PHP_EOL;
	}
	$kanagata_heading1_margin_bottom        = sanitize_text_field( get_theme_mod( 'heading1_margin_bottom' ) );
	$kanagata_heading1_margin_bottom_enable = get_theme_mod( 'heading1_margin_bottom_enable' );
	if ( '1' === $kanagata_heading1_margin_bottom_enable && ! empty( $kanagata_heading1_margin_bottom ) ) {
		$style .= '.main h1 {margin-bottom: ' . $kanagata_heading1_margin_bottom . '!important;}' . PHP_EOL;
	}
	// Heading 2 in all post area.
	$kanagata_heading2        = sanitize_text_field( get_theme_mod( 'heading2' ) );
	$kanagata_heading2_enable = get_theme_mod( 'heading2_enable' );
	if ( '1' === $kanagata_heading2_enable && ! empty( $kanagata_heading2 ) ) {
		$style .= '.main h2 {font-size: ' . $kanagata_heading2 . '!important;}' . PHP_EOL;
	}
	$kanagata_heading2_margin_top        = sanitize_text_field( get_theme_mod( 'heading2_margin_top' ) );
	$kanagata_heading2_margin_top_enable = get_theme_mod( 'heading2_margin_top_enable' );
	if ( '1' === $kanagata_heading2_margin_top_enable && ! empty( $kanagata_heading2_margin_top ) ) {
		$style .= '.main h2 {margin-top: ' . $kanagata_heading2_margin_top . '!important;}' . PHP_EOL;
	}
	$kanagata_heading2_margin_bottom        = sanitize_text_field( get_theme_mod( 'heading2_margin_bottom' ) );
	$kanagata_heading2_margin_bottom_enable = get_theme_mod( 'heading2_margin_bottom_enable' );
	if ( '1' === $kanagata_heading2_margin_bottom_enable && ! empty( $kanagata_heading2_margin_bottom ) ) {
		$style .= '.main h2 {margin-bottom: ' . $kanagata_heading2_margin_bottom . '!important;}' . PHP_EOL;
	}
	// Heading 3 in all post area.
	$kanagata_heading3        = sanitize_text_field( get_theme_mod( 'heading3' ) );
	$kanagata_heading3_enable = get_theme_mod( 'heading3_enable' );
	if ( '1' === $kanagata_heading3_enable && ! empty( $kanagata_heading3 ) ) {
		$style .= '.main h3 {font-size: ' . $kanagata_heading3 . '!important;}' . PHP_EOL;
	}
	$kanagata_heading3_margin_top        = sanitize_text_field( get_theme_mod( 'heading3_margin_top' ) );
	$kanagata_heading3_margin_top_enable = get_theme_mod( 'heading3_margin_top_enable' );
	if ( '1' === $kanagata_heading3_margin_top_enable && ! empty( $kanagata_heading3_margin_top ) ) {
		$style .= '.main h3 {margin-top: ' . $kanagata_heading3_margin_top . '!important;}' . PHP_EOL;
	}
	$kanagata_heading3_margin_bottom        = sanitize_text_field( get_theme_mod( 'heading3_margin_bottom' ) );
	$kanagata_heading3_margin_bottom_enable = get_theme_mod( 'heading3_margin_bottom_enable' );
	if ( '1' === $kanagata_heading3_margin_bottom_enable && ! empty( $kanagata_heading3_margin_bottom ) ) {
		$style .= '.main h3 {margin-bottom: ' . $kanagata_heading3_margin_bottom . '!important;}' . PHP_EOL;
	}
	// Heading 4 in all post area.
	$kanagata_heading4        = sanitize_text_field( get_theme_mod( 'heading4' ) );
	$kanagata_heading4_enable = get_theme_mod( 'heading4_enable' );
	if ( '1' === $kanagata_heading4_enable && ! empty( $kanagata_heading4 ) ) {
		$style .= '.main h4 {font-size: ' . $kanagata_heading4 . '!important;}' . PHP_EOL;
	}
	$kanagata_heading4_margin_top        = sanitize_text_field( get_theme_mod( 'heading4_margin_top' ) );
	$kanagata_heading4_margin_top_enable = get_theme_mod( 'heading4_margin_top_enable' );
	if ( '1' === $kanagata_heading4_margin_top_enable && ! empty( $kanagata_heading4_margin_top ) ) {
		$style .= '.main h4 {margin-top: ' . $kanagata_heading4_margin_top . '!important;}' . PHP_EOL;
	}
	$kanagata_heading4_margin_bottom        = sanitize_text_field( get_theme_mod( 'heading4_margin_bottom' ) );
	$kanagata_heading4_margin_bottom_enable = get_theme_mod( 'heading4_margin_bottom_enable' );
	if ( '1' === $kanagata_heading4_margin_bottom_enable && ! empty( $kanagata_heading4_margin_bottom ) ) {
		$style .= '.main h4 {margin-bottom: ' . $kanagata_heading4_margin_bottom . '!important;}' . PHP_EOL;
	}
	// Heading 5 in all post area.
	$kanagata_heading5        = sanitize_text_field( get_theme_mod( 'heading5' ) );
	$kanagata_heading5_enable = get_theme_mod( 'heading5_enable' );
	if ( '1' === $kanagata_heading5_enable && ! empty( $kanagata_heading5 ) ) {
		$style .= '.main h5 {font-size: ' . $kanagata_heading5 . '!important;}' . PHP_EOL;
	}
	$kanagata_heading5_margin_top        = sanitize_text_field( get_theme_mod( 'heading5_margin_top' ) );
	$kanagata_heading5_margin_top_enable = get_theme_mod( 'heading5_margin_top_enable' );
	if ( '1' === $kanagata_heading5_margin_top_enable && ! empty( $kanagata_heading5_margin_top ) ) {
		$style .= '.main h5 {margin-top: ' . $kanagata_heading5_margin_top . '!important;}' . PHP_EOL;
	}
	$kanagata_heading5_margin_bottom        = sanitize_text_field( get_theme_mod( 'heading5_margin_bottom' ) );
	$kanagata_heading5_margin_bottom_enable = get_theme_mod( 'heading5_margin_bottom_enable' );
	if ( '1' === $kanagata_heading5_margin_bottom_enable && ! empty( $kanagata_heading5_margin_bottom ) ) {
		$style .= '.main h5 {margin-bottom: ' . $kanagata_heading5_margin_bottom . '!important;}' . PHP_EOL;
	}
	// Heading 6 in all post area.
	$kanagata_heading6        = sanitize_text_field( get_theme_mod( 'heading6' ) );
	$kanagata_heading6_enable = get_theme_mod( 'heading6_enable' );
	if ( '1' === $kanagata_heading6_enable && ! empty( $kanagata_heading6 ) ) {
		$style .= '.main h6 {font-size: ' . $kanagata_heading6 . '!important;}' . PHP_EOL;
	}
	$kanagata_heading6_margin_top        = sanitize_text_field( get_theme_mod( 'heading6_margin_top' ) );
	$kanagata_heading6_margin_top_enable = get_theme_mod( 'heading6_margin_top_enable' );
	if ( '1' === $kanagata_heading6_margin_top_enable && ! empty( $kanagata_heading6_margin_top ) ) {
		$style .= '.main h6 {margin-top: ' . $kanagata_heading6_margin_top . '!important;}' . PHP_EOL;
	}
	$kanagata_heading6_margin_bottom        = sanitize_text_field( get_theme_mod( 'heading6_margin_bottom' ) );
	$kanagata_heading6_margin_bottom_enable = get_theme_mod( 'heading6_margin_bottom_enable' );
	if ( '1' === $kanagata_heading6_margin_bottom_enable && ! empty( $kanagata_heading6_margin_bottom ) ) {
		$style .= '.main h6 {margin-bottom: ' . $kanagata_heading6_margin_bottom . '!important;}' . PHP_EOL;
	}

	/*
	 * Footer.
	 */

	// Background color.
	$kanagata_footer_color = sanitize_text_field( get_theme_mod( 'footer_background_color', '#ffffff' ) );
	if ( '#ffffff' !== $kanagata_footer_color ) {
		$style .= '.footer {background-color: ' . $kanagata_footer_color . ';}' . PHP_EOL;
	}
	// Position.
	$footer_menu_align = kanagata_sanitize_footer( get_theme_mod( 'footer_menu_align', 'center' ) );
	if ( 'right' === $footer_menu_align ) {
		$style .= '.footer__menu {float: right;}';
	}

	/*
	 * Pager
	 */
	$kanagata_pager_color = sanitize_text_field( get_theme_mod( 'pager_background_color', '#e1e1e1' ) );
	if ( '#e1e1e1' !== $kanagata_pager_color ) {
		$style .= '.pager .current {background-color: ' . $kanagata_pager_color . ';}' . PHP_EOL;
		$style .= '.pager .page-numbers:hover  {background-color: ' . $kanagata_pager_color . ';}' . PHP_EOL;
	}

	/*
	 * Heading1.
	 */
	$kanagata_heading_color = kanagata_sanitize_color( get_theme_mod( 'heading_background_color', '#e1e1e1' ) );
	if ( '#e1e1e1' !== $kanagata_heading_color ) {
		$style .= '.index__customization__header__title h1,'
				  . '.static-page__header__title  h1,'
				  . '.category__header__title h1,'
				  . '.single-post__header__title h1 {background-color: ' . $kanagata_heading_color . ';}';
	}

	return $style;
}

/**
 * Specific category post display on top page
 *
 * @return array specific category information.
 */
function kanagata_get_specific_category() {
	$data             = array();
	$kanagata_options = get_option( 'kanagata_theme_options' );
	if ( false !== get_theme_mod( 'specific_category_name' ) && '' !== get_theme_mod( 'specific_category_name' ) ) {
		$data['specific_category_name'] = sanitize_text_field( get_theme_mod( 'specific_category_name' ) );
	} else {
		if ( isset( $kanagata_options['specific_category_name'] ) && '' !== $kanagata_options['specific_category_name'] ) {
			$data['specific_category_name'] = sanitize_text_field( $kanagata_options['specific_category_name'] );
		}
	}
	if ( false !== get_theme_mod( 'specific_category_num' ) ) {
		$data['specific_category_num'] = (int) get_theme_mod( 'specific_category_num' );
	} else {
		$data['specific_category_num'] =
			( ! empty( $kanagata_options['specific_category_num'] ) ) ? (int) $kanagata_options['specific_category_num'] : 5;
	}
	if ( 'yes' === get_theme_mod( 'display_latest_post' ) ) {
		$data['display_latest_post'] = 'yes';
	} else {
		if ( 'no' === get_theme_mod( 'display_latest_post' ) ) {
			$data['display_latest_post'] = 'no';
		} else {
			$data['display_latest_post'] = sanitize_text_field( $kanagata_options['display_latest_post'] );
		}
	}

	return $data;
}

