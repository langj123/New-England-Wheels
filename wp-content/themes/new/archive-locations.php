<?php
/**
 * The template vehicle categories
 *
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="product-header">
			<?php get_template_part('template-parts/content', 'map' );?>
			</header><!-- product-header -->
			<?php get_template_part('template-parts/content', 'location-rundown' );?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>