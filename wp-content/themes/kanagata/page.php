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
<div class="container">
	<div class="row">
		<div class="main static-page col-lg-8 col-md-8 col-sm-12 col-xs-12<?php echo kanagata_get_layout_class( 'main' ); ?>">
			<div class="main-content">
				<div class="static-page__header">
					<div class="static-page__header__title">
						<h1><?php single_post_title(); ?></h1>
					</div><!-- .static-page__header__title -->
				</div><!-- .static_page__header -->
				<div class="static-page__body">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post() ?>
							<div <?php post_class( 'static-post clearfix' ); ?>>
								<div class="static-post__body">
									<?php the_content(); ?>
								</div>
								<div class="static-post__pagetop pagetop">
									<a href="#header">
										<?php _e( 'page top', 'kanagata' ); ?>
									</a>
								</div>
							</div><!-- static-post -->
							<?php wp_link_pages(); ?>
							<?php
						endwhile;
					endif;
					?>
				</div><!-- .static-page__body -->
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div><!-- .main-content -->
		</div><!-- .main .static-page -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
