<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sroar
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row clear">
					<div class="col-12 col-12-m col-10-l center-l">

						<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<a href="<?php the_permalink(); ?>">
								<article class="blog-article">
									<?php echo '<h2>' . get_the_title() . '</h2>'; ?>
									<?php echo '<p>' . the_excerpt() . '</p>'; ?>
								</article>
							</a>

						<?php	endwhile; ?>

						<?php the_posts_navigation(); ?>

					</div>
				</div>
			</div>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
