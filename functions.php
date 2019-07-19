<?php
/**
 * Curso de Underscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Underscores
 */

if ( ! function_exists( 'bicicleta_studio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bicicleta_studio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Curso de Underscores, use a find and replace
		 * to change 'bicicleta-studio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bicicleta-studio', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'bicicleta-studio' ),
			'menu-2' => esc_html__( 'Secondary', 'bicicleta-studio' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bicicleta_studio_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bicicleta_studio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bicicleta_studio_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bicicleta_studio_content_width', 640 );
}
add_action( 'after_setup_theme', 'bicicleta_studio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bicicleta_studio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bicicleta-studio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bicicleta-studio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bicicleta_studio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bicicleta_studio_scripts() {
	wp_enqueue_style( 'bicicleta-studio-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bicicleta-studio-fonts', 'https://fonts.googleapis.com/css?family=Oswald:700|Quattrocento:400,700' );

	wp_enqueue_script( 'bicicleta-studio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bicicleta-studio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bicicleta_studio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Creamos un CPT con soporte para Genesis

if ( ! function_exists('bs_crear_cpt_portfolio') ) {

// Registramos el CPT

function bs_crear_cpt_portfolio() {

	$labels = array(
		'name'                => _x( 'Portfolio', 'Nombre general', 'bs_crear_cpt_portfolio' ),
		'singular_name'       => _x( 'Portfolio', 'Singular del CPT', 'bs_crear_cpt_portfolio' ),
		'menu_name'           => __( 'Portfolio', 'bs_crear_cpt_portfolio' ),
		'name_admin_bar'      => __( 'Portfolio', 'bs_crear_cpt_portfolio' ),
		'parent_item_colon'   => __( 'Padre:', 'bs_crear_cpt_portfolio' ),
		'all_items'           => __( 'Todos', 'bs_crear_cpt_portfolio' ),
		'add_new_item'        => __( 'Añadir Portfolio', 'bs_crear_cpt_portfolio' ),
		'add_new'             => __( 'Añadir portfolio', 'bs_crear_cpt_portfolio' ),
		'new_item'            => __( 'Nuevo Portfolio', 'bs_crear_cpt_portfolio' ),
		'edit_item'           => __( 'Editar Portfolio', 'bs_crear_cpt_portfolio' ),
		'update_item'         => __( 'Actualizar Portfolio', 'bs_crear_cpt_portfolio' ),
		'view_item'           => __( 'Ver Portfolio', 'bs_crear_cpt_portfolio' ),
		'search_items'        => __( 'Buscar Portfolio', 'bs_crear_cpt_portfolio' ),
		'not_found'           => __( 'No encontrado', 'bs_crear_cpt_portfolio' ),
		'not_found_in_trash'  => __( 'No encontrado', 'bs_crear_cpt_portfolio' ),
	);
	$args = array(
		'label'               => __( 'bs_post_type_portfolio', 'bs_crear_cpt_portfolio' ),
		'description'         => __( 'Descripción del post type', 'bs_crear_cpt_portfolio' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'menu_icon' => 'dashicons-portfolio',
	);
	register_post_type( 'portfolio', $args );

}

// Colocamos la función del CPT en el hook "init"

add_action( 'init', 'bs_crear_cpt_portfolio', 0 );

}

// Colocamos el nombre el field en placeholder
add_filter( 'comment_form_default_fields', 'bs_comment_form_fields' );
function bs_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Nombre*"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Web*"', $field );
	}
	return $fields;
}

// Colocamos el nombre el field en placeholder
add_filter( 'comment_form_defaults', 'bs_comment_textarea_placeholder' );
function bs_comment_textarea_placeholder( $args ) {
	$args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="Comentario *"', $args['comment_field'] );
	return $args;
}