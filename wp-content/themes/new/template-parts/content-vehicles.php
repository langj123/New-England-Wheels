<?php
// $categories = get_categories('taxonomy=vehicles_categories');
$queried = get_queried_object();
// foreach($categories as $category) {
// 	if ($category->slug == $queried->slug) {
// 		$product_image = get_field('hero_image', 88);
// 	}
// }
$args = array(
	'post_type' => 'vehicles',
	'tax_query' => array(
		array (
			'taxonomy' => 'vehicles_categories',
			'field' => 'slug',
			'terms' => $queried->slug
		),
	)
);

// required to obtain header image from category
$tax = $queried->taxonomy . "_" . $queried->term_id;
$query = new WP_Query( $args );
?>
<section class="module-new product-run-down">
	<?php if (function_exists('get_field')) : ?>
	<header class="section-head">
		<div class="image-container" style="background-image: url(<?php echo get_field('category_hero_image', $tax); ?>);">
			<h1 class="product-title">Shuttles</h1>
		</div>
	</header><!-- header -->
	<?php endif; ?>

	<?php if (function_exists('number_generator')) : ?>
	<div class="features features-count">
		<h2>Available on <?php echo number_generator($query->found_posts); ?> custom platforms</h2>
	</div><!-- product count -->
	<?php endif; ?>
	<?php
	if ($query->have_posts()) :

		while ($query->have_posts()) : $query->the_post();
			if ($query->current_post ==  0) : ?>
			<div class="overview-cont">
			<?php
			endif;

			// spec comparison
			if (function_exists('get_field')) :
					$specs = array();
					$specs[] = get_field_object('vehicle_engine');
					$specs[] = get_field_object('vehicle_gvwr');
					$specs[] = get_field_object('vehicle_drive');
					$specs[] = get_field_object('vehicle_wheelbase');
					$specs[] = get_field_object('vehicle_length');
					$specs[] = get_field_object('vehicle_height');
					$specs[] = get_field_object('vehicle_interior_height');
					$specs[] = get_field_object('vehicle_interior_width');

				?>
				<?php if (!empty($specs)) : ?>




					<div class="features-container">
							<div class="features features-list">
								<button>Compare</button>
							</div>
							<div class="feature features-table">
									<table>

										<?php foreach($specs as $spec) { ?>

										<tr>
											<td>Item</td>
											<td>Item</td>
											<td>Item</td>
										</tr>
										<?php } ?>
									</table>
							</div><!-- features-table -->
					</div><!-- .features-container -->





				<?php endif;
			endif;


			if (function_exists('get_field')) :
				// get amount of posts for column display purposes
				if ($query->found_posts % 2 == 0 && $query->found_posts != 1) {
					$class = "col-lg-6";
				} elseif ($query->found_posts == 1) {
					$class= "col-lg-12";
				}
				else {
					$class = "col-lg-4";
				}
				$product_image = get_field('hero_image');
			?>
			<div class="<?php echo $class; ?>">
				<div class="image-container" style=" background-image: url(<?php echo $product_image; ?>);">
				<div class="product-title">
						<h2><a href="<?php echo $link; ?>"><?php echo $categories_display[$i]->name; ?></a></h2>
						<?php if ($categories_display[$i]->description) : ?>
							<p><?php echo $categories_display[$i]->description; ?></p>
						<?php endif; ?>
					</div><!-- product-desc -->
				</div><!-- product-title -->
			</div><!-- .image-container -->
			<?php
			endif;
			if ($query->current_post == 0) : ?>
				</div><!-- overview-cont -->
			<?php endif;
		endwhile;
		wp_reset_postdata(); ?>


	<?php endif; ?>

</section><!-- overview -->

