<?php
/**
 * The Article Archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sroar
 */

get_header(); ?>

	<header class="archive-hero">
		<div class="container">
			<div class="row clear">
				<div class="col-5 left">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts( ) ) :

			while ( have_posts( ) ) : the_post(); ?>

				<article class="archiveArticle" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
					<div class="container">
						<div class="row clear">
							<div class="col-12 col-8-m col-8-l">
								<?php the_title(); ?>
								<?php echo '<h4>' . get_the_date() . '</h4>'; ?>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</article>

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
