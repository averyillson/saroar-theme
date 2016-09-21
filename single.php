<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sroar
 */

get_header(); ?>

	<div class="hero" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
		<div class="container">
			<div class="row clear">
				<div class="hero-content">
					<div class="col-12 col-7-l col-7-m">
						<h2><?php the_title(); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
