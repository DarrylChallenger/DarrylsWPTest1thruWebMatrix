<?php
/**
 * The page template file
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0
 * @version    1.0
 */

get_header(); ?>
<div class="side col-lg-4 col-md-4 col-sm-12 col-xs-12<?php echo kanagata_get_layout_class( 'side' ); ?>">
	<div id="sidebar">
		<?php if ( has_nav_menu( 'side' ) ) : ?>
			<?php
			// Side menu.
			wp_nav_menu(
				array(
					'theme_location'  => 'side',
					'container_class' => 'menu-side-container',
					'menu_class'      => 'menu-side',
				)
			);
			?>
		<?php endif; ?>
		<?php
		// Home sidebar is displayed at only front page.
		if ( is_front_page() ) {
			if ( is_active_sidebar( 'home' ) ) {
				dynamic_sidebar( 'home' );
			}
		}
		// Sub sidebar is displayed at only sub page.
		if ( ! is_front_page() ) {
			if ( is_active_sidebar( 'sidebar' ) ) {
				dynamic_sidebar( 'sidebar' );
			}
		}
		// Common sidebar is displayed at all.
		if ( is_active_sidebar( 'common' ) ) {
			dynamic_sidebar( 'common' );
		}
		// There is no side menu and no one active sidebar.
		if ( is_front_page() ) :
			if ( ! has_nav_menu( 'side' )
				 && ! is_active_sidebar( ' home ' )
				 && ! is_active_sidebar( 'common ' )
			) : ?>
				<p>
					<?php _e( 'This theme is kanagata.', 'kanagata' ); ?><br>
					<?php _e( 'Side bar can be displayed in the following way.', 'kanagata' ); ?>
				</p>
				<ul>
					<li><?php _e( '1. Appearance &gt; Widgets.', 'kanagata' ); ?></li>
					<li><?php _e( '2. Appearance &gt; menu. Please create a menu named side.', 'kanagata' ); ?></li>
				</ul>
				<?php
			endif;
		endif;
		// There is no side menu and no one active sidebar.
		if ( ! is_front_page() ) :
			if ( ! has_nav_menu( 'side' )
				 && ! is_active_sidebar( 'sidebar' )
				 && ! is_active_sidebar( 'common ' )
			) : ?>
				<p>
					<?php _e( 'This theme is kanagata.', 'kanagata' ); ?><br>
					<?php _e( 'Side bar can be displayed in the following way.', 'kanagata' ); ?>
				</p>
				<ul>
					<li><?php _e( '1. Appearance &gt; Widgets.', 'kanagata' ); ?></li>
					<li><?php _e( '2. Appearance &gt; menu. Please create a menu named side.', 'kanagata' ); ?></li>
				</ul>
			<?php endif;
		endif; ?>
	</div><!-- #sidebar -->
</div><!-- .side -->
