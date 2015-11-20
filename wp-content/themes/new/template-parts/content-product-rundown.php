<?php if (get_field('vehicle_cat_feature')): ?>
				<section class="module-new product-run-down">
					<header class="section-head">
						<h2>Vehicle Categories</h2>
					</header>
					<div class="overview-cont">
						<?php
						$categories_display = get_field('vehicle_cat_feature');
						$taxonomy = get_terms($categories_display[0]->taxonomy);

						foreach ($categories_display as $category) {
							$i = 0;
							$class = (count($categories_display) % 2 == 0 && count($categories_display) != 1) ? "col-lg-6" : "col-lg-4"; // based off amount of categories to 
							$tax =  $categories_display[$i]->taxonomy . "_" . $categories_display[$i]->term_id;
							$link = get_term_link($category);
						?>
						<div class="<?php echo $class; ?>">
							<div class="image-container">
								<img src="<?php echo get_field('category_run_down_image', $tax); ?>" />
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