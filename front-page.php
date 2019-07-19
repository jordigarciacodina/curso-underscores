<?php
/**
 * The template for displaying the Front Page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package Underscores
 */

 get_header(); ?>

 	<div id="primary" class="content-area">
	 	<main id="main" class="site-main" role="main">
		 	<section class="hero" style="background-image: url( <?php the_field('hero_img'); ?> );">
			 	<div class="wrap">
				 	<div class="box">
					 	<h1><?php the_field('hero_title'); ?></h1>
					 	<p><?php the_field('hero_description'); ?></p>
					 	<div class="cta">
						 	<a class="button" href="<?php the_field('hero_cta_link'); ?>"><?php the_field('hero_cta_title'); ?></a>
					 	</div>
				 	</div>
			 	</div>
		 	</section>
		 	<section class="posts-wrapper">
			 	<?php global $post;

				$args = array(
					'post_type' 		=> 'portfolio',
					'posts_per_page'	=> -1,
				);

				$myposts = get_posts($args);

				foreach($myposts as $post) : setup_postdata($post); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<a href="<?php the_permalink(); ?>"><?php underscores_post_thumbnail(); ?></a>
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</header><!-- .entry-header -->
					</article><!-- post-<?php the_ID(); ?> -->
				<?php endforeach; wp_reset_postdata(); ?>
		 	</section><!-- posts-wrapper -->
	 	</main><!-- #main -->
 	</div><!-- #primary -->
 <?php get_sidebar(); ?>
 <?php get_footer(); ?>