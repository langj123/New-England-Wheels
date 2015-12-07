<?php if (get_field('regions_to_display')): ?>
				<section class="module-new product-run-down">
					
					<div class="overview-cont">
						<?php
						$categories_display = get_field('regions_to_display');
						$taxonomy = get_terms($categories_display[0]->taxonomy);
						$i = 0;
						
						foreach ($categories_display as $category) {
							// get amount of posts for column display purposes
							if (count($categories_display) % 2 == 0 && count($categories_display) != 1) {
								$class = "col-lg-6";
							} elseif (count($categories_display) == 1) {
								$class = "col-lg-12";
							}
							else {
								$class = "col-lg-4";
							}
							$tax =  $categories_display[$i]->taxonomy . "_" . $categories_display[$i]->term_id;
							$link = get_term_link($category);
						?>
						<div class="<?php echo $class; ?>">
							<div class="image-container" style="background-image: url(<?php echo get_field('category_run_down_image', $tax); ?>);">
								<a href="<?php echo $link; ?>" class="link-button">View Vehicle</a>
								<div class="product-title">
									<h2><a href="<?php echo $link; ?>"><?php echo $categories_display[$i]->name; ?></a></h2>
									<?php if ($categories_display[$i]->description) : ?>
										<p><?php echo $categories_display[$i]->description; ?></p>
									<?php endif; ?>
								</div><!-- product-desc -->
							</div>
						</div>
						<?php 
						$i++;
					} ?>
					</div><!-- overview-cont -->
				</section><!-- overview -->
<?php endif; ?>