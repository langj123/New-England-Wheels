<?php
$post_type = "locations";

$taxonomy = get_object_taxonomies($post_type);

$terms = get_terms($taxonomy);


?>
				<section class="module-new product-run-down">
					<header class="section-head">
						<h2>Locations</h2>
					</header>
					<div class="overview-cont">

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

								<div class="col-lg-12 location-cont">
									<h1 class="location-title"><?php echo $cat_name; ?></h1>
					<?php

								if ($location_query->have_posts()) {
										while($location_query->have_posts()) {
											$location_query->the_post();
											$id = get_the_id();
											// build location data
											if (function_exists('get_field')) {
												$location_info = "<ul class='location_info'>";
												$location_info .= get_field('street_address', $id) ? "<li>" . get_field('street_address', $id) . "</li>" : "";
												$location_info .= get_field('city_state_zip', $id) ? "<li>" . get_field('city_state_zip', $id) . "</li>" : "";
												$location_info .= get_field('phone_number', $id) ? "<li>" . get_field('phone_number', $id) . "</li>" : "";
												$location_info .= get_field('contact_email', $id) ? "<li>" . get_field('contact_email', $id) . "</li>" : "";
												$location_info .= get_field('location_website', $id) ? "<li><a href='" . get_field('location_website', $id) . "'>" . str_replace(array("http://", "https://"), "", get_field('location_website', $id)) . "</a></li>" : "";
												$location_info .= "</ul>";
											}
					?>
												<div class="<?php echo $class; ?>">
													<div class="location col-lg-4">
														<h2><?php the_title();?></h2>
														<?php echo $location_info; ?>
													</div><!-- location -->
												</div><!-- cols -->

					<?php
										} // while have_posts()
								} // if have_posts()
									wp_reset_postdata();
					?>
								</div><!-- location-cont -->
					<?php
							} // foreach
					?>
					</div><!-- overview-cont -->
				</section><!-- overview -->
