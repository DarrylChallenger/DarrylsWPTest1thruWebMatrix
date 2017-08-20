<?php
/**
 * The single page template file
 *
 * @package    WordPress
 * @subpackage kanagata
 * @since      1.0
 * @version    1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="main single-post col-lg-8 col-md-8 col-sm-12 col-xs-12<?php echo kanagata_get_layout_class( 'main' ); ?>">
			<div class="main-content">
				<div class="sigle-post__header">
					<div class="single-post__header__title">
						<h1><?php single_post_title(); ?></h1>
					</div><!-- .single-post__header__title -->
				</div><!-- .single-post__header -->
				<div class="sigle-post__body">
					<?php if ( have_posts() ) :
						while ( have_posts() ) :
							the_post()
							?>
							<div <?php post_class( 'single-post__body__content clearfix' ); ?>>
								<?php the_content(); ?>
							</div><!-- .single-post__body__content -->
							<div class="single-post__body__linkpages">
								<?php wp_link_pages(); ?>
							</div><!-- single-post__body__linkpages -->
							<?php if ( 'no' !== get_theme_mod( 'post_meta' ) ) : ?>
							<div class="single-post__body__meta">
								<?php kanagata_metalist(); ?>
							</div><!-- .single-post__body__meta -->
						<?php endif; ?>
							<div class="nav-single">
								<span class="nav-previous">
									<?php previous_post_link(
										'%link',
										'<span class="meta-nav">&larr;</span> ' . __( 'previous post', 'kanagata' )
									); ?>
								</span>
								<span class="nav-next">
									<?php next_post_link(
										'%link',
										__( 'next post', 'kanagata' ) . ' <span class="meta-nav">&rarr;</span>'
									); ?>
								</span>
							</div><!-- .nav-single -->
							<?php
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
							?>
							<?php
						endwhile;
					endif;
					?>
					<?php
					kanagata_pageback();
					kanagata_pagetop(
						array(
							'dest' => 'header',
							'text' => __( 'page top', 'kanagata' ),
						)
					);
					?>
				</div><!-- .single-post__body -->
			</div><!-- .main-content -->
		</div><!-- .main .single-post -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
