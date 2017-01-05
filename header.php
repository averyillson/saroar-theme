<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sroar
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="https://use.fontawesome.com/36a9eb5abf.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'saroar' ); ?></a>

	<?php if ( is_front_page() ) { ?>

			<header id="masthead" class="site-header" role="banner">

				<div>
					<button id="nav-button" role="navigation">
						<i class="fa fa-bars fa-2x" ></i>
					</button><!-- #site-navigation -->
				</div>
				<div>
					<div class="branding">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="/wp-content/themes/saroar-theme/images/se-logo-b.png" alt="Sarah Espedido Logo" class="img-fluid center" /></a>
					</div><!-- .branding -->
				</div>
				<div>
					<!-- function not needed yet -->
					<button id="site-search" role="search" class="none">
						<i class="fa fa-search fa-2x"></i>
					</button><!-- .search -->
				</div>

			</header><!-- #masthead -->

	<?php } else { ?>

		<header id="masthead" class="site-header" role="banner">

			<div>
				<button id="nav-button" role="navigation">
					<i class="fa fa-bars fa-2x" ></i>
				</button><!-- #site-navigation -->
			</div>
			<div>
				<div class="branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="/wp-content/themes/saroar-theme/images/se-logo-b.png" alt="Sarah Espedido Logo" class="img-fluid" />
					</a>
				</div><!-- .branding -->
			</div>
			<div>
				<!-- function not needed yet -->
				<button id="site-search" role="search" class="none">
					<i class="fa fa-search fa-2x"></i>
				</button><!-- .search -->
			</div>

		</header><!-- #masthead -->

	<?php	} ?>

	<section id="menu-container">
		<?php

			/*
				Variable defining the arguments that make up the structure of the wp_nav_menu function
				generating the navigation.
			*/
			$args = array(
				'container'			=>	'',
				'menu_id'				=>	'main-navigation',
				'menu_class'		=>	'menu',
				'menu'					=> 	'main_menu'
			);

			wp_nav_menu( $args )
		?>
	</section>

	<div id="content" class="site-content">
