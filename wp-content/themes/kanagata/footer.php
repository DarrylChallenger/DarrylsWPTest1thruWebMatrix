<?php
/**
 * The theme functions file
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0
 * @version    1.0
 */

?>
<div class="container clearfix">
	<div class="footer clearfix">
		<?php
		if ( has_nav_menu( 'footer' ) ) {
			echo '<div class="footer__menu">';
			wp_nav_menu(
				array(
					'theme_location'  => 'footer',
					'container_class' => 'menu-footer-container',
					'menu_class'      => 'menu-footer',
				)
			);
			echo '</div>' . PHP_EOL;
			echo '<!-- .footer__menu -->';
		}
		?>
		<div class="footer__copy">
			&copy; <?php echo esc_html( get_theme_mod( 'footer_copyright' ) ); ?>
			<?php _e( 'All Rights Reserved', 'kanagata' ); ?>
		</div>
	</div>
	<!-- .footer -->
</div>
<!-- .container -->
<?php wp_footer(); ?>
</body>
</html>
