<?php
//add style
function register_styles() {
	wp_register_style( 'bootstrap-min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', " ",
		'1.0' );
	wp_enqueue_style( 'bootstrap-min' );
	wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css', " ",
		'2.0' );
	wp_enqueue_style( 'main' );
}

add_action( 'wp_enqueue_scripts', 'register_styles' );

//Регистрация меню
function reg_menu() {
	$locations = array(
		'Header' => __( 'Header', 'My_film' ),
	);
	register_nav_menus( $locations );
}

add_action( 'init', 'reg_menu' );
//добавить стили пунктом меню
function add_additional_class_on_li( $classes, $item, $args ) {
	if ( isset( $args->add_li_class ) ) {
		$classes[] = $args->add_li_class;
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1, 3 );

function add_menu_link_class( $atts, $item, $args ) {
	$atts['class'] = 'nav-link';

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function my_nav_menu_submenu_css_class( $classes ) {
	$classes[] = 'dropdown-menu';

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );
// Сostom post type.
add_action( 'widgets_init', 'my_awesome_sidebar' );
function my_awesome_sidebar() {
	$args = array(
		'name'          => 'Sidebar',
		'id'            => 'Sidebar',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);

	register_sidebar( $args );

}

// Сostom post type.
function films_custom_post_type() {
	$labels = array(
		'name'          => __( 'Movies' ),
		'singular_name' => __( 'Film' ),
		'menu_name'     => __( 'Movies' ),
	);
	$args   = array(
		'label'               => __( 'films' ),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-video-alt2',
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'revisions',
			'custom-fields'
		),
		'public'              => true,
		'hierarchical'        => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post'
	);
	register_post_type( 'films', $args );
}

add_action( 'init', 'films_custom_post_type', 0 );
add_theme_support( 'post-thumbnails' );

function custom_taxonomy_ganre() {
	$labels = array(
		'name'      => 'Ganre',
		'singular'  => 'Ganre',
		'menu_name' => 'Ganre'
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);

	register_taxonomy( 'ganre-type', 'films', $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy_ganre', 0 );

function custom_taxonomy_actor() {
	$labels = array(
		'name'      => 'Actor',
		'singular'  => 'Actor',
		'menu_name' => 'Actor'
	);

	$args = array(
		'labels'            => $labels,
		'supports'          => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields',
		),
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true
	);

	register_taxonomy( 'actor-type', 'films', $args );
}


add_action( 'init', 'custom_taxonomy_actor', 0 );

function modify_archive_movie_query( WP_Query $query ) {
	if ( is_admin() || ! $query->is_post_type_archive( 'films' ) ||
	     ! $query->is_main_query() ) {
		return;
	}

	$released_on = filter_input( INPUT_GET, 'filter_released_on',
		FILTER_VALIDATE_INT );
	$pg          = filter_input( INPUT_GET, 'filter_pg',
		FILTER_VALIDATE_INT );
	$rating      = filter_input( INPUT_GET, 'filter_rating',
		FILTER_VALIDATE_INT );
	$meta_query  = [];

	if ( $rating ) {
		$meta_query[] = [
			'key'   => 'rating',
			'value' => $rating,
		];
	}

	if ( $released_on ) {
		$meta_query[] = [
			'key'   => 'release_year',
			'value' => $released_on,
		];
	}

	if ( $pg ) {
		$meta_query[] = [
			'key'   => 'pg',
			'value' => $pg,
		];
	}


	if ( $meta_query ) {
		$query->set( 'meta_query', $meta_query );
	}
}

add_action( 'pre_get_posts', 'modify_archive_movie_query' );

include 'inc/acf-config.php';
