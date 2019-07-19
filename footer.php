<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Underscores
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'secondary-menu',
				) );
			?>
			<div class="footer-creds">
				<a href="<?php echo get_bloginfo('url')?>"><?php echo get_bloginfo('name')?></a> &middot; Made with love by <a href="https://bicicleta.studio">Bicicleta Studio</a>
			</div><!-- .footer creds -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>