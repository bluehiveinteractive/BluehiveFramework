<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package BluehiveFramework
 */
?>

				</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			</div><!-- close .row -->
		</div><!-- close .container -->
	</div><!-- close .main-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="site-footer-inner col-sm-12">
					
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bluehiveframework' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'bluehiveframework' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'bluehiveframework' ), 'BluehiveFramework', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
					</div><!-- .site-info -->

				</div>
			</div>
		</div><!-- close .container -->
	</footer><!-- #colophon -->
	

<?php wp_footer(); ?>

</body>
</html>
