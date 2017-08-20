<?php
/**
 * Theme custom sanitize functions
 *
 * @package    WordPress
 * @subpackage kanagata
 * @version    1.3.0
 * @since      1.2.2
 */

/**
 * Check whether the correct css color property
 *
 * @param  string $color css color string.
 *
 * @return boolean
 */
function kanagata_is_color( $color ) {
	if ( '' === $color ) {
		return false;
	}
	// 3 or 6 hex digits, or the empty string.
	if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Sanitize css color
 *
 * @param string $color css color string.
 *
 * @return string sanitized color.
 */
function kanagata_sanitize_color( $color ) {
	// 3 or 6 hex digits, or the empty string.
	if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}
	return '';
}

/**
 * Check whether float property is left or right
 *
 * Kanagata uses left or right. not none.
 *
 * @param  string $value Value is left or right.
 *
 * @return boolean
 */
function kanagata_is_sidebar_layout( $value ) {
	$float = array( 'left', 'right' );
	if ( in_array( $value, $float ) ) {
		return true;
	}

	return false;
}

/**
 * Sanitize sidebar layout
 *
 * If value is not left or right then return 'right'.
 *
 * @param string $value value is left or right.
 *
 * @return string left or right
 */
function kanagata_sanitize_sidebar_layout( $value ) {
	if ( kanagata_is_sidebar_layout( $value ) ) {
		return $value;
	}

	return 'right';
}

/**
 * Sanitize footer position
 *
 * If value is not (left | center | right) then return string 'left'.
 *
 * Center does not work well. So that center return left(since 1.4.3).
 *
 * @param string $value value is left, center, right.
 *
 * @return string left, right
 */
function kanagata_sanitize_footer( $value ) {
	if ( ! in_array( $value, array( 'left', 'center', 'right' ) ) ) {
		return 'left';
	}
	if ( 'center' === $value ) {
		return 'left';
	}

	return $value;
}

/**
 * Sanitize stylesheet version for add_setting
 *
 * If value is not latest or 1.2.4, then return 'latest'.
 *
 * @param string $value target value.
 *
 * @return string latest or 1.2.4
 */
function kanagata_sanitize_stylesheet_version( $value ) {
	$version = array( 'latest', '1.2.4' );
	if ( in_array( $value, $version ) ) {
		return $value;
	}

	return 'latest';
}

/**
 * Sanitize radio button input to yes or no.
 *
 * If value is not yes or no, then return 'yes'.
 *
 * @param  string $value    value is yes, no.
 *
 * @return string yes, no
 */
function kanagata_sanitize_yesno( $value ) {
	$pattern = '/(yes|no)/i';
	if ( false === preg_match( $pattern, $value ) ) {
		return 'yes';
	}

	return $value;
}
