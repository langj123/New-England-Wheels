<?php
/**
 * The template vehicle categories
 *
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="product-header">
				<div class="image-container col-lg-12">
						<h1 class="product-title"><?php echo get_field('featured_promo'); ?></h1>
						<img src="<?php echo get_field('featured_promo_image'); ?>" />
				</div><!-- image-containter -->
			</header><!-- product-header -->

			<?php get_template_part('template-parts/content', 'product-rundown' );?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>