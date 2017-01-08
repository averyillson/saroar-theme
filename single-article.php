<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sroar
 */

get_header();

	$post_id = get_the_ID();
	$key = "video_link";
	$vimeo_link = get_post_meta($post_id, $key, true);
?>

	<div class="video-hero">
		<div class="video-fluid">
			<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_link ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="entry-header">
				<div class="container">
					<div class="row clear">
						<div class="col-12">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div>
					</div>
				</div>
			</header><!-- .entry-header -->
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
