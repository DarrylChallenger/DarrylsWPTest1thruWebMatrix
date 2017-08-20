<?php
/**
 * The basic template file
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0
 * @version    1.0
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="main index-page col-lg-8 col-md-8 col-sm-12 col-xs-12<?php echo kanagata_get_layout_class( 'main' ); ?>">
				<div class="main-content">
					<?php
					// Get kanagata theme options.
					$kanagata_data             = kanagata_get_specific_category();
					$katnagata_slugs           = '';
					if ( isset( $kanagata_data['specific_category_name'] ) && '' !== $kanagata_data['specific_category_name'] ) {
						$kanagata_slugs = kanagata_catnames_to_slugs(
							$kanagata_data['specific_category_name'],
							','
						);
					}
					// Top page post list that is set by Theme Options.
					if ( ! empty( $kanagata_slugs ) ) :
						$kanagata_item_num = $kanagata_data['specific_category_num'];
						foreach ( $kanagata_slugs as $kanagata_slug ) :
							$kanagata_cat = get_category_by_slug( $kanagata_slug );
							$kanagata_cat_name = $kanagata_cat->cat_name;
							?>
							<div class="index__customization">
								<div class="index__customizationt__header">
									<div class="index__customization__header__title">
										<h1><?php echo esc_html( $kanagata_cat_name ); ?></h1>
									</div>
									<?php
									$kanagata_lastposts = get_posts(
										'post_type=post&category_name=' . $kanagata_slug
										. '&&posts_per_page=' . $kanagata_item_num
									);
									?>
								</div>
								<!-- .index__customization__header -->
								<div class="index__customization__body">
									<ul class="index__customization__body--catlist">
										<?php foreach ( $kanagata_lastposts as $post ) : setup_postdata( $post ); ?>
											<li>
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<!-- .index__customization__body -->
								<?php wp_reset_postdata(); ?>
							</div><!-- .index__customization -->
						<?php endforeach; ?>
					<?php endif; ?>
					<?php
					if ( ! isset( $kanagata_data['display_latest_post'] ) || 'no' !== $kanagata_data['display_latest_post'] ) : ?>
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post()
								?>
								<div <?php post_class( 'index-post clearfix' ); ?>>
									<div class="index-post__header">
										<h2 class="index-post__header__title">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
									</div>
									<!-- .index-post__header -->
									<div class="index-post__body">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="index-post__body__thumbnail">
												<?php the_post_thumbnail(); ?>
											</div><!-- .index-post__body__thumbnail -->
										<?php endif; ?>
										<div class="index-post__body__content">
											<?php the_content( __( 'read more', 'kanagata' ) ); ?>
										</div>
										<!-- .index-post__body__content -->
									</div>
									<div class="index-post__pagetop">
										<?php
										kanagata_pagetop(
											array(
												'dest' => 'header',
												'text' => __( 'page top', 'kanagata' ),
											)
										); ?>
									</div><!-- category-post__pagetop -->
								</div><!-- index-post -->
								<?php
							endwhile;
						endif;
						?>
						<div class="pager">
							<?php
							// Previous and next page navigation.
							the_posts_pagination(
								array(
									'prev_text' => __( 'Previous page', 'kanagata' ),
									'next_text' => __( 'Next page', 'kanagata' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">'
										. __( 'page', 'kanagata' )
										. ' </span>',
								)
							);
							?>
						</div><!-- nav_single -->
					<?php endif; ?>
					<div class="pagetop"><a href="#header"><?php _e( 'page top', 'kanagata' ); ?></a></div>
				</div><!-- .content -->
			</div>
			<!-- .main .index-page -->
			<?php get_sidebar(); ?>
		</div>
		<!-- .row -->
	</div>
	<!-- .container -->
<?php get_footer(); ?>
