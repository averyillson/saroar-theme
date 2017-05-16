<?php
/**
 * sroar functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sroar
 */

if ( ! function_exists( 'saroar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function saroar_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sroar, use a find and replace
	 * to change 'saroar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'saroar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'saroar' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'saroar_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'saroar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saroar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'saroar_content_width', 640 );
}
add_action( 'after_setup_theme', 'saroar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saroar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'saroar' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'saroar' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'saroar_widgets_init' );

//Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

/**
 * Enqueue scripts and styles.
 */
function saroar_scripts() {

	$date = date_create();
	$cacheBust = date_timestamp_get($date);

	wp_enqueue_style( 'saroar-style', get_stylesheet_uri(), null, $cacheBust );

	wp_enqueue_script( 'saroar-default', get_template_directory_uri() . '/js/default.js', array(), '20151215', true );

	wp_enqueue_script( 'saroar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'saroar_scripts' );

// Register Custom Post Type
function article_post_type() {

	$labels = array(
		'name'                  => _x( 'Articles', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Article', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Articles', 'text_domain' ),
		'name_admin_bar'        => __( 'Articles', 'text_domain' ),
		'archives'              => __( 'Article Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Article:', 'text_domain' ),
		'all_items'             => __( 'All articles', 'text_domain' ),
		'add_new_item'          => __( 'Add New Articles', 'text_domain' ),
		'add_new'               => __( 'Add New Article', 'text_domain' ),
		'new_item'              => __( 'New Article', 'text_domain' ),
		'edit_item'             => __( 'Edit Article', 'text_domain' ),
		'update_item'           => __( 'Update Article', 'text_domain' ),
		'view_item'             => __( 'View Article', 'text_domain' ),
		'search_items'          => __( 'Search Article', 'text_domain' ),
		'not_found'             => __( 'Article Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Article Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Article', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Article', 'text_domain' ),
		'items_list'            => __( 'Articles list', 'text_domain' ),
		'items_list_navigation' => __( 'Articles list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter articles list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Article', 'text_domain' ),
		'description'           => __( 'Post type for video articles', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-playlist-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'article', $args );

}
add_action( 'init', 'article_post_type', 0 );

/**
 * Remove auto P tag function.
 */
remove_filter('the_content', 'wpautop');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
