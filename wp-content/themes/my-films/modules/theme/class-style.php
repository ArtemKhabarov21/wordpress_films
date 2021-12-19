<?php
namespace NIX_Lessions\Modules\Theme_style;

class Theme_style {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [$this, 'register_styles']);
	}
	public function register_styles() {
		//add style
		wp_register_style( 'bootstrap-min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', " ",
			MY_FILMS_VERSION );
		wp_enqueue_style( 'bootstrap-min' );
		wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css', " ",
			MY_FILMS_VERSION );
		wp_enqueue_style( 'main' );
		wp_register_script( 'bundle' ,get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', '',  );
		wp_enqueue_script('bundle');
		wp_register_script( 'bootstrap-js' ,get_template_directory_uri() . '/assets/js/bootstrap.js', '',  );
		wp_enqueue_script('bootstrap-js');
	}
}