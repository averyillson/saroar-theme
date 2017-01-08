<?php
/**
 * Template Name: Front Page
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
	<?php
		$the_query = new WP_Query( array( 'post_type' => 'article', 'posts_per_page' => 1 ) );

	if ( $the_query->have_posts() ) : ?>

		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="hero" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
				<div class="container">
					<div class="row clear">
						<div class="hero-content">
							<div class="col-12 col-7-l col-7-m">
								<p class="latest">Latest Article</p>
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
		<!-- end of the loop -->

		<?php wp_reset_postdata   (); ?>

	<?php endif; ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<section id="articles">
		<div class="container">
			<div class="row clear">
				<div class="col-12">
					<h3>Articles</h3>
				</div>
				<div class="col-12">
					<hr>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row clear">
			<?php
				$the_query = new WP_Query( array( 'post_type' => 'article' , 'posts_per_page' => 3 , 'offset' => 1 ) );

				// The Loop
				if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) { $the_query->the_post(); ?>

					<div class="col-12 col-12-m col-6-l">
						<a href="<?php the_permalink(); ?>">
							<article class="post-article">
								<?php the_post_thumbnail( 'full', array( 'class' => 'image-fluid' ) ); ?>
								<?php echo '<h2>' . get_the_title() . '</h2>'; ?>
								<?php echo '<p>' . the_excerpt() . '</p>'; ?>
							</article>
						</a>
					</div>

				<?php }
					wp_reset_postdata();
				}
				else { ?>

					<div class="col-10-l col-10-m col-10 center center-l center-m">
						<p class="text-center">
							NO POSTS FOUND.
						</p>
					</div>
			<?php } ?>
			</div>
		</div>
	</section>

<?php
get_footer();
