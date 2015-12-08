<?php
/**
 * The template for displaying all vehicle posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NEW
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<header class="product-header">
				<?php if (function_exists('get_field')) : ?>
				<?php if(get_field('hero_image')): ?>
				<div class="image-container">
					<h1 class="product-title"><?php the_title(); ?>
						<?php if (get_field('vehicle_sub_header')) : echo "<br />" . get_field('vehicle_sub_header'); endif; ?>
					</h1>
					<img src="<?php echo get_field('hero_image'); ?>" />
				</div><!-- image-containter -->
				<?php endif; ?>
			</header><!-- product-header -->

				<?php if(get_field('vehicle_overview')): ?>
				<section class="module-new overview">
					<div class="overview-cont col-lg-12">
						<p><?php echo get_field('vehicle_overview'); ?></p>
					</div><!-- overview-cont -->
				</section><!-- overview -->
				<?php endif; ?>
				<?php if(get_field('vehicle_features')): ?>
				<section class="module-new features">
					<div class="features-extended">
						<?php echo get_field('vehicle_features'); ?>
					</div><!-- features-extended -->
					<button class="features-expand">Click to View All Features</button>
				</section><!-- features -->
				<?php endif; ?>

				<?php if(get_field('hero_image')): ?>
				<section class="module-new options">
					<img src="<?php echo get_field('hero_image'); ?>" />
				</section>
				<?php endif; ?>

				<?php if(get_field('vehicle_options')): ?>
				<section class="module-new options">
					<button class="features-expand">Click to View All Options</button>
					<div class="features-extended">
						<?php echo get_field('vehicle_options'); ?>
					</div><!-- features-extended -->
				</section>
				<?php endif; ?>

			<?php endif; ?>
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
