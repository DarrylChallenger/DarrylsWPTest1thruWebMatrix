<?php
/**
 * Theme Option Edit
 *
 * @package    WordPress
 * @subpackage kanagata
 * @version    1.0.0
 * @since      1.0.0
 */

/**
 * Theme Option form
 *
 * Callback of kanagata_add_theme_options_page.
 *
 * @see   kanagata-options.php
 * @since 1.0.0
 */
function kanagata_theme_options_form() {
	?>
	<div class="kanagata_theme-options">
		<h1><?php printf( __( 'Theme Options', 'kanagata' ), wp_get_theme() ); ?></h1>

		<form method="post" action="options.php">
			<?php
			settings_fields( 'kanagata_options' );
			$options = kanagata_get_theme_options();
			?>
			<div class="kanagata_theme-options__content">
				<?php submit_button( __( 'Save Theme Options', 'kanagata' ), 'primary' ); ?>
				<h2><?php _e( 'Sidebar layout', 'kanagata' ); ?></h2>
				<?php
				// Sidebar layout.
				if ( empty( $options['layout'] ) ) {
					$default           = kanagata_get_default_theme_options();
					$options['layout'] = $default['layout'];
				}
				?>
				<fieldset>
					<?php
					// Makes radio button for layout.
					foreach ( kanagata_get_layout() as $layout ) : ?>
						<div class="layout">
							<label class="description">
								<input type="radio" 
									   name="kanagata_theme_options[layout]"
									   value="<?php echo esc_attr( $layout['value'] ); ?>" 
									<?php checked( $options['layout'], $layout['value'] ); ?> />
								<?php echo esc_html( $layout['label'] ); ?>
							</label>
						</div>
					<?php endforeach; ?>
				</fieldset>
				<h2><?php _e( 'Sidebar color', 'kanagata' ); ?></h2>
				<?php
				// Sidebar color.
				if ( empty( $options['side_color'] ) ) {
					$default               = kanagata_get_default_theme_options();
					$options['side_color'] = $default['side_color'];
				}
				?>
				<fieldset>
					<div class="side_color">
						<input class="wp-color-picker-field" type="text" name="kanagata_theme_options[side_color]"
							   value="<?php echo esc_attr( $options['side_color'] ); ?>">
					</div>
				</fieldset>
				<h2><?php _e( 'Specific category list for displaying top page', 'kanagata' ); ?></h2>

				<p><?php _e( 'Input specific category name of that is shown on the top page.', 'kanagata' ); ?></p>
				<fieldset>
					<?php

					/*
					 * Specific category list for displaying top page.
					 */

					// Category name.
					if ( empty( $options['specific_category_name'] ) ) {
						$default                           = kanagata_get_default_theme_options();
						$options['specific_category_name'] = $default['specific_category_name'];
					}
					?>
					<div class="category_name">
						<input type="text" name="kanagata_theme_options[specific_category_name]"
							   value="<?php echo esc_attr( $options['specific_category_name'] ); ?>">
					</div>
					<?php
					// Post item per list.
					if ( empty( $options['specific_category_num'] ) ) {
						$default                          = kanagata_get_default_theme_options();
						$options['specific_category_num'] = $default['specific_category_num'];
					}
					?>
					<p><?php _e( 'Item number included in the list', 'kanagata' ); ?></p>
					<div class="category_name">
						<input type="text" name="kanagata_theme_options[specific_category_num]"
							   value="<?php echo esc_attr( $options['specific_category_num'] ); ?>">
					</div>
				</fieldset>
				<h2><?php _e( 'Display regular latest post', 'kanagata' ); ?></h2>
				<?php
				// Whether or not display regular latest post when you display Specific category list.
				if ( empty( $options['display_latest_post'] ) ) {
					$default                        = kanagata_get_default_theme_options();
					$options['display_latest_post'] = $default['display_latest_post'];
				}
				?>
				<p>
					<?php _e(
						'Whether or not display regular latest post when you display Specific category list.',
						'kanagata'
					); ?>
				</p>
				<fieldset>
					<?php
					// Makes radio button for display regular latest post.
					foreach ( kanagata_get_display_latest_post() as $display ) : ?>
						<div class="display_latest_post">
							<label class="description">
								<input type="radio" 
									   name="kanagata_theme_options[display_latest_post]"
									   value="<?php echo esc_attr( $display['value'] ); ?>" 
									<?php checked( $options['display_latest_post'], $display['value'] ); ?> /> 
								<?php echo esc_html( $display['label'] ); ?>
							</label>
						</div>
					<?php endforeach; ?>
				</fieldset>
				<?php submit_button( __( 'Save Theme Options', 'kanagata' ), 'primary' ); ?>
			</div>
		</form>
		<div><p><a href="#wpwrap"><?php _e( 'Page top', 'kanagata' ); ?></a></p></div>
	</div><!-- .kanagata-theme-options -->
	<script>
		jQuery( function ( $ ) {
			$( function () {
				$( '.wp-color-picker-field' ).wpColorPicker();
			} );
		} );
	</script>
	<?php
}

/**
 * Validate input value of theme options page
 *
 * Callback of register_setting.
 *
 * @param string $input option form input value.
 * @return mixed validated input value
 */
function kanagata_validate_theme_options( $input ) {
	// Layout sanitize.
	if ( isset( $input['layout'] ) && ! array_key_exists( $input['layout'], kanagata_get_layout() ) ) {
		$input['layout'] = 'right';
	}
	// CSS color sanitize.
	if ( isset( $input['side_color'] ) ) {
		$input['side_color'] = kanagata_sanitize_color( $input['side_color'] );

	}
	if ( isset( $input['specific_category_name'] ) && '' !== $input['specific_category_name'] ) {
		$input['specific_category_name'] = sanitize_text_field( $input['specific_category_name'] );
	}
	if ( isset( $input['specific_category_num'] ) && '' !== $input['specific_category_num'] ) {
		$pattern = '/[^0-9]/';
		if ( 0 !== preg_match( $pattern, $input['specific_category_num'] ) ) {
			$input['specific_category_num'] = '5';
		}
	}
	if ( isset( $input['display_latest_post'] )
		 && ! in_array( $input['display_latest_post'], array( 'yes', 'no' ) )
	) {
		$input['display_latest_post'] = 'yes';
	}

	return $input;
}

?>
