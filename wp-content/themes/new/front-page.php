<?php
/**
 * The template for displaying Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NEW
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
			<?php get_template_part( 'template-parts/content', 'slider' ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
