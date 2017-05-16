<?php
/**
 * Template Name: About Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sroar
 */

get_header(); ?>

<div class="aboutContainer">
	<section class="leftSideContent">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container-full">
					<div class="row clear">
						<div class="col-12 col-10-m col-10-l center-s center-m center-l">
							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

							endwhile; // End of the loop.
							?>
						</div>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
	</section>

	<section class="rightSideContent" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">

	</section>
</div>

<?php
get_footer();
