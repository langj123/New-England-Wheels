<?php
/**
 * Template Name: Products Overview Page
 *
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<header class="product-header">
				<?php if (function_exists('get_field')) : ?>
				<?php if(get_field('featured_promo_image')): ?>
				<div class="image-container">
					<?php if (get_field('featured_promo')) : ?>
						<h1 class="product-title"><?php echo get_field('featured_promo'); ?></h1>
					<?php endif; ?>
					<?php if (get_field('featured_promo_image')) : ?>
						<img src="<?php echo get_field('featured_promo_image'); ?>" />
					<?php endif; ?>
				</div><!-- image-containter -->
				<?php endif; ?>
			</header><!-- product-header -->


				<?php get_template_part('template-parts/content', 'product-rundown' ); ?>


			<?php endif; ?>
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
