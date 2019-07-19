<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Underscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<<?php underscores_post_thumbnail(); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<p><?php the_field('portfolio_description'); ?></p>
		<div class="file">
			<div class="wrap">
				<div class="feature">
					<p>Técnica</p>
				</div>
				<div class="value">
					<p><?php the_field('valor_1'); ?></p>
				</div>
			</div>
			<div class="wrap">
				<div class="feature">
					<p>Técnica</p>
				</div>
				<div class="value">
					<p><?php the_field('valor_2'); ?></p>
				</div>
			</div>
			<div class="wrap">
				<div class="feature">
					<p>Técnica</p>
				</div>
				<div class="value">
					<p><?php the_field('valor_3'); ?></p>
				</div>
			</div>
			<div class="wrap">
				<div class="feature">
					<p>Técnica</p>
				</div>
				<div class="value">
					<p><?php the_field('valor_4'); ?></p>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->