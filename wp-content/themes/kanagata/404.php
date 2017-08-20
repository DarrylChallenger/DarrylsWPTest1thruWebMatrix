<?php
/**
 * 404 template file
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0
 * @version    1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="main static-page col-lg-8 col-md-8 col-sm-12 col-xs-12<?php echo kanagata_get_layout_class( 'main' ); ?>">
			<div class="main-content">
				<div class="static-page__header">
					<div class="static-page__header__title">
						<h1><?php _e( 'We\'re sorry.', 'kanagata' ); ?></h1>
					</div>
					<!-- .static-page__header__title -->
				</div>
				<!-- .static_page__header -->
				<div class="static-page__body">
					<div class="static-post">
						<div class="static-post__body">
							<p>
								<?php _e(
									'It was not possible to find the page you are looking for.',
									'kanagata'
								); ?>
							</p>

							<p>
								&raquo; <a href="<?php echo esc_url( home_url() ); ?>">
									<?php _e( 'HOME', 'kanagata' ); ?>
								</a>
							</p>
						</div>
						<!-- static-post__body -->
						<div class="page-post__pagetop pagetop">
							<a href="#header"><?php _e( 'page top', 'kanagata' ); ?></a>
						</div>
					</div>
					<!-- .static-post -->
				</div>
				<!-- static-page__body -->
			</div>
			<!-- .main-content -->
		</div>
		<!-- .main .static-page -->
		<?php get_sidebar(); ?>
	</div>
	<!-- .row -->
</div>
<!-- .container -->
<?php get_footer(); ?>
