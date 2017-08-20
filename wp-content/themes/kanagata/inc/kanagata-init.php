<?php
/**
 * Theme Initialization
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0.0
 * @version    1.0.0
 */

/**
 * Load text domain
 */
function kanagata_load_domain() {
	load_theme_textdomain( 'kanagata', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'kanagata_load_domain' );

/**
 * Define constant variable
 *
 * @since 1.0.0
 */
function kanagata_set_constant() {
	define( 'KANAGATA_URL', get_template_directory_uri() );
	define( 'KANAGATA_ASSETS_URL', KANAGATA_URL );
	define( 'KANAGATA_ASSETS_JS_URL', KANAGATA_ASSETS_URL . '/js' );
	define( 'KANAGATA_ASSETS_CSS_URL', KANAGATA_ASSETS_URL . '/css' );
}

add_action( 'after_setup_theme', 'kanagata_set_constant' );

/**
 * Execute theme support
 *
 * @since 1.0.0
 */
function kanagata_add_theme_support() {
	/* auto feed */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	/* menu */
	register_nav_menu( 'global', __( 'Global Menu', 'kanagata' ) );
	register_nav_menu( 'extra', __( 'Extra Menu', 'kanagata' ) );
	register_nav_menu( 'side', __( 'Side Menu', 'kanagata' ) );
	register_nav_menu( 'footer', __( 'Footer Menu', 'kanagata' ) );
	/* post thumbnails(eye catch) */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 150 );
	/* custom background */
	add_theme_support( 'custom-background' );
	/* editor style */
	add_editor_style( 'editor-style.css' );
	/* static page excerpt */
	add_post_type_support( 'page', 'excerpt' );
}

add_action( 'after_setup_theme', 'kanagata_add_theme_support' );

/**
 * Add custom header to theme support
 *
 * Callback of after_setup_theme hook.
 * Remove Default image at Version 1.4.6.
 *
 * @since 1.0
 */
function kanagata_custom_header() {
	$args = array(
		'width'               => 1140,
		'height'              => 330,
		'header-text'         => false,
		'default-text-color'  => '303030',
		'default-image'       => '',
		'random-default'      => false,
		'wp-head-callback'    => 'kanagata_header_style',
		'admin-head-callback' => 'kanagata_admin_header_style',
	);
	$args = apply_filters( 'kanagata_custom_header_args', $args );
	if ( function_exists( 'get_custom_header' ) ) {
		add_theme_support( 'custom-header', $args );
	} else {
		define( 'NO_HEADER_TEXT', true );
		define( 'HEADER_TEXTCOLOR', $args['default-text-color'] );
		define( 'HEADER_IMAGE', $args['default-image'] );
		define( 'HEADER_IMAGE_WIDTH', $args['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
		$args['wp-head-callback'];
		$args['admin-head-callback'];
		add_theme_support( 'custom-background', $args );
	}
}

add_action( 'after_setup_theme', 'kanagata_custom_header' );

/**
 * Be included in the site header
 *
 * Custom background callback in kanagata_add_theme_support function.
 *
 * @since 1.0
 */
function kanagata_header_style() {
	$header_image = get_header_image();
	if ( empty( $header_image ) ) {
		return;
	}
	?>
	<style type="text/css">
		#header-wrap {
			background: url(<?php header_image(); ?>) no-repeat center;
		}
	</style>
	<?php
}

/**
 * Be included in the admin header
 *
 * Custom background callback in kanagata_add_theme_support function.
 *
 * @since 1.0
 */
function kanagata_admin_header_style() {
	?>
	<style type="text/css">
		#headimg {
			width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
			height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
			background: no-repeat;
		}
	</style>
	<?php
}

/**
 * Add custom background to theme support
 *
 * Callback of after_setup_theme.
 *
 * @since 1.0
 */
function kanagata_custom_background() {
	$args = array(
		'default-color' => 'eeeeee',
		'default-image' => '',
	);
	if ( function_exists( 'get_custom_header' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_theme_support( 'custom-background', $args );
	}
}

add_action( 'after_setup_theme', 'kanagata_custom_background' );

/**
 * Stop no use function of wp_head
 *
 * @since 1.0.0
 */
function remove_no_use_wp_head() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	remove_action( 'wp_head', 'feed_links_extra' );
}

add_action( 'after_setup_theme', 'remove_no_use_wp_head' );

/**
 * Register widget
 *
 * @since 1.0.0
 */
function kanagata_register_widget() {
	$widgets = array(
		'common' => array(
			'name'          => __( 'Common', 'kanagata' ),
			'description'   => __(
				'This is the sidebar to display on all page.',
				'kanagata'
			),
			'id'            => 'common',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>',
		),
		'home'   => array(
			'name'          => __( 'Home', 'kanagata' ),
			'description'   => __( 'Top Content on the home page', 'kanagata' ),
			'id'            => 'home',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>',
		),
		'sub'    => array(
			'name'          => __( 'Sub', 'kanagata' ),
			'description'   => __(
				'This is the sidebar to display on all page except for the top page.',
				'kanagata'
			),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>',
		),

	);
	foreach ( $widgets as $widget ) {
		register_sidebar( $widget );
	}
}

add_action( 'widgets_init', 'kanagata_register_widget' );


/**
 * Register item to admin bar
 *
 * @param object $wp_admin_bar from WordPress system.
 */
function kanagata_add_item_to_admin_bar_menu( $wp_admin_bar ) {
	$wp_admin_bar->add_menu(
		array(
			'id'    => 'theme_customization',
			'meta'  => array(),
			'title' => __( 'Customize', 'kanagata' ),
			'href'  => admin_url( 'customize.php' ),
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'    => 'nav_menu',
			'meta'  => array(),
			'title' => __( 'Menu', 'kanagata' ),
			'href'  => admin_url( 'nav-menus.php' ),
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'    => 'theme_options',
			'meta'  => array(),
			'title' => __( 'Theme Options', 'kanagata' ),
			'href'  => admin_url( 'themes.php?page=kanagata_theme_options' ),
		)
	);
}

add_action( 'admin_bar_menu', 'kanagata_add_item_to_admin_bar_menu', 9999 );

/**
 * Load theme custom core files.
 */
function kanagata_load_core() {
	require_once( get_template_directory() . '/inc/kanagata-header.php' );
	require_once( get_template_directory() . '/inc/kanagata-sanitize.php' );
	require_once( get_template_directory() . '/inc/kanagata-customize.php' );
	require_once( get_template_directory() . '/inc/kanagata-customize-functions.php' );
	require_once( get_template_directory() . '/inc/kanagata-options.php' );
	require_once( get_template_directory() . '/inc/kanagata-options-edit.php' );
}

add_action( 'after_setup_theme', 'kanagata_load_core' );
