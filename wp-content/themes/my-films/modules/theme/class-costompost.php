<?php

namespace NIX_Lessions\Modules\CostomPost;

class CostomPost {

	public function __construct() {
		add_action( 'init', [$this,'films_custom_post_type']);
		add_action( 'init', [$this, 'custom_taxonomy_ganre']);
		add_action( 'init', [$this, 'custom_taxonomy_actor']);
		add_action( 'pre_get_posts', [$this, 'modify_archive_movie_query']);

	}

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




	function modify_archive_movie_query( \WP_Query $query ) {
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



}