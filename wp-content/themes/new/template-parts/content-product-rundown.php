<?php
$post_type = "vehicles";

$taxonomy = get_object_taxonomies($post_type);

$terms = get_terms($taxonomy);

?>

				<section class="module-new product-run-down">
					<header>
						<h2>Vehicle Categories</h2>
					</header>
					<div class="overview-cont">

						<?php
								$i = 0;
								foreach ($terms as $term) {
									// get amount of posts for column display purposes
									if (count($terms) % 2 == 0 && count($terms) != 1) {
										$class = "col-lg-6";
									} elseif (count($terms) == 1) {
										$class = "col-lg-12";
									}
									else {
										$class = "col-lg-4";
									}
									$link = get_term_link($term->slug, $term->taxonomy);
									$description = $term->description;
									$cat_title = $term->name;
									$tax = $term->taxonomy . "_" . $term->term_id;
						?>
								<div class="<?php echo $class; ?>">

									<div class="image-container" style="background-image: url(<?php echo get_field('category_run_down_image', $tax); ?>);">
										<a href="<?php echo $link; ?>" class="link-button">View Vehicle</a>
										<div class="product-title">
											<h2><a href="<?php echo $link; ?>"><?php echo $cat_title; ?></a></h2>
											<?php if ($description) { ?>
												<p><?php echo $description; ?></p>
											<?php } ?>
										</div><!-- product-desc -->
									</div>
								</div>

								<?php
								$i++;
							}
						?>
					</div><!-- overview-cont -->
				</section><!-- overview -->
