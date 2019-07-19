<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Underscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			<div class="entry-meta">
				<?php
				underscores_posted_on();
				underscores_posted_by();
				?>
			</div><!-- .entry-meta --> <?php
		else :
			underscores_post_thumbnail();
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->
	<?php
	if(is_single()) :
	underscores_post_thumbnail();
	endif; ?>

	<div class="entry-content">
		<?php
		if(is_home()) :
			the_excerpt();
		else:
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscores' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
				'after'  => '</div>',
			) );
		endif;
		?>
	</div><!-- .entry-content -->
	<?php
	if(is_single()) { ?>
		<footer class="entry-footer">
			<?php underscores_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php } ?>
	</article><!-- #post-<?php the_ID(); ?> -->