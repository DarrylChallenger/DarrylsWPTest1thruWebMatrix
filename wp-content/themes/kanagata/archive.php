<?php
/**
 * The general archive file
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0
 * @version    1.0
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="main category col-lg-8 col-md-8 col-sm-12 col-xs-12<?php echo kanagata_get_layout_class( 'main' ); ?>">
				<div class="main-content">
					<div class="category__header">
						<div class="category__header__title">
							<h1>
								<?php if ( is_category() ) : ?>
									<?php single_cat_title(); ?>
								<?php elseif ( is_tag() ) : ?>
									<?php single_tag_title(); ?>
								<?php else : ?>
									<?php single_month_title(); ?>
								<?php endif; ?>
							</h1>
						</div>
					</div><!-- .category__header -->
					<div class="category__body">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post()
								?>
								<div <?php post_class( 'category-post clearfix' ); ?>>
									<div class="category-post__header">
										<div class="category-post__header__title">
											<h2>
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h2>
										</div>
									</div><!-- .category-post__header -->
									<div class="category-post__body">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="category-post__body__thumbnail">
												<?php the_post_thumbnail(); ?>
											</div>
											<!-- .category-post__body__thumbnail -->
										<?php endif; ?>
										<div class="category-post__body__content">
											<?php the_content( __( 'read more', 'kanagata' ) ); ?>
										</div><!-- .category-post__body__content -->
									</div><!-- .category-post__body -->
									<?php if ( 'no' !== get_theme_mod( 'post_meta' ) ) : ?>
										<div class="category-post__meta">
											<?php kanagata_metalist(); ?>
										</div><!-- .category-post__meta -->
									<?php endif; ?>
									<div class="category-post__pagetop">
										<?php
										kanagata_pagetop(
											array(
												'dest' => 'header',
												'text' => __( 'page top', 'kanagata' ),
											)
										); ?>
									</div><!-- category-post__pagetop -->
								</div><!-- category-post -->
								<?php
							endwhile;
						endif;
						?>
						<div class="pager">
							<?php
							// Previous and next page navigation.
							the_posts_pagination(
								array(
									'prev_text'          => __( 'Previous page', 'kanagata' ),
									'next_text'          => __( 'Next page', 'kanagata' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' .
															__( 'Page', 'kanagata' ) . ' </span>',
								)
							);
							?>
						</div><!-- .tablenav -->
					</div><!-- .category__body -->
				</div><!-- .main-content -->
			</div><!-- .main .category -->
			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- .ontainer -->
<?php get_footer(); ?>
