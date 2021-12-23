<?php

namespace NIX_Lessions\Modules\Theme;


class Theme {
	public function __construct() {
		$this->theme_support();
		$this->theme_setting();
		add_action( 'widgets_init', [$this, 'my_awesome_sidebar'] );
	}
	private function theme_setting() {
		$cur_theme = wp_get_theme();
		define( 'MY_FILMS_VERSION', $cur_theme->get( '1.0' ) );
		define( 'MY_FILMS_TEXT_DOMAIN', $cur_theme->get( 'My_films' ) );
	}

	private function theme_support() {
		add_theme_support( 'post-thumbnails' );
	}

	public function my_awesome_sidebar() {
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


}
