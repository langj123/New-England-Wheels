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

?>
<section class="module-new product-run-down">
	<header class="section-head">


	</header><!-- header -->
	<div class="overview-cont">
	<?php
	$query = new WP_Query( $args );
	if ($query->have_posts()) :

		while($query->have_posts()) : $query->the_post();
			if (function_exists('get_field')) :
				// get amount of posts for column display purposes
				if ($wp_query->found_posts % 2 == 0 && $wp_query->found_posts != 1) {
					$class = "col-lg-6";
				} elseif ($wp_query->found_posts == 1) {
					$class= "col-lg-12";
				}
				else {
					$class = "col-lg-4";
				}
				$product_image = get_field('hero_image');

			?>
			<div class="<?php echo $class; ?>">
				<div class="image-container">
					<img src="<?php echo $product_image; ?>" />
					<div class="product-title">
						<h2><a href="<?php echo $link; ?>"><?php echo $categories_display[$i]->name; ?></a></h2>
						<?php if ($categories_display[$i]->description) : ?>
							<p><?php echo $categories_display[$i]->description; ?></p>
						<?php endif; ?>
					</div><!-- product-desc -->
				</div>
			</div>
			<?php
			endif;
		endwhile;
		wp_reset_postdata();
	endif;
	?>
	</div><!-- overview-cont -->

</section><!-- overview -->

