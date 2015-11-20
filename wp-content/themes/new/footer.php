<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NEW
 */

?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
		
				<div class="col-lg-4">
					<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				</div><!-- col-lg-4 -->
				<div class="col-lg-6 col-lg-push-2">
				<?php $footer_menu = wp_nav_menu( array( 
					'theme_location' => 'primary', 
					'container' => false,
					'menu_id' => 'primary-menu',
					) ); 
					?>	
				</div><!-- col-lg-8 -->
			
		</div><!-- .wrapper -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
