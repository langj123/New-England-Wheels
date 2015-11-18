<?php
/**
 * Template part for displaying sliders
 *
 */

?>

		<?php
		$args = array(
				'post_type' => 'vehicles',
				'posts_per_page' => 10, // don't want this to get too large
				'post_status' => 'publish',
				'order' => 'ASC'
			);
		$vehicles = new WP_Query( $args );
		?>
		<?php if ($vehicles->have_posts()) : ?>
		<?php while ( $vehicles->have_posts() ) : $vehicles->the_post(); ?>
			<?php if (function_exists('get_field')) : ?>
				<?php if (get_field('hero_image')) : ?>
					<div class="slider-container">
						<ul class="slider">
						    <li>
						    	<img src="<?php echo get_field('hero_image'); ?>" />
						    	<div class="slide-content col-lg-12">
						    		<h2><?php the_title(); ?></h2>
						    	</div><!-- slide-content -->
						    </li>
						</ul>
					</div><!-- slider-container -->
				<?php endif; ?>
			<?php endif; ?>
		<?php
			endwhile; // End of the loop.
		// reset post data
			wp_reset_postdata();
		endif;
		?>

