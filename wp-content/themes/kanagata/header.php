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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<?php
	$slide = get_theme_mod( 'slide_header_image' );
	if ( 'yes' === $slide && true === is_front_page() ) :
		?>
		<script>
			jQuery( function ( $ ) {
				var slide = $( '.bxslider' ).bxSlider( {
					auto: false,
					speed: 2000,
					pause: 4000,
					mode: 'fade',
					captions: false
				} );
				$( window ).resize( function () {
					slide.reloadSlider();
				} );
			} );
		</script>
	<?php endif; ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
	<div id="header" class="header">
		<div class="header__left">
			<div class="header__logo clearfix">
				<h1>
					<?php
					$kanagata_home             = esc_url( home_url( '/' ) );
					$kanagata_logo             = esc_url( get_theme_mod( 'logo_image' ) );
					$kanagata_color            = kanagata_sanitize_color( get_theme_mod( 'site_title_color' ) );
					$kanagata_display_title    = get_theme_mod( 'display_site_title' );
					$kanagata_bloginfo         = esc_html( get_bloginfo( 'name' ) );
					$kanagata_bloginfo_display = esc_attr( get_bloginfo( 'name', 'display' ) );
					if ( ! empty( $kanagata_logo ) ) {
						if ( kanagata_is_color( $kanagata_color ) ) {
							if ( 'no' !== $kanagata_display_title ) {
								echo '<img alt="' . $kanagata_bloginfo_display . '"' . ' src="' . $kanagata_logo . '"/>'
									 . '<a style="color: ' . $kanagata_color . '" href="' . $kanagata_home . '"'
									 . ' title="' . $kanagata_bloginfo_display . '">' . $kanagata_bloginfo . '</a>';
							} else {
								echo '<a href="' . $kanagata_home . '" title="' . $kanagata_bloginfo_display . '">'
									 . '<img alt="' . $kanagata_bloginfo_display . '" src="' . $kanagata_logo . '"/></a>';
							}
						} else {
							echo '<img alt="' . $kanagata_bloginfo_display . '" src="' . $kanagata_logo . '"/>'
								 . '<a href="' . $kanagata_home . '" title="' . $kanagata_bloginfo_display . '" rel="home">'
								 . $kanagata_bloginfo . '</a>';
						}
					} else {
						if ( kanagata_is_color( $kanagata_color ) ) {
							echo '<a style="color: ' . $kanagata_color . '" href="' . $kanagata_home . '"';
						} else {
							echo '<a href="' . $kanagata_home . '"';
						}
						echo ' title="' . $kanagata_bloginfo_display . '" rel="home">' . $kanagata_bloginfo . '</a>';
					}
					?>
				</h1>
			</div><!-- .header__logo -->
		</div><!-- .header__left -->
		<div class="header__right clearfix">
			<?php if ( has_nav_menu( 'extra' ) ) : ?>
				<a id="sp_menu_extra" type="button" class="btn btn-default" aria-label="Extra Menu">
					<i class="fa fa-bars"></i>
				</a>
				<div class="header__menu-extra">
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'extra',
							'container_class' => 'menu-extra-container',
							'menu_class'      => 'menu-extra',
						)
					);
					?>
				</div><!-- .header__menu-extra -->
			<?php endif; ?>
			<div class="header__about">
				<?php
				$kanagata_header_link      = esc_url( get_theme_mod( 'header_item_link' ) );
				$kanagata_header_text      = esc_html( get_theme_mod( 'header_item_text' ) );
				$kanagata_header_text_attr = esc_attr( get_theme_mod( 'header_item_text' ) );
				$kanagata_header_color     = kanagata_sanitize_color( get_theme_mod( 'header_item_color' ) );
				$kanagata_header_image     = esc_url( get_theme_mod( 'header_item_image' ) );
				$kanagata_output           = '';
				if ( ! empty( $kanagata_header_image ) ) {
					// Have image.
					if ( empty( $kanagata_header_link ) ) {
						$kanagata_header_text = ( ! empty( $kanagata_header_text ) ) ? $kanagata_header_text : '';
						$kanagata_output      .= '<div class="header__about__item">'
												 . '<img src="' . $kanagata_header_image . '"'
												 . ' alt="' . $kanagata_header_text_attr . '"></div>';
					} else {
						$kanagata_header_text = ( ! empty( $kanagata_header_text ) ) ? $kanagata_header_text : '';
						$kanagata_output      .= '<div class="header__about__item"><a href="' . $kanagata_header_link . '">'
												 . '<img src="' . $kanagata_header_image . '" alt="' . $kanagata_header_text . '"></a></div>';
					}
				} else {
					// Have not image.
					$style = ' style="color: ' . ( ! empty( $kanagata_header_color ) ? $kanagata_header_color : '#333' ) . '"';
					if ( empty( $kanagata_header_link ) ) {
						$kanagata_output .= '<div class="header__about__item"' . $style . '>' . $kanagata_header_text . '</div>';
					} else {
						$kanagata_output .= '<div class="header__about__item">'
											. '<a href="' . $kanagata_header_link . '"' . $style . '>' . $kanagata_header_text . '</a></div>';
					}
				}
				echo $kanagata_output;
				?>
			</div><!-- .header__about -->
		</div><!-- .header__right -->
		<?php if ( '' !== get_bloginfo( 'description' ) ) : ?>
			<div class="header__description">
				<h2 class="header__description__text"><?php esc_html( bloginfo( 'description' ) ); ?></h2>
			</div><!-- .header__description -->
		<?php endif; ?>
	</div><!-- .header -->
</div><!-- .container -->
<?php if ( has_nav_menu( 'global' ) ) : ?>
	<div class="container">
		<div id="sp_toggle_menu"><a href="#"><?php _e( 'menu', 'kanagata' ); ?></a></div>
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'global',
				'container_class' => 'menu-global-container',
				'menu_class'      => 'menu-global',
			)
		);
		?>
	</div><!-- .container -->
<?php endif; ?>
<?php if ( ! empty( get_custom_header()->url ) ) : ?>
	<div class="container">
		<?php if ( is_front_page() ) : ?>
			<?php $slide = get_theme_mod( 'slide_header_image' ); ?>
			<?php if ( 'yes' !== $slide ) : ?>
				<div class="custom-header">
					<div>
						<img src="<?php echo esc_attr( get_custom_header()->url ); ?>" alt=""
							 width="<?php echo esc_attr( HEADER_IMAGE_WIDTH ); ?>"
							 height="<?php echo esc_attr( HEADER_IMAGE_HEIGHT ); ?>"/>
					</div>
				</div><!-- custom_header -->
			<?php else : ?>
				<?php
				$header_images = get_uploaded_header_images();
				if ( $header_images ) {
					echo '<ul class="bxslider">';
					foreach ( $header_images as $key => $value ) {
						echo '<li><img src="' . $value['url'] . '" /></li>';
					}
					echo '</ul>';
				} else {
					echo '<img id="frontpage-image" src="' . get_template_directory_uri() . '/image/default.png">';
				}
				?>
			<?php endif; ?>
		<?php endif; ?>
	</div><!-- .container -->
<?php endif; ?>
<?php if ( ! is_front_page() && function_exists( 'bcn_display' ) ) : ?>
	<div class="container breadcrumbs">
		<div class="row">
			<div class="col-xs-12">
				<?php bcn_display(); ?>
			</div>
		</div>
	</div><!-- .container -->
<?php endif; ?>
