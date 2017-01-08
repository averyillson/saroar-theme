<?php
/**
 * The Article Archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sroar
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				if ( have_posts( ) ) :
					while ( have_posts( ) ) : the_post(); ?>
						<article class="archiveArticle" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
								<a href="<?php the_permalink(); ?>">
									<div class="container">
										<div class="row clear">
											<div class="col-12 col-6-m col-6-l">
												<h2><?php the_title(); ?></h2>
												<?php echo '<h4>' . get_the_date() . '</h4>'; ?>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
									</div>
								</a>
							</article>
					<?php endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
