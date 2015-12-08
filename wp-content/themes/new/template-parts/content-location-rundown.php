<?php
$post_type = "locations";

$taxonomy = get_object_taxonomies($post_type);

$terms = get_terms($taxonomy);

$active_terms = array();

foreach($terms as $term) {
  array_push($active_terms, $term->name);
}
?>
				<section class="module-new product-run-down">
					<div class="overview-cont">
						<div class="col-lg-12 location-cont">
					<?php
						foreach($terms as $term) {
							// arguments for loop
							$args = array(
								"post_type" => $post_type,
								"tax_query" => array(
									array(
										"taxonomy" => $taxonomy[0],
										"terms" => $term->term_id
									)
								)
							);
							$location_query = new WP_Query($args);
							$cat_name = $term->name;
					?>
							<div class="location-groups">
								<h1 id="Location-<?php echo $cat_name; ?>" class="location-region-title"><?php echo $cat_name; ?></h1>
					<?php
								if ($location_query->have_posts()) {
									while($location_query->have_posts()) {
										$location_query->the_post();
										$id = get_the_id();
										// build location data
										if (function_exists('get_field')) {
											$location_info = "<ul class='location_info'>";
											$location_info .= get_field('street_address', $id) ? "<li class='location-address'>" . get_field('street_address', $id) . "</li>" : "";
											$location_info .= get_field('city_state_zip', $id) ? "<li class='location-city-st'>" . get_field('city_state_zip', $id) . "</li>" : "";
											$location_info .= get_field('phone_number', $id) ? "<li class='location-phone'>" . get_field('phone_number', $id) . "</li>" : "";
											$location_info .= get_field('location_website', $id) ? "<li class='location-web'><a href='" . get_field('location_website', $id) . "'>" . str_replace(array("http://", "https://"), "", get_field('location_website', $id)) . "</a></li>" : "";
											$location_info .= get_field('contact_email', $id) ? "<li class='location-email'><a href='mailto:" . get_field('contact_email', $id) . "'>Contact</a></li>" : "";
											$location_info .= "</ul>";
										}
					?>
											<div class="location col-lg-4">
												<h2 class="location-name"><?php the_title();?></h2>
												<?php echo $location_info; ?>
											</div><!-- location -->
					<?php
									} // while have_posts()
								} // if have_posts()
									wp_reset_postdata();
					?>
							</div><!-- location-groups -->
					<?php
						} // foreach
					?>
						</div><!-- location-cont -->
					</div><!-- overview-cont -->
				</section><!-- overview -->
