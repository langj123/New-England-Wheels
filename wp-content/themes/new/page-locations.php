<?php
/**
 * Template Name: Locations Overview Page
 *
 *
 *
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>


			<header class="product-header">
				
						<?php get_template_part('template-parts/content', 'map' ); ?>

			</header><!-- product-header -->

				<?php get_template_part('template-parts/content', 'locations-rundown' ); ?>

		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
