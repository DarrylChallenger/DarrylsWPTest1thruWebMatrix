<?php
/**
 * The theme functions file
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0
 * @version    1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 718;
}
/**
 * Display post meta information list
 */
function kanagata_metalist() {
	?>
	<ul class="list-meta">
		<li class="list-meta__item--date"> <?php echo esc_html( get_the_date() ); ?></li>
		<li class="list-meta__item--link">
			<a href="<?php the_permalink(); ?>">
				<?php _e( 'permalink', 'kanagata' ); ?>
			</a>
		</li>
		<li class="list-meta__item--category"> <?php the_category( ', ' ); ?></li>
		<li class="list-meta__item--tag">&nbsp;
			<?php if ( get_the_tags() ) : ?>
				<?php the_tags( '', ' , ' ); ?>
			<?php else : ?>
				<?php echo _e( 'no tag', 'kanagata' ); ?>
			<?php endif; ?>
		</li>
		<li class="list-meta__item--comments">
			<?php comments_popup_link(
				__( 'Comments (0)', 'kanagata' ),
				__( 'Comments (1)', 'kanagata' ),
				__( 'Comments (%)', 'kanagata' )
			); ?>
		</li>
	</ul><!-- /meta-list -->
	<?php
}

/**
 * Get pagetop link
 *
 * @param array $options option is dest, classname, text.
 *
 * @return string HTML markup
 */
function kanagata_pagetop( $options = array() ) {
	$defaults   = array(
		'dest'      => 'header',
		'classname' => 'pagetop',
		'text'      => __( 'page top', 'kanagata' ),
	);
	$parameters = array_merge( $defaults, $options );
	echo '<div class="' . esc_attr( $parameters['classname'] ) . '">' .
		 '<a href="#' . esc_attr( $parameters['dest'] ) . '">' . esc_html( $parameters['text'] ) . '</a></div>';

	return;
}

/**
 * Get pagetop link
 *
 * @param array $options option is classname, text.
 *
 * @return string HTML markup
 */
function kanagata_pageback( $options = array() ) {
	$defaults = array(
		'classname' => 'pageback',
		'text'      => __( 'page back', 'kanagata' ),
	);
	$parameters = array_merge( $defaults, $options );
	echo '<div class="' . esc_attr( $parameters['classname'] ) . '">' .
		 '<a href="#" onclick="history.back(); return false;">' . esc_html( $parameters['text'] ) . '</a></div>';

	return;
}

/**
 * Get category slags from category names
 *
 * @param string $name      category name.
 * @param string $delimiter delimiter.
 */
function kanagata_catnames_to_slugs( $name, $delimiter ) {
	if ( ! isset( $name ) || '' === $name ) {
		return false;
	}
	$cat_names = explode( $delimiter, $name );
	$cat_slugs = array();
	foreach ( $cat_names as $cat_name ) {
		$cat_id = get_cat_ID( trim( $cat_name ) );
		if ( 0 !== $cat_id ) {
			$cat = get_category( $cat_id );
			array_push( $cat_slugs, $cat->slug );
		}
	}

	return $cat_slugs;
}

/**
 * Set excerpt length
 *
 * @param string $length from WordPress system.
 *
 * @return number excerpt length
 */
function kanagata_new_excerpt_mblength( $length ) {
	return 1000;
}

add_filter( 'excerpt_mblength', 'kanagata_new_excerpt_mblength' );

/**
 * Set ..... on excerpt more string
 *
 * @param string $more from WordPress system.
 *
 * @return string
 */
function kanagata_new_excerpt_more( $more ) {
	return '&middot;&middot;&middot;&middot;&middot';
}

add_filter( 'excerpt_more', 'kanagata_new_excerpt_more' );

/*
 * initialization
 */
require_once( get_template_directory() . '/inc/kanagata-init.php' );
