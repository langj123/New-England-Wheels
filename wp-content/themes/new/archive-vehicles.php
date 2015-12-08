<?php
/**
 * The template vehicle categories
 *
 */
if (function_exists('get_field')) {
	$feature_vehicle = get_field('vehicle_to_feature', 'options') ? get_field('vehicle_to_feature', 'options') : "";
	$feature_text = get_field('vehicle_feature_promo_text', 'options') ? get_field('vehicle_feature_promo_text', 'options') : "";
	$feature_id = $feature_vehicle->ID;
	$feature_link = get_permalink($feature_id) ? "<a href='" . get_permalink($feature_id) . "' class='link-button'>Learn More</a>" : "";
	$feature_image = get_field('hero_image', $feature_id) ? "style='background-image: url(" . get_field('hero_image', $feature_id) . ");'" : "";
}
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="section-head" <?php echo $feature_image; ?>>
				<div class="image-container col-lg-12">
					<div class="product-head-desc">
						<?php if (!empty($feature_text)) { ?>
							<h1 class="product-title"><?php echo $feature_text; ?></h1>
						<?php } ?>
						<?php echo $feature_link; ?>
					</div>
				</div><!-- image-containter -->
			</header><!-- product-header -->

			<?php get_template_part('template-parts/content', 'product-rundown' );?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>